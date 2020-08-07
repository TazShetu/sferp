@extends('layouts.m')
@section('title', 'Raw Material Store')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Raw Material Store
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{route('home')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('raw-material.purchase')}}" class="kt-subheader__breadcrumbs-link">Raw Material
                        Purchase</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="javascript:void (0)"
                       class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active"
                       style="padding-right: 1rem;">Store</a>
                </div>
            </div>
            <div class="kt-subheader__toolbar"></div>
        </div>
    </div>
@endsection
@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        @if(session('Success'))
            <div class="alert alert-success text-center" id="toaster">
                {{session('Success')}}
            </div>
        @elseif(session('unsuccess'))
            <div class="alert alert-warning text-center" id="toaster">
                {{session('unsuccess')}}
            </div>
        @endif
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__body">
                <div class="tab-content">
                    <div id="kt_user_edit_tab_1" class="tab-pane active">
                        <div class="kt-form kt-form--label-right">
                            <div class="kt-form__body">
                                <div class="kt-section kt-section--first">
                                    @if(count($warehouses) > 0)
                                        {{--      Form Start    --}}
                                        <form action="{{route('raw-material.purchase.stock', ['rmpid' => $rmp->id])}}"
                                              method="post">
                                            @csrf
                                            <div class="kt-section__body">
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Raw Material
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <select class="form-control kt-selectpicker" name="rawMaterial"
                                                                required>
                                                            <option selected hidden
                                                                    value="{{$rmp->rawmaterial_id}}">{{$rmp->raw_material}}</option>
                                                            <option disabled>{{$rmp->raw_material}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Quantity
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input type="number" value="{{$rmp->quantity}}" name="quantity"
                                                               class="form-control" readonly required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Warehouse
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <select class="form-control kt-selectpicker" id="warehouse"
                                                                name="warehouse" required>
                                                            <option selected disabled hidden value="">Choose...</option>
                                                            @foreach($warehouses as $w)
                                                                <option value="{{$w->id}}">{{$w->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="warehouse-floor-main-div"></div>
                                                <div id="warehouse-floor-room-main-div"></div>
                                                <div
                                                    class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
                                                <div class="kt-form__actions">
                                                    <div class="row">
                                                        <div class="col-xl-3"></div>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <button type="submit" class="btn btn-label-brand btn-bold">
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
                                        {{--Form End--}}
                                    @else
                                        First create Warehouse <a href="{{route('warehouse.index')}}">here</a>. Then
                                        store raw material.
                                    @endif
                                </div>
                            </div>
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
    <script>
        $(function () {
            $("#warehouse").on('change', function () {
                var wid = $(this).val();
                $.ajax({
                    url: '{{URL::to('/ajax/raw-material-store/widToFloor')}}',
                    data: {wid: wid},
                    method: "GET",
                    success: function (r) {
                        $("#warehouse-floor-main-div").html(r);
                    }
                });
            });
        });
        $(document).on('change', '#warehouse-floor', function () {
            var fid = $(this).val();
            $.ajax({
                url: '{{URL::to('/ajax/raw-material-store/fidToRoom')}}',
                data: {fid: fid},
                method: "GET",
                success: function (r) {
                    $("#warehouse-floor-room-main-div").html(r);
                }
            });
        });
    </script>
@endsection
