@extends('layouts.m')
@section('title', 'Spare Parts Purchase History')
{{--@section('link')--}}

{{--@endsection--}}
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    <a href="" style="text-decoration: none;">Spare Parts (Purchase) Received</a>
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            </div>
            {{--            <div class="kt-subheader__toolbar">--}}
            {{--                <a href="{{route('spare-part.purchase')}}" class="btn btn-label-brand btn-bold">Purchase </a>--}}
            {{--            </div>--}}
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
                        Spare Parts (Purchase) Received
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
                        <th scope="col">Spare Part</th>
                        <th scope="col">Status</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Country Of Purchase</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">LC Number</th>
                        <th scope="col">Invoice Number</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($histories as $i => $h)
                        <tr>
                            <th scope="row">{{$histories->firstItem() + $i}}</th>
                            <td>{{$h->spare_part}}</td>
                            <th>{{$h->status}}</th>
                            <td>{{$h->quantity}} {{$h->unit}}</td>
                            <td>{{$h->country_purchase}}</td>
                            <td>{{$h->total_price}} {{$h->currency}}</td>
                            <td>{{$h->lc_number}}</td>
                            <td>{{$h->invoice_number}}</td>
                            <td>
                                @if($h->status == 'pending')
                                    <form action="{{route('spare-part.purchase.received', ['spid' => $h->id])}}"
                                          method="POST" style="display: inline-table;">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success"
                                                onclick="return confirm('Are you sure you have received the Spare Parts ?')">
                                            Received
                                        </button>
                                    </form>
                                @else
                                    <form action="{{route('spare-part.purchase.received.not', ['spid' => $h->id])}}"
                                          method="POST" style="display: inline-table;">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you have not received the Spare Parts ?')">
                                            Not Received
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!--end: table -->

                {{--                Pagination--}}
                <div class="kt-section">
                    <div class="kt-pagination  kt-pagination--brand">
                        {{$histories->links()}}
                        <div class="kt-datatable__pager-info">
                            <span class="kt-datatable__pager-detail">Showing {{$histories->firstItem()}} - {{$histories->lastItem()}} of {{$histories->total()}}</span>
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
