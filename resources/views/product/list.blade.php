@extends('layouts.m')
@section('title', 'Products List')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    <a href="{{route('product.list')}}" style="text-decoration: none;">Products List</a>
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            </div>
            <div class="kt-subheader__toolbar">
                <a href="{{route('product.create')}}" class="btn btn-label-brand btn-bold">Add Product</a>
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
                                <div class="card-title {{$query ? '' : 'collapsed'}}" data-toggle="collapse"
                                     data-target="#collapseTwo6"
                                     aria-expanded="{{$query ? 'true' : 'false'}}" aria-controls="collapseTwo6">
                                    <i class="flaticon2-search-1"></i> Search
                                </div>
                            </div>
                            <div id="collapseTwo6" class="collapse {{$query ? 'show' : ''}}" aria-labelledby="headingTwo6"
                                 data-parent="#accordionExample6">
                                <div class="card-body">
                                    {{--                                    <form action="{{route('spareParts.search')}}" class="form-inline" method="get">--}}
                                    <form action="" class="form-inline" method="get">
                                        @csrf
                                        <div class="form-group mx-sm-3 mb-2">
                                            <input type="text" name="name" class="form-control"
                                                   placeholder="Name Of The Product"
                                                   value="{{$query ? ($query['name'] ? $query['name'] : '') : ''}}">
                                        </div>
                                        <div class="form-group mx-sm-3 mb-2">
                                            <input type="text" name="type" class="form-control"
                                                   placeholder="Type / Category"
                                                   value="{{$query ? ($query['type'] ? $query['type'] : '') : ''}}">
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
                        All Products
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                {{--Bootstrap Table--}}
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name Of The Product</th>
                        <th scope="col">Type / Category</th>
                        <th scope="col">Minimum Storage Amount</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $i => $m)
                        <tr>
                            <th scope="row">{{$products->firstItem() + $i}}</th>
                            <td><a href="{{route('product.edit', ['pid' => $m->id])}}">{{$m->name}}</a>
                            </td>
                            <td>{{$m->type}}</td>
                            <td>{{$m->minimum_storage}} {{$m->unit}}</td>
                            <td>
                                <a href="{{route('product.edit', ['pid' => $m->id])}}" title="Edit"
                                   class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                    <i class="la la-edit"></i>
                                </a>
                                <form action="{{route('product.delete', ['pid' => $m->id])}}" method="POST"
                                      style="display: inline-table;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                            onclick="return confirm('Are you sure you want to delete the product ?')">
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
                        {{$products->links()}}
                        <div class="kt-datatable__pager-info">
                            <span class="kt-datatable__pager-detail">Showing {{$products->firstItem()}} - {{$products->lastItem()}} of {{$products->total()}}</span>
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
