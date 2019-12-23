@extends('layouts.m')
@section('title', 'Machine Edit')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Machine Edit
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{route('home')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('machine.list')}}" class="kt-subheader__breadcrumbs-link">Machine</a>
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
                        @if(($medit->machinecategory_id * 1) == 1)
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1" role="tab">
                                    <i class="flaticon-cogwheel"></i>
                                    Fishing Net Machine
                                </a>
                            </li>
                        @elseif(($medit->machinecategory_id * 1) == 2)
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_2" role="tab">
                                    <i class="flaticon-cogwheel"></i>
                                    Rope Making Machine
                                </a>
                            </li>
                        @elseif(($medit->machinecategory_id * 1) == 3)
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_3" role="tab">
                                    <i class="flaticon-cogwheel"></i>
                                    Twisting Machine
                                </a>
                            </li>
                        @elseif(($medit->machinecategory_id * 1) == 4)
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_4" role="tab">
                                    <i class="flaticon-cogwheel"></i>
                                    Extruder Machine
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="tab-content">
                    @if(($medit->machinecategory_id * 1) == 1)
                        <div id="kt_user_edit_tab_1" class="tab-pane active">
                            <div class="kt-form kt-form--label-right">
                                <div class="kt-form__body">
                                    <div class="kt-section kt-section--first">
                                        {{--      Form Start    --}}
                                        <form action="{{route('machine.update', ['mid' => $medit->id])}}" method="post">
                                            @csrf
                                            <div class="kt-section__body">
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Manufacturer Name
                                                        {{--    Auto Fill  use datalist       --}}
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control {{($errors->has('manufacturerName')) ? 'is-invalid' : ''}}"
                                                               type="text" name="manufacturerName" required
                                                               value="{{$medit->manufacturer}}">
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
                                                               value="{{$medit->type}}">
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
                                                               value="{{$medit->identification_code}}">
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
                                                               value="{{$medit->manufacture_year}}">
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
                                                               value="{{$medit->manufacture_country}}">
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
                                                        <select class="form-control {{($errors->has('skOrDk') && ((session('mcid') * 1) == 1)) ? 'is-invalid' : ''}}"
                                                                name="skOrDk" required>
                                                            <option value="S/K" {{($medit->sk_dk == "S/K") ? 'selected' : ''}}>
                                                                S/K
                                                            </option>
                                                            <option value="D/K" {{($medit->sk_dk == "D/K") ? 'selected' : ''}}>
                                                                D/K
                                                            </option>
                                                        </select>
                                                        @if($errors->has('skOrDk'))
                                                            <span class="invalid-feedback">{{$errors->first('skOrDk')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Pitch Size
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control {{($errors->has('pitchSize')) ? 'is-invalid' : ''}}"
                                                               type="number" name="pitchSize" required
                                                               value="{{$medit->pitch_size}}">
                                                        @if($errors->has('pitchSize'))
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
                                                        <input class="form-control {{($errors->has('spoolDiameter')) ? 'is-invalid' : ''}}"
                                                               type="number" name="spoolDiameter" required
                                                               value="{{$medit->spool_diameter}}">
                                                        @if($errors->has('spoolDiameter'))
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
                                                        <input class="form-control {{($errors->has('numberOfShuttles')) ? 'is-invalid' : ''}}"
                                                               type="number" name="numberOfShuttles" required
                                                               value="{{$medit->number_of_shuttles}}">
                                                        @if($errors->has('numberOfShuttles'))
                                                            <span class="invalid-feedback">{{$errors->first('numberOfShuttles')}}</span>
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
                                                            @foreach($factories as $f)
                                                                <option value="{{$f->id}}" {{($f->id == $medit->factory_id) ? 'selected' : ''}}>{{$f->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('factory'))
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
                                                            <a href="javascript:void (0)"
                                                               data-link="{{route('cancel')}}"
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
                    @elseif(($medit->machinecategory_id * 1) == 2)
                        <div id="kt_user_edit_tab_2" class="tab-pane active">
                            <div class="kt-form kt-form--label-right">
                                <form action="{{route('machine.update', ['mid' => $medit->id])}}" method="post">
                                    @csrf
                                    <div class="kt-section__body">
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                Manufacturer Name
                                                {{--    Auto Fill  use datalist       --}}
                                            </label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control {{($errors->has('manufacturerName')) ? 'is-invalid' : ''}}"
                                                       type="text" name="manufacturerName" required
                                                       value="{{$medit->manufacturer}}">
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
                                                       value="{{$medit->type}}">
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
                                                       value="{{$medit->identification_code}}">
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
                                                       value="{{$medit->manufacture_year}}">
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
                                                       value="{{$medit->manufacture_country}}">
                                                @if($errors->has('countryOfOrigin'))
                                                    <span class="invalid-feedback">{{$errors->first('countryOfOrigin')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Rope Size</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-daterange input-group">
                                                    <input type="number"
                                                           class="form-control {{($errors->has('ropeSizeStart')) ? 'is-invalid' : ''}}"
                                                           name="ropeSizeStart" required
                                                           value="{{$medit->rope_size_from}}">
                                                    @if($errors->has('ropeSizeStart'))
                                                        <span class="invalid-feedback">{{$errors->first('ropeSizeStart')}}</span>
                                                    @endif
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">to</span>
                                                    </div>
                                                    <input type="number"
                                                           class="form-control {{($errors->has('ropeSizeEnd')) ? 'is-invalid' : ''}}"
                                                           name="ropeSizeEnd" required
                                                           value="{{$medit->rope_size_to}}">
                                                    @if($errors->has('ropeSizeEnd'))
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
                                                <select class="form-control {{($errors->has('factory')) ? 'is-invalid' : ''}}"
                                                        name="factory" required>
                                                    @foreach($factories as $f)
                                                        <option value="{{$f->id}}" {{($f->id == $medit->factory_id) ? 'selected' : ''}}>{{$f->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('factory'))
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
                    @elseif(($medit->machinecategory_id * 1) == 3)
                        <div id="kt_user_edit_tab_3" class="tab-pane active">
                            <div class="kt-form kt-form--label-right">
                                <form action="{{route('machine.update', ['mid' => $medit->id])}}" method="post">
                                    @csrf
                                    <div class="kt-section__body">
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                Manufacturer Name
                                                {{--    Auto Fill  use datalist       --}}
                                            </label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control {{($errors->has('manufacturerName')) ? 'is-invalid' : ''}}"
                                                       type="text" name="manufacturerName" required
                                                       value="{{$medit->manufacturer}}">
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
                                                       value="{{$medit->type}}">
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
                                                       value="{{$medit->identification_code}}">
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
                                                       value="{{$medit->manufacture_year}}">
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
                                                       value="{{$medit->manufacture_country}}">
                                                @if($errors->has('countryOfOrigin'))
                                                    <span class="invalid-feedback">{{$errors->first('countryOfOrigin')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Rope Size</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-daterange input-group">
                                                    <input type="number"
                                                           class="form-control {{($errors->has('ropeSizeStart')) ? 'is-invalid' : ''}}"
                                                           name="ropeSizeStart" required
                                                           value="{{$medit->rope_size_from}}">
                                                    @if($errors->has('ropeSizeStart'))
                                                        <span class="invalid-feedback">{{$errors->first('ropeSizeStart')}}</span>
                                                    @endif
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">to</span>
                                                    </div>
                                                    <input type="number"
                                                           class="form-control {{($errors->has('ropeSizeEnd')) ? 'is-invalid' : ''}}"
                                                           name="ropeSizeEnd" required
                                                           value="{{$medit->rope_size_to}}">
                                                    @if($errors->has('ropeSizeEnd'))
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
                                                <select class="form-control {{($errors->has('factory')) ? 'is-invalid' : ''}}"
                                                        name="factory" required>
                                                    @foreach($factories as $f)
                                                        <option value="{{$f->id}}" {{($f->id == $medit->factory_id) ? 'selected' : ''}}>{{$f->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('factory'))
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
                    @elseif(($medit->machinecategory_id * 1) == 4)
                        <div id="kt_user_edit_tab_4" class="tab-pane active">
                            <div class="kt-form kt-form--label-right">
                                <form action="{{route('machine.update', ['mid' => $medit->id])}}" method="post">
                                    @csrf
                                    <div class="kt-section__body">
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                Manufacturer Name
                                                {{--    Auto Fill  use datalist       --}}
                                            </label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control {{($errors->has('manufacturerName')) ? 'is-invalid' : ''}}"
                                                       type="text" name="manufacturerName" required
                                                       value="{{$medit->manufacturer}}">
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
                                                       value="{{$medit->type}}">
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
                                                       value="{{$medit->identification_code}}">
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
                                                       value="{{$medit->manufacture_year}}">
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
                                                       value="{{$medit->manufacture_country}}">
                                                @if($errors->has('countryOfOrigin'))
                                                    <span class="invalid-feedback">{{$errors->first('countryOfOrigin')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                Screw Size
                                            </label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control  {{($errors->has('screwSize')) ? 'is-invalid' : ''}}"
                                                       type="number" name="screwSize" required
                                                       value="{{$medit->screw_size}}">
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
                                                       type="number" name="productionCapacity" required
                                                       value="{{$medit->production_capacity}}">
                                                @if($errors->has('productionCapacity'))
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
                                                <select class="form-control {{($errors->has('factory')) ? 'is-invalid' : ''}}"
                                                        name="factory" required>
                                                    @foreach($factories as $f)
                                                        <option value="{{$f->id}}" {{($f->id == $medit->factory_id) ? 'selected' : ''}}>{{$f->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('factory'))
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
                    @endif
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