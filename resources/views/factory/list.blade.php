@extends('layouts.m')
@section('title', 'Factory List')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Factories
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total">
                        {{count($factories)}} Total
                    </span>
                </div>
            </div>
            <div class="kt-subheader__toolbar">
                <a href="{{route('factory.create')}}" class="btn btn-label-brand btn-bold">Add Factory </a>
            </div>
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
                        All Factories
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <!--begin: Datatable -->
                {{--Bootstrap Table--}}
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Established Date</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($factories as $i => $factory)
                        <tr>
                            <th scope="row">{{$i + 1}}</th>
                            <td>
                                <div class="kt-user-card-v2">
                                    <div class="kt-user-card-v2__pic">
                                        <img alt="photo"
                                             @if($factory->image != null)
                                             src="{{asset($factory->image)}}"
                                             @else
                                             src="{{asset('/factory.jpg')}}"
                                                @endif
                                        >
                                    </div>
                                    <div class="kt-user-card-v2__details">
                                            {{$factory->name}}
                                    </div>
                                </div>
                            </td>
                            <td>{{$factory->address}}</td>
                            <td>{{$factory->established_date}}</td>
                            <td>
                                <a href="{{route('factory.edit', ['fid' => $factory->id])}}" title="Edit"
                                   class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                    <i class="la la-edit"></i>
                                </a>
                                <a href="{{route('factory.delete', ['fid' => $factory->id])}}" title="Delete"
                                   class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                   onclick="return confirm('Are you sure you want to delete the factory ?')">
                                    <i class="la la-trash" style="color: #fd397a;"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!--end: Datatable -->
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