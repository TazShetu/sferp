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
            <div class="alert alert-success text-center">
                {{session('Success')}}
            </div>
            {{--        @elseif(session('Cannotdelete'))--}}
            {{--            <div class="alert alert-warning text-center">--}}
            {{--                {{session('Cannotdelete')}}--}}
            {{--            </div>--}}
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
                            <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1"
                               role="tab">
                                <svg width="24px" height="24px"
                                     viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                              fill="#000000" fill-rule="nonzero"/>
                                        <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                              fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg>
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_2" role="tab">
                                <svg width="24px" height="24px"
                                     viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                              fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                              fill="#000000" fill-rule="nonzero"/>
                                    </g>
                                </svg>
                                Contact Person
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_3" role="tab">
                                <svg width="24px" height="24px"
                                     viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                              fill="#000000" opacity="0.3"/>
                                        <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"
                                              fill="#000000" opacity="0.3"/>
                                        <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                                              fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg>
                                Map
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="tab-content">
                    <div class="tab-pane active" id="kt_user_edit_tab_1" role="tabpanel">
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
                                                    <input class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"
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
                                                        <input class="form-control {{$errors->has('dateOfBirth') ? 'is-invalid' : ''}}"
                                                               type="text" name="dateOfBirth" required readonly
                                                               id="kt_datepicker_2"
                                                               value="{{$customer->dob}}">
                                                        <div class="input-group-append">
														<span class="input-group-text">
															<i class="la la-calendar-check-o"></i>
														</span>
                                                        </div>
                                                    </div>
                                                    @if($errors->has('dateOfBirth'))
                                                        <span class="invalid-feedback">{{$errors->first('dateOfBirth')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Company Name
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{$errors->has('companyName') ? 'is-invalid' : ''}}"
                                                           type="text" name="companyName"
                                                           required value="{{$customer->company_name}}">
                                                    @if($errors->has('companyName'))
                                                        <span class="invalid-feedback">{{$errors->first('companyName')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    VAT/BIN Number
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{$errors->has('binNumber') ? 'is-invalid' : ''}}"
                                                           type="text" name="binNumber"
                                                           required value="{{$customer->bin}}">
                                                    @if($errors->has('binNumber'))
                                                        <span class="invalid-feedback">{{$errors->first('binNumber')}}</span>
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
                                                               for="customFile2">Tax / Bin File</label>
                                                    </div>
                                                    <span class="form-text text-muted">Max file size is 10MB and max number of files is 1.</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    NID Number
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{$errors->has('nidNumber') ? 'is-invalid' : ''}}"
                                                           type="text" name="nidNumber"
                                                           required value="{{$customer->nid}}">
                                                    @if($errors->has('nidNumber'))
                                                        <span class="invalid-feedback">{{$errors->first('nidNumber')}}</span>
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
                                                    <input class="form-control {{$errors->has('businessAddress') ? 'is-invalid' : ''}}"
                                                           type="text" name="businessAddress" required
                                                           value="{{$customer->business_address}}">
                                                    @if($errors->has('businessAddress'))
                                                        <span class="invalid-feedback">{{$errors->first('businessAddress')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Business Area/Zone
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{$errors->has('businessArea') ? 'is-invalid' : ''}}"
                                                           type="text" name="businessArea"
                                                           required value="{{$customer->business_area}}">
                                                    @if($errors->has('businessArea'))
                                                        <span class="invalid-feedback">{{$errors->first('businessArea')}}</span>
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
                                                        <input class="form-control {{$errors->has('businessTelephone') ? 'is-invalid' : ''}}"
                                                               type="text" name="businessTelephone" required
                                                               value="{{$customer->business_telephone}}">
                                                        @if($errors->has('businessTelephone'))
                                                            <span class="invalid-feedback">{{$errors->first('businessTelephone')}}</span>
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
                                                        <input class="form-control {{$errors->has('businessTelephone2') ? 'is-invalid' : ''}}"
                                                               type="text" name="businessTelephone2"
                                                               value="{{$customer->business_telephone_2}}">
                                                        @if($errors->has('businessTelephone2'))
                                                            <span class="invalid-feedback">{{$errors->first('businessTelephone2')}}</span>
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
                                                        <input class="form-control {{$errors->has('businessEmail') ? 'is-invalid' : ''}}"
                                                               type="email" name="businessEmail" required
                                                               value="{{$customer->business_email}}">
                                                        @if($errors->has('businessEmail'))
                                                            <span class="invalid-feedback">{{$errors->first('businessEmail')}}</span>
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
                                                        <input class="form-control {{$errors->has('businessEmail2') ? 'is-invalid' : ''}}"
                                                               type="email" name="businessEmail2"
                                                               value="{{$customer->business_email_2}}">
                                                        @if($errors->has('businessEmail2'))
                                                            <span class="invalid-feedback">{{$errors->first('businessEmail2')}}</span>
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
                                                        <option selected hidden
                                                                value="{{$customer->type}}">{{$customer->type}}</option>
                                                        <option value="Dealer">Dealer</option>
                                                        <option value="Sub Dealer">Sub Dealer</option>
                                                        <option value="Individual">Individual</option>
                                                    </select>
                                                    @if($errors->has('customerType'))
                                                        <span class="invalid-feedback">{{$errors->first('customerType')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group form-group-last row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Company Site</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="input-group">
                                                        <input class="form-control {{$errors->has('companySite') ? 'is-invalid' : ''}}"
                                                               type="text" name="companySite"
                                                               required value="{{$customer->company_site}}">
                                                        @if($errors->has('companySite'))
                                                            <span class="invalid-feedback">{{$errors->first('companySite')}}</span>
                                                        @endif
                                                        <div class="input-group-append"><span
                                                                    class="input-group-text">.com</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
                                            <div class="kt-form__actions">
                                                <div class="row">
                                                    <div class="col-xl-3"></div>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <button type="submit" class="btn btn-label-brand btn-bold">
                                                            Save Changes
                                                        </button>
                                                        <a href="javascript:void (0)" data-link="{{route('cancel')}}"
                                                           class="cancel btn btn-label-danger btn-bold float-right">Cancel</a>
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
                    <div class="tab-pane" id="kt_user_edit_tab_2" role="tabpanel">
                        <div class="kt-form kt-form--label-right">
                            <div class="kt-form__body">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        {{--Form Start--}}
                                        <form action="{{route('customer.update.contact.person', ['cid' => $customer->id])}}"
                                              method="post">
                                            @csrf
                                            {{--                                            <input class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"--}}
                                            {{--                                                   type="text" name="name" required--}}
                                            {{--                                                   value="{{$customer->name}}">--}}
                                            <div id="kt_repeater_1">
                                                <div class="form-group form-group-last row" id="kt_repeater_1">
                                                    <!-- <label class="col-lg-2 col-form-label">Contacts:</label> -->
                                                    <div data-repeater-list="" class="col-lg-12">

                                                        {{--    Start loop                                                --}}




                                                        {{--               End loop                                     --}}


                                                        <div class="form-group row align-items-center"
                                                             data-repeater-item>
                                                            <input class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"
                                                                   type="text" name="name" required
                                                                   value="{{$customer->name}}">
                                                            <div class="col-md-3">
                                                                <div class="kt-form__group--inline">
                                                                    <div class="kt-form__label">
                                                                        <label>Contact Person Name:</label>
                                                                    </div>
                                                                    <div class="kt-form__control">
                                                                        <input type="text" class="form-control"
                                                                               name="cName"
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
                                                                   class="btn-sm btn btn-label-danger btn-bold"
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
                                                        <a href="javascript:;" data-repeater-create=""
                                                           class="btn btn-bold btn-sm btn-label-brand">
                                                            <i class="la la-plus"></i> Add Another Contact Person
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
                                            <div class="kt-form__actions">
                                                <div class="row">
                                                    <div class="col-xl-3"></div>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <button type="submit" class="btn btn-label-brand btn-bold">
                                                            Save Changes
                                                        </button>
                                                        <a href="javascript:void (0)" data-link="{{route('cancel')}}"
                                                           class="cancel btn btn-label-danger btn-bold float-right">Cancel</a>
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
                    <div class="tab-pane" id="kt_user_edit_tab_3" role="tabpanel">
                        <div class="kt-form kt-form--label-right">
                            {{--Form Start--}}
                            <div class="kt-form__body">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        <div id="kt_gmap_3" style="height:300px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-xl-3"></div>
                                    <div class="col-lg-9 col-xl-6">
                                        <a href="#" class="btn btn-label-brand btn-bold">Save
                                            changes</a>
                                        <a href="#" class="btn btn-clean btn-bold">Cancel</a>
                                    </div>
                                </div>
                            </div>
                            {{--Form End--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
{{--@section('stickyToolbar')    --}}
{{--@endsection--}}
@section('script')
    <!--begin::Page Vendors(used by this page) -->
    <script src="//maps.google.com/maps/api/js?key=AIzaSyCov7B-_iu45lPJn7iMSoh0--mDBtdBOOk"
            type="text/javascript"></script>
    <!--end::Page Vendors -->

    <!--begin::Page Scripts(used by this page) -->
    <script src="{{asset('m/assets/js/pages/custom/user/edit-user.js')}}" type="text/javascript"></script>
    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"
            type="text/javascript"></script>
    <script>
        var page_map = new GMaps({
            div: '#kt_gmap_3',
            lat: 23.724728,
            lng: 90.410900,
        });
        page_map.addMarker({
            lat: 23.724728,
            lng: 90.410900,
            title: 'Office',
            details: {
                database_id: 42,
                author: 'HPNeo'
            },
            click: function (e) {
                if (console.log) console.log(e);
                alert('You clicked in this marker');
            }
        });
        // map.addMarker({
        //     lat: -12.042,
        //     lng: -77.028333,
        //     title: 'Marker with InfoWindow',
        //     infoWindow: {
        //         content: '<span style="color:#000">HTML Content!</span>'
        //     }
        // });
        page_map.setZoom(5);
        $('#kt_gmap_3').height('500px').width('auto');

    </script>
    {{--    <script src="{{asset('m/assets/js/pages/crud/file-upload/uppy.js')}}" type="text/javascript"></script>--}}

    {{--    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/form-repeater.js')}}" type="text/javascript"></script>--}}
    <script>
        jQuery(document).ready(function () {
            $('#kt_repeater_1').repeater({
                initEmpty: false,
                show: function () {
                    $(this).slideDown();
                },
                hide: function (deleteElement) {
                    $(this).slideUp(deleteElement);
                }
            });
        });
    </script>
    <!--end::Page Scripts -->
@endsection