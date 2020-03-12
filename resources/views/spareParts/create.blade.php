@extends('layouts.m')
@section('title', 'Spare Parts Create')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Spare Parts Create
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{route('home')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('spareParts.list')}}" class="kt-subheader__breadcrumbs-link">Spare Parts</a>
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
                                    {{--                                    @if(!empty($machines))--}}
                                    {{--      Form Start    --}}
                                    <form action="{{route('spareParts.store')}}" method="post">
                                        @csrf
                                        <div class="kt-section__body">
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Manufacturer Name
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('manufacturerName')) ? 'is-invalid' : ''}}"
                                                           type="text" name="manufacturerName" required
                                                           value="{{old('manufacturerName')}}" list="manufacturer">
                                                    @if($errors->has('manufacturerName'))
                                                        <span class="invalid-feedback">{{$errors->first('manufacturerName')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Model
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('model')) ? 'is-invalid' : ''}}"
                                                           type="text" name="model" required
                                                           value="{{old('model')}}" list="model">
                                                    @if($errors->has('model'))
                                                        <span class="invalid-feedback">{{$errors->first('model')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Type
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('type')) ? 'is-invalid' : ''}}"
                                                           type="text" name="type" required
                                                           value="{{old('type')}}" list="type">
                                                    @if($errors->has('type'))
                                                        <span class="invalid-feedback">{{$errors->first('type')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            {{--                                                <div class="form-group row">--}}
                                            {{--                                                    <label class="col-xl-3 col-lg-3 col-form-label">--}}
                                            {{--                                                        For which machine--}}
                                            {{--                                                    </label>--}}
                                            {{--                                                    <div class="col-lg-9 col-xl-6">--}}
                                            {{--                                                        <select class="form-control {{($errors->has('machines')) ? 'is-invalid' : ''}}"--}}
                                            {{--                                                                name="machines" required>--}}
                                            {{--                                                            <option selected disabled hidden value="">Choose...</option>--}}
                                            {{--                                                            @foreach($machines as $m)--}}
                                            {{--                                                                <option value="{{$m->tag}}">{{str_replace(';.;', '_', $m->tag)}}</option>--}}
                                            {{--                                                            @endforeach--}}
                                            {{--                                                        </select>--}}
                                            {{--                                                        @if($errors->has('machines'))--}}
                                            {{--                                                            <span class="invalid-feedback">{{$errors->first('machines')}}</span>--}}
                                            {{--                                                        @endif--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </div>--}}
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Part Number
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('partNumber')) ? 'is-invalid' : ''}}"
                                                           type="text" name="partNumber" required
                                                           value="{{old('partNumber')}}">
                                                    @if($errors->has('partNumber'))
                                                        <span class="invalid-feedback">{{$errors->first('partNumber')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Identity Number
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('identityNumber')) ? 'is-invalid' : ''}}"
                                                           type="text" name="identityNumber" required
                                                           value="{{old('identityNumber')}}">
                                                    @if($errors->has('identityNumber'))
                                                        <span class="invalid-feedback">{{$errors->first('identityNumber')}}</span>
                                                    @endif
{{--                                                    <span class="form-text text-muted">It has to be unique*</span>--}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Code Number
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('codeNumber')) ? 'is-invalid' : ''}}"
                                                           type="text" name="codeNumber" required
                                                           value="{{old('codeNumber')}}">
                                                    @if($errors->has('codeNumber'))
                                                        <span class="invalid-feedback">{{$errors->first('codeNumber')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Minimum Storage Amount
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('minimumStorage')) ? 'is-invalid' : ''}}"
                                                           type="number" name="minimumStorage" required min="0"
                                                           value="{{old('minimumStorage')}}">
                                                    @if($errors->has('minimumStorage'))
                                                        <span class="invalid-feedback">{{$errors->first('minimumStorage')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Unit
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('unit')) ? 'is-invalid' : ''}}"
                                                           type="text" name="unit" required
                                                           placeholder="Kg Litre etc"
                                                           value="{{old('unit')}}" list="unit">
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
                                                        <a href="javascript:void (0)"
                                                           data-link="{{route('cancel')}}"
                                                           class="cancel btn btn-label-danger btn-bold float-right">Reset</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {{--Form End--}}
                                    {{--                                    @else--}}
                                    {{--                                        <p class="text-danger">First create machine then create spare-part.</p>--}}
                                    {{--                                    @endif--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <datalist id="manufacturer">
        @forelse($datalist['manufacturer'] as $m)
            <option value="{{$m->manufacturer}}">
        @empty
        @endforelse
    </datalist>
    <datalist id="model">
        @forelse($datalist['model'] as $c)
            <option value="{{$c->model}}">
        @empty
        @endforelse
    </datalist>
    <datalist id="type">
        @forelse($datalist['type'] as $c)
            <option value="{{$c->type}}">
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


    {{--    <script src="{{asset('m/assets/js/pages/crud/file-upload/uppy.js')}}" type="text/javascript"></script>--}}

    {{--    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/form-repeater.js')}}" type="text/javascript"></script>--}}
    {{--    <script src="{{asset('plugins/select2/select2.full.min.js')}}" type="text/javascript"></script>--}}

    <!--end::Page Scripts -->
@endsection
