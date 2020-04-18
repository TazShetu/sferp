@extends('layouts.m')
@section('title', 'Raw Material Purchase Edit')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Raw Material Purchase Edit
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
                       style="padding-right: 1rem;">Edit</a>
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
                                    <form action="{{route('raw-material.purchase.update', ['rpid' => $rpedit->id])}}" method="post">
                                        @csrf
                                        <div class="kt-section__body">
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Select Raw Material
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select class="form-control kt-selectpicker"
                                                            name="rawMaterial" required id="rawMaterial"
                                                            data-live-search="true" data-size="7">
                                                        <option selected hidden
                                                                value="{{$rpedit->rawmaterial_id}}">{{$rpedit->rawmaterial}}</option>
                                                        @foreach($rawmaterials as $rm)
                                                            <option value="{{$rm->id}}">{{$rm->auto_id}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Invoice Date</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="input-group date">
                                                        <input
                                                            class="form-control {{$errors->has('invoiceDate') ? 'is-invalid' : ''}}"
                                                            type="text" name="invoiceDate" required readonly
                                                            placeholder="Select date" id="kt_datepicker_3"
                                                            value="{{$rpedit->invoice_date}}">
                                                        <div class="input-group-append">
														<span class="input-group-text">
															<i class="la la-calendar-check-o"></i>
														</span>
                                                        </div>
                                                    </div>
                                                    @if($errors->has('invoiceDate'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('invoiceDate')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Invoice Number
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="text" name="invoiceNumber"
                                                           class="form-control {{$errors->has('invoiceNumber') ? 'is-invalid' : ''}}"
                                                           value="{{$rpedit->invoice_number}}" required>
                                                    @if($errors->has('invoiceNumber'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('invoiceNumber')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Description
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="text" name="description"
                                                           class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}"
                                                           value="{{$rpedit->description}}" required>
                                                    @if($errors->has('description'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('description')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    HS Code
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="text" name="hsCode"
                                                           class="form-control {{$errors->has('hsCode') ? 'is-invalid' : ''}}"
                                                           value="{{$rpedit->hs_code}}" required>
                                                    @if($errors->has('hsCode'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('hsCode')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Quantity
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="number" name="quantity"
                                                           class="form-control {{$errors->has('quantity') ? 'is-invalid' : ''}}"
                                                           value="{{$rpedit->quantity}}" required min="0">
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
                                                           value="{{$rpedit->unit}}" readonly id="unit">
                                                    @if($errors->has('unit'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('unit')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    CNF Dhaka
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="number" name="cnfDhaka" step="0.01" id="cnfDhaka"
                                                           class="form-control {{$errors->has('cnfDhaka') ? 'is-invalid' : ''}}"
                                                           value="{{($rpedit->cnf_dhaka) ? $rpedit->cnf_dhaka : '' }}"
                                                           min="0" {{($rpedit->cnf_dhaka) ? '' : 'disabled' }}>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    CNF Ctg
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="number" name="cnfCtg" step="0.01" id="cnfCtg"
                                                           class="form-control {{$errors->has('cnfCtg') ? 'is-invalid' : ''}}"
                                                           value="{{($rpedit->cnf_ctg) ? $rpedit->cnf_ctg : '' }}"
                                                           min="0" {{($rpedit->cnf_ctg) ? '' : 'disabled' }}>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Price Per Unit
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="number" name="pricePerUnit" step="0.01"
                                                           class="form-control {{$errors->has('pricePerUnit') ? 'is-invalid' : ''}}"
                                                           value="{{$rpedit->price_per_unit}}" required min="0">
                                                    @if($errors->has('pricePerUnit'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('pricePerUnit')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Currency
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="text" name="currency" list="currency"
                                                           class="form-control {{$errors->has('currency') ? 'is-invalid' : ''}}"
                                                           value="{{$rpedit->currency}}" required>
                                                    @if($errors->has('currency'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('currency')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    CNF Total Price
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="number" name="totalPrice" step="0.01"
                                                           class="form-control {{$errors->has('totalPrice') ? 'is-invalid' : ''}}"
                                                           value="{{$rpedit->total_price}}" required min="0">
                                                    @if($errors->has('totalPrice'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('totalPrice')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Purchased From
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="text" name="purchasedFrom" list="purchaseFrom"
                                                           class="form-control {{$errors->has('purchasedFrom') ? 'is-invalid' : ''}}"
                                                           value="{{$rpedit->purchase_from}}" required>
                                                    @if($errors->has('purchasedFrom'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('purchasedFrom')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Indented Date</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="input-group date">
                                                        <input
                                                            class="form-control {{$errors->has('indentedDate') ? 'is-invalid' : ''}}"
                                                            type="text" name="indentedDate" required readonly
                                                            placeholder="Select date" id="kt_datepicker_3"
                                                            value="{{$rpedit->indented_date}}">
                                                        <div class="input-group-append">
														<span class="input-group-text">
															<i class="la la-calendar-check-o"></i>
														</span>
                                                        </div>
                                                    </div>
                                                    @if($errors->has('invoiceDate'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('invoiceDate')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Indented By
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="text" name="indentedBy" list="indentedBy"
                                                           class="form-control {{$errors->has('indentedBy') ? 'is-invalid' : ''}}"
                                                           value="{{$rpedit->indented_by}}" required>
                                                    @if($errors->has('indentedBy'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('indentedBy')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Imported By
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="text" name="importedBy" list="importedBy"
                                                           class="form-control {{$errors->has('importedBy') ? 'is-invalid' : ''}}"
                                                           value="{{$rpedit->imported_by}}" required>
                                                    @if($errors->has('importedBy'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('importedBy')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    LC Number
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="text" name="lcNumber"
                                                           class="form-control {{$errors->has('lcNumber') ? 'is-invalid' : ''}}"
                                                           value="{{$rpedit->lc_number}}" required>
                                                    @if($errors->has('lcNumber'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('lcNumber')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Port Of Landing
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="text" name="portOfLanding" list="portOfLanding"
                                                           class="form-control {{$errors->has('portOfLanding') ? 'is-invalid' : ''}}"
                                                           value="{{$rpedit->port_of_landing}}" required>
                                                    @if($errors->has('portOfLanding'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('portOfLanding')}}</span>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <datalist id="currency">
        @forelse($datalist['currency'] as $c)
            <option value="{{$c->currency}}">
        @empty
        @endforelse
    </datalist>
    <datalist id="purchaseFrom">
        @forelse($datalist['purchaseFrom'] as $c)
            <option value="{{$c->purchase_from}}">
        @empty
        @endforelse
    </datalist>
    <datalist id="indentedBy">
        @forelse($datalist['indentedBy'] as $c)
            <option value="{{$c->indented_by}}">
        @empty
        @endforelse
    </datalist>
    <datalist id="importedBy">
        @forelse($datalist['importedBy'] as $c)
            <option value="{{$c->imported_by}}">
        @empty
        @endforelse
    </datalist>
    <datalist id="portOfLanding">
        @forelse($datalist['portOfLanding'] as $c)
            <option value="{{$c->port_of_landing}}">
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
        $(function () {
            $("#rawMaterial").on('change', function () {
                var rid = $(this).val();
                $.ajax({
                    url: '/ajax/raw-material-purchase/ridToUnit',
                    method: "GET",
                    data: {rid: rid},
                    success: function (r) {
                        $('#unit').val(r);
                    }
                });
            });
            $("#cnfDhaka").on('keyup change', function () {
                var val = $(this).val();
                if (val != '') {
                    $("#cnfCtg").prop('disabled', true);
                } else {
                    $("#cnfCtg").prop('disabled', false);
                }
            });
            $("#cnfCtg").on('keyup change', function () {
                var val = $(this).val();
                if (val != '') {
                    $("#cnfDhaka").prop('disabled', true);
                } else {
                    $("#cnfDhaka").prop('disabled', false);
                }
            });
        });
    </script>
@endsection
