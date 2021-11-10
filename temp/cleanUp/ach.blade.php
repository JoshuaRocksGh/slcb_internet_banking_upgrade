@extends('layouts.master')



@section('styles')

    <style>
        @media print {
            .hide_on_print {
                display: none
            }
        }

        @font-face {
            font-family: 'password';
            font-style: normal;
            font-weight: 400;
            src: url(https://jsbin-user-assets.s3.amazonaws.com/rafaelcastrocouto/password.ttf);
        }

        input.key {
            font-family: 'password';
            width: 100px;
            height: 26px;
        }

        .navtab-bg .nav-link {
            background-color: #e1e2e3;
            margin: 0 5px;
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
                        ACH TRANSFER

                    </h4>
                </div>

                <div class="col-md-6 text-right">
                    <h6>

                        <span class="flaot-right">
                            <b class="text-primary"> Transfer </b> &nbsp; > &nbsp; <b class="text-danger">RTGS</b>


                        </span>

                    </h6>

                </div>

                <div class="col-md-12 ">
                    <hr class="text-primary" style="margin: 0px;">
                </div>

            </div>
        </div>



        <div class="row card-body">


            <div class="col-md-7 p-4 "
                style="background-image: linear-gradient(to bottom right, white, rgb(201, 223, 230)); ">


                <div class="">


                    <ul class="nav nav-pills  navtab-bg  nav-justified">
                        <li class="nav-item">
                            <a href="#select-beneficiary" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                Saved Beneficiary
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#onetime-beneficiary" data-toggle="tab" aria-expanded="true" class="nav-link ">
                                Onetime Beneficiary
                            </a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="select-beneficiary">


                            <div class="row" id="select_beneficiary_div">
                                <div class="col-md-12">
                                    <form autocomplete="off" aria-autocomplete="off">


                                        <div class="form-group row">
                                            <b class="h6 col-md-4">Payer Account <span class="text-danger">*</span></b>


                                            <select class="custom-select col-md-8" id="from_account" required>
                                                <option value="">Select Account<span class="text-danger">*</span>
                                                </option>
                                                <option value="CURRENT ACCOUNT - 0000344422333388 - SLL - 28900009">CURRENT
                                                    ACCOUNT - 0000344422333388</option>

                                            </select>





                                        </div>


                                        <div class="form-group row mt-1 select_beneficiary">


                                            <b class="col-md-4">Select Beneficiary <span class="text-danger">*</span></b>
                                            {{-- <span class="badge badge-primary float-right"
                                                                style="cursor: pointer"><a
                                                                    href="{{ url('add-local-bank-beneficiary') }}"
                                                                    class="text-white">Create Beneficiary</a> </span> --}}
                                            <select class="custom-select  col-md-8" id="to_account" required>
                                                <option value="">Select Account</option>
                                                <option
                                                    value="SAVINGS ACCOUNT - ENTERPRISE ASSURANCE - 0000344422333388 - SLL ">
                                                    SAVINGS
                                                    ACCOUNT - 0000344422333388</option>

                                            </select>

                                            {{-- <table
                                                                class="table-responsive table table-centered table-nowrap mb-0 to_account_display_info card">
                                                                <tbody>
                                                                    <tr>

                                                                        <td>
                                                                            <a
                                                                                class="text-body font-weight-semibold display_to_account_name"></a>
                                                                            <small
                                                                                class="d-block display_to_account_no"></small>
                                                                        </td>

                                                                        <td class="text-right font-weight-semibold">
                                                                            <span
                                                                                class="display_to_account_currency"></span>

                                                                        </td>
                                                                    </tr>


                                                                </tbody>
                                                            </table> --}}


                                        </div>


                                        <div class="form-group row">
                                            <b class=" col-md-4">Enter Amount <span class="text-danger">*</span></b>
                                            <input type="text" class="form-control  col-md-8" id="amount"
                                                placeholder="Amount: 0.00"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                required>
                                        </div>

                                        <div class="form-group row">
                                            <b class="h6  col-md-4">Expense Category <span class="text-danger">*</span></b>
                                            {{-- <label for="form-group">Category</label> --}}


                                            <select class="custom-select  col-md-8" id="category" required>
                                                <option value="">---Not Selected---</option>
                                                <option value="01~Travel">Travel</option>
                                                <option value="02~Petty Cash">Petty Cash</option>
                                                <option value="03~Salary">Salary</option>
                                                <option value="04~Groceries">Groceries</option>
                                                <option value="05~Allowances">Allowances</option>
                                                <option value="06~Medical">Medical</option>
                                                <option value="07~Vendor Payment">Vendor Payment</option>
                                                <option value="08~Insurance">Insurance</option>
                                                <option value="09~Tax">Tax</option>
                                                <option value="10~Others">Others</option>
                                            </select>


                                        </div>

                                        <div class="form-group row mt-1">
                                            <b for="form-group" class=" col-md-4">Expense Purpose <span
                                                    class="text-danger">*</span></b>

                                            <input type="text" class="form-control  col-md-8" id="purpose"
                                                placeholder="Enter purpose / narration" required>

                                        </div>


                                        <div class="form-group text-right">
                                            <button class="btn btn-primary btn-rounded" type="button"
                                                id="next_button_select_beneficiary">
                                                &nbsp; NEXT &nbsp;</button>
                                        </div>

                                    </form>
                                </div>


                            </div> <!-- end col -->


                            <div class="row" id="transaction_summary_select_beneficiary">



                                <div class="col-md-12">
                                    <div class="border p-1 mt-4 mt-lg-0 rounded card">
                                        <h4 class="header-title mt-3 mb-1">Transfer Detail Summary</h4>

                                        <p class="display-4 text-center text-success success-message "></p>

                                        <div class="table-responsive">
                                            <table class="table mb-0 table-bordered table-striped">

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
                                                                class="d-block font-13 text-primary text-bold online_display_beneficiary_email"
                                                                id="online_display_beneficiary_bank_name"></span>
                                                            <span
                                                                class="d-block font-13 text-primary text-bold display_to_account_no"
                                                                id="display_to_account_no"> </span>




                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Amount:</td>
                                                        <td>
                                                            <span class="font-15 text-primary h3 display_currency"
                                                                id="display_currency"> </span>
                                                            &nbsp;
                                                            <span class="font-15 text-primary h3 display_transfer_amount"
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
                                                                id="display_posted_by">Kwabena Ampah</span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Enter Pin: </td>
                                                        <td>

                                                            <input type="text" name="user_pin"
                                                                class="form-control key hide_on_print" id="user_pin"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">

                                                        </td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end table-responsive -->
                                        <br>
                                        <div class="form-group text-center">

                                            <span> <button class="btn btn-secondary btn-rounded" type="button"
                                                    id="back_button_select_beneficiary">Back</button> &nbsp;
                                            </span>
                                            <span>&nbsp; <button class="btn btn-primary btn-rounded" type="button"
                                                    id="confirm_button"><span id="confirm_transfer">Confirm
                                                        Transfer</span>
                                                    <span class="spinner-border spinner-border-sm mr-1" role="status"
                                                        id="spinner" aria-hidden="true"></span>
                                                    <span id="spinner-text">Loading...</span>
                                                </button></span>
                                            <span>&nbsp; <button class="btn btn-light btn-rounded hide_on_print"
                                                    type="button" id="print_receipt" onclick="window.print()">Print
                                                    Receipt
                                                </button></span>
                                        </div>
                                    </div>

                                </div> <!-- end col -->

                            </div>


                        </div>

                        <div class="tab-pane " id="onetime-beneficiary">

                            <div class="">
                                <form autocomplete="off" aria-autocomplete="off">



                                    <div class="form-group row">
                                        <label class="h6 col-md-4">Payer Account <span class="text-danger">*</span></label>


                                        <select class="custom-select col-md-8" id="from_account" required>
                                            <option value="">Select Account<span class="text-danger">*</span>
                                            </option>
                                            <br>
                                            <table
                                                class="table-responsive table table-centered table-nowrap mb-0 from_account_display_info card">
                                                <tbody class="text-primary">
                                                    <tr class="text-primary">

                                                        <td class="text-primary">
                                                            <a
                                                                class="text-body font-weight-semibold display_from_account_name text-primary"></a>
                                                            <small
                                                                class="d-block display_from_account_no text-primary"></small>
                                                        </td>

                                                        <td class="text-right font-weight-semibold text-primary">
                                                            <span class="display_from_account_currency text-primary"></span>
                                                            <span class="display_from_account_amount text-primary"></span>

                                                        </td>
                                                    </tr>


                                                </tbody>
                                            </table>


                                        </select>





                                       </div>

                                            {{-- <div class="col-md-2"></div> --}}




                                            <div class="select_onetime">
                                                <h5 class="text-primary">Beneficiary Details</h5>

                                                <div class="form-group row">
                                                    <label class="col-md-4">Nickname <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control col-md-8"
                                                        id="onetime_beneficiary_alias_name" placeholder="Nickname" required>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-4">Bank Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="email" class="form-control col-md-8"
                                                        id="onetime_beneficiary_bank_name" placeholder="Bank Name" required>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-4">Account Number <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control col-md-8"
                                                        id="onetime_beneficiary_account_number" placeholder="Account Number"
                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                        required>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-4">Select Currency <span
                                                            class="text-danger">*</span></label>

                                                    <select class="custom-select col-md-8"
                                                        id="onetime_beneficiary_account_currency" required>
                                                        <option value="">Select Currency</option>
                                                        <option value="GHS">GHS</option>
                                                        <option value="USD">USD</option>
                                                        <option value="EURO">EURO</option>
                                                        <option value="SLL">SLL</option>
                                                        <option value="GBP">GBP</option>
                                                    </select>

                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-4">Enter Telephone Number <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control col-md-8"
                                                        id="onetime_beneficiary_phone" placeholder="Phone" required>
                                                </div>

                                            </div>


                                            <div class="form-group row">
                                                <label class=" col-md-4">Enter Amount <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control  col-md-8" id="amount"
                                                    placeholder="Amount: 0.00"
                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                    required>
                                            </div>

                                            <div class="form-group row">
                                                <label class="h6  col-md-4">Expense Category <span
                                                        class="text-danger">*</span></label>
                                                {{-- <label for="form-group">Category</label> --}}


                                                <select class="custom-select  col-md-8" id="category" required>
                                                    <option value="">---Not Selected---</option>
                                                    <option value="01~Travel">Travel</option>
                                                    <option value="02~Petty Cash">Petty Cash</option>
                                                    <option value="03~Salary">Salary</option>
                                                    <option value="04~Groceries">Groceries</option>
                                                    <option value="05~Allowances">Allowances</option>
                                                    <option value="06~Medical">Medical</option>
                                                    <option value="07~Vendor Payment">Vendor Payment</option>
                                                    <option value="08~Insurance">Insurance</option>
                                                    <option value="09~Tax">Tax</option>
                                                    <option value="10~Others">Others</option>
                                                </select>


                                            </div>

                                            <div class="form-group row mt-1">
                                                <label for="form-group" class=" col-md-4">Expense Purpose <span
                                                        class="text-danger">*</span></label>

                                                <input type="text" class="form-control  col-md-8" id="purpose"
                                                    placeholder="Enter purpose / narration" required>

                                            </div>


                                            <div class="form-group text-right">
                                                <button class="btn btn-primary btn-rounded" type="button" id="next_button">
                                                    &nbsp; NEXT &nbsp;</button>
                                            </div>

                                </form>
                            </div>



                            <div class="border p-1 mt-4 mt-lg-0 rounded card" id="transaction_summary_onetime_beneficiary">
                                <h4 class="header-title mt-3 mb-1">Transfer Detail Summary</h4>

                                <p class="display-4 text-center text-success success-message "></p>

                                <div class="table-responsive">
                                    <table class="table mb-0 table-bordered table-striped">

                                        <tbody>
                                            <tr>
                                                <td>From Account:</td>
                                                <td>
                                                    <span class="font-13 text-primary text-bold display_from_account_type"
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

                                                    <span class="font-13 text-primary text-bold display_to_account_type"
                                                        id="display_to_account_type"> </span>
                                                    <span
                                                        class="d-block font-13 text-primary text-bold display_to_account_name"
                                                        id="display_to_account_name"> </span>
                                                    <span
                                                        class="d-block font-13 text-primary text-bold online_display_beneficiary_email"
                                                        id="online_display_beneficiary_bank_name"></span>
                                                    <span
                                                        class="d-block font-13 text-primary text-bold display_to_account_no"
                                                        id="display_to_account_no"> </span>




                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Amount:</td>
                                                <td>
                                                    <span class="font-15 text-primary h3 display_currency"
                                                        id="display_currency"> </span>
                                                    &nbsp;
                                                    <span class="font-15 text-primary h3 display_transfer_amount"
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
                                                    <span class="font-13 text-primary h3" id="display_posted_by">Kwabena
                                                        Ampah</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Enter Pin: </td>
                                                <td>

                                                    <input type="text" name="user_pin"
                                                        class="form-control key hide_on_print" id="user_pin"
                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">

                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->
                                <br>
                                <div class="form-group text-center">

                                    <span> <button class="btn btn-secondary btn-rounded" type="button"
                                            id="back_button">Back</button> &nbsp;
                                    </span>
                                    <span>&nbsp; <button class="btn btn-primary btn-rounded" type="button"
                                            id="confirm_button"><span id="confirm_transfer">Confirm
                                                Transfer</span>
                                            <span class="spinner-border spinner-border-sm mr-1" role="status" id="spinner"
                                                aria-hidden="true"></span>
                                            <span id="spinner-text">Loading...</span>
                                        </button></span>
                                    <span>&nbsp; <button class="btn btn-light btn-rounded hide_on_print" type="button"
                                            id="print_receipt" onclick="window.print()">Print
                                            Receipt
                                        </button></span>
                                </div>
                            </div>




                        </div>

                    </div>
                </div> <!-- end card-box-->
            </div> <!-- end col -->



            <div class="col-md-5">

                <div style="background-image: linear-gradient(to bottom right,  rgb(201, 223, 230), white);">
                    <br><br>

                    <div class="row">
                        <div class="col-md-12 p-3">
                            <table class="table-responsive table mb-0 from_account_display_info card">
                                <tbody class="text-primary">

                                    <tr class="text-primary">

                                        <td class="text-primary">
                                            <a
                                                class="text-body font-weight-semibold display_from_account_name text-primary">Kwabena
                                                Ampah</a>
                                            <small class="d-block display_from_account_no text-primary">
                                                000223333788</small>
                                        </td>

                                        <td class="text-right font-weight-semibold text-primary">
                                            <span class="display_from_account_currency text-primary">SLL</span>
                                            <span class="display_from_account_amount text-primary"> 2009</span>

                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>

                        <br><br><br><br>

                    </div>

                </div>
            </div>




        </div>

    </div>

    </div>
@endsection

@section('scripts')



    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    {{-- <script src="{{ asset('assets/customjs/ach/select_beneficiary_transfer.js') }}"> --}}

    </script>
    <script>
        $(document).ready(function() {

            $("#select_beneficiary_div").css("display", "block");
            $("#transaction_summary_select_beneficiary").css("display", "none");

            $("#next_button_select_beneficiary").click(function() {
                $("#select_beneficiary_div").css("display", "none");
                $("#transaction_summary_select_beneficiary").css("display", "block");
            })


            $("#back_button_select_beneficiary").click(function() {
                $("#select_beneficiary_div").css("display", "block");
                $("#transaction_summary_select_beneficiary").css("display", "none");
            })


        })

    </script>

@endsection
