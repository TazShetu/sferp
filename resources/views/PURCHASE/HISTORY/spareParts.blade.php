@extends('layouts.m')
@section('title', 'Spare Parts Purchase History')
{{--@section('link')--}}

{{--@endsection--}}
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    <a href="{{route('spare-part.purchase.history')}}">Spare Parts Purchase History</a>
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            </div>
            <div class="kt-subheader__toolbar">
                <a href="{{route('spare-part.purchase')}}" class="btn btn-label-brand btn-bold">Purchase </a>
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
                                    <div class="form-group mx-sm-3 m-2">
                                        <select class="form-control kt-selectpicker" name="spid" data-live-search="true"
                                                data-size="7">
                                            @if((count($query) > 0) && array_key_exists("spid", $query))
                                                <option selected hidden
                                                        value="{{$query['spid']}}">{{$query['sparePartD']}}</option>
                                            @else
                                                <option selected disabled hidden value="">Spare Parts</option>
                                            @endif
                                            @foreach($spareparts as $s)
                                                <option value="{{$s->id}}">{{$s->description}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mx-sm-3 m-2">
                                        <select class="form-control" name="status">
                                            @if((count($query) > 0) && array_key_exists("status", $query))
                                                <option selected hidden
                                                        value="{{$query['status']}}">{{$query['status']}}</option>
                                            @else
                                                <option selected disabled hidden value="Status">Status</option>
                                            @endif
                                            <option value="pending">Pending</option>
                                            <option value="stored">Stored</option>
                                            <option value="received">Received</option>
                                        </select>
                                    </div>
                                    <div class="form-group mx-sm-3 m-2">
                                        <input type="number" name="quantity" class="form-control" min="0"
                                               placeholder="Quantity"
                                               value="{{$query ? ($query['quantity'] ? $query['quantity'] : '') : ''}}">
                                    </div>
                                    <div class="form-group mx-sm-3 m-2">
                                        <input type="text" name="country" class="form-control"
                                               placeholder="Country Of Purchase"
                                               value="{{$query ? ($query['country'] ? $query['country'] : '') : ''}}">
                                    </div>
                                    <div class="form-group mx-sm-3 m-2">
                                        <input type="number" name="price" class="form-control" min="0" step="0.01"
                                               placeholder="Total Price"
                                               value="{{$query ? ($query['price'] ? $query['price'] : '') : ''}}">
                                    </div>
                                    <div class="form-group mx-sm-3 m-2">
                                        <input type="text" name="invoice" class="form-control"
                                               placeholder="Invoice Number"
                                               value="{{$query ? ($query['invoice'] ? $query['invoice'] : '') : ''}}">
                                    </div>
                                    <div class="form-group mx-sm-3 m-2">
                                        <input type="text" name="lc" class="form-control"
                                               placeholder="LC Number"
                                               value="{{$query ? ($query['lc'] ? $query['lc'] : '') : ''}}">
                                    </div>
                                    <button type="submit" class="btn btn-primary m-2">Confirm Search</button>
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
                        Spare Parts Purchase History
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
                        <th scope="col">Invoice Number</th>
                        <th scope="col">LC Number</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($histories as $i => $h)
                        <tr>
                            <th scope="row">{{$histories->firstItem() + $i}}</th>
                            <td>{{$h->spare_part}}</td>
                            <td>{{$h->status}}</td>
                            <td>{{$h->quantity}} {{$h->unit}}</td>
                            <td>{{$h->country_purchase}}</td>
                            <td>{{$h->total_price}} {{$h->currency}}</td>
                            <td>{{$h->invoice_number}}</td>
                            <td>{{$h->lc_number}}</td>
                            <td>
                                @if($h->status == 'pending')
                                    <a href="{{route('spare-part.purchase.edit', ['spid' => $h->id])}}" title="Edit"
                                       class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                        <i class="la la-edit"></i>
                                    </a>
                                    <form action="{{route('spare-part.purchase.delete', ['spid' => $h->id])}}"
                                          method="POST"
                                          style="display: inline-table;">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                                onclick="return confirm('Are you sure you want to delete the Purchase history ?')">
                                            <i class="la la-trash" style="color: #fd397a;"></i>
                                        </button>
                                    </form>
                                @else
                                    <a href="javascript: void(0)"
                                       class="btn btn-sm btn-clean btn-icon btn-icon-md disabled">
                                        <i class="la la-edit"></i>
                                    </a>
                                    <a href="javascript: void(0)"
                                       class="btn btn-sm btn-clean btn-icon btn-icon-md disabled">
                                        <i class="la la-trash" style="color: #fd397a;"></i>
                                    </a>
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
    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/bootstrap-select.js')}}" type="text/javascript"></script>


@endsection
