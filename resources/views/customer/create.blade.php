@extends('layouts.m')
@section('title', 'Customer Create')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Create Customer
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{route('home')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('customer.list')}}" class="kt-subheader__breadcrumbs-link">Customer</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('customer.create')}}"
                       class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active"
                       style="padding-right: 1rem;">Create</a>
                </div>
            </div>
            <div class="kt-subheader__toolbar"></div>
        </div>
    </div>

@endsection
@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__body">
                <div class="tab-content">
                    <div class="tab-pane active" id="kt_user_edit_tab_1" role="tabpanel">
                        <div class="kt-form kt-form--label-right">
                            <div class="kt-form__body">
                                <div class="kt-section kt-section--first">
                                    <form action="{{route('customer.store')}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="kt-section__body">
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                                                <div class="col-lg-9 col-xl-6">

                                                    <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                                                        <div class="kt-avatar__holder"
                                                             style="background-image: url({{asset('avatar.png')}})"></div>
                                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip"
                                                               title="" data-original-title="Change avatar">
                                                            <i class="fa fa-pen"></i>
                                                            <input type="file" name="avatar"
                                                                   accept=".png, .jpg, .jpeg">
                                                        </label>
                                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip"
                                                              title="" data-original-title="Cancel avatar">
														<i class="fa fa-times"></i>
													</span>
                                                    </div>
                                                    <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Name
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"
                                                           type="text" placeholder="Full Name" name="name" required
                                                           value="{{old('name')}}">
                                                    @if($errors->has('name'))
                                                        <span class="invalid-feedback">{{$errors->first('name')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Company Name
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{$errors->has('companyName') ? 'is-invalid' : ''}}"
                                                           type="text" placeholder="Company Name" name="companyName"
                                                           required value="{{old('companyName')}}">
                                                    @if($errors->has('companyName'))
                                                        <span class="invalid-feedback">{{$errors->first('companyName')}}</span>
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
                                                               placeholder="Select date" id="kt_datepicker_3"
                                                               value="{{old('dateOfBirth')}}">
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
                                                    BIN Certificate
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{$errors->has('binNumber') ? 'is-invalid' : ''}}"
                                                           type="text" placeholder="BIN Certificate" name="binNumber"
                                                           required value="{{old('binNumber')}}">
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
                                                               for="customFile2">BIN Certificate File</label>
                                                    </div>
                                                    <span class="form-text text-muted">Max file size is 10MB and max number of files is 1.</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    TIN Number
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{$errors->has('tinNumber') ? 'is-invalid' : ''}}"
                                                           type="text" placeholder="TIN Number" name="tinNumber"
                                                           required value="{{old('tinNumber')}}">
                                                    @if($errors->has('tinNumber'))
                                                        <span class="invalid-feedback">{{$errors->first('tinNumber')}}</span>
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
                                                    <input class="form-control {{$errors->has('nidNumber') ? 'is-invalid' : ''}}"
                                                           type="text" placeholder="NID Number" name="nidNumber"
                                                           required value="{{old('nidNumber')}}">
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
                                                           type="text" placeholder="Business Address"
                                                           name="businessAddress" required
                                                           value="{{old('businessAddress')}}">
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
                                                           type="text" placeholder="Business Area" name="businessArea"
                                                           required value="{{old('businessArea')}}">
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
                                                               type="text" placeholder="Business Telephone"
                                                               name="businessTelephone" required
                                                               value="{{old('businessTelephone')}}">
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
                                                               type="text" placeholder="Business Telephone 2"
                                                               name="businessTelephone2"
                                                               value="{{old('businessTelephone2')}}">
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
                                                               type="email" placeholder="Business Email"
                                                               name="businessEmail" required
                                                               value="{{old('businessEmail')}}">
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
                                                               type="email" placeholder="Business Alternative Email"
                                                               name="businessEmail2" value="{{old('businessEmail2')}}">
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
                                                        <option selected disabled hidden>Choose...</option>
                                                        @foreach($customerTypes as $ct)
                                                            <option value="{{$ct->id}}">{{$ct->title}}</option>
                                                        @endforeach
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
                                                               type="text" placeholder="Company Site" name="companySite"
                                                               required value="{{old('companySite')}}">
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
                                                            Create
                                                        </button>
                                                        <a href="javascript:void (0)" data-link="{{route('cancel')}}"
                                                           class="cancel btn btn-label-danger btn-bold float-right">Reset</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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

    <script src="{{asset('m/assets/js/pages/crud/file-upload/ktavatar.js')}}" type="text/javascript"></script>

    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"
            type="text/javascript"></script>


    <!--end::Page Vendors -->

    <!--begin::Page Scripts(used by this page) -->

    <!--end::Page Scripts -->
@endsection