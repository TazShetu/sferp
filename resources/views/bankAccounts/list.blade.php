@extends('layouts.m')
@section('title', 'Bank Accounts')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    <a href="{{route('bankAccount.list')}}" style="text-decoration: none;">Bank Accounts</a>
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            </div>
            <div class="kt-subheader__toolbar">
                <a href="{{route('bankAccount.create')}}" class="btn btn-label-brand btn-bold">Add Bank Accounts</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        @if(session('Success'))
            <div class="alert alert-success text-center" id="toaster">
                {{session('Success')}}
            </div>
        {{--        @elseif(session('Cannotdelete'))--}}
        {{--            <div class="alert alert-warning text-center" id="toaster">--}}
        {{--                {{session('Cannotdelete')}}--}}
        {{--            </div>--}}
    @endif
    <!--begin::Portlet-->
        <div class="kt-portlet ">
            <div class="kt-portlet__body">
                <!--begin::Accordion-->
                <div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample6">
                    <div class="card">
                        <div class="card-header" id="headingTwo6">
                            <div class="card-title {{$query ? '' : 'collapsed'}}" data-toggle="collapse" data-target="#collapseTwo6"
                                 aria-expanded="{{$query ? 'true' : 'false'}}" aria-controls="collapseTwo6">
                                <i class="flaticon2-search-1"></i> Search
                            </div>
                        </div>
                        <div id="collapseTwo6" class="collapse {{$query ? 'show' : ''}}" aria-labelledby="headingTwo6"
                             data-parent="#accordionExample6">
                            <div class="card-body">
                                {{--                                    <form action="{{route('spareParts.search')}}" class="form-inline" method="get">--}}
                                <form action="" class="form-inline" method="get">
                                    @csrf
                                    <div class="form-group mx-sm-3 mb-2">
                                        <input type="text" name="name" class="form-control"
                                               placeholder="Bank Name" value="{{$query ? ($query['name'] ? $query['name'] : '') : ''}}">
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2">
                                        <input type="text" name="ac_name" class="form-control"
                                               placeholder="A/C Name" value="{{$query ? ($query['ac_name'] ? $query['ac_name'] : '') : ''}}">
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2">
                                        <input type="text" name="ac_number" class="form-control"
                                               placeholder="A/C Number" value="{{$query ? ($query['ac_number'] ? $query['ac_number'] : '') : ''}}">
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Confirm Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Accordion-->
            </div>
        </div>
        <!--end::Portlet-->
        <!--begin::Portlet-->
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        All Bank Accounts
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                {{--Bootstrap Table--}}
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Bank Name</th>
                        <th scope="col">A/C Name</th>
                        <th scope="col">A/C Number</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bankAccount as $i => $m)
                        <tr class="clickable" data-toggle="collapse" data-target=".row{{$i}}">
                            <th scope="row">{{$bankAccount->firstItem() + $i}}</th>
                            <td>{{$m->name}}</td>
                            <td>{{$m->ac_name}}</td>
                            <td>{{$m->ac_number}}</td>
                            <td>
                                <a href="{{route('bankAccount.edit', ['baid' => $m->id])}}" title="Edit"
                                   class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                    <i class="la la-edit"></i>
                                </a>
                                <form action="{{route('bankAccount.delete', ['baid' => $m->id])}}" method="POST"
                                      style="display: inline-table;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                            onclick="return confirm('Are you sure you want to delete the Bank Account ?')">
                                        <i class="la la-trash" style="color: #fd397a;"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


                {{--Pagination--}}
                <div class="kt-section">
                    <div class="kt-pagination  kt-pagination--brand">
                        {{$bankAccount->links()}}
                        <div class="kt-datatable__pager-info">
                            <span class="kt-datatable__pager-detail">Showing {{$bankAccount->firstItem()}} - {{$bankAccount->lastItem()}} of {{$bankAccount->total()}}</span>
                        </div>
                    </div>
                </div>
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
