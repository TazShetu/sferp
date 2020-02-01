@extends('layouts.m')
@section('title', 'Edit User')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Edit User
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{route('home')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="javascript:void (0)" class="kt-subheader__breadcrumbs-link">Access Control</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('users')}}"
                       class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active"
                       style="padding-right: 1rem;">Users</a>
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
                                User Edit
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_user_edit_tab_1" role="tabpanel">
                                <div class="kt-form kt-form--label-right">
                                    <div class="kt-form__body">
                                        <div class="kt-section kt-section--first">
                                            <form action="{{route('user.update', ['uid' => $uedit->id])}}"
                                                  method="post">
                                                @csrf
                                                <div class="kt-section__body">
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Name*
                                                        </label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"
                                                                   type="text" name="name"
                                                                   required value="{{$uedit->name}}">
                                                            @if($errors->has('name'))
                                                                <span class="invalid-feedback">{{$errors->first('name')}}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Email*
                                                        </label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-at"></i></span></div>
                                                                <input class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}"
                                                                       type="email" required
                                                                       name="email" value="{{$uedit->email}}">
                                                                @if($errors->has('email'))
                                                                    <span class="invalid-feedback">{{$errors->first('email')}}</span>
                                                                @endif
                                                            </div>
                                                            <span class="form-text text-muted">Email has to be unique*</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Password
                                                        </label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="fa fa-unlock-alt"></i></span>
                                                                </div>
                                                                <input class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}"
                                                                       type="password" name="password">
                                                                @if($errors->has('password'))
                                                                    <span class="invalid-feedback">{{$errors->first('password')}}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Confirm Password
                                                        </label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="fa fa-unlock-alt"></i></span>
                                                                </div>
                                                                <input class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}"
                                                                       type="password" name="password_confirmation">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-group-last row">
                                                        <label class="col-3 col-form-label">Roles</label>
                                                        <div class="col-9">
                                                            @if($errors->has('roles'))
                                                                <span class="invalid-feedback"><b>Please Select At Least One Role</b></span>
                                                            @endif
                                                            <div class="kt-checkbox-list">
                                                                @foreach($roles as $i => $role)
                                                                    @if($i > 1)
                                                                        <label class="kt-checkbox">
                                                                            <input type="checkbox" name="roles[]"
                                                                                   value="{{$role->id}}"
                                                                                   @foreach($redits as $pe)
                                                                                   @if(($pe->id * 1) == ($role->id * 1))
                                                                                   checked
                                                                                    @break
                                                                                    @endif
                                                                                    @endforeach
                                                                            > {{$role->name}}
                                                                            <span></span>
                                                                        </label>
                                                                    @endif
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
            <div class="col-lg-6">
                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                            <h3 class="kt-portlet__head-title">
                                All Users
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
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $i => $user)
                                <tr>
                                    <th scope="row">{{$i + 1}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if($user->id != $uedit->id)
                                            <a href="{{route('user.edit', ['uid' => $user->id])}}" title="Edit"
                                               class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                <i class="la la-edit"></i>
                                            </a>
                                            <form action="{{route('user.delete', ['uid' => $user->id])}}" method="POST"
                                                  style="display: inline-table;">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                                        onclick="return confirm('Are you sure you want to delete the user ?')">
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