@extends('layouts.m')
@section('title', 'Employee Create')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Employee Create
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{route('home')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('employee.list')}}" class="kt-subheader__breadcrumbs-link">Employee</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="javascript:void (0)"
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
        @if(session('Success'))
            <div class="alert alert-success text-center" id="toaster">
                {{session('Success')}}
            </div>
        @elseif(session('unsuccess'))
            <div class="alert alert-warning text-center" id="toaster">
                {{session('unsuccess')}}
            </div>
        @endif
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__body">
                <div class="tab-content">
                    <div id="kt_user_edit_tab_1" class="tab-pane active">
                        <div class="kt-form kt-form--label-right">
                            <div class="kt-form__body">
                                <div class="kt-section kt-section--first">
                                    {{--      Form Start    --}}
                                    <form action="{{route('employee.store')}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="kt-section__body">
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Name*
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{($errors->has('name')) ? 'is-invalid' : ''}}"
                                                        type="text" name="name" required value="{{old('name')}}">
                                                    @if($errors->has('name'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('name')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Designation*
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select
                                                        class="form-control {{($errors->has('designation')) ? 'is-invalid' : ''}}"
                                                        name="designation" required>
                                                        <option selected disabled hidden value="">Choose...</option>
                                                        @foreach($designations as $d)
                                                            <option value="{{$d->id}}">{{$d->title}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('designation'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('designation')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Mobile*
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{($errors->has('mobile')) ? 'is-invalid' : ''}}"
                                                        type="text" name="mobile" required
                                                        value="{{old('mobile')}}">
                                                    @if($errors->has('mobile'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('mobile')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Email
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" type="email" name="email"
                                                           value="{{old('email')}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Address
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" type="text" name="address"
                                                           value="{{old('address')}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Date Of Birth</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="input-group date">
                                                        <input
                                                            class="form-control {{$errors->has('dateOfBirth') ? 'is-invalid' : ''}}"
                                                            type="text" name="dateOfBirth" readonly
                                                            placeholder="Select date" id="kt_datepicker_3"
                                                            value="{{old('dateOfBirth')}}">
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
                                                    NID number
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" type="text" name="nid"
                                                           value="{{old('nid')}}">
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
    {{--    <script src="{{asset('m/assets/js/pages/custom/user/edit-user.js')}}" type="text/javascript"></script>--}}
    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"
            type="text/javascript"></script>


    {{--    <script src="{{asset('m/assets/js/pages/crud/file-upload/uppy.js')}}" type="text/javascript"></script>--}}

    {{--    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/form-repeater.js')}}" type="text/javascript"></script>--}}
    {{--    <script src="{{asset('plugins/select2/select2.full.min.js')}}" type="text/javascript"></script>--}}

    <!--end::Page Scripts -->
@endsection
