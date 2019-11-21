@extends('layouts.m')
@section('title', 'Customer List')
@section('style')
    <style>
        /*.kt-user-card-v2 .kt-user-card-v2__details {*/
        /*    line-height: 0;*/
        /*}*/
    </style>
@endsection
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Customers
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
										<span class="kt-subheader__desc" id="kt_subheader_total">
											{{$customers->total()}} Total
                                        </span>
                    <form class="kt-margin-l-20" id="kt_subheader_search_form">
                        <div class="kt-input-icon kt-input-icon--right kt-subheader__search">
                            <input type="text" class="form-control" placeholder="Search..." id="generalSearch">
                            <span class="kt-input-icon__icon kt-input-icon__icon--right">
													<span>
														<svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1"
                                                             class="kt-svg-icon">
															<g stroke="none" stroke-width="1" fill="none"
                                                               fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24"/>
																<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                                      fill="#000000" fill-rule="nonzero" opacity="0.3"/>
																<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                                      fill="#000000" fill-rule="nonzero"/>
															</g>
														</svg>

                                                        <!--<i class="flaticon2-search-1"></i>-->
													</span>
												</span>
                        </div>
                    </form>
                </div>
                <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">
                    <div class="kt-subheader__desc"><span id="kt_subheader_group_selected_rows"></span> Selected:</div>
                    <div class="btn-toolbar kt-margin-l-20">
                        <div class="dropdown" id="kt_subheader_group_actions_status_change">
                            <button type="button" class="btn btn-label-brand btn-bold btn-sm dropdown-toggle"
                                    data-toggle="dropdown">
                                Update Status
                            </button>
                            <div class="dropdown-menu">
                                <ul class="kt-nav">
                                    <li class="kt-nav__section kt-nav__section--first">
                                        <span class="kt-nav__section-text">Change status to:</span>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link" data-toggle="status-change" data-status="1">
                                            <span class="kt-nav__link-text"><span
                                                        class="kt-badge kt-badge--unified-success kt-badge--inline kt-badge--bold">Approved</span></span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link" data-toggle="status-change" data-status="2">
                                            <span class="kt-nav__link-text"><span
                                                        class="kt-badge kt-badge--unified-danger kt-badge--inline kt-badge--bold">Rejected</span></span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link" data-toggle="status-change" data-status="3">
                                            <span class="kt-nav__link-text"><span
                                                        class="kt-badge kt-badge--unified-warning kt-badge--inline kt-badge--bold">Pending</span></span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link" data-toggle="status-change" data-status="4">
                                            <span class="kt-nav__link-text"><span
                                                        class="kt-badge kt-badge--unified-info kt-badge--inline kt-badge--bold">On Hold</span></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <button class="btn btn-label-success btn-bold btn-sm btn-icon-h"
                                id="kt_subheader_group_actions_fetch" data-toggle="modal"
                                data-target="#kt_datatable_records_fetch_modal">
                            Fetch Selected
                        </button>
                        <button class="btn btn-label-danger btn-bold btn-sm btn-icon-h"
                                id="kt_subheader_group_actions_delete_all">
                            Delete All
                        </button>
                    </div>
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
        {{--        @elseif(session('Cannotdelete'))--}}
        {{--            <div class="alert alert-warning text-center">--}}
        {{--                {{session('Cannotdelete')}}--}}
        {{--            </div>--}}
    @endif

    <!--begin::Portlet-->
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        All Customers
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <!--begin: Datatable -->
                <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded"
                     id="kt_apps_user_list_datatable" style="">
                    <table class="kt-datatable__table" style="display: block;">
                        <thead class="kt-datatable__head">
                        <tr class="kt-datatable__row" style="left: 0px;">
                            <th data-field="RecordID"
                                class="kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--check"><span
                                        style="width: 20px;"><label
                                            class="kt-checkbox kt-checkbox--single kt-checkbox--all kt-checkbox--solid"><input
                                                type="checkbox">&nbsp;<span></span></label></span></th>
                            <th data-field="AgentName" class="kt-datatable__cell kt-datatable__cell--sort"><span
                                        style="width: 200px;">User</span></th>
                            <th data-field="Country" class="kt-datatable__cell kt-datatable__cell--sort"><span
                                        style="width: 214px;">Company</span></th>
                            <th data-field="ShipDate" class="kt-datatable__cell kt-datatable__cell--sort"><span
                                        style="width: 214px;">Business Area</span></th>
                            <th data-field="ShipName" data-autohide-disabled="false"
                                class="kt-datatable__cell kt-datatable__cell--sort"><span
                                        style="width: 152px;">Business Telephone</span></th>
                            <th data-field="Status" class="kt-datatable__cell kt-datatable__cell--sort"><span
                                        style="width: 200px;">Business Email</span></th>
                            <th data-field="Type" data-autohide-disabled="false"
                                class="kt-datatable__cell kt-datatable__cell--sort"><span
                                        style="width: 110px;">Action</span></th>
                        </tr>
                        </thead>
                        <tbody style="" class="kt-datatable__body">
                        @foreach($customers as $i => $customer)

                            <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                <td class="kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--check"
                                    data-field="RecordID"><span style="width: 20px;"><label
                                                class="kt-checkbox kt-checkbox--single kt-checkbox--solid"><input
                                                    type="checkbox" value="1">&nbsp;<span></span></label></span></td>
                                <td data-field="AgentName" class="kt-datatable__cell">
                                <span style="width: 200px;">
                                    <div class="kt-user-card-v2">
                                        <div class="kt-user-card-v2__pic">
                                            <img alt="photo" src="{{asset('m/assets/media/users/100_6.jpg')}}">
{{--                                            <div class="kt-badge kt-badge--xl kt-badge--danger">N</div>--}}
                                        </div>
                                        <div class="kt-user-card-v2__details">
                                            <a class="kt-user-card-v2__name" href="#">{{$customer->name}} </a>
                                            <span class="kt-user-card-v2__desc">{{$customer->type}} </span>
                                        </div>
                                    </div>
                                </span>
                                </td>
                                <td data-field="Country" class="kt-datatable__cell"><span
                                            style="width: 214px;">
                                    {{$customer->company_name}}
                                    </span></td>
                                <td data-field="ShipDate" class="kt-datatable__cell"><span
                                            style="width: 214px;">
                                        {{$customer->business_area}}
                                    </span></td>
                                <td data-field="ShipName" data-autohide-disabled="false" class="kt-datatable__cell">
                                <span style="width: 152px;">
                                    {{$customer->business_telephone}}
                                </span>
                                </td>
                                <td data-field="Status" class="kt-datatable__cell">
                                <span style="width: 200px;">
                                      {{$customer->business_email}}
                                </span>
                                </td>
                                <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell">
                                <span style="width: 110px;">
                                         @permission('customer_edit')
                                    <a href="#" title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                        [[<i class="la la-edit"></i>]]
                                    </a>
                                    @endpermission
                                    @permission('customer_delete')
                                    <a title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                        [[<i class="la la-trash"></i>]]
                                    </a>
                                    @endpermission
                                </span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="kt-datatable__pager kt-datatable--paging-loaded">
                        {{$customers->links()}}
                        <div class="kt-datatable__pager-info">
                            <span class="kt-datatable__pager-detail">Showing {{$customers->firstItem()}} - {{$customers->lastItem()}} of {{$customers->total()}}</span>
                        </div>
                    </div>
                </div>

                <!--end: Datatable -->

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                    </tbody>
                </table>


                </div>
            </div>


            <!--end::Portlet-->

            <!--begin::Modal-->

            <!--end::Modal-->
        </div>

    @endsection
    {{--@section('stickyToolbar')    --}}
    {{--@endsection--}}
    @section('script')
        <!--begin::Page Vendors(used by this page) -->

            <!--end::Page Vendors -->

            <!--begin::Page Scripts(used by this page) -->

            <!--end::Page Scripts -->
@endsection