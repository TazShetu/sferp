@extends('layouts.m')
@section('title', 'Spare Parts Stock In')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Spare Parts Stock In
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
            {{--            --}}
            <div class="kt-subheader__toolbar">
                <a href="{{route('spare-part.stock.in.history')}}" class="btn btn-label-brand btn-bold">History</a>
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
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__body">
                <div class="tab-content">
                    <div id="kt_user_edit_tab_1" class="tab-pane active">
                        <div class="kt-form kt-form--label-right">
                            <div class="kt-form__body">
                                <div class="kt-section kt-section--first">
                                    @if(count($srooms) > 0)
                                        @if(count($spareparts) > 0)
                                            {{--      Form Start    --}}
                                            <form action="{{route('spare-part.stock.in.store')}}" method="post">
                                                @csrf
                                                <div class="kt-section__body">
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Spare Part
                                                        </label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control kt-selectpicker"
                                                                    name="sparePart" required id="sparePart"
                                                                    data-live-search="true" data-size="7">
                                                                <option selected disabled hidden value="">Choose
                                                                </option>
                                                                @foreach($spareparts as $sp)
                                                                    <option
                                                                        value="{{$sp->id}}">{{$sp->description}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Quantity
                                                        </label>
                                                        <div class="input-group col-lg-9 col-xl-6">
                                                            <input type="number" name="quantity" min="1"
                                                                   class="form-control" required>
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text" id="unit">.</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Spare Part Room
                                                        </label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control kt-selectpicker" id="sroom"
                                                                    name="sparePartRoom" required>
                                                                <option selected disabled hidden value="">Choose...
                                                                </option>
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
                                                                <button type="submit"
                                                                        class="btn btn-label-brand btn-bold">
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
                                            First create spare part <a href="{{route('spareParts.create')}}">here</a>.
                                            Then stock spare part.
                                        @endif
                                    @else
                                        First create spare part room <a href="{{route('sroom.index')}}">here</a>. Then
                                        stock spare part.
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
    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/bootstrap-select.js')}}" type="text/javascript"></script>
    <script>
        $(function () {
            $("#sparePart").on('change', function () {
                var spid = $(this).val();
                $.ajax({
                    url: '/ajax/spare-part-purchase/spidToUnit',
                    method: "GET",
                    data: {spid: spid},
                    success: function (r) {
                        $('#unit').html(r);
                    }
                });
            });
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
