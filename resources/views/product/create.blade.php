@extends('layouts.m')
@section('title', 'Product Create')
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Product Create
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{route('home')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('product.list')}}" class="kt-subheader__breadcrumbs-link">Products</a>
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
                                    <form action="{{route('product.store')}}" method="post">
                                        @csrf
                                        <div class="kt-section__body">
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Name
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('name')) ? 'is-invalid' : ''}}"
                                                           type="text" name="name" required list="name"
                                                           value="{{old('name')}}">
                                                    @if($errors->has('name'))
                                                        <span class="invalid-feedback">{{$errors->first('name')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Type
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('type')) ? 'is-invalid' : ''}}"
                                                           type="text" name="type" required list="type"
                                                           value="{{old('type')}}">
                                                    @if($errors->has('type'))
                                                        <span class="invalid-feedback">{{$errors->first('type')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Size (denier)
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('sizeDenier')) ? 'is-invalid' : ''}}"
                                                           type="number" name="sizeDenier" id="size_denier"
                                                           value="{{old('sizeDenier')}}" step="0.01" min="0">
                                                    {{--                                                    @if($errors->has('mfi'))--}}
                                                    {{--                                                        <span class="invalid-feedback">{{$errors->first('mfi')}}</span>--}}
                                                    {{--                                                    @endif--}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Size (mm)
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('sizeMm')) ? 'is-invalid' : ''}}"
                                                           type="number" name="sizeMm" value="{{old('sizeMm')}}"
                                                           id="size_mm" step="0.01" min="0">
                                                    {{--                                                    @if($errors->has('mfi'))--}}
                                                    {{--                                                        <span class="invalid-feedback">{{$errors->first('mfi')}}</span>--}}
                                                    {{--                                                    @endif--}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    PLYS
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('plys')) ? 'is-invalid' : ''}}"
                                                           type="text" name="plys" value="{{old('plys')}}">
                                                    {{--                                                    @if($errors->has('plys'))--}}
                                                    {{--                                                        <span class="invalid-feedback">{{$errors->first('plys')}}</span>--}}
                                                    {{--                                                    @endif--}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Mesh Size
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('meshSize')) ? 'is-invalid' : ''}}"
                                                           type="number" name="meshSize" value="{{old('meshSize')}}"
                                                           step="0.01" min="0">
                                                    @if($errors->has('meshSize'))
                                                        <span class="invalid-feedback">{{$errors->first('meshSize')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Depth
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('depth')) ? 'is-invalid' : ''}}"
                                                           type="number" name="depth" value="{{old('depth')}}"
                                                           step="0.01" min="0">
                                                    @if($errors->has('depth'))
                                                        <span class="invalid-feedback">{{$errors->first('depth')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Twin Size
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('twinSize')) ? 'is-invalid' : ''}}"
                                                           type="number" name="twinSize" value="{{old('twinSize')}}"
                                                           step="0.01" min="0">
                                                    @if($errors->has('twinSize'))
                                                        <span class="invalid-feedback">{{$errors->first('twinSize')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Twist Type
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control {{($errors->has('twistType')) ? 'is-invalid' : ''}}"
                                                           type="text" name="twistType" value="{{old('twistType')}}">
                                                    {{--                                                    @if($errors->has('twistType'))--}}
                                                    {{--                                                        <span class="invalid-feedback">{{$errors->first('twistType')}}</span>--}}
                                                    {{--                                                    @endif--}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Twist Condition
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select class="form-control {{($errors->has('twistCondition')) ? 'is-invalid' : ''}}"
                                                            name="twistCondition">
                                                        <option selected disabled hidden value="">Choose...</option>
                                                        <option value="Twisted">Twisted</option>
                                                        <option value="Untwisted">Untwisted</option>
                                                        <option value="none">none</option>
                                                    </select>
                                                    {{--                                                    @if($errors->has('twistCondition'))--}}
                                                    {{--                                                        <span class="invalid-feedback">{{$errors->first('twistCondition')}}</span>--}}
                                                    {{--                                                    @endif--}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Strand
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select class="form-control {{($errors->has('strand')) ? 'is-invalid' : ''}}"
                                                            name="strand">
                                                        <option selected disabled hidden value="">Choose...</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                    {{--                                                    @if($errors->has('twistCondition'))--}}
                                                    {{--                                                        <span class="invalid-feedback">{{$errors->first('twistCondition')}}</span>--}}
                                                    {{--                                                    @endif--}}
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

    <datalist id="name">
        @forelse($datalist['name'] as $coo)
            <option value="{{$coo->name}}">
        @empty
        @endforelse
    </datalist>
    <datalist id="type">
        @forelse($datalist['type'] as $m)
            <option value="{{$m->type}}">
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
    <script>
        $(function () {
            $("#size_denier").on('keyup change', function () {
                var val = $(this).val();
                if (val != '') {
                    $("#size_mm").prop('disabled', true);
                } else {
                    $("#size_mm").prop('disabled', false);
                }
            });
            $("#size_mm").on('keyup change', function () {
                var val = $(this).val();
                if (val != '') {
                    $("#size_denier").prop('disabled', true);
                } else {
                    $("#size_denier").prop('disabled', false);
                }
            });
        });
    </script>
@endsection