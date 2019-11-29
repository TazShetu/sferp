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
                <a href="{{route('customer.edit', ['cid' => $customer->id])}}" class="btn btn-label-success btn-bold">Edit</a>
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
                                    <img alt="image"
                                         @if($customer->image != null)
                                         src="{{asset($customer->image)}}"
                                         @else
                                         src="{{asset('/avatar.png')}}"
                                            @endif
                                    >
                                </div>
                                {{--                                <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">--}}
                                {{--                                    JM--}}
                                {{--                                </div>--}}
                                <div class="kt-widget__content">
                                    <div class="kt-widget__head">
                                        <a href="#" class="kt-widget__username">
                                            {{$customer->name}}
                                            {{--                                            <i class="flaticon2-correct"></i>--}}
                                        </a>
                                    </div>
                                    <div class="kt-widget__subhead">
                                        <a href="mailto:{{$customer->business_email}}"><i
                                                    class="flaticon2-new-email"></i>
                                            {{$customer->business_email}}
                                        </a>
                                        {{--                                        <a href="#">--}}
                                        {{--                                        </a>--}}
                                        <span class="mr-4"><i class="flaticon2-calendar-3"></i>
                                            {{$customer->type}}</span>
                                        {{--                                        <a href="#">--}}
                                        {{--                                        </a>--}}
                                        <span><i class="flaticon2-placeholder"></i>
                                            {{$customer->business_area}}</span>

                                    </div>
                                    <div class="kt-widget__info">
                                        {{--                                        <div class="kt-widget__desc">--}}
                                        {{--Customer Details will go here--}}
                                        {{--                                        </div>--}}
                                        <div class="kt-widget__progress">
                                            <div class="kt-widget__text">
                                                Progress
                                            </div>
                                            <div class="progress" style="height: 5px;width: 100%;">
                                                <div class="progress-bar kt-bg-success" role="progressbar"
                                                     style="width: {{$percentage}}%;" aria-valuenow="{{$percentage}}"
                                                     aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="kt-widget__stats">
                                                {{$percentage}}%
                                            </div>
                                        </div>
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
                                            <span class="form-control-plaintext kt-font-bolder">{{$customer->name}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-xs row">
                                        <label class="col-4 col-form-label">Date OF Birth:</label>
                                        <div class="col-8">
                                            <span class="form-control-plaintext kt-font-bolder">{{$customer->dob}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-xs row">
                                        <label class="col-4 col-form-label">Company Name:</label>
                                        <div class="col-8">
                                            <span class="form-control-plaintext kt-font-bolder">{{$customer->company_name}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-xs row">
                                        <label class="col-4 col-form-label">Tax/BIN Number:</label>
                                        <div class="col-8">
                                            <span class="form-control-plaintext kt-font-bolder">{{$customer->bin}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-xs row">
                                        <label class="col-4 col-form-label">NID Number:</label>
                                        <div class="col-8">
                                            <span class="form-control-plaintext kt-font-bolder">{{$customer->nid}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-xs row">
                                        <label class="col-4 col-form-label">Business Address:</label>
                                        <div class="col-8">
                                            <span class="form-control-plaintext kt-font-bolder">{{$customer->business_address}}</span>
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
                                            <span class="form-control-plaintext kt-font-bolder">{{$customer->business_telephone}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-xs row">
                                        <label class="col-4 col-form-label">Business Telephone 2:</label>
                                        <div class="col-8">
                                            <span class="form-control-plaintext kt-font-bolder">
                                                @if($customer->business_telephone_2)
                                                    {{$customer->business_telephone_2}}
                                                @else
                                                    ----
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-xs row">
                                        <label class="col-4 col-form-label">Business Email:</label>
                                        <div class="col-8">
                                            <span class="form-control-plaintext kt-font-bolder">
                                                <a href="mailto:{{$customer->business_email}}">{{$customer->business_email}}</a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-xs row">
                                        <label class="col-4 col-form-label">Business Email 2:</label>
                                        <div class="col-8">
                                            <span class="form-control-plaintext kt-font-bolder">
                                                @if($customer->business_email_2)
                                                    <a href="mailto:{{$customer->business_email_2}}">{{$customer->business_email_2}}</a>
                                                @else
                                                    ----
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-xs row">
                                        <label class="col-4 col-form-label">Customer Type:</label>
                                        <div class="col-8">
                                            <span class="form-control-plaintext kt-font-bolder">{{$customer->type}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-xs row">
                                        <label class="col-4 col-form-label">Website:</label>
                                        <div class="col-8">
                                            <span class="form-control-plaintext kt-font-bolder">
                                                <a href="{{$customer->company_site}}">{{$customer->company_site}}</a>
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
            @if(count($cPersons) > 0)
            @foreach($cPersons as $i => $cPerson)
            <div class="col-lg-6">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Contact {{ (count($cPersons) > 1) ? 'People' : 'Person' }} {{$i + 1}}
                            </h3>
                        </div>
                    </div>
                    <div class="kt-form kt-form--label-right">
                        <div class="kt-portlet__body">
                            <div class="form-group form-group-xs row">
                                <label class="col-4 col-form-label">Name:</label>
                                <div class="col-8">
                                    <span class="form-control-plaintext kt-font-bolder">{{$cPerson->name}}</span>
                                </div>
                            </div>
                            <div class="form-group form-group-xs row">
                                <label class="col-4 col-form-label">Designation:</label>
                                <div class="col-8">
                                    <span class="form-control-plaintext kt-font-bolder">{{$cPerson->designation}}</span>
                                </div>
                            </div>
                            <div class="form-group form-group-xs row">
                                <label class="col-4 col-form-label">Phone:</label>
                                <div class="col-8">
                                    <span class="form-control-plaintext kt-font-bolder">{{$cPerson->number}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
                @else
            <div class="col-lg-12">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                No Contact Person For This Customer
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            @endif

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