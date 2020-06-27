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
                                                        <span class="invalid-feedback">{{$errors->first('identification')}}</span>
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
                                                            <option value="{{$d->id}}">{{$d->name}}</option>
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
                                                    Name*
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
                                                    Name*
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select
                                                        class="Name form-control {{($errors->has('name')) ? 'is-invalid' : ''}}"
                                                        name="name" id="NameSelect">
                                                        <option selected disabled hidden value="">Choose...</option>
                                                        <option class="hideFirst tid1" value="Nylon Multifilament">Nylon Multifilament</option>
                                                        <option class="hideFirst tid1" value="Nylon Monomulti">Nylon Monomulti</option>
                                                        <option class="hideFirst tid2" value="Danline Rope">Danline Rope</option>
                                                        <option class="hideFirst tid2" value="hanks D">hanks D</option>
                                                        <option class="hideFirst tid3" value="Rong Pata">Rong Pata</option>
                                                        <option class="hideFirst tid4" value="White Knotless">White Knotless</option>
                                                        <option class="hideFirst tid4" value="Green HDPE Knotless">Green HDPE Knotless</option>
                                                        <option class="hideFirst tid4" value="Black HDPE Knotless">Black HDPE Knotless</option>
                                                        <option class="hideFirst tid5" value="Nylon Multifilament Fishingnet">Nylon Multifilament Fishingnet</option>
                                                        <option class="hideFirst tid5" value="Nylon Mono Multi Fishingnet">Nylon Mono Multi Fishingnet</option>
                                                        <option class="hideFirst tid5" value="HT Fishingnet">HT Fishingnet</option>
                                                        <option class="hideFirst tid5" value="HDPE Fishingnet">HDPE Fishingnet</option>
                                                        <option class="hideFirst tid5" value="HDPE Cage Net">HDPE Cage Net</option>
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
                                                    Size (denier)
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{($errors->has('sizeDenier')) ? 'is-invalid' : ''}}"
                                                        type="number" name="sizeDenier" id="size_denier"
                                                        value="{{old('sizeDenier')}}" step="0.01" min="0">
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond ns2 ns3 ns4">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Size (mm)
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{($errors->has('sizeMm')) ? 'is-invalid' : ''}}"
                                                        type="number" name="sizeMm" value="{{old('sizeMm')}}"
                                                        id="size_mm" step="0.01" min="0">
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond ns1 ns2">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    PLYS
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{($errors->has('plys')) ? 'is-invalid' : ''}}"
                                                        type="text" name="plys" value="{{old('plys')}}">
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond ns6">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Mesh Size mm
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{($errors->has('meshSizeMm')) ? 'is-invalid' : ''}}"
                                                        type="number" name="meshSize" value="{{old('meshSizeMm')}}"
                                                        step="0.01" min="0">
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond ns9">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Mesh Size inch
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{($errors->has('meshSizeInch')) ? 'is-invalid' : ''}}"
                                                        type="number" name="meshSize" value="{{old('meshSizeInch')}}"
                                                        step="0.01" min="0">
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond ns6 ns7 ns9 ns12">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Depth
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{($errors->has('depth')) ? 'is-invalid' : ''}}"
                                                        type="number" name="depth" value="{{old('depth')}}"
                                                        step="0.01" min="0">
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond ns9 ns12 ns13">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Twin Size
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{($errors->has('twinSize')) ? 'is-invalid' : ''}}"
                                                        type="number" name="twinSize" value="{{old('twinSize')}}"
                                                        step="0.01" min="0">
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond ns9 ns12 ns13">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Twin Size Unit
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select
                                                        class="form-control {{($errors->has('twinSizeunit')) ? 'is-invalid' : ''}}"
                                                        name="twinSizeunit">
                                                        <option selected disabled hidden value="">Choose...</option>
                                                        <option value="Deiner">Deiner</option>
                                                        <option value="Ply">Ply</option>
                                                        <option value="No">No</option>
                                                        <option value="mm">mm</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond ns13">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Length
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{($errors->has('length')) ? 'is-invalid' : ''}}"
                                                        type="number" name="length" value="{{old('length')}}"
                                                        step="0.01" min="0">
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
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{($errors->has('density')) ? 'is-invalid' : ''}}"
                                                        type="number" name="density" step="0.01" min="0">
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond tid7">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Upload Tds
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{($errors->has('uploadTds')) ? 'is-invalid' : ''}}"
                                                        type="number" name="uploadTds" step="0.01" min="0">
                                                </div>
                                            </div>
                                            <div class="form-group row hideFirst hideSecond tid7">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Upload Msds
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{($errors->has('uploadMsds')) ? 'is-invalid' : ''}}"
                                                        type="number" name="uploadMsds" step="0.01" min="0">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Minimum Storage Amount*
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{($errors->has('minimumStorage')) ? 'is-invalid' : ''}}"
                                                        type="number" name="minimumStorage" required min="0"
                                                        value="{{old('minimumStorage')}}">
                                                    @if($errors->has('minimumStorage'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('minimumStorage')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Unit*
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input
                                                        class="form-control {{($errors->has('unit')) ? 'is-invalid' : ''}}"
                                                        type="text" name="unit" required
                                                        placeholder="Piece Carton etc"
                                                        value="{{old('unit')}}">
                                                    @if($errors->has('unit'))
                                                        <span class="invalid-feedback">{{$errors->first('unit')}}</span>
                                                    @endif
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
                    if (type == 1){
                        $(".tid1").show();
                    } else if (type == 2){
                        $(".tid2").show();
                    } else if (type == 3){
                        $(".tid3").show();
                    } else if (type == 4){
                        $(".tid4").show();
                    } else if (type == 5){
                        $(".tid5").show();
                    }
                } else {
                    // name field show
                    $("#nameType").show();
                    if (type == 6){
                        // $(".tid6").show();
                    } else if (type == 7){
                        $(".tid7").show();
                    } else if (type == 8){
                        // same as tid7
                        $(".tid7").show();
                    } else if (type == 9){
                        // same as tid7
                        $(".tid7").show();
                    }
                }
            });
            $("#NameSelect").on('change', function () {
                $(".hideSecond").hide();
                var name = $(this).val();
                if (name == 'Nylon Multifilament'){
                    $(".ns1").show();
                } else if (name == 'Nylon Monomulti'){
                    $(".ns2").show();
                } else if (name == 'Danline Rope'){
                    $(".ns3").show();
                } else if (name == 'hanks D'){
                    $(".ns4").show();
                } else if (name == 'Rong Pata'){
                    // same as ns3
                    $(".ns3").show();
                } else if (name == 'White Knotless'){
                    $(".ns6").show();
                } else if (name == 'Green HDPE Knotless'){
                    $(".ns7").show();
                } else if (name == 'Black HDPE Knotless'){
                    // same as ns7
                    $(".ns7").show();
                } else if (name == 'Nylon Multifilament Fishingnet'){
                    $(".ns9").show();
                } else if (name == 'Nylon Mono Multi Fishingnet'){
                    // same as ns9
                    $(".ns9").show();
                } else if (name == 'HT Fishingnet'){
                    // same as ns9
                    $(".ns9").show();
                } else if (name == 'HDPE Fishingnet'){
                    $(".ns12").show();
                } else if (name == 'HDPE Cage Net'){
                    $(".ns13").show();
                }

            });





        });
    </script>
@endsection
