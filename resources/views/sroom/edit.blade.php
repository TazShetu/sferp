@extends('layouts.m')
@section('title', 'Spare Part Room Edit')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Edit Spare Part Room
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{route('home')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('sroom.index')}}" class="kt-subheader__breadcrumbs-link">Spare Part Room</a>
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
        <div class="alert alert-light alert-elevate" role="alert">
            <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
            <div class="alert-text">
                If you delete a row and add another with same name, system will still delete the old row and racks
                in that row and create a new row with same name.
            </div>
        </div>
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
                                Spare part
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ ($is_edit) ? 'active' : '' }}" data-toggle="tab"
                               href="#kt_user_edit_tab_2" role="tab">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <rect fill="#000000" opacity="0.3" x="5" y="8" width="2" height="8" rx="1"/>
                                        <path
                                            d="M6,21 C7.1045695,21 8,20.1045695 8,19 C8,17.8954305 7.1045695,17 6,17 C4.8954305,17 4,17.8954305 4,19 C4,20.1045695 4.8954305,21 6,21 Z M6,23 C3.790861,23 2,21.209139 2,19 C2,16.790861 3.790861,15 6,15 C8.209139,15 10,16.790861 10,19 C10,21.209139 8.209139,23 6,23 Z"
                                            fill="#000000" fill-rule="nonzero"/>
                                        <rect fill="#000000" opacity="0.3" x="17" y="8" width="2" height="8" rx="1"/>
                                        <path
                                            d="M18,21 C19.1045695,21 20,20.1045695 20,19 C20,17.8954305 19.1045695,17 18,17 C16.8954305,17 16,17.8954305 16,19 C16,20.1045695 16.8954305,21 18,21 Z M18,23 C15.790861,23 14,21.209139 14,19 C14,16.790861 15.790861,15 18,15 C20.209139,15 22,16.790861 22,19 C22,21.209139 20.209139,23 18,23 Z"
                                            fill="#000000" fill-rule="nonzero"/>
                                        <path
                                            d="M6,7 C7.1045695,7 8,6.1045695 8,5 C8,3.8954305 7.1045695,3 6,3 C4.8954305,3 4,3.8954305 4,5 C4,6.1045695 4.8954305,7 6,7 Z M6,9 C3.790861,9 2,7.209139 2,5 C2,2.790861 3.790861,1 6,1 C8.209139,1 10,2.790861 10,5 C10,7.209139 8.209139,9 6,9 Z"
                                            fill="#000000" fill-rule="nonzero"/>
                                        <path
                                            d="M18,7 C19.1045695,7 20,6.1045695 20,5 C20,3.8954305 19.1045695,3 18,3 C16.8954305,3 16,3.8954305 16,5 C16,6.1045695 16.8954305,7 18,7 Z M18,9 C15.790861,9 14,7.209139 14,5 C14,2.790861 15.790861,1 18,1 C20.209139,1 22,2.790861 22,5 C22,7.209139 20.209139,9 18,9 Z"
                                            fill="#000000" fill-rule="nonzero"/>
                                    </g>
                                </svg>
                                Row
                            </a>
                        </li>
                        @if(count($rows) > 0)
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_3" role="tab">
                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                         class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path
                                                d="M5.5,2 L18.5,2 C19.3284271,2 20,2.67157288 20,3.5 L20,6.5 C20,7.32842712 19.3284271,8 18.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,3.5 C4,2.67157288 4.67157288,2 5.5,2 Z M11,4 C10.4477153,4 10,4.44771525 10,5 C10,5.55228475 10.4477153,6 11,6 L13,6 C13.5522847,6 14,5.55228475 14,5 C14,4.44771525 13.5522847,4 13,4 L11,4 Z"
                                                fill="#000000" opacity="0.3"/>
                                            <path
                                                d="M5.5,9 L18.5,9 C19.3284271,9 20,9.67157288 20,10.5 L20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 L4,10.5 C4,9.67157288 4.67157288,9 5.5,9 Z M11,11 C10.4477153,11 10,11.4477153 10,12 C10,12.5522847 10.4477153,13 11,13 L13,13 C13.5522847,13 14,12.5522847 14,12 C14,11.4477153 13.5522847,11 13,11 L11,11 Z M5.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,20.5 C20,21.3284271 19.3284271,22 18.5,22 L5.5,22 C4.67157288,22 4,21.3284271 4,20.5 L4,17.5 C4,16.6715729 4.67157288,16 5.5,16 Z M11,18 C10.4477153,18 10,18.4477153 10,19 C10,19.5522847 10.4477153,20 11,20 L13,20 C13.5522847,20 14,19.5522847 14,19 C14,18.4477153 13.5522847,18 13,18 L11,18 Z"
                                                fill="#000000"/>
                                        </g>
                                    </svg>
                                    Rack
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="tab-content">
                    <div class="tab-pane {{ ($is_edit) ? '' : 'active' }}" id="kt_user_edit_tab_1" role="tabpanel" 8>
                        <div class="kt-form kt-form--label-right">
                            <div class="kt-form__body">
                                <div class="kt-section kt-section--first">
                                    {{--      Form Start    --}}
                                    <form action="{{route('sroom.update', ['srid' => $sroom->id])}}"
                                          method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="kt-section__body">
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Name
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"
                                                        type="text" name="name" required
                                                        value="{{$sroom->name}}">
                                                    @if($errors->has('name'))
                                                        <span class="invalid-feedback">{{$errors->first('name')}}</span>
                                                    @endif
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
                                        <form action="{{route('row.update', ['srid' => $sroom->id])}}" method="post">
                                            @csrf
                                            <div id="kt_repeater_1">
                                                <div class="form-group form-group-last row" id="kt_repeater_1">
                                                    <div class="col-lg-12" id="repeat-content">
                                                        @forelse($rows as $f)
                                                            <div
                                                                class="form-group row align-items-center remove-content">
                                                                <div class="col-md-3">
                                                                    <div class="kt-form__group--inline">
                                                                        <div class="kt-form__label">
                                                                            <label>Row Name:</label>
                                                                        </div>
                                                                        <div class="kt-form__control">
                                                                            <input type="text" class="form-control"
                                                                                   name="rowName[]"
                                                                                   value="{{$f->name}}" required>
                                                                            <input type="hidden" name="oldRowId[]"
                                                                                   value="{{$f->id}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <a href="javascript:;" data-repeater-delete=""
                                                                       class="btn-sm btn btn-label-danger btn-bold delete-btn"
                                                                       style="margin-top: 24px;"
                                                                       @if($f->x)
                                                                       onclick="deleteFunction(event)"
                                                                        @endif
                                                                    >
                                                                        <i class="la la-trash-o"></i>
                                                                        Delete
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @empty
                                                            <div
                                                                class="form-group row align-items-center remove-content">
                                                                <div class="col-md-3">
                                                                    <div class="kt-form__group--inline">
                                                                        <div class="kt-form__label">
                                                                            <label>Row Name:</label>
                                                                        </div>
                                                                        <div class="kt-form__control">
                                                                            <input type="text" class="form-control"
                                                                                   name="rowName[]"
                                                                                   placeholder="Enter row name"
                                                                                   required>
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
                                                        @endforelse
                                                    </div>
                                                </div>
                                                <div class="form-group form-group-last row">
                                                    <!-- <label class="col-lg-2 col-form-label"></label> -->
                                                    <div class="col-lg-4">
                                                        <a href="javascript:;" id="add-btn"
                                                           class="btn btn-bold btn-sm btn-label-brand">
                                                            <i class="la la-plus"></i> Add Another Row
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
                    @if(count($rows) > 0)
                        <div class="tab-pane" id="kt_user_edit_tab_3" role="tabpanel">
                            <div class="kt-form kt-form--label-right">
                                <div class="kt-form__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body">
                                            <form action="{{route('rack.update', ['srid' => $sroom->id ])}}"
                                                  method="post">
                                                @csrf
                                                <div id="kt_repeater_1">
                                                    <div class="form-group form-group-last row"
                                                         id="kt_repeater_1">
                                                        <div class="col-lg-12" id="repeat-content-rack">
                                                            @forelse($racks as $r)
                                                                <div
                                                                    class="form-group row align-items-center remove-content">
                                                                    <div class="col-md-3">
                                                                        <div class="kt-form__group--inline">
                                                                            <div class="kt-form__label">
                                                                                <label>Row:</label>
                                                                            </div>
                                                                            <div class="kt-form__control">
                                                                                <select
                                                                                    class="form-control kt-selectpicker"
                                                                                    name="row[]" required
                                                                                    data-live-search="true"
                                                                                    data-size="7">
                                                                                    <option selected hidden
                                                                                            value="{{$r->row_id}}">
                                                                                        {{$r->row_name}}
                                                                                    </option>
                                                                                    @foreach($rows as $f)
                                                                                        <option
                                                                                            value="{{$f->id}}">{{$f->name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-md-none kt-margin-b-10"></div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="kt-form__group--inline">
                                                                            <div class="kt-form__label">
                                                                                <label>Rack Name:</label>
                                                                            </div>
                                                                            <div class="kt-form__control">
                                                                                <input type="text" class="form-control"
                                                                                       name="rackName[]"
                                                                                       value="{{$r->name}}"
                                                                                       required>
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
                                                            @empty
                                                                <div
                                                                    class="form-group row align-items-center remove-content">
                                                                    <div class="col-md-3">
                                                                        <div class="kt-form__group--inline">
                                                                            <div class="kt-form__label">
                                                                                <label>Row:</label>
                                                                            </div>
                                                                            <div class="kt-form__control">
                                                                                <select
                                                                                    class="form-control kt-selectpicker"
                                                                                    name="row[]" required
                                                                                    data-live-search="true"
                                                                                    data-size="7">
                                                                                    <option selected hidden disabled
                                                                                            value="">
                                                                                        Choose..
                                                                                    </option>
                                                                                    @foreach($rows as $f)
                                                                                        <option
                                                                                            value="{{$f->id}}">{{$f->name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-md-none kt-margin-b-10"></div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="kt-form__group--inline">
                                                                            <div class="kt-form__label">
                                                                                <label>Rack Name:</label>
                                                                            </div>
                                                                            <div class="kt-form__control">
                                                                                <input type="text" class="form-control"
                                                                                       name="rackName[]"
                                                                                       placeholder="Enter rack name"
                                                                                       required>
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
                                                            @endforelse
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-group-last row">
                                                        <!-- <label class="col-lg-2 col-form-label"></label> -->
                                                        <div class="col-lg-4">
                                                            <a href="javascript:;" id="add-btn-rack"
                                                               class="btn btn-bold btn-sm btn-label-brand">
                                                                <i class="la la-plus"></i> Add Another Rack
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
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    @endif
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

    <!--end::Page Scripts -->
    <script>
        $(document).on('click', '#add-btn', function () {
            var input = `
                     <div class="form-group row align-items-center remove-content">
                        <div class="col-md-3">
                            <div class="kt-form__group--inline">
                                <div class="kt-form__label">
                                    <label>Row Name:</label>
                                </div>
                                <div class="kt-form__control">
                                    <input type="text" class="form-control"
                                           name="rowName[]"
                                           placeholder="Enter row name"
                                           required>
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
                `;
            $(input).slideUp(1, function () {
                $('#repeat-content').append(this);
                $(this).slideDown(500);
            });
        });
    </script>
    <script>
        $(document).on('click', '.delete-btn', function (f) {
            $(f.target).closest('.remove-content').slideUp(function () {
                $(this).remove();
            });
        });
    </script>
    @if(count($rows) > 0)
        <script>
            $(document).on('click', '#add-btn-rack', function () {
                var input = `
                    <div class="form-group row align-items-center remove-content">
                                                                    <div class="col-md-3">
                                                                        <div class="kt-form__group--inline">
                                                                            <div class="kt-form__label">
                                                                                <label>Row:</label>
                                                                            </div>
                                                                            <div class="kt-form__control">
                                                                                <select class="form-control kt-selectpicker"
                                                                                        name="row[]" required
                                                                                        data-live-search="true"
                                                                                        data-size="7">
                                                                                    <option selected hidden disabled
                                                                                            value="">
                                                                                        Choose..
                                                                                    </option>
                                                                                    @foreach($rows as $f)
                <option value="{{$f->id}}">{{$f->name}}</option>
                                                                                    @endforeach
                </select>
            </div>
        </div>
        <div class="d-md-none kt-margin-b-10"></div>
    </div>
    <div class="col-md-3">
        <div class="kt-form__group--inline">
            <div class="kt-form__label">
                <label>Rack Name:</label>
            </div>
            <div class="kt-form__control">
                <input type="text" class="form-control"
                       name="rackName[]"
                       placeholder="Enter rack name"
                       required>
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
`;
                $(input).slideUp(1, function () {
                    $('#repeat-content-rack').append(this);
                    $(this).slideDown(500);
                });
            });
            var deleteFunction = (e) => {
                var cofirm = confirm('This Room has Rack in it. Are you sure you want to delete ?');
                if (!cofirm) {
                    e.stopPropagation();
                }
            };
        </script>
    @endif

@endsection
