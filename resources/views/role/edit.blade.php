@extends('layouts.m')
@section('title', 'Edit Role')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Edit Role
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{route('home')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="javascript:void (0)" class="kt-subheader__breadcrumbs-link">Access Control</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('role')}}"
                       class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active"
                       style="padding-right: 1rem;">Role</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="javascript:void (0)"
                       class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active"
                       style="padding-right: 1rem;">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        @if(session('Success'))
            <div class="alert alert-success text-center">
                {{session('Success')}}
            </div>
        @elseif(session('unsuccess'))
            <div class="alert alert-warning text-center">
                {{session('unsuccess')}}
            </div>
    @endif
    <!--begin::Portlet-->
        <div class="row">
            <div class="col-lg-6">

                <div class="kt-portlet kt-portlet--tabs">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Role Edit
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_user_edit_tab_1" role="tabpanel">
                                <div class="kt-form kt-form--label-right">
                                    <div class="kt-form__body">
                                        <div class="kt-section kt-section--first">
                                            <form action="{{route('role.update', ['rid' => $redit->id])}}"
                                                  method="post">
                                                @csrf
                                                <div class="kt-section__body">
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Name
                                                        </label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"
                                                                   type="text" name="name"
                                                                   required value="{{$redit->name}}">
                                                            @if($errors->has('name'))
                                                                <span class="invalid-feedback">{{$errors->first('name')}}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Description
                                                        </label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}"
                                                                   type="text" name="description"
                                                                   value="{{$redit->description}}">
                                                            @if($errors->has('description'))
                                                                <span class="invalid-feedback">{{$errors->first('description')}}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-group-last row">
                                                        <label class="col-3 col-form-label">Permissions</label>
                                                        <div class="col-9">
                                                            @if($errors->has('name'))
                                                                <span class="invalid-feedback"><b>Please Select At Least One Permission</b></span>
                                                            @endif
                                                            <div class="kt-checkbox-list">
                                                                @foreach($permissions as $permission)
                                                                    <label class="kt-checkbox">
                                                                        <input type="checkbox" name="permissions[]"
                                                                               value="{{$permission->id}}"
                                                                               @foreach($pedits as $pe)
                                                                               @if(($pe->id * 1) == ($permission->id * 1))
                                                                               checked
                                                                                @break
                                                                                @endif
                                                                                @endforeach
                                                                        > {{$permission->display_name}}
                                                                        <span></span>
                                                                    </label>
                                                                @endforeach
                                                            </div>
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
                                                                   class="cancel btn btn-label-danger btn-bold float-right">Cancel</a>
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
            <div class="col-lg-6">
                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                            <h3 class="kt-portlet__head-title">
                                All Roles
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <!--begin: Datatable -->
                        {{--Bootstrap Table--}}
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $i => $role)
                                @if($i > 2)
                                    <tr>
                                        <th scope="row">{{$i - 2}}</th>
                                        <td>{{$role->name}}</td>
                                        <td>{{$role->description}}</td>
                                        <td>
                                            @if($role->id != $redit->id)
                                                <a href="{{route('role.edit', ['rid' => $role->id])}}" title="Edit"
                                                   class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                    <i class="la la-edit"></i>
                                                </a>
                                                <form action="{{route('role.delete', ['rid' => $role->id])}}" method="POST"
                                                      style="display: inline-table;">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                                            onclick="return confirm('Are you sure you want to delete the Role ?')">
                                                        <i class="la la-trash" style="color: #fd397a;"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <a href="#" title="Edit"
                                                   class="btn btn-sm btn-clean btn-icon btn-icon-md disabled">
                                                    <i class="la la-edit"></i>
                                                </a>
                                                <a href="#" title="Delete"
                                                   class="btn btn-sm btn-clean btn-icon btn-icon-md disabled">
                                                    <i class="la la-trash" style="color: #fd397a;"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        <!--end: Datatable -->

                        {{--Pagination--}}
                        <div class="kt-datatable__pager kt-datatable--paging-loaded">
                            {{--                            {{$customers->links()}}--}}
                            {{--                            <div class="kt-datatable__pager-info">--}}
                            {{--                                <span class="kt-datatable__pager-detail">Showing {{$customers->firstItem()}} - {{$customers->lastItem()}} of {{$customers->total()}}</span>--}}
                            {{--                            </div>--}}
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

    <!--end::Page Scripts -->
@endsection