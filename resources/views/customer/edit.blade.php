@extends('layouts.m')
@section('title', 'Customer Edit')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Edit Customer
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{route('home')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('customer.list')}}" class="kt-subheader__breadcrumbs-link">Customer</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="javascript:void (0)"
                       class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active"
                       style="padding-right: 1rem;">Edit</a>
                </div>
            </div>
            <div class="kt-subheader__toolbar"></div>
        </div>
    </div>
@endsection
@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        @if(session('Success'))
            <div class="alert alert-success text-center" id="toaster">
                {{session('Success')}}
            </div>
        @elseif(session('unsuccess'))
            <div class="alert alert-warning text-center" id="toaster">
                {{session('unsuccess')}}
            </div>
        @endif
        @if($errors->has('cName') || $errors->has('designation') || $errors->has('number'))
            <div class="alert alert-danger text-center">
                Please Do Not Mess With The Original Code !!!
            </div>
        @endif
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-toolbar">
                    <ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand"
                        role="tablist">
                        <li class="nav-item">
                            <a class="nav-link {{ ($is_edit) ? '' : 'active' }}" data-toggle="tab"
                               href="#kt_user_edit_tab_1"
                               role="tab">
                                <svg width="24px" height="24px"
                                     viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path
                                            d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                            fill="#000000" fill-rule="nonzero"/>
                                        <path
                                            d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                            fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg>
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ ($is_edit) ? 'active' : '' }}" data-toggle="tab"
                               href="#kt_user_edit_tab_2" role="tab">
                                <svg width="24px" height="24px"
                                     viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path
                                            d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <path
                                            d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                            fill="#000000" fill-rule="nonzero"/>
                                    </g>
                                </svg>
                                Contact Person
                            </a>
                        </li>
                        @if((($customer->customertype_id * 1) == 1) || (($customer->customertype_id * 1) == 2))
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_3" role="tab">
                                    <svg width="24px" height="24px"
                                         viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path
                                                d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                                fill="#000000" opacity="0.3"/>
                                            <path
                                                d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"
                                                fill="#000000" opacity="0.3"/>
                                            <path
                                                d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                                                fill="#000000" opacity="0.3"/>
                                        </g>
                                    </svg>
                                    Hierarchy
                                </a>
                            </li>
                        @endif
                        {{--                        @if(count($products) > 0)--}}
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_4" role="tab">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path
                                            d="M5.5,6 C6.32842712,6 7,6.67157288 7,7.5 L7,18.5 C7,19.3284271 6.32842712,20 5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,7.5 C4,6.67157288 4.67157288,6 5.5,6 Z M11.5,11 C12.3284271,11 13,11.6715729 13,12.5 L13,18.5 C13,19.3284271 12.3284271,20 11.5,20 C10.6715729,20 10,19.3284271 10,18.5 L10,12.5 C10,11.6715729 10.6715729,11 11.5,11 Z M17.5,15 C18.3284271,15 19,15.6715729 19,16.5 L19,18.5 C19,19.3284271 18.3284271,20 17.5,20 C16.6715729,20 16,19.3284271 16,18.5 L16,16.5 C16,15.6715729 16.6715729,15 17.5,15 Z"
                                            fill="#000000"/>
                                    </g>
                                </svg>
                                Product Discount
                            </a>
                        </li>
                        {{--                        @endif--}}


                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_5" role="tab">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M17,2 L19,2 C20.6568542,2 22,3.34314575 22,5 L22,19 C22,20.6568542 20.6568542,22 19,22 L17,22 L17,2 Z" fill="#000000" opacity="0.3"/>
                                        <path d="M4,2 L16,2 C17.6568542,2 19,3.34314575 19,5 L19,19 C19,20.6568542 17.6568542,22 16,22 L4,22 C3.44771525,22 3,21.5522847 3,21 L3,3 C3,2.44771525 3.44771525,2 4,2 Z M11.1176481,13.709585 C10.6725287,14.1547043 9.99251947,14.2650547 9.42948307,13.9835365 C8.86644666,13.7020183 8.18643739,13.8123686 7.74131803,14.2574879 L6.2303083,15.7684977 C6.17542087,15.8233851 6.13406645,15.8902979 6.10952004,15.9639372 C6.02219616,16.2259088 6.16377615,16.5090688 6.42574781,16.5963927 L7.77956724,17.0476658 C9.07965249,17.4810276 10.5130001,17.1426601 11.4820264,16.1736338 L15.4812434,12.1744168 C16.3714821,11.2841781 16.5921828,9.92415954 16.0291464,8.79808673 L15.3965752,7.53294436 C15.3725414,7.48487691 15.3409156,7.44099843 15.302915,7.40299777 C15.1076528,7.20773562 14.7910703,7.20773562 14.5958082,7.40299777 L13.0032662,8.99553978 C12.5581468,9.44065914 12.4477965,10.1206684 12.7293147,10.6837048 C13.0108329,11.2467412 12.9004826,11.9267505 12.4553632,12.3718698 L11.1176481,13.709585 Z" fill="#000000"/>
                                    </g>
                                </svg>
                                Extra Contact info
                            </a>
                        </li>





                    </ul>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="tab-content">
                    <div class="tab-pane {{ ($is_edit) ? '' : 'active' }}" id="kt_user_edit_tab_1" role="tabpanel">
                        <div class="kt-form kt-form--label-right">
                            <div class="kt-form__body">
                                <div class="kt-section kt-section--first">
                                    {{--      Form Start    --}}
                                    <form action="{{route('customer.update', ['cid' => $customer->id])}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="kt-section__body">
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="kt-avatar kt-avatar--outline kt-avatar--circle-"
                                                         id="kt_user_edit_avatar">
                                                        <div class="kt-avatar__holder"
                                                             @if($customer->image != null)
                                                             style="background-image: url('{{asset($customer->image)}}');"
                                                             @else
                                                             style="background-image: url('{{asset('/avatar.png')}}');"
                                                            @endif
                                                        ></div>
                                                        <label class="kt-avatar__upload"
                                                               data-toggle="kt-tooltip" title=""
                                                               data-original-title="Change avatar">
                                                            <i class="fa fa-pen"></i>
                                                            <input type="file" name="avatar"
                                                                   accept=".png, .jpg, .jpeg">
                                                        </label>
                                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip"
                                                              title=""
                                                              data-original-title="Cancel avatar">
                                                            <i class="fa fa-times"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Name
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"
                                                        type="text" name="name" required
                                                        value="{{$customer->name}}">
                                                    @if($errors->has('name'))
                                                        <span class="invalid-feedback">{{$errors->first('name')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Date Of Birth</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="input-group date">
                                                        <input
                                                            class="form-control {{$errors->has('dateOfBirth') ? 'is-invalid' : ''}}"
                                                            type="text" name="dateOfBirth" required readonly
                                                            id="kt_datepicker_3"
                                                            value="{{date('m/d/Y',strtotime($customer->dob))}}">
                                                        <div class="input-group-append">
														<span class="input-group-text">
															<i class="la la-calendar-check-o"></i>
														</span>
                                                        </div>
                                                    </div>
                                                    @if($errors->has('dateOfBirth'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('dateOfBirth')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Business Organization's Name
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{$errors->has('companyName') ? 'is-invalid' : ''}}"
                                                        type="text" name="companyName"
                                                        required value="{{$customer->company_name}}">
                                                    @if($errors->has('companyName'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('companyName')}}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    VAT registration / BIN Certificate
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{$errors->has('binNumber') ? 'is-invalid' : ''}}"
                                                        type="text" name="binNumber" value="{{$customer->bin}}">
                                                    @if($errors->has('binNumber'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('binNumber')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Upload File:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div></div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile2"
                                                               name="binFile">
                                                        <label class="custom-file-label" style="text-align: left;"
                                                               for="customFile2">VAT registration / BIN Certificate
                                                            File</label>
                                                    </div>
                                                    <span class="form-text text-muted">Max file size is 10MB and max number of files is 1.</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    TIN Number
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{$errors->has('tinNumber') ? 'is-invalid' : ''}}"
                                                        type="text" placeholder="TIN Number" name="tinNumber"
                                                        value="{{$customer->tin}}">
                                                    @if($errors->has('tinNumber'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('tinNumber')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Upload File:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div></div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile2"
                                                               name="tinFile">
                                                        <label class="custom-file-label" style="text-align: left;"
                                                               for="customFile2">TIN File</label>
                                                    </div>
                                                    <span class="form-text text-muted">Max file size is 10MB and max number of files is 1.</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    NID Number
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{$errors->has('nidNumber') ? 'is-invalid' : ''}}"
                                                        type="text" name="nidNumber"
                                                        value="{{$customer->nid}}">
                                                    @if($errors->has('nidNumber'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('nidNumber')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Upload File:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div></div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                               name="nidFile">
                                                        <label class="custom-file-label" style="text-align: left;"
                                                               for="customFile">NID Card File</label>
                                                    </div>
                                                    <span class="form-text text-muted">Max file size is 10MB and max number of files is 1.</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Business Address
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{$errors->has('businessAddress') ? 'is-invalid' : ''}}"
                                                        type="text" name="businessAddress" required
                                                        value="{{$customer->business_address}}">
                                                    @if($errors->has('businessAddress'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('businessAddress')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Business Area/Zone
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{$errors->has('businessArea') ? 'is-invalid' : ''}}"
                                                        type="text" name="businessArea"
                                                        required value="{{$customer->business_area}}">
                                                    @if($errors->has('businessArea'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('businessArea')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Business Telephone (1)</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span
                                                                class="input-group-text"><i
                                                                    class="la la-phone"></i></span></div>
                                                        <input
                                                            class="form-control {{$errors->has('businessTelephone') ? 'is-invalid' : ''}}"
                                                            type="text" name="businessTelephone" required
                                                            value="{{$customer->business_telephone}}">
                                                        @if($errors->has('businessTelephone'))
                                                            <span
                                                                class="invalid-feedback">{{$errors->first('businessTelephone')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Business Telephone (2)</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span
                                                                class="input-group-text"><i
                                                                    class="la la-phone"></i></span></div>
                                                        <input
                                                            class="form-control {{$errors->has('businessTelephone2') ? 'is-invalid' : ''}}"
                                                            type="text" name="businessTelephone2"
                                                            value="{{$customer->business_telephone_2}}">
                                                        @if($errors->has('businessTelephone2'))
                                                            <span
                                                                class="invalid-feedback">{{$errors->first('businessTelephone2')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Business Email Address
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span
                                                                class="input-group-text"><i
                                                                    class="la la-at"></i></span></div>
                                                        <input
                                                            class="form-control {{$errors->has('businessEmail') ? 'is-invalid' : ''}}"
                                                            type="email" name="businessEmail"
                                                            value="{{$customer->business_email}}">
                                                        @if($errors->has('businessEmail'))
                                                            <span
                                                                class="invalid-feedback">{{$errors->first('businessEmail')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Alternate Email Address
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span
                                                                class="input-group-text"><i
                                                                    class="la la-at"></i></span></div>
                                                        <input
                                                            class="form-control {{$errors->has('businessEmail2') ? 'is-invalid' : ''}}"
                                                            type="email" name="businessEmail2"
                                                            value="{{$customer->business_email_2}}">
                                                        @if($errors->has('businessEmail2'))
                                                            <span
                                                                class="invalid-feedback">{{$errors->first('businessEmail2')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Customer Type
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select class="form-control" name="customerType" required>
                                                        <option selected hidden value="{{$customer->customertype_id}}">
                                                            {{$customer->type}}
                                                        </option>
                                                        @foreach($customerTypes as $ct)
                                                            <option value="{{$ct->id}}">{{$ct->title}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('customerType'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('customerType')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group form-group-last row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Company Site</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="input-group">
                                                        <input
                                                            class="form-control {{$errors->has('companySite') ? 'is-invalid' : ''}}"
                                                            type="text" name="companySite"
                                                            required value="{{$customer->company_site}}">
                                                        @if($errors->has('companySite'))
                                                            <span
                                                                class="invalid-feedback">{{$errors->first('companySite')}}</span>
                                                        @endif
                                                        {{--                                                        <div class="input-group-append"><span--}}
                                                        {{--                                                                class="input-group-text">.com</span></div>--}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
                                            <div class="kt-form__actions">
                                                <div class="row">
                                                    <div class="col-xl-3"></div>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <button type="submit" class="btn btn-label-brand btn-bold">
                                                            Save Changes
                                                        </button>
                                                        <a href="javascript:void (0)" data-link="{{route('cancel')}}"
                                                           class="cancel btn btn-label-danger btn-bold float-right">Reset</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {{--Form End--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane {{ ($is_edit) ? 'active' : '' }}" id="kt_user_edit_tab_2" role="tabpanel">
                        <div class="kt-form kt-form--label-right">
                            <div class="kt-form__body">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        {{--Form Start--}}
                                        <form
                                            action="{{route('customer.update.contact.person', ['cid' => $customer->id])}}"
                                            method="post">
                                            @csrf
                                            <div id="kt_repeater_1">
                                                <div class="form-group form-group-last row" id="kt_repeater_1">
                                                    <div class="col-lg-12" id="repeat-content">
                                                        @foreach($cPersons as $cPerson)
                                                            <div
                                                                class="form-group row align-items-center remove-content">
                                                                <div class="col-md-3">
                                                                    <div class="kt-form__group--inline">
                                                                        <div class="kt-form__label">
                                                                            <label>Contact Person Name:</label>
                                                                        </div>
                                                                        <div class="kt-form__control">
                                                                            <input type="text" class="form-control"
                                                                                   name="cName[]"
                                                                                   value="{{$cPerson->name}}"
                                                                                   required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="kt-form__group--inline">
                                                                        <div class="kt-form__label">
                                                                            <label>Contact Person Designation:</label>
                                                                        </div>
                                                                        <div class="kt-form__control">
                                                                            <input type="text" class="form-control"
                                                                                   name="designation[]"
                                                                                   value="{{$cPerson->designation}}"
                                                                                   required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="kt-form__group--inline">
                                                                        <div class="kt-form__label">
                                                                            <label class="kt-label m-label--single">Contact
                                                                                Person Number:</label>
                                                                        </div>
                                                                        <div class="kt-form__control">
                                                                            <input type="text" class="form-control"
                                                                                   name="number[]" required
                                                                                   value="{{$cPerson->number}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <a href="javascript:;" data-repeater-delete=""
                                                                       class="btn-sm btn btn-label-danger btn-bold delete-btn"
                                                                       style="margin-top: 24px;">
                                                                        <i class="la la-trash-o"></i>
                                                                        Delete
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        <div class="form-group row align-items-center remove-content">
                                                            <div class="col-md-3">
                                                                <div class="kt-form__group--inline">
                                                                    <div class="kt-form__label">
                                                                        <label>Contact Person Name:</label>
                                                                    </div>
                                                                    <div class="kt-form__control">
                                                                        <input type="text" class="form-control"
                                                                               name="cName[]"
                                                                               placeholder="Enter full name" required>
                                                                    </div>
                                                                </div>
                                                                <div class="d-md-none kt-margin-b-10"></div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="kt-form__group--inline">
                                                                    <div class="kt-form__label">
                                                                        <label>Contact Person Designation:</label>
                                                                    </div>
                                                                    <div class="kt-form__control">
                                                                        <input type="text" class="form-control"
                                                                               name="designation[]"
                                                                               placeholder="Enter Designation" required>
                                                                    </div>
                                                                </div>
                                                                <div class="d-md-none kt-margin-b-10"></div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="kt-form__group--inline">
                                                                    <div class="kt-form__label">
                                                                        <label class="kt-label m-label--single">Contact
                                                                            Person Number:</label>
                                                                    </div>
                                                                    <div class="kt-form__control">
                                                                        <input type="text" class="form-control"
                                                                               name="number[]" required
                                                                               placeholder="Enter contact number">
                                                                    </div>
                                                                </div>
                                                                <div class="d-md-none kt-margin-b-10"></div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a href="javascript:;" data-repeater-delete=""
                                                                   class="btn-sm btn btn-label-danger btn-bold delete-btn"
                                                                   style="margin-top: 24px;">
                                                                    <i class="la la-trash-o"></i>
                                                                    Delete
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group form-group-last row">
                                                    <!-- <label class="col-lg-2 col-form-label"></label> -->
                                                    <div class="col-lg-4">
                                                        <a href="javascript:;" id="add-btn"
                                                           class="btn btn-bold btn-sm btn-label-brand">
                                                            <i class="la la-plus"></i> Add Another Contact Person
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
                                            <div class="kt-form__actions">
                                                <div class="row">
                                                    <div class="col-xl-3"></div>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <button type="submit" class="btn btn-label-brand btn-bold">
                                                            Save Changes
                                                        </button>
                                                        <a href="javascript:void (0)" data-link="{{route('cancel')}}"
                                                           class="cancel btn btn-label-danger btn-bold float-right">Reset</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        {{--Form End--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if((($customer->customertype_id * 1) == 1) || (($customer->customertype_id * 1) == 2))

                        @include('include.m.customerEdit.hierarchy')

                    @endif
                    @if(count($products) > 0)
                        <div class="tab-pane" id="kt_user_edit_tab_4" role="tabpanel">
                            <div class="kt-form kt-form--label-right">
                                <div class="kt-form__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body">
                                            {{--Form Start--}}
                                            <form
                                                action="{{route('customer.product.discount.update', ['cid' => $customer->id])}}"
                                                method="post">
                                                @csrf
                                                <div id="kt_repeater_1">
                                                    <div class="form-group form-group-last row"
                                                         id="kt_repeater_1">
                                                        <div class="col-lg-12" id="repeat-content-product-discount">
                                                            @foreach($aps as $ap)
                                                                <div
                                                                    class="form-group row align-items-center remove-content">
                                                                    <div class="col-md-3">
                                                                        <div class="kt-form__group--inline">
                                                                            <div class="kt-form__label">
                                                                                <label>Product:</label>
                                                                            </div>
                                                                            <div class="kt-form__control">
                                                                                <select
                                                                                    class="form-control kt-selectpicker"
                                                                                    name="product[]"
                                                                                    data-live-search="true"
                                                                                    data-size="7">
                                                                                    <option selected hidden
                                                                                            value="{{$ap->product_id}}">
                                                                                        {{$ap->product_name}}
                                                                                    </option>
                                                                                    @foreach($aps as $apP)
                                                                                        <option
                                                                                            value="{{$apP->product_id}}">{{$apP->product_name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-md-none kt-margin-b-10"></div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="kt-form__group--inline">
                                                                            <div class="kt-form__label">
                                                                                <label>Discount:</label>
                                                                            </div>
                                                                            <div class="kt-form__control">
                                                                                <input type="number"
                                                                                       class="form-control"
                                                                                       name="discount[]" required
                                                                                       step="0.01" min="0"
                                                                                       value="{{$ap->discount}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-md-none kt-margin-b-10"></div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <a href="javascript:;"
                                                                           data-repeater-delete=""
                                                                           class="btn-sm btn btn-label-danger btn-bold delete-btn"
                                                                           style="margin-top: 24px;">
                                                                            <i class="la la-trash-o"></i>
                                                                            Delete
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                            @if(isset($products) && isset($aps) && (count($products) != count($aps)))
                                                                <div
                                                                    class="form-group row align-items-center remove-content">
                                                                    <div class="col-md-3">
                                                                        <div class="kt-form__group--inline">
                                                                            <div class="kt-form__label">
                                                                                <label>Product:</label>
                                                                            </div>
                                                                            <div class="kt-form__control">
                                                                                <select
                                                                                    class="form-control kt-selectpicker"
                                                                                    name="product[]"
                                                                                    data-live-search="true"
                                                                                    data-size="7">
                                                                                    <option selected hidden disabled
                                                                                            value="">
                                                                                        Choose...
                                                                                    </option>
                                                                                    @foreach($products as $p)
                                                                                        <option
                                                                                            value="{{$p->id}}">{{$p->name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-md-none kt-margin-b-10"></div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="kt-form__group--inline">
                                                                            <div class="kt-form__label">
                                                                                <label>Discount:</label>
                                                                            </div>
                                                                            <div class="kt-form__control">
                                                                                <input type="number"
                                                                                       class="form-control"
                                                                                       name="discount[]" required
                                                                                       step="0.01" min="0">
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-md-none kt-margin-b-10"></div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <a href="javascript:;"
                                                                           data-repeater-delete=""
                                                                           class="btn-sm btn btn-label-danger btn-bold delete-btn"
                                                                           style="margin-top: 24px;">
                                                                            <i class="la la-trash-o"></i>
                                                                            Delete
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-group-last row">
                                                        <!-- <label class="col-lg-2 col-form-label"></label> -->
                                                        <div class="col-lg-4">
                                                            <a href="javascript:;" id="add-btn-product-discount"
                                                               class="btn btn-bold btn-sm btn-label-brand">
                                                                <i class="la la-plus"></i> Add Another Product Discount
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
                                                <div class="kt-form__actions">
                                                    <div class="row">
                                                        <div class="col-xl-3"></div>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <button type="submit"
                                                                    class="btn btn-label-brand btn-bold">
                                                                Save Changes
                                                            </button>
                                                            <a href="javascript:void (0)"
                                                               data-link="{{route('cancel')}}"
                                                               class="cancel btn btn-label-danger btn-bold float-right">Reset</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            {{--Form End--}}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @else
                        <div class="tab-pane" id="kt_user_edit_tab_4" role="tabpanel">
                            <div class="kt-form kt-form--label-right">
                                <div class="kt-form__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body">
                                            No Product has been created yet. Please first create product <a
                                                href="{{route('product.create')}}">here</a>.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @include('include.m.customerEdit.extra')

                </div>
            </div>
        </div>
    </div>

@endsection
{{--@section('stickyToolbar')    --}}
{{--@endsection--}}
@section('script')
    <!--begin::Page Vendors(used by this page) -->
    <!--end::Page Vendors -->

    <!--begin::Page Scripts(used by this page) -->
    <script src="{{asset('m/assets/js/pages/custom/user/edit-user.js')}}" type="text/javascript"></script>
    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"
            type="text/javascript"></script>


    {{--    <script src="{{asset('m/assets/js/pages/crud/file-upload/uppy.js')}}" type="text/javascript"></script>--}}

    {{--    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/form-repeater.js')}}" type="text/javascript"></script>--}}
    {{--    <script src="{{asset('plugins/select2/select2.full.min.js')}}" type="text/javascript"></script>--}}

    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/bootstrap-select.js')}}" type="text/javascript"></script>

    @include('include.m.customerEdit.js1')
    <!--end::Page Scripts -->
@endsection
