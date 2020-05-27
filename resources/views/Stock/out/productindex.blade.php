@extends('layouts.m')
@section('title', 'Product Stock Out')
{{--@section('link')--}}

{{--@endsection--}}
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    <a href="" style="text-decoration: none;">Product Stock Out</a>
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            </div>
            {{--            --}}
            <div class="kt-subheader__toolbar">
                <a href="{{route('product.stock.out.history')}}" class="btn btn-label-brand btn-bold">History</a>
            </div>
            {{--            --}}
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
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Product Stock Out
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
                        <th scope="col">Warehouse</th>
                        <th scope="col">Floor</th>
                        <th scope="col">Room</th>
                        <th scope="col">Out Quantity</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ps as $i => $sp)
                        <tr>
                            <th scope="row">{{$ps->firstItem() + $i}}</th>
                            <td>{{$sp->product}}</td>
                            <td>{{$sp->quantity}} {{$sp->unit}}</td>
                            <td>{{$sp->warehouse}}</td>
                            <td>{{$sp->floor}}</td>
                            <td>{{$sp->room}}</td>
                            <form action="{{route('product.stock.out.store', ['psid' => $sp->id])}}" method="post">
                                @csrf
                                <td>
                                    <input type="number" name="outQuantity" required min="1" max="{{$sp->quantity}}"
                                           class="form-control {{$errors->has('quantity') ? 'is-invalid' : ''}}">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                            onclick="return confirm('Are you sure ?')">Out
                                    </button>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!--end: table -->

                {{--                Pagination--}}
                <div class="kt-section">
                    <div class="kt-pagination  kt-pagination--brand">
                        {{$ps->links()}}
                        <div class="kt-datatable__pager-info">
                            <span class="kt-datatable__pager-detail">Showing {{$ps->firstItem()}} - {{$ps->lastItem()}} of {{$ps->total()}}</span>
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
