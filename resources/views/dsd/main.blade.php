@include('bnTime')
{{--@php--}}
{{--    $time = time();--}}
{{--    $Bdate = BDdate($time);--}}
{{--@endphp--}}
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
        @elseif(session('unsuccess'))Edit
        <div class="alert alert-warning text-center" id="toaster">
            {{session('unsuccess')}}
        </div>
        @endif
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        {{--                        {{date('jS M Y')}}--}}
                        {{ date('jS M Y, l', strtotime($ds->date))}}
                    </h3>
                </div>
                @if(date('jS M Y') != date('jS M Y', strtotime($ds->date)))
                    <div class="kt-portlet__head-label">
                        <a href="#" class="btn btn-danger"
                           onclick="if (confirm('Are you sure you want to close daily sheet')) {
                                               event.preventDefault(); document.getElementById('closing_form').submit();
                                           }">
                            Close Daily Sheet
                        </a>
                        <form id="closing_form" action="{{ route('dsd.closing') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </div>
                @else
                    <div class="kt-portlet__head-label">
                        <a href="" class="btn btn-danger disabled">
                            Please Close Tomorrow
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="kt-portlet kt-portlet--tabs">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Debit Side (জমা)
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <h3>Opening Balance {{$ob}} Tk</h3>
                        </div>
                        <div class="kt-section kt-section--first">
                            <h4>Add New Item</h4>
                            <button type="button" class="btn btn-primary mr-2 mb-2" data-toggle="modal" data-target="#add-debit-side-customer-modal">Customers</button>
                            <button type="button" class="btn btn-primary mr-2 mb-2" data-toggle="modal" data-target="#add-debit-side-bank-withdrawal-modal">Bank Withdrawal</button>
                            <button type="button" class="btn btn-primary mr-2 mb-2" data-toggle="modal" data-target="#add-debit-side-cash-deposit-modal">Cash Deposit</button>
                            <button type="button" class="btn btn-primary mr-2 mb-2" data-toggle="modal" data-target="#add-debit-side-products-in-modal">Product(s) In</button>
                            <button type="button" class="btn btn-primary mr-2 mb-2" data-toggle="modal" data-target="#add-debit-side-sales-return-modal">Sales Return</button>
                            <button type="button" class="btn btn-primary mr-2 mb-2" data-toggle="modal" data-target="#add-debit-side-adjustment-modal">Adjustment</button>
                        </div>
                        <div class="kt-section kt-section--first">
                            <h4>Customer Payment</h4>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Mode Of Payment</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td scope="col">John Doe</td>
                                    <td scope="col">TT</td>
                                    <td scope="col">1200</td>
                                    <td scope="col">
                                        <a href="" title="Edit" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                            <i class="la la-edit"></i>
                                        </a>
                                        <a href="" title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                            <i class="la la-trash" style="color: #fd397a;"></i>
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            <!-- <tbody>
                                @forelse($dcs as $i => $dc)
                                <tr>
                                    <td>{{$dc->name}}</td>
                                        <td>{{$dc->payment_type}}</td>
                                        <td>{{$dc->amount}} {{$dc->unit}}</td>
                                        <td>
                                            <a href="" title="Edit" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                <i class="la la-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @php
                                    $ob = $ob + $dc->amount
                                @endphp
                            @empty
                                <tr>
                                    <td scope="col">Nothing to show</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
@endforelse
                                </tbody> -->
                            </table>
                        </div>
                        <div class="kt-section kt-section--first">
                            <h4>Bank Withdraw</h4>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">A/C name</th>
                                    <th scope="col">Info</th>
                                    <th scope="col">Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($dbws as $i => $dbw)
                                    <tr>
                                        <td>{{$dbw->acname}}</td>
                                        <td>{{$dbw->info}}</td>
                                        <td>{{$dbw->amount}} {{$dbw->unit}}</td>
                                    </tr>
                                    @php
                                        $ob = $ob + $dbw->amount
                                    @endphp
                                @empty
                                    <tr>
                                        <td scope="col">Nothing to show</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="kt-section kt-section--first">
                            <h4>Cash Deposit</h4>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Deposited By</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">For</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($dcis as $i => $dci)
                                    <tr>
                                        <td>{{$dci->deposit_by}}</td>
                                        <td>{{$dci->amount}} {{$dci->unit}}</td>
                                        <td>{{$dci->for}}</td>
                                    </tr>
                                    @php
                                        $ob = $ob + $dci->amount
                                    @endphp
                                @empty
                                    <tr>
                                        <td scope="col">Nothing to show</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="kt-section kt-section--first">
                            <h4>Produst(s) In</h4>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Note</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($dpis as $i => $dpi)
                                    <tr>
                                        <td>{{$dpi->product_name}}</td>
                                        <td>{{$dpi->quantity}}</td>
                                        <td>{{$dpi->note}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td scope="col">Nothing to show</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="kt-section kt-section--first">
                            <h4>Sales Return</h4>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Rate</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td scope="col">Nothing to show</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="kt-portlet kt-portlet--tabs">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Credit Side(খরচ)
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <h3>Closing Balance {{$ob}} Tk</h3>
                        </div>
                        <div class="kt-section kt-section--first">
                            <h4>Add New Item</h4>
                            <button type="button" class="btn btn-primary mr-2 mb-2" data-toggle="modal" data-target="#add-credit-side-bank-deposit-modal">Bank Deposit</button>
                            <button type="button" class="btn btn-primary mr-2 mb-2" data-toggle="modal" data-target="#add-credit-side-loan-adjustment-modal">Loan Adjustment</button>
                            <button type="button" class="btn btn-primary mr-2 mb-2" data-toggle="modal" data-target="#add-credit-side-cash-payment-modal">Cash Payment</button>
                            <button type="button" class="btn btn-primary mr-2 mb-2" data-toggle="modal" data-target="#add-credit-side-products-sale-modal">Product(s) Sale</button>
                            <button type="button" class="btn btn-primary mr-2 mb-2" data-toggle="modal" data-target="#add-credit-side-purchase-for-factory-modal">Purchase For Factory</button>
                            <button type="button" class="btn btn-primary mr-2 mb-2" data-toggle="modal" data-target="#add-credit-side-other-purchase-modal">Other Purchase</button>
                            <button type="button" class="btn btn-primary mr-2 mb-2" data-toggle="modal" data-target="#add-credit-side-petty-cash-modal">Petty Cash</button>
                            <button type="button" class="btn btn-primary mr-2 mb-2" data-toggle="modal" data-target="#add-credit-side-zakat-modal">Zakat</button>
                            <button type="button" class="btn btn-primary mr-2 mb-2" data-toggle="modal" data-target="#add-credit-side-adjustment-modal">Adjustment</button>
                        </div>
                        <div class="kt-section kt-section--first">
                            <h4>Bank Deposit</h4>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">A/C name</th>
                                    <th scope="col">Info</th>
                                    <th scope="col">Mode Of Payment</th>
                                    <th scope="col">Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($cbds as $i => $cbd)
                                    <tr>
                                        <td>{{$cbd->acname}}</td>
                                        <td>{{$cbd->info}}</td>
                                        <td>{{$cbd->payment_type}}</td>
                                        <td>{{$cbd->amount}} {{$cbd->unit}}</td>
                                    </tr>
                                    @php
                                        $ob = $ob - $cbd->amount
                                    @endphp
                                @empty
                                    <tr>
                                        <td scope="col">Nothing to show</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="kt-section kt-section--first">
                            <h4>Loan Adjustment</h4>
                            <span>TO:DO</span>
                        </div>
                        <div class="kt-section kt-section--first">
                            <h4>Cash Payment</h4>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">To</th>
                                    <th scope="col">For</th>
                                    <th scope="col">Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($ccps as $i => $ccp)
                                    <tr>
                                        <td>{{$ccp->to}}</td>
                                        <td>{{$ccp->for}}</td>
                                        <td>{{$ccp->amount}} {{$ccp->unit}}</td>
                                    </tr>
                                    @php
                                        $ob = $ob - $ccp->amount
                                    @endphp
                                @empty
                                    <tr>
                                        <td scope="col">Nothing to show</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="kt-section kt-section--first">
                            <h4>Produst(s) Sale</h4>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Note</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($cpss as $i => $cps)
                                    <tr>
                                        <td>{{$cps->product_name}}</td>
                                        <td>{{$cps->customer_name}}</td>
                                        <td>{{$cps->quantity}}</td>
                                        <td>{{$cps->note}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td scope="col">Nothing to show</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="kt-section kt-section--first">
                            <h4>Purchases for Factory</h4>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">To</th>
                                    <th scope="col">For</th>
                                    <th scope="col">Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($cpfs as $i => $cpf)
                                    <tr>
                                        <td>{{$cpf->to}}</td>
                                        <td>{{$cpf->for}}</td>
                                        <td>{{$cpf->amount}} {{$cpf->unit}}</td>
                                    </tr>
                                    @php
                                        $ob = $ob - $cpf->amount
                                    @endphp
                                @empty
                                    <tr>
                                        <td scope="col">Nothing to show</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="kt-section kt-section--first">
                            <h4>Other Purchase</h4>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">To</th>
                                    <th scope="col">For</th>
                                    <th scope="col">Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($clts as $i => $clt)
                                    <tr>
                                        <td>{{$clt->to}}</td>
                                        <td>{{$clt->for}}</td>
                                        <td>{{$clt->amount}} {{$clt->unit}}</td>
                                    </tr>
                                    @php
                                        $ob = $ob - $clt->amount
                                    @endphp
                                @empty
                                    <tr>
                                        <td scope="col">Nothing to show</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="kt-section kt-section--first">
                            <h4>Petty Cash</h4>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">To</th>
                                    <th scope="col">For</th>
                                    <th scope="col">Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($cpcs as $i => $cpc)
                                    <tr>
                                        <td>{{$cpc->to}}</td>
                                        <td>{{$cpc->for}}</td>
                                        <td>{{$cpc->amount}} {{$cpc->unit}}</td>
                                    </tr>
                                    @php
                                        $ob = $ob - $cpc->amount
                                    @endphp
                                @empty
                                    <tr>
                                        <td scope="col">Nothing to show</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="kt-section kt-section--first">
                            <h4>Zakat</h4>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">To</th>
                                    <th scope="col">For</th>
                                    <th scope="col">Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($cpcs as $i => $cpc)
                                    <tr>
                                        <td>{{$cpc->to}}</td>
                                        <td>{{$cpc->for}}</td>
                                        <td>{{$cpc->amount}} {{$cpc->unit}}</td>
                                    </tr>
                                    @php
                                        $ob = $ob - $cpc->amount
                                    @endphp
                                @empty
                                    <tr>
                                        <td scope="col">Nothing to show</td>
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

    {{--Debit Side: Add Customers Modal Start--}}
    <div class="modal fade" id="add-debit-side-customer-modal" tabindex="-1" role="dialog" aria-labelledby="add-debit-side-customer-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <form class="modal-content" action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-debit-side-customer-modal-label">Add Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
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
                            Sub Customer
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <select
                                class="form-control kt-selectpicker {{($errors->has('customer_id')) ? 'is-invalid' : ''}}"
                                name="customer_id"
                                data-live-search="true"
                                data-size="7">
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
                                class="form-control kt-selectpicker {{($errors->has('payment_type')) ? 'is-invalid' : ''}}"
                                name="payment_type" required>
                                <option selected disabled hidden value="">Choose...</option>
                                <option value="Cash">Cash</option>
                                <option value="TT">TT</option>
                                <option value="Cheque">Cheque</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            Name of Third Party
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <select class="form-control kt-selectpicker" name=" third_party">
                                <option selected disabled value="">Choose...</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            Bank Account
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <select class="form-control kt-selectpicker" name="third_party_bank_account">
                                <option selected disabled value="">Choose...</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            Name of the Bank
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <input
                                class="form-control"
                                type="text" name="third_party_bank_name"
                                value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            Amount
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group">
                                <input
                                    class="form-control {{($errors->has('amount')) ? 'is-invalid' : ''}}"
                                    type="number" name="amount"
                                    value="{{old('amount')}}"
                                    step="0.01" min="0" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">BDT</span>
                                </div>
                            </div>
                            @if($errors->has('amount'))
                                <span
                                    class="invalid-feedback">{{$errors->first('amount')}}</span>
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
                                class="form-control {{($errors->has('amount')) ? 'is-invalid' : ''}}"
                                type="text" name="amount"
                                value="{{old('amount')}}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-label-brand btn-bold">Save</button>
                </div>
            </form>
        </div>
    </div>
    {{--Debit Side: Add Customers Modal End--}}

    {{--Debit Side: Add Bank Withdrawal Modal Start--}}
    <div class="modal fade" id="add-debit-side-bank-withdrawal-modal" tabindex="-1" role="dialog" aria-labelledby="add-debit-side-bank-withdrawal-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <form class="modal-content" action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-debit-side-bank-withdrawal-modal-label">Add Bank Withdrawal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Bank Account
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <select id="bank_account"
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
                            Name of the Bank
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <input class="form-control"
                                   type="text" name="bank_name"
                                   id="bank_name" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Amount
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group">
                                <input
                                    class="form-control {{($errors->has('amount')) ? 'is-invalid' : ''}}"
                                    type="number" name="amount"
                                    value="{{old('amount')}}"
                                    step="0.01" min="0" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">BDT</span>
                                </div>
                            </div>
                            @if($errors->has('amount'))
                                <span
                                    class="invalid-feedback">{{$errors->first('amount')}}</span>
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
                                class="form-control {{($errors->has('info')) ? 'is-invalid' : ''}}"
                                type="text" name="info"
                                value="{{old('info')}}">
                            @if($errors->has('info'))
                                <span
                                    class="invalid-feedback">{{$errors->first('info')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Attachment</label>
                        <div class="col-lg-9 col-xl-6">
                            <div></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile2"
                                       name="binFile">
                                <label class="custom-file-label" style="text-align: left;"
                                       for="customFile2">Attachment</label>
                            </div>
                            <span class="form-text text-muted">Max file size is 10MB and max number of files is 1.</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-label-brand btn-bold">Save</button>
                </div>
            </form>
        </div>
    </div>
    {{--Debit Side: Add Bank Withdrawal Modal End--}}

    {{--Debit Side: Add Cash Deposit Modal Start--}}
    <div class="modal fade" id="add-debit-side-cash-deposit-modal" tabindex="-1" role="dialog" aria-labelledby="add-debit-side-cash-deposit-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <form class="modal-content" action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-debit-side-cash-deposit-modal-label">Add Cash Deposit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Deposited By
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
                            <div class="input-group">
                                <input
                                    class="form-control {{($errors->has('amount')) ? 'is-invalid' : ''}}"
                                    type="number" name="amount"
                                    value="{{old('amount')}}"
                                    step="0.01" min="0" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">BDT</span>
                                </div>
                            </div>
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
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Note
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
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Attachment</label>
                        <div class="col-lg-9 col-xl-6">
                            <div></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile2"
                                       name="binFile">
                                <label class="custom-file-label" style="text-align: left;"
                                       for="customFile2">Attachment</label>
                            </div>
                            <span class="form-text text-muted">Max file size is 10MB and max number of files is 1.</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-label-brand btn-bold">Save</button>
                </div>
            </form>
        </div>
    </div>
    {{--Debit Side: Add Cash Deposit Modal End--}}

    {{--Debit Side: Add Product(s) In Modal Start--}}
    <div class="modal fade" id="add-debit-side-products-in-modal" tabindex="-1" role="dialog" aria-labelledby="add-debit-side-products-in-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <form class="modal-content" action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-debit-side-products-in-modal-label">Add Product(s) In</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Product Name
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <select id="productD"
                                    class="form-control kt-selectpicker"
                                    name="product" required
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
                            <div class="input-group">
                                <input
                                    class="form-control {{($errors->has('quantity')) ? 'is-invalid' : ''}}"
                                    type="number"
                                    name="quantity"
                                    value="{{old('quantity')}}"
                                    required step="0.01"
                                    min="0">
                                @if($errors->has('quantity'))
                                    <span
                                        class="invalid-feedback">{{$errors->first('quantity')}}</span>
                                @endif
                                <div class="input-group-append"><span
                                        class="input-group-text"
                                        id="unitD">.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Voucher Number
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <input
                                class="form-control {{($errors->has('note')) ? 'is-invalid' : ''}}"
                                type="text" name="note"
                                value="{{old('note')}}">
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
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Attachment</label>
                        <div class="col-lg-9 col-xl-6">
                            <div></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile2"
                                       name="binFile">
                                <label class="custom-file-label" style="text-align: left;"
                                       for="customFile2">Attachment</label>
                            </div>
                            <span class="form-text text-muted">Max file size is 10MB and max number of files is 1.</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-label-brand btn-bold">Save</button>
                </div>
            </form>
        </div>
    </div>
    {{--Debit Side: Add Product(s) In Modal End--}}

    {{--Debit Side: Add Sales Return Modal Start--}}
    <div class="modal fade" id="add-debit-side-sales-return-modal" tabindex="-1" role="dialog" aria-labelledby="add-debit-side-sales-return-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <form class="modal-content" action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-debit-side-sales-return-modal-label">Add Sales Return</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Return From (Customer)
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
                            Return From (Sub Customer)
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <select
                                class="form-control kt-selectpicker {{($errors->has('customer_id')) ? 'is-invalid' : ''}}"
                                name="customer_id"
                                data-live-search="true"
                                data-size="7">
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
                            Products
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <select id="productD"
                                    class="form-control kt-selectpicker"
                                    name="product" required
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
                            Rate
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group">
                                <input
                                    class="form-control {{($errors->has('rate')) ? 'is-invalid' : ''}}"
                                    type="number" name="rate"
                                    value="{{old('rate')}}"
                                    step="0.01" min="0">
                                <div class="input-group-append">
                                    <span class="input-group-text">BDT</span>
                                </div>
                            </div>
                            @if($errors->has('rate'))
                                <span
                                    class="invalid-feedback">{{$errors->first('rate')}}</span>
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
                                class="form-control {{($errors->has('amount')) ? 'is-invalid' : ''}}"
                                type="text" name="amount"
                                value="{{old('amount')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Attachment</label>
                        <div class="col-lg-9 col-xl-6">
                            <div></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile2"
                                       name="binFile">
                                <label class="custom-file-label" style="text-align: left;"
                                       for="customFile2">Attachment</label>
                            </div>
                            <span class="form-text text-muted">Max file size is 10MB and max number of files is 1.</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-label-brand btn-bold">Save</button>
                </div>
            </form>
        </div>
    </div>
    {{--Debit Side: Add Sales Return Modal End--}}

    {{--Debit Side: Add Adjustment Modal Start--}}
    <div class="modal fade" id="add-debit-side-adjustment-modal" tabindex="-1" role="dialog" aria-labelledby="add-debit-side-adjustment-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <form class="modal-content" action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-debit-side-adjustment-modal-label">Add Debit Adjustment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Customer Name
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
                            Balance (display only)
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group">
                                <input
                                    class="form-control"
                                    type="text" name="balance"
                                    value="{{old('balance')}}" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">BDT</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Faulty data Date
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group date">
                                <input
                                    class="form-control {{$errors->has('dateOfPurchase') ? 'is-invalid' : ''}}"
                                    type="text"
                                    name="dateOfPurchase"
                                    required readonly
                                    placeholder="Select date"
                                    id="kt_datepicker_3"
                                    value="{{old('dateOfPurchase')}}">
                                <div class="input-group-append">
                                    <span
                                        class="input-group-text">
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
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Adjustment
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group">
                                <input
                                    class="form-control {{($errors->has('adjustment')) ? 'is-invalid' : ''}}"
                                    type="number" name="adjustment"
                                    value="{{old('adjustment')}}"
                                    step="0.01" min="0" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">BDT</span>
                                </div>
                            </div>
                            @if($errors->has('adjustment'))
                                <span
                                    class="invalid-feedback">{{$errors->first('adjustment')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Note (required)
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <input
                                class="form-control {{($errors->has('note')) ? 'is-invalid' : ''}}"
                                type="text" name="note"
                                value="{{old('note')}}" required>
                            @if($errors->has('note'))
                                <span
                                    class="invalid-feedback">{{$errors->first('note')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-label-brand btn-bold">Save</button>
                </div>
            </form>
        </div>
    </div>
    {{--Debit Side: Add Adjustment Modal End--}}




    {{--Credit Side: Add Bank Deposit Modal Start--}}
    <div class="modal fade" id="add-credit-side-bank-deposit-modal" tabindex="-1" role="dialog" aria-labelledby="add-credit-side-bank-deposit-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <form class="modal-content" action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-credit-side-bank-deposit-modal-label">Add Bank Deposit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Bank Account
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <select id="bank_accountC"
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
                            Name of the Bank
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <input class="form-control"
                                   type="text" name="bank_nameC"
                                   id="bank_nameC" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Mode Of Payment
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <select
                                class="form-control kt-selectpicker {{($errors->has('payment_type')) ? 'is-invalid' : ''}}"
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
                            <div class="input-group">
                                <input
                                    class="form-control {{($errors->has('amount')) ? 'is-invalid' : ''}}"
                                    type="number" name="amount"
                                    value="{{old('amount')}}"
                                    step="0.01" min="0" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">BDT</span>
                                </div>
                            </div>
                            @if($errors->has('amount'))
                                <span
                                    class="invalid-feedback">{{$errors->first('amount')}}</span>
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
                                class="form-control {{($errors->has('info')) ? 'is-invalid' : ''}}"
                                type="text" name="info"
                                value="{{old('info')}}">
                            @if($errors->has('info'))
                                <span
                                    class="invalid-feedback">{{$errors->first('info')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Attachment</label>
                        <div class="col-lg-9 col-xl-6">
                            <div></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile2"
                                       name="binFile">
                                <label class="custom-file-label" style="text-align: left;"
                                       for="customFile2">Attachment</label>
                            </div>
                            <span class="form-text text-muted">Max file size is 10MB and max number of files is 1.</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-label-brand btn-bold">Save</button>
                </div>
            </form>
        </div>
    </div>
    {{--Credit Side: Add Bank Deposit Modal End--}}

    {{--Credit Side: Add Loan Adjustment Modal Start--}}
    <div class="modal fade" id="add-credit-side-loan-adjustment-modal" tabindex="-1" role="dialog" aria-labelledby="add-credit-side-loan-adjustment-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <form class="modal-content" action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-credit-side-loan-adjustment-modal-label">Add Loan Adjustment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Loan Adjustment Type
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <select
                                class="form-control kt-selectpicker {{($errors->has('unit')) ? 'is-invalid' : ''}}"
                                name="unit" required>
                                <option value="MPI">MPI</option>
                                <option value="MPI-TR">MPI-TR</option>
                                <option value="MPI-TR">HPSM</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Type Number
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <input
                                class="form-control {{($errors->has('info')) ? 'is-invalid' : ''}}"
                                type="text" name="info"
                                value="{{old('info')}}">
                            @if($errors->has('info'))
                                <span
                                    class="invalid-feedback">{{$errors->first('info')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Amount
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group">
                                <input
                                    class="form-control {{($errors->has('amount')) ? 'is-invalid' : ''}}"
                                    type="number" name="amount"
                                    value="{{old('amount')}}"
                                    step="0.01" min="0" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">BDT</span>
                                </div>
                            </div>
                            @if($errors->has('amount'))
                                <span
                                    class="invalid-feedback">{{$errors->first('amount')}}</span>
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
                                class="form-control kt-selectpicker {{($errors->has('payment_type')) ? 'is-invalid' : ''}}"
                                name="payment_type" required>
                                <option selected disabled hidden
                                        value="">Choose...
                                </option>
                                <option value="Cash">Cash
                                </option>
                                <option value="TransferFrom">Transfer From</option>
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
                            Bank Account
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <select id="bank_accountCL"
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
                            Name of the Bank
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <input class="form-control"
                                   type="text" name="bank_nameC"
                                   id="bank_nameCL" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Note
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <input
                                class="form-control {{($errors->has('info')) ? 'is-invalid' : ''}}"
                                type="text" name="info"
                                value="{{old('info')}}">
                            @if($errors->has('info'))
                                <span
                                    class="invalid-feedback">{{$errors->first('info')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Attachment</label>
                        <div class="col-lg-9 col-xl-6">
                            <div></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile2"
                                       name="binFile">
                                <label class="custom-file-label" style="text-align: left;"
                                       for="customFile2">Attachment</label>
                            </div>
                            <span class="form-text text-muted">Max file size is 10MB and max number of files is 1.</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-label-brand btn-bold">Save</button>
                </div>
            </form>
        </div>
    </div>
    {{--Credit Side: Add Loan Adjustment Modal End--}}

    {{--Credit Side: Add Cash Payment Modal Start--}}
    <div class="modal fade" id="add-credit-side-cash-payment-modal" tabindex="-1" role="dialog" aria-labelledby="add-credit-side-cash-payment-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <form class="modal-content" action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-credit-side-cash-payment-modal-label">Add Cash Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Payment to
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <select
                                class="form-control kt-selectpicker {{($errors->has('payment-to')) ? 'is-invalid' : ''}}"
                                name="payment-to" required>
                                <option value="customer">Customer</option>
                                <option value="customer">Md Sir (Mohammad Anwar Hossain)</option>
                                <option value="customer">Director (Abdullah Al Mahmood)</option>
                                <option value="customer">Director (Abdullah Al Mahfuz)</option>
                                <option value="customer">Others</option>
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
                            Name
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
                            <div class="input-group">
                                <input
                                    class="form-control {{($errors->has('amount')) ? 'is-invalid' : ''}}"
                                    type="number" name="amount"
                                    value="{{old('amount')}}"
                                    step="0.01" min="0" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">BDT</span>
                                </div>
                            </div>
                            @if($errors->has('amount'))
                                <span
                                    class="invalid-feedback">{{$errors->first('amount')}}</span>
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
                                class="form-control {{($errors->has('info')) ? 'is-invalid' : ''}}"
                                type="text" name="info"
                                value="{{old('info')}}">
                            @if($errors->has('info'))
                                <span
                                    class="invalid-feedback">{{$errors->first('info')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Attachment</label>
                        <div class="col-lg-9 col-xl-6">
                            <div></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile2"
                                       name="binFile">
                                <label class="custom-file-label" style="text-align: left;"
                                       for="customFile2">Attachment</label>
                            </div>
                            <span class="form-text text-muted">Max file size is 10MB and max number of files is 1.</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-label-brand btn-bold">Save</button>
                </div>
            </form>
        </div>
    </div>
    {{--Credit Side: Add Cash Payment Modal End--}}

    {{--Credit Side: Add Product(s) Sale Modal Start--}}
    <div class="modal fade" id="add-credit-side-products-sale-modal" tabindex="-1" role="dialog" aria-labelledby="add-credit-side-products-sale-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <form class="modal-content" action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-credit-side-products-sale-modal-label">Add Product(s) Sale</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Products
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <select id="productC"
                                    class="form-control kt-selectpicker"
                                    name="product" required
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
                            <div class="input-group">
                                <input
                                    class="form-control {{($errors->has('quantity')) ? 'is-invalid' : ''}}"
                                    type="number"
                                    name="quantity"
                                    value="{{old('quantity')}}"
                                    required step="0.01"
                                    min="0">
                                @if($errors->has('quantity'))
                                    <span
                                        class="invalid-feedback">{{$errors->first('quantity')}}</span>
                                @endif
                                <div class="input-group-append"><span
                                        class="input-group-text"
                                        id="unitC">.</span>
                                </div>
                            </div>
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
                            Sub Customer
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <select
                                class="form-control kt-selectpicker {{($errors->has('customer_id')) ? 'is-invalid' : ''}}"
                                name="customer_id"
                                data-live-search="true"
                                data-size="7">
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
                            Voucher Number
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <input
                                class="form-control {{($errors->has('note')) ? 'is-invalid' : ''}}"
                                type="text" name="note"
                                value="{{old('note')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Transport Cost by us
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group">
                                <input
                                    class="form-control {{($errors->has('amount')) ? 'is-invalid' : ''}}"
                                    type="number" name="amount"
                                    value="{{old('amount')}}"
                                    step="0.01" min="0" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">BDT</span>
                                </div>
                            </div>
                            @if($errors->has('amount'))
                                <span
                                    class="invalid-feedback">{{$errors->first('amount')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Transport Cost Paid by us on behalf of the Customer
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group">
                                <input
                                    class="form-control {{($errors->has('amount')) ? 'is-invalid' : ''}}"
                                    type="number" name="amount"
                                    value="{{old('amount')}}"
                                    step="0.01" min="0" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">BDT</span>
                                </div>
                            </div>
                            @if($errors->has('amount'))
                                <span
                                    class="invalid-feedback">{{$errors->first('amount')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Transport Cost Paid by the Customer on behalf of us
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group">
                                <input
                                    class="form-control {{($errors->has('amount')) ? 'is-invalid' : ''}}"
                                    type="number" name="amount"
                                    value="{{old('amount')}}"
                                    step="0.01" min="0" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">BDT</span>
                                </div>
                            </div>
                            @if($errors->has('amount'))
                                <span
                                    class="invalid-feedback">{{$errors->first('amount')}}</span>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-label-brand btn-bold">Save</button>
                </div>
            </form>
        </div>
    </div>
    {{--Credit Side: Add Product(s) Sale Modal End--}}

    {{--Credit Side: Add Purchase For Factory Modal Start--}}
    <div class="modal fade" id="add-credit-side-purchase-for-factory-modal" tabindex="-1" role="dialog" aria-labelledby="add-credit-side-purchase-for-factory-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <form class="modal-content" action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-credit-side-purchase-for-factory-modal-label">Add Purchase For Factory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Name of the Spare Parts
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <select
                                class="form-control kt-selectpicker {{($errors->has('sparepart')) ? 'is-invalid' : ''}}"
                                name="sparepart" id="spCf"
                                data-live-search="true"
                                data-size="7" required>
                                <option selected disabled hidden
                                        value="">Choose...
                                </option>
                                @foreach($sps as $pn)
                                    <option value="{{$pn->id}}">
                                        {{$pn->description}}
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
                            <div class="input-group">
                                <input
                                    class="form-control {{($errors->has('quantity')) ? 'is-invalid' : ''}}"
                                    type="number"
                                    name="quantity"
                                    value="{{old('quantity')}}"
                                    required step="0.01"
                                    min="0">
                                @if($errors->has('quantity'))
                                    <span
                                        class="invalid-feedback">{{$errors->first('quantity')}}</span>
                                @endif
                                <div class="input-group-append"><span
                                        class="input-group-text"
                                        id="unitCSp">.</span>
                                </div>
                            </div>
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
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Amount
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group">
                                <input
                                    class="form-control {{($errors->has('amount')) ? 'is-invalid' : ''}}"
                                    type="number" name="amount"
                                    value="{{old('amount')}}"
                                    step="0.01" min="0" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">BDT</span>
                                </div>
                            </div>
                            @if($errors->has('amount'))
                                <span
                                    class="invalid-feedback">{{$errors->first('amount')}}</span>
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
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Attachment</label>
                        <div class="col-lg-9 col-xl-6">
                            <div></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile2"
                                       name="binFile">
                                <label class="custom-file-label" style="text-align: left;"
                                       for="customFile2">Attachment</label>
                            </div>
                            <span class="form-text text-muted">Max file size is 10MB and max number of files is 1.</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-label-brand btn-bold">Save</button>
                </div>
            </form>
        </div>
    </div>
    {{--Credit Side: Add Purchase For Factory Modal End--}}

    {{--Credit Side: Add Other Purchase Modal Start--}}
    <div class="modal fade" id="add-credit-side-other-purchase-modal" tabindex="-1" role="dialog" aria-labelledby="add-credit-side-other-purchase-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <form class="modal-content" action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-credit-side-other-purchase-modal-label">Add Other Purchase</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Purchased For
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <select
                                class="form-control kt-selectpicker {{($errors->has('sparepart')) ? 'is-invalid' : ''}}"
                                name="sparepart"
                                data-live-search="true"
                                data-size="7" required>
                                <option value="Factory">Factory(Except spare parts)</option>
                                <option value="Other">Other</option>
                            </select>
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
                            Name(s) of Purchased Item
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <input
                                class="form-control {{($errors->has('for')) ? 'is-invalid' : ''}}"
                                type="text" name="for"
                                value="{{old('for')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Quantity
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <input
                                class="form-control {{($errors->has('amount')) ? 'is-invalid' : ''}}"
                                type="number" name="amount"
                                value="{{old('amount')}}"
                                step="0.01" min="0">
                            @if($errors->has('amount'))
                                <span
                                    class="invalid-feedback">{{$errors->first('amount')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Quantity(Unit)
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <input
                                class="form-control {{($errors->has('for')) ? 'is-invalid' : ''}}"
                                type="text" name="for"
                                value="{{old('for')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Amount
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group">
                                <input
                                    class="form-control {{($errors->has('amount')) ? 'is-invalid' : ''}}"
                                    type="number" name="amount"
                                    value="{{old('amount')}}"
                                    step="0.01" min="0" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">BDT</span>
                                </div>
                            </div>
                            @if($errors->has('amount'))
                                <span
                                    class="invalid-feedback">{{$errors->first('amount')}}</span>
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
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Attachment</label>
                        <div class="col-lg-9 col-xl-6">
                            <div></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile2"
                                       name="binFile">
                                <label class="custom-file-label" style="text-align: left;"
                                       for="customFile2">Attachment</label>
                            </div>
                            <span class="form-text text-muted">Max file size is 10MB and max number of files is 1.</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-label-brand btn-bold">Save</button>
                </div>
            </form>
        </div>
    </div>
    {{--Credit Side: Add Other Purchase Modal End--}}

    {{--Credit Side: Add Petty Cash Modal Start--}}
    <div class="modal fade" id="add-credit-side-petty-cash-modal" tabindex="-1" role="dialog" aria-labelledby="add-credit-side-petty-cash-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <form class="modal-content" action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-credit-side-petty-cash-modal-label">Add Petty Cash</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
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
                            <select
                                class="form-control kt-selectpicker {{($errors->has('unit')) ? 'is-invalid' : ''}}"
                                name="unit" required>
                                <option value="LocalTransport">Local Transport</option>
                                <option value="CoolieExpenses">Coolie Expenses</option>
                                <option value="Stationary">Stationaries</option>
                                <option value="DrinkingWater">Drinking Water</option>
                                <option value="CoffeeTea">Coffee/Tea</option>
                                <option value="Sugar">Sugar</option>
                                <option value="BakshibazarOffice">Bakshibazar Office</option>
                                <option value="BakshibazarHouse">Bakshibazar House</option>
                                <option value="Uttara">Uttara</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            For(Other)
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <input
                                class="form-control {{($errors->has('for')) ? 'is-invalid' : ''}}"
                                type="text" name="for"
                                value="{{old('for')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Amount
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group">
                                <input
                                    class="form-control {{($errors->has('amount')) ? 'is-invalid' : ''}}"
                                    type="number" name="amount"
                                    value="{{old('amount')}}"
                                    step="0.01" min="0" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">BDT</span>
                                </div>
                            </div>
                            @if($errors->has('amount'))
                                <span
                                    class="invalid-feedback">{{$errors->first('amount')}}</span>
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
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Attachment</label>
                        <div class="col-lg-9 col-xl-6">
                            <div></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile2"
                                       name="binFile">
                                <label class="custom-file-label" style="text-align: left;"
                                       for="customFile2">Attachment</label>
                            </div>
                            <span class="form-text text-muted">Max file size is 10MB and max number of files is 1.</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-label-brand btn-bold">Save</button>
                </div>
            </form>
        </div>
    </div>
    {{--Credit Side: Add Petty Cash Modal End--}}

    {{--Credit Side: Add Zakat Modal Start--}}
    <div class="modal fade" id="add-credit-side-zakat-modal" tabindex="-1" role="dialog" aria-labelledby="add-credit-side-zakat-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <form class="modal-content" action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-credit-side-zakat-modal-label">Add Zakat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            To
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <input
                                class="form-control {{($errors->has('info')) ? 'is-invalid' : ''}}"
                                type="text" name="info"
                                value="{{old('info')}}">
                            @if($errors->has('info'))
                                <span
                                    class="invalid-feedback">{{$errors->first('info')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Amount
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group">
                                <input
                                    class="form-control {{($errors->has('amount')) ? 'is-invalid' : ''}}"
                                    type="number" name="amount"
                                    value="{{old('amount')}}"
                                    step="0.01" min="0" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">BDT</span>
                                </div>
                            </div>
                            @if($errors->has('amount'))
                                <span
                                    class="invalid-feedback">{{$errors->first('amount')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Payment Type
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <input
                                class="form-control {{($errors->has('info')) ? 'is-invalid' : ''}}"
                                type="text" name="info"
                                value="{{old('info')}}">
                            @if($errors->has('info'))
                                <span
                                    class="invalid-feedback">{{$errors->first('info')}}</span>
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
                                class="form-control {{($errors->has('info')) ? 'is-invalid' : ''}}"
                                type="text" name="info"
                                value="{{old('info')}}">
                            @if($errors->has('info'))
                                <span
                                    class="invalid-feedback">{{$errors->first('info')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Attachment</label>
                        <div class="col-lg-9 col-xl-6">
                            <div></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile2"
                                       name="binFile">
                                <label class="custom-file-label" style="text-align: left;"
                                       for="customFile2">Attachment</label>
                            </div>
                            <span class="form-text text-muted">Max file size is 10MB and max number of files is 1.</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-label-brand btn-bold">Save</button>
                </div>
            </form>
        </div>
    </div>
    {{--Credit Side: Add Zakat Modal End--}}

    {{--Credit Side: Add Adjustment Modal Start--}}
    <div class="modal fade" id="add-credit-side-adjustment-modal" tabindex="-1" role="dialog" aria-labelledby="add-credit-side-adjustment-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <form class="modal-content" action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-credit-side-adjustment-modal-label">Add Credit Adjustment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Customer Name
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
                            Balance (display only)
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group">
                                <input
                                    class="form-control"
                                    type="text" name="balance"
                                    value="{{old('balance')}}" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">BDT</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Faulty data Date
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group date">
                                <input
                                    class="form-control {{$errors->has('dateOfPurchase') ? 'is-invalid' : ''}}"
                                    type="text"
                                    name="dateOfPurchase"
                                    required readonly
                                    placeholder="Select date"
                                    id="kt_datepicker_3"
                                    value="{{old('dateOfPurchase')}}">
                                <div class="input-group-append">
                                    <span
                                        class="input-group-text">
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
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Adjustment
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group">
                                <input
                                    class="form-control {{($errors->has('adjustment')) ? 'is-invalid' : ''}}"
                                    type="number" name="adjustment"
                                    value="{{old('adjustment')}}"
                                    step="0.01" min="0" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">BDT</span>
                                </div>
                            </div>
                            @if($errors->has('adjustment'))
                                <span
                                    class="invalid-feedback">{{$errors->first('adjustment')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">
                            Note (required)
                        </label>
                        <div class="col-lg-9 col-xl-6">
                            <input
                                class="form-control {{($errors->has('note')) ? 'is-invalid' : ''}}"
                                type="text" name="note"
                                value="{{old('note')}}" required>
                            @if($errors->has('note'))
                                <span
                                    class="invalid-feedback">{{$errors->first('note')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-label-brand btn-bold">Save</button>
                </div>
            </form>
        </div>
    </div>
    {{--Credit Side: Add Adjustment Modal End--}}


    {{--Credit Side CURRENTLY DISABLED: Add Local Transport Modal Start--}}
    <div class="modal fade" id="add-credit-side-local-transport-modal" tabindex="-1" role="dialog" aria-labelledby="add-credit-side-local-transport-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <form class="modal-content" action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-credit-side-local-transport-modal-label">Add Credit Local Transport</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
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
                            <div class="input-group">
                                <input
                                    class="form-control {{($errors->has('amount')) ? 'is-invalid' : ''}}"
                                    type="number" name="amount"
                                    value="{{old('amount')}}"
                                    step="0.01" min="0" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">BDT</span>
                                </div>
                            </div>
                            @if($errors->has('amount'))
                                <span
                                    class="invalid-feedback">{{$errors->first('amount')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-label-brand btn-bold">Save</button>
                </div>
            </form>
        </div>
    </div>
    {{--Credit Side: Add Local Transport Modal End--}}

@endsection
{{--@section('stickyToolbar')    --}}
{{--@endsection--}}
@section('script')
    <!--begin::Page Vendors(used by this page) -->
    <!--end::Page Vendors -->

    <!--begin::Page Scripts(used by this page) -->
    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/bootstrap-select.js')}}" type="text/javascript"></script>
    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/bootstrap-select.js')}}" type="text/javascript"></script>
    <script>

        const jbas = {!! $bas->toJson() !!};
        const products = {!! $products->toJson() !!};
        const sps = {!! $sps->toJson() !!};

        $(function () {

            $("#bank_account").on('change', function () {
                $("#bank_name").val(jbas.find(element => element.id == $(this).val())['name']);
            })
            $("#bank_accountC").on('change', function () {
                $("#bank_nameC").val(jbas.find(element => element.id == $(this).val())['name']);
            })
            $("#bank_accountCL").on('change', function () {
                $("#bank_nameCL").val(jbas.find(element => element.id == $(this).val())['name']);
            })

            $("#productD").on('change', function () {
                $("#unitD").html(products.find(element => element.id == $(this).val())['unit']);
            });

            $("#productC").on('change', function () {
                $("#unitC").html(products.find(element => element.id == $(this).val())['unit']);
            });

            $("#spCf").on('change', function () {
                $("#unitCSp").html(sps.find(element => element.id == $(this).val())['unit']);
            });

        });
    </script>

    <!--
        Open a modal with JS
        $('#myModal').modal()
    -->


    <!--end::Page Scripts -->

@endsection
