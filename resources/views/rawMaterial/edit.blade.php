@extends('layouts.m')
@section('title', 'Raw Material Edit')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Raw Material Edit
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{route('home')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('rawMaterial.list')}}" class="kt-subheader__breadcrumbs-link">Raw Materials</a>
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
                                    {{--      Form Start    --}}
                                    <form action="{{route('rawMaterial.update', ['rmid' => $rmedit->id])}}"
                                          method="post">
                                        @csrf
                                        <div class="kt-section__body">

                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Type*
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('type')) ? 'is-invalid' : ''}}"
                                                           type="text" name="type" required
                                                           value="{{$rmedit->type}}">
                                                    @if($errors->has('type'))
                                                        <span class="invalid-feedback">{{$errors->first('type')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Manufacturer Name*
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('manufacturerName')) ? 'is-invalid' : ''}}"
                                                           type="text" name="manufacturerName" required
                                                           value="{{$rmedit->manufacturer}}" list="manufacturer">
                                                    @if($errors->has('manufacturerName'))
                                                        <span class="invalid-feedback">{{$errors->first('manufacturerName')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Country Of Origin*
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('countryOfOrigin')) ? 'is-invalid' : ''}}"
                                                           type="text" name="countryOfOrigin" required
                                                           value="{{$rmedit->country_origin}}" list="countryOfOrigin">
                                                    @if($errors->has('countryOfOrigin'))
                                                        <span class="invalid-feedback">{{$errors->first('countryOfOrigin')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Grade Number*
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('gradeNumber')) ? 'is-invalid' : ''}}"
                                                           type="text" name="gradeNumber" required
                                                           value="{{$rmedit->grade_number}}" list="currency">
                                                    @if($errors->has('gradeNumber'))
                                                        <span class="invalid-feedback">{{$errors->first('gradeNumber')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Melting Flow Index
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('mfi')) ? 'is-invalid' : ''}}"
                                                           type="number" name="mfi" step="0.01" min="0"
                                                           value="{{$rmedit->melting_flow_index}}">
                                                    {{--                                                    @if($errors->has('mfi'))--}}
                                                    {{--                                                        <span class="invalid-feedback">{{$errors->first('mfi')}}</span>--}}
                                                    {{--                                                    @endif--}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Melting Point
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('meltingPoint')) ? 'is-invalid' : ''}}"
                                                           type="text" name="meltingPoint"
                                                           value="{{$rmedit->melting_point}}">
                                                    {{--                                                    @if($errors->has('meltingPoint'))--}}
                                                    {{--                                                        <span class="invalid-feedback">{{$errors->first('meltingPoint')}}</span>--}}
                                                    {{--                                                    @endif--}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Viscosity Value
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('viscosity')) ? 'is-invalid' : ''}}"
                                                           type="number" name="mfi" value="{{$rmedit->viscosity}}"
                                                           step="0.01" min="0">
                                                    {{--                                                    @if($errors->has('viscosity'))--}}
                                                    {{--                                                        <span class="invalid-feedback">{{$errors->first('viscosity')}}</span>--}}
                                                    {{--                                                    @endif--}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Relative Density
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('relativeDensity')) ? 'is-invalid' : ''}}"
                                                           type="text" name="relativeDensity"
                                                           value="{{$rmedit->relative_density}}">
                                                    {{--                                                    @if($errors->has('relativeDensity'))--}}
                                                    {{--                                                        <span class="invalid-feedback">{{$errors->first('relativeDensity')}}</span>--}}
                                                    {{--                                                    @endif--}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Density
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('density')) ? 'is-invalid' : ''}}"
                                                           type="text" name="density"
                                                           value="{{$rmedit->density}}">
                                                    {{--                                                    @if($errors->has('density'))--}}
                                                    {{--                                                        <span class="invalid-feedback">{{$errors->first('density')}}</span>--}}
                                                    {{--                                                    @endif--}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Minimum Storage Amount*
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('minimumStorage')) ? 'is-invalid' : ''}}"
                                                           type="number" name="minimumStorage" required min="0"
                                                           value="{{$rmedit->minimum_storage}}">
                                                    @if($errors->has('minimumStorage'))
                                                        <span class="invalid-feedback">{{$errors->first('minimumStorage')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Unit*
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('unit')) ? 'is-invalid' : ''}}"
                                                           type="text" name="unit" required
                                                           value="{{$rmedit->unit}}" list="unit">
                                                    @if($errors->has('unit'))
                                                        <span class="invalid-feedback">{{$errors->first('unit')}}</span>
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
    <datalist id="manufacturer">
        @forelse($datalist['manufacturer'] as $m)
            <option value="{{$m->manufacturer}}">
        @empty
        @endforelse
    </datalist>
    <datalist id="unit">
        @forelse($datalist['unit'] as $c)
            <option value="{{$c->unit}}">
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
    {{--    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"--}}
    {{--            type="text/javascript"></script>--}}
    {{--    <script>--}}
    {{--        $(".datepickerYear").datepicker({--}}
    {{--            format: "yyyy",--}}
    {{--            viewMode: "years",--}}
    {{--            minViewMode: "years"--}}
    {{--        });--}}
    {{--    </script>--}}


    {{--    <script src="{{asset('m/assets/js/pages/crud/file-upload/uppy.js')}}" type="text/javascript"></script>--}}

    {{--    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/form-repeater.js')}}" type="text/javascript"></script>--}}
    {{--    <script src="{{asset('plugins/select2/select2.full.min.js')}}" type="text/javascript"></script>--}}

    <!--end::Page Scripts -->
@endsection
