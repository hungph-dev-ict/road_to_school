@extends('admin.layouts.default')

@section('title')
    {{ __('titles.change_course_price') }}
@endsection

@section('inline_styles')
    <link rel="stylesheet"
          href="{{ asset('assets/admin/vendor/datatables/media/css/dataTables.bootstrap4.min.css') }}"/>
@endsection

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('titles.change_course_price') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">
                            <i class="ti-home p-r-5"></i>{{ __('titles.r2s_dashboard') }}
                            <a href="{{ route('admin.courses.index') }}" class="breadcrumb-item">
                                Courses
                            </a>
                            <a class="breadcrumb-item active">{{ __('titles.change_course_price') }}</a>
                        </a>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-header border bottom">
                    <h4 class="card-title">Change Course <b>{{ $selectedCourse->title }}</b> price</h4>
                </div>
                @include('flash::message')
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('admin.courses.updateCoursePrice', $selectedCourse->id) }}" method="post">
                        @csrf
                        <div class="row m-t-30">
                            <div class="col-md-4">
                                <div class="p-h-10">
                                    <div class="form-group">
                                        <label class="control-label">Origin Price *</label>
                                        <input type="text" class="form-control" id="input-origin" name="origin_price"
                                               placeholder="{{ $selectedCourse->origin_price }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-h-10">
                                    <div class="form-group">
                                        <label class="control-label">Promotion Price</label>
                                        <input type="text" class="form-control" id="input-promotion"
                                               name="promotion_price"
                                               placeholder="{{ $selectedCourse->promotion_price }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" style="padding-top: 10px">
                                <div class="m-t-15">
                                    <div class="col-md-6" style="float: right;">
                                        <button class="btn btn-default" id="btn-reset" style="display: inline">Reset
                                        </button>
                                    </div>
                                    <div class="col-md-6" style="float: right">
                                        <button class="btn btn-info" id="btn-get-permission" style="display: inline;">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('admin.layouts.delete_modal')

@section('inline_scripts')
    <script src="{{ asset('assets/admin/vendor/datatables/media/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/datatables/media/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/tables/data-table.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#btn-reset').on('click', function (event) {
                event.preventDefault();
                $('#input-origin').val('');
                $('#input-promotion').val('');
            })
        })
    </script>
@endsection

