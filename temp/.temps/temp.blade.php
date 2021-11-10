<div class="col-md-7 site-card m-2" id="transaction_summary">
    <br>
    <div class="col-md-12">
        <div class="card border p-3 mt-4 mt-lg-0 rounded">
            <h4 class="header-title mb-3">Transfer Detail Summary</h4>

            <p class="display-4 text-center text-success success-message "></p>

            <div class="table-responsive table-striped table-bordered">
                <table class="table mb-0">

                    <tbody>
                        <tr class="success_gif" style="display: none">
                            <td class="text-center bg-white" colspan="2">
                                <img src="{{ asset('land_asset/images/statement_success.gif') }}" style="zoom: 0.5"
                                    alt="">
                            </td>
                        </tr>
                        <tr>
                            <td>From Account:</td>
                            <td>
                                <span class="font-13 text-primary text-bold display_from_account_type"
                                    id="display_from_account_type"></span>
                                <span class="d-block font-13 text-primary text-bold display_from_account_name"
                                    id="display_from_account_name"> </span>
                                <span class="d-block font-13 text-primary text-bold display_from_account_no"
                                    id="display_from_account_no"></span>
                            </td>
                        </tr>

                        <tr>
                            <td>To Account:</td>
                            <td>

                                <span class="font-13 text-primary text-bold display_to_account_type"
                                    id="display_to_account_type"> </span>
                                <span class="d-block font-13 text-primary text-bold display_to_account_name"
                                    id="display_to_account_name"> </span>
                                <span class="d-block font-13 text-primary text-bold display_to_account_no"
                                    id="display_to_account_no"> </span>


                                {{-- <span class="d-block font-13 text-primary text-bold display_to_account_name"
                                                id="online_display_beneficiary_alias_name"> </span> --}}

                                <span class="font-13 text-primary h3 online_display_beneficiary_account_no"
                                    id="online_display_beneficiary_account_no"> </span>
                                {{-- &nbsp; | &nbsp; --}}
                                <span class="font-13 text-primary h3 online_display_beneficiary_account_currency"
                                    id="online_display_beneficiary_account_currency">
                                </span>

                                <span class="d-block font-13 text-primary text-bold online_display_beneficiary_email"
                                    id="online_display_beneficiary_email"> </span>

                                <span class="d-block font-13 text-primary text-bold online_display_beneficiary_phone"
                                    id="online_display_beneficiary_phone"> </span>


                            </td>
                        </tr>

                        <tr>
                            <td>Amount:</td>
                            <td>
                                <span class="font-15 text-primary h3 display_currency" id="display_currency"> </span>
                                &nbsp;
                                <span class="font-15 text-primary h3 display_converted_amount"
                                    id="display_transfer_amount"></span>

                            </td>
                        </tr>


                        <tr>
                            <td>Category:</td>
                            <td>
                                <span class="font-13 text-primary h3 display_category" id="display_category"></span>

                            </td>
                        </tr>


                        <tr>
                            <td>Purpose:</td>
                            <td>
                                <span class="font-13 text-primary h3 display_purpose" id="display_purpose"></span>
                            </td>
                        </tr>


                        {{-- <tr>
                                    <td>Schedule Payment:</td>
                                    <td>
                                        <span
                                            class="font-13 text-primary h3 display_schedule_payment"
                                            id="display_schedule_payment">NO </span>
                                        &nbsp; | &nbsp;
                                        <span
                                            class="font-13 text-primary h3 display_schedule_payment_date"
                                            id="display_schedule_payment_date"> N/A
                                        </span>
                                    </td>
                                </tr> --}}


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

                        {{-- <tr class="hide_on_print">
                                    <td>Enter Pin: </td>
                                    <td>

                                        <input type="text" name="user_pin" class="form-control key " id="user_pin"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">

                                    </td>
                                </tr> --}}

                        <tr>

                            <td colspan="2">

                                <div class="alert alert-info form-control col-md-12" role="alert">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="terms_and_conditions"
                                            name="terms_and_conditions" id="terms_and_conditions">
                                        <label class="custom-control-label " for="terms_and_conditions">
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

                <span> <button class="btn btn-secondary btn-rounded" type="button" id="back_button"><i
                            class="mdi mdi-reply-all-outline"></i>
                        &nbsp;Back</button> &nbsp; </span>
                <span>&nbsp; <button class="btn btn-primary btn-rounded" type="button" id="confirm_transfer_button">
                        <span id="confirm_transfer">Confirm Transfer</span>
                        <span class="spinner-border spinner-border-sm mr-1" role="status" id="spinner"
                            aria-hidden="true" style="display: none"></span>
                        <span id="spinner-text" style="display: none">Loading...</span>
                    </button></span>
                <span>&nbsp; <button class="btn btn-light btn-rounded hide_on_print" type="button" style="display: none"
                        id="print_receipt" onclick="window.print()">Print
                        Receipt
                    </button></span>
            </div>
        </div>

    </div> <!-- end col -->

</div>



{{-- ============================================================================================================== --}}
{{-- local bank --}}
{{-- ============================================================================================================== --}}

<div class="receipt" style="display: none">
    <div class="container card card-body">

        <div class="container">
            <div class="">
                <div class="col-md-12 col-md-offset-3 body-main">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 "> <img class="img " alt="InvoIce Template"
                                    src="{{ asset('assets/images/' . env('APPLICATION_INFO_LOGO_LIGHT')) }} "
                                    style="zoom: 0.6" /> </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4 text-right">
                                <h4 class="text-primary"><strong>ROKEL COMMERCIAL BANK</strong>
                                </h4>
                                <p>25-27 Siaka Stevens St</p>
                                <p> Freetown, Sierra Leone</p>
                                <p>rokelsl@rokelbank.sl</p>
                                <p>(+232)-76-22-25-01</p>
                            </div>
                        </div>
                        <br>
                        <div class="page-header">
                            <h2><span id="personal_transfer_receipt">Transfer Receipt</span>
                                <span id="coporate_transfer_approval">Transaction Awaiting
                                    Approval</span>
                            </h2>
                        </div>
                        <br>
                        <br />

                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        {{-- <th>#</th> --}}
                                        <th>Description</th>
                                        <th class="text-right">Further Details</th>
                                        {{-- <th>Amount </th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        {{-- <th scope="row">1</th> --}}
                                        <td>Transfer From Account Number</td>
                                        <td class="text-right"><span id="from_account_receipt"></span></td>
                                        {{-- <td></td> --}}
                                    </tr>
                                    <tr>
                                        {{-- <th scope="row">1</th> --}}
                                        <td>Type of Transfer</td>
                                        <td class="text-right"><span id="type_of_transfer"></span></td>
                                        {{-- <td></td> --}}
                                    </tr>
                                    <tr>
                                        {{-- <th scope="row">1</th> --}}
                                        <td>Receiver Bank Name</td>
                                        <td class="text-right"><span id="receiver_bank_name"></span></td>
                                        {{-- <td></td> --}}
                                    </tr>

                                    <tr>
                                        {{-- <th scope="row">1</th> --}}
                                        <td>Receiver Account Name</td>
                                        <td class="text-right"><span id="receiver_account_name"></span></td>
                                        {{-- <td></td> --}}
                                    </tr>
                                    <tr>
                                        {{-- <th scope="row">2</th> --}}
                                        <td>Receiver Account Number</td>
                                        <td class="text-right"><span id="receiver_account_number"></span></td>
                                        {{-- <td></td> --}}
                                    </tr>
                                    <tr>
                                        {{-- <th scope="row">3</th> --}}
                                        <td>Transfer Category</td>
                                        <td class="text-right"><span id="category_receipt"></span></td>
                                        {{-- <td></td> --}}
                                    </tr>
                                    <tr>
                                        {{-- <th scope="row">3</th> --}}
                                        <td>Transfer Purpose</td>
                                        <td class="text-right"><span id="purpose_receipt"></span></td>
                                        {{-- <td></td> --}}
                                    </tr>
                                    <tr>
                                        {{-- <th scope="row">3</th> --}}
                                        <td>Amount</td>
                                        {{-- <td></td> --}}
                                        <td class="text-right"><strong>(<span class="receipt_currency"></span>)
                                                &nbsp;<span id="amount_receipt"></span></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        {{-- <th scope="row">3</th> --}}
                                        <td>Transaction Fee </td>
                                        {{-- <td></td> --}}
                                        <td class="text-right"><strong>(<span class="receipt_currency"></span>) &nbsp;
                                                15.00</strong></td>
                                    </tr>
                                    {{-- <tr>
                                            <th scope="row">3</th>
                                            <td><strong>Total Amount</strong> </td>
                                            <td></td>
                                            <td><strong><span
                                                        id="total_amount_receipt"></span></strong>
                                            </td>
                                        </tr> --}}
                                    <tr>
                                        {{-- <th scope="row">3</th> --}}
                                        {{-- <td></td> --}}
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> <!-- end table-responsive-->
                        <br>
                        <div>
                            <div class="col-md-12">
                                <p><b>Date Posted :</b> {{ date('d F, Y') }}</p> <br /> <br />
                                <p><b>Posted By : {{ session('userId') }}</b></p>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <button class="btn btn-light btn-rounded hide_on_print text-center" type="button"
                                    onclick="window.print()">Print
                                    Receipt
                                </button>


                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--  transaction summary --}}

<div class="col-md-7  m-2" id="transaction_summary"
    style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226)); display:none;">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 ">
            <br><br><br>

            <div class="table-responsive card table_over_flow">
                <table class="table mb-0 table-bordered table-striped  ">

                    <tbody>
                        <tr class="success_gif">
                            <td class="text-center bg-white" colspan="2">
                                <img src="{{ asset('land_asset/images/statement_success.gif') }}" style="zoom: 0.5"
                                    alt="">
                            </td>
                        </tr>
                        <tr>
                            <td>From Account:</td>
                            <td>
                                <span class="font-13 text-primary text-bold display_from_account_type"
                                    id="display_from_account_type"></span>
                                <span class="d-block font-13 text-primary text-bold display_from_account_name"
                                    id="display_from_account_name"> </span>
                                <span class="d-block font-13 text-primary text-bold display_from_account_no"
                                    id="display_from_account_no"></span>
                            </td>
                        </tr>

                        <tr>
                            <td>To Account:</td>
                            <td>

                                <span class="font-13 text-primary text-bold display_to_account_type"
                                    id="display_to_account_type"> </span>
                                <span class="d-block font-13 text-primary text-bold display_to_account_name"
                                    id="display_to_account_name"> </span>
                                <span class="d-block font-13 text-primary text-bold online_display_beneficiary_email"
                                    id="online_display_beneficiary_bank_name"></span>
                                <span class="d-block font-13 text-primary text-bold display_to_account_no"
                                    id="display_to_account_no"> </span>




                            </td>
                        </tr>

                        <tr>
                            <td>Amount:</td>
                            <td>
                                <span class="font-15 text-primary h3 display_currency" id="display_currency"> </span>
                                &nbsp;
                                <span class="font-15 text-primary h3 display_transfer_amount"
                                    id="display_transfer_amount"></span>

                            </td>
                        </tr>


                        <tr>
                            <td>Category:</td>
                            <td>
                                <span class="font-13 text-primary h3 display_category" id="display_category"></span>

                            </td>
                        </tr>


                        <tr>
                            <td>Purpose:</td>
                            <td>
                                <span class="font-13 text-primary h3 display_purpose" id="display_purpose"></span>
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
                                    id="display_posted_by">{{ session()->get('userAlias') }}</span>
                            </td>
                        </tr>

                        <tr>

                            <td colspan="2">

                                <div class="alert alert-info form-control col-md-12" role="alert">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="terms_and_conditions"
                                            id="terms_and_conditions">
                                        <label class="custom-control-label " for="terms_and_conditions">
                                            <b>
                                                <span class="terms_and_conditions">By
                                                    checking this box, you agree to
                                                    abide by the Terms and
                                                    Conditions</span>

                                                <span class="terms_and_conditions_fee">
                                                    By checking this box, you agree to a
                                                    fee of <span class="fee_currency"></span>
                                                    <span class="fee_amount"></span>
                                                    abide by the Terms and Conditions
                                                </span>


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


            <!-- Center modal content -->
            <div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header text-center ">
                            <h3 class="modal-title text-primary text-center " id="myCenterModalLabel ">ENTER TRANSACTION
                                PIN</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                        </div>
                        <div class="modal-body transfer_pin_modal">

                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-9  text-center">
                                    <form action="#" autocomplete="off" aria-autocomplete="off">
                                        <input type="text" name="user_pin" maxlength="4"
                                            class="form-control key hide_on_print" id="user_pin"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                        <br>
                                        <button class="btn btn-success waves-effect waves-light" type="button"
                                            id="transfer_pin" data-dismiss="modal">Submit</button>
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



            <br>
            <div class="form-group text-center">

                <span> <button class="btn btn-secondary btn-rounded" type="button" id="back_button"><i
                            class="mdi mdi-reply-all-outline"></i>&nbsp;
                        Back</button> &nbsp;
                </span>
                <span>
                    &nbsp;
                    <button class="btn btn-primary btn-rounded " type="button" id="confirm_modal_button">
                        <span id="confirm_transfer" data-toggle="modal" data-target="#centermodal">Confirm
                            Transfer</span>
                        <span class="spinner-border spinner-border-sm mr-1" role="status" id="spinner"
                            aria-hidden="true"></span>
                        <span id="spinner-text">Loading...</span>
                    </button>
                </span>

                <span>&nbsp; <button class="btn btn-light btn-rounded hide_on_print" type="button" id="print_receipt"
                        onclick="window.print()">Print
                        Receipt
                    </button></span>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>

</div>

{{-- Details Modal --}}

<!-- Standard modal content -->
<div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-danger" id="standard-modalLabel">Beneficiary Details</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <h4 class="text-primary">Bank Details</h4>


                    <div class="form-group row">
                        <label class="col-md-5">Bank Name:</label>
                        <span class="col-md-7" id="beneficiary_details_bank_name"></span>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-5">Swift Code:</label>
                        <span class="col-md-7" id="beneficiary_details_bank_swift_code"></span>
                    </div>
                    <hr>

                    <h4 class="text-primary">Account Details</h4>

                    <div class="form-group row">
                        <label class="col-md-5">Account Name:</label>
                        <span class="col-md-7" id="beneficiary_details_account_name"></span>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-5">Account Number:</label>
                        <span class="col-md-7" id="beneficiary_details_account_number"></span>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-5">Currency:</label>
                        <span class="col-md-7" id="beneficiary_details_account_currency"></span>
                    </div>
                    <hr>

                    <h4 class="text-primary">Beneficiary Details </h4>
                    <div class="form-group row">
                        <label class="col-md-5">Nickname:</label>
                        <span class="col-md-7" id="beneficiary_details_name"></span>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Address:</label>
                        <span class="col-md-7" id="beneficiary_details_address"></span>
                    </div>
                    {{-- <div class="form-group row">
                                            <label class="col-md-5">Telephone:</label>
                                            <span class="col-md-7" id="beneficiary_details_telephone"></span>
                                        </div> --}}
                    <div class="form-group row">
                        <label class="col-md-5">Email:</label>
                        <span class="col-md-7" id="beneficiary_details_email"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

{{-- Standing Order Receipt --}}


<div class="receipt" style="display:none;">
    <div class="container card card-body">

        <div class="container">
            <div class="___class_+?19___">
                <div class="col-md-12 col-md-offset-3 body-main">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 "> <img class="img " alt="InvoIce Template"
                                    src="{{ asset('assets/images/' . env('APPLICATION_INFO_LOGO_LIGHT')) }} "
                                    style="zoom: 0.6" /> </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4 text-right">
                                <h4 class="text-primary"><strong>ROKEL COMMERCIAL
                                        BANK</strong>
                                </h4>
                                <p>25-27 Siaka Stevens St</p>
                                <p> Freetown, Sierra Leone</p>
                                <p>rokelsl@rokelbank.sl</p>
                                <p>(+232)-76-22-25-01</p>
                            </div>
                        </div>
                        <br>
                        <div class="page-header">
                            <h2>Standing Order Receipt </h2>
                        </div>
                    </div>
                    <br>
                    <div class="page-header">
                        <h2>Standing Order Receipt </h2>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-light">
                                <tr>
                                    {{-- <th>#</th> --}}
                                    <th>Description</th>
                                    <th>Further Details</th>
                                    {{-- <th>Amount (<span id="receipt_currency"></span>)</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    {{-- <th scope="row">1</th> --}}
                                    <td>Transfer From Account Number</td>
                                    <td><span class="font-13 text-primary text-bold display_from_account_no"></span>
                                    </td>
                                    {{-- <td></td> --}}
                                </tr>
                                <tr>
                                    {{-- <th scope="row">2</th> --}}
                                    <td>Transfer To Account Number</td>
                                    <td><span class="font-13 text-primary text-bold display_to_account_no"></span>
                                    </td>
                                    {{-- <td></td> --}}
                                </tr>
                                <tr>
                                    {{-- <th scope="row">3</th> --}}
                                    <td>Narration</td>
                                    <td><span class="font-13 text-primary text-bold display_purpose"></span>
                                    </td>
                                    {{-- <td></td> --}}
                                </tr>
                                <tr>
                                    <td>Start Date:</td>
                                    <td>
                                        <span class="font-13 text-primary h3 display_so_start_date"></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>End Date:</td>
                                    <td>
                                        <span class="font-13 text-primary h3 display_so_end_date"></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Frequency:</td>
                                    <td>
                                        <span class="font-13 text-primary h3 display_frequency_so"></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Transfer Date: </td>
                                    <td>
                                        <span class="font-13 text-primary h3"
                                            id="display_transfer_date">{{ date('d F , Y') }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    {{-- <th scope="row">3</th> --}}
                                    <td>Amount</td>
                                    {{-- <td></td> --}}
                                    <td><strong>(<span class="display_currency"></span>)<span
                                                class="display_transfer_amount"></span></strong>
                                    </td>
                                </tr>
                                <tr>
                                    {{-- <th scope="row">3</th> --}}
                                    <td>Transaction Fee </td>
                                    {{-- <td></td> --}}
                                    <td><strong>(<span class="display_currency"></span>)15.00</strong>
                                    </td>
                                </tr>
                                {{-- <tr>
                                            <th scope="row">3</th>
                                            <td><strong>Total Amount</strong> </td>
                                            <td></td>
                                            <td><strong><span
                                                        id="total_amount_receipt"></span></strong>
                                            </td>
                                        </tr> --}}
                                <tr>
                                    {{-- <th scope="row">3</th> --}}
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                    <br>
                    <div>
                        <div class="col-md-12">
                            <p><b>Date Posted :</b> {{ date('d F, Y') }}
                            </p> <br /> <br />
                            <p><b>Posted By : {{ session('userId') }}</b></p>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-2">
                            <button class="btn btn-light btn-rounded hide_on_print text-center" type="button"
                                onclick="window.print()">Print
                                Receipt
                            </button>


                        </div>
                        <div class="col-md-5"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- transaction summary --}}

<div class="col-md-7 site-card m-2" id="transaction_summary">
    <div class="___class_+?99___">
        {{-- <br><br>
        <div class="col-md-12 card border p-3 mt-4 mt-lg-0 rounded">
--}}

        <h4 class="header-title mb-3">Transfer Detail Summary</h4>

        <div class="table-responsive card table_over_flow">
            <table class="table mb-0 table-bordered table-striped  ">

                <tbody>
                    <tr>
                        <td>From Account:</td>
                        <td>
                            {{-- <span class="font-13 text-primary text-bold display_from_account_type"
                                        id="display_from_account_type"></span> --}}
                            <span class="d-block font-13 text-primary text-bold display_from_account_name"
                                id="display_from_account_name"> </span>
                            <span class="d-block font-13 text-primary text-bold display_from_account_no"
                                id="display_from_account_no"></span>
                        </td>
                    </tr>

                    <tr>
                        <td>To Account:</td>
                        <td>

                            {{-- <span class="font-13 text-primary text-bold display_to_account_type"
                                        id="display_to_account_type"> </span> --}}
                            <span class="d-block font-13 text-primary text-bold display_to_account_name"
                                id="display_to_account_name"> </span>
                            {{-- <span class="d-block font-13 text-primary text-bold online_display_beneficiary_email"
                                        id="online_display_beneficiary_bank_name"></span> --}}
                            <span class="d-block font-13 text-primary text-bold display_to_account_no"
                                id="display_to_account_no"> </span>

                        </td>
                    </tr>

                    <tr>
                        <td>Amount:</td>
                        <td>
                            <span class="font-15 text-primary h3 display_currency" id="display_currency"> </span>
                            &nbsp;
                            <span class="font-15 text-primary h3 display_transfer_amount"
                                id="display_transfer_amount"></span>

                        </td>
                    </tr>

                    <tr>
                        <td>Narration:</td>
                        <td>
                            <span class="font-13 text-primary h3 display_purpose"></span>
                        </td>
                    </tr>

                    <tr>
                        <td>Start Date:</td>
                        <td>
                            <span class="font-13 text-primary h3 display_so_start_date"></span>
                        </td>
                    </tr>

                    <tr>
                        <td>End Date:</td>
                        <td>
                            <span class="font-13 text-primary h3 display_so_end_date"></span>
                        </td>
                    </tr>

                    <tr>
                        <td>Frequency:</td>
                        <td>
                            <span class="font-13 text-primary h3 display_frequency_so"></span>
                        </td>
                    </tr>

                    <tr>
                        <td>Transfer Date: </td>
                        <td>
                            <span class="font-13 text-primary h3" id="display_transfer_date">{{ date('d F, Y') }}</span>
                        </td>
                    </tr>

                    <tr>
                        <td>Posted BY: </td>
                        <td>
                            <span class="font-13 text-primary h3"
                                id="display_posted_by">{{ session()->get('userAlias') }}</span>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <!-- end table-responsive -->



        <br>
        <div class="form-group text-center">

            <span> <button class="btn btn-secondary btn-rounded" type="button" id="back_button"> <i
                        class="mdi mdi-reply-all-outline"></i>&nbsp;Back</button>
                &nbsp; </span>
            <span>
                &nbsp;
                <button class="btn btn-primary btn-rounded" id="confirm_transfer_button" type="button">
                    <span id="confirm_transfer_text">Confirm</span>
                    <span class="spinner-border spinner-border-sm mr-1" role="status" id="spinner" aria-hidden="true"
                        style="display: none"></span>
                    <span id="spinner-text" style="display: none">Loading...</span>
                </button>
            </span>

            <span>&nbsp; <button class="btn btn-light btn-rounded hide_on_print" type="button" id="print_receipt"
                    style="display: none" onclick="window.print()">Print
                    Receipt
                </button></span>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>

{{--  --}}
<!-- Info Alert Modal -->
{{-- <div id="info-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-body p-4">
                                <div class="text-center">
                                    <i class="dripicons-information h1 text-info"></i>
                                    <h4 class="mt-2">Heads up!</h4>
                                    <p class="mt-3">Cras mattis consectetur purus sit amet fermentum. Cras justo
                                        odio, dapibus ac facilisis in, egestas eget quam.</p>
                                    <button type="button" class="btn btn-info my-2"
                                        data-dismiss="modal">Continue</button>
                                </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal --> --}}
<!-- Modal -->
{{-- <div id="multiple-one" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="multiple-oneModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="POST" id="confirm_details" autocomplete="off" aria-autocomplete="off">
                                <div class="modal-header">
                                    <h4 class="modal-title font-16 purple-color" id="multiple-oneModalLabel">Confirm
                                        Details</h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">×</button>
                                </div>

                                <div class="modal-body">


                                    <div class="row" id="transaction_summary">


                                        <div class="col-md-12">
                                            <div class="border p-3 mt-4 mt-lg-0 rounded">
                                                <h4 class="header-title mb-3">Transfer Detail Summary</h4>

                                                <div class="table-responsive">
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
                                                                <td>To Account:</td>
                                                                <td>

                                                                    <span
                                                                        class="font-13 text-primary text-bold display_to_account_type"
                                                                        id="display_to_account_type"> </span>
                                                                    <span
                                                                        class="d-block font-13 text-primary text-bold display_to_account_name"
                                                                        id="display_to_account_name"> </span>
                                                                    <span
                                                                        class="d-block font-13 text-primary text-bold display_to_account_no"
                                                                        id="display_to_account_no"> </span>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>Amount:</td>
                                                                <td>
                                                                    <span
                                                                        class="font-15 text-primary h3 display_currency"
                                                                        id="display_currency"> </span>
                                                                    &nbsp;
                                                                    <span
                                                                        class="font-15 text-primary h3 display_transfer_amount"
                                                                        id="display_transfer_amount"></span>

                                                                </td>
                                                            </tr>


                                                            <tr>
                                                                <td>Category:</td>
                                                                <td>
                                                                    <span
                                                                        class="font-13 text-primary h3 display_category"
                                                                        id="display_category"></span>

                                                                </td>
                                                            </tr>


                                                            <tr>
                                                                <td>Purpose:</td>
                                                                <td>
                                                                    <span
                                                                        class="font-13 text-primary h3 display_purpose"
                                                                        id="display_purpose"></span>
                                                                </td>
                                                            </tr>


                                                            <tr>
                                                                <td>Schedule Payment:</td>
                                                                <td>
                                                                    <span
                                                                        class="font-13 text-primary h3 display_schedule_payment"
                                                                        id="display_schedule_payment">NO </span>
                                                                    &nbsp; | &nbsp;
                                                                    <span
                                                                        class="font-13 text-primary h3 display_schedule_payment_date"
                                                                        id="display_schedule_payment_date"> N/A
                                                                    </span>
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
        <span class="font-13 text-primary h3" id="display_posted_by">Kwabena Ampah</span>
    </td>
</tr>

<tr>
    <td>Enter Pin: </td>
    <td>
        <div class="form-group">
            <input type="text" name="user_pin" class="form-control" id="user_pin"
                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
        </div>
    </td>
</tr>


</tbody>
</table>
</div>
<!-- end table-responsive -->
<br>
<div class="form-group text-center">
    <span> <button class="btn btn-secondary btn-rounded" type="button" id="back_button">Back</button> &nbsp;
    </span>
    <span>&nbsp; <button class="btn btn-primary btn-rounded" type="button" id="confirm_button">Confirm
            Transfer
        </button></span>
    <span>&nbsp; <button class="btn btn-light btn-rounded" type="button" id="receipt_button">Print Receipt
        </button></span>
</div>
</div>
</div> <!-- end col -->
</div>
</div>
<div class="modal-footer">
    <button type="send" id="send" class="btn btn-primary" data-target="#multiple-two" data-toggle="modal"
        data-dismiss="modal">Send</button>
</div>
</form>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal --> --}}