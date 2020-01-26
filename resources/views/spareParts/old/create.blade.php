@extends('layouts.m')
@section('title', 'Spare Parts Create')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Spare Parts Create
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{route('home')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('spareParts.list')}}" class="kt-subheader__breadcrumbs-link">Spare Parts</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="javascript:void (0)"
                       class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active"
                       style="padding-right: 1rem;">Create</a>
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
                                    {{--      Form Start    --}}
                                    <form action="{{route('spareParts.store')}}" method="post">
                                        @csrf
                                        <div class="kt-section__body">
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Country Of Origin
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('countryOfOrigin')) ? 'is-invalid' : ''}}"
                                                           type="text" name="countryOfOrigin" required
                                                           value="{{old('countryOfOrigin')}}" list="countryOfOrigin">
                                                    @if($errors->has('countryOfOrigin'))
                                                        <span class="invalid-feedback">{{$errors->first('countryOfOrigin')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Country Of Purchase
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('countryOfPurchase')) ? 'is-invalid' : ''}}"
                                                           type="text" name="countryOfPurchase" required
                                                           value="{{old('countryOfPurchase')}}" list="countryOfPurchase">
                                                    @if($errors->has('countryOfPurchase'))
                                                        <span class="invalid-feedback">{{$errors->first('countryOfPurchase')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Manufacturer Name
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('manufacturerName')) ? 'is-invalid' : ''}}"
                                                           type="text" name="manufacturerName" required
                                                           value="{{old('manufacturerName')}}" list="manufacturer">
                                                    @if($errors->has('manufacturerName'))
                                                        <span class="invalid-feedback">{{$errors->first('manufacturerName')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Manufacturer Year
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control datepickerYear {{($errors->has('manufacturerYear')) ? 'is-invalid' : ''}}"
                                                           type="text" name="manufacturerYear" required
                                                           value="{{old('manufacturerYear')}}">
                                                    @if($errors->has('manufacturerYear'))
                                                        <span class="invalid-feedback">{{$errors->first('manufacturerYear')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Currency
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('currency')) ? 'is-invalid' : ''}}"
                                                           type="text" name="currency" required
                                                           value="{{old('currency')}}" list="currency">
                                                    @if($errors->has('currency'))
                                                        <span class="invalid-feedback">{{$errors->first('currency')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Unit Price
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('unitPrice')) ? 'is-invalid' : ''}}"
                                                           type="number" name="unitPrice" required min="0" step="0.01"
                                                           value="{{old('unitPrice')}}">
                                                    @if($errors->has('unitPrice'))
                                                        <span class="invalid-feedback">{{$errors->first('unitPrice')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Price In CNF
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('priceInCnf')) ? 'is-invalid' : ''}}"
                                                           type="number" name="priceInCnf" required min="0" step="0.01"
                                                           value="{{old('priceInCnf')}}">
                                                    @if($errors->has('priceInCnf'))
                                                        <span class="invalid-feedback">{{$errors->first('priceInCnf')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Price In FOB
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('priceInFob')) ? 'is-invalid' : ''}}"
                                                           type="number" name="priceInFob" required min="0" step="0.01"
                                                           value="{{old('priceInFob')}}">
                                                    @if($errors->has('priceInFob'))
                                                        <span class="invalid-feedback">{{$errors->first('priceInFob')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    CNF Price In Dhaka
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('priceInDhaka')) ? 'is-invalid' : ''}}"
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
                                                    <input class="form-control {{($errors->has('priceInChittagong')) ? 'is-invalid' : ''}}"
                                                           type="number" name="priceInChittagong" min="0" step="0.01"
                                                           value="{{old('priceInChittagong')}}">
                                                    {{--                                                    @if($errors->has('priceInChittagong'))--}}
                                                    {{--                                                        <span class="invalid-feedback">{{$errors->first('priceInChittagong')}}</span>--}}
                                                    {{--                                                    @endif--}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Date Of Purchase
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="input-group date">
                                                        <input class="form-control {{$errors->has('dateOfPurchase') ? 'is-invalid' : ''}}"
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
                                                        <span class="invalid-feedback">{{$errors->first('dateOfPurchase')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Date Of Arrival
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="input-group date">
                                                        <input class="form-control {{$errors->has('dateOfArrival') ? 'is-invalid' : ''}}"
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
                                                        <span class="invalid-feedback">{{$errors->first('dateOfArrival')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Shipped By
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select class="form-control {{($errors->has('shippedBy')) ? 'is-invalid' : ''}}"
                                                            name="shippedBy" required>
                                                        <option selected disabled hidden value="">Choose...</option>
                                                        <option value="Air">Air</option>
                                                        <option value="Ship">Ship</option>
                                                    </select>
                                                    @if($errors->has('shippedBy'))
                                                        <span class="invalid-feedback">{{$errors->first('shippedBy')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Name
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('name')) ? 'is-invalid' : ''}}"
                                                           type="text" name="name" required
                                                           value="{{old('name')}}">
                                                    @if($errors->has('name'))
                                                        <span class="invalid-feedback">{{$errors->first('name')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Description
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('description')) ? 'is-invalid' : ''}}"
                                                           type="text" name="description" required
                                                           value="{{old('description')}}">
                                                    @if($errors->has('description'))
                                                        <span class="invalid-feedback">{{$errors->first('description')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Code Number
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('codeNumber')) ? 'is-invalid' : ''}}"
                                                           type="text" name="codeNumber" required
                                                           value="{{old('codeNumber')}}">
                                                    @if($errors->has('codeNumber'))
                                                        <span class="invalid-feedback">{{$errors->first('codeNumber')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Part Number
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('partNumber')) ? 'is-invalid' : ''}}"
                                                           type="text" name="partNumber" required
                                                           value="{{old('partNumber')}}">
                                                    @if($errors->has('partNumber'))
                                                        <span class="invalid-feedback">{{$errors->first('partNumber')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Identity Number
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('identityNumber')) ? 'is-invalid' : ''}}"
                                                           type="text" name="identityNumber" required
                                                           value="{{old('identityNumber')}}">
                                                    @if($errors->has('identityNumber'))
                                                        <span class="invalid-feedback">{{$errors->first('identityNumber')}}</span>
                                                    @endif
                                                    <span class="form-text text-muted">It has to be unique*</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Invoice Number
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('invoiceNumber')) ? 'is-invalid' : ''}}"
                                                           type="text" name="invoiceNumber" required
                                                           value="{{old('invoiceNumber')}}">
                                                    @if($errors->has('invoiceNumber'))
                                                        <span class="invalid-feedback">{{$errors->first('invoiceNumber')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    LC Number
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('lcNumber')) ? 'is-invalid' : ''}}"
                                                           type="text" name="lcNumber" required
                                                           value="{{old('lcNumber')}}">
                                                    @if($errors->has('lcNumber'))
                                                        <span class="invalid-feedback">{{$errors->first('lcNumber')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Note
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('note')) ? 'is-invalid' : ''}}"
                                                           type="text" name="note" required
                                                           value="{{old('note')}}">
                                                    @if($errors->has('note'))
                                                        <span class="invalid-feedback">{{$errors->first('note')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Minimum Storage Amount
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('minimumStorage')) ? 'is-invalid' : ''}}"
                                                           type="number" name="minimumStorage" required min="0"
                                                           value="{{old('minimumStorage')}}">
                                                    @if($errors->has('minimumStorage'))
                                                        <span class="invalid-feedback">{{$errors->first('minimumStorage')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
                                            <div class="kt-form__actions">
                                                <div class="row">
                                                    <div class="col-xl-3"></div>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <button type="submit" class="btn btn-label-brand btn-bold">
                                                            Save Changes
                                                        </button>
                                                        <a href="javascript:void (0)" data-link="{{route('cancel')}}"
                                                           class="cancel btn btn-label-danger btn-bold float-right">Reset</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {{--Form End--}}
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
    <datalist id="manufacturer">
        @forelse($datalist['manufacturer'] as $m)
            <option value="{{$m->manufacturer}}">
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
    <!--begin::Page Vendors(used by this page) -->
    <!--end::Page Vendors -->

    <!--begin::Page Scripts(used by this page) -->
    {{--    <script src="{{asset('m/assets/js/pages/custom/user/edit-user.js')}}" type="text/javascript"></script>--}}
    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"
            type="text/javascript"></script>
    <script>
        $(".datepickerYear").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
        });
    </script>


    {{--    <script src="{{asset('m/assets/js/pages/crud/file-upload/uppy.js')}}" type="text/javascript"></script>--}}

    {{--    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/form-repeater.js')}}" type="text/javascript"></script>--}}
    {{--    <script src="{{asset('plugins/select2/select2.full.min.js')}}" type="text/javascript"></script>--}}

    <!--end::Page Scripts -->
@endsection