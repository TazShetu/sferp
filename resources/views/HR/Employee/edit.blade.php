@extends('layouts.m')
@section('title', 'Employee Edit')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Employee Edit
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{route('home')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('employee.list')}}" class="kt-subheader__breadcrumbs-link">Employee</a>
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
        {{--        @if(session('Success'))--}}
        {{--            <div class="alert alert-success text-center" id="toaster">--}}
        {{--                {{session('Success')}}--}}
        {{--            </div>--}}
        {{--        @elseif(session('unsuccess'))--}}
        {{--            <div class="alert alert-warning text-center" id="toaster">--}}
        {{--                {{session('unsuccess')}}--}}
        {{--            </div>--}}
        {{--        @endif --}}
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

                                    <div class="kt-section__body accordion" id="accordionExample1">
                                        {{--Main--}}
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <div class="card-title collapsed" data-toggle="collapse"
                                                     data-target="#collapseOne1" aria-expanded="false"
                                                     aria-controls="collapseOne1">
                                                    Main
                                                </div>
                                            </div>
                                            <div id="collapseOne1" class="collapse"
                                                 aria-labelledby="headingOne" data-parent="#accordionExample1"
                                                 style="">
                                                <div class="card-body">
                                                    {{--      Form Start Main   --}}
                                                    <form
                                                        action="{{route('employee.update.main', ['eid' => $eedit->id])}}"
                                                        method="post">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                Companies*
                                                            </label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <div class="kt-checkbox-list">
                                                                    @foreach($factories as $f)
                                                                        <label
                                                                            class="kt-checkbox kt-checkbox--tick kt-checkbox--success">
                                                                            <input type="checkbox" name="factory[]"
                                                                                   value="{{$f->id}}"
                                                                                   @foreach($eedit->factories as $ff)
                                                                                   @if($ff->id == $f->id)
                                                                                   checked
                                                                                @break
                                                                                @endif
                                                                                @endforeach
                                                                            >
                                                                            {{$f->name}}
                                                                            <span></span>
                                                                        </label>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                Employee Type
                                                            </label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <select readonly="readonly" class="form-control">
                                                                    <option selected disabled hidden value="">
                                                                        {{$eedit->type}}
                                                                    </option>
                                                                </select>
                                                                <small>Can not be edited</small>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                Designation*
                                                            </label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <select name="designation" required id="designation"
                                                                        class="form-control {{($errors->has('designation')) ? 'is-invalid' : ''}}">
                                                                    <option selected hidden
                                                                            value="{{$eedit->designation->id}}">
                                                                        {{$eedit->designation->title}}
                                                                    </option>
                                                                    @foreach($designations as $d)
                                                                        <option
                                                                            value="{{$d->id}}">{{$d->title}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                Full Name*
                                                            </label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <input
                                                                    class="form-control {{($errors->has('name')) ? 'is-invalid' : ''}}"
                                                                    type="text" name="name" required
                                                                    value="{{$eedit->name}}">
                                                                @if($errors->has('name'))
                                                                    <span
                                                                        class="invalid-feedback">{{$errors->first('name')}}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                Date Of Joining
                                                            </label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <div class="input-group date">
                                                                    <input
                                                                        class="form-control {{$errors->has('dateOfJoining') ? 'is-invalid' : ''}}"
                                                                        type="text" name="dateOfJoining" readonly
                                                                        required
                                                                        placeholder="Select date" id="kt_datepicker_3"
                                                                        value="{{date('m/d/Y',strtotime($eedit->doj))}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-calendar-check-o"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                @if($errors->has('dateOfJoining'))
                                                                    <span
                                                                        class="invalid-feedback">{{$errors->first('dateOfJoining')}}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        {{-- <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>--}}
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
                                                    {{--Form End main--}}
                                                </div>
                                            </div>
                                        </div>
                                        {{--Personal info--}}
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <div class="card-title collapsed" data-toggle="collapse"
                                                     data-target="#collapseTwo1" aria-expanded="false"
                                                     aria-controls="collapseTwo1">
                                                    Personal Information
                                                </div>
                                            </div>
                                            <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo1"
                                                 data-parent="#accordionExample1" style="">
                                                <div class="card-body">
                                                    {{--      Form Start Personal Info   --}}
                                                    <form method="post"
                                                          action="{{route('employee.update.pinfo', ['eid' => $eedit->id])}}">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                পূর্ণ নাম বাংলায়
                                                            </label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <input class="form-control" type="text" name="name"
                                                                       value="{{$eedit->details ?  $eedit->details->name_bengali : ''}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                Date Of Birth
                                                            </label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <div class="input-group date">
                                                                    <input class="form-control"
                                                                           type="text" name="dateOfBirth" readonly
                                                                           placeholder="Select date"
                                                                           id="kt_datepicker_3"
                                                                           value="{{$eedit->details ?  ($eedit->details->dob ?  date('m/d/Y',strtotime($eedit->details->dob)) : '') : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-calendar-check-o"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                Marital Status
                                                            </label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <select name="mstatus"
                                                                        class="form-control">
                                                                    @if(($eedit->details) && ($eedit->details->m_status))
                                                                        <option selected hidden
                                                                                value="{{$eedit->details->m_status}}">
                                                                            {{$eedit->details->m_status}}
                                                                        </option>
                                                                    @else
                                                                        <option selected hidden disabled value="">
                                                                            Choose
                                                                        </option>
                                                                    @endif
                                                                    <option value="Single">Single</option>
                                                                    <option value="Married">Married</option>
                                                                    <option value="Divorced">Divorced</option>
                                                                    <option value="Widowed">Widowed</option>
                                                                    <option value="Widower">Widower</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                Birth Certificate Number
                                                            </label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <input class="form-control" type="text" name="bcn"
                                                                       value="{{$eedit->details ?  $eedit->details->b_number : ''}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                NID
                                                            </label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <input class="form-control" type="text" name="nid"
                                                                       value="{{$eedit->details ?  $eedit->details->nid : ''}}">
                                                            </div>
                                                        </div>
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
                                                    {{--Form End Personal Info --}}
                                                </div>
                                            </div>
                                        </div>
                                        {{--Staffs Education--}}
                                        @if(($eedit->employeetype_id * 1) == 1)
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title collapsed" data-toggle="collapse"
                                                         data-target="#collapseStaffEducation" aria-expanded="false"
                                                         aria-controls="collapseStaffEducation">
                                                        Academic Background
                                                    </div>
                                                </div>
                                                <div id="collapseStaffEducation" class="collapse"
                                                     aria-labelledby="headingTwo1"
                                                     data-parent="#accordionExample1" style="">
                                                    <div class="card-body">
                                                        {{--      Form Start Academic Bacground   --}}
                                                        <form method="post"
                                                              action="{{route('employee.update.staff.ac', ['eid' => $eedit->id])}}">
                                                            @csrf
                                                            <div class="form-group row">
                                                                <label class="col-xl-2 col-lg-2 col-form-label">
                                                                    SSC
                                                                </label>
                                                                <div class="col-lg-4 col-xl-4 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="sscSchool"
                                                                           value="{{$eedit->details ?  $eedit->details->school_ssc : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">School</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-xl-3 input-group date">
                                                                    <input class="form-control datepickerYear"
                                                                           type="text" name="sscYear" readonly
                                                                           placeholder="Passing Year"
                                                                           id="kt_datepicker_3"
                                                                           value="{{$eedit->details ?  $eedit->details->date_ssc : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-calendar-check-o"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-xl-2 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="sscResult"
                                                                           value="{{$eedit->details ?  $eedit->details->result_ssc : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Result</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-1 col-xl-1"></div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-2 col-lg-2 col-form-label">
                                                                    HSC
                                                                </label>
                                                                <div class="col-lg-4 col-xl-4 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="hscSchool"
                                                                           value="{{$eedit->details ?  $eedit->details->school_hsc : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">School</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-xl-3 input-group date">
                                                                    <input class="form-control datepickerYear"
                                                                           type="text" name="hscYear" readonly
                                                                           placeholder="Passing Year"
                                                                           id="kt_datepicker_3"
                                                                           value="{{$eedit->details ?  $eedit->details->date_hsc : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-calendar-check-o"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-xl-2 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="hscResult"
                                                                           value="{{$eedit->details ?  $eedit->details->result_hsc : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Result</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-1 col-xl-1"></div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-2 col-lg-2 col-form-label">
                                                                    Graduation
                                                                </label>
                                                                <div class="col-lg-4 col-xl-4 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="gInstitute"
                                                                           value="{{$eedit->details ?  $eedit->details->institute_graduation : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Institute</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-xl-3 input-group date">
                                                                    <input class="form-control datepickerYear"
                                                                           type="text" name="graduationYear" readonly
                                                                           placeholder="Graduating Year"
                                                                           id="kt_datepicker_3"
                                                                           value="{{$eedit->details ?  $eedit->details->date_graduation : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-calendar-check-o"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-xl-2 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="graduationResult"
                                                                           value="{{$eedit->details ?  $eedit->details->result_graduation : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Result</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-1 col-xl-1"></div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-2 col-lg-2 col-form-label">
                                                                    Post Graduation
                                                                </label>
                                                                <div class="col-lg-4 col-xl-4 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="pgInstitute"
                                                                           value="{{$eedit->details ?  $eedit->details->institute_Pgraduation : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Institute</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-xl-3 input-group date">
                                                                    <input class="form-control datepickerYear"
                                                                           type="text" name="pgraduationYear" readonly
                                                                           placeholder="Post Graduating Year"
                                                                           id="kt_datepicker_3"
                                                                           value="{{$eedit->details ?  $eedit->details->date_Pgraduation : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-calendar-check-o"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-xl-2 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="pgraduationResult"
                                                                           value="{{$eedit->details ?  $eedit->details->result_Pgraduation : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Result</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-1 col-xl-1"></div>
                                                            </div>


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
                                                        {{--Form End Academic Bacground --}}
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title collapsed" data-toggle="collapse"
                                                         data-target="#collapseStaffEducation2" aria-expanded="false"
                                                         aria-controls="collapseStaffEducation2">
                                                        Academic Background
                                                    </div>
                                                </div>
                                                <div id="collapseStaffEducation2" class="collapse"
                                                     aria-labelledby="headingTwo1"
                                                     data-parent="#accordionExample1" style="">
                                                    <div class="card-body">
                                                        {{--      Form Start Academic Bacground   --}}
                                                        <form method="post"
                                                              action="{{route('employee.update.ab', ['eid' => $eedit->id])}}">
                                                            @csrf
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    Height Academic Level
                                                                </label>
                                                                <div class="col-lg-8 col-xl-7">
                                                                    <input class="form-control" type="text" name="hal"
                                                                           value="{{$eedit->details ?  $eedit->details->height_academic : ''}}">
                                                                </div>
                                                            </div>
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
                                                        {{--Form End Academic Bacground --}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        {{--Address--}}
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <div class="card-title collapsed" data-toggle="collapse"
                                                     data-target="#collapseAddress" aria-expanded="false"
                                                     aria-controls="collapseAddress">
                                                    Address
                                                </div>
                                            </div>
                                            <div id="collapseAddress" class="collapse" aria-labelledby="headingTwo1"
                                                 data-parent="#accordionExample1" style="">
                                                <div class="card-body">
                                                    {{--      Form Start Address  --}}
                                                    <form method="post"
                                                          action="{{route('employee.update.address', ['eid' => $eedit->id])}}">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label class="col-xl-2 col-lg-2 col-form-label">
                                                                Current Address
                                                            </label>
                                                            <div class="col-lg-8 col-xl-8">
                                                                <input class="form-control" type="text"
                                                                       name="currentAddress"
                                                                       value="{{$eedit->details ?  $eedit->details->current_address : ''}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-2 col-lg-2 col-form-label">
                                                                Permanent Address
                                                            </label>
                                                            <div class="col-lg-8 col-xl-8">
                                                                <input class="form-control" type="text"
                                                                       name="permanentAddress"
                                                                       value="{{$eedit->details ?  $eedit->details->permanent_address : ''}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-2 col-lg-2 col-form-label">
                                                                স্থায়ী ঠিকানা বাংলায়
                                                            </label>
                                                            <div class="col-lg-8 col-xl-8">
                                                                <input class="form-control" type="text"
                                                                       name="permanentAddressB"
                                                                       value="{{$eedit->details ?  $eedit->details->permanent_address_bengali : ''}}">
                                                            </div>
                                                        </div>


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
                                                    {{--Form End Address --}}
                                                </div>
                                            </div>
                                        </div>
                                        {{--Contact info--}}
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <div class="card-title collapsed" data-toggle="collapse"
                                                     data-target="#collapseContactInfo" aria-expanded="false"
                                                     aria-controls="collapseContactInfo">
                                                    Contact Information
                                                </div>
                                            </div>
                                            <div id="collapseContactInfo" class="collapse" aria-labelledby="headingTwo1"
                                                 data-parent="#accordionExample1" style="">
                                                <div class="card-body">
                                                    {{--      Form Start Contact Info   --}}
                                                    <form method="post"
                                                          action="{{route('employee.update.cinfo', ['eid' => $eedit->id])}}">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                Mobile Number
                                                            </label>
                                                            <div class="col-lg-3 col-xl-3">
                                                                <input class="form-control" type="text" name="mobile1"
                                                                       placeholder="primary mobile number"
                                                                       value="{{$eedit->details ?  $eedit->details->mobile_1 : ''}}">
                                                            </div>
                                                            <div class="col-lg-3 col-xl-3">
                                                                <input class="form-control" type="text" name="mobile2"
                                                                       placeholder="secondary mobile number"
                                                                       value="{{$eedit->details ?  $eedit->details->mobile_2 : ''}}">
                                                            </div>
                                                        </div>
                                                        @if(($eedit->employeetype_id * 1) == 1)
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    Email
                                                                </label>
                                                                <div class="col-lg-3 col-xl-3">
                                                                    <input class="form-control" type="email"
                                                                           name="email1"
                                                                           placeholder="primary email address"
                                                                           value="{{$eedit->details ?  $eedit->details->email_1 : ''}}">
                                                                </div>
                                                                <div class="col-lg-3 col-xl-3">
                                                                    <input class="form-control" type="email"
                                                                           name="email2"
                                                                           placeholder="secondary email address"
                                                                           value="{{$eedit->details ?  $eedit->details->email_2 : ''}}">
                                                                </div>
                                                            </div>
                                                        @endif
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
                                                    {{--Form End Contact Info --}}
                                                </div>
                                            </div>
                                        </div>
                                        {{--Family Details--}}
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <div class="card-title collapsed" data-toggle="collapse"
                                                     data-target="#collapseFamilyDetails" aria-expanded="false"
                                                     aria-controls="collapseFamilyDetails">
                                                    Family Details
                                                </div>
                                            </div>
                                            <div id="collapseFamilyDetails" class="collapse"
                                                 aria-labelledby="headingTwo1"
                                                 data-parent="#accordionExample1" style="">
                                                <div class="card-body">
                                                    {{--      Form Start Contact Info   --}}
                                                    <form method="post"
                                                          action="{{route('employee.update.finfo', ['eid' => $eedit->id])}}">
                                                        @csrf
                                                        @if(($eedit->details) && ($eedit->details->m_status == 'Married'))
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    Spouse Name
                                                                </label>
                                                                <div class="col-lg-9 col-xl-6">
                                                                    <input class="form-control" type="text" name="sname"
                                                                           value="{{$eedit->details ?  $eedit->details->spouse_name : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    Spouse Number
                                                                </label>
                                                                <div class="col-lg-3 col-xl-3">
                                                                    <input class="form-control" type="text"
                                                                           name="smobile1"
                                                                           placeholder="primary mobile number"
                                                                           value="{{$eedit->details ?  $eedit->details->spouse_mobile_1 : ''}}">
                                                                </div>
                                                                <div class="col-lg-3 col-xl-3">
                                                                    <input class="form-control" type="text"
                                                                           name="smobile2"
                                                                           placeholder="secondary mobile number"
                                                                           value="{{$eedit->details ?  $eedit->details->spouse_mobile_2 : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    Spouse NID
                                                                </label>
                                                                <div class="col-lg-9 col-xl-6">
                                                                    <input class="form-control" type="text" name="snid"
                                                                           value="{{$eedit->details ?  $eedit->details->spouse_name : ''}}">
                                                                </div>
                                                            </div>
                                                        @endif

                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                Father's Name
                                                            </label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <input class="form-control" type="text" name="fname"
                                                                       value="{{$eedit->details ?  $eedit->details->father_name : ''}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                Father's Profession
                                                            </label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <input class="form-control" type="text"
                                                                       name="fprofession"
                                                                       value="{{$eedit->details ?  $eedit->details->father_profession : ''}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                Father's NID
                                                            </label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <input class="form-control" type="text" name="fnid"
                                                                       value="{{$eedit->details ?  $eedit->details->father_nid : ''}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                Mother's Name
                                                            </label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <input class="form-control" type="text" name="mname"
                                                                       value="{{$eedit->details ?  $eedit->details->mother_name : ''}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                Mother's Profession
                                                            </label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <input class="form-control" type="text"
                                                                       name="mprofession"
                                                                       value="{{$eedit->details ?  $eedit->details->mother_profession : ''}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                Mother's NID
                                                            </label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <input class="form-control" type="text" name="mnid"
                                                                       value="{{$eedit->details ?  $eedit->details->mother_nid : ''}}">
                                                            </div>
                                                        </div>
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
                                                    {{--Form End Contact Info --}}
                                                </div>
                                            </div>
                                        </div>
                                        {{--Siblings Details--}}
                                        @if(($eedit->employeetype_id * 1) == 1)
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title collapsed" data-toggle="collapse"
                                                         data-target="#collapseSiblings" aria-expanded="false"
                                                         aria-controls="collapseSiblings">
                                                        Siblings
                                                    </div>
                                                </div>
                                                <div id="collapseSiblings" class="collapse"
                                                     aria-labelledby="headingTwo1"
                                                     data-parent="#accordionExample1" style="">
                                                    <div class="card-body">
                                                        {{--      Form Start Academic Bacground   --}}
                                                        <form method="post"
                                                              action="{{route('employee.update.staff.sibling', ['eid' => $eedit->id])}}">
                                                            @csrf
                                                            <div class="form-group row">
                                                                <label class="col-xl-2 col-lg-2 col-form-label">
                                                                    Sibling One
                                                                </label>
                                                                <div class="col-lg-4 col-xl-4 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="sname1"
                                                                           value="{{$eedit->details ?  $eedit->details->sibling_1_name : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Name</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-xl-4 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="sp1"
                                                                           value="{{$eedit->details ?  $eedit->details->sibling_1_profession : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Profession</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-xl-2"></div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-2 col-lg-2 col-form-label">
                                                                    Sibling Two
                                                                </label>
                                                                <div class="col-lg-4 col-xl-4 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="sname2"
                                                                           value="{{$eedit->details ?  $eedit->details->sibling_2_name : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Name</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-xl-4 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="sp2"
                                                                           value="{{$eedit->details ?  $eedit->details->sibling_2_profession : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Profession</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-xl-2"></div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-2 col-lg-2 col-form-label">
                                                                    Sibling Three
                                                                </label>
                                                                <div class="col-lg-4 col-xl-4 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="sname3"
                                                                           value="{{$eedit->details ?  $eedit->details->sibling_3_name : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Name</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-xl-4 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="sp3"
                                                                           value="{{$eedit->details ?  $eedit->details->sibling_3_profession : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Profession</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-xl-2"></div>
                                                            </div>


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
                                                        {{--Form End Academic Bacground --}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        {{--Experience--}}
                                        @if(($eedit->employeetype_id * 1) == 1)
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title collapsed" data-toggle="collapse"
                                                         data-target="#collapseExperience" aria-expanded="false"
                                                         aria-controls="collapseExperience">
                                                        Experience
                                                    </div>
                                                </div>
                                                <div id="collapseExperience" class="collapse"
                                                     aria-labelledby="headingTwo1"
                                                     data-parent="#accordionExample1" style="">
                                                    <div class="card-body">
                                                        {{--      Form Start Staff Experience   --}}
                                                        <form method="post"
                                                              action="{{route('employee.update.experience', ['eid' => $eedit->id])}}">
                                                            @csrf
                                                            <div class="form-group row">
                                                                <label class="col-xl-2 col-lg-2 col-form-label">
                                                                    Company One
                                                                </label>
                                                                <div class="col-lg-4 col-xl-4 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="cname1"
                                                                           value="{{$eedit->details ?  $eedit->details->company_1 : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Name</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-xl-4 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="designation1"
                                                                           value="{{$eedit->details ?  $eedit->details->designation_1 : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span
                                                                            class="input-group-text">Designation</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-xl-2"></div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-2 col-lg-2 col-form-label"></label>
                                                                <div class="col-lg-4 col-xl-4">
                                                                    <div class="input-group date">
                                                                        <input class="form-control"
                                                                               type="text" name="from1" readonly
                                                                               placeholder="Select date"
                                                                               id="kt_datepicker_3"
                                                                               value="{{$eedit->details ?  ($eedit->details->from_1 ?  date('m/d/Y',strtotime($eedit->details->from_1)) : '') : ''}}">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">
                                                                                From
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-xl-4">
                                                                    <div class="input-group date">
                                                                        <input class="form-control"
                                                                               type="text" name="to1" readonly
                                                                               placeholder="Select date"
                                                                               id="kt_datepicker_3"
                                                                               value="{{$eedit->details ?  ($eedit->details->to_1 ?  date('m/d/Y',strtotime($eedit->details->to_1)) : '') : ''}}">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">
                                                                                To
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-xl-2"></div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-2 col-lg-2 col-form-label">
                                                                    Company Two
                                                                </label>
                                                                <div class="col-lg-4 col-xl-4 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="cname2"
                                                                           value="{{$eedit->details ?  $eedit->details->company_2 : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Name</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-xl-4 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="designation2"
                                                                           value="{{$eedit->details ?  $eedit->details->designation_2 : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span
                                                                            class="input-group-text">Designation</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-xl-2"></div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-2 col-lg-2 col-form-label"></label>
                                                                <div class="col-lg-4 col-xl-4">
                                                                    <div class="input-group date">
                                                                        <input class="form-control"
                                                                               type="text" name="from2" readonly
                                                                               placeholder="Select date"
                                                                               id="kt_datepicker_3"
                                                                               value="{{$eedit->details ?  ($eedit->details->from_2 ?  date('m/d/Y',strtotime($eedit->details->from_2)) : '') : ''}}">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">
                                                                                From
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-xl-4">
                                                                    <div class="input-group date">
                                                                        <input class="form-control"
                                                                               type="text" name="to2" readonly
                                                                               placeholder="Select date"
                                                                               id="kt_datepicker_3"
                                                                               value="{{$eedit->details ?  ($eedit->details->to_2 ?  date('m/d/Y',strtotime($eedit->details->to_2)) : '') : ''}}">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">
                                                                                To
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-xl-2"></div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-2 col-lg-2 col-form-label">
                                                                    Company Three
                                                                </label>
                                                                <div class="col-lg-4 col-xl-4 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="cname3"
                                                                           value="{{$eedit->details ?  $eedit->details->company_3 : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Name</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-xl-4 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="designation3"
                                                                           value="{{$eedit->details ?  $eedit->details->designation_3 : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span
                                                                            class="input-group-text">Designation</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-xl-2"></div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-2 col-lg-2 col-form-label"></label>
                                                                <div class="col-lg-4 col-xl-4">
                                                                    <div class="input-group date">
                                                                        <input class="form-control"
                                                                               type="text" name="from3" readonly
                                                                               placeholder="Select date"
                                                                               id="kt_datepicker_3"
                                                                               value="{{$eedit->details ?  ($eedit->details->from_3 ?  date('m/d/Y',strtotime($eedit->details->from_3)) : '') : ''}}">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">
                                                                                From
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-xl-4">
                                                                    <div class="input-group date">
                                                                        <input class="form-control"
                                                                               type="text" name="to3" readonly
                                                                               placeholder="Select date"
                                                                               id="kt_datepicker_3"
                                                                               value="{{$eedit->details ?  ($eedit->details->to_3 ?  date('m/d/Y',strtotime($eedit->details->to_3)) : '') : ''}}">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">
                                                                                To
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-xl-2"></div>
                                                            </div>
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
                                                        {{--Form End Staff Experience  --}}
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title collapsed" data-toggle="collapse"
                                                         data-target="#collapseExperience" aria-expanded="false"
                                                         aria-controls="collapseExperience">
                                                        Experience
                                                    </div>
                                                </div>
                                                <div id="collapseExperience" class="collapse"
                                                     aria-labelledby="headingTwo1"
                                                     data-parent="#accordionExample1" style="">
                                                    <div class="card-body">
                                                        {{--      Form Start Staff Experience   --}}
                                                        <form method="post"
                                                              action="{{route('employee.update.experience', ['eid' => $eedit->id])}}">
                                                            @csrf
                                                            <div class="form-group row">
                                                                <label class="col-xl-2 col-lg-2 col-form-label">
                                                                    Company One
                                                                </label>
                                                                <div class="col-lg-3 col-xl-3 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="cname1"
                                                                           value="{{$eedit->details ?  $eedit->details->company_1 : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Name</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-xl-3 input-group date">
                                                                    <input class="form-control" type="text"
                                                                           name="designation1"
                                                                           value="{{$eedit->details ?  $eedit->details->designation_1 : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span
                                                                            class="input-group-text">Designation</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-xl-3 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="duration1"
                                                                           value="{{$eedit->details ?  $eedit->details->duration_1 : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span
                                                                            class="input-group-text">Duration</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-1 col-xl-1"></div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-2 col-lg-2 col-form-label">
                                                                    Company Two
                                                                </label>
                                                                <div class="col-lg-3 col-xl-3 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="cname2"
                                                                           value="{{$eedit->details ?  $eedit->details->company_2 : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Name</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-xl-3 input-group date">
                                                                    <input class="form-control" type="text"
                                                                           name="designation2"
                                                                           value="{{$eedit->details ?  $eedit->details->designation_2 : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span
                                                                            class="input-group-text">Designation</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-xl-3 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="duration2"
                                                                           value="{{$eedit->details ?  $eedit->details->duration_2 : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span
                                                                            class="input-group-text">Duration</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-1 col-xl-1"></div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-2 col-lg-2 col-form-label">
                                                                    Company Three
                                                                </label>
                                                                <div class="col-lg-3 col-xl-3 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="cname3"
                                                                           value="{{$eedit->details ?  $eedit->details->company_3 : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Name</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-xl-3 input-group date">
                                                                    <input class="form-control" type="text"
                                                                           name="designation3"
                                                                           value="{{$eedit->details ?  $eedit->details->designation_3 : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span
                                                                            class="input-group-text">Designation</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-xl-3 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="duration3"
                                                                           value="{{$eedit->details ?  $eedit->details->duration_3 : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span
                                                                            class="input-group-text">Duration</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-1 col-xl-1"></div>
                                                            </div>


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
                                                        {{--Form End Staff Experience  --}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        {{--Emergency Contact --}}
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title collapsed" data-toggle="collapse"
                                                     data-target="#collapseEmergencyContact" aria-expanded="false"
                                                     aria-controls="collapseEmergencyContact">
                                                    Emergency Contact
                                                </div>
                                            </div>
                                            <div id="collapseEmergencyContact" class="collapse"
                                                 aria-labelledby="headingTwo1"
                                                 data-parent="#accordionExample1" style="">
                                                <div class="card-body">
                                                    {{--      Form Start Emergency Contact    --}}
                                                    <form method="post"
                                                          action="{{route('employee.update.emergencyContact', ['eid' => $eedit->id])}}">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label class="col-xl-2 col-lg-2 col-form-label">
                                                                Contact One
                                                            </label>
                                                            <div class="col-lg-3 col-xl-3 input-group">
                                                                <input class="form-control" type="text" name="cname1"
                                                                       value="{{$eedit->details ?  $eedit->details->ecname_1: ''}}">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">Name</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-xl-3 input-group date">
                                                                <input class="form-control" type="text" name="mobile1"
                                                                       value="{{$eedit->details ?  $eedit->details->ecmobile_1 : ''}}">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">Mobile</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-xl-2 input-group">
                                                                <input class="form-control" type="text" name="relation1"
                                                                       value="{{$eedit->details ?  $eedit->details->ecrelation_1 : ''}}">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">Relation</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-2 col-lg-2 col-form-label"></label>
                                                            <div class="col-lg-8 col-xl-8 input-group">
                                                                <input class="form-control" type="text" name="address1"
                                                                       value="{{$eedit->details ?  $eedit->details->ecaddress_1 : ''}}">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">Address</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-2 col-lg-2 col-form-label">
                                                                Contact Two
                                                            </label>
                                                            <div class="col-lg-3 col-xl-3 input-group">
                                                                <input class="form-control" type="text" name="cname2"
                                                                       value="{{$eedit->details ?  $eedit->details->ecname_2: ''}}">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">Name</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-xl-3 input-group date">
                                                                <input class="form-control" type="text" name="mobile2"
                                                                       value="{{$eedit->details ?  $eedit->details->ecmobile_2 : ''}}">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">Mobile</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-xl-2 input-group">
                                                                <input class="form-control" type="text" name="relation2"
                                                                       value="{{$eedit->details ?  $eedit->details->ecrelation_2 : ''}}">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">Relation</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-2 col-lg-2 col-form-label"></label>
                                                            <div class="col-lg-8 col-xl-8 input-group">
                                                                <input class="form-control" type="text" name="address2"
                                                                       value="{{$eedit->details ?  $eedit->details->ecaddress_2 : ''}}">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">Address</span>
                                                                </div>
                                                            </div>
                                                        </div>
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
                                                    {{--Form End Emergency Contact --}}
                                                </div>
                                            </div>
                                        </div>
                                        {{--Bank Account--}}
                                        @if(($eedit->employeetype_id * 1) == 1)
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title collapsed" data-toggle="collapse"
                                                         data-target="#collapseBankAccount" aria-expanded="false"
                                                         aria-controls="collapseBankAccount">
                                                        Bank Account(s)
                                                    </div>
                                                </div>
                                                <div id="collapseBankAccount" class="collapse"
                                                     aria-labelledby="headingTwo1"
                                                     data-parent="#accordionExample1" style="">
                                                    <div class="card-body">
                                                        {{--      Form Start Bank Account   --}}
                                                        <form method="post"
                                                              action="{{route('employee.update.staff.bank', ['eid' => $eedit->id])}}">
                                                            @csrf
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    Account One
                                                                </label>
                                                                <div class="col-lg-4 col-xl-4 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="account1"
                                                                           value="{{$eedit->details ?  $eedit->details->baccount_1: ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Ac. Number</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-xl-3 input-group date">
                                                                    <input class="form-control" type="text"
                                                                           name="type1"
                                                                           value="{{$eedit->details ?  $eedit->details->baccount_type_1 : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Ac. Type</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label"></label>
                                                                <div class="col-lg-4 col-xl-4 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="bank1"
                                                                           value="{{$eedit->details ?  $eedit->details->bank_1: ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Bank</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-xl-3 input-group date">
                                                                    <input class="form-control" type="text"
                                                                           name="branch1"
                                                                           value="{{$eedit->details ?  $eedit->details->branch_1 : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Branch</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    Account Two
                                                                </label>
                                                                <div class="col-lg-4 col-xl-4 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="account2"
                                                                           value="{{$eedit->details ?  $eedit->details->baccount_2: ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Ac. Number</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-xl-3 input-group date">
                                                                    <input class="form-control" type="text"
                                                                           name="type2"
                                                                           value="{{$eedit->details ?  $eedit->details->baccount_type_2 : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Ac. Type</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label"></label>
                                                                <div class="col-lg-4 col-xl-4 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="bank2"
                                                                           value="{{$eedit->details ?  $eedit->details->bank_2: ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Bank</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-xl-3 input-group date">
                                                                    <input class="form-control" type="text"
                                                                           name="branch2"
                                                                           value="{{$eedit->details ?  $eedit->details->branch_2 : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Branch</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    Account Three
                                                                </label>
                                                                <div class="col-lg-4 col-xl-4 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="account3"
                                                                           value="{{$eedit->details ?  $eedit->details->baccount_3: ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Ac. Number</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-xl-3 input-group date">
                                                                    <input class="form-control" type="text"
                                                                           name="type3"
                                                                           value="{{$eedit->details ?  $eedit->details->baccount_type_3 : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Ac. Type</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label"></label>
                                                                <div class="col-lg-4 col-xl-4 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="bank3"
                                                                           value="{{$eedit->details ?  $eedit->details->bank_3: ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Bank</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-xl-3 input-group date">
                                                                    <input class="form-control" type="text"
                                                                           name="branch3"
                                                                           value="{{$eedit->details ?  $eedit->details->branch_3 : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Branch</span>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                                                        {{--Form End Bank Account --}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        {{--Mobile Banking--}}
                                        @if(($eedit->employeetype_id * 1) == 1)
                                            <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                    <div class="card-title collapsed" data-toggle="collapse"
                                                         data-target="#collapseMobileBanking" aria-expanded="false"
                                                         aria-controls="collapseMobileBanking">
                                                        Mobile Banking
                                                    </div>
                                                </div>
                                                <div id="collapseMobileBanking" class="collapse"
                                                     aria-labelledby="headingTwo1"
                                                     data-parent="#accordionExample1" style="">
                                                    <div class="card-body">
                                                        {{--      Form Start Mobile Banking  --}}
                                                        <form method="post"
                                                              action="{{route('employee.update.staff.bank.mobile', ['eid' => $eedit->id])}}">
                                                            @csrf
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    bKash
                                                                </label>
                                                                <div class="col-lg-9 col-xl-6">
                                                                    <input class="form-control" type="text" name="bkash"
                                                                           value="{{$eedit->details ?  $eedit->details->bkash : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    Nagad
                                                                </label>
                                                                <div class="col-lg-9 col-xl-6">
                                                                    <input class="form-control" type="text" name="nagad"
                                                                           value="{{$eedit->details ?  $eedit->details->nagad : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    Rocket
                                                                </label>
                                                                <div class="col-lg-9 col-xl-6">
                                                                    <input class="form-control" type="text"
                                                                           name="rocket"
                                                                           value="{{$eedit->details ?  $eedit->details->rocket : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    UCash
                                                                </label>
                                                                <div class="col-lg-9 col-xl-6">
                                                                    <input class="form-control" type="text" name="ucash"
                                                                           value="{{$eedit->details ?  $eedit->details->ucash : ''}}">
                                                                </div>
                                                            </div>
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
                                                        {{--Form End Mobile Banking --}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        {{--THIRD-PARTY COMPANIES--}}
                                        @if(($eedit->employeetype_id * 1) == 5)
                                            <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                    <div class="card-title collapsed" data-toggle="collapse"
                                                         data-target="#collapseThirdParty" aria-expanded="false"
                                                         aria-controls="collapseThirdParty">
                                                        Third-Party Companies
                                                    </div>
                                                </div>
                                                <div id="collapseThirdParty" class="collapse"
                                                     aria-labelledby="headingTwo1"
                                                     data-parent="#accordionExample1" style="">
                                                    <div class="card-body">
                                                        {{--      Form Start Mobile Banking  --}}
                                                        <form method="post"
                                                              action="{{route('employee.update.sg.tpc', ['eid' => $eedit->id])}}">
                                                            @csrf
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    Name Of Company
                                                                </label>
                                                                <div class="col-lg-9 col-xl-6">
                                                                    <input class="form-control" type="text"
                                                                           name="company"
                                                                           value="{{$eedit->details ?  $eedit->details->third_party_company : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    Address
                                                                </label>
                                                                <div class="col-lg-9 col-xl-6">
                                                                    <input class="form-control" type="text"
                                                                           name="address"
                                                                           value="{{$eedit->details ?  $eedit->details->third_party_company_address : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    Contact Person One
                                                                </label>
                                                                <div class="col-lg-3 col-xl-3 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="cpname1"
                                                                           value="{{$eedit->details ?  $eedit->details->tpc_cp_name_1: ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Name</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-xl-3 input-group date">
                                                                    <input class="form-control" type="text"
                                                                           name="cpmobile1"
                                                                           value="{{$eedit->details ?  $eedit->details->tpc_cp_mobile_1 : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Mobile</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    Contact Person Two
                                                                </label>
                                                                <div class="col-lg-3 col-xl-3 input-group">
                                                                    <input class="form-control" type="text"
                                                                           name="cpname2"
                                                                           value="{{$eedit->details ?  $eedit->details->tpc_cp_name_2: ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Name</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-xl-3 input-group date">
                                                                    <input class="form-control" type="text"
                                                                           name="cpmobile2"
                                                                           value="{{$eedit->details ?  $eedit->details->tpc_cp_mobile_2 : ''}}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Mobile</span>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                                                        {{--Form End Mobile Banking --}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif


                                        {{--Supporting Documents--}}
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <div class="card-title collapsed" data-toggle="collapse"
                                                     data-target="#collapseSupportDocument" aria-expanded="false"
                                                     aria-controls="collapseSupportDocument">
                                                    Supporting Documents
                                                </div>
                                            </div>
                                            <div id="collapseSupportDocument" class="collapse"
                                                 aria-labelledby="headingTwo1"
                                                 data-parent="#accordionExample1" style="">
                                                <div class="card-body">
                                                    @if(count($eedit->files) > 0)
                                                        <div class="row">
                                                            <div class="col-md-10 offset-md-1">
                                                                <table class="table table-hover">
                                                                    <thead>
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Description</th>
                                                                        <th scope="col">File</th>
                                                                        <th scope="col">Action</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($eedit->files as $i => $f)
                                                                        <tr>
                                                                            <td>{{$i + 1}}</td>
                                                                            <td>{{$f->description}}</td>
                                                                            {{--<td>{{str_replace("uploads/Employee/Files/", "", $f->file)}}</td>--}}
                                                                            <td>{{substr($f->file, 23)}}</td>
                                                                            <td>
                                                                                <a href="{{route('employee.file.download', ['fid' => $f->id])}}"
                                                                                   title="Download"
                                                                                   class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                                                    <i class="flaticon-download"></i>
                                                                                </a>
                                                                                <a href="{{route('employee.file.delete', ['fid' => $f->id])}}"
                                                                                   title="Delete"
                                                                                   class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                                                                   onclick="return confirm('Are you sure you want to delete the file ?')">
                                                                                    <i class="la la-trash"
                                                                                       style="color: #fd397a;"></i>
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach

                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                                                        <hr>
                                                    @endif

                                                    {{--      Form Start File Upload  --}}
                                                    <form method="post" enctype="multipart/form-data"
                                                          action="{{route('employee.file.upload', ['eid' => $eedit->id])}}">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label class="col-xl-2 col-lg-2 col-form-label">
                                                                File Upload
                                                            </label>
                                                            <div class="col-lg-3 col-xl-3">
                                                                <input class="form-control" type="text" required
                                                                       name="description" placeholder="Description">
                                                                @if($errors->has('Description'))
                                                                    <span
                                                                        class="invalid-feedback">{{$errors->first('Description')}}</span>
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-3 col-xl-3">
                                                                <input class="form-control" type="file"
                                                                       name="file2" required>
                                                                @if($errors->has('file2'))
                                                                    <span
                                                                        class="invalid-feedback">{{$errors->first('file2')}}</span>
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-3 col-xl-3">
                                                                <button type="submit"
                                                                        class="btn btn-label-brand btn-bold">
                                                                    Upload
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    {{--Form End File Upload --}}
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
        </div>
    </div>

@endsection
{{--@section('stickyToolbar')    --}}
{{--@endsection--}}
@section('script')
    <!--begin::Page Vendors(used by this page) -->
    <!--end::Page Vendors -->

    <!--begin::Page Scripts(used by this page) -->
    {{--    <script src="{{asset('m/assets/js/pages/custom/user/edit-user.js')}}" type="text/javascript"></script>--}}
    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"
            type="text/javascript"></script>


    {{--    <script src="{{asset('m/assets/js/pages/crud/file-upload/uppy.js')}}" type="text/javascript"></script>--}}

    {{--    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/form-repeater.js')}}" type="text/javascript"></script>--}}
    {{--    <script src="{{asset('plugins/select2/select2.full.min.js')}}" type="text/javascript"></script>--}}
    <script>
        $(".datepickerYear").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
        });
    </script>
    <!--end::Page Scripts -->
@endsection
