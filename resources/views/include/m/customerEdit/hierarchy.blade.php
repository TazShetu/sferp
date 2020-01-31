<div class="tab-pane" id="kt_user_edit_tab_3" role="tabpanel">
    <div class="row">
        @if(($customer->customertype_id * 1) == 1)
            <div class="col-md-6">
                <div class="kt-form kt-form--label-right">
                    <div class="kt-form__body">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body">
                                {{--Form Start--}}
                                <form action="{{route('customer.sub.dealer.update', ['cid' => $customer->id])}}"
                                      method="post">
                                    @csrf
                                    <div id="kt_repeater_1">
                                        <div class="form-group form-group-last row"
                                             id="kt_repeater_1">
                                            <div class="col-lg-12" id="repeat-content-subdealer">
                                                @foreach($subDealers as $sd)
                                                    <div class="form-group row align-items-center remove-content">
                                                        <div class="col-md-3">
                                                            <div class="kt-form__group--inline">
                                                                <div class="kt-form__label">
                                                                    <label>Sub Dealer:</label>
                                                                </div>
                                                                <div class="kt-form__control">
                                                                    <select class="form-control kt-selectpicker"
                                                                            name="subDealer[]"
                                                                            data-live-search="true" data-size="7">
                                                                        <option selected hidden
                                                                                value="{{$sd->child_id}}">
                                                                            {{$sd->name}}
                                                                        </option>
                                                                        @foreach($allSubDealers as $asd)
                                                                            <option value="{{$asd->id}}">{{$asd->name}}</option>
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
                                                @if(isset($allSubDealers) && isset($subDealers) && (count($allSubDealers) != count($subDealers)))
                                                    <div class="form-group row align-items-center remove-content">
                                                        <div class="col-md-3">
                                                            <div class="kt-form__group--inline">
                                                                <div class="kt-form__label">
                                                                    <label>Sub Dealer:</label>
                                                                </div>
                                                                <div class="kt-form__control">
                                                                    <select class="form-control kt-selectpicker"
                                                                            name="subDealer[]"
                                                                            data-live-search="true" data-size="7">
                                                                        <option selected disabled hidden>Choose</option>
                                                                        @foreach($allSubDealers as $asd)
                                                                            <option value="{{$asd->id}}">{{$asd->name}}</option>
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
                                                <a href="javascript:;" id="add-btn-subDealer"
                                                   class="btn btn-bold btn-sm btn-label-brand">
                                                    <i class="la la-plus"></i> Add Another Sub Dealer
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
            </div>
        @endif
        <div class="col-md-6">
            <div class="kt-form kt-form--label-right">
                <div class="kt-form__body">
                    <div class="kt-section kt-section--first">
                        <div class="kt-section__body">
                            {{--Form Start--}}
                            <form action="{{route('customer.individual.update', ['cid' => $customer->id])}}" method="post">
                                @csrf
                                <div id="kt_repeater_1">
                                    <div class="form-group form-group-last row"
                                         id="kt_repeater_1">
                                        <div class="col-lg-12" id="repeat-content-individual">
                                            @foreach($individuals as $id)
                                                <div class="form-group row align-items-center remove-content">
                                                    <div class="col-md-3">
                                                        <div class="kt-form__group--inline">
                                                            <div class="kt-form__label">
                                                                <label>Individuals:</label>
                                                            </div>
                                                            <div class="kt-form__control">
                                                                <select class="form-control kt-selectpicker"
                                                                        name="individual[]"
                                                                        data-live-search="true" data-size="7">
                                                                    <option selected hidden value="{{$id->child_id}}">
                                                                        {{$id->name}}
                                                                    </option>
                                                                    @foreach($allIndividuals as $ai)
                                                                        <option value="{{$ai->id}}">{{$ai->name}}</option>
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
                                            @if(isset($allIndividuals) && isset($individuals) && (count($allIndividuals) != count($individuals)))
                                                <div class="form-group row align-items-center remove-content">
                                                    <div class="col-md-3">
                                                        <div class="kt-form__group--inline">
                                                            <div class="kt-form__label">
                                                                <label>Individuals:</label>
                                                            </div>
                                                            <div class="kt-form__control">
                                                                <select class="form-control kt-selectpicker"
                                                                        name="individual[]"
                                                                        data-live-search="true" data-size="7">
                                                                    <option selected disabled hidden>Choose</option>
                                                                    @foreach($allIndividuals as $ai)
                                                                        <option value="{{$ai->id}}">{{$ai->name}}</option>
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
                                        <!-- <label class="col-lg-2 col-form-label"></label> -->
                                        <div class="col-lg-4">
                                            <a href="javascript:;" id="add-btn-individual"
                                               class="btn btn-bold btn-sm btn-label-brand">
                                                <i class="la la-plus"></i> Add Another Individual
                                            </a>
                                        </div>
                                    </div>
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
        </div>
    </div>

</div>