@extends('layouts.m')
@section('title', 'Spare Parts Purchase')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Spare Parts Purchase
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{route('home')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('spare-part.purchase')}}" class="kt-subheader__breadcrumbs-link">Spare Parts
                        Purchase</a>
                    {{--                    <span class="kt-subheader__breadcrumbs-separator"></span>--}}
                    {{--                    <a href="javascript:void (0)"--}}
                    {{--                       class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active"--}}
                    {{--                       style="padding-right: 1rem;">Create</a>--}}
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
                                    @if(count($spareparts) > 0)
                                        {{--      Form Start    --}}
                                        <form action="{{route('spare-part.purchase.store')}}" method="post">
                                            @csrf
                                            <div class="kt-section__body">
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Select Spare Part
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <select class="form-control kt-selectpicker"
                                                                name="sparePart" required id="sparePart"
                                                                data-live-search="true" data-size="7">
                                                            <option selected disabled hidden value="">Choose..</option>
                                                            @foreach($spareparts as $sp)
                                                                <option value="{{$sp->id}}">{{$sp->description}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Quantity
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input type="number" name="quantity"
                                                               class="form-control {{$errors->has('quantity') ? 'is-invalid' : ''}}"
                                                               value="{{old('quantity')}}" required min="0">
                                                        @if($errors->has('quantity'))
                                                            <span
                                                                class="invalid-feedback">{{$errors->first('quantity')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Unit
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input type="text" placeholder="Unit" name="unit" required
                                                               class="form-control {{$errors->has('unit') ? 'is-invalid' : ''}}"
                                                               value="{{old('unit')}}" readonly id="unit">
                                                        @if($errors->has('unit'))
                                                            <span
                                                                class="invalid-feedback">{{$errors->first('unit')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Country Of Origin
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input
                                                            class="form-control {{($errors->has('countryOfOrigin')) ? 'is-invalid' : ''}}"
                                                            type="text" name="countryOfOrigin"
                                                            value="{{old('countryOfOrigin')}}" list="countryOfOrigin">
                                                        @if($errors->has('countryOfOrigin'))
                                                            <span
                                                                class="invalid-feedback">{{$errors->first('countryOfOrigin')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Country Of Purchase
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input
                                                            class="form-control {{($errors->has('countryOfPurchase')) ? 'is-invalid' : ''}}"
                                                            type="text" name="countryOfPurchase" required
                                                            value="{{old('countryOfPurchase')}}"
                                                            list="countryOfPurchase">
                                                        @if($errors->has('countryOfPurchase'))
                                                            <span
                                                                class="invalid-feedback">{{$errors->first('countryOfPurchase')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Manufacturer Year
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input
                                                            class="form-control datepickerYear {{($errors->has('manufacturerYear')) ? 'is-invalid' : ''}}"
                                                            type="text" name="manufacturerYear" required
                                                            value="{{old('manufacturerYear')}}">
                                                        @if($errors->has('manufacturerYear'))
                                                            <span
                                                                class="invalid-feedback">{{$errors->first('manufacturerYear')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Currency
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input
                                                            class="form-control {{($errors->has('currency')) ? 'is-invalid' : ''}}"
                                                            type="text" name="currency" required
                                                            value="{{old('currency')}}" list="currency">
                                                        @if($errors->has('currency'))
                                                            <span
                                                                class="invalid-feedback">{{$errors->first('currency')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Unit Price
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input
                                                            class="form-control {{($errors->has('unitPrice')) ? 'is-invalid' : ''}}"
                                                            type="number" name="unitPrice" required min="0" step="0.01"
                                                            value="{{old('unitPrice')}}">
                                                        @if($errors->has('unitPrice'))
                                                            <span
                                                                class="invalid-feedback">{{$errors->first('unitPrice')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Price In CNF
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input
                                                            class="form-control {{($errors->has('priceInCnf')) ? 'is-invalid' : ''}}"
                                                            type="number" name="priceInCnf" min="0" step="0.01"
                                                            value="{{old('priceInCnf')}}">
                                                        @if($errors->has('priceInCnf'))
                                                            <span
                                                                class="invalid-feedback">{{$errors->first('priceInCnf')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Price In FOB
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input
                                                            class="form-control {{($errors->has('priceInFob')) ? 'is-invalid' : ''}}"
                                                            type="number" name="priceInFob" min="0" step="0.01"
                                                            value="{{old('priceInFob')}}">
                                                        @if($errors->has('priceInFob'))
                                                            <span
                                                                class="invalid-feedback">{{$errors->first('priceInFob')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        CNF Price In Dhaka
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input
                                                            class="form-control {{($errors->has('priceInDhaka')) ? 'is-invalid' : ''}}"
                                                            type="number" name="priceInDhaka" min="0" step="0.01"
                                                            value="{{old('priceInDhaka')}}">
                                                        {{--                                                    @if($errors->has('priceInDhaka'))--}}
                                                        {{--                                                        <span class="invalid-feedback">{{$errors->first('priceInDhaka')}}</span>--}}
                                                        {{--                                                    @endif--}}
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        CNF Price In Chittagong
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input
                                                            class="form-control {{($errors->has('priceInChittagong')) ? 'is-invalid' : ''}}"
                                                            type="number" name="priceInChittagong" min="0" step="0.01"
                                                            value="{{old('priceInChittagong')}}">
                                                        {{--                                                    @if($errors->has('priceInChittagong'))--}}
                                                        {{--                                                        <span class="invalid-feedback">{{$errors->first('priceInChittagong')}}</span>--}}
                                                        {{--                                                    @endif--}}
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Total Price
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input type="number" name="totalPrice" step="0.01"
                                                               class="form-control {{$errors->has('totalPrice') ? 'is-invalid' : ''}}"
                                                               value="{{old('totalPrice')}}" required min="0">
                                                        @if($errors->has('totalPrice'))
                                                            <span
                                                                class="invalid-feedback">{{$errors->first('totalPrice')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Date Of Purchase
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="input-group date">
                                                            <input
                                                                class="form-control {{$errors->has('dateOfPurchase') ? 'is-invalid' : ''}}"
                                                                type="text" name="dateOfPurchase" required readonly
                                                                placeholder="Select date" id="kt_datepicker_3"
                                                                value="{{old('dateOfPurchase')}}">
                                                            <div class="input-group-append">
														<span class="input-group-text">
															<i class="la la-calendar-check-o"></i>
														</span>
                                                            </div>
                                                        </div>
                                                        @if($errors->has('dateOfPurchase'))
                                                            <span
                                                                class="invalid-feedback">{{$errors->first('dateOfPurchase')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Date Of Arrival
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="input-group date">
                                                            <input
                                                                class="form-control {{$errors->has('dateOfArrival') ? 'is-invalid' : ''}}"
                                                                type="text" name="dateOfArrival" required readonly
                                                                placeholder="Select date" id="kt_datepicker_3"
                                                                value="{{old('dateOfArrival')}}">
                                                            <div class="input-group-append">
														<span class="input-group-text">
															<i class="la la-calendar-check-o"></i>
														</span>
                                                            </div>
                                                        </div>
                                                        @if($errors->has('dateOfArrival'))
                                                            <span
                                                                class="invalid-feedback">{{$errors->first('dateOfArrival')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Shipped By
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <select
                                                            class="form-control {{($errors->has('shippedBy')) ? 'is-invalid' : ''}}"
                                                            name="shippedBy" required>
                                                            <option selected disabled hidden value="">Choose...</option>
                                                            <option value="Air">Air</option>
                                                            <option value="Ship">Ship</option>
                                                            <option value="Local">Local</option>
                                                        </select>
                                                        @if($errors->has('shippedBy'))
                                                            <span
                                                                class="invalid-feedback">{{$errors->first('shippedBy')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Invoice Number
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input
                                                            class="form-control {{($errors->has('invoiceNumber')) ? 'is-invalid' : ''}}"
                                                            type="text" name="invoiceNumber" required
                                                            value="{{old('invoiceNumber')}}">
                                                        @if($errors->has('invoiceNumber'))
                                                            <span
                                                                class="invalid-feedback">{{$errors->first('invoiceNumber')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        LC Number
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input
                                                            class="form-control {{($errors->has('lcNumber')) ? 'is-invalid' : ''}}"
                                                            type="text" name="lcNumber" required
                                                            value="{{old('lcNumber')}}">
                                                        @if($errors->has('lcNumber'))
                                                            <span
                                                                class="invalid-feedback">{{$errors->first('lcNumber')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Note
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input
                                                            class="form-control {{($errors->has('note')) ? 'is-invalid' : ''}}"
                                                            type="text" name="note" required
                                                            value="{{old('note')}}">
                                                        @if($errors->has('note'))
                                                            <span
                                                                class="invalid-feedback">{{$errors->first('note')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
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
                                        <p class="text-danger">First create spare part <a
                                                href="{{route('spareParts.create')}}">here</a>, then purchase them.
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <datalist id="countryOfOrigin">
        @forelse($datalist['countryOfOrigin'] as $coo)
            <option value="{{$coo->country_origin}}">
        @empty
        @endforelse
    </datalist>
    <datalist id="countryOfPurchase">
        @forelse($datalist['countryOfPurchase'] as $cop)
            <option value="{{$cop->country_purchase}}">
        @empty
        @endforelse
    </datalist>
    <datalist id="currency">
        @forelse($datalist['currency'] as $c)
            <option value="{{$c->currency}}">
        @empty
        @endforelse
    </datalist>
@endsection
{{--@section('stickyToolbar')    --}}
{{--@endsection--}}
@section('script')
    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/bootstrap-select.js')}}" type="text/javascript"></script>
    <script>
        $(".datepickerYear").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
        });
        $(function () {
            $("#sparePart").on('change', function () {
                var spid = $(this).val();
                $.ajax({
                    url: '/ajax/spare-part-purchase/spidToUnit',
                    method: "GET",
                    data: {spid: spid},
                    success: function (r) {
                        $('#unit').val(r);
                    }
                });
            });
            // $("#cnfDhaka").on('keyup change', function () {
            //     var val = $(this).val();
            //     if (val != '') {
            //         $("#cnfCtg").prop('disabled', true);
            //     } else {
            //         $("#cnfCtg").prop('disabled', false);
            //     }
            // });
            // $("#cnfCtg").on('keyup change', function () {
            //     var val = $(this).val();
            //     if (val != '') {
            //         $("#cnfDhaka").prop('disabled', true);
            //     } else {
            //         $("#cnfDhaka").prop('disabled', false);
            //     }
            // });
        });
    </script>


    {{--    <script src="{{asset('m/assets/js/pages/crud/file-upload/uppy.js')}}" type="text/javascript"></script>--}}

    {{--    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/form-repeater.js')}}" type="text/javascript"></script>--}}
    {{--    <script src="{{asset('plugins/select2/select2.full.min.js')}}" type="text/javascript"></script>--}}

    <!--end::Page Scripts -->
@endsection
