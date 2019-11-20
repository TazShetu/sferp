@extends('layouts.m')
@section('title', 'Customer Create')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Create Customer
                </h3>
            </div>
            <div class="kt-subheader__toolbar"></div>
        </div>
    </div>

@endsection
@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__body">
                <form action="" method="">
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_user_edit_tab_1" role="tabpanel">
                            <div class="kt-form kt-form--label-right">
                                <div class="kt-form__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body">
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="kt-avatar kt-avatar--outline kt-avatar--circle-"
                                                         id="kt_user_edit_avatar">
                                                        <div class="kt-avatar__holder"
                                                             style="background-image: url('{{asset('m/assets/media/users/300_20.jpg')}}');"></div>
                                                        <label class="kt-avatar__upload"
                                                               data-toggle="kt-tooltip" title=""
                                                               data-original-title="Change avatar">
                                                            <i class="fa fa-pen"></i>
                                                            <input type="file" name="profile_avatar"
                                                                   accept=".png, .jpg, .jpeg">
                                                        </label>
                                                        <span class="kt-avatar__cancel"
                                                              data-toggle="kt-tooltip" title=""
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
                                                    <input class="form-control" type="text" value="Nick">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Date Of Birth</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" type="date" value="2011-08-19">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Company Name
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" type="text"
                                                           value="Loop Inc.">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    NID Number
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" type="text"
                                                           value="Loop Inc.">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Upload File:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div></div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile">
                                                        <label class="custom-file-label" style="text-align: left;"
                                                               for="customFile">Choose file</label>
                                                    </div>
                                                    <span class="form-text text-muted">Max file size is 1MB and max number of files is 5.</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Business Address
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" type="text"
                                                           value="House 1, Road 1, Dhanmondi, Dhaka">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Business Area/Zone
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" type="text"
                                                           value=Mirpur Dhaka">
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
                                                        <input type="text" class="form-control"
                                                               value="+35278953712" placeholder="Phone"
                                                               aria-describedby="basic-addon1">
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
                                                        <input type="text" class="form-control"
                                                               value="+35278953712" placeholder="Phone"
                                                               aria-describedby="basic-addon1">
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
                                                        <input type="text" class="form-control"
                                                               value="nick.bold@loop.com"
                                                               placeholder="Email"
                                                               aria-describedby="basic-addon1">
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
                                                        <input type="text" class="form-control"
                                                               value="nick.bold@loop.com"
                                                               placeholder="Email"
                                                               aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Customer Type
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select class="form-control">
                                                        <option selected disabled hidden>Choose...</option>
                                                        <option value="id">Dealer</option>
                                                        <option value="msa">Sub Dealer</option>
                                                        <option value="ca">Individual</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-last row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Company
                                                    Site</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                               placeholder="Username" value="loop">
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
                                                        <a href="#" class="btn btn-label-brand btn-bold">Save
                                                            changes</a>
                                                        <a href="#" class="btn btn-clean btn-bold">Cancel</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="kt_user_edit_tab_2" role="tabpanel">
                            <div class="kt-form kt-form--label-right">
                                <div class="kt-form__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body">
                                            <div class="row">
                                                <label class="col-xl-3"></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <h3 class="kt-section__title kt-section__title-sm">
                                                        Contact Person:</h3>
                                                </div>
                                            </div>
                                            <div id="kt_repeater_1">
                                                <div class="form-group form-group-last row" id="kt_repeater_1">
                                                    <label class="col-lg-2 col-form-label">Contacts:</label>
                                                    <div data-repeater-list="" class="col-lg-10">
                                                        <div data-repeater-item
                                                             class="form-group row align-items-center">
                                                            <div class="col-md-3">
                                                                <div class="kt-form__group--inline">
                                                                    <div class="kt-form__label">
                                                                        <label>Contact Person Name:</label>
                                                                    </div>
                                                                    <div class="kt-form__control">
                                                                        <input type="text" class="form-control"
                                                                               placeholder="Enter full name">
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
                                                                               placeholder="Enter Designation">
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
                                                                               placeholder="Enter contact number">
                                                                    </div>
                                                                </div>
                                                                <div class="d-md-none kt-margin-b-10"></div>
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
                                                        <label class="col-lg-2 col-form-label"></label>
                                                        <div class="col-lg-4">
                                                            <a href="javascript:;" data-repeater-create=""
                                                               class="btn btn-bold btn-sm btn-label-brand">
                                                                <i class="la la-plus"></i> Add
                                                            </a>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="kt_user_edit_tab_3" role="tabpanel">
                                <div class="kt-form kt-form--label-right">
                                    <div class="kt-form__body">
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-section__body">
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
                                </div>
                            </div>
                        </div>
                </form>
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

    <!--end::Page Scripts -->
@endsection