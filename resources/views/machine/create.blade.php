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
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-toolbar">
                    <ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand"
                        role="tablist">
                        <li class="nav-item">
                            <a class="nav-link {{ (session()->has('mcid')) ? (((session('mcid') * 1) == 1) ? "active" : "") : "active" }}"
                               data-toggle="tab"
                               href="#kt_user_edit_tab_1"
                               role="tab">
                                <i class="flaticon-cogwheel"></i>
                                Fishing Net Machine
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ ((session('mcid') * 1) == 2) ? "active" : "" }}" data-toggle="tab"
                               href="#kt_user_edit_tab_2" role="tab">
                                <i class="flaticon-cogwheel"></i>
                                Rope Making Machine
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ ((session('mcid') * 1) == 3) ? "active" : "" }}" data-toggle="tab"
                               href="#kt_user_edit_tab_3" role="tab">
                                <i class="flaticon-cogwheel"></i>
                                Twisting Machine
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  {{ ((session('mcid') * 1) == 4) ? "active" : "" }}" data-toggle="tab"
                               href="#kt_user_edit_tab_4" role="tab">
                                <i class="flaticon-cogwheel"></i>
                                Extruder Machine
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="tab-content">
                    <div id="kt_user_edit_tab_1"
                         class="tab-pane {{ (session()->has('mcid')) ? (((session('mcid') * 1) == 1) ? "active" : "") : "active" }}">
                        <div class="kt-form kt-form--label-right">
                            <div class="kt-form__body">
                                <div class="kt-section kt-section--first">
                                    {{--      Form Start    --}}
                                    <form action="{{route('machine.store', ['mcid' => $machineCategories[0]->id])}}" method="post">
                                        @csrf
                                        <div class="kt-section__body">
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Manufacturer Name
                                                    {{--    Auto Fill  use datalist       --}}
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('manufacturerName') && ((session('mcid') * 1) == 1)) ? 'is-invalid' : ''}}"
                                                           type="text" name="manufacturerName" required
                                                           value="{{((session('mcid') * 1) == 1) ? (old('manufacturerName')) : "" }}">
                                                    @if($errors->has('manufacturerName') && ((session('mcid') * 1) == 1))
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
                                                    <input class="form-control {{($errors->has('typeOrModelNumber') && ((session('mcid') * 1) == 1)) ? 'is-invalid' : ''}}"
                                                           type="text" name="typeOrModelNumber" required
                                                           value="{{((session('mcid') * 1) == 1) ? (old('typeOrModelNumber')) : "" }}">
                                                    @if($errors->has('typeOrModelNumber') && ((session('mcid') * 1) == 1))
                                                        <span class="invalid-feedback">{{$errors->first('typeOrModelNumber')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Serial Number
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('serialNumber') && ((session('mcid') * 1) == 1)) ? 'is-invalid' : ''}}"
                                                           type="text" name="serialNumber" required
                                                           value="{{((session('mcid') * 1) == 1) ? (old('serialNumber')) : "" }}">
                                                    @if($errors->has('serialNumber') && ((session('mcid') * 1) == 1))
                                                        <span class="invalid-feedback">{{$errors->first('serialNumber')}}</span>
                                                    @endif
                                                    <span class="form-text text-muted">It has to be unique*</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label"> Manufacturer
                                                    Year</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control datepickerYear {{($errors->has('manufacturerYear') && ((session('mcid') * 1) == 1)) ? 'is-invalid' : ''}}"
                                                           type="text" name="manufacturerYear" required
                                                           {{--                                                           id="datepickerYear"--}}
                                                           value="{{((session('mcid') * 1) == 1) ? (old('manufacturerYear')) : "" }}">
                                                    @if($errors->has('manufacturerYear') && ((session('mcid') * 1) == 1))
                                                        <span class="invalid-feedback">{{$errors->first('manufacturerYear')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Country Of Origin
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('countryOfOrigin') && ((session('mcid') * 1) == 1)) ? 'is-invalid' : ''}}"
                                                           type="text" name="countryOfOrigin" required
                                                           value="{{((session('mcid') * 1) == 1) ? (old('countryOfOrigin')) : "" }}">
                                                    @if($errors->has('countryOfOrigin') && ((session('mcid') * 1) == 1))
                                                        <span class="invalid-feedback">{{$errors->first('countryOfOrigin')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    S/K or D/K
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select class="form-control {{($errors->has('skOrDk') && ((session('mcid') * 1) == 1)) ? 'is-invalid' : ''}}"
                                                            name="skOrDk" required>
                                                        <option selected disabled hidden value="">Choose...</option>
                                                        <option value="S/K">S/K</option>
                                                        <option value="D/K">D/K</option>
                                                    </select>
                                                    @if($errors->has('skOrDk') && ((session('mcid') * 1) == 1))
                                                        <span class="invalid-feedback">{{$errors->first('skOrDk')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Pitch Size
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('pitchSize') && ((session('mcid') * 1) == 1)) ? 'is-invalid' : ''}}"
                                                           type="number" name="pitchSize" required
                                                           value="{{((session('mcid') * 1) == 1) ? (old('pitchSize')) : "" }}">
                                                    @if($errors->has('pitchSize') && ((session('mcid') * 1) == 1))
                                                        <span class="invalid-feedback">{{$errors->first('pitchSize')}}</span>
                                                    @endif
                                                    <span class="form-text text-muted">Write the number in mm</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Spool Diameter
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('spoolDiameter') && ((session('mcid') * 1) == 1)) ? 'is-invalid' : ''}}"
                                                           type="number" name="spoolDiameter" required
                                                           value="{{((session('mcid') * 1) == 1) ? (old('spoolDiameter')) : "" }}">
                                                    @if($errors->has('spoolDiameter') && ((session('mcid') * 1) == 1))
                                                        <span class="invalid-feedback">{{$errors->first('spoolDiameter')}}</span>
                                                    @endif
                                                    <span class="form-text text-muted">Write the number in mm</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Number Of Shuttles
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('numberOfShuttles') && ((session('mcid') * 1) == 1)) ? 'is-invalid' : ''}}"
                                                           type="number" name="numberOfShuttles" required
                                                           value="{{((session('mcid') * 1) == 1) ? (old('numberOfShuttles')) : "" }}">
                                                    @if($errors->has('numberOfShuttles') && ((session('mcid') * 1) == 1))
                                                        <span class="invalid-feedback">{{$errors->first('numberOfShuttles')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Select Factory
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select class="form-control {{($errors->has('factory') && ((session('mcid') * 1) == 1)) ? 'is-invalid' : ''}}"
                                                            name="factory" required>
                                                        <option selected disabled hidden value="">Choose...</option>
                                                        @foreach($factories as $f)
                                                            <option value="{{$f->id}}">{{$f->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('factory') && ((session('mcid') * 1) == 1))
                                                        <span class="invalid-feedback">{{$errors->first('factory')}}</span>
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
                    <div id="kt_user_edit_tab_2" class="tab-pane {{ ((session('mcid') * 1) == 2) ? "active" : "" }}">
                        <div class="kt-form kt-form--label-right">
                            <form action="{{route('machine.store', ['mcid' => $machineCategories[1]->id])}}"
                                  method="post">
                                @csrf
                                <div class="kt-section__body">
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                            Manufacturer Name
                                            {{--    Auto Fill  use datalist       --}}
                                        </label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control {{($errors->has('manufacturerName') && ((session('mcid') * 1) == 2)) ? 'is-invalid' : ''}}"
                                                   type="text" name="manufacturerName" required
                                                   value="{{((session('mcid') * 1) == 2) ? (old('manufacturerName')) : "" }}">
                                            @if($errors->has('manufacturerName') && ((session('mcid') * 1) == 2))
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
                                            <input class="form-control {{($errors->has('typeOrModelNumber') && ((session('mcid') * 1) == 2)) ? 'is-invalid' : ''}}"
                                                   type="text" name="typeOrModelNumber" required
                                                   value="{{((session('mcid') * 1) == 2) ? (old('typeOrModelNumber')) : "" }}">
                                            @if($errors->has('typeOrModelNumber') && ((session('mcid') * 1) == 2))
                                                <span class="invalid-feedback">{{$errors->first('typeOrModelNumber')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                            Serial Number
                                        </label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control {{($errors->has('serialNumber') && ((session('mcid') * 1) == 2)) ? 'is-invalid' : ''}}"
                                                   type="text" name="serialNumber" required
                                                   value="{{((session('mcid') * 1) == 2) ? (old('serialNumber')) : "" }}">
                                            @if($errors->has('serialNumber') && ((session('mcid') * 1) == 2))
                                                <span class="invalid-feedback">{{$errors->first('serialNumber')}}</span>
                                            @endif
                                            <span class="form-text text-muted">It has to be unique*</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label"> Manufacturer Year</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control datepickerYear {{($errors->has('manufacturerYear') && ((session('mcid') * 1) == 2)) ? 'is-invalid' : ''}}"
                                                   type="text" name="manufacturerYear" required id="datepickerYear"
                                                   value="{{((session('mcid') * 1) == 2) ? (old('manufacturerYear')) : "" }}">
                                            @if($errors->has('manufacturerYear') && ((session('mcid') * 1) == 2))
                                                <span class="invalid-feedback">{{$errors->first('manufacturerYear')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                            Country Of Origin
                                        </label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control {{($errors->has('countryOfOrigin') && ((session('mcid') * 1) == 1)) ? 'is-invalid' : ''}}"
                                                   type="text" name="countryOfOrigin" required
                                                   value="{{((session('mcid') * 1) == 2) ? (old('countryOfOrigin')) : "" }}">
                                            @if($errors->has('countryOfOrigin') && ((session('mcid') * 1) == 1))
                                                <span class="invalid-feedback">{{$errors->first('countryOfOrigin')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Rope Size</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-daterange input-group">
                                                <input type="number"
                                                       class="form-control {{($errors->has('ropeSizeStart') && ((session('mcid') * 1) == 2)) ? 'is-invalid' : ''}}"
                                                       name="ropeSizeStart" required
                                                       value="{{((session('mcid') * 1) == 2) ? (old('ropeSizeStart')) : "" }}">
                                                @if($errors->has('ropeSizeStart') && ((session('mcid') * 1) == 2))
                                                    <span class="invalid-feedback">{{$errors->first('ropeSizeStart')}}</span>
                                                @endif
                                                <div class="input-group-append">
                                                    <span class="input-group-text">to</span>
                                                </div>
                                                <input type="number"
                                                       class="form-control {{($errors->has('ropeSizeEnd') && ((session('mcid') * 1) == 2)) ? 'is-invalid' : ''}}"
                                                       name="ropeSizeEnd" required
                                                       value="{{((session('mcid') * 1) == 2) ? (old('ropeSizeEnd')) : "" }}">
                                                @if($errors->has('ropeSizeEnd') && ((session('mcid') * 1) == 2))
                                                    <span class="invalid-feedback">{{$errors->first('ropeSizeEnd')}}</span>
                                                @endif
                                            </div>
                                            <span class="form-text text-muted">Write the number in mm</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                            Select Factory
                                        </label>
                                        <div class="col-lg-9 col-xl-6">
                                            <select class="form-control {{($errors->has('factory') && ((session('mcid') * 1) == 2)) ? 'is-invalid' : ''}}"
                                                    name="factory" required>
                                                <option selected disabled hidden value="">Choose...</option>
                                                @foreach($factories as $f)
                                                    <option value="{{$f->id}}">{{$f->name}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('factory') && ((session('mcid') * 1) == 2))
                                                <span class="invalid-feedback">{{$errors->first('factory')}}</span>
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
                                                   class="cancel btn btn-label-danger btn-bold float-right">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="kt_user_edit_tab_3" class="tab-pane {{ ((session('mcid') * 1) == 3) ? "active" : "" }}">
                        <div class="kt-form kt-form--label-right">
                            <form action="{{route('machine.store', ['mcid' => $machineCategories[2]->id])}}" method="post">
                                @csrf
                                <div class="kt-section__body">
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                            Manufacturer Name
                                            {{--    Auto Fill  use datalist       --}}
                                        </label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control {{($errors->has('manufacturerName') && ((session('mcid') * 1) == 3)) ? 'is-invalid' : ''}}"
                                                   type="text" name="manufacturerName" required
                                                   value="{{((session('mcid') * 1) == 3) ? (old('manufacturerName')) : "" }}">
                                            @if($errors->has('manufacturerName') && ((session('mcid') * 1) == 3))
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
                                            <input class="form-control {{($errors->has('typeOrModelNumber') && ((session('mcid') * 1) == 3)) ? 'is-invalid' : ''}}"
                                                   type="text" name="typeOrModelNumber" required
                                                   value="{{((session('mcid') * 1) == 3) ? (old('typeOrModelNumber')) : "" }}">
                                            @if($errors->has('typeOrModelNumber') && ((session('mcid') * 1) == 3))
                                                <span class="invalid-feedback">{{$errors->first('typeOrModelNumber')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                            Serial Number
                                        </label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control {{($errors->has('serialNumber') && ((session('mcid') * 1) == 3)) ? 'is-invalid' : ''}}"
                                                   type="text" name="serialNumber" required
                                                   value="{{((session('mcid') * 1) == 3) ? (old('serialNumber')) : "" }}">
                                            @if($errors->has('serialNumber') && ((session('mcid') * 1) == 3))
                                                <span class="invalid-feedback">{{$errors->first('serialNumber')}}</span>
                                            @endif
                                            <span class="form-text text-muted">It has to be unique*</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label"> Manufacturer Year</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control datepickerYear {{($errors->has('manufacturerYear') && ((session('mcid') * 1) == 3)) ? 'is-invalid' : ''}}"
                                                   type="text" name="manufacturerYear" required id="datepickerYear"
                                                   value="{{((session('mcid') * 1) == 3) ? (old('manufacturerYear')) : "" }}">
                                            @if($errors->has('manufacturerYear') && ((session('mcid') * 1) == 3))
                                                <span class="invalid-feedback">{{$errors->first('manufacturerYear')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                            Country Of Origin
                                        </label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control {{($errors->has('countryOfOrigin') && ((session('mcid') * 1) == 3)) ? 'is-invalid' : ''}}"
                                                   type="text" name="countryOfOrigin" required
                                                   value="{{((session('mcid') * 1) == 3) ? (old('countryOfOrigin')) : "" }}">
                                            @if($errors->has('countryOfOrigin') && ((session('mcid') * 1) == 3))
                                                <span class="invalid-feedback">{{$errors->first('countryOfOrigin')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Rope Size</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-daterange input-group">
                                                <input type="number"
                                                       class="form-control {{($errors->has('ropeSizeStart') && ((session('mcid') * 1) == 3)) ? 'is-invalid' : ''}}"
                                                       name="ropeSizeStart" required
                                                       value="{{((session('mcid') * 1) == 3) ? (old('ropeSizeStart')) : "" }}">
                                                @if($errors->has('ropeSizeStart') && ((session('mcid') * 1) == 3))
                                                    <span class="invalid-feedback">{{$errors->first('ropeSizeStart')}}</span>
                                                @endif
                                                <div class="input-group-append">
                                                    <span class="input-group-text">to</span>
                                                </div>
                                                <input type="number"
                                                       class="form-control {{($errors->has('ropeSizeEnd') && ((session('mcid') * 1) == 3)) ? 'is-invalid' : ''}}"
                                                       name="ropeSizeEnd" required
                                                       value="{{((session('mcid') * 1) == 3) ? (old('ropeSizeEnd')) : "" }}">
                                                @if($errors->has('ropeSizeEnd') && ((session('mcid') * 1) == 3))
                                                    <span class="invalid-feedback">{{$errors->first('ropeSizeEnd')}}</span>
                                                @endif
                                            </div>
                                            <span class="form-text text-muted">Write the number in mm</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                            Select Factory
                                        </label>
                                        <div class="col-lg-9 col-xl-6">
                                            <select class="form-control {{($errors->has('factory') && ((session('mcid') * 1) == 3)) ? 'is-invalid' : ''}}"
                                                    name="factory" required>
                                                <option selected disabled hidden value="">Choose...</option>
                                                @foreach($factories as $f)
                                                    <option value="{{$f->id}}">{{$f->name}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('factory') && ((session('mcid') * 1) == 3))
                                                <span class="invalid-feedback">{{$errors->first('factory')}}</span>
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
                                                   class="cancel btn btn-label-danger btn-bold float-right">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="kt_user_edit_tab_4" class="tab-pane {{ ((session('mcid') * 1) == 4) ? "active" : "" }}">
                        <div class="kt-form kt-form--label-right">
                            <form action="{{route('machine.store', ['mcid' => $machineCategories[3]->id])}}" method="post">
                                @csrf
                                <div class="kt-section__body">
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                            Manufacturer Name
                                            {{--    Auto Fill  use datalist       --}}
                                        </label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control {{($errors->has('manufacturerName') && ((session('mcid') * 1) == 4)) ? 'is-invalid' : ''}}"
                                                   type="text" name="manufacturerName" required
                                                   value="{{((session('mcid') * 1) == 4) ? (old('manufacturerName')) : "" }}">
                                            @if($errors->has('manufacturerName') && ((session('mcid') * 1) == 4))
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
                                            <input class="form-control {{($errors->has('typeOrModelNumber') && ((session('mcid') * 1) == 4)) ? 'is-invalid' : ''}}"
                                                   type="text" name="typeOrModelNumber" required
                                                   value="{{((session('mcid') * 1) == 4) ? (old('typeOrModelNumber')) : "" }}">
                                            @if($errors->has('typeOrModelNumber') && ((session('mcid') * 1) == 4))
                                                <span class="invalid-feedback">{{$errors->first('typeOrModelNumber')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                            Serial Number
                                        </label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control {{($errors->has('serialNumber') && ((session('mcid') * 1) == 4)) ? 'is-invalid' : ''}}"
                                                   type="text" name="serialNumber" required
                                                   value="{{((session('mcid') * 1) == 4) ? (old('serialNumber')) : "" }}">
                                            @if($errors->has('serialNumber') && ((session('mcid') * 1) == 4))
                                                <span class="invalid-feedback">{{$errors->first('serialNumber')}}</span>
                                            @endif
                                            <span class="form-text text-muted">It has to be unique*</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label"> Manufacturer Year</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control datepickerYear {{($errors->has('manufacturerYear') && ((session('mcid') * 1) == 4)) ? 'is-invalid' : ''}}"
                                                   type="text" name="manufacturerYear" required id="datepickerYear"
                                                   value="{{((session('mcid') * 1) == 4) ? (old('manufacturerYear')) : "" }}">
                                            @if($errors->has('manufacturerYear') && ((session('mcid') * 1) == 4))
                                                <span class="invalid-feedback">{{$errors->first('manufacturerYear')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                            Country Of Origin
                                        </label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control {{($errors->has('countryOfOrigin') && ((session('mcid') * 1) == 4)) ? 'is-invalid' : ''}}"
                                                   type="text" name="countryOfOrigin" required
                                                   value="{{((session('mcid') * 1) == 4) ? (old('countryOfOrigin')) : "" }}">
                                            @if($errors->has('countryOfOrigin') && ((session('mcid') * 1) == 4))
                                                <span class="invalid-feedback">{{$errors->first('countryOfOrigin')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                            Screw Size
                                        </label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control  {{($errors->has('screwSize') && ((session('mcid') * 1) == 4)) ? 'is-invalid' : ''}}"
                                                   type="number" name="screwSize" required
                                                   value="{{((session('mcid') * 1) == 4) ? (old('screwSize')) : "" }}">
                                            @if($errors->has('screwSize') && ((session('mcid') * 1) == 4))
                                                <span class="invalid-feedback">{{$errors->first('screwSize')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                            Production Capacity
                                        </label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control  {{($errors->has('productionCapacity') && ((session('mcid') * 1) == 4)) ? 'is-invalid' : ''}}"
                                                   type="number" name="productionCapacity" required
                                                   value="{{((session('mcid') * 1) == 4) ? (old('productionCapacity')) : "" }}">
                                            @if($errors->has('productionCapacity') && ((session('mcid') * 1) == 4))
                                                <span class="invalid-feedback">{{$errors->first('productionCapacity')}}</span>
                                            @endif
                                            <span class="form-text text-muted">Write the number in hgs/hr</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                            Select Factory
                                        </label>
                                        <div class="col-lg-9 col-xl-6">
                                            <select class="form-control {{($errors->has('factory') && ((session('mcid') * 1) == 4)) ? 'is-invalid' : ''}}"
                                                    name="factory" required>
                                                <option selected disabled hidden value="">Choose...</option>
                                                @foreach($factories as $f)
                                                    <option value="{{$f->id}}">{{$f->name}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('factory') && ((session('mcid') * 1) == 4))
                                                <span class="invalid-feedback">{{$errors->first('factory')}}</span>
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
                                                   class="cancel btn btn-label-danger btn-bold float-right">Cancel</a>
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