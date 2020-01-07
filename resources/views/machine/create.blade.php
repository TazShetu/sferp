@extends('layouts.m')
@section('title', 'Machine Create')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Machine Create
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{route('home')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('machine.list')}}" class="kt-subheader__breadcrumbs-link">Machine</a>
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
                                    <form action="{{route('machine.store', ['mcid' => $machineCategories[0]->id])}}"
                                          method="post">
                                        @csrf
                                        <div class="kt-section__body">
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Select Category
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select class="form-control {{($errors->has('category')) ? 'is-invalid' : ''}}"
                                                            name="category" required>
                                                        <option selected disabled hidden value="">Choose...</option>
                                                        @foreach($machineCategories as $mc)
                                                            <option value="{{$mc->id}}">{{$mc->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('category'))
                                                        <span class="invalid-feedback">{{$errors->first('category')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Select Factory
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select class="form-control {{($errors->has('factory')) ? 'is-invalid' : ''}}"
                                                            name="factory" required>
                                                        <option selected disabled hidden value="">Choose...</option>
                                                        @foreach($factories as $f)
                                                            <option value="{{$f->id}}">{{$f->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('factory'))
                                                        <span class="invalid-feedback">{{$errors->first('factory')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Manufacturer Name
                                                    {{--    Auto Fill  use datalist       --}}
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('manufacturerName')) ? 'is-invalid' : ''}}"
                                                           type="text" name="manufacturerName" required
                                                           value="{{old('manufacturerName')}}">
                                                    @if($errors->has('manufacturerName'))
                                                        <span class="invalid-feedback">{{$errors->first('manufacturerName')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Type / Model Number
                                                    {{--    Auto Fill  use datalist       --}}
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('typeOrModelNumber')) ? 'is-invalid' : ''}}"
                                                           type="text" name="typeOrModelNumber" required
                                                           value="{{old('typeOrModelNumber')}}">
                                                    @if($errors->has('typeOrModelNumber'))
                                                        <span class="invalid-feedback">{{$errors->first('typeOrModelNumber')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Serial Number
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('serialNumber')) ? 'is-invalid' : ''}}"
                                                           type="text" name="serialNumber" required
                                                           value="{{old('serialNumber')}}">
                                                    @if($errors->has('serialNumber'))
                                                        <span class="invalid-feedback">{{$errors->first('serialNumber')}}</span>
                                                    @endif
                                                    <span class="form-text text-muted">It has to be unique*</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label"> Manufacturer
                                                    Year</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control datepickerYear {{($errors->has('manufacturerYear')) ? 'is-invalid' : ''}}"
                                                           type="text" name="manufacturerYear" required
                                                           {{--                                                           id="datepickerYear"--}}
                                                           value="{{old('manufacturerYear')}}">
                                                    @if($errors->has('manufacturerYear'))
                                                        <span class="invalid-feedback">{{$errors->first('manufacturerYear')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Country Of Origin
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('countryOfOrigin')) ? 'is-invalid' : ''}}"
                                                           type="text" name="countryOfOrigin" required
                                                           value="{{old('countryOfOrigin')}}">
                                                    @if($errors->has('countryOfOrigin'))
                                                        <span class="invalid-feedback">{{$errors->first('countryOfOrigin')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    S/K or D/K
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select class="form-control {{($errors->has('skOrDk')) ? 'is-invalid' : ''}}"
                                                            name="skOrDk">
                                                        <option selected disabled hidden value="">Choose...</option>
                                                        <option value="S/K">S/K</option>
                                                        <option value="D/K">D/K</option>
                                                    </select>
                                                    {{--                                                    @if($errors->has('skOrDk'))--}}
                                                    {{--                                                        <span class="invalid-feedback">{{$errors->first('skOrDk')}}</span>--}}
                                                    {{--                                                    @endif--}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Pitch Size
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('pitchSize')) ? 'is-invalid' : ''}}"
                                                           type="number" name="pitchSize" value="{{old('pitchSize')}}">
                                                    {{--                                                    @if($errors->has('pitchSize'))--}}
                                                    {{--                                                        <span class="invalid-feedback">{{$errors->first('pitchSize')}}</span>--}}
                                                    {{--                                                    @endif--}}
                                                    <span class="form-text text-muted">Write the number in mm</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Spool Diameter
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('spoolDiameter')) ? 'is-invalid' : ''}}"
                                                           type="number" name="spoolDiameter"
                                                           value="{{old('spoolDiameter')}}">
                                                    {{--                                                    @if($errors->has('spoolDiameter'))--}}
                                                    {{--                                                        <span class="invalid-feedback">{{$errors->first('spoolDiameter')}}</span>--}}
                                                    {{--                                                    @endif--}}
                                                    <span class="form-text text-muted">Write the number in mm</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Number Of Shuttles
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('numberOfShuttles')) ? 'is-invalid' : ''}}"
                                                           type="number" name="numberOfShuttles"
                                                           value="{{old('numberOfShuttles')}}">
{{--                                                    @if($errors->has('numberOfShuttles'))--}}
{{--                                                        <span class="invalid-feedback">{{$errors->first('numberOfShuttles')}}</span>--}}
{{--                                                    @endif--}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Rope Size</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="input-daterange input-group">
                                                        <input type="number"
                                                               class="form-control {{($errors->has('ropeSizeStart')) ? 'is-invalid' : ''}}"
                                                               name="ropeSizeStart" value="{{old('ropeSizeStart')}}">
                                                        @if($errors->has('ropeSizeStart'))
                                                            <span class="invalid-feedback">{{$errors->first('ropeSizeStart')}}</span>
                                                        @endif
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">to</span>
                                                        </div>
                                                        <input type="number"
                                                               class="form-control {{($errors->has('ropeSizeEnd')) ? 'is-invalid' : ''}}"
                                                               name="ropeSizeEnd" value="{{old('ropeSizeEnd')}}">
                                                        @if($errors->has('ropeSizeEnd'))
                                                            <span class="invalid-feedback">{{$errors->first('ropeSizeEnd')}}</span>
                                                        @endif
                                                    </div>
                                                    <span class="form-text text-muted">Write the number in mm</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Screw Size
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control  {{($errors->has('screwSize')) ? 'is-invalid' : ''}}"
                                                           type="number" name="screwSize" value="{{old('screwSize')}}">
                                                    @if($errors->has('screwSize'))
                                                        <span class="invalid-feedback">{{$errors->first('screwSize')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Production Capacity
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control  {{($errors->has('productionCapacity')) ? 'is-invalid' : ''}}"
                                                           type="number" name="productionCapacity"
                                                           value="{{old('productionCapacity')}}">
                                                    @if($errors->has('productionCapacity'))
                                                        <span class="invalid-feedback">{{$errors->first('productionCapacity')}}</span>
                                                    @endif
                                                    <span class="form-text text-muted">Write the number in hgs/hr</span>
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
                                                           class="cancel btn btn-label-danger btn-bold float-right">Cancel</a>
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

@endsection
{{--@section('stickyToolbar')    --}}
{{--@endsection--}}
@section('script')
    <!--begin::Page Vendors(used by this page) -->
    <!--end::Page Vendors -->

    <!--begin::Page Scripts(used by this page) -->
    <script src="{{asset('m/assets/js/pages/custom/user/edit-user.js')}}" type="text/javascript"></script>
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