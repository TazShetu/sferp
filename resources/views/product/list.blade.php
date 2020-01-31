@extends('layouts.m')
@section('title', 'Products List')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Products
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total">
                        {{count($products)}} Total
                    </span>
                    <form class="kt-margin-l-20" id="kt_subheader_search_form">
                        <div class="kt-input-icon kt-input-icon--right kt-subheader__search">
                            <input type="text" class="form-control" placeholder="Search..." id="generalSearch">
                            <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                <span>[[
                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                         class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none"
                                           fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                  fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                  fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                    </svg>]]
                                    <!--<i class="flaticon2-search-1"></i>-->
                                </span>
                            </span>
                        </div>
                    </form>

                </div>
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
            <div class="alert alert-success text-center">
                {{session('Success')}}
            </div>
        {{--        @elseif(session('Cannotdelete'))--}}
        {{--            <div class="alert alert-warning text-center">--}}
        {{--                {{session('Cannotdelete')}}--}}
        {{--            </div>--}}
    @endif

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
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
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
                            <td>{{$m->minimum_storage}}</td>
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