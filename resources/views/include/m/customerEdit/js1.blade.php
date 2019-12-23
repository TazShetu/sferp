<script>
    $(document).on('click', '#add-btn', function () {
        var input = `
                <div class="form-group row align-items-center remove-content">
                    <div class="col-md-3">
                        <div class="kt-form__group--inline">
                            <div class="kt-form__label">
                                <label>Contact Person Name:</label>
                            </div>
                            <div class="kt-form__control">
                                <input type="text" class="form-control"
                                       name="cName[]"
                                       placeholder="Enter full name" required>
                            </div>
                        </div>
                        <div class="d-md-none kt-margin-b-10"></div>
                    </div>
                    <div class="col-md-3">
                        <div class="kt-form__group--inline">
                            <div class="kt-form__label">
                                <label>Contact Person Designation:</label>
                            </div>
                            <div class="kt-form__control">
                                <input type="text" class="form-control"
                                       name="designation[]"
                                       placeholder="Enter Designation" required>
                            </div>
                        </div>
                        <div class="d-md-none kt-margin-b-10"></div>
                    </div>
                    <div class="col-md-3">
                        <div class="kt-form__group--inline">
                            <div class="kt-form__label">
                                <label class="kt-label m-label--single">Contact
                                    Person Number:</label>
                            </div>
                            <div class="kt-form__control">
                                <input type="text" class="form-control"
                                       name="number[]" required
                                       placeholder="Enter contact number">
                            </div>
                        </div>
                        <div class="d-md-none kt-margin-b-10"></div>
                    </div>
                    <div class="col-md-3">
                        <a href="javascript:;"
                           class="btn-sm btn btn-label-danger btn-bold delete-btn"
                           style="margin-top: 24px;" >
                            <i class="la la-trash-o"></i>
                            Delete
                        </a>
                    </div>
                </div>
            `;
        $(input).slideUp(1, function () {
            $('#repeat-content').append(this);
            $(this).slideDown(500);
        });
    });
</script>
<script>
    $(document).on('click', '#add-btn', function () {
        var input = `
                <div class="form-group row align-items-center remove-content">
                    <div class="col-md-3">
                        <div class="kt-form__group--inline">
                            <div class="kt-form__label">
                                <label>Contact Person Name:</label>
                            </div>
                            <div class="kt-form__control">
                                <input type="text" class="form-control"
                                       name="cName[]"
                                       placeholder="Enter full name" required>
                            </div>
                        </div>
                        <div class="d-md-none kt-margin-b-10"></div>
                    </div>
                    <div class="col-md-3">
                        <div class="kt-form__group--inline">
                            <div class="kt-form__label">
                                <label>Contact Person Designation:</label>
                            </div>
                            <div class="kt-form__control">
                                <input type="text" class="form-control"
                                       name="designation[]"
                                       placeholder="Enter Designation" required>
                            </div>
                        </div>
                        <div class="d-md-none kt-margin-b-10"></div>
                    </div>
                    <div class="col-md-3">
                        <div class="kt-form__group--inline">
                            <div class="kt-form__label">
                                <label class="kt-label m-label--single">Contact
                                    Person Number:</label>
                            </div>
                            <div class="kt-form__control">
                                <input type="text" class="form-control"
                                       name="number[]" required
                                       placeholder="Enter contact number">
                            </div>
                        </div>
                        <div class="d-md-none kt-margin-b-10"></div>
                    </div>
                    <div class="col-md-3">
                        <a href="javascript:;"
                           class="btn-sm btn btn-label-danger btn-bold delete-btn"
                           style="margin-top: 24px;" >
                            <i class="la la-trash-o"></i>
                            Delete
                        </a>
                    </div>
                </div>
            `;
        $(input).slideUp(1, function () {
            $('#repeat-content').append(this);
            $(this).slideDown(500);
        });
    });
    $(document).on('click', '.delete-btn', function (f) {
        $(f.target).closest('.remove-content').slideUp(function () {
            $(this).remove();
        });
    });
</script>
<script>
    $(document).on('click', '#add-btn-subDealer', function () {
        var input = `
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
`;
        $(input).slideUp(1, function () {
            $('#repeat-content-subdealer').append(this);
            $(this).slideDown(500);
        });
    });
</script>
<script>
    $(document).on('click', '#add-btn-individual', function () {
        var input = `
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
`;
        $(input).slideUp(1, function () {
            $('#repeat-content-individual').append(this);
            $(this).slideDown(500);
        });
    });
</script>