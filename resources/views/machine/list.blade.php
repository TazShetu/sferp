@extends('layouts.m')
@section('title', 'Machine List')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    <a href="{{route('machine.list')}}" style="text-decoration: none;">Machines List</a>
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            </div>
            <div class="kt-subheader__toolbar">
                <a href="{{route('machine.create')}}" class="btn btn-label-brand btn-bold">Add Machine </a>
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
                                    <div class="form-group mx-sm-3 mb-2">
                                        <input type="text" name="manufacturer" class="form-control"
                                               placeholder="Manufacturer"
                                               value="{{$query ? ($query['manufacturer'] ? $query['manufacturer'] : '') : ''}}">
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2">
                                        <input type="text" name="category" class="form-control" placeholder="Category"
                                               value="{{$query ? ($query['category'] ? $query['category'] : '') : ''}}">
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2">
                                        <select class="form-control" name="factoryId">
                                            @if((count($query) > 0) && array_key_exists("factoryId", $query))
                                                <option selected hidden
                                                        value="{{$query['factoryId']}}">{{$query['factoryName']}}</option>
                                            @else
                                                <option selected disabled hidden value="">Factories</option>
                                            @endif
                                            @foreach($factories as $f)
                                                <option value="{{$f->id}}">{{$f->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2">
                                        <input type="text" name="country" class="form-control"
                                               placeholder="Country Of Origin"
                                               value="{{$query ? ($query['country'] ? $query['country'] : '') : ''}}">
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
                        All Machines
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                {{--Bootstrap Table--}}
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Type / Model</th>
                        <th scope="col">Manufacturer</th>
                        <th scope="col">Category</th>
                        <th scope="col">Factory</th>
                        <th scope="col">Country Of origin</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($machines as $i => $m)
                        <tr>
                            <th scope="row">{{$machines->firstItem() + $i}}</th>
                            <td>{{$m->type}}</td>
                            <td>{{$m->manufacturer}}</td>
                            <td>{{$m->category}}</td>
                            <td>{{$m->factory}}</td>
                            <td>{{$m->manufacture_country}}</td>
                            <td>
                                <a href="{{route('machine.edit', ['mid' => $m->id])}}" title="Edit"
                                   class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                    <i class="la la-edit"></i>
                                </a>
                                <form action="{{route('machine.delete', ['mid' => $m->id])}}" method="POST"
                                      style="display: inline-table;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                            onclick="return confirm('Are you sure you want to delete the machine ?')">
                                        <i class="la la-trash" style="color: #fd397a;"></i>
                                    </button>
                                </form>
                                @if($m->manual)
                                    <a href="{{route('machine.manual.download', ['mid' => $m->id])}}"
                                       class="btn btn-sm">
                                        <i class="fa fa-file-download"></i>
                                    </a>
                                @else
                                    <a href="#" class="btn btn-sm disabled" disabled="">
                                        <i class="fa fa-file-download"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{--Pagination--}}
                <div class="kt-section">
                    <div class="kt-pagination  kt-pagination--brand">
                        {{$machines->links()}}
                        <div class="kt-datatable__pager-info">
                            <span class="kt-datatable__pager-detail">Showing {{$machines->firstItem()}} - {{$machines->lastItem()}} of {{$machines->total()}}</span>
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
