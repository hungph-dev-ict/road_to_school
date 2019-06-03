<?php

namespace App\Http\Controllers\User;

use App\Models\BillCourse;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Bill;
use Auth;

class BillController extends Controller
{
    /**
     * The user model instance.
     */
    protected $modelBill;
    protected $modelCartItem;
    protected $modelBillCourse;
    protected $modelCourse;

    /**
     * Create a new controller instance.
     *
     * @param User $users
     * @return void
     */
    public function __construct(Bill $bill, CartItem $cartItem, BillCourse $billCourse, Course $course)
    {
        $this->modelBill = $bill;
        $this->modelCartItem = $cartItem;
        $this->modelBillCourse = $billCourse;
        $this->modelCourse = $course;
    }

    public function getCheckout()
    {
        $courseRelations = CartItem::where('user_id', Auth::user()->id)->where('cart_item_type', CartItem::IN_CART_TYPE)->get();
        if ($courseRelations->isEmpty()) {
            abort(404);  //404 page
        }
        $totalPriceInCart = $this->modelCartItem->getTotalOriginPriceFollowType(CartItem::IN_CART_TYPE);
        $totalOriginPriceInCart = $totalPriceInCart['origin_price'];
        $totalPromotionPriceInCart = $totalPriceInCart['promotion_price'];

        return view('user.cart_items.checkout', compact(
            'courseRelations',
            'totalOriginPriceInCart',
            'totalPromotionPriceInCart'
        ));
    }

    public function postCheckout(Request $request)
    {
        if (!$request->course_id) {
            abort(404);  //404 page
        }
        $data = $request->all();
        $result = $this->modelBill->addBill($data);

        CartItem::where('cart_item_type', CartItem::IN_CART_TYPE)->delete();
        if (!$result) {
            abort(404);  //404 page
        }

        return view('user.cart_items.checkout_success');
    }

    public function getMyBill($userId)
    {
        $billList = $this->modelBill->where('user_id', $userId)->get();
        foreach($billList as $bill) {
            $courseIdList = $this->modelBillCourse->where('bill_id', $bill->id)->pluck('course_id')->toArray();
            $bill->courseList = $this->modelCourse->whereIn('id', $courseIdList)->get();
            foreach($bill->courseList as $course) {
                $course->price = $this->modelBillCourse->where('bill_id', $bill->id)->where('course_id', $course->id)->first()->price;
            }

            $bill->totalCourse = $this->modelBillCourse->where('bill_id', $bill->id)->count();
        }

        return view('user.bills.my_bill', compact(
            'billList'
        ));
    }
}
