@extends('layouts.m')
@section('title', 'Employee List')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    <a href="{{route('employee.list')}}" style="text-decoration: none;">Employee List</a>
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            </div>
            <div class="kt-subheader__toolbar">
                <a href="{{route('employee.create')}}" class="btn btn-label-brand btn-bold">Add Employee </a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        @if(session('Success'))
            <div class="alert alert-success text-center" id="toaster">
                {{session('Success')}}
            </div>
        {{--        @elseif(session('Cannotdelete'))--}}
        {{--            <div class="alert alert-warning text-center" id="toaster">--}}
        {{--                {{session('Cannotdelete')}}--}}
        {{--            </div>--}}
    @endif

    <!--begin::Portlet-->
        <div class="kt-portlet ">
            <div class="kt-portlet__body">
                <!--begin::Accordion-->
                <div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample6">
                    <div class="card">
                        <div class="card-header" id="headingTwo6">
                            <div class="card-title  {{$query ? '' : 'collapsed'}}" data-toggle="collapse"
                                 data-target="#collapseTwo6"
                                 aria-expanded="{{$query ? 'true' : 'false'}}" aria-controls="collapseTwo6">
                                <i class="flaticon2-search-1"></i> Search
                            </div>
                        </div>
                        <div id="collapseTwo6" class="collapse {{$query ? 'show' : ''}}" aria-labelledby="headingTwo6"
                             data-parent="#accordionExample6">
                            <div class="card-body">
                                <form action="" class="form-inline" method="get">
                                    @csrf
                                    <div class="form-group mx-sm-4 mb-2">
                                        <input type="text" name="name" class="form-control"
                                               placeholder="Name"
                                               value="{{$query ? ($query['name'] ? $query['name'] : '') : ''}}">
                                    </div>

                                    <div class="form-group mx-sm-4 mb-2">
                                        <select class="form-control" name="typeDesignation">
                                            @if((count($query) > 0) && array_key_exists("typeDesignation", $query))
                                                <option selected hidden
                                                        value="{{$query['typeDesignation']}}">{{$query['typeDesignationName']}}</option>
                                            @else
                                                <option selected disabled hidden value="">Type -> Designations</option>
                                            @endif
                                            @foreach($types as $ts)
                                                @if(count($ts->designation) > 0)
                                                    @foreach($ts->designation as $d)
                                                        <option value="{{$ts->id}}._.{{$d->id}}">{{$ts->title}}
                                                            -> {{$d->title}}</option>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Confirm Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Accordion-->
            </div>
        </div>
        <!--end::Portlet-->

        <!--begin::Portlet-->
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        All Employees
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                {{--Bootstrap Table--}}
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $i => $e)
                        <tr>
                            <th scope="row">{{$employees->firstItem() + $i}}</th>
                            <td>{{$e->name}}</td>
                            <td>{{$e->type}}</td>
                            <td>{{$e->designation}}</td>
                            <td>
                                <a href="{{route('employee.edit', ['eid' => $e->id])}}" title="Edit"
                                   class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                    <i class="la la-edit"></i>
                                </a>
                                <form action="{{route('employee.delete', ['eid' => $e->id])}}" method="POST"
                                      style="display: inline-table;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                            onclick="return confirm('Are you sure you want to delete the Employee ?')">
                                        <i class="la la-trash" style="color: #fd397a;"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{--Pagination--}}
                <div class="kt-section">
                    <div class="kt-pagination  kt-pagination--brand">
                        {{$employees->links()}}
                        <div class="kt-datatable__pager-info">
                            <span class="kt-datatable__pager-detail">Showing {{$employees->firstItem()}} - {{$employees->lastItem()}} of {{$employees->total()}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--end::Portlet-->

        <!--begin::Modal-->

        <!--end::Modal-->
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
