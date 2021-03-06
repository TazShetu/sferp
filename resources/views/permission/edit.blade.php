@extends('layouts.m')
@section('title', 'Edit Permission')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Edit Permission
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{route('home')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="javascript:void (0)" class="kt-subheader__breadcrumbs-link">Access Control</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('permission')}}"
                       class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active"
                       style="padding-right: 1rem;">Permission</a>
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
                You can Only Edit Permission's description, not the actual permission.
            </div>
        </div>
        <!--begin::Portlet-->
        <div class="row">
            <div class="col-lg-12 mb-5">
                <div class="kt-portlet kt-portlet--tabs">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Permission Edit
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_user_edit_tab_1" role="tabpanel">
                                <div class="kt-form kt-form--label-right">
                                    <div class="kt-form__body">
                                        <div class="kt-section kt-section--first">
                                            <form action="{{route('permission.update', ['pid' => $pedit->id])}}"
                                                  method="post">
                                                @csrf
                                                <div class="kt-section__body">
                                                    <div class="form-group form-group-last row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Description
                                                        </label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}"
                                                                   type="text" name="description"
                                                                   value="{{$pedit->description}}">
                                                            @if($errors->has('description'))
                                                                <span class="invalid-feedback">{{$errors->first('description')}}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
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
            <div class="col-lg-12 mb-5">
                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                            <h3 class="kt-portlet__head-title">
                                All Permissions
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <!--begin: Datatable -->
                        <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded"
                             id="local_data"
                             style="">
                            <table class="kt-datatable__table" style="display: block;">
                                <thead class="kt-datatable__head">
                                <tr class="kt-datatable__row" style="left: 0px;">
                                    {{--                            <th class="kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--check">--}}
                                    {{--                                <span style="width: 20px;">--}}
                                    {{--                                    <label class="kt-checkbox kt-checkbox--single kt-checkbox--all kt-checkbox--solid">--}}
                                    {{--                                        <input type="checkbox">&nbsp;<span></span>--}}
                                    {{--                                    </label>--}}
                                    {{--                                </span>--}}
                                    {{--                            </th>--}}
                                    <th class="kt-datatable__cell kt-datatable__cell--sort">
                                <span style="width: 18px;">
                                    #
                                </span>
                                    </th>
                                    <th class="kt-datatable__cell kt-datatable__cell--sort">
                                <span style="width: 181px;">
                                    Name
                                </span>
                                    </th>
                                    <th class="kt-datatable__cell kt-datatable__cell--sort">
                                <span style="width: 381px;">
                                    Description
                                </span>
                                    </th>
                                    <th class="kt-datatable__cell kt-datatable__cell--sort">
                                <span style="width: 110px;">
                                    Actions
                                </span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="kt-datatable__body" style="">

                                @foreach($permissions as $i => $permission)
                                    <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                        {{--                                <td class="kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--check">--}}
                                        {{--                                <span style="width: 20px;">--}}
                                        {{--                                    <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">--}}
                                        {{--                                        <input type="checkbox" value="1">&nbsp;<span></span>--}}
                                        {{--                                    </label>--}}
                                        {{--                                </span>--}}
                                        {{--                                </td>--}}
                                        <td class="kt-datatable__cell">
                                <span style="width: 18px;">
                                    {{$permissions->firstItem() + $i}}
                                </span>
                                        </td>
                                        <td class="kt-datatable__cell">
                                <span style="width: 181px;">
                                    {{$permission->display_name}}
                                </span>
                                        </td>
                                        <td class="kt-datatable__cell">
                                <span style="width: 381px;">
                                    {{$permission->description}}
                                </span>
                                        </td>
                                        <td data-autohide-disabled="false" class="kt-datatable__cell">
                                <span style="overflow: visible; position: relative; width: 110px;">
                                    <a href="{{route('permission.edit', ['pid' => $permission->id])}}"
                                       title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                        <i class="la la-edit"></i>
                                    </a>
                                    <a title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md disabled">
                                        <i class="la la-trash"></i>
                                    </a>
                                </span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <br>
                            {{--Pagination--}}
                            <div class="kt-section">
                                <div class="kt-pagination  kt-pagination--brand">
                                    {{$permissions->links()}}
                                    <div class="kt-datatable__pager-info">
                                        <span class="kt-datatable__pager-detail">Showing {{$permissions->firstItem()}} - {{$permissions->lastItem()}} of {{$permissions->total()}}</span>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!--end: Datatable -->
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




    <!--end::Page Scripts -->
@endsection
