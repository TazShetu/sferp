@include('bnTime')
@php
    $time = time();
    $Bdate = BDdate($time);
@endphp
@extends('layouts.m')
@section('title', 'Daily Sheet Dhaka Debit Bank Withdraw')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Daily Sheet Dhaka Debit Bank Withdraw
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{route('home')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('dsdd.bankWithdraw')}}" class="kt-subheader__breadcrumbs-link">Daily Sheet Dhaka Debit Bank Withdraw</a>
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
            <div class="kt-portlet__body">
                <div class="tab-content">
                    <div id="kt_user_edit_tab_1" class="tab-pane active">
                        <div class="kt-form kt-form--label-right">
                            <div class="kt-form__body">
                                <div class="kt-section kt-section--first">
                                    <form action="{{route('dsdd.bankWithdraw.store')}}" method="post">
                                        @csrf
                                        <div class="kt-section__body">
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Bank Account
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select
                                                        class="form-control kt-selectpicker {{($errors->has('bankaccount_id')) ? 'is-invalid' : ''}}"
                                                        name="bankaccount_id" data-live-search="true" data-size="7" required>
                                                        <option selected disabled hidden value="">Choose...</option>
                                                        @foreach($bas as $pn)
                                                            <option value="{{$pn->id}}">
                                                                {{$pn->ac_name}} (N): {{$pn->ac_number}}
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
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Amount
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{($errors->has('amount')) ? 'is-invalid' : ''}}"
                                                        type="number" name="amount" value="{{old('amount')}}"
                                                        step="0.01" min="0" required>
                                                    @if($errors->has('amount'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('amount')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Info
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{($errors->has('info')) ? 'is-invalid' : ''}}"
                                                        type="text" name="info" value="{{old('info')}}" required>
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
