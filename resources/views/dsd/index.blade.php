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
                    Daily Sheet Dhaka Debit Customer
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{route('home')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('dsdd.customer')}}" class="kt-subheader__breadcrumbs-link">Daily Sheet Dhaka Debit
                        Customer</a>
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
                                    </div>
                                </div>
                            </div>
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
