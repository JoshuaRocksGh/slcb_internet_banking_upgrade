{{-- @include('extras.selectize') --}}
<style>
    .modal-footer button {
        width: 5rem;
    }

    #msform {
        text-align: center;
        position: relative;
        margin-top: 20px
    }

    #msform fieldset {
        background: white;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;
        position: relative
    }

    #msform fieldset:not(:first-of-type) {
        display: none
    }

    #msform .action-button-previous:hover,
    #msform .action-button-previous:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
    }

    select.list-dt {
        border: none;
        outline: 0;
        border-bottom: 1px solid #ccc;
        padding: 2px 5px 3px 5px;
        margin: 2px
    }

    select.list-dt:focus {
        border-bottom: 2px solid skyblue
    }

    .card {
        z-index: 0;
        border: none;
        border-radius: 0.5rem;
        position: relative
    }

    label {
        text-align: left;
    }

    .inner-card {
        margin: 10px;
        padding: 10px;
    }

    #progressbar {
        display: flex;
        place-content: center;
        margin-bottom: 30px;
        overflow: hidden;
        color: lightgrey;
        padding: 0px;
        margin: 0 0 1rem 0;

    }

    #progressbar .active {
        color: #000000
    }

    #progressbar li {
        list-style-type: none;
        font-size: 12px;
        width: 30%;
        float: left;
        position: relative
    }


    #progressbar li:before {
        width: 30px;
        height: 30px;
        line-height: 30px;
        display: block;
        font-size: 16px;
        color: #ffffff;
        background: lightgray;
        border-radius: 50%;
        margin: auto auto auto auto;
        margin-bottom: 5px;
    }

    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: lightgray;
        position: absolute;
        left: 0;
        top: 15px;
        z-index: -1
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
        background: #17a2b8
    }
</style>

<div class="modal fade" id="edit_modal" data-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-info" id="beneficiary_form_header">
                <h5 class="modal-title text-white text-capitalize font-weight-bold" id="beneficiary_form_title">
                    Beneficiary Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                {{-- form body start --}}
                <div class="card px-0 pb-0 ">
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form id="msform">
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active fas fa-money-check-alt" id="account"><span>Account
                                            Details</span>
                                    </li>
                                    <li id="personal" class="fas fa-user-circle"><span>Beneficiary Details</span></li>
                                    {{-- <li id="payment" class="fas fa-bahai"><span>Summary</span></li> --}}
                                </ul> <!-- fieldsets -->
                                <fieldset class="current-fs first-fs" data-value="account">
                                    <div class="card inner-card">
                                        <h2 class=" font-18 font-weight-bold mb-3">Account Details</h2>
                                        <div class="form-group row international-bank-form" style="display: none">
                                            <label class="col-md-4"> Select Country:</label>
                                            <div class="col-md-8">
                                                <input type="hidden" value="" id="bank_i">
                                                <select class="form-control " id="select_country" required>
                                                    <option selected disabled value="">--- Select Country ---</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row other-bank-form international-bank-form"
                                            style="display: none">
                                            <label class="col-md-4"> Select Bank:</label>
                                            <div class="col-md-8">
                                                <input type="hidden" value="" id="bank_i">
                                                <select class="form-control " id="select_bank">
                                                    <option selected disabled value=""> --- Select Bank ---</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-4">Account Number:</label>
                                            <div class="col-md-8">
                                                <input type="number" class="form-control" id="account_number"
                                                    placeholder="Enter Account Number">
                                            </div>

                                        </div>
                                        <div class="form-group row same-bank-form" id="account_name_display"
                                            style="display:none">
                                            <label class="col-md-4">Account Name:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="account_name"
                                                    placeholder="Account Name" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row same-bank-form" id="account_currency_display"
                                            style="display:none">
                                            <label class="col-md-4">Account Currency:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="account_currency"
                                                    placeholder="Account Currency" disabled>
                                            </div>
                                        </div>
                                    </div>


                                </fieldset>
                                <fieldset class="last-fs" data-value="beneficiary">
                                    <div class="card inner-card">
                                        <h2 class="font-18 font-weight-bold mb-3">Beneficiary Details</h2>
                                        <div class="form-group row ">
                                            <label class="col-4"> Name:</label>
                                            <div class="col-8">
                                                <input type="text" class="form-control" id="beneficiary_name"
                                                    placeholder="Enter Beneficiary Name">
                                            </div>
                                        </div>

                                        {{-- <div class="form-group row">
                                            <label class="col-4">Phone Number:</label>
                                            <div class="col-8">
                                                <input type="number" class="form-control"
                                                    id="beneficiary_number" placeholder="Enter Beneficiary Phone Number"
                                                    required>
                                            </div>
                                        </div> --}}

                                        <div class="form-group row other-bank-form international-bank-form"
                                            style="display: none">
                                            <label class="col-4">Email:</label>
                                            <div class="col-8">
                                                <input type="email" class="form-control" id="beneficiary_email"
                                                    placeholder="Enter Beneficiary Email">
                                            </div>
                                        </div>
                                        <div class="form-group row other-bank-form international-bank-form"
                                            style="display: none">
                                            <label class="col-4">Address:</label>
                                            <div class="col-8">
                                                <input type="text" class="form-control" id="beneficiary_address"
                                                    placeholder="Enter Beneficiary Address">
                                            </div>
                                        </div>
                                        <div class="form-group mt-3">

                                            <div class="checkbox checkbox-primary mb-2" id="transfer_email">
                                                <input id="send_email_check" type="checkbox">
                                                <label for="send_email_check">
                                                    Email beneficiary when a transfer is made
                                                </label>
                                            </div>
                                            <p class=" text-left sub-header font-13">
                                                Providing beneficiary email and checking
                                                the box, enables us to send an alert mail to
                                                the beneficiary each time a transfer is made
                                            </p>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- form body end --}}

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" id="delete_btn">Delete</button>
                <div> <button type="button" class="btn btn-secondary previous action-button-previous mx-2"
                        disabled>previous</button>
                    <button type="button" class="btn btn-primary next action-button">next</button>
                </div>
            </div>
        </div>
    </div>
</div>
<span id="beneficiary_modal_backup" hidden disabled style="display: none"></span>
<script src="assets/js/pages/transfer/beneficiary/beneficiaryForm.js">
</script>
<script src="assets/js/pages/transfer/beneficiary/saveBeneficiary.js">
</script>
<script src="assets/js/functions/validateEmail.js">
</script>