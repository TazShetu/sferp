{{--@extends('errors::minimal')--}}

{{--@section('title', __('Not Found'))--}}
{{--@section('code', '404')--}}
{{--@section('message', __('Not Found'))--}}

        <!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>
    <title>Error 404</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

    <!--end::Fonts -->

    <!--begin::Page Custom Styles(used by this page) -->
    <link href="{{asset('m/assets/css/pages/error/error-1.css')}}" rel="stylesheet" type="text/css"/>

    <!--end::Page Custom Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->

    <!--begin:: Vendor Plugins -->


    <!--end:: Vendor Plugins -->
    <link href="{{asset('m/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>

    <!--begin:: Vendor Plugins for custom pages -->


    <!--end:: Vendor Plugins for custom pages -->

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->


    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="{{asset('m/assets/media/logos/favicon.ico')}}"/>
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

<!-- begin:: Page -->
<div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid  kt-error-v1"
         style="background-image: url({{asset('m/assets/media/error/bg1.jpg')}});">
        <div class="kt-error-v1__container">
            <h1 class="kt-error-v1__number">404</h1>
            <p class="kt-error-v1__desc">
                OOPS! Something went wrong here
            </p>
        </div>
    </div>
</div>

<!-- end:: Page -->

<!-- begin::Global Config(global config for global JS sciprts) -->


<!-- end::Global Config -->

<!--begin::Global Theme Bundle(used by all pages) -->

<!--begin:: Vendor Plugins -->


<!--end:: Vendor Plugins -->

<!--begin:: Vendor Plugins for custom pages -->

<!--end:: Vendor Plugins for custom pages -->

<!--end::Global Theme Bundle -->
</body>

<!-- end::Body -->
</html>
