@include('bnTime')
@php
    $time = time();
    $Bdate = BDdate($time);
@endphp
@extends('layouts.m')
@section('title', 'Daily Sheet Dhaka Debit Customer')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Daily Sheet Dhaka
                </h3>
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
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        {{date('jS M Y')}}
                    </h3>
                </div>
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        {{$Bdate}}
                    </h3>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-6">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="kt-portlet kt-portlet--tabs">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                                        Debit Side (জমা)
                                    </h3>
                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                <div class="tab-content">
                                    <div id="kt_user_edit_tab_1" class="tab-pane active">
                                        <div class="kt-form kt-form--label-right">
                                            <div class="kt-form__body">
                                                <div class="kt-section kt-section--first">
                                                    <h3>Opening Balance {{$ob}} Tk</h3>
                                                </div>
                                                <div class="kt-section kt-section--first">
                                                    <table class="table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Customer Payment</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Mode Of Payment</th>
                                                            <th scope="col">Amount</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @forelse($dcs as $i => $dc)
                                                            <tr>
                                                                <th scope="row">{{$i + 1}}</th>
                                                                <td>{{$dc->name}}</td>
                                                                <td>{{$dc->payment_type}}</td>
                                                                <td>{{$dc->amount}}</td>
                                                            </tr>
                                                            @php
                                                                $ob = $ob + $dc->amount
                                                            @endphp
                                                        @empty
                                                            <tr>
                                                                <th scope="row"></th>
                                                                <td>Nothing to show</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="kt-section kt-section--first">
                                                    <table class="table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Cash Deposit</th>
                                                            <th scope="col">Deposited By</th>
                                                            <th scope="col">Amount</th>
                                                            <th scope="col">For</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @forelse($dcis as $i => $dci)
                                                            <tr>
                                                                <th scope="row">{{$i + 1}}</th>
                                                                <td>{{$dci->deposit_by}}</td>
                                                                <td>{{$dci->amount}}</td>
                                                                <td>{{$dci->for}}</td>
                                                            </tr>
                                                            @php
                                                                $ob = $ob + $dci->amount
                                                            @endphp
                                                        @empty
                                                            <tr>
                                                                <th scope="row"></th>
                                                                <td>Nothing to show</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="kt-section kt-section--first">
                                                    <table class="table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Bank Withdraw</th>
                                                            <th scope="col">A/C name</th>
                                                            <th scope="col">Info</th>
                                                            <th scope="col">Amount</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @forelse($dbws as $i => $dbw)
                                                            <tr>
                                                                <th scope="row">{{$i + 1}}</th>
                                                                <td>{{$dbw->acname}}</td>
                                                                <td>{{$dbw->info}}</td>
                                                                <td>{{$dbw->amount}}</td>
                                                            </tr>
                                                            @php
                                                                $ob = $ob + $dbw->amount
                                                            @endphp
                                                        @empty
                                                            <tr>
                                                                <th scope="row"></th>
                                                                <td>Nothing to show</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="kt-section kt-section--first">
                                                    <table class="table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Produst(s) in</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">Note</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @forelse($dpis as $i => $dpi)
                                                            <tr>
                                                                <th scope="row">{{$i + 1}}</th>
                                                                <td>{{$dpi->product_name}}</td>
                                                                <td>{{$dpi->quantity}}</td>
                                                                <td>{{$dpi->note}}</td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <th scope="row"></th>
                                                                <td>Nothing to show</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="kt-portlet kt-portlet--tabs">
                            <div class="kt-portlet__body">
                                <div class="tab-content">
                                    <div id="kt_user_edit_tab_1" class="tab-pane active">
                                        <div class="kt-form kt-form--label-right">
                                            <div class="kt-form__body">
                                                <div class="kt-section kt-section--first">
                                                    <div class="kt-section__body accordion" id="accordionExample1">
                                                        {{--Customers--}}
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <div class="card-title collapsed" data-toggle="collapse"
                                                                     data-target="#collapseCustomers"
                                                                     aria-expanded="false"
                                                                     aria-controls="collapseCustomers">
                                                                    Customers
                                                                </div>
                                                            </div>
                                                            <div id="collapseCustomers" class="collapse"
                                                                 aria-labelledby="headingOne"
                                                                 data-parent="#accordionExample1"
                                                                 style="">
                                                                <div class="card-body">
                                                                    {{--      Form Start Customers   --}}
                                                                    <form action="{{route('dsdd.customer.store')}}"
                                                                          method="post">
                                                                        @csrf
                                                                        <div class="kt-section__body">
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    Customer
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <select
                                                                                        class="form-control kt-selectpicker {{($errors->has('customer_id')) ? 'is-invalid' : ''}}"
                                                                                        name="customer_id"
                                                                                        data-live-search="true"
                                                                                        data-size="7" required>
                                                                                        <option selected disabled hidden
                                                                                                value="">Choose...
                                                                                        </option>
                                                                                        @foreach($customers as $pn)
                                                                                            <option value="{{$pn->id}}">
                                                                                                {{$pn->name}}
                                                                                                (C): {{$pn->company_name}}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    Mode Of Payment
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <select
                                                                                        class="form-control {{($errors->has('payment_type')) ? 'is-invalid' : ''}}"
                                                                                        name="payment_type" required>
                                                                                        <option selected disabled hidden
                                                                                                value="">Choose...
                                                                                        </option>
                                                                                        <option value="Cash">Cash
                                                                                        </option>
                                                                                        <option value="TT">TT</option>
                                                                                        <option value="Cheque">Cheque
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    Amount
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <input
                                                                                        class="form-control {{($errors->has('amount')) ? 'is-invalid' : ''}}"
                                                                                        type="number" name="amount"
                                                                                        value="{{old('amount')}}"
                                                                                        step="0.01" min="0" required>
                                                                                </div>
                                                                            </div>
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
                                                                    {{--Form End Customers--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--Customers End--}}
                                                        {{--Bank Withdrawal--}}
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <div class="card-title collapsed" data-toggle="collapse"
                                                                     data-target="#collapseBankWithdrawal"
                                                                     aria-expanded="false"
                                                                     aria-controls="collapseBankWithdrawal">
                                                                    Bank Withdrawal
                                                                </div>
                                                            </div>
                                                            <div id="collapseBankWithdrawal" class="collapse"
                                                                 aria-labelledby="headingOne"
                                                                 data-parent="#accordionExample1"
                                                                 style="">
                                                                <div class="card-body">
                                                                    {{--      Form Start Bank Withdrawal   --}}
                                                                    <form action="{{route('dsdd.bankWithdraw.store')}}"
                                                                          method="post">
                                                                        @csrf
                                                                        <div class="kt-section__body">
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    Bank Account
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <select
                                                                                        class="form-control kt-selectpicker {{($errors->has('bankaccount_id')) ? 'is-invalid' : ''}}"
                                                                                        name="bankaccount_id"
                                                                                        data-live-search="true"
                                                                                        data-size="7" required>
                                                                                        <option selected disabled hidden
                                                                                                value="">Choose...
                                                                                        </option>
                                                                                        @foreach($bas as $pn)
                                                                                            <option value="{{$pn->id}}">
                                                                                                {{$pn->ac_name}}
                                                                                                (N): {{$pn->ac_number}}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @if($errors->has('bankaccount_id'))
                                                                                        <span
                                                                                            class="invalid-feedback">{{$errors->first('bankaccount_id')}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    Amount
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <input
                                                                                        class="form-control {{($errors->has('amount')) ? 'is-invalid' : ''}}"
                                                                                        type="number" name="amount"
                                                                                        value="{{old('amount')}}"
                                                                                        step="0.01" min="0" required>
                                                                                    @if($errors->has('amount'))
                                                                                        <span
                                                                                            class="invalid-feedback">{{$errors->first('amount')}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    Info
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <input
                                                                                        class="form-control {{($errors->has('info')) ? 'is-invalid' : ''}}"
                                                                                        type="text" name="info"
                                                                                        value="{{old('info')}}"
                                                                                        required>
                                                                                    @if($errors->has('info'))
                                                                                        <span
                                                                                            class="invalid-feedback">{{$errors->first('info')}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
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
                                                                    {{--Form End Bank Withdrawal--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--Bank Withdrawal End--}}
                                                        {{--Cash In--}}
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <div class="card-title collapsed" data-toggle="collapse"
                                                                     data-target="#collapseCashIn" aria-expanded="false"
                                                                     aria-controls="collapseCashIn">
                                                                    Cash In
                                                                </div>
                                                            </div>
                                                            <div id="collapseCashIn" class="collapse"
                                                                 aria-labelledby="headingOne"
                                                                 data-parent="#accordionExample1"
                                                                 style="">
                                                                <div class="card-body">
                                                                    {{--      Form Start Cash In   --}}
                                                                    <form action="{{route('dsdd.cashIn.store')}}"
                                                                          method="post">
                                                                        @csrf
                                                                        <div class="kt-section__body">
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    Deposit By
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <input
                                                                                        class="form-control {{($errors->has('deposit_by')) ? 'is-invalid' : ''}}"
                                                                                        type="text" name="deposit_by"
                                                                                        value="{{old('deposit_by')}}"
                                                                                        required>
                                                                                    @if($errors->has('deposit_by'))
                                                                                        <span
                                                                                            class="invalid-feedback">{{$errors->first('deposit_by')}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    Amount
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <input
                                                                                        class="form-control {{($errors->has('amount')) ? 'is-invalid' : ''}}"
                                                                                        type="number" name="amount"
                                                                                        value="{{old('amount')}}"
                                                                                        step="0.01" min="0" required>
                                                                                    @if($errors->has('amount'))
                                                                                        <span
                                                                                            class="invalid-feedback">{{$errors->first('amount')}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    For
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <input
                                                                                        class="form-control {{($errors->has('for')) ? 'is-invalid' : ''}}"
                                                                                        type="text" name="for"
                                                                                        value="{{old('for')}}">
                                                                                    @if($errors->has('for'))
                                                                                        <span
                                                                                            class="invalid-feedback">{{$errors->first('for')}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
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
                                                                    {{--Form End Cash In--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--Cash In End--}}
                                                        {{--Product In--}}
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <div class="card-title collapsed" data-toggle="collapse"
                                                                     data-target="#collapseProductIn"
                                                                     aria-expanded="false"
                                                                     aria-controls="collapseProductIn">
                                                                    Product In
                                                                </div>
                                                            </div>
                                                            <div id="collapseProductIn" class="collapse"
                                                                 aria-labelledby="headingOne"
                                                                 data-parent="#accordionExample1"
                                                                 style="">
                                                                <div class="card-body">
                                                                    {{--      Form Start Product In   --}}
                                                                    <form action="{{route('dsdd.productIn.store')}}"
                                                                          method="post">
                                                                        @csrf
                                                                        <div class="kt-section__body">
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    Products
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <select
                                                                                        class="form-control kt-selectpicker"
                                                                                        name="product" required
                                                                                        id="product"
                                                                                        data-live-search="true"
                                                                                        data-size="7">
                                                                                        <option selected disabled hidden
                                                                                                value="">Choose...
                                                                                        </option>
                                                                                        @foreach($products as $p)
                                                                                            <option value="{{$p->id}}">
                                                                                                {{$p->name}}
                                                                                                - {{$p->identification}}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    Quantity
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <input
                                                                                        class="form-control {{($errors->has('quantity')) ? 'is-invalid' : ''}}"
                                                                                        type="number" name="quantity"
                                                                                        value="{{old('quantity')}}"
                                                                                        required>
                                                                                    @if($errors->has('quantity'))
                                                                                        <span
                                                                                            class="invalid-feedback">{{$errors->first('quantity')}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    Note
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <input
                                                                                        class="form-control {{($errors->has('note')) ? 'is-invalid' : ''}}"
                                                                                        type="text" name="note"
                                                                                        value="{{old('note')}}">
                                                                                </div>
                                                                            </div>
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
                                                                    {{--Form End Product In--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--Product In End--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-6">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="kt-portlet kt-portlet--tabs">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                                        Credit Side(খরচ)
                                    </h3>
                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                <div class="tab-content">
                                    <div id="kt_user_edit_tab_1" class="tab-pane active">
                                        <div class="kt-form kt-form--label-right">
                                            <div class="kt-form__body">
                                                <div class="kt-section kt-section--first">
                                                    <table class="table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Bank Deposit</th>
                                                            <th scope="col">A/C name</th>
                                                            <th scope="col">Info</th>
                                                            <th scope="col">Mode Of Payment</th>
                                                            <th scope="col">Amount</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @forelse($cbds as $i => $cbd)
                                                            <tr>
                                                                <th scope="row">{{$i + 1}}</th>
                                                                <td>{{$cbd->acname}}</td>
                                                                <td>{{$cbd->info}}</td>
                                                                <td>{{$cbd->payment_type}}</td>
                                                                <td>{{$cbd->amount}}</td>
                                                            </tr>
                                                            @php
                                                                $ob = $ob - $cbd->amount
                                                            @endphp
                                                        @empty
                                                            <tr>
                                                                <th scope="row"></th>
                                                                <td>Nothing to show</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="kt-section kt-section--first">
                                                    <table class="table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Cash Payment</th>
                                                            <th scope="col">To</th>
                                                            <th scope="col">For</th>
                                                            <th scope="col">Amount</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @forelse($ccps as $i => $ccp)
                                                            <tr>
                                                                <th scope="row">{{$i + 1}}</th>
                                                                <td>{{$ccp->to}}</td>
                                                                <td>{{$ccp->for}}</td>
                                                                <td>{{$ccp->amount}}</td>
                                                            </tr>
                                                            @php
                                                                $ob = $ob - $ccp->amount
                                                            @endphp
                                                        @empty
                                                            <tr>
                                                                <th scope="row"></th>
                                                                <td>Nothing to show</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="kt-section kt-section--first">
                                                    <table class="table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Purchases for Factory</th>
                                                            <th scope="col">To</th>
                                                            <th scope="col">For</th>
                                                            <th scope="col">Amount</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @forelse($cpfs as $i => $cpf)
                                                            <tr>
                                                                <th scope="row">{{$i + 1}}</th>
                                                                <td>{{$cpf->to}}</td>
                                                                <td>{{$cpf->for}}</td>
                                                                <td>{{$cpf->amount}}</td>
                                                            </tr>
                                                            @php
                                                                $ob = $ob - $cpf->amount
                                                            @endphp
                                                        @empty
                                                            <tr>
                                                                <th scope="row"></th>
                                                                <td>Nothing to show</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="kt-section kt-section--first">
                                                    <table class="table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Local Transport</th>
                                                            <th scope="col">To</th>
                                                            <th scope="col">For</th>
                                                            <th scope="col">Amount</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @forelse($clts as $i => $clt)
                                                            <tr>
                                                                <th scope="row">{{$i + 1}}</th>
                                                                <td>{{$clt->to}}</td>
                                                                <td>{{$clt->for}}</td>
                                                                <td>{{$clt->amount}}</td>
                                                            </tr>
                                                            @php
                                                                $ob = $ob - $clt->amount
                                                            @endphp
                                                        @empty
                                                            <tr>
                                                                <th scope="row"></th>
                                                                <td>Nothing to show</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="kt-section kt-section--first">
                                                    <table class="table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Petty Cash</th>
                                                            <th scope="col">To</th>
                                                            <th scope="col">For</th>
                                                            <th scope="col">Amount</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @forelse($cpcs as $i => $cpc)
                                                            <tr>
                                                                <th scope="row">{{$i + 1}}</th>
                                                                <td>{{$cpc->to}}</td>
                                                                <td>{{$cpc->for}}</td>
                                                                <td>{{$cpc->amount}}</td>
                                                            </tr>
                                                            @php
                                                                $ob = $ob - $cpc->amount
                                                            @endphp
                                                        @empty
                                                            <tr>
                                                                <th scope="row"></th>
                                                                <td>Nothing to show</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="kt-section kt-section--first">
                                                    <table class="table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Produst(s) Sale</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Customer</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">Note</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @forelse($cpss as $i => $cps)
                                                            <tr>
                                                                <th scope="row">{{$i + 1}}</th>
                                                                <td>{{$cps->product_name}}</td>
                                                                <td>{{$cps->customer_name}}</td>
                                                                <td>{{$cps->quantity}}</td>
                                                                <td>{{$cps->note}}</td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <th scope="row"></th>
                                                                <td>Nothing to show</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>


                                                <div class="kt-section kt-section--first float-right">
                                                    <h3>Closing Balance {{$ob}} Tk</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="kt-portlet kt-portlet--tabs">
                            <div class="kt-portlet__body">
                                <div class="tab-content">
                                    <div id="kt_user_edit_tab_1" class="tab-pane active">
                                        <div class="kt-form kt-form--label-right">
                                            <div class="kt-form__body">
                                                <div class="kt-section kt-section--first">
                                                    <div class="kt-section__body accordion" id="accordionExample1">
                                                        {{--Bank Deposit--}}
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <div class="card-title collapsed" data-toggle="collapse"
                                                                     data-target="#collapseBankDeposit"
                                                                     aria-expanded="false"
                                                                     aria-controls="collapseBankDeposit">
                                                                    Bank Deposit
                                                                </div>
                                                            </div>
                                                            <div id="collapseBankDeposit" class="collapse"
                                                                 aria-labelledby="headingOne"
                                                                 data-parent="#accordionExample1"
                                                                 style="">
                                                                <div class="card-body">
                                                                    {{--      Form Start Bank Deposit   --}}
                                                                    <form action="{{route('dsdc.bankDeposit.store')}}"
                                                                          method="post">
                                                                        @csrf
                                                                        <div class="kt-section__body">
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    Bank Account
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <select
                                                                                        class="form-control kt-selectpicker {{($errors->has('bankaccount_id')) ? 'is-invalid' : ''}}"
                                                                                        name="bankaccount_id"
                                                                                        data-live-search="true"
                                                                                        data-size="7" required>
                                                                                        <option selected disabled hidden
                                                                                                value="">Choose...
                                                                                        </option>
                                                                                        @foreach($bas as $pn)
                                                                                            <option value="{{$pn->id}}">
                                                                                                {{$pn->ac_name}}
                                                                                                (N): {{$pn->ac_number}}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @if($errors->has('bankaccount_id'))
                                                                                        <span
                                                                                            class="invalid-feedback">{{$errors->first('bankaccount_id')}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    Mode Of Payment
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <select
                                                                                        class="form-control {{($errors->has('payment_type')) ? 'is-invalid' : ''}}"
                                                                                        name="payment_type" required>
                                                                                        <option selected disabled hidden
                                                                                                value="">Choose...
                                                                                        </option>
                                                                                        <option value="Cash">Cash
                                                                                        </option>
                                                                                        <option value="TT">TT</option>
                                                                                        <option value="Cheque">Cheque
                                                                                        </option>
                                                                                    </select>
                                                                                    @if($errors->has('payment_type'))
                                                                                        <span
                                                                                            class="invalid-feedback">{{$errors->first('payment_type')}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    Amount
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <input
                                                                                        class="form-control {{($errors->has('amount')) ? 'is-invalid' : ''}}"
                                                                                        type="number" name="amount"
                                                                                        value="{{old('amount')}}"
                                                                                        step="0.01" min="0" required>
                                                                                    @if($errors->has('amount'))
                                                                                        <span
                                                                                            class="invalid-feedback">{{$errors->first('amount')}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    Info
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <input
                                                                                        class="form-control {{($errors->has('info')) ? 'is-invalid' : ''}}"
                                                                                        type="text" name="info"
                                                                                        value="{{old('info')}}"
                                                                                        required>
                                                                                    @if($errors->has('info'))
                                                                                        <span
                                                                                            class="invalid-feedback">{{$errors->first('info')}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
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
                                                                    {{--Form End Bank Deposit--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--Bank Deposit End--}}
                                                        {{--Cash Payment--}}
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <div class="card-title collapsed" data-toggle="collapse"
                                                                     data-target="#collapseCashPayment"
                                                                     aria-expanded="false"
                                                                     aria-controls="collapseCashPayment">
                                                                    Cash Payment
                                                                </div>
                                                            </div>
                                                            <div id="collapseCashPayment" class="collapse"
                                                                 aria-labelledby="headingOne"
                                                                 data-parent="#accordionExample1"
                                                                 style="">
                                                                <div class="card-body">
                                                                    {{--      Form Start Cash Payment   --}}
                                                                    <form action="{{route('dsdc.cashPayment.store')}}"
                                                                          method="post">
                                                                        @csrf
                                                                        <div class="kt-section__body">
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    To
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <input
                                                                                        class="form-control {{($errors->has('to')) ? 'is-invalid' : ''}}"
                                                                                        type="text" name="to"
                                                                                        value="{{old('to')}}" required>
                                                                                    @if($errors->has('to'))
                                                                                        <span
                                                                                            class="invalid-feedback">{{$errors->first('to')}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    For
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <input
                                                                                        class="form-control {{($errors->has('for')) ? 'is-invalid' : ''}}"
                                                                                        type="text" name="for"
                                                                                        value="{{old('for')}}" required>
                                                                                    @if($errors->has('for'))
                                                                                        <span
                                                                                            class="invalid-feedback">{{$errors->first('for')}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    Amount
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <input
                                                                                        class="form-control {{($errors->has('amount')) ? 'is-invalid' : ''}}"
                                                                                        type="number" name="amount"
                                                                                        value="{{old('amount')}}"
                                                                                        step="0.01" min="0" required>
                                                                                    @if($errors->has('amount'))
                                                                                        <span
                                                                                            class="invalid-feedback">{{$errors->first('amount')}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
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
                                                                    {{--Form End Cash Payment--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--Cash Payment End--}}
                                                        {{--Purchase For Factory--}}
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <div class="card-title collapsed" data-toggle="collapse"
                                                                     data-target="#collapsePurchaseForFactory"
                                                                     aria-expanded="false"
                                                                     aria-controls="collapsePurchaseForFactory">
                                                                    Purchase For Factory
                                                                </div>
                                                            </div>
                                                            <div id="collapsePurchaseForFactory" class="collapse"
                                                                 aria-labelledby="headingOne"
                                                                 data-parent="#accordionExample1"
                                                                 style="">
                                                                <div class="card-body">
                                                                    {{--      Form Start Purchase For Factory   --}}
                                                                    <form
                                                                        action="{{route('dsdc.purchaseFactory.store')}}"
                                                                        method="post">
                                                                        @csrf
                                                                        <div class="kt-section__body">
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    To
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <input
                                                                                        class="form-control {{($errors->has('to')) ? 'is-invalid' : ''}}"
                                                                                        type="text" name="to"
                                                                                        value="{{old('to')}}" required>
                                                                                    @if($errors->has('to'))
                                                                                        <span
                                                                                            class="invalid-feedback">{{$errors->first('to')}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    For
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <input
                                                                                        class="form-control {{($errors->has('for')) ? 'is-invalid' : ''}}"
                                                                                        type="text" name="for"
                                                                                        value="{{old('for')}}" required>
                                                                                    @if($errors->has('for'))
                                                                                        <span
                                                                                            class="invalid-feedback">{{$errors->first('for')}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    Amount
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <input
                                                                                        class="form-control {{($errors->has('amount')) ? 'is-invalid' : ''}}"
                                                                                        type="number" name="amount"
                                                                                        value="{{old('amount')}}"
                                                                                        step="0.01" min="0" required>
                                                                                    @if($errors->has('amount'))
                                                                                        <span
                                                                                            class="invalid-feedback">{{$errors->first('amount')}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
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
                                                                    {{--Form End Purchase For Factory--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--Purchase For Factory End--}}
                                                        {{--Local Transport--}}
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <div class="card-title collapsed" data-toggle="collapse"
                                                                     data-target="#collapseLocalTransport"
                                                                     aria-expanded="false"
                                                                     aria-controls="collapseLocalTransport">
                                                                    Local Transport
                                                                </div>
                                                            </div>
                                                            <div id="collapseLocalTransport" class="collapse"
                                                                 aria-labelledby="headingOne"
                                                                 data-parent="#accordionExample1"
                                                                 style="">
                                                                <div class="card-body">
                                                                    {{--      Form Start Local Transport   --}}
                                                                    <form
                                                                        action="{{route('dsdc.localTransport.store')}}"
                                                                        method="post">
                                                                        @csrf
                                                                        <div class="kt-section__body">
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    To
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <input
                                                                                        class="form-control {{($errors->has('to')) ? 'is-invalid' : ''}}"
                                                                                        type="text" name="to"
                                                                                        value="{{old('to')}}" required>
                                                                                    @if($errors->has('to'))
                                                                                        <span
                                                                                            class="invalid-feedback">{{$errors->first('to')}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    For
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <input
                                                                                        class="form-control {{($errors->has('for')) ? 'is-invalid' : ''}}"
                                                                                        type="text" name="for"
                                                                                        value="{{old('for')}}" required>
                                                                                    @if($errors->has('for'))
                                                                                        <span
                                                                                            class="invalid-feedback">{{$errors->first('for')}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    Amount
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <input
                                                                                        class="form-control {{($errors->has('amount')) ? 'is-invalid' : ''}}"
                                                                                        type="number" name="amount"
                                                                                        value="{{old('amount')}}"
                                                                                        step="0.01" min="0" required>
                                                                                    @if($errors->has('amount'))
                                                                                        <span
                                                                                            class="invalid-feedback">{{$errors->first('amount')}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
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
                                                                    {{--Form End Local Transport--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--Local Transport End--}}
                                                        {{--Petty Cash--}}
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <div class="card-title collapsed" data-toggle="collapse"
                                                                     data-target="#collapsePettyCash"
                                                                     aria-expanded="false"
                                                                     aria-controls="collapsePettyCash">
                                                                    Petty Cash
                                                                </div>
                                                            </div>
                                                            <div id="collapsePettyCash" class="collapse"
                                                                 aria-labelledby="headingOne"
                                                                 data-parent="#accordionExample1"
                                                                 style="">
                                                                <div class="card-body">
                                                                    {{--      Form Start Petty Cash   --}}
                                                                    <form action="{{route('dsdc.pettyCash.store')}}"
                                                                          method="post">
                                                                        @csrf
                                                                        <div class="kt-section__body">
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    To
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <input
                                                                                        class="form-control {{($errors->has('to')) ? 'is-invalid' : ''}}"
                                                                                        type="text" name="to"
                                                                                        value="{{old('to')}}" required>
                                                                                    @if($errors->has('to'))
                                                                                        <span
                                                                                            class="invalid-feedback">{{$errors->first('to')}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    For
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <input
                                                                                        class="form-control {{($errors->has('for')) ? 'is-invalid' : ''}}"
                                                                                        type="text" name="for"
                                                                                        value="{{old('for')}}" required>
                                                                                    @if($errors->has('for'))
                                                                                        <span
                                                                                            class="invalid-feedback">{{$errors->first('for')}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    Amount
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <input
                                                                                        class="form-control {{($errors->has('amount')) ? 'is-invalid' : ''}}"
                                                                                        type="number" name="amount"
                                                                                        value="{{old('amount')}}"
                                                                                        step="0.01" min="0" required>
                                                                                    @if($errors->has('amount'))
                                                                                        <span
                                                                                            class="invalid-feedback">{{$errors->first('amount')}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
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
                                                                    {{--Form End Petty Cash--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--Petty Cash End--}}
                                                        {{--Product Sale--}}
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <div class="card-title collapsed" data-toggle="collapse"
                                                                     data-target="#collapseProductSale"
                                                                     aria-expanded="false"
                                                                     aria-controls="collapseProductSale">
                                                                    Product Sale
                                                                </div>
                                                            </div>
                                                            <div id="collapseProductSale" class="collapse"
                                                                 aria-labelledby="headingOne"
                                                                 data-parent="#accordionExample1"
                                                                 style="">
                                                                <div class="card-body">
                                                                    {{--      Form Start Product Sale   --}}
                                                                    <form action="{{route('dsdc.productSale.store')}}"
                                                                          method="post">
                                                                        @csrf
                                                                        <div class="kt-section__body">
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    Products
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <select
                                                                                        class="form-control kt-selectpicker"
                                                                                        name="product" required
                                                                                        id="product"
                                                                                        data-live-search="true"
                                                                                        data-size="7">
                                                                                        <option selected disabled hidden
                                                                                                value="">Choose...
                                                                                        </option>
                                                                                        @foreach($products as $p)
                                                                                            <option value="{{$p->id}}">
                                                                                                {{$p->name}}
                                                                                                - {{$p->identification}}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    Customer
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <select
                                                                                        class="form-control kt-selectpicker {{($errors->has('customer_id')) ? 'is-invalid' : ''}}"
                                                                                        name="customer_id"
                                                                                        data-live-search="true"
                                                                                        data-size="7" required>
                                                                                        <option selected disabled hidden
                                                                                                value="">Choose...
                                                                                        </option>
                                                                                        @foreach($customers as $pn)
                                                                                            <option value="{{$pn->id}}">
                                                                                                {{$pn->name}}
                                                                                                (C): {{$pn->company_name}}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    Quantity
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <input
                                                                                        class="form-control {{($errors->has('quantity')) ? 'is-invalid' : ''}}"
                                                                                        type="number" name="quantity"
                                                                                        value="{{old('quantity')}}"
                                                                                        required>
                                                                                    @if($errors->has('quantity'))
                                                                                        <span
                                                                                            class="invalid-feedback">{{$errors->first('quantity')}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                                    Note
                                                                                </label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <input
                                                                                        class="form-control {{($errors->has('note')) ? 'is-invalid' : ''}}"
                                                                                        type="text" name="note"
                                                                                        value="{{old('note')}}">
                                                                                </div>
                                                                            </div>
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
                                                                    {{--Form End Product Sale--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--Product In End--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <!--begin::Page Vendors(used by this page) -->
    <!--end::Page Vendors -->

    <!--begin::Page Scripts(used by this page) -->


    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/bootstrap-select.js')}}" type="text/javascript"></script>


    <!--end::Page Scripts -->

@endsection
