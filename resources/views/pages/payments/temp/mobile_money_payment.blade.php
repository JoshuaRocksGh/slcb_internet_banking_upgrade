@extends('layouts.master')

@section('styles')

<style>
    @media print {
        .hide_on_print {
            display: none;
        }

        ;
    }

    @page {
        size: A4;

            {
                {
                -- margin: 10px;
                --
            }
        }
    }

    @media print {

        html,
        body {
            width: 210mm;
            height: 297mm;
        }

        /* ... the rest of the rules ... */
    }


    @font-face {
        font-family: 'password';
        font-style: normal;
        font-weight: 400;
        src: url(https://jsbin-user-assets.s3.amazonaws.com/rafaelcastrocouto/password.ttf);
    }
</style>


@endsection


@section('content')
<div class="">


    <div class="container-fluid">
        <br>
        <!-- start page title -->
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-primary">
                    <img src="{{ asset('assets/images/logoRKB.png') }}" alt="logo" style="zoom: 0.05">&emsp;
                    MOBILE MONEY PAYMENT
                </h4>
            </div>

            <div class="col-md-6 text-right">
                <h6>

                    <span class="flaot-right">
                        <b class="text-primary"> Payment </b> &nbsp; > &nbsp; <b class="text-danger">Mobile Money
                            Payment</b>
                    </span>

                </h6>

            </div>

            <div class="col-md-12 ">
                <hr class="text-primary" style="margin: 0px;">
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">

                        <div class="row">

                            <div class="col-md-7 m-2" id="transaction_form"
                                style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">
                                <br><br><br>

                                <form action="#" id="payment_details_form" autocomplete="off" aria-autocomplete="none">
                                    @csrf
                                    <div class="row container">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">

                                            <div class="form-group">
                                                <b class="text-primary">Account from which transfer will be made<span
                                                        class="text-danger">*</span></b>

                                                <select class="custom-select" id="from_account" required>
                                                    <option value="">-- Select Account -- </option>


                                                </select>


                                            </div>
                                            <hr>
                                            <div class="row mb-2">
                                                <div class="col-md-4">

                                                    <div class="form-group mb-3">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="checkmeout0" name="onetime_check" value="CHECKED">
                                                            <label class="custom-control-label" for="checkmeout0"><b
                                                                    class="text-primary">Onetime Transfer </b> </label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <b class="text-primary col-md-4 bene_details">Beneficiary
                                                            &nbsp;<span class="text-danger">*</span></b>
                                                        <select class="form-control col-md-8 bene_details"
                                                            id="to_account" required>
                                                            <option value=""><b>-- Select Beneficiary --</b> </option>

                                                        </select>
                                                    </div>
                                                </div>


                                            </div>
                                            <hr>

                                            <div id="saved_beneficiary_form">

                                                <div class="row mb-2">
                                                    <b class="text-primary col-md-4">Recipient Name </b>
                                                    <input type="text" class="form-control col-md-8 readOnly"
                                                        id="beneficiary_name" readonly />

                                                </div>

                                                <div class="row mb-2">
                                                    <b class="text-primary col-md-4">Recipient Mobile Number </b>
                                                    <input type="text" class="form-control col-md-8 readOnly"
                                                        id="beneficiary_number" readonly />

                                                </div>

                                                <div class="row mb-2">
                                                    <b class="text-primary col-md-4">Recipient Network</b>
                                                    <input type="text" class="form-control col-md-8 readOnly"
                                                        id="beneficiary_network" readonly />

                                                </div>
                                                <hr>

                                                <div class="form-group row">

                                                    <b class="col-4 text-primary"> Amount &nbsp; <span
                                                            class="text-danger">*</span></b>

                                                    <div class="col-2">
                                                        <div class="input-group mb-2">
                                                            <div class="input-group-prepend" style="margin-right:-1px;">
                                                                <div
                                                                    class="input-group-text display_from_account_currency">
                                                                    SLL</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <input type="text" class="form-control col-6" id="amount"
                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                        required>


                                                </div>


                                                <div class="form-group row mb-3">
                                                    {{-- <b class=" col-md-4 text-primary">Expense Category &nbsp; <span
                                                            class="text-danger">*</span></b> --}}
                                                    <label class="col-md-4"><b class="text-primary">Expense
                                                            Category
                                                            &nbsp;</b></label>
                                                    <input type="hidden" value="Others" id="category_">



                                                    <select class="form-control col-md-8 " id="category" required>
                                                        <option value="">---Not Selected---</option>

                                                    </select>


                                                </div>

                                                <div class="form-group row mb-3">
                                                    <b class="col-md-4 text-primary ">Purpose of Transfer &nbsp;
                                                        <span class="text-danger">*</span></b>

                                                    <input type="text" class="form-control col-md-8" id="purpose"
                                                        placeholder="Enter purpose of transaction" required>

                                                </div>

                                            </div>

                                            <div id="onetime_beneficiary_form">


                                                <div class="row mb-2">
                                                    <b class="text-primary col-md-4">Recipient Name &nbsp;<span
                                                            class="text-danger">*</span></b>
                                                    <input type="text" class="form-control col-md-8"
                                                        id="onetime_beneficiary_name"
                                                        placeholder="Enter Beneficiary Name">

                                                </div>

                                                <div class="row mb-2">
                                                    <b class="text-primary col-md-4">Recipient Mobile Number &nbsp;<span
                                                            class="text-danger">*</span></b>
                                                    <input type="text" class="form-control col-md-8"
                                                        id="onetime_beneficiary_number"
                                                        placeholder="Enter Beneficiary Telephone">

                                                </div>
                                                <div class="row mb-2">
                                                    <b class="text-primary col-md-4">Recipient Network &nbsp;<span
                                                            class="text-danger">*</span></b>
                                                    {{-- <input type="text" class="form-control col-md-8"
                                                            id="onetime_beneficiary_network"
                                                            placeholder="Enter Beneficiary Network"> --}}

                                                    <select class="form-control col-md-8"
                                                        id="onetime_beneficiary_network" required>
                                                        <option value="">---Not Selected---</option>

                                                    </select>

                                                </div>


                                                <hr>

                                                <div class="form-group row">

                                                    <b class="col-4 text-primary"> Amount &nbsp; <span
                                                            class="text-danger">*</span></b>

                                                    <div class="col-2">
                                                        <div class="input-group mb-2">
                                                            <div class="input-group-prepend" style="margin-right:-1px;">
                                                                <div
                                                                    class="input-group-text display_from_account_currency">
                                                                    SLL</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <input type="text" class="form-control col-6" id="onetime_amount"
                                                        placeholder="Amount 0.00"
                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                        required>


                                                </div>

                                                <div class="form-group row mb-3">
                                                    {{-- <b class=" col-md-4 text-primary">Expense Category &nbsp; <span
                                                            class="text-danger">*</span></b> --}}

                                                    <label class="col-md-4"><b class="text-primary">Expense
                                                            Category
                                                            &nbsp;</b></label>
                                                    <input type="hidden" value="Others" id="onetime_category_">



                                                    <select class="form-control col-md-8 " id="onetime_category"
                                                        required>
                                                        <option value="">---Not Selected---</option>

                                                    </select>


                                                </div>

                                                <div class="form-group row mb-3">
                                                    <b class="col-md-4 text-primary ">Purpose of Transfer &nbsp;
                                                        <span class="text-danger">*</span></b>

                                                    <input type="text" class="form-control col-md-8"
                                                        id="onetime_purpose" placeholder="Enter purpose of transaction"
                                                        required>

                                                </div>

                                            </div>



                                            <div class="form-group text-right">
                                                <button class="btn btn-primary btn-rounded" type="submit"
                                                    id="next_button">
                                                    &nbsp; Next &nbsp; <i class="fe-arrow-right"></i></button>
                                            </div>


                                        </div>
                                        <div class="col-md-1"></div>

                                        <div class="">
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="form-group">


                                    </div>
                                    <div class="form-group">


                                        <table
                                            class="table-responsive table table-centered table-nowrap mb-0 to_account_display_info">
                                            <tbody>
                                                <tr>

                                                    <td>
                                                        <a
                                                            class="text-body font-weight-semibold display_to_account_name"></a>
                                                        <small class="d-block display_to_account_no"></small>
                                                    </td>

                                                    <td class="text-right font-weight-semibold">
                                                        <span class="display_to_account_currency"></span>
                                                        <span class="display_to_account_amount"></span>

                                                    </td>
                                                </tr>


                                            </tbody>
                                        </table>


                                    </div>


                                </form>


                            </div>

                            <div class="col-md-7 m-2" id="transaction_summary" style="display: none;">


                                <div class="col-md-12">
                                    <div class=" border p-3 mt-4 mt-lg-0 rounded">
                                        <h4 class="header-title mb-3">Transfer Detail Summary</h4>

                                        <div class="table-responsive table-striped table-bordered">
                                            <table class="table mb-0">

                                                <tbody>
                                                    <tr>
                                                        <td>From Account:</td>
                                                        <td>
                                                            <span
                                                                class="font-13 text-primary text-bold display_from_account_type"
                                                                id="display_from_account_type"></span>
                                                            <span
                                                                class="d-block font-13 text-primary text-bold display_from_account_name"
                                                                id="display_from_account_name"> </span>
                                                            <span
                                                                class="d-block font-13 text-primary text-bold display_from_account_no"
                                                                id="display_from_account_no"></span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Recipient Information:</td>
                                                        <td>
                                                            <span
                                                                class="d-block font-13 text-primary text-bold display_to_account_name"
                                                                id="display_to_recipient_name"> </span><br />
                                                            {{-- <span
                                                                class="d-block font-13 text-primary text-bold display_to_account_no"
                                                                id="display_to_account_no"> </span> --}}

                                                            <span
                                                                class="font-13 text-primary h3 online_display_beneficiary_account_currency"
                                                                id="display_to_recipient_number">
                                                            </span>
                                                            <br />
                                                            <span
                                                                class="font-13 text-primary text-bold display_to_account_type"
                                                                id="display_to_recipient_network_type"> </span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Amount:</td>
                                                        <td>
                                                            <span class="font-13 text-primary h3 display_currency"
                                                                id="display_currency"> </span>
                                                            &nbsp;
                                                            <span
                                                                class="font-13 text-primary h3 display_transfer_amount"
                                                                id="display_transfer_amount"></span>

                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td>Category:</td>
                                                        <td>
                                                            <span class="font-13 text-primary h3 display_category"
                                                                id="display_category"></span>

                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td>Purpose:</td>
                                                        <td>
                                                            <span class="font-13 text-primary h3 display_purpose"
                                                                id="display_purpose"></span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Transfer Date: </td>
                                                        <td>
                                                            <span class="font-13 text-primary h3"
                                                                id="display_transfer_date">{{ date('d F, Y') }}</span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Posted BY: </td>
                                                        <td>
                                                            <span class="font-13 text-primary h3"
                                                                id="display_posted_by">{{ session('userId') }}</span>
                                                        </td>
                                                    </tr>


                                                    <tr>

                                                        <td colspan="2">

                                                            <div class="alert alert-info form-control col-md-12"
                                                                role="alert">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        name="terms_and_conditions"
                                                                        id="terms_and_conditions">
                                                                    <label class="custom-control-label "
                                                                        for="terms_and_conditions">
                                                                        <b>
                                                                            By checking this box, you agree to
                                                                            abide by the Terms and Conditions
                                                                        </b>
                                                                    </label>
                                                                </div>


                                                            </div>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end table-responsive -->
                                        <br>
                                        <div class="form-group text-center">

                                            <span> <button class="btn btn-secondary btn-rounded" type="button"
                                                    id="back_button"><i class="fe-arrow-left"></i>&nbsp;Back</button>
                                                &nbsp; </span>
                                            <span>&nbsp; <button class="btn btn-primary btn-rounded" type="button"
                                                    id="confirm_button">
                                                    <span id="confirm_transfer" data-toggle="modal"
                                                        data-target="#centermodal">Confirm
                                                        Transfer</span>
                                                    <span class="spinner-border spinner-border-sm mr-1" role="status"
                                                        id="spinner" aria-hidden="true"></span>
                                                    <span id="spinner_text">Loading...</span>
                                                </button></span>
                                            <span>&nbsp; <button class="btn btn-light btn-rounded" type="button"
                                                    id="print_receipt" onclick="window.print()">Print Receipt
                                                </button></span>
                                        </div>
                                    </div>

                                </div> <!-- end col -->

                            </div>

                            <!-- Center modal content -->
                            <div class="modal fade top" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header text-center ">

                                        </div>
                                        <div class="modal-body transfer_pin_modal">
                                            <h3 class="modal-title text-primary text-center" id="myCenterModalLabel ">
                                                ENTER
                                                TRANSACTION PIN</h3>
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-9  text-center">
                                                    <form action="#" autocomplete="off" aria-autocomplete="off">
                                                        <input type="text" name="user_pin_input" maxlength="4"
                                                            autocomplete="off" aria-autocomplete="off"
                                                            class="form-control mx-auto key hide_on_print" id="user_pin"
                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                        <br>
                                                        <button class="btn btn-success" type="button"
                                                            id="transfer_pin_modal_button"
                                                            data-dismiss="modal">Submit</button>
                                                    </form>

                                                </div>
                                                <div class="col-md-1"></div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->


                            <div class="col-md-4 m-2 d-none d-sm-block" id="related_information_display"
                                style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">
                                <br><br>

                                <div class=" col-md-12 card card-body ach_transfer_summary">
                                    {{-- <br><br> --}}
                                    <div class="row">
                                        <h6 class="col-md-5">Account Description:</h6>
                                        <h6 class="text-primary display_from_account_name col-md-7"></h6>

                                        <h6 class="col-md-5">Account Number:</h6>
                                        <h6 class="text-primary display_from_account_no col-md-7"></h6>

                                        <h6 class="col-md-5">Available Balance:</h6>

                                        <h6 class="text-primary display_from_account_amount col-md-7"></h6>


                                        <h6 class="col-md-5">Account Currency:</h6>
                                        <h6 class="text-primary display_from_account_currency col-md-7"></h6>


                                    </div>

                                    <hr>
                                    <div class="row">
                                        <h6 class="col-md-5">Recipient Name:</h6>
                                        <h6 class="text-primary display_to_account_name col-md-7"
                                            id="rel_info_display_recipient_name"></h6>

                                        <h6 class=" col-md-5">Recipient Number:</h6>
                                        <h6 class="text-primary display_to_bank_name col-md-7"
                                            id="rel_info_display_recipient_number"></h6>

                                        <h6 class="col-md-5">Recipient Network:</h6>
                                        <h6 class="text-primary display_to_account_no col-md-7"
                                            id="rel_info_display_recipient_network"></h6>

                                        {{-- <h6 class="col-md-5">Account Currency:</h6>
                                            <h6 class="text-primary display_to_account_currency col-md-7"></h6> --}}
                                    </div>
                                    <br>
                                    {{-- <button type="button"
                                            class="btn btn-warning btn-xs waves-effect waves-light beneficiary_details col-md-3 text-primary"
                                            data-toggle="modal" data-target="#standard-modal">
                                            More Info</button> --}}
                                    <hr style="margin-top: 2px; margin-bottom: 5px; ">

                                    <div class="row">
                                        <h6 class="text-primary col-md-5">Transfer Amount:</h6>
                                        <h6 class="text-danger text-bold col-md-7 ">
                                            <span class="display_currency"></span>
                                            &nbsp;
                                            <span id="rel_info_display_transfer_amount"></span>
                                        </h6>
                                    </div>
                                    {{-- <hr style="margin-top: 2px; margin-bottom: 5px; "> --}}

                                    {{-- <div class="row">
                                            <h6 class="text-primary col-md-5">Transaction Fee:</h6>
                                            <h6 class="text-danger text-bold col-md-7">0.08% of transfer amount</h6>
                                        </div> --}}

                                    {{-- <hr>
                                        <div class="row">
                                            <h6 class="text-primary col-md-5">Please Note:</h6>
                                            <h6 class="text-danger col-md-7">ACH Tranfers should be above (SLL
                                                30,000,000.00)</h6>
                                        </div> --}}


                                </div>

                            </div>

                        </div>

                    </div>



                    {{-- <div class="col-md-2"></div> --}}

                </div> <!-- end card-body -->




            </div> <!-- end col -->

        </div> <!-- end row -->



    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function from_account() {
                $.ajax({
                    type: 'GET',
                    url: '../get-my-account',
                    datatype: "application/json",
                    success: function(response) {
                        if (response.responseCode == '000') {
                            let data = response.data
                            $.each(data, function(index) {
                                $('#from_account').append($('<option>', {
                                    value: data[index].accountType + '~' + data[index]
                                        .accountDesc + '~' + data[index].accountNumber +
                                        '~' +
                                        data[index].currency + '~' + data[index]
                                        .availableBalance
                                }).text(data[index].accountType + '~' + data[index]
                                    .accountNumber +
                                    '~' + data[index].currency + '~' + data[index]
                                    .availableBalance
                                ));
                            });
                        }

                    },
                    error: function(xhr, status, error) {

                        setTimeout(function() {
                            from_account();
                        }, $.ajaxSetup().retryAfter)
                    }

                })
            }

            function get_beneficiaries() {
                $.ajax({
                    type: 'GET',
                    url: '../payment-beneficiary-list-api',
                    datatype: "application/json",
                    success: function(response) {
                        let data = response.data;
                        if (response.responseCode === '000') {

                            $.each(data, function(index) {
                                $('#to_account').append($('<option>', {
                                        value: data[index].NICKNAME + '~' + data[index]
                                            .ACCOUNT +
                                            '~' + data[index].PAYEE_NAME
                                    })
                                    .text(data[index].NICKNAME + ' - ' + data[index]
                                        .ACCOUNT + ' - ' +
                                        data[index].PAYEE_NAME));
                            })
                        }
                    },
                    error: function(xhr, status, error) {

                        setTimeout(function() {
                            get_beneficiaries();
                        }, $.ajaxSetup().retryAfter)
                    }

                })
            }

            function expenseTypes() {
                $.ajax({
                    "type": "GET",
                    "url": "../get-expenses",
                    datatype: "application/json",
                    success: function(response) {
                        let data = response.data;
                        $.each(data, function(index) {

                            if ('Others' == data[index].expenseName) {
                                $("#category").append($('<option selected>', {
                                    value: data[index].expenseCode + '~' + data[
                                            index]
                                        .expenseName
                                }).text(data[index].expenseName))

                                $("#onetime_category").append($('<option selected>', {
                                    value: data[index].expenseCode + '~' + data[
                                            index]
                                        .expenseName
                                }).text(data[index].expenseName))

                            } else {
                                $("#category").append($('<option>', {
                                    value: data[index].expenseCode + '~' + data[
                                            index]
                                        .expenseName
                                }).text(data[index].expenseName))

                                $("#onetime_category").append($('<option selected>', {
                                    value: data[index].expenseCode + '~' + data[
                                            index]
                                        .expenseName
                                }).text(data[index].expenseName))
                            }
                        });
                    },
                    error: function(xhr, status, error) {

                        setTimeout(function() {
                            expenseTypes()
                        }, $.ajaxSetup().retryAfter)
                    }
                })
            }


            function paymentType() {
                var payment_type = @json($payment_type);
                $.ajax({
                    type: 'GET',
                    url: '../get-payment-types-api',
                    datatype: "application/json",
                    success: function(response) {
                        let data = response.data.data[0].paySubTypes
                        $.each(data, function(index) {
                            // var image = new Image();
                            // var base64_string = data[index].paymentLogo
                            // image.src = "data:image/png;base64," + base64_string
                            $('#onetime_beneficiary_network').append($('<option>', {
                                value: data[index].paymentAccount + '~' + data[index]
                                    .paymentCode + '~' + data[index].paymentLabel
                            }).text(data[index].paymentDescription));
                        })
                    },
                    error: function(xhr, status, error) {

                        setTimeout(function() {
                            paymentType()
                        }, $.ajaxSetup().retryAfter)
                    }
                })
            }

            function formatToCurrency(amount) {
                return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
            };


            $(document).ready(function() {

                setTimeout(function() {
                    from_account();
                    paymentType();
                    expenseTypes();
                    get_beneficiaries();
                }, 200);

                $("#beneficiary_selected").show();
                $("#onetime_beneficiary").hide();
                $("#spinner").hide();
                $("#print_receipt").hide();
                $("#spinner_text").hide();
                $("#onetime_beneficiary_form").hide();

                $(".radio").click(function() {
                    var type = $("input[type='radio']:checked").val();

                    if (type == "beneficiary") {
                        $("#beneficiary_selected").show();
                        $("#onetime_beneficiary").hide();
                    }

                    if (type == "onetime") {
                        $("#onetime_beneficiary").show();
                        $("#beneficiary_selected").hide();

                    }
                })
                $("#checkmeout0").change(function() {
                    if ($(this).is(":checked")) {
                        // {{-- alert("Checked!"); --}}
                        $("#saved_beneficiary_form").hide();

                        $("#onetime_beneficiary_form").toggle(300);
                        $(".bene_details").hide();
                        $("#rel_info_display_recipient_name").text($("#onetime_beneficiary_name")
                            .val())
                        $("#rel_info_display_recipient_number").text($(
                                "#onetime_beneficiary_number")
                            .val())
                        if ($("#onetime_beneficiary_network").val() === "" || $(
                                "#onetime_beneficiary_network").val() === undefined) {
                            $("#rel_info_display_recipient_network").text("")
                        } else {
                            $("#rel_info_display_recipient_network").text($(
                                    "#onetime_beneficiary_network")
                                .val()
                                .split('~')[1])
                        }
                        $("#rel_info_display_transfer_amount").text($("#onetime_amount").val())

                    } else {
                        $("#onetime_beneficiary_form").hide();
                        $("#saved_beneficiary_form").toggle(300);
                        $(".bene_details").toggle(300);
                        $("#rel_info_display_recipient_network").text($("#beneficiary_network").val())
                        $("#rel_info_display_recipient_name").text($("#beneficiary_name").val())
                        $("#rel_info_display_recipient_number").text($("#beneficiary_number")
                            .val())
                        $("#rel_info_display_transfer_amount").text($("#amount").val())
                    }
                })
                // {{-- hide select accounts info --}}
                $(".from_account_display_info").hide()
                $(".to_account_display_info").hide()
                // $("#schedule_payment_date").hide()
                // $('#schedule_payment_contraint_input').hide()
                // $('.display_schedule_payment_date').text('N/A')

                $("#transaction_form").show()
                $("#transaction_summary").hide()



                $("#back_button").click(function(e) {
                    e.preventDefault()
                    $("#transaction_summary").hide()
                    $("#transaction_form").show()
                    $("#related_information_display").show()
                })

                $("#from_account").change(function() {
                    var from_account = $(this).val()

                    if (from_account.trim() == '' || from_account.trim() == undefined) {
                        // alert('money')
                        $(".from_account_display_info").hide()

                    } else {
                        from_account_info = from_account.split("~")

                        var to_account = $('#to_account').val()


                        // set summary values for display
                        $(".display_from_account_type").text(from_account_info[0].trim())
                        $(".display_from_account_name").text(from_account_info[1].trim())
                        $(".display_from_account_no").text(from_account_info[2].trim())
                        $(".display_from_account_currency").text(from_account_info[3].trim())

                        $(".display_currency").text(from_account_info[3]
                            .trim()) // set summary currency

                        amt = from_account_info[4].trim()
                        $(".display_from_account_amount").text(formatToCurrency(parseFloat(
                            from_account_info[4]
                            .trim())))
                        // {{-- alert('and show '  + from_account_info[3].trim()) --}}
                        $(".from_account_display_info").show()
                        // alert(from_account_info[0]);
                    }

                })

                $("#to_account").on("change", function() {
                    let account_details = $("#to_account").val().split('~');
                    for (let i = 0; i < 3; i++) {
                        if (account_details[i] === undefined) {
                            account_details[i] = " "
                        }
                    }
                    //populate beneficiary info

                    $("#beneficiary_name").val(account_details[0]);
                    $("#beneficiary_number").val(account_details[1]);
                    $("#beneficiary_network").val(account_details[2]);
                    //populate rel_info
                    $("#rel_info_display_recipient_name").text(account_details[0]);
                    $("#rel_info_display_recipient_number").text(account_details[1]);
                    $("#rel_info_display_recipient_network").text(account_details[2]);



                }) //
                $("#amount").on("input", function() {
                    $("#rel_info_display_transfer_amount").text($("#amount").val())
                })
                // onetime rel info display
                $("#onetime_beneficiary_name").on("input", function() {
                    $("#rel_info_display_recipient_name").text($("#onetime_beneficiary_name")
                        .val())
                })
                //
                $("#onetime_beneficiary_number").on("input", function() {
                    $("#rel_info_display_recipient_number").text($("#onetime_beneficiary_number")
                        .val())
                })
                //
                $("#onetime_beneficiary_network").on("input", function() {
                    if ($("#onetime_beneficiary_network").val() === "" || $(
                            "#onetime_beneficiary_network").val() === undefined) {
                        $("#rel_info_display_recipient_network").text("")
                    } else {
                        $("#rel_info_display_recipient_network").text($(
                                "#onetime_beneficiary_network")
                            .val()
                            .split('~')[1])
                    }
                })
                //
                $("#onetime_amount").on("input", function() {
                    $("#rel_info_display_transfer_amount").text($("#onetime_amount").val())
                })



                $("#next_button").click(function(e) {
                    e.preventDefault();

                    let oneTimeTransfer = $('#checkmeout0').is(':checked')

                    let from_account
                    let from_account_
                    // let currency
                    let amount
                    let recipient_name
                    let recipient_number
                    let recipient_network
                    let category
                    let naration
                    let user_pin



                    if (!oneTimeTransfer) {
                        amount = $("#amount").val();
                        recipient_name = $("#beneficiary_name").val();
                        recipient_number = $("#beneficiary_number").val();
                        recipient_network = $("#beneficiary_network").val();
                        category = ($("#category").val() === "Others") ? $("#category").val() : $(
                                "#category").val()
                            .split('~')[1];
                        naration = $("#purpose").val();
                    }

                    if (oneTimeTransfer) {

                        amount = $("#onetime_amount").val();
                        recipient_name = $("#onetime_beneficiary_name").val()
                        recipient_number = $("#onetime_beneficiary_number").val();
                        recipient_network = $("#onetime_beneficiary_network").val().split('~')[1];
                        category = $("#onetime_category").val()
                        naration = $("#onetime_purpose").val();
                    }

                    from_account = $("#from_account").val().split('~');
                    from_account_ = from_account[2];
                    currency = from_account[3];

                    function evaluateFormMember(member, alert_message) {

                        if (member === "" || member === undefined) {
                            toaster(alert_message, 'error', 2000)
                            return true
                        } else return false
                    }

                    if (evaluateFormMember(from_account_, "please select account")) {
                        return false
                    } else if (
                        evaluateFormMember(recipient_name, "please enter beneficiary name")) {
                        return false
                    } else if (
                        evaluateFormMember(recipient_number, "please enter beneficiary number")) {
                        return false
                    } else if (
                        evaluateFormMember(recipient_network, "please enter beneficiary network")) {
                        return false
                    } else if (
                        evaluateFormMember(amount, "please enter amount")) {
                        return false
                    } else if (evaluateFormMember(naration, "please enter transfer purpose")) {
                        return false
                    } else {

                        $("#display_from_account_type").text();
                        $("#display_from_account_name").text();
                        $("#display_from_account_no").text();
                        $("#display_currency").text();
                        $("#display_transfer_amount").text(amount);
                        $("#display_to_recipient_name").text(recipient_name);
                        $("#display_to_recipient_number").text(recipient_number);
                        $("#display_to_recipient_network_type").text(recipient_network);
                        $("#display_category").text(category);
                        $("#display_purpose").text(naration);
                        $("#transaction_form").hide()
                        $("#transaction_summary").show()
                        console.log("mine")


                        $("#confirm_button").click(function(e) {
                            e.preventDefault();
                            console.log("clicked")
                            let clicked = true;
                            if ($("#terms_and_conditions").is(":checked")) {

                                $("#transfer_pin_modal_button").click(function(e) {
                                    e.preventDefault();
                                    user_pin = $("#user_pin").val()
                                    let payment_type = "MOM"
                                    if ($("#user_pin").val().length < 4) {
                                        toaster('Enter 4 digit pin', 'error', 2000)
                                        $("#user_pin").val("")
                                        return false
                                    }
                                    if (!clicked) {
                                        return false

                                    }
                                    clicked = false
                                    console.log("im here")
                                    $.ajax({
                                        type: "POST",
                                        url: "../mobile-money-api",
                                        datatype: "application/json",
                                        data: {
                                            'accountNumber': from_account_,
                                            'amount': amount,
                                            // 'entrySource': entry_source,
                                            'naration': naration,
                                            // 'category_': category,
                                            'payeeName': recipient_name,
                                            'payeeNumber': recipient_number,
                                            'paymentCode': recipient_network,
                                            'paymentType': payment_type,
                                            'pinCode': user_pin
                                        },
                                        headers: {
                                            'X-CSRF-TOKEN': $(
                                                    'meta[name="csrf-token"]')
                                                .attr(
                                                    'content')
                                        },
                                        success: function(response) {
                                            if (response.responseCode ==
                                                '000') {
                                                Swal.fire(
                                                    '',
                                                    response.message,
                                                    'success'
                                                );

                                                console.log("success")
                                            } else {
                                                toaster(response.message,
                                                    'error',
                                                    2000);
                                                console.log("fail")
                                            }
                                        }
                                    })
                                    $("#user_pin").val("")
                                })
                            } else {
                                toaster('Accept Terms & Conditions to continue', 'error', 2000)
                                return false;
                            }
                        })
                    }
                })

            });
    </script>
    @endsection
