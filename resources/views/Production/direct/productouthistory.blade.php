@extends('layouts.m')
@section('title', 'Product Production Out History')
{{--@section('link')--}}

{{--@endsection--}}
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Product Production Out History
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    {{--                                <span class="kt-subheader__desc" id="kt_subheader_total">--}}
                    {{--                                    {{$customers->total()}} Total--}}
                    {{--                                </span>--}}
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
                                            <path
                                                d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            <path
                                                d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
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
        </div>
    </div>
@endsection
@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    {{--        @if(session('Success'))--}}
    {{--            <div class="alert alert-success text-center" id="toaster">--}}
    {{--                {{session('Success')}}--}}
    {{--            </div>--}}
    {{--        @elseif(session('unsuccess'))--}}
    {{--            <div class="alert alert-warning text-center" id="toaster">--}}
    {{--                {{session('unsuccess')}}--}}
    {{--            </div>--}}
    {{--    @endif--}}

    <!--begin::Portlet-->
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Product Production Out History
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <!--begin: Datatable -->
                {{--Bootstrap Table--}}
                <table class="table table-hover" id="dataTable">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Factory</th>
                        <th scope="col">Machine</th>
                        <th scope="col">Entry By</th>
                        <th scope="col">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pofp as $i => $sp)
                        <tr>
                            <th scope="row">{{$pofp->firstItem() + $i}}</th>
                            <td>{{$sp->product}}</td>
                            <td>{{$sp->quantity}} {{$sp->unit}}</td>
                            <td>{{$sp->factory}}</td>
                            <td>{{$sp->machine}}</td>
                            <td>{{$sp->user}}</td>
                            <td>{{$sp->created_at->format('jS M, Y g:ia')}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!--end: table -->

                {{--                Pagination--}}
                <div class="kt-section">
                    <div class="kt-pagination  kt-pagination--brand">
                        {{$pofp->links()}}
                        <div class="kt-datatable__pager-info">
                            <span class="kt-datatable__pager-detail">Showing {{$pofp->firstItem()}} - {{$pofp->lastItem()}} of {{$pofp->total()}}</span>
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
    {{--    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>--}}
    {{--    <script>--}}
    {{--        $(document).ready(function() {--}}
    {{--            $('#dataTable').DataTable({--}}
    {{--                // "paging":   false,--}}
    {{--                "ordering": false,--}}
    {{--                "info":     false--}}
    {{--            } );--}}
    {{--        } );--}}
    {{--    </script>--}}

@endsection
