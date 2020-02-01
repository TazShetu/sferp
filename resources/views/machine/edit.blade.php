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
        @elseif(count($errors) > 0)
            <div class="alert alert-danger text-center">
                Error in input fields. Please Check
            </div>
        @endif
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-toolbar">
                    <ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand"
                        role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab"
                               href="#kt_machine_edit_tab_1" role="tab">
                                <svg width="24px" height="24px"
                                     viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                              fill="#000000" fill-rule="nonzero"/>
                                        <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                              fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg>
                                Machine
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab"
                               href="#kt_machine_edit_tab_2" role="tab">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M8.46446609,11.2928932 L7.40380592,10.232233 C7.20854378,10.0369709 7.20854378,9.72038841 7.40380592,9.52512627 L8.1109127,8.81801948 C8.30617485,8.62275734 8.62275734,8.62275734 8.81801948,8.81801948 L15.1819805,15.1819805 C15.3772427,15.3772427 15.3772427,15.6938252 15.1819805,15.8890873 L14.4748737,16.5961941 C14.2796116,16.7914562 13.9630291,16.7914562 13.767767,16.5961941 L12.7071068,15.5355339 L7.05025253,21.1923882 C6.26920395,21.9734367 5.00287399,21.9734367 4.22182541,21.1923882 L2.80761184,19.7781746 C2.02656326,18.997126 2.02656326,17.7307961 2.80761184,16.9497475 L8.46446609,11.2928932 Z M4.5753788,18.0104076 C4.38011665,18.2056698 4.38011665,18.5222523 4.5753788,18.7175144 C4.77064094,18.9127766 5.08722343,18.9127766 5.28248558,18.7175144 L9.52512627,14.4748737 C9.72038841,14.2796116 9.72038841,13.9630291 9.52512627,13.767767 C9.32986412,13.5725048 9.01328163,13.5725048 8.81801948,13.767767 L4.5753788,18.0104076 Z"
                                              fill="#000000" opacity="0.3"/>
                                        <path d="M16.9497475,5.63603897 L16.7788182,5.4651097 C16.5835561,5.26984755 16.5835561,4.95326506 16.7788182,4.75800292 C16.8266988,4.71012232 16.8838059,4.67246608 16.9466763,4.64731796 L19.4720576,3.63716542 C19.657766,3.56288206 19.869875,3.60641908 20.0113063,3.74785037 L20.2521496,3.98869366 C20.3935809,4.13012495 20.4371179,4.342234 20.3628346,4.52794239 L19.352682,7.05332375 C19.2501253,7.30971551 18.9591401,7.43442346 18.7027484,7.33186676 C18.6398781,7.30671864 18.5827709,7.2690624 18.5348903,7.2211818 L18.363961,7.05025253 L12.7071068,12.7071068 L11.2928932,11.2928932 L16.9497475,5.63603897 Z"
                                              fill="#000000"/>
                                    </g>
                                </svg>
                                Spare Parts
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="tab-content">
                    <div class="tab-pane active" id="kt_machine_edit_tab_1" role="tabpanel">
                        <div class="kt-form kt-form--label-right">
                            <div class="kt-form__body">
                                <div class="kt-section kt-section--first">
                                    {{--      Form Start    --}}
                                    <form action="{{route('machine.update', ['mid' => $medit->id])}}" method="post">
                                        @csrf
                                        <div class="kt-section__body">
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Category
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('category')) ? 'is-invalid' : ''}}"
                                                           type="text" name="category" required
                                                           value="{{$medit->category}}" list="category">
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
                                                        <option selected hidden
                                                                value="{{$medit->factory_id}}">{{$medit->factoryName}}</option>
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
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('manufacturerName')) ? 'is-invalid' : ''}}"
                                                           type="text" name="manufacturerName" required
                                                           value="{{$medit->manufacturer}}" list="manufacturer">
                                                    @if($errors->has('manufacturerName'))
                                                        <span class="invalid-feedback">{{$errors->first('manufacturerName')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Type / Model Number
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('typeOrModelNumber')) ? 'is-invalid' : ''}}"
                                                           type="text" name="typeOrModelNumber" required
                                                           value="{{$medit->type}}" list="type">
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
                                                    <select class="form-control {{($errors->has('skOrDk')) ? 'is-invalid' : ''}}"
                                                            name="skOrDk">
                                                        <option selected hidden
                                                                value="{{$medit->sk_dk}}">{{$medit->sk_dk}}</option>
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
                                                           type="number" name="pitchSize" step="0.01" min="0"
                                                           value="{{$medit->pitch_size}}">
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
                                                           type="number" name="spoolDiameter" step="0.01" min="0"
                                                           value="{{$medit->spool_diameter}}">
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
                                                           type="number" name="numberOfShuttles" min="0"
                                                           value="{{$medit->number_of_shuttles}}">
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
                                                               name="ropeSizeStart" value="{{$medit->rope_size_from}}"
                                                               step="0.01" min="0">
                                                        @if($errors->has('ropeSizeStart'))
                                                            <span class="invalid-feedback">{{$errors->first('ropeSizeStart')}}</span>
                                                        @endif
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">to</span>
                                                        </div>
                                                        <input type="number"
                                                               class="form-control {{($errors->has('ropeSizeEnd')) ? 'is-invalid' : ''}}"
                                                               name="ropeSizeEnd" value="{{$medit->rope_size_to}}"
                                                               step="0.01" min="0">
                                                        @if($errors->has('ropeSizeEnd'))
                                                            <span class="invalid-feedback">{{$errors->first('ropeSizeEnd')}}</span>
                                                        @endif
                                                    </div>
                                                    <span class="form-text text-muted">Write the number in mm</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Size Range</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="input-daterange input-group">
                                                        <input type="number"
                                                               class="form-control {{($errors->has('sizeRangeStart')) ? 'is-invalid' : ''}}"
                                                               name="sizeRangeStart" step="0.01" min="0"
                                                               value="{{$medit->size_range_from}}">
                                                        @if($errors->has('sizeRangeStart'))
                                                            <span class="invalid-feedback">{{$errors->first('sizeRangeStart')}}</span>
                                                        @endif
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">to</span>
                                                        </div>
                                                        <input type="number"
                                                               class="form-control {{($errors->has('sizeRangeEnd')) ? 'is-invalid' : ''}}"
                                                               name="sizeRangeEnd" value="{{$medit->size_range_to}}"
                                                               step="0.01" min="0">
                                                        @if($errors->has('sizeRangeEnd'))
                                                            <span class="invalid-feedback">{{$errors->first('sizeRangeEnd')}}</span>
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
                                                           type="number" name="screwSize" step="0.01" min="0"
                                                           value="{{$medit->screw_size}}">
                                                    {{--                                                    @if($errors->has('screwSize'))--}}
                                                    {{--                                                        <span class="invalid-feedback">{{$errors->first('screwSize')}}</span>--}}
                                                    {{--                                                    @endif--}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Production Capacity
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control  {{($errors->has('productionCapacity')) ? 'is-invalid' : ''}}"
                                                           type="number" name="productionCapacity" step="0.01" min="0"
                                                           value="{{$medit->production_capacity}}">
                                                    {{--                                                    @if($errors->has('productionCapacity'))--}}
                                                    {{--                                                        <span class="invalid-feedback">{{$errors->first('productionCapacity')}}</span>--}}
                                                    {{--                                                    @endif--}}
                                                    <span class="form-text text-muted">Write the number in hgs/hr</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    L / D Ratio
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control  {{($errors->has('LDRatio')) ? 'is-invalid' : ''}}"
                                                           type="number" name="LDRatio" step="0.01" min="0"
                                                           value="{{$medit->ld_ratio}}">
                                                    {{--                                                    @if($errors->has('productionCapacity'))--}}
                                                    {{--                                                        <span class="invalid-feedback">{{$errors->first('productionCapacity')}}</span>--}}
                                                    {{--                                                    @endif--}}
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
                    <div class="tab-pane active" id="kt_machine_edit_tab_2" role="tabpanel">
                        @if(count($allSpareParts) > 0)
                            <div class="kt-form kt-form--label-right">
                                <div class="kt-form__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body">
                                            {{--Form Start--}}
                                            <form action="{{route('machine.update.sparepart', ['mid' => $medit->id])}}"
                                                  method="post">
                                                @csrf
                                                <div id="kt_repeater_1">
                                                    <div class="form-group form-group-last row"
                                                         id="kt_repeater_1">
                                                        <div class="col-lg-12" id="repeat-content-sparePart">
                                                            @foreach($spareParts as $sp)
                                                                <div class="form-group row align-items-center remove-content">
                                                                    <div class="col-md-3">
                                                                        <div class="kt-form__group--inline">
                                                                            <div class="kt-form__label">
                                                                                <label>Spare Part:</label>
                                                                            </div>
                                                                            <div class="kt-form__control">
                                                                                <select class="form-control kt-selectpicker"
                                                                                        name="sparePart[]"
                                                                                        data-live-search="true"
                                                                                        data-size="7">
                                                                                    <option selected hidden
                                                                                            value="{{$sp->id}}">
                                                                                        {{$sp->description.' - '.$sp->identity_number }}
                                                                                    </option>
                                                                                    @foreach($allSpareParts as $asp)
                                                                                        <option value="{{$asp->id}}">{{$asp->description.' - '.$asp->identity_number}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-md-none kt-margin-b-10"></div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <a href="javascript:;"
                                                                           data-repeater-delete=""
                                                                           class="btn-sm btn btn-label-danger btn-bold delete-btn"
                                                                           style="margin-top: 24px;">
                                                                            <i class="la la-trash-o"></i>
                                                                            Delete
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                            @if(isset($allSpareParts) && isset($spareParts) && (count($allSpareParts) != count($spareParts)))
                                                                <div class="form-group row align-items-center remove-content">
                                                                    <div class="col-md-3">
                                                                        <div class="kt-form__group--inline">
                                                                            <div class="kt-form__label">
                                                                                <label>Spare Part:</label>
                                                                            </div>
                                                                            <div class="kt-form__control">
                                                                                <select class="form-control kt-selectpicker"
                                                                                        name="sparePart[]"
                                                                                        data-live-search="true"
                                                                                        data-size="7">
                                                                                    <option selected disabled hidden>
                                                                                        Choose...
                                                                                    </option>
                                                                                    @foreach($allSpareParts as $asp)
                                                                                        <option value="{{$asp->id}}"
                                                                                                data-live-search="true"
                                                                                                data-size="7">
                                                                                            {{$asp->description.' - '.$asp->identity_number}}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-md-none kt-margin-b-10"></div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <a href="javascript:;"
                                                                           data-repeater-delete=""
                                                                           class="btn-sm btn btn-label-danger btn-bold delete-btn"
                                                                           style="margin-top: 24px;">
                                                                            <i class="la la-trash-o"></i>
                                                                            Delete
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    {{--                                        @if(isset($allSubDealers) && isset($subDealers) && (count($allSubDealers) != count($subDealers)))--}}
                                                    <div class="form-group form-group-last row">
                                                        <div class="col-lg-4">
                                                            <a href="javascript:;" id="add-btn-sparepart"
                                                               class="btn btn-bold btn-sm btn-label-brand">
                                                                <i class="la la-plus"></i> Add Another Spare Part
                                                            </a>
                                                        </div>
                                                    </div>
                                                    {{--                                        @endif--}}
                                                </div>
                                                <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
                                                <div class="kt-form__actions">
                                                    <div class="row">
                                                        <div class="col-xl-3"></div>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <button type="submit"
                                                                    class="btn btn-label-brand btn-bold">
                                                                Save Changes
                                                            </button>
                                                            <a href="javascript:void (0)"
                                                               data-link="{{route('cancel')}}"
                                                               class="cancel btn btn-label-danger btn-bold float-right">Reset</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            {{--Form End--}}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @else
                            <div class="alert alert-danger text-center">
                                No spareparts is created yet :(
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

    <datalist id="category">
        @forelse($datalist['category'] as $t)
            <option value="{{$t->category}}">
        @empty
        @endforelse
    </datalist>
    <datalist id="manufacturer">
        @forelse($datalist['manufacturer'] as $m)
            <option value="{{$m->manufacturer}}">
        @empty
        @endforelse
    </datalist>
    <datalist id="type">
        @forelse($datalist['type'] as $t)
            <option value="{{$t->type}}">
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
    <script src="{{asset('m/assets/js/pages/custom/user/edit-user.js')}}" type="text/javascript"></script>
    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/bootstrap-select.js')}}" type="text/javascript"></script>

    <script>
        $(".datepickerYear").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
        });
    </script>
    <script>
        $(document).on('click', '.delete-btn', function (f) {
            $(f.target).closest('.remove-content').slideUp(function () {
                $(this).remove();
            });
        });
    </script>
    <script>
        $(document).on('click', '#add-btn-sparepart', function () {
            var input = `
                 <div class="form-group row align-items-center remove-content">
                    <div class="col-md-3">
                        <div class="kt-form__group--inline">
                            <div class="kt-form__label">
                                <label>Spare Part:</label>
                            </div>
                            <div class="kt-form__control">
                                <select class="form-control kt-selectpicker"
                                        name="sparePart[]"
                                        data-live-search="true"
                                        data-size="7">
                                    <option selected disabled hidden>
                                        Choose...
                                    </option>
                                    @foreach($allSpareParts as $asp)
                <option value="{{$asp->id}}"
                                            data-live-search="true"
                                            data-size="7">
                                        {{$asp->description.' - '.$asp->identity_number}}
                </option>
@endforeach
                </select>
            </div>
        </div>
        <div class="d-md-none kt-margin-b-10"></div>
    </div>
    <div class="col-md-3">
        <a href="javascript:;"
           data-repeater-delete=""
           class="btn-sm btn btn-label-danger btn-bold delete-btn"
           style="margin-top: 24px;">
            <i class="la la-trash-o"></i>
            Delete
        </a>
    </div>
</div>
`;
            $(input).slideUp(1, function () {
                $('#repeat-content-sparePart').append(this);
                $(this).slideDown(500);
            });
            {{--$.getScript("{{asset('m/assets/js/pages/crud/forms/widgets/bootstrap-select.js')}}");--}}
            $('.kt-selectpicker').selectpicker();
        });
    </script>


    {{--    <script src="{{asset('m/assets/js/pages/crud/file-upload/uppy.js')}}" type="text/javascript"></script>--}}

    {{--    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/form-repeater.js')}}" type="text/javascript"></script>--}}
    {{--    <script src="{{asset('plugins/select2/select2.full.min.js')}}" type="text/javascript"></script>--}}

    <!--end::Page Scripts -->
@endsection