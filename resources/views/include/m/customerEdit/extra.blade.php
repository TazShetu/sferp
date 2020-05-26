<div class="tab-pane" id="kt_user_edit_tab_5" role="tabpanel">
    <div class="kt-form kt-form--label-right">
        <div class="kt-form__body">
            <div class="kt-section kt-section--first">
                <div class="kt-section__body">
                    {{--Form Start--}}
                    <form
                        action="{{route('customer.update.extra', ['cid' => $customer->id])}}"
                        method="post">
                        @csrf
                        <div id="kt_repeater_1">
                            <div class="form-group form-group-last row" id="kt_repeater_5">
                                <div class="col-lg-12" id="repeat-content-extra">


                                    @foreach($extras as $e)
                                        <div class="form-group row align-items-center remove-content">
                                            <div class="col-md-4">
                                                <div class="kt-form__group--inline">
                                                    <div class="kt-form__label">
                                                        <label>Type:</label>
                                                    </div>
                                                    <div class="kt-form__control">
                                                        <input type="text" class="form-control"
                                                               name="type[]"
                                                               value="{{$e->type}}" required>
                                                    </div>
                                                </div>
                                                <div class="d-md-none kt-margin-b-10"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="kt-form__group--inline">
                                                    <div class="kt-form__label">
                                                        <label>Details:</label>
                                                    </div>
                                                    <div class="kt-form__control">
                                                        <input type="text" class="form-control"
                                                               name="details[]"
                                                               value="{{$e->details}}" required>
                                                    </div>
                                                </div>
                                                <div class="d-md-none kt-margin-b-10"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="javascript:;" data-repeater-delete=""
                                                   class="btn-sm btn btn-label-danger btn-bold delete-btn"
                                                   style="margin-top: 24px;">
                                                    <i class="la la-trash-o"></i>
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach




                                    <div class="form-group row align-items-center remove-content">
                                        <div class="col-md-4">
                                            <div class="kt-form__group--inline">
                                                <div class="kt-form__label">
                                                    <label>Type:</label>
                                                </div>
                                                <div class="kt-form__control">
                                                    <input type="text" class="form-control"
                                                           name="type[]"
                                                           placeholder="Enter Type" required>
                                                </div>
                                            </div>
                                            <div class="d-md-none kt-margin-b-10"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kt-form__group--inline">
                                                <div class="kt-form__label">
                                                    <label>Details:</label>
                                                </div>
                                                <div class="kt-form__control">
                                                    <input type="text" class="form-control"
                                                           name="details[]"
                                                           placeholder="Enter Details" required>
                                                </div>
                                            </div>
                                            <div class="d-md-none kt-margin-b-10"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="javascript:;" data-repeater-delete=""
                                               class="btn-sm btn btn-label-danger btn-bold delete-btn"
                                               style="margin-top: 24px;">
                                                <i class="la la-trash-o"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-last row">
                                <!-- <label class="col-lg-2 col-form-label"></label> -->
                                <div class="col-lg-4">
                                    <a href="javascript:;" id="add-btn-extra"
                                       class="btn btn-bold btn-sm btn-label-brand">
                                        <i class="la la-plus"></i> Add Another Extra Info
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
                                    <button type="submit" class="btn btn-label-brand btn-bold">
                                        Save Changes
                                    </button>
                                    <a href="javascript:void (0)" data-link="{{route('cancel')}}"
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
