@extends('layouts.m')
@section('title', 'Product Create')
{{--@section('link')--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">--}}
{{--@endsection--}}
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Create Product
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
            <div class="alert alert-success text-center" id="toaster">
                {{session('Success')}}
            </div>
        @elseif(session('unsuccess'))
            <div class="alert alert-warning text-center" id="toaster">
                {{session('unsuccess')}}
            </div>
        @elseif(count($errors) > 0)
            <div class="alert alert-warning text-center" id="toaster">
                Data could not be saved :(
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
                                                    Identification*
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{($errors->has('identification')) ? 'is-invalid' : ''}}"
                                                        type="text" name="identification" required
                                                        value="{{old('identification')}}">
                                                    @if($errors->has('identification'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('identification')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Type / Category *
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select name="type" required id="type"
                                                            class="form-control {{($errors->has('type')) ? 'is-invalid' : ''}}">
                                                        <option selected disabled hidden value="">Choose...</option>
                                                        @foreach($pts as $d)
                                                            <option value="{{$d->id}}">{{$d->display_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('type'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('type')}}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row hideFirst" id="nameType">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Name of the Product*
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="Name form-control {{($errors->has('name')) ? 'is-invalid' : ''}}"
                                                        type="text" name="name" value="{{old('name')}}">
                                                    @if($errors->has('name'))
                                                        <span class="invalid-feedback">{{$errors->first('name')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst" id="nameSelect">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Name of the Product*
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select
                                                        class="Name form-control {{($errors->has('name')) ? 'is-invalid' : ''}}"
                                                        name="name" id="NameSelect">
                                                        <option selected disabled hidden value="">Choose...</option>
                                                        @foreach($pns as $pn)
                                                            <option class="hideFirst {{$pn->type_class}}"
                                                                    value="{{$pn->name}}">
                                                                {{$pn->display_name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond ns7">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Size
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select
                                                        class="form-control {{($errors->has('size')) ? 'is-invalid' : ''}}"
                                                        name="size">
                                                        <option selected disabled hidden value="">Choose...</option>
                                                        <option value="Small">Small</option>
                                                        <option value="Big">Big</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond ns1">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Size
                                                </label>
                                                <div class="col-lg-9 col-xl-6 input-group">
                                                    <input
                                                        class="form-control {{($errors->has('sizeDenier')) ? 'is-invalid' : ''}}"
                                                        type="number" name="sizeDenier" id="size_denier"
                                                        value="{{old('sizeDenier')}}" step="0.01" min="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">denier</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond ns2 ns3 ns4">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Size
                                                </label>
                                                <div class="col-lg-9 col-xl-6 input-group">
                                                    <input
                                                        class="form-control {{($errors->has('sizeMm')) ? 'is-invalid' : ''}}"
                                                        type="number" name="sizeMm" value="{{old('sizeMm')}}"
                                                        id="size_mm" step="0.01" min="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">mm</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond ns1 ns2">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Number of PLYS
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{($errors->has('plys')) ? 'is-invalid' : ''}}"
                                                        type="number" name="plys" value="{{old('plys')}}" min="0">
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond ns6">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Mesh Size
                                                </label>
                                                <div class="col-lg-9 col-xl-6 input-group">
                                                    <input
                                                        class="form-control {{($errors->has('meshSizeMm')) ? 'is-invalid' : ''}}"
                                                        type="number" name="meshSizeMm" value="{{old('meshSizeMm')}}"
                                                        step="0.01" min="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">mm</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond ns9">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Mesh Size
                                                </label>
                                                <div class="col-lg-9 col-xl-6 input-group">
                                                    <input
                                                        class="form-control {{($errors->has('meshSizeInch')) ? 'is-invalid' : ''}}"
                                                        type="number" name="meshSizeInch"
                                                        value="{{old('meshSizeInch')}}"
                                                        step="0.01" min="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">inch</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond ns6 ns7 ns9 ns12">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Depth
                                                </label>
                                                <div class="col-lg-9 col-xl-6 input-group">
                                                    <input
                                                        class="form-control {{($errors->has('depth')) ? 'is-invalid' : ''}}"
                                                        type="number" name="depth" value="{{old('depth')}}"
                                                        step="0.01" min="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">হাত</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond ns9 ns13">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Twine Size
                                                </label>
                                                <div class="col-lg-2 col-xl-2 input-group">
                                                    <input
                                                        class="form-control {{($errors->has('twinSizeDenier')) ? 'is-invalid' : ''}}"
                                                        type="number" name="twinSizeDenier"
                                                        value="{{old('twinSizeDenier')}}"
                                                        step="0.01" min="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Denier</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-xl-2 input-group">
                                                    <input
                                                        class="form-control {{($errors->has('twinSizePly')) ? 'is-invalid' : ''}}"
                                                        type="number" name="twinSizePly" value="{{old('twinSizePly')}}"
                                                        step="0.01" min="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Ply</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-xl-2 input-group">
                                                    <input
                                                        class="form-control {{($errors->has('twinSizeNo')) ? 'is-invalid' : ''}}"
                                                        type="number" name="twinSizeNo" value="{{old('twinSizeNo')}}"
                                                        step="0.01" min="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">no.</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond ns12">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Twine Size
                                                </label>
                                                <div class="col-lg-3 col-xl-3 input-group">
                                                    <input
                                                        class="form-control {{($errors->has('twinSizeMm')) ? 'is-invalid' : ''}}"
                                                        type="number" name="twinSizeMm" value="{{old('twinSizeMm')}}"
                                                        step="0.01" min="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">mm</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-xl-3 input-group">
                                                    <input
                                                        class="form-control {{($errors->has('twinSizePly')) ? 'is-invalid' : ''}}"
                                                        type="number" name="twinSizePly" value="{{old('twinSizePly')}}"
                                                        step="0.01" min="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Ply</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond ns14">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Body
                                                </label>
                                                <div class="col-lg-3 col-xl-3 input-group">
                                                    <input
                                                        class="form-control {{($errors->has('bodyCm')) ? 'is-invalid' : ''}}"
                                                        type="number" name="bodyCm" value="{{old('bodyCm')}}"
                                                        step="0.01" min="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">cm</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-xl-3 input-group">
                                                    <input
                                                        class="form-control {{($errors->has('bodyPly')) ? 'is-invalid' : ''}}"
                                                        type="number" name="bodyPly" value="{{old('bodyPly')}}"
                                                        step="0.01" min="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Ply</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond ns14">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Tail
                                                </label>
                                                <div class="col-lg-3 col-xl-3 input-group">
                                                    <input
                                                        class="form-control {{($errors->has('tailCm')) ? 'is-invalid' : ''}}"
                                                        type="number" name="tailCm" value="{{old('tailCm')}}"
                                                        step="0.01" min="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">cm</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-xl-3 input-group">
                                                    <input
                                                        class="form-control {{($errors->has('tailPly')) ? 'is-invalid' : ''}}"
                                                        type="number" name="tailPly" value="{{old('tailPly')}}"
                                                        step="0.01" min="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Ply</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond ns13 ns14">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Length
                                                </label>
                                                <div class="col-lg-9 col-xl-6 input-group">
                                                    <input
                                                        class="form-control {{($errors->has('length')) ? 'is-invalid' : ''}}"
                                                        type="number" name="length" value="{{old('length')}}"
                                                        step="0.01" min="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">meter</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond ns3 ns4">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Strand
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select
                                                        class="form-control {{($errors->has('strand')) ? 'is-invalid' : ''}}"
                                                        name="strand">
                                                        <option selected disabled hidden value="">Choose...</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond ns3">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Coil Type
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select
                                                        class="form-control {{($errors->has('coilType')) ? 'is-invalid' : ''}}"
                                                        name="coilType">
                                                        <option selected disabled hidden value="">Choose...</option>
                                                        <option value="Hanks">Hanks</option>
                                                        <option value="Coil">Coil</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond ns14">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Dropper
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select
                                                        class="form-control {{($errors->has('dropper')) ? 'is-invalid' : ''}}"
                                                        name="dropper">
                                                        <option selected disabled hidden value="">Choose...</option>
                                                        <option value="With">With</option>
                                                        <option value="Without">Without</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond ns14">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Weight
                                                </label>
                                                <div class="col-lg-9 col-xl-6 input-group">
                                                    <input
                                                        class="form-control {{($errors->has('weight')) ? 'is-invalid' : ''}}"
                                                        type="number" name="weight" value="{{old('weight')}}"
                                                        step="0.01" min="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Kg</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond ns14">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Number of Frames
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{($errors->has('framneNo')) ? 'is-invalid' : ''}}"
                                                        type="number" name="framneNo" value="{{old('framneNo')}}"
                                                        min="0">
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond ns14">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Frame Size Width
                                                </label>
                                                <div class="col-lg-9 col-xl-6 input-group">
                                                    <input
                                                        class="form-control {{($errors->has('frameSizeWidth')) ? 'is-invalid' : ''}}"
                                                        type="number" name="frameSizeWidth"
                                                        value="{{old('frameSizeWidth')}}"
                                                        step="0.01" min="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond ns14">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Frame Size Height
                                                </label>
                                                <div class="col-lg-9 col-xl-6 input-group">
                                                    <input
                                                        class="form-control {{($errors->has('frameSizeHeight')) ? 'is-invalid' : ''}}"
                                                        type="number" name="frameSizeHeight"
                                                        value="{{old('frameSizeHeight')}}"
                                                        step="0.01" min="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond tid7">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Grade No
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{($errors->has('gradeNo')) ? 'is-invalid' : ''}}"
                                                        type="text" name="gradeNo">
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond tid7">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    MFI
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{($errors->has('mfi')) ? 'is-invalid' : ''}}"
                                                        type="text" name="mfi">
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond tid7">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    MFR
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{($errors->has('mfr')) ? 'is-invalid' : ''}}"
                                                        type="text" name="mfr">
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond tid7">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Melting Point
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{($errors->has('meltingPoint')) ? 'is-invalid' : ''}}"
                                                        type="number" name="meltingPoint" step="0.01" min="0">
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond tid7">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Density
                                                </label>
                                                <div class="col-lg-9 col-xl-6 input-group">
                                                    <input
                                                        class="form-control {{($errors->has('density')) ? 'is-invalid' : ''}}"
                                                        type="number" name="density" step="0.01" min="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">g/cm<sup>3</sup></span>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group row hideFirst hideSecond tid7">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Upload Tds
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{($errors->has('uploadTds')) ? 'is-invalid' : ''}}"
                                                        type="file" name="uploadTds">
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond tid7">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Upload Msds
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{($errors->has('uploadMsds')) ? 'is-invalid' : ''}}"
                                                        type="file" name="uploadMsds">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Minimum Storage Amount*
                                                </label>
                                                <div class="col-lg-9 col-xl-6 input-group">
                                                    <input
                                                        class="form-control {{($errors->has('minimumStorage')) ? 'is-invalid' : ''}}"
                                                        type="number" name="minimumStorage" required min="0"
                                                        value="{{old('minimumStorage')}}">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="msrt"></span>
                                                    </div>
                                                    @if($errors->has('minimumStorage'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('minimumStorage')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Unit
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{($errors->has('unit')) ? 'is-invalid' : ''}}"
                                                        type="text" name="unit" required readonly
                                                        value="{{old('unit')}}">
                                                    {{--                                                    @if($errors->has('unit'))--}}
                                                    {{--                                                        <span class="invalid-feedback">{{$errors->first('unit')}}</span>--}}
                                                    {{--                                                    @endif--}}
                                                </div>
                                            </div>
                                            {{--                                            <div class="form-group row">--}}
                                            {{--                                                <label class="col-xl-3 col-lg-3 col-form-label">Description</label>--}}
                                            {{--                                                <div class="col-lg-9 col-xl-6">--}}
                                            {{--                                                    <textarea id="summernote" name="description"></textarea>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                            <div
                                                class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
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
@endsection
{{--@section('stickyToolbar')    --}}
{{--@endsection--}}
@section('script')
    <!--begin::Page Vendors(used by this page) -->
    <!--end::Page Vendors -->

    {{--    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>--}}

    <!--end::Page Scripts -->
    <script>
        $(function () {
            // $('#summernote').summernote({
            //     height: 200,                 // set editor height
            //     // minHeight: null,             // set minimum height of editor
            //     // maxHeight: null,             // set maximum height of editor
            //     // focus: true                  // set focus to editable area after initializing summernote
            // });

            $(".hideFirst").hide();

            $("#type").on('change', function () {
                $(".hideFirst").hide();
                $('.Name').val('');
                var type = $(this).val();
                if (type < 6) {
                    // name select show
                    $("#nameSelect").show();
                    // which option
                    if (type == 1) {
                        $(".tid1").show();
                    } else if (type == 2) {
                        $(".tid2").show();
                    } else if (type == 3) {
                        $(".tid3").show();
                    } else if (type == 4) {
                        $(".tid4").show();
                    } else if (type == 5) {
                        $(".tid5").show();
                    }
                } else {
                    // name field show
                    $("#msrt").html('Bags');
                    $("input[name=unit]").val('Bags');
                    $("#nameType").show();
                    if (type == 6) {
                        // $(".tid6").show();
                        $("#msrt").html('Kg');
                        $("input[name=unit]").val('Kg');
                    } else if (type == 7) {
                        $(".tid7").show();
                    } else if (type == 8) {
                        // same as tid7
                        $(".tid7").show();
                    } else if (type == 9) {
                        // same as tid7
                        $(".tid7").show();
                    }
                }
            });
            $("#NameSelect").on('change', function () {
                $(".hideSecond").hide();
                var name = $(this).val();
                $("#msrt").html('Kg');
                $("input[name=unit]").val('Kg');
                // console.log(name);
                if (name == 'Nylon Multifilament') {
                    $(".ns1").show();
                } else if (name == 'Nylon Monomulti') {
                    $(".ns2").show();
                } else if (name == 'Danline Rope') {
                    $(".ns3").show();
                } else if (name == 'Hanks D') {
                    $(".ns4").show();
                } else if (name == 'Rong Pata') {
                    // same as ns3
                    $(".ns3").show();
                } else if (name == 'White Knotless') {
                    $(".ns6").show();
                } else if (name == 'Green HDPE Knotless') {
                    $(".ns7").show();
                    $("#msrt").html('Piece');
                    $("input[name=unit]").val('Piece');
                } else if (name == 'Black HDPE Knotless') {
                    // same as ns7
                    $(".ns7").show();
                    $("#msrt").html('Piece');
                    $("input[name=unit]").val('Piece');
                } else if (name == 'Nylon Multifilament Fishingnet') {
                    $(".ns9").show();
                } else if (name == 'Nylon Mono Multi Fishingnet') {
                    // same as ns12
                    $(".ns12").show();
                } else if (name == 'HT Fishingnet') {
                    // same as ns9
                    $(".ns9").show();
                } else if (name == 'HDPE Fishingnet') {
                    $(".ns12").show();
                } else if (name == 'HDPE Cage Net') {
                    $(".ns13").show();
                } else if (name == 'HDPE Trap Net') {
                    $(".ns14").show();
                    $("#msrt").html('Piece');
                    $("input[name=unit]").val('Piece');
                }

            });


        });
    </script>
@endsection
