@extends('layouts.m')
@section('title', 'Customer Profile')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Customer Profile
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{route('home')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('customer.list')}}" class="kt-subheader__breadcrumbs-link">Customer</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="javascript:void (0)"
                       class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active"
                       style="padding-right: 1rem;">Profile</a>
                </div>
            </div>
            <div class="kt-subheader__toolbar">
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <!--Begin::Section-->
        <div class="row">
            <div class="col-xl-12">

                <!--begin:: Widgets/Applications/User/Profile3-->
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__body">
                        <div class="kt-widget kt-widget--user-profile-3">
                            <div class="kt-widget__top">
                                <div class="kt-widget__media kt-hidden-">
                                    <img src="{{asset('m/assets/media/users/100_13.jpg')}}" alt="image">
                                </div>
                                <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
                                    JM
                                </div>
                                <div class="kt-widget__content">
                                    <div class="kt-widget__head">
                                        <a href="#" class="kt-widget__username">
                                            Jason Muller
                                            <i class="flaticon2-correct"></i>
                                        </a>
                                    </div>
                                    <div class="kt-widget__subhead">
                                        <a href="#"><i
                                                    class="flaticon2-new-email"></i>jason@siastudio.com</a>
                                        <a href="#"><i class="flaticon2-calendar-3"></i>PR Manager </a>
                                        <a href="#"><i class="flaticon2-placeholder"></i>Melbourne</a>
                                    </div>
                                    <div class="kt-widget__info">
                                        <div class="kt-widget__desc">
                                            I distinguish three main text objektive could be merely to
                                            inform people.
                                            <br> A second could be persuade people.You want people to bay
                                            objective
                                        </div>
                                        <div class="kt-widget__progress">
                                            <div class="kt-widget__text">
                                                Progress
                                            </div>
                                            <div class="progress" style="height: 5px;width: 100%;">
                                                <div class="progress-bar kt-bg-success" role="progressbar"
                                                     style="width: 65%;" aria-valuenow="65"
                                                     aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="kt-widget__stats">
                                                78%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget__bottom">
                                <div class="kt-widget__item">
                                    <div class="kt-widget__icon">
                                        <i class="flaticon-piggy-bank"></i>
                                    </div>
                                    <div class="kt-widget__details">
                                        <span class="kt-widget__title">Earnings</span>
                                        <span class="kt-widget__value"><span>$</span>249,500</span>
                                    </div>
                                </div>
                                <div class="kt-widget__item">
                                    <div class="kt-widget__icon">
                                        <i class="flaticon-confetti"></i>
                                    </div>
                                    <div class="kt-widget__details">
                                        <span class="kt-widget__title">Expances</span>
                                        <span class="kt-widget__value"><span>$</span>164,700</span>
                                    </div>
                                </div>
                                <div class="kt-widget__item">
                                    <div class="kt-widget__icon">
                                        <i class="flaticon-pie-chart"></i>
                                    </div>
                                    <div class="kt-widget__details">
                                        <span class="kt-widget__title">Net</span>
                                        <span class="kt-widget__value"><span>$</span>164,700</span>
                                    </div>
                                </div>
                                <div class="kt-widget__item">
                                    <div class="kt-widget__icon">
                                        <i class="flaticon-file-2"></i>
                                    </div>
                                    <div class="kt-widget__details">
                                        <span class="kt-widget__title">73 Tasks</span>
                                        <a href="#" class="kt-widget__value kt-font-brand">View</a>
                                    </div>
                                </div>
                                <div class="kt-widget__item">
                                    <div class="kt-widget__icon">
                                        <i class="flaticon-chat-1"></i>
                                    </div>
                                    <div class="kt-widget__details">
                                        <span class="kt-widget__title">648 Comments</span>
                                        <a href="#" class="kt-widget__value kt-font-brand">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--end:: Widgets/Applications/User/Profile3-->
            </div>
        </div>
        <!--End::Section-->

        <!--Begin::Section-->
        <div class="row">
            <div class="kt-portlet">
                <div class="kt-portlet__body  kt-portlet__body--fit">
                    <div class="row row-no-padding row-col-separator-xl">
                        <div class="col-xl-4">

                            <!--begin:: Widgets/Daily Sales-->
                            <div class="kt-portlet kt-portlet--height-fluid">
                                <div class="kt-widget14">
                                    <div class="kt-widget14__header kt-margin-b-30">
                                        <h3 class="kt-widget14__title">
                                            Daily Sales
                                        </h3>
                                        <span class="kt-widget14__desc">
																Check out each collumn for more details
															</span>
                                    </div>
                                    <div class="kt-widget14__chart" style="height:120px;">
                                        <canvas id="kt_chart_daily_sales"></canvas>
                                    </div>
                                </div>
                            </div>

                            <!--end:: Widgets/Daily Sales-->
                        </div>
                        <div class="col-xl-4">

                            <!--begin:: Widgets/Profit Share-->
                            <div class="kt-portlet kt-portlet--height-fluid">
                                <div class="kt-widget14">
                                    <div class="kt-widget14__header">
                                        <h3 class="kt-widget14__title">
                                            Profit Share
                                        </h3>
                                        <span class="kt-widget14__desc">
																Profit Share between customers
															</span>
                                    </div>
                                    <div class="kt-widget14__content">
                                        <div class="kt-widget14__chart">
                                            <div class="kt-widget14__stat">45</div>
                                            <canvas id="kt_chart_profit_share"
                                                    style="height: 140px; width: 140px;"></canvas>
                                        </div>
                                        <div class="kt-widget14__legends">
                                            <div class="kt-widget14__legend">
                                                <span class="kt-widget14__bullet kt-bg-success"></span>
                                                <span class="kt-widget14__stats">37% Sport Tickets</span>
                                            </div>
                                            <div class="kt-widget14__legend">
                                                <span class="kt-widget14__bullet kt-bg-warning"></span>
                                                <span class="kt-widget14__stats">47% Business Events</span>
                                            </div>
                                            <div class="kt-widget14__legend">
                                                <span class="kt-widget14__bullet kt-bg-brand"></span>
                                                <span class="kt-widget14__stats">19% Others</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end:: Widgets/Profit Share-->
                        </div>
                        <div class="col-xl-4">

                            <!--begin:: Widgets/Revenue Change-->
                            <div class="kt-portlet kt-portlet--height-fluid">
                                <div class="kt-widget14">
                                    <div class="kt-widget14__header">
                                        <h3 class="kt-widget14__title">
                                            Revenue Change
                                        </h3>
                                        <span class="kt-widget14__desc">
																Revenue change breakdown by cities
															</span>
                                    </div>
                                    <div class="kt-widget14__content">
                                        <div class="kt-widget14__chart">
                                            <div id="kt_chart_revenue_change"
                                                 style="height: 150px; width: 150px;"></div>
                                        </div>
                                        <div class="kt-widget14__legends">
                                            <div class="kt-widget14__legend">
                                                <span class="kt-widget14__bullet kt-bg-success"></span>
                                                <span class="kt-widget14__stats">+10% New York</span>
                                            </div>
                                            <div class="kt-widget14__legend">
                                                <span class="kt-widget14__bullet kt-bg-warning"></span>
                                                <span class="kt-widget14__stats">-7% London</span>
                                            </div>
                                            <div class="kt-widget14__legend">
                                                <span class="kt-widget14__bullet kt-bg-brand"></span>
                                                <span class="kt-widget14__stats">+20% California</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end:: Widgets/Revenue Change-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End::Section-->

        <!--Begin::Section-->
        <div class="row">
            <div class="col-xl-12">
                <!--Begin:: Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Customer
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="kt-form kt-form--label-right">
                                <div class="kt-portlet__body">
                                    <div class="form-group form-group-xs row">
                                        <label class="col-4 col-form-label">Name:</label>
                                        <div class="col-8">
                                            <span class="form-control-plaintext kt-font-bolder">John Doe</span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-xs row">
                                        <label class="col-4 col-form-label">Date OF Birth:</label>
                                        <div class="col-8">
                                            <span class="form-control-plaintext kt-font-bolder">14-12-1984</span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-xs row">
                                        <label class="col-4 col-form-label">Company Name:</label>
                                        <div class="col-8">
                                            <span class="form-control-plaintext kt-font-bolder">Doe Corporation</span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-xs row">
                                        <label class="col-4 col-form-label">NID Number:</label>
                                        <div class="col-8">
                                            <span class="form-control-plaintext kt-font-bolder">456 7890456</span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-xs row">
                                        <label class="col-4 col-form-label">Business Address:</label>
                                        <div class="col-8">
                                            <span class="form-control-plaintext kt-font-bolder">Mirpur DOHS, Dhaka</span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-xs row">
                                        <label class="col-4 col-form-label">Business Area:</label>
                                        <div class="col-8">
                                            <span class="form-control-plaintext kt-font-bolder">Mirpur</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="kt-form kt-form--label-right">
                                <div class="kt-portlet__body">
                                    <div class="form-group form-group-xs row">
                                        <label class="col-4 col-form-label">Business Telephone:</label>
                                        <div class="col-8">
                                            <span class="form-control-plaintext kt-font-bolder">+88025698523</span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-xs row">
                                        <label class="col-4 col-form-label">Business Telephone 2:</label>
                                        <div class="col-8">
                                            <span class="form-control-plaintext kt-font-bolder">+8801711569856</span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-xs row">
                                        <label class="col-4 col-form-label">Business Email:</label>
                                        <div class="col-8">
                                            <span class="form-control-plaintext kt-font-bolder">
                                                <a href="mailto:doe@gmail.com">doe@gmail.com</a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-xs row">
                                        <label class="col-4 col-form-label">Business Email 2:</label>
                                        <div class="col-8">
                                            <span class="form-control-plaintext kt-font-bolder">
                                                <a href="mailto:doe@gmail.com">doe@gmail.com</a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-xs row">
                                        <label class="col-4 col-form-label">Customer Type:</label>
                                        <div class="col-8">
                                            <span class="form-control-plaintext kt-font-bolder">Sub Dealer</span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-xs row">
                                        <label class="col-4 col-form-label">Website:</label>
                                        <div class="col-8">
                                            <span class="form-control-plaintext kt-font-bolder">
                                                <a href="http://www.loop.com">www.loop.com</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
                <!--End:: Portlet-->
            </div>
        </div>
        <!--End::Section-->

        <!--Begin::Section-->
        <div class="row">
            {{--   Start Loop Of Contract person         --}}
            <div class="col-lg-6">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Contact Person 1
                            </h3>
                        </div>
                    </div>
                    <div class="kt-form kt-form--label-right">
                        <div class="kt-portlet__body">
                            <div class="form-group form-group-xs row">
                                <label class="col-4 col-form-label">Name:</label>
                                <div class="col-8">
                                    <span class="form-control-plaintext kt-font-bolder">Loop Man.</span>
                                </div>
                            </div>
                            <div class="form-group form-group-xs row">
                                <label class="col-4 col-form-label">Designation:</label>
                                <div class="col-8">
                                    <span class="form-control-plaintext kt-font-bolder">Personal Secretary</span>
                                </div>
                            </div>
                            <div class="form-group form-group-xs row">
                                <label class="col-4 col-form-label">Phone:</label>
                                <div class="col-8">
                                    <span class="form-control-plaintext kt-font-bolder">+8806 7890456</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--   End Loop Of Contract person         --}}

            <div class="col-lg-6">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Contact Person 2
                            </h3>
                        </div>
                    </div>
                    <div class="kt-form kt-form--label-right">
                        <div class="kt-portlet__body">
                            <div class="form-group form-group-xs row">
                                <label class="col-4 col-form-label">Name:</label>
                                <div class="col-8">
                                    <span class="form-control-plaintext kt-font-bolder">Dori Jain</span>
                                </div>
                            </div>
                            <div class="form-group form-group-xs row">
                                <label class="col-4 col-form-label">Designation:</label>
                                <div class="col-8">
                                    <span class="form-control-plaintext kt-font-bolder">Accountant</span>
                                </div>
                            </div>
                            <div class="form-group form-group-xs row">
                                <label class="col-4 col-form-label">Phone:</label>
                                <div class="col-8">
                                    <span class="form-control-plaintext kt-font-bolder">+8804569890456</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End::Section-->


    </div>
@endsection
{{--@section('stickyToolbar')    --}}
{{--@endsection--}}
@section('script')
    <!--begin::Page Vendors(used by this page) -->

    <!--end::Page Vendors -->

    <!--begin::Page Scripts(used by this page) -->

    <script src="{{asset('m/assets/js/pages/dashboard.js')}}" type="text/javascript"></script>

    <!--end::Page Scripts -->
@endsection