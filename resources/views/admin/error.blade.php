@extends('admin.layouts.master')

@section('main')
{{--@php--}}
{{--    $code = isset($code) ? $code : 404;--}}
{{--    $title = isset($title) ? $title : 'Not Found';--}}
{{--    $message = isset($message) ? $message : 'Page not found';--}}
{{--@endphp--}}
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <!-- <div class="row"> -->
            <!-- <div class="col-md-12"> -->
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h3>{{$code}}</h3>
                    <h5 class="card-title">Xin lỗi, {{$message}}</h5>
                    <p>{{$title}}</p>
                </div>
            </div>

            <!-- </div> -->
            <!-- </div> -->
        </div>
    </div>

@endsection
