<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Http\Requests\UpdateCoursePriceRequest;

class CourseController extends Controller
{
    protected $modelCourse;

    public function __construct(Course $course)
    {
        $this->modelCourse = $course;
    }

    public function index()
    {
        $courses = Course::all();

        return view('admin.courses.index', compact('courses'));
    }

    public function acceptCourse(Request $request, $courseId)
    {
        $selectedCourse = $this->modelCourse->findOrFail($courseId);
        $selectedCourse->update(['is_accepted' => 1]);

        return json_encode($selectedCourse);
    }

    public function changeCoursePrice($courseId)
    {
        $selectedCourse = \App\Models\Course::findOrFail($courseId);

        return view('admin.courses.change_course_price', compact('selectedCourse'));
    }

    public function updateCoursePrice(UpdateCoursePriceRequest $request, $courseId)
    {
        $data = $request->all();

        $selectedCourse = $this->modelCourse->findOrFail($courseId);

        $result = $selectedCourse->update($data);
        if ($result) {
            flash(__('messages.update_course_price_successfully'))->success();
        } else {
            flash(__('messages.update_course_price_failed'))->error();
        }

        return redirect()->back();
    }
}
