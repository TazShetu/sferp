@extends('layouts.m')
@section('title', 'Product Edit')
@section('link')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('content_head')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Edit Product
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{route('home')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('product.list')}}" class="kt-subheader__breadcrumbs-link">Products</a>
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
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-toolbar">
                    <ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand"
                        role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab"
                               href="#kt_product_edit_tab_1" role="tab">
                                <svg width="24px" height="24px"
                                     viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path
                                            d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                            fill="#000000" fill-rule="nonzero"/>
                                        <path
                                            d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                            fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg>
                                Product
                            </a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" data-toggle="tab"--}}
{{--                               href="#kt_product_edit_tab_2" role="tab">--}}
{{--                                <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">--}}
{{--                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                        <rect x="0" y="0" width="24" height="24"/>--}}
{{--                                        <path--}}
{{--                                            d="M8.46446609,11.2928932 L7.40380592,10.232233 C7.20854378,10.0369709 7.20854378,9.72038841 7.40380592,9.52512627 L8.1109127,8.81801948 C8.30617485,8.62275734 8.62275734,8.62275734 8.81801948,8.81801948 L15.1819805,15.1819805 C15.3772427,15.3772427 15.3772427,15.6938252 15.1819805,15.8890873 L14.4748737,16.5961941 C14.2796116,16.7914562 13.9630291,16.7914562 13.767767,16.5961941 L12.7071068,15.5355339 L7.05025253,21.1923882 C6.26920395,21.9734367 5.00287399,21.9734367 4.22182541,21.1923882 L2.80761184,19.7781746 C2.02656326,18.997126 2.02656326,17.7307961 2.80761184,16.9497475 L8.46446609,11.2928932 Z M4.5753788,18.0104076 C4.38011665,18.2056698 4.38011665,18.5222523 4.5753788,18.7175144 C4.77064094,18.9127766 5.08722343,18.9127766 5.28248558,18.7175144 L9.52512627,14.4748737 C9.72038841,14.2796116 9.72038841,13.9630291 9.52512627,13.767767 C9.32986412,13.5725048 9.01328163,13.5725048 8.81801948,13.767767 L4.5753788,18.0104076 Z"--}}
{{--                                            fill="#000000" opacity="0.3"/>--}}
{{--                                        <path--}}
{{--                                            d="M16.9497475,5.63603897 L16.7788182,5.4651097 C16.5835561,5.26984755 16.5835561,4.95326506 16.7788182,4.75800292 C16.8266988,4.71012232 16.8838059,4.67246608 16.9466763,4.64731796 L19.4720576,3.63716542 C19.657766,3.56288206 19.869875,3.60641908 20.0113063,3.74785037 L20.2521496,3.98869366 C20.3935809,4.13012495 20.4371179,4.342234 20.3628346,4.52794239 L19.352682,7.05332375 C19.2501253,7.30971551 18.9591401,7.43442346 18.7027484,7.33186676 C18.6398781,7.30671864 18.5827709,7.2690624 18.5348903,7.2211818 L18.363961,7.05025253 L12.7071068,12.7071068 L11.2928932,11.2928932 L16.9497475,5.63603897 Z"--}}
{{--                                            fill="#000000"/>--}}
{{--                                    </g>--}}
{{--                                </svg>--}}
{{--                                Raw Material--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="tab-content">
                    <div id="kt_product_edit_tab_1" class="tab-pane active">
                        <div class="kt-form kt-form--label-right">
                            <div class="kt-form__body">
                                <div class="kt-section kt-section--first">
                                    {{--      Form Start    --}}
                                    <form action="{{route('product.update', ['pid' => $pedit->id])}}" method="post">
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
                                                        value="{{$pedit->identification}}">
                                                    @if($errors->has('identification'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('identification')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            {{--Read Only--}}
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Type / Category
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select name="type" required id="type"
                                                            class="form-control {{($errors->has('type')) ? 'is-invalid' : ''}}">
                                                        <option selected
                                                                value="{{$pedit->producttype_id}}">{{$pedit->type}}</option>
                                                    </select>
                                                    @if($errors->has('type'))
                                                        <span
                                                            class="invalid-feedback">{{$errors->first('type')}}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            @if(($pedit->producttype_id * 1) < 6)
                                                {{--Read Only--}}
                                                <div class="form-group row hideFirst" id="nameSelect">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Name of the Product
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <select
                                                            class="Name form-control {{($errors->has('name')) ? 'is-invalid' : ''}}"
                                                            name="name" id="NameSelect">
                                                            <option selected
                                                                    value="{{$pedit->name}}">{{$pdn}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                @if(($pedit->name == 'Green HDPE Knotless') || ($pedit->name == 'Black HDPE Knotless') || ($pedit->name == 'White Knotless'))
                                                    <div class="form-group row hideFirst hideSecond ns7">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Size
                                                        </label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select
                                                                class="form-control {{($errors->has('size')) ? 'is-invalid' : ''}}"
                                                                name="size">
                                                                @if($pedit->size)
                                                                    <option selected hidden
                                                                            value="{{$pedit->size}}">{{$pedit->size}}
                                                                    </option>
                                                                @else
                                                                    <option selected disabled hidden value="">Choose...
                                                                    </option>
                                                                @endif
                                                                <option value="Small">Small</option>
                                                                <option value="Big">Big</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(($pedit->name == 'Nylon Multifilament'))
                                                    <div class="form-group row hideFirst hideSecond ns1">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Size
                                                        </label>
                                                        <div class="col-lg-9 col-xl-6 input-group">
                                                            <input
                                                                class="form-control {{($errors->has('sizeDenier')) ? 'is-invalid' : ''}}"
                                                                type="number" name="sizeDenier" id="size_denier"
                                                                value="{{$pedit->size_denier}}" step="0.01" min="0">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">denier</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(($pedit->name == 'Nylon Monomulti') || ($pedit->name == 'Danline Rope') || ($pedit->name == 'Hanks D') || ($pedit->name == 'Rong Pata'))
                                                    <div class="form-group row hideFirst hideSecond ns2 ns3 ns4">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Size
                                                        </label>
                                                        <div class="col-lg-9 col-xl-6 input-group">
                                                            <input
                                                                class="form-control {{($errors->has('sizeMm')) ? 'is-invalid' : ''}}"
                                                                type="number" name="sizeMm" value="{{$pedit->size_mm}}"
                                                                id="size_mm" step="0.01" min="0">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">mm</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(($pedit->name == 'Nylon Multifilament') || ($pedit->name == 'Nylon Monomulti'))
                                                    <div class="form-group row hideFirst hideSecond ns1 ns2">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Number of PLYS
                                                        </label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control {{($errors->has('plys')) ? 'is-invalid' : ''}}"
                                                                type="number" name="plys" value="{{$pedit->plys}}"
                                                                min="0">
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(($pedit->name == 'White Knotless') || ($pedit->name == 'Nylon Multifilament Fishingnet') || ($pedit->name == 'Nylon Mono Multi Fishingnet') || ($pedit->name == 'HT Fishingnet'))
                                                    <div class="form-group row hideFirst hideSecond ns6 ns9 ns10"
                                                         style="margin-bottom: 0">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"></label>
                                                        <div class="col-lg-3 col-xl-3 input-group">
                                                        </div>
                                                        <div class="col-lg-2 col-xl-2 input-group">
                                                            <input
                                                                class="form-control ml-3 {{($errors->has('mesh_size_2')) ? 'is-invalid' : ''}}"
                                                                type="number" name="mesh_size_2"
                                                                value="{{$pedit->mesh_size_2}}"
                                                                min="0">
                                                        </div>
                                                        <div class="col-lg-1 col-xl-1 input-group">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row hideFirst hideSecond ns6 ns9 ns10"
                                                         style="margin-bottom: 0">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Mesh Size
                                                        </label>
                                                        <div class="col-lg-3 col-xl-3 input-group">
                                                            <input
                                                                class="form-control {{($errors->has('mesh_size_1')) ? 'is-invalid' : ''}}"
                                                                type="number" name="mesh_size_1"
                                                                value="{{$pedit->mesh_size_1}}"
                                                                min="0">
                                                        </div>
                                                        <div class="col-lg-2 col-xl-2 input-group">
                                                            <p style="    margin-left: auto; margin-right: auto; margin-top: 7px;">
                                                                -----------------------</p>
                                                        </div>
                                                        <div class="col-lg-1 col-xl-1 input-group">
                                                            <div class="input-group-append">
                                                                <select
                                                                    class="input-group-text ml-3 {{($errors->has('mesh_size_unit')) ? 'is-invalid' : ''}}"
                                                                    name="mesh_size_unit">
                                                                    <option
                                                                        value="Inch" {{($pedit->mesh_size_unit == 'Inch') ? 'selected' : ''}}>
                                                                        Inch
                                                                    </option>
                                                                    <option
                                                                        value="mm" {{($pedit->mesh_size_unit == 'mm') ? 'selected' : ''}}>
                                                                        mm
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row hideFirst hideSecond ns6 ns9 ns10">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"></label>
                                                        <div class="col-lg-3 col-xl-3 input-group">
                                                        </div>
                                                        <div class="col-lg-2 col-xl-2 input-group">
                                                            <input
                                                                class="form-control ml-3 {{($errors->has('mesh_size_3')) ? 'is-invalid' : ''}}"
                                                                type="number" name="mesh_size_3"
                                                                value="{{$pedit->mesh_size_3}}"
                                                                min="0">
                                                        </div>
                                                        <div class="col-lg-1 col-xl-1 input-group">
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(($pedit->name == 'White Knotless') || ($pedit->name == 'Green HDPE Knotless') || ($pedit->name == 'Black HDPE Knotless') || ($pedit->name == 'Nylon Multifilament Fishingnet') || ($pedit->name == 'Nylon Mono Multi Fishingnet') || ($pedit->name == 'HT Fishingnet') || ($pedit->name == 'HDPE Fishingnet'))
                                                    <div class="form-group row hideFirst hideSecond ns6 ns7 ns9 ns12">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Depth
                                                        </label>
                                                        <div class="col-lg-9 col-xl-6 input-group">
                                                            <input
                                                                class="form-control {{($errors->has('depth')) ? 'is-invalid' : ''}}"
                                                                type="number" name="depth" value="{{$pedit->depth}}"
                                                                step="0.01" min="0">
                                                            <div class="input-group-append">
                                                                <select
                                                                    class="input-group-text {{($errors->has('depth_unit')) ? 'is-invalid' : ''}}"
                                                                    name="depth_unit">
                                                                    <option
                                                                        value="হাত" {{($pedit->depth_unit == 'হাত') ? 'selected' : ''}}>
                                                                        হাত
                                                                    </option>
                                                                    <option
                                                                        value="খোপ" {{($pedit->depth_unit == 'খোপ') ? 'selected' : ''}}>
                                                                        খোপ
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(($pedit->name == 'Nylon Multifilament Fishingnet') || ($pedit->name == 'HT Fishingnet') || ($pedit->name == 'HDPE Cage Net'))
                                                    <div class="form-group row hideFirst hideSecond ns9 ns12 ns13">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Twine Size
                                                        </label>
                                                        <div class="col-lg-2 col-xl-2 input-group">
                                                            <input
                                                                class="form-control {{($errors->has('twinSizeNo')) ? 'is-invalid' : ''}}"
                                                                type="number" name="twinSizeNo"
                                                                value="{{$pedit->twin_size_no}}"
                                                                step="0.01" min="0">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">no.</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-1 col-xl-1 input-group">
                                                            <p style="margin-left: auto; margin-right: auto;">OR</p>
                                                        </div>
                                                        <div class="col-lg-2 col-xl-2 input-group">
                                                            <input
                                                                class="form-control {{($errors->has('twinSizeDenier')) ? 'is-invalid' : ''}}"
                                                                type="number" name="twinSizeDenier"
                                                                value="{{$pedit->twin_size_denier}}"
                                                                step="0.01" min="0">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">Denier</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-1 col-xl-1 input-group">
                                                            <input
                                                                class="form-control {{($errors->has('twinSizePly')) ? 'is-invalid' : ''}}"
                                                                type="number" name="twinSizePly"
                                                                value="{{$pedit->twin_size_ply}}"
                                                                step="0.01" min="0">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">Ply</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                @endif
                                                @if(($pedit->name == 'Nylon Mono Multi Fishingnet') || ($pedit->name == 'HDPE Fishingnet'))
                                                    <div class="form-group row hideFirst hideSecond ns9 ns12 ns13">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Twine Size
                                                        </label>
                                                        <div class="col-lg-3 col-xl-3 input-group">
                                                            <input
                                                                class="form-control {{($errors->has('twinSizeMm')) ? 'is-invalid' : ''}}"
                                                                type="number" name="twinSizeMm"
                                                                value="{{$pedit->twin_size_mm}}"
                                                                step="0.01" min="0">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">mm</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-xl-2 input-group">
                                                            <input
                                                                class="form-control {{($errors->has('twinSizePly')) ? 'is-invalid' : ''}}"
                                                                type="number" name="twinSizePly"
                                                                value="{{$pedit->twin_size_ply}}"
                                                                step="0.01" min="0">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">Ply</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(($pedit->name == 'Nylon Mono Multi Fishingnet'))
                                                    <div class="form-group row hideFirst hideSecond ns12">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Size (Weight-wise)
                                                        </label>
                                                        <div class="col-lg-9 col-xl-6 input-group">
                                                            <input
                                                                class="form-control {{($errors->has('sizeww')) ? 'is-invalid' : ''}}"
                                                                type="number" name="sizeww" value="{{$pedit->sizeww}}"
                                                                step="0.01" min="0">
                                                            <div class="input-group-append">
                                                                <select
                                                                    class="input-group-text {{($errors->has('sizeww_unit')) ? 'is-invalid' : ''}}"
                                                                    name="sizeww_unit">
                                                                    <option
                                                                        value="Grams" {{($pedit->sizeww_unit == 'Grams') ? 'selected' : ''}}>
                                                                        Grams
                                                                    </option>
                                                                    <option
                                                                        value="Kg" {{($pedit->sizeww_unit == 'Kg') ? 'selected' : ''}}>
                                                                        Kg
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(($pedit->name == 'HDPE Trap Net'))
                                                    <div class="form-group row hideFirst hideSecond ns13">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Length
                                                        </label>
                                                        <div class="col-lg-9 col-xl-6 input-group">
                                                            <input
                                                                class="form-control {{($errors->has('length')) ? 'is-invalid' : ''}}"
                                                                type="number" name="length" value="{{$pedit->length}}"
                                                                step="0.01" min="0">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">meter</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(($pedit->name == 'Danline Rope') || ($pedit->name == 'Rong Pata') || ($pedit->name == 'Hanks D'))
                                                    <div class="form-group row hideFirst hideSecond ns3 ns4">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Strand
                                                        </label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select
                                                                class="form-control {{($errors->has('strand')) ? 'is-invalid' : ''}}"
                                                                name="strand">
                                                                @if($pedit->strand)
                                                                    <option selected hidden
                                                                            value="{{$pedit->strand}}">{{$pedit->strand}}
                                                                    </option>
                                                                @else
                                                                    <option selected disabled hidden value="">Choose...
                                                                    </option>
                                                                @endif
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(($pedit->name == 'Danline Rope') || ($pedit->name == 'Rong Pata'))
                                                    <div class="form-group row hideFirst hideSecond ns3">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Coil Type
                                                        </label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select
                                                                class="form-control {{($errors->has('coilType')) ? 'is-invalid' : ''}}"
                                                                name="coilType">
                                                                @if($pedit->coil_type)
                                                                    <option selected hidden
                                                                            value="{{$pedit->coil_type}}">{{$pedit->coil_type}}
                                                                    </option>
                                                                @else
                                                                    <option selected disabled hidden value="">Choose...
                                                                    </option>
                                                                @endif
                                                                <option value="Hanks">Hanks</option>
                                                                <option value="Coil">Coil</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(($pedit->name == 'HDPE Trap Net'))
                                                    <div class="form-group row hideFirst hideSecond ns14">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Weight
                                                        </label>
                                                        <div class="col-lg-9 col-xl-6 input-group">
                                                            <input
                                                                class="form-control {{($errors->has('weight')) ? 'is-invalid' : ''}}"
                                                                type="number" name="weight" value="{{$pedit->weight}}"
                                                                step="0.01" min="0">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">Kg</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(($pedit->name == 'HDPE Trap Net'))
                                                    <div class="form-group row hideFirst hideSecond ns14">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Number of Frames
                                                        </label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control {{($errors->has('framneNo')) ? 'is-invalid' : ''}}"
                                                                type="number" name="framneNo"
                                                                value="{{$pedit->frame_no}}"
                                                                min="0">
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(($pedit->name == 'HDPE Trap Net'))
                                                    <div class="form-group row hideFirst hideSecond ns14">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Frame Size Width
                                                        </label>
                                                        <div class="col-lg-9 col-xl-6 input-group">
                                                            <input
                                                                class="form-control {{($errors->has('frameSizeWidth')) ? 'is-invalid' : ''}}"
                                                                type="number" name="frameSizeWidth"
                                                                value="{{$pedit->frame_size_width}}"
                                                                step="0.01" min="0">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">cm</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(($pedit->name == 'HDPE Trap Net'))
                                                    <div class="form-group row hideFirst hideSecond ns14">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Frame Size Height
                                                        </label>
                                                        <div class="col-lg-9 col-xl-6 input-group">
                                                            <input
                                                                class="form-control {{($errors->has('frameSizeHeight')) ? 'is-invalid' : ''}}"
                                                                type="number" name="frameSizeHeight"
                                                                value="{{$pedit->frame_size_height}}"
                                                                step="0.01" min="0">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">cm</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(($pedit->name == 'HDPE Trap Net'))
                                                    <div class="form-group row hideFirst hideSecond ns14">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Dropper
                                                        </label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select
                                                                class="form-control {{($errors->has('dropper')) ? 'is-invalid' : ''}}"
                                                                name="dropper">
                                                                @if($pedit->dropper)
                                                                    <option selected hidden
                                                                            value="{{$pedit->dropper}}">{{$pedit->dropper}}
                                                                    </option>
                                                                @else
                                                                    <option selected disabled hidden value="">Choose...
                                                                    </option>
                                                                @endif
                                                                <option value="With">With</option>
                                                                <option value="Without">Without</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(($pedit->name == 'HDPE Trap Net'))
                                                    <div class="form-group row hideFirst hideSecond ns14">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Body
                                                        </label>
                                                        <div class="col-lg-3 col-xl-3 input-group">
                                                            <input
                                                                class="form-control {{($errors->has('bodyCm')) ? 'is-invalid' : ''}}"
                                                                type="number" name="bodyCm" value="{{$pedit->body_cm}}"
                                                                step="0.01" min="0">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">cm</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-xl-3 input-group">
                                                            <input
                                                                class="form-control {{($errors->has('bodyPly')) ? 'is-invalid' : ''}}"
                                                                type="number" name="bodyPly"
                                                                value="{{$pedit->body_ply}}"
                                                                step="0.01" min="0">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">Ply</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(($pedit->name == 'HDPE Trap Net'))
                                                    <div class="form-group row hideFirst hideSecond ns14">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            Tail
                                                        </label>
                                                        <div class="col-lg-3 col-xl-3 input-group">
                                                            <input
                                                                class="form-control {{($errors->has('tailCm')) ? 'is-invalid' : ''}}"
                                                                type="number" name="tailCm" value="{{$pedit->tail_cm}}"
                                                                step="0.01" min="0">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">cm</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-xl-3 input-group">
                                                            <input
                                                                class="form-control {{($errors->has('tailPly')) ? 'is-invalid' : ''}}"
                                                                type="number" name="tailPly"
                                                                value="{{$pedit->tail_ply}}"
                                                                step="0.01" min="0">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">Ply</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="form-group row hideFirst" id="nameType">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Name of the Product*
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input
                                                            class="Name form-control {{($errors->has('name')) ? 'is-invalid' : ''}}"
                                                            type="text" name="name" value="{{$pedit->name}}">
                                                        @if($errors->has('name'))
                                                            <span
                                                                class="invalid-feedback">{{$errors->first('name')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row hideFirst hideSecond tid7 tid10">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Manufacture Name
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input
                                                            class="form-control {{($errors->has('manufacturer')) ? 'is-invalid' : ''}}"
                                                            type="text" name="manufacturer"
                                                            value="{{$pedit->manufacturer}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row hideFirst hideSecond tid7 tid10">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Country Of Origin
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input
                                                            class="form-control {{($errors->has('country_origin')) ? 'is-invalid' : ''}}"
                                                            type="text" name="country_origin"
                                                            value="{{$pedit->country_origin}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row hideFirst hideSecond tid7 tid10">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Relative Density
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input
                                                            class="form-control {{($errors->has('relative_density')) ? 'is-invalid' : ''}}"
                                                            type="text" name="relative_density"
                                                            value="{{$pedit->relative_density}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row hideFirst hideSecond tid7 tid10">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Viscosity
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input
                                                            class="form-control {{($errors->has('viscosity')) ? 'is-invalid' : ''}}"
                                                            type="number" name="viscosity" step="0.01" min="0"
                                                            value="{{$pedit->viscosity}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row hideFirst hideSecond tid7">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Grade No
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input value="{{$pedit->grade_no}}"
                                                               class="form-control {{($errors->has('gradeNo')) ? 'is-invalid' : ''}}"
                                                               type="text" name="gradeNo">
                                                    </div>
                                                </div>
                                                <div class="form-group row hideFirst hideSecond tid7">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        MFI
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input value="{{$pedit->mfi}}"
                                                               class="form-control {{($errors->has('mfi')) ? 'is-invalid' : ''}}"
                                                               type="text" name="mfi">
                                                    </div>
                                                </div>
                                                <div class="form-group row hideFirst hideSecond tid7">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        MFR
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input value="{{$pedit->mfr}}"
                                                               class="form-control {{($errors->has('mfr')) ? 'is-invalid' : ''}}"
                                                               type="text" name="mfr">
                                                    </div>
                                                </div>
                                                <div class="form-group row hideFirst hideSecond tid7">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Melting Point
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input value="{{$pedit->melting_point}}"
                                                               class="form-control {{($errors->has('meltingPoint')) ? 'is-invalid' : ''}}"
                                                               type="number" name="meltingPoint" step="0.01" min="0">
                                                    </div>
                                                </div>
                                                <div class="form-group row hideFirst hideSecond tid7">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Density
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6 input-group">
                                                        <input value="{{$pedit->density}}"
                                                               class="form-control {{($errors->has('density')) ? 'is-invalid' : ''}}"
                                                               type="number" name="density" step="0.01" min="0">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">g/cm<sup>3</sup></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row hideFirst hideSecond tid7">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Luster
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input value="{{$pedit->luster}}"
                                                               class="form-control {{($errors->has('luster')) ? 'is-invalid' : ''}}"
                                                               type="text" name="luster">
                                                    </div>
                                                </div>
                                                <div class="form-group row hideFirst hideSecond tid7">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Nominal Denier
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input value="{{$pedit->nominal_denier}}"
                                                               class="form-control {{($errors->has('nominal_denier')) ? 'is-invalid' : ''}}"
                                                               type="text" name="nominal_denier">
                                                    </div>
                                                </div>
                                                <div class="form-group row hideFirst hideSecond tid7">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Upload Tds
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input value="{{$pedit->upload_tds}}"
                                                               class="form-control {{($errors->has('uploadTds')) ? 'is-invalid' : ''}}"
                                                               type="file" name="uploadTds">
                                                    </div>
                                                </div>
                                                <div class="form-group row hideFirst hideSecond tid7">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Upload Msds
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input value="{{$pedit->upload_msds}}"
                                                               class="form-control {{($errors->has('uploadMsds')) ? 'is-invalid' : ''}}"
                                                               type="file" name="uploadMsds">
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Minimum Storage Amount*
                                                </label>
                                                <div class="col-lg-9 col-xl-6 input-group">
                                                    <input
                                                        class="form-control {{($errors->has('minimumStorage')) ? 'is-invalid' : ''}}"
                                                        type="number" name="minimumStorage" required min="0"
                                                        value="{{$pedit->minimum_storage}}">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">{{$pedit->unit}}</span>
                                                    </div>
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
                                                        type="text" name="unit" required readonly
                                                        value="{{$pedit->unit}}">
                                                    @if($errors->has('unit'))
                                                        <span class="invalid-feedback">{{$errors->first('unit')}}</span>
                                                    @endif
                                                </div>
                                            </div>
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
                    <div id="kt_product_edit_tab_2" class="tab-pane">
                        @if(count($allRawMaterials) > 0)
                            <div class="kt-form kt-form--label-right">
                                <div class="kt-form__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body">
                                            {{--Form Start--}}
                                            <form
                                                action="{{route('product.update.rawmaterial', ['pid' => $pedit->id])}}"
                                                method="post">
                                                @csrf
                                                <div id="kt_repeater_1">
                                                    <div class="form-group form-group-last row"
                                                         id="kt_repeater_1">
                                                        <div class="col-lg-12" id="repeat-content-rawMaterial">
                                                            @foreach($rawMaterial as $rm)
                                                                <div
                                                                    class="form-group row align-items-center remove-content">
                                                                    <div class="col-md-3">
                                                                        <div class="kt-form__group--inline">
                                                                            <div class="kt-form__label">
                                                                                <label>Raw Material:</label>
                                                                            </div>
                                                                            <div class="kt-form__control">
                                                                                <select
                                                                                    class="form-control kt-selectpicker"
                                                                                    name="rawMaterial[]"
                                                                                    data-live-search="true"
                                                                                    data-size="7">
                                                                                    <option selected hidden
                                                                                            value="{{$rm->id}}">
                                                                                        {{$rm->auto_id}}
                                                                                    </option>
                                                                                    @foreach($allRawMaterials as $arm)
                                                                                        <option
                                                                                            value="{{$arm->id}}">{{$arm->auto_id}}</option>
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
                                                            @if(isset($allRawMaterials ) && isset($rawMaterial) && (count($allRawMaterials ) != count($rawMaterial)))
                                                                <div
                                                                    class="form-group row align-items-center remove-content">
                                                                    <div class="col-md-3">
                                                                        <div class="kt-form__group--inline">
                                                                            <div class="kt-form__label">
                                                                                <label>Raw Material:</label>
                                                                            </div>
                                                                            <div class="kt-form__control">
                                                                                <select
                                                                                    class="form-control kt-selectpicker"
                                                                                    name="rawMaterial[]"
                                                                                    data-live-search="true"
                                                                                    data-size="7">
                                                                                    <option selected disabled hidden>
                                                                                        Choose...
                                                                                    </option>
                                                                                    @foreach($allRawMaterials as $arm)
                                                                                        <option
                                                                                            value="{{$arm->id}}">{{$arm->auto_id}}</option>
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
                                                    <div class="form-group form-group-last row">
                                                        <div class="col-lg-4">
                                                            <a href="javascript:;" id="add-btn-rawMaterial"
                                                               class="btn btn-bold btn-sm btn-label-brand">
                                                                <i class="la la-plus"></i> Add Another Raw Material
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
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
                                No raw material is created yet :(
                            </div>
                        @endif
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
    {{--    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"--}}
    {{--            type="text/javascript"></script>--}}
    <script src="{{asset('m/assets/js/pages/crud/forms/widgets/bootstrap-select.js')}}" type="text/javascript"></script>
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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).on('click', '.delete-btn', function (f) {
            $(f.target).closest('.remove-content').slideUp(function () {
                $(this).remove();
            });
        });
        $(document).on('click', '#add-btn-rawMaterial', function () {
            var input = `
                  <div class="form-group row align-items-center remove-content">
                                                                    <div class="col-md-3">
                                                                        <div class="kt-form__group--inline">
                                                                            <div class="kt-form__label">
                                                                                <label>Raw Material:</label>
                                                                            </div>
                                                                            <div class="kt-form__control">
                                                                                <select class="form-control kt-selectpicker"
                                                                                        name="rawMaterial[]"
                                                                                        data-live-search="true"
                                                                                        data-size="7">
                                                                                    <option selected disabled hidden>
                                                                                        Choose...
                                                                                    </option>
                                                                                    @foreach($allRawMaterials as $arm)
            <option value="{{$arm->id}}">{{$arm->auto_id}}</option>
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
                $('#repeat-content-rawMaterial').append(this);
                $(this).slideDown(500);
            });
            {{--$.getScript("{{asset('m/assets/js/pages/crud/forms/widgets/bootstrap-select.js')}}");--}}
            setTimeout(() => {
                $('.kt-selectpicker').selectpicker();
            }, 50);
        });
    </script>
@endsection
