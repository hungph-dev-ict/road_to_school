@extends('user.layouts.default')

@section('title')
    {{ __('titles.my_bills') }}
@endsection

@section('inline_styles')
@endsection

@section('content')
    {{ Breadcrumbs::render('my_course', \Auth::user()->id) }}<br>
    <div id="content">
        <div class="container">
            <div class="row">
                @include('user.partials.user_management_info')
                <div class="col-sm-9 page-content" id="cart">
                    <div class="inner-box">
                        <h2 class="title-2"><i class="fa fa-shopping-bag"></i>&ensp;&ensp; {{ __('titles.my_bills') }}
                            <span
                                    class="badge"></span></h2>
                        <div class="table-responsive">
                            <div class="table-action">
                                <div class="checkbox">
                                    <label for="checkAll">
                                        <input id="checkAll" type="checkbox">
                                        Select: All | <a href="#" class="btn btn-xs btn-danger"><i
                                                    class=" fa fa-trash"></i>Delete</a>
                                    </label>
                                </div>
                                <div class="table-search pull-right col-xs-7">
                                    <div class="form-group">
                                        <label class="col-xs-5 control-label text-right">Search <br>
                                            <a title="clear filter" class="clear-filter" href="#clear">[clear]</a>
                                        </label>
                                        <div class="col-xs-7 searchpan">
                                            <input class="form-control" id="filter" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered add-manage-table"
                                   id="in-cart-item-table">
                                <thead>
                                <tr>
                                    <th data-type="numeric"></th>
                                    <th>ID</th>
                                    <th class="text-center">{{ __('titles.course_list') }}</th>
                                    <th>{{ __('titles.status') }}</th>
{{--                                    <th>{{ __('titles.course_detail') }}</th>--}}
{{--                                    <th>{{ __('titles.process') }}</th>--}}
{{--                                    <th>{{ __('titles.option') }}</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($billList as $bill)
                                    <tr id="cart-item-{{$bill->id}}">
                                        <td class="add-img-selector" id="checkbox-{{ $bill->id}}">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox">
                                                </label>
                                            </div>
                                        </td>
                                        <td> {{ $bill->id }} </td>
                                        <td>
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th class="text-center" style="width: 20%"> Course Image</th>
                                                    <th class="text-center" style="width: 70%"> Course Detail </th>
                                                    <th class="text-center" style="width: 10%"> Price </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($bill->courseList as $course)
                                                    <tr>
                                                        <td>
                                                            <a href="{{ route('courses.show', $course->id) }}">
                                                                <img class="img-responsive"
                                                                     src="{{ str_replace('public/', '', asset($course->course_avatar)) }}"
                                                                     alt="img" style="width: 90px; height: 60px">
                                                            </a>
                                                        </td>
                                                        <td class="ads-details-td">
                                                            <h4>
                                                                <a href="{{ route('courses.show', $course->id) }}">{{ $course->title }}</a>
                                                            </h4>
                                                            <p><strong> {{ __('titles.instructor') }} </strong>:
                                                                <a href="{{ route('users.show', $course->user->id) }}">{{ $course->user->name }}</a>
                                                            </p>
                                                            <p>
                                                                <strong> {{ __('titles.seller') }} </strong>: {{ $course->seller }}
                                                                <strong>{{ __('titles.schedule') }}
                                                                    : </strong> {{ $course->lecture_numbers . ' ' . __('titles.lectures') . ' ' . __('titles.in') . ' ' . $course->duration . ' ' . __('titles.minutes') }}
                                                            </p>
                                                        </td>
                                                        <td>
                                                            ${{ $course->price }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <h3>Total Course: <span style="color: red;">{{ $bill->totalCourse }} </span>&emsp; Total Price: <span style="color: red;">${{ $bill->total_amount }}</span></h3>
                                        </td>
                                        <td class="text-center">
                                            {{ \App\Models\Bill::$status[$bill->status] }}
                                        </td>
{{--                                        <td class="ads-details-td">--}}
{{--                                            <h4>--}}
{{--                                                <a href="{{ route('courses.show', $course->id) }}">{{ $course->title }}</a>--}}
{{--                                            </h4>--}}
{{--                                            <p><strong> {{ __('titles.instructor') }} </strong>:--}}
{{--                                                <a href="{{ route('users.show', $course->user->id) }}">{{ $course->user->name }}</a>--}}
{{--                                            </p>--}}
{{--                                            <p>--}}
{{--                                                <strong> {{ __('titles.seller') }} </strong>: {{ $course->seller }}--}}
{{--                                                <strong>{{ __('titles.schedule') }}--}}
{{--                                                    : </strong> {{ $course->lecture_numbers . ' ' . __('titles.lectures') . ' ' . __('titles.in') . ' ' . $course->duration . ' ' . __('titles.minutes') }}--}}
{{--                                            </p>--}}
{{--                                        </td>--}}
{{--                                        <td class="price-td">--}}
{{--                                            <strong>--}}
{{--                                                {{ $course->learnedCount . '/' . $course->totalLecture }}<br>--}}
{{--                                                {{ $course->process }}%--}}
{{--                                            </strong>--}}
{{--                                        </td>--}}
{{--                                        <td class="action-td">--}}
{{--                                            <p><a class="btn btn-danger btn-xs remove"--}}
{{--                                                  href="{{ route('courses.show', $course->id) }}"> <i--}}
{{--                                                            class="fa fa-see"></i> {{ __('titles.go_to_course') }}--}}
{{--                                                </a></p>--}}
{{--                                        </td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('inline_scripts')
@endsection
