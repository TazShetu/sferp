@extends('layouts.m')
@section('title', 'Spare Parts Store')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Spare Parts Store
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{route('home')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('spare-part.purchase')}}" class="kt-subheader__breadcrumbs-link">Spare Parts
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
            <div class="alert alert-success text-center">
                {{session('Success')}}
            </div>
        @elseif(session('unsuccess'))
            <div class="alert alert-warning text-center">
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
                                    @if(count($srooms) > 0)
                                        {{--      Form Start    --}}
                                        <form action="{{route('spare-part.purchase.stock', ['sphid' => $sph->id])}}" method="post">
                                            @csrf
                                            <div class="kt-section__body">
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Spare Part
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <select class="form-control kt-selectpicker" name="sparePart"
                                                                required>
                                                            <option selected hidden
                                                                    value="{{$sph->spareparts_id}}">{{$sph->spare_part}}</option>
                                                            <option disabled>{{$sph->spare_part}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Quantity
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input type="number" value="{{$sph->quantity}}" name="quantity"
                                                               class="form-control" readonly required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Spare Part Room
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <select class="form-control kt-selectpicker" id="sroom"
                                                                name="sparePartRoom" required>
                                                            <option selected disabled hidden value="">Choose...</option>
                                                            @foreach($srooms as $sr)
                                                                <option value="{{$sr->id}}">{{$sr->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="sroom-row-main-div"></div>
                                                <div id="sroom-row-rack-main-div"></div>
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
                                        First create spare part room <a href="{{route('sroom.index')}}">here</a>. Then
                                        store spare part.
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
            $("#sroom").on('change', function () {
                var srid = $(this).val();
                $.ajax({
                    url: '{{URL::to('/ajax/spare-part-store/sridToRooms')}}',
                    data: {srid: srid},
                    method: "GET",
                    success: function (r) {
                        $("#sroom-row-main-div").html(r);
                    }
                });
            });
        });
        $(document).on('change', '#sroom-row', function () {
            var rid = $(this).val();
            $.ajax({
                url: '{{URL::to('/ajax/spare-part-store/ridToRacks')}}',
                data: {rid: rid},
                method: "GET",
                success: function (r) {
                    $("#sroom-row-rack-main-div").html(r);
                }
            });
        });
    </script>
@endsection
