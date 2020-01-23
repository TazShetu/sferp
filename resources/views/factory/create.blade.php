@extends('layouts.m')
@section('title', 'Factory Create')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Create Factory
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{route('home')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('factory.list')}}" class="kt-subheader__breadcrumbs-link">Factory</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('factory.create')}}"
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
                                    <form action="{{route('factory.store')}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="kt-section__body">
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Image</label>
                                                <div class="col-lg-9 col-xl-6">

                                                    <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                                                        <div class="kt-avatar__holder"
                                                             style="background-image: url({{asset('factory.jpg')}})"></div>
                                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip"
                                                               title="" data-original-title="Change avatar">
                                                            <i class="fa fa-pen"></i>
                                                            <input type="file" name="image"
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
                                                           type="text" placeholder="Name" name="name" required
                                                           value="{{old('name')}}">
                                                    @if($errors->has('name'))
                                                        <span class="invalid-feedback">{{$errors->first('name')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Address
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{$errors->has('address') ? 'is-invalid' : ''}}"
                                                           type="text" placeholder="Full Address"
                                                           name="address" required
                                                           value="{{old('address')}}">
                                                    @if($errors->has('address'))
                                                        <span class="invalid-feedback">{{$errors->first('address')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group form-group-last row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Established Date</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="input-group date">
                                                        <input type="text" value="{{old('establishedDate')}}"
                                                               class="form-control {{$errors->has('establishedDate') ? 'is-invalid' : ''}}"
                                                               readonly placeholder="Select date" required
                                                               id="kt_datepicker_3" name="establishedDate">
                                                        <div class="input-group-append">
														<span class="input-group-text">
															<i class="la la-calendar"></i>
														</span>
                                                        </div>
                                                    </div>
                                                    @if($errors->has('establishedDate'))
                                                        <span class="invalid-feedback">{{$errors->first('establishedDate')}}</span>
                                                    @endif
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