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

    </style>


@endsection



@section('content')

    <div>



        <div class="container-fluid">
            <br>
            <!-- start page title -->
            <div class="row">
                <div class="col-md-6">
                    <h4 class="text-primary">
                        <img src="{{ asset('assets/images/logoRKB.png') }}" alt="logo" style="zoom: 0.05">&emsp;
                        LOCAL BANK TRANSFER
                    </h4>
                </div>

                <div class="col-md-6 text-right">
                    <h6>

                        <span class="flaot-right">
                            <b class="text-primary"> Transfer </b> &nbsp; > &nbsp; <b class="text-danger">Local Bank</b>


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

                                <div class="col-md-8 rtgs_summary_card m-2" id="transaction_summary"
                                    style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <br><br><br>

                                            <div class="table-responsive">
                                                <table class="table mb-0 table-bordered table-striped">

                                                    <tbody>
                                                        <tr class="success_gif">
                                                            <td class="text-center bg-white" colspan="2">
                                                                <img src="{{ asset('land_asset/images/statement_success.gif') }}"
                                                                    style="zoom: 0.5" alt="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>From Account:</td>
                                                            <td>
                                                                <span
                                                                    class="font-13 text-primary text-bold display_from_account_type"
                                                                    id="display_from_account_type"></span>
                                                                <span
                                                                    class="d-block font-13 text-primary text-bold" id="display_from_account_name"> </span>
                                                                    {{-- id="display_from_account_name" --}}
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
                                                                <span
                                                                    class="font-15 text-primary h3 display_transfer_amount"
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


                                                        <tr class="schedule_payment_summary">
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
                                                                <span class="font-13 text-primary h3"
                                                                    id="display_posted_by">{{ session()->get('userAlias') }}</span>
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
                                                        id="back_button">Back</button> &nbsp; </span>
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
                                        <div class="col-md-1"></div>
                                    </div>

                                </div>

                                <div class=" col-md-7 m-2" id="transaction_form"
                                    style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">
                                    <br><br><br>

                                    <div class="row container">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-3">
                                            <label class="text-primary"> <b>Beneficiary Type</b> </label>
                                        </div>
                                        <div class="col-md-7">

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="onetime_beneficiary_form">
                                                <label class="custom-control-label " for="onetime_beneficiary_form">
                                                    <b>Onetime </b> </label>
                                            </div>
                                            <span class="badge badge-primary float-right" style="cursor: pointer"><a
                                                    href="{{ url('add-local-bank-beneficiary') }}"
                                                    class="text-white">Create
                                                    Beneficiary</a>
                                            </span>
                                        </div>

                                    </div>

                                    <form action="#" class="select_beneficiary" id="payment_details_form" autocomplete="off"
                                        aria-autocomplete="none">
                                        @csrf
                                        <div class="row container">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">

                                                {{-- <br><br><br> --}}
                                                <div class="row">
                                                    {{-- <div class="col-md-1"></div> --}}

                                                    <div class="col-md-12">

                                                        <div class="form-group row mb-3">
                                                            <b class="col-md-4 text-primary">Payer Account &nbsp; <span
                                                                    class="text-danger">*</span> </b>


                                                            <select class="form-control col-md-8 " id="from_account"
                                                                required>
                                                                <option value="">Select Account
                                                                </option>


                                                            </select>
                                                        </div>

                                                        <div class="form-group row">

                                                            <b class="col-md-4 text-primary"> Transfer Type &nbsp; <span
                                                                    class="text-danger">*</span></b>

                                                            <div class="col-md-8">
                                                                <div class="radio radio-primary form-check-inline col-md-5 beneficiary_type">
                                                                    <input type="radio" id="ach_beneficiary" value="ACH"
                                                                        name="transfer_beneficiary" checked>
                                                                    <label for="ach_beneficiary">ACH</label>
                                                                </div>
                                                                <div class="radio radio-primary form-check-inline col-md-5 beneficiary_type">
                                                                    <input type="radio" id="rtgs_beneficiary" value="RTGS"
                                                                        name="transfer_beneficiary">
                                                                    <label for="rtgs_beneficiary">RTGS</label>
                                                                </div>

                                                            </div>

                                                        </div>


                                                        <div class="form-group row mb-3" id="pay_from_account">

                                                            <b class="col-md-4 text-primary">Beneficiary Account &nbsp;
                                                                <span class="text-danger">*</span></b>

                                                            <select class="form-control col-md-8" id="to_account" required>
                                                                <option value="">Beneficiary Account</option>
                                                                {{-- <option value="Standard Chartered Bank~Joshua Amarfio~004004110449140121~GHS~800">
                                                                Currenct Account ~ 004004110449140121 </option> --}}
                                                            </select>
                                                            <br>



                                                        </div>



                                                        <div class="form-group row">

                                                            <b class="col-md-4 text-primary"> Amount &nbsp; <span
                                                                    class="text-danger">*</span></b>


                                                            <input type="text" class="form-control col-md-8" id="amount_"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                                required>


                                                        </div>
                                                        <div class="form-group row mb-3">
                                                            <b class=" col-md-4 text-primary">Expense Category &nbsp; <span
                                                                    class="text-danger">*</span></b>
                                                            {{-- <label for="form-group">Category</label> --}}


                                                            <select class="custom-select col-md-8" id="category" required>
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


                                                        <div class="form-group row mb-3">
                                                            <b class="col-md-4 text-primary ">Purpose of Transfer &nbsp;
                                                                <span class="text-danger">*</span></b>

                                                            <input type="text" class="form-control col-md-8" id="purpose"
                                                                placeholder="Enter purpose of transaction" required>

                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <b class="col-md-4 text-primary ">Future Payment &nbsp;
                                                                {{-- <span class="text-danger">*</span> --}}
                                                            </b>

                                                            <input type="date" class="form-control col-md-8"
                                                                id="future_payement" required>

                                                        </div>




                                                        <div class="form-group text-right yes_beneficiary">
                                                            <button class="btn btn-primary btn-rounded" type="button"
                                                                id="next_button">
                                                                &nbsp; Next &nbsp;<i class="fe-arrow-right"></i> </button>
                                                            {{-- <button type="button" id="hide_button">hide</button> --}}
                                                        </div>

                                                    </div>

                                                    {{-- <div class="col-md-1"></div> --}}
                                                </div>
                                                <div class="form-group">
                                                    {{-- <label class="h6">Payer Account <span
                                                            class="text-danger">*</span></label>


                                                    <select class="custom-select" id="from_account" required>
                                                        <option value="">Select Account</option>


                                                    </select> --}}


                                                    {{-- <table
                                                        class="table-responsive table table-centered table-nowrap mb-0 from_account_display_info card">
                                                        <tbody class="text-primary">
                                                            <tr class="text-primary">

                                                                <td class="text-primary">
                                                                    <a
                                                                        class="text-body font-weight-semibold display_from_account_name text-primary"></a>
                                                                    <small
                                                                        class="d-block display_from_account_no text-primary"></small>
                                                                </td>

                                                                <td class=" font-weight-semibold text-primary">
                                                                    <span
                                                                        class="display_from_account_currency text-primary"></span>
                                                                    <span
                                                                        class="display_from_account_amount text-primary"></span>

                                                                </td>
                                                            </tr>


                                                        </tbody>
                                                    </table> --}}


                                                </div>



                                                <div class="form-group mt-1 select_beneficiary">
                                                    {{-- <label class="h4 text-primary">Beneficiary Account <span
                                                            class="text-danger">*</span></label>
                                                    <br> --}}




                                                    {{-- <table
                                                        class="table-responsive table table-centered table-nowrap mb-0 to_account_display_info card">
                                                        <tbody>
                                                            <tr>

                                                                <td>
                                                                    <a
                                                                        class="text-body font-weight-semibold display_to_account_name"></a>
                                                                    <small class="d-block display_to_account_no"></small>
                                                                </td>

                                                                <td class=" font-weight-semibold">
                                                                    <span class="display_to_account_currency"></span>

                                                                </td>
                                                            </tr>


                                                        </tbody>
                                                    </table> --}}


                                                </div>




                                            </div>
                                            <div class="col-md-1"></div>

                                        </div>




                                        <div class="form-group no_beneficiary">
                                            <div class="alert alert-warning" role="alert">
                                                <i class="mdi mdi-alert-outline mr-2"></i> <strong>warning</strong> No
                                                beneficiary found
                                            </div>
                                        </div>







                                    </form>

                                    <form action="#" class="onetime_beneficiary" id="onetime_payment_details_form"
                                        autocomplete="off" aria-autocomplete="none">
                                        @csrf
                                        <div class="">

                                            <div class="col-md-12">
                                                {{-- <br><br><br> --}}
                                                <div class="row">
                                                    <div class="col-md-2"></div>

                                                    <div class="col-md-8">

                                                        <div class="form-group row mb-3">
                                                            <label class="col-md-4 text-primary"> Payer Account &nbsp; <span
                                                                    class="text-danger">*</span> </label>


                                                            <select class="form-control col-md-8 " id="onetime_from_account"
                                                                required>
                                                                <option value="">Select Account
                                                                </option>


                                                            </select>
                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <b class="col-md-4 text-primary">Receiver Name <span
                                                                    class="text-danger">*</span> </b>
                                                            <input type="text" class="form-control col-md-8"
                                                                id="onetime_beneficiary_alias_name" placeholder="Alias Name"
                                                                required>
                                                        </div>
                                                        <div class="form-group row mb-3">

                                                            <b class="col-md-4  text-primary"> Bank Name <span
                                                                    class="text-danger">*</span> </b>

                                                            <select class="form-control col-md-8"
                                                                id="onetime_beneficiary_bank_name" required>
                                                                <option value="">Bank Name</option>
                                                                {{-- <option value="Standard Chartered Bank~Joshua Amarfio~004004110449140121~GHS~800">
                                                            Currenct Account ~ 004004110449140121 </option> --}}
                                                            </select>
                                                            <br>
                                                        </div>

                                                        <div class="form-group row mb-3">

                                                            <label class="col-md-4 text-primary"> Account Number <span
                                                                    class="text-danger">*</span> </label>
                                                            <input type="text" class="form-control col-md-8"
                                                                id="onetime_beneficiary_account_number"
                                                                placeholder="Account Number"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                                required>
                                                        </div>

                                                        <div class="form-group row">

                                                            <b class="col-md-4 text-primary"> Transfer Type &nbsp; <span
                                                                    class="text-danger">*</span></b>

                                                            <div class="col-md-8">
                                                                <div class="radio radio-primary form-check-inline col-md-5 onetime_beneficiary_type">
                                                                    <input type="radio" id="ach_onetime" value="ACH"
                                                                        name="onetime_transfer_beneficiary" checked>
                                                                    <label for="ach_onetime">ACH</label>
                                                                </div>
                                                                <div class="radio radio-primary form-check-inline col-md-5 onetime_beneficiary_type">
                                                                    <input type="radio" id="rtgs_onetime" value="RTGS"
                                                                        name="onetime_transfer_beneficiary">
                                                                    <label for="rtgs_onetime">RTGS</label>
                                                                </div>

                                                                {{--  <div class="radio radio-info form-check-inline onetime_beneficiary_type">
                                                                    <input type="radio" id="inlineRadio1" value="option1" name="radioInline" checked>
                                                                    <label for="inlineRadio1"> Inline One </label>
                                                                </div>
                                                                <div class="radio form-check-inline">
                                                                    <input type="radio" id="inlineRadio2" value="option2" name="radioInline">
                                                                    <label for="inlineRadio2"> Inline Two </label>
                                                                </div>  --}}
                                                            </div>

                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label class="col-md-4"><span class="text-danger">*</span>Select
                                                                Currency
                                                            </label>

                                                            <select class="custom-select col-md-8"
                                                                id="onetime_beneficiary_account_currency" required>
                                                                <option value="">Select Currency</option>

                                                            </select>

                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label class="col-md-4"><span class="text-danger">*</span>Enter
                                                                Telephone
                                                                Number
                                                            </label>
                                                            <input type="text" class="form-control col-md-8"
                                                                id="onetime_beneficiary_phone" placeholder="Phone" required>
                                                        </div>

                                                        <div class="form-group row">
                                                            {{-- <label for="form-group"> Amount<span class="text-danger">*</span></label> --}}
                                                            <label class="col-md-4 "><span class="text-danger">*</span>Enter
                                                                Amount </label>
                                                            <input type="text" class="form-control col-md-8"
                                                                id="onetime_amount" placeholder="Amount: 0.00"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                                required>
                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label class="h6 col-md-4 "><span
                                                                    class="text-danger">*</span>Expense Category </label>
                                                            {{-- <label for="form-group">Category</label> --}}


                                                            <select class="custom-select col-md-8" id="onetime_category"
                                                                required>
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

                                                        <div class="row">
                                                            <div class="col-4"></div>
                                                            <div class="col-8">

                                                                <div class="form-group mb-0">
                                                                    <input type="checkbox" class="custom-control-inputt"
                                                                        id="onetime_invoice_check">
                                                                    &nbsp; &nbsp; <label class="h6">Invoice Attachment ?
                                                                        <span class="badge badge-primary "
                                                                            style="cursor: pointer" data-toggle="modal"
                                                                            data-target="#centermodal">View</span>
                                                                    </label>
                                                                    <span class="hide_invoice">
                                                                        <br>
                                                                        <input type="file" class="hide_invoice"
                                                                            id="onetime_invoice_attachment" required>
                                                                    </span>


                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label class="col-md-4 "><span
                                                                    class="text-danger">*</span>Purpose of Transfer</label>

                                                            <input type="text" class="form-control col-md-8"
                                                                id="onetime_purpose"
                                                                placeholder="Enter purpose of transaction" required>

                                                        </div>

                                                        <div class="row">
                                                            <div class="col-4"></div>
                                                            <div class="col-8">

                                                                <div class="form-group">

                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            id="onetime_customCheck1">
                                                                        <label class="custom-control-label"
                                                                            for="onetime_customCheck1">Schedule
                                                                            Payments</label>
                                                                    </div>
                                                                    <legend></legend>

                                                                    {{-- <input type="text" class="form-control"
                                                                        id="onetime_schedule_payment_contraint_input"> --}}

                                                                    <input type="date" class="form-control"
                                                                        id="onetime_schedule_payment_date">

                                                                </div>

                                                            </div>
                                                        </div>


                                                        <div class="form-group text-right yes_beneficiary">
                                                            <button class="btn btn-primary btn-rounded" type="button"
                                                                id="onetime_next_button">
                                                                &nbsp; Next &nbsp;<i class="fe-arrow-right"></i> </button>
                                                            {{-- <button type="button" id="hide_button">hide</button> --}}
                                                        </div>

                                                    </div>

                                                    <div class="col-md-2"></div>
                                                </div>
                                                <div class="form-group">
                                                    {{-- <label class="h6">Payer Account <span
                                                            class="text-danger">*</span></label>


                                                    <select class="custom-select" id="from_account" required>
                                                        <option value="">Select Account</option>


                                                    </select> --}}


                                                    {{-- <table
                                                        class="table-responsive table table-centered table-nowrap mb-0 from_account_display_info card">
                                                        <tbody class="text-primary">
                                                            <tr class="text-primary">

                                                                <td class="text-primary">
                                                                    <a
                                                                        class="text-body font-weight-semibold display_from_account_name text-primary"></a>
                                                                    <small
                                                                        class="d-block display_from_account_no text-primary"></small>
                                                                </td>

                                                                <td class=" font-weight-semibold text-primary">
                                                                    <span
                                                                        class="display_from_account_currency text-primary"></span>
                                                                    <span
                                                                        class="display_from_account_amount text-primary"></span>

                                                                </td>
                                                            </tr>


                                                        </tbody>
                                                    </table> --}}


                                                </div>



                                                <div class="form-group mt-1 select_beneficiary">
                                                    {{-- <label class="h4 text-primary">Beneficiary Account <span
                                                            class="text-danger">*</span></label>
                                                    <br> --}}




                                                    {{-- <table
                                                        class="table-responsive table table-centered table-nowrap mb-0 to_account_display_info card">
                                                        <tbody>
                                                            <tr>

                                                                <td>
                                                                    <a
                                                                        class="text-body font-weight-semibold display_to_account_name"></a>
                                                                    <small class="d-block display_to_account_no"></small>
                                                                </td>

                                                                <td class=" font-weight-semibold">
                                                                    <span class="display_to_account_currency"></span>

                                                                </td>
                                                            </tr>


                                                        </tbody>
                                                    </table> --}}


                                                </div>




                                            </div>


                                        </div>




                                        <div class="form-group no_beneficiary">
                                            <div class="alert alert-warning" role="alert">
                                                <i class="mdi mdi-alert-outline mr-2"></i> <strong>warning</strong> No
                                                beneficiary found
                                            </div>
                                        </div>







                                    </form>
                                </div> <!-- end col -->

                                {{-- <button class="m-2 btn btn-info d-none d-sm-block">Related Information</button> --}}
                                {{-- LEFT CARD --}}

                                <div class=" col-md-4 m-2 d-none d-sm-block"
                                    style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">
                                    <br><br>
                                    <div class=" col-md-12 card card-body rtgs_transfer_summary">
                                        {{-- <br><br> --}}
                                        <div class="row">
                                            <h6 class="col-md-5">Sender Name:</h6>
                                            <span class="text-primary col-md-7 display_from_account_name"></span>

                                            <h6 class="col-md-5">Sender Account:</h6>
                                            <span class="text-primary display_from_account_no col-md-7"></span>

                                            <h6 class="col-md-5">Available Balance:</h6>
                                            <span class="text-primary display_from_account_amount col-md-7"></span>

                                            <h6 class="col-md-5">Account Currency:</h6>
                                            <span class="text-primary display_from_account_currency col-md-7"></span>
                                        </div>

                                        <hr>
                                        <div class="row">
                                            <h6 class="col-md-5">Receiver Name:</h6>
                                            <span class="text-primary display_to_account_name col-md-7"></span>

                                            <h6 class="col-md-5">Receiver Account:</h6>
                                            <span class="text-primary display_to_account_no col-md-7"></span>

                                            <h6 class="col-md-5">Account Currency:</h6>
                                            <span class="text-primary display_to_account_currency col-md-7"></span>
                                            <br>
                                            <button type="button"
                                                class="btn btn-warning btn-xs waves-effect waves-light beneficiary_deatils col-md-3 text-primary"
                                                data-toggle="modal" data-target="#standard-modal">
                                                More Info</button>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <h6 class="text-primary col-md-4">Transaction Fee:</h6>
                                            <span class="text-danger text-bold col-md-8">0.10% of transfer amount</span>
                                        </div>

                                        <hr>
                                        <div class="row">
                                            <h6 class="text-primary col-md-4">Please Note:</h6>
                                            <span class="text-danger col-md-8">RTGS Tranfers should be above (SLL
                                                50,000,000.00)</span>
                                        </div>

                                    </div>

                                    <div class=" col-md-12 card card-body ach_transfer_summary">
                                        {{-- <br><br> --}}
                                        <div class="row">
                                            <h6 class="col-md-5">Sender Name:</h6>
                                            <span class="text-primary display_from_account_name col-md-7"></span>

                                            <h6 class="col-md-5">Sender Account:</h6>
                                            <span class="text-primary display_from_account_no col-md-7"></span>

                                            <h6 class="col-md-5">Available Balance:</h6>
                                            <span class="text-primary display_from_account_amount col-md-7"></span>

                                            <h6 class="col-md-5">Account Currency:</h6>
                                            <span class="text-primary display_from_account_currency col-md-7"></span>
                                        </div>

                                        <hr>
                                        <div class="row">
                                            <h6 class="col-md-5">Receiver Name:</h6>
                                            <span class="text-primary display_to_account_name col-md-7"></span>

                                            <h6 class="col-md-5">Receiver Account:</h6>
                                            <span class="text-primary display_to_account_no col-md-7"></span>

                                            <h6 class="col-md-5">Account Currency:</h6>
                                            <span class="text-primary display_to_account_currency col-md-7"></span>
                                        </div>
                                        <br>
                                        <button type="button"
                                            class="btn btn-warning btn-xs waves-effect waves-light beneficiary_deatils col-md-3 text-primary"
                                            data-toggle="modal" data-target="#standard-modal">
                                            More Info</button>
                                        <hr>

                                        <div class="row">
                                            <h6 class="text-primary col-md-4">Transaction Fee:</h6>
                                            <span class="text-danger text-bold col-md-8">0.08% of transfer amount</span>
                                        </div>

                                        <hr>
                                        <div class="row">
                                            <h6 class="text-primary col-md-4">Please Note:</h6>
                                            <span class="text-danger col-md-8">ACH Tranfers should be above (SLL
                                                30,000,000.00)</span>
                                        </div>

                                    </div>
                                </div>






                                {{-- <div class="col-md-5 text-center" style="margin-top: 80px;">

                                    <img src="{{ asset('assets/images/same_bank.jpg') }}" class="img-fluid" alt="">
                                </div> <!-- end col --> --}}


                                <!-- end row -->

                                {{-- <button class="m-2 btn btn-info d-block d-sm-none">Related Information</button> --}}

                            </div>




                        </div>

                        {{-- <div class="col-md-1"></div> --}}

                    </div> <!-- end card-body -->


                    <!-- Standard modal content -->
                    <div id="standard-modal" class="modal fade" tabindex="-1" role="dialog"
                        aria-labelledby="standard-modalLabel" aria-hidden="true">
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
                                            <label class="col-md-5">Bank Swift Code:</label>
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
                                            <label class="col-md-5">Account Currency:</label>
                                            <span class="col-md-7" id="beneficiary_details_account_currency"></span>
                                        </div>
                                        <hr>

                                        <h4 class="text-primary">Beneficiary Details </h4>
                                        <div class="form-group row">
                                            <label class="col-md-5">Beneficiary Name:</label>
                                            <span class="col-md-7" id="beneficiary_details_name"></span>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">Beneficiary Address:</label>
                                            <span class="col-md-7" id="beneficiary_details_address"></span>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">Beneficiary Telephone:</label>
                                            <span class="col-md-7" id="beneficiary_details_telephone"></span>
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


                </div>


            @endsection

            @section('scripts')



                <script src="https://code.jquery.com/jquery-3.6.0.js"
                    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

                <script>
                    function bank_list() {
                        $.ajax({
                            type: 'GET',
                            url:  'get-bank-list-api',
                            datatype: "application/json",
                            success: function(response) {
                                console.log(response.data);
                                let data = response.data
                                $.each(data, function(index) {

                                    $('#onetime_beneficiary_bank_name').append($('<option>', {
                                        value: data[index].bankCode + '~' + data[index]
                                            .bankDescription
                                    }).text(data[index].bankDescription));

                                });

                            },

                        })
                    };

                    function get_currency() {
                        $.ajax({
                            type: 'GET',
                            url:  'get-currency-list-api',
                            datatype: "application/json",
                            success: function(response) {
                                {{-- console.log(response.data); --}}
                                let data = response.data
                                $.each(data, function(index) {

                                    $('#onetime_beneficiary_account_currency').append($('<option>', {
                                        value: data[index].isoCode + '~' + data[index]
                                            .description
                                    }).text(data[index].description));

                                });

                            },

                        })
                    };


                    function from_account() {
                        $.ajax({
                            type: 'GET',
                            url:  'get-my-account',
                            datatype: "application/json",
                            success: function(response) {
                                {{-- console.log(response.data); --}}
                                let data = response.data
                                $.each(data, function(index) {
                                    $('#from_account').append($('<option>', {
                                        value: data[index].accountType + '~' + data[
                                                index].accountDesc + '~' + data[
                                                index].accountNumber + '~' + data[
                                                index].currency + '~' + data[index]
                                            .availableBalance
                                    }).text(data[index].accountNumber + '~' + data[index]
                                        .currency +
                                        '~' + data[index].availableBalance));
                                    //$('#to_account').append($('<option>', { value : data[index].accountType+'~'+data[index].accountNumber+'~'+data[index].currency+'~'+data[index].availableBalance}).text(data[index].accountType+'~'+data[index].accountNumber+'~'+data[index].currency+'~'+data[index].availableBalance));

                                });
                            },

                        })
                    }

                    function get_benerficiary() {
                        $.ajax({
                            type: 'GET',
                            url:  'get-transfer-beneficiary-api?beneType=OTB',
                            datatype: "application/json",
                            success: function(response) {
                                console.log(response.data);
                                let data = response.data

                                if (response.data.length > 0) {
                                    $('.yes_beneficiary').show()
                                    $('.no_beneficiary').hide()

                                    $.each(data, function(index) {
                                        //$('#from_account').append($('<option>', { value : data[index].accountType+'~'+data[index].accountDesc+'~'+data[index].accountNumber+'~'+data[index].currency+'~'+data[index].availableBalance}).text(data[index].accountType +'~'+ data[index].accountNumber +'~'+data[index].currency+'~'+data[index].availableBalance));
                                        $('#to_account').append($('<option>', {
                                            value: data[index].BANK_NAME + '~' +
                                                data[
                                                    index].NICKNAME + '~' + data[
                                                    index]
                                                .BEN_ACCOUNT + '~' + data[index]
                                                .BEN_ACCOUNT_CURRENCY + '~' + data[index]
                                        }).text(data[index].NICKNAME + '~' + data[index]
                                            .BANK_NAME +
                                            '~' + data[index].BEN_ACCOUNT + '~' + data[index]
                                            .BEN_ACCOUNT_CURRENCY));

                                    });

                                } else {
                                    $('.yes_beneficiary').hide()
                                    $('.no_beneficiary').show()
                                }


                            },

                        })
                    }

                    $(document).ready(function() {

                        {{-- $('.hide-for-demo-purpose').hide() --}}
                        $('#spinner').hide(),
                            $('#spinner-text').hide(),
                            $('#print_receipt').hide(),
                            $(".hide_invoice").hide()
                        $('.no_beneficiary').hide()
                        $("#transaction_summary_").hide();
                        $(".success_gif").hide();
                        $(".onetime_beneficiary").hide()
                        {{-- $(".schedule_payment_summary").hide(); --}}
                        $(".rtgs_transfer_summary").hide();
                        $(".ach_transfer_summary").show();
                        $(".beneficiary_deatils").hide();

                        setTimeout(function() {
                            from_account();
                            get_benerficiary();
                            bank_list();
                            get_currency();
                        }, 2000)

                        // ONETIME BENEFICIARY CHECKBOX

                        {{-- $('input[type="checkbox"]').click(function(){
                        if($(this).is(":checked")){
                            console.log("Checkbox is checked.");
                        }
                        else if($(this).is(":not(:checked)")){
                            console.log("Checkbox is unchecked.");
                        }
                    }); --}}

                        $("#onetime_beneficiary_form").click(function() {
                            if ($(this).is(":checked")) {
                                console.log("Checkbox is checked.");
                                var type = 'onetime';


                                $("#onetime_payment_details_form").toggle(500);
                                $("#payment_details_form").hide();
                            } else if ($(this).is(":not(:checked)")) {
                                console.log("Checkbox is unchecked.");
                                $("#payment_details_form").toggle(500);
                                $("#onetime_payment_details_form").hide();
                            }
                        })

                        {{-- $(".customCheck1").is("change", function() {
                        if ($(this).is(":checked")) {
                            alert("YES");
                        }else {
                            alert("No");
                        }
                    }); --}}



                        // CHECK BOX CONSTRAINT SCHEDULE PAYMENT
                        $("#invoice_attachment").on("change", function() {
                            if ($(this).is(":checked")) {
                                $('.hide_invoice').hide()
                            } else {
                                $('.hide_invoice').show()
                            }
                        });


                        $('#invoice_attachment').change(function() {

                            var file = $("#invoice_attachment[type=file]").get(0).files[0];

                            if (file) {
                                var reader = new FileReader();

                                reader.onload = function() {
                                    $("#display_invoice_attachment").attr("src", reader.result);
                                }

                                reader.readAsDataURL(file);
                            }
                            {{-- $("#display_invoice_attachment").attr("src", {{ asset('land_asset/images/same-bank.gif') }}); --}}
                            $("#display_invoice_attachment").show();
                        })


                        function toaster(message, icon) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 10000,
                                timerProgressBar: false,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: icon,
                                title: message
                            })
                        };

                        $(".select_onetime").css("display", "none");
                        $(".select_beneficiary").css("display", "block");

                        // $(".select_beneficiary").show();
                        //$(".select_onetime").hide();

                        var type = $("input[type='radio']:checked").val();

                        $(".radio").click(function() {

                            var type = $("input[type='radio']:checked").val();

                            if (type == '') {
                                $(".select_onetime").css("display", "none");
                                $(".select_beneficiary").css("display", "block");

                                // set amonut to empty
                                $("#amount").val('');
                                $("#pay_from_account").show();


                                //$(".select_onetime").hide();
                                //$(".select_beneficiary").show();

                            }
                            if (type == 'onetime') {

                                $(".select_beneficiary").css("display", "none");
                                $(".select_onetime").css("display", "block");

                                // set amonut to empty
                                $("#amount").val('');
                                $("#pay_from_account").hide();

                                // $(".select_beneficiary").hide();
                                //$(".select_onetime").show();
                            }

                        });


                        {{--  var beneficiary_type = $("input[type='radio']:checked").val();  --}}
                        {{--  console.log(beneficiary_type);  --}}

                        var beneficiary_type = $('input[name="transfer_beneficiary"]:checked').val();
                        console.log(beneficiary_type);

                        $(".beneficiary_type").click(function(){
                            var beneficiary_type = $('input[name="transfer_beneficiary"]:checked').val();

                            if(beneficiary_type == "ACH"){
                                console.log("ACH Transfer");
                                $(".rtgs_transfer_summary").hide();
                                $(".ach_transfer_summary").toggle(500);
                            }
                            if(beneficiary_type == "RTGS"){
                                console.log("RTGS Transfer");
                                $(".ach_transfer_summary").hide();
                                $(".rtgs_transfer_summary").toggle(500);
                            }

                        })

                        {{--  $(".onetime_beneficiary_type").click(function(){
                            var beneficiary_type = $('input[name="onetime_transfer_beneficiary"]:checked').val();

                            if(beneficiary_type == "ACH"){
                                console.log("ACH Onetime Transfer");
                                $(".rtgs_transfer_summary").hide();
                                $(".ach_transfer_summary").toggle(500);
                            }
                            if(beneficiary_type == "RTGS"){
                                console.log("RTGS Onetime Transfer");
                                $(".ach_transfer_summary").hide();
                                $(".rtgs_transfer_summary").toggle(500);
                            }

                        })  --}}


                        {{--  $(".radio").click(function() {
                            var beneficiary_type = $("input[type='radio']:checked").val();

                            if (beneficiary_type == "ACH") {
                                console.log("ACH Transfer");
                                $(".rtgs_transfer_summary").hide();
                                $(".ach_transfer_summary").toggle(500);
                            }

                            if (beneficiary_type == "RTGS") {
                                console.log("RTGS Transfer");
                                $(".ach_transfer_summary").hide();
                                $(".rtgs_transfer_summary").toggle(500);
                            }
                        })  --}}

                        {{--  $("#onetime_beneficiary_form").click(function() {
                            if ($(this).is(":checked")) {
                                console.log("Checkbox is checked.");

                                $("#onetime_payment_details_form").toggle(500);
                                $("#payment_details_form").hide();
                            } else if ($(this).is(":not(:checked)")) {
                                console.log("Checkbox is unchecked.");
                                $("#payment_details_form").toggle(500);
                                $("#onetime_payment_details_form").hide();
                            }
                        })  --}}



                        $("#to_account").change(function() {
                            console.log("value changed");
                            $(".beneficiary_deatils").show();
                        })



                        // hide seleect accounts info
                        $(".from_account_display_info").hide()
                        $(".to_account_display_info").hide()
                        $("#schedule_payment_date").hide()
                        $("#onetime_schedule_payment_date").hide()
                        $('#schedule_payment_contraint_input').hide()
                        $('.display_schedule_payment_date').text('N/A')
                            $('#select_frequency').hide()
                            $('#select_frequency_text').hide()
                            $("#transaction_form").show()
                        $("#transaction_summary").hide()

                        {{-- $("#next_button").click(function(e) {
                    e.preventDefault()
                    $("#transaction_form").hide()
                    $("#transaction_summary").show()
                }) --}}

                        $("#back_button").click(function(e) {
                            e.preventDefault()
                            $("#transaction_summary").hide()
                            $("#transaction_form").show()

                        })

                        {{-- Event on From Account field --}}

                        var amt = 0
                        $("#from_account").change(function() {
                            var from_account = $(this).val()
                            var from_account_info = from_account.split("~");
                            console.log(from_account_info);
                            {{-- alert(from_account) --}}
                            if (from_account.trim() == '' || from_account.trim() == undefined) {
                                {{-- alert('money') --}}
                                $(".from_account_display_info").hide()

                            } else {

                                //values for the related field screen;
                                from_account_type = from_account_info[0];
                                console.log("name "+ from_account_type);
                                //  from_account_info = from_account.split("~")
                                // alert(from_account_info);
                                {{-- alert('continue') --}}
                                // alert(from_account_info);

                                var to_account = $('#to_account').val()
                                // conole.log(to_account);

                                if ((from_account.trim() == to_account.trim()) && from_account.trim() !='' &&to_account.trim() != '') {
                                    toaster('can not transfer to same account', 'error')
                                    {{-- alert('can not transfer to same account') --}}
                                    $(this).val('')
                                }

                                // set summary values for display

                                $(".display_from_account_type").text(from_account_info[0].trim());
                                $(".display_from_account_name").text(from_account_info[1].trim());
                                $(".display_from_account_no").text(from_account_info[2].trim())
                                $(".display_from_account_currency").text(from_account_info[3].trim())
                                $("#basic-addon1").text(from_account_info[3].trim())

                                $(".display_currency").text(from_account_info[3].trim()) // set summary currency

                                amt = from_account_info[4].trim()

                                $(".display_from_account_amount").text(formatToCurrency(parseFloat(from_account_info[4].trim())))
                                {{-- alert('and show' + from_account_info[3].trim()) --}}
                                $(".from_account_display_info").show()
                            }




                            // alert(from_account_info[0]);
                        });


                        $("#to_account").change(function() {
                            var to_account = $(this).val()
                            var to_account_info = to_account.split("~");
                            // console.log(to_account_info);
                            {{-- console.log(to_account); --}}
                            if (to_account.trim() == '' || to_account.trim() == undefined) {

                                $(".to_account_display_info").hide()

                            } else {
                                to_account_info = to_account.split("~")

                                console.log()
                                var from_account = $('#from_account').val()

                                if ((from_account.trim() == to_account.trim()) && from_account.trim() !=
                                    '' &&
                                    to_account.trim() != '') {
                                    toaster('can not transfer to same account', 'error')
                                    {{-- alert('can not transfer to same account') --}}
                                    $(this).val('')
                                }

                                // set summary values for display
                                $(".display_to_account_type").text(to_account_info[0].trim())
                                $(".display_to_account_name").text(to_account_info[1].trim())
                                $(".display_to_account_no").text(to_account_info[2].trim())
                                $(".display_to_account_currency").text(to_account_info[3].trim())

                                {{-- console.log( JSON.parse(to_account_info[4].trim())) --}}

                                $("#beneficiary_details_bank_name").text(to_account_info[0].trim());
                                {{-- $("#beneficiary_details_bank_swift_code").text(to_account_info[0].trim()); --}}
                                $("#beneficiary_details_account_name").text(to_account_info[0].trim());
                                $("#beneficiary_details_account_number").text(to_account_info[0].trim());
                                $("#beneficiary_details_account_currency").text(to_account_info[0].trim());
                                $("#beneficiary_details_name").text(to_account_info[0].trim());
                                $("#beneficiary_details_address").text(to_account_info[0].trim());
                                $("#beneficiary_details_telephone").text(to_account_info[0].trim());


                                $(".to_account_display_info").show()
                            }




                            // alert(to_account_info[0]);
                        });


                        $("#amount").keyup(function() {

                            var type = $("input[type='checkbox']:checked").val();
                            //alert(type);
                            //return false;


                            if (type == 'beneficiary') {
                                var from_account = $('#from_account').val()
                                var to_account = $('#to_account').val()

                                if (from_account.trim() == '' || to_account.trim() == '') {
                                    toaster('Please select source and destination accounts', 'error')
                                    {{-- alert('Please select source and destination accounts') --}}
                                    {{-- $(this).val('') --}}
                                    return false;
                                } else {
                                    var transfer_amount = $("#amount").val()

                                    if (parseFloat(amt) < parseFloat(transfer_amount)) {
                                        toaster('Insufficient account balance', 'error', 10000)
                                        return false;
                                    }

                                    $(".display_transfer_amount").text(formatToCurrency(parseFloat(transfer_amount)))
                                }

                            } else if (type == 'onetime') {

                                var from_account = $('#from_account').val()
                                var onetime_beneficiary_alias_name = $('#onetime_beneficiary_alias_name')
                                    .val()
                                var onetime_beneficiary_account_number = $(
                                    '#onetime_beneficiary_account_number').val()
                                var onetime_beneficiary_account_currency = $(
                                    '#onetime_beneficiary_account_currency').val()
                                var onetime_beneficiary_bank_name = $('#onetime_beneficiary_bank_name')
                                .val()
                                var onetime_beneficiary_phone = $('#onetime_beneficiary_phone').val()

                                {{-- console.log(onetime_beneficiary_alias_name)
                        console.log(onetime_beneficiary_account_number)
                        console.log(onetime_beneficiary_account_currency) --}}


                                if (from_account.trim() == '' || onetime_beneficiary_alias_name.trim() ==
                                    '' ||
                                    onetime_beneficiary_account_number.trim() == '' ||
                                    onetime_beneficiary_account_currency.trim() == '') {
                                    toaster('Please select source and destination accounts', 'error')
                                    {{-- alert('Please select source and destination accounts') --}}
                                    $(this).val('')
                                    return false;
                                } else {
                                    //alert('set')
                                    var transfer_amount = $(this).val()
                                    if (parseFloat(amt) < parseFloat(transfer_amount)) {
                                        toaster('Insufficient account balance', 'error', 10000)
                                        return false;
                                    }
                                    $(".display_transfer_amount").text(formatToCurrency(parseFloat(
                                        transfer_amount
                                        .trim())))
                                }

                            } else {
                                {{-- alert(type + ' 00000000 Select either beneficiary or onetime beneficiary') --}}
                                $(this).val('')
                                return false;
                            }




                        })


                        function formatToCurrency(amount) {
                            return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
                        };


                        // CHECK BOX CONSTRAINT SCHEDULE PAYMENT
                        $("#customCheck1").on("change", function() {
                            if ($(this).is(":checked")) {
                                {{-- console.log("Checkbox Checked!"); --}}
                                {{-- $('.schedule_payment_summary').show(); --}}
                                $("#schedule_payment_date").show()
                                    $(".display_schedule_payment").text('YES')
                                    $('#schedule_payment_contraint_input').val('TRUE')
                                    $('#select_frequency').show();
                                $('#select_frequency_text').show();

                            } else {
                                {{-- console.log("Checkbox UnChecked!"); --}}
                                {{-- $(".schedule_payment_summary").hide(); --}}
                                $("#schedule_payment_date").val('')
                                $("#schedule_payment_date").hide()
                                $('.display_schedule_payment').text('NO')
                                $('.display_schedule_payment_date').text('N/A')

                                $('#schedule_payment_contraint_input').val('')
                                $('#schedule_payment_contraint_input').hide(),
                                    $('#schedule_payment_date').val(''),
                                    $('#select_frequency').hide();
                                $('#select_frequency_text').hide();
                            }
                        });

                        $("#onetime_customCheck1").on("change", function() {
                            if ($(this).is(":checked")) {
                                {{-- console.log("Checkbox Checked!"); --}}
                                {{-- $('.schedule_payment_summary').show(); --}}
                                $("#onetime_schedule_payment_date").show(),
                                    $(".display_schedule_payment").text('YES'),
                                    $('#schedule_payment_contraint_input').val('TRUE'),
                                    $('#select_frequency').show();
                                $('#select_frequency_text').show();

                            } else {
                                {{-- console.log("Checkbox UnChecked!"); --}}
                                {{-- $(".schedule_payment_summary").hide(); --}}
                                $("#schedule_payment_date").val('')
                                $("#onetime_schedule_payment_date").hide()
                                $('.display_schedule_payment').text('NO')
                                $('.display_schedule_payment_date').text('N/A')

                                $('#schedule_payment_contraint_input').val('')
                                $('#schedule_payment_contraint_input').hide(),
                                    $('#schedule_payment_date').val(''),
                                    $('#select_frequency').hide();
                                $('#select_frequency_text').hide();
                            }
                        });


                        // CHECK BOX CONSTRAINT SCHEDULE PAYMENT
                        $("#invoice_check").on("change", function() {
                            if ($(this).is(":checked")) {
                                //console.log("Checkbox Checked!");
                                {{-- alert("dfdf") --}}
                                $(".hide_invoice").show()


                            } else {
                                {{-- alert("454545") --}}
                                $(".hide_invoice").hide()

                            }
                        });

                        $("#onetime_invoice_check").on("change", function() {
                            if ($(this).is(":checked")) {
                                $(".hide_invoice").show()
                            } else {
                                $(".hide_invoice").hide()
                            }
                        })

                        {{-- $("#hide_button").click(function(){
                        $("#transaction_form").hide();
                        $("#transaction_summary_").toggle(500);
                    }) --}}



                        $("#onetime_beneficiary_alias_name").keyup(function() {
                            var alias_name = $(this).val();
                            $(".display_to_account_name").text(alias_name);
                        })

                        $("#onetime_beneficiary_account_number").keyup(function() {
                            var beneficiary_account_number = $(this).val();
                            $(".display_to_account_no").text(beneficiary_account_number);
                        })

                        $("#onetime_beneficiary_account_currency").change(function() {
                            var beneficiary_account_currency = $(this).val();
                            $(".display_to_account_currency").text(beneficiary_account_currency);
                        })

                        // NEXT BUTTON CLICK
                        $("#next_button").click(function() {
                            $(".rtgs_card_right").hide();
                            $("#rtgs_card_right").hide();
                            var type = $("input[type='radio']:checked").val();

                            var from_account = $('#from_account').val()
                            var transfer_amount = $('#amount').val()
                            var category = $('#category').val()
                            var purpose = $('#purpose').val()
                            var schedule_payment_contraint_input = $('#schedule_payment_contraint_input').val()
                            var schedule_payment_date = $('#schedule_payment_date').val();

                            if (from_account.trim() == '' || transfer_amount == '' || category.trim() =='' || purpose.trim() == '') {
                                toaster('Field must not be empty', 'error');
                                return false

                            }

                            if (parseFloat(amt) < parseFloat(transfer_amount)) {
                                toaster('Insufficient account balance', 'error', 10000)
                                return false;
                            }
                            //set purpose and category values
                            var category_info = category.split("~")
                            $("#display_category").text(category_info[1])
                            $("#display_purpose").text(purpose)

                            $("#transaction_form").hide()
                            $("#transaction_summary").show()
                            $('#print_button').hide();

                            {{-- $("#customCheck1").on("change", function(){
                            if ($(this).is(":checked")){
                                console.log("checked");
                            }else {
                                console.log("unchecked")
                            }
                        }); --}}

                            if ($('#customCheck1').is(':checked')) {
                                {{-- console.log("checked"); --}}
                                {{-- $(".schedule_payment_summary").show(); --}}
                                {{-- $("#transaction_summary").parents("#schedule_payment_summary").hide(); --}}
                                {{-- $("table tr:nth-child(6)").hide(); --}}
                            } else {
                                console.log("unchecked");
                                {{-- $(".schedule_payment_summary").hide(); --}}

                            }


                            if (schedule_payment_contraint_input != '' && schedule_payment_date =='') {
                                $('.display_schedule_payment_date').text('N/A') // shedule date NULL
                                toaster('Select schedule date for subsequent transfers', 'error')
                                {{-- alert('Select schedule date for subsequent transfers') --}}
                                return false
                            }

                            $('.display_schedule_payment_date').text(schedule_payment_date)

                            if (type == 'beneficiary') {

                                var to_account = $('#to_account').val()

                                $('.display_schedule_payment_date').text(schedule_payment_date)


                                if (from_account.trim() == '' || to_account.trim() == '' || transfer_amount
                                    .trim() == '' || category.trim() == '' || purpose.trim() == '') {
                                    toaster('Field must not be empty', 'error');

                                    return false
                                } else {
                                    //set purpose and category values
                                    var category_info = category.split("~")
                                    $("#display_category").text(category_info[1])
                                    $("#display_purpose").text(purpose)

                                    $("#transaction_form").hide()
                                    $("#transaction_summary").show()
                                }




                            } else if (type == 'onetime') {

                                var from_account = $('#from_account').val()

                                // ONETIME BENEFICIARY DETAILS
                                var onetime_beneficiary_alias_name = $('#onetime_beneficiary_alias_name').val()
                                var onetime_beneficiary_account_number = $(
                                    '#onetime_beneficiary_account_number').val()
                                var onetime_beneficiary_account_currency = $(
                                    '#onetime_beneficiary_account_currency').val()
                                var onetime_beneficiary_name = $('#onetime_beneficiary_name').val()
                                var onetime_beneficiary_bank_name = $('#onetime_beneficiary_bank_name')
                                    .val()
                                var onetime_beneficiary_phone = $('#onetime_beneficiary_phone').val()



                                // END OF ONETIME BENEFICIARY DETAILS


                                if (from_account.trim() == '' || onetime_beneficiary_account_number
                                    .trim() ==
                                    '' || transfer_amount.trim() == '' || category.trim() == '' || purpose
                                    .trim() == '') {
                                    toaster('Field must not be empty', 'error');

                                    return false;
                                } else {
                                    //set purpose and category values
                                    var category_info = category.split("~")
                                    $("#display_category").text(category_info[1])
                                    $("#display_purpose").text(purpose)

                                    $("#transaction_form").hide()
                                    $("#transaction_summary").show()
                                }




                            } else {
                                toaster('CHOOSE EITHER BENEFICIARY OR ONTIME');
                                return false
                            }
                        });

                        $("#onetime_next_button").click(function() {
                            var onetime_from_account_ = $("#onetime_from_account").val();
                            var onetime_receiver_name = $("#onetime_beneficiary_alias_name").val();
                            var onetime_bank_name = $("#onetime_beneficiary_bank_name").val();
                            var onetime_account_number = $("#onetime_beneficiary_account_number").val();
                            var onetime_account_currency = $("#onetime_beneficiary_account_currency").val();
                            var onetime_telephone = $("#onetime_beneficiary_phone").val();
                            var onetime_amount = $("#onetime_amount").val();
                            var onetime_expense_category = $("#onetime_amount").val();
                        })


                        var user_pin = $('#user_pin').val();
                        // POST TO API

                        $('#confirm_button').click(function(e) {
                            e.preventDefault();

                            var type = $("input[type='radio']:checked").val();
                            {{-- console.log(type); --}}



                            if (type == 'beneficiary') {

                                var from_account = $('#from_account').val().split('~')
                                var to_account = $('#to_account').val().split('~')
                                var transfer_amount = $('#amount').val()
                                var category = $('#category').val().split('~')
                                var purpose = $('#purpose').val()
                                var schedule_payment_contraint_input = $(
                                        '#schedule_payment_contraint_input')
                                    .val()
                                var schedule_payment_date = $('#schedule_payment_date').val();


                                var from_account_ = from_account[2];
                                var to_account_ = to_account[2];
                                var account_name = to_account[1];
                                var currency = to_account[3];
                                var category_ = category[0]
                                var bank_name = to_account[0]
                                var user_pin = $('#user_pin').val();


                                if (from_account_.trim() == '' || to_account_.trim() == '' ||
                                    transfer_amount
                                    .trim() == '' || category_.trim() == '' || purpose.trim() == '' ||
                                    user_pin == '') {
                                    toaster('Field must not be empty', 'error', 10000)
                                    return false;
                                }

                                $('#spinner').show(),
                                    $('#spinner-text').show(),

                                    $('#confirm_transfer').hide(),
                                    $('#confirm_button').attr('disabled', true);


                                {{-- console.log(from_account_);
                        console.log(to_account);
                        console.log(transfer_amount);
                        console.log(category_);
                        console.log(purpose);
                        console.log(schedule_payment_contraint_input);
                        console.log(schedule_payment_date); --}}

                                $.ajax({
                                    type: 'POST',
                                    url:  'transfer-to-other-bank-beneficiary-api',
                                    datatype: "application/json",
                                    'data': {
                                        'from_account': from_account_,
                                        'to_account': to_account_,
                                        'amount': transfer_amount,
                                        'category': category_,
                                        'currency': currency,
                                        'bank_name': bank_name,
                                        'secPin': user_pin,
                                        'payment_date': schedule_payment_date,
                                        'beneficiaryName': account_name,
                                        'naration': purpose,

                                    },
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    success: function(response) {
                                        console.log(response);

                                        if (response.responseCode == '000') {
                                            {{-- toaster(response.message, 'success', 1000) --}}
                                            $('#confirm_button').hide();
                                            $('#back_button').hide();
                                            $('#print_receipt').show();
                                            $(".rtgs_card_right").hide();
                                            $(".success_gif").show();

                                            Swal.fire(
                                                response.message,
                                                '',
                                                'success'
                                            );
                                            s
                                        } else {
                                            toaster(response.message, 'error', 10000)

                                            $('#spinner').hide();
                                            $('#spinner-text').hide();
                                            $('#print_receipt').hide();
                                            $(".success_gif").hide();
                                            $(".rtgs_card_right").show();

                                            $('#confirm_transfer').show();
                                            $('#confirm_button').attr('disabled', false);


                                        }
                                    },
                                    error: function(xhr, status, error) {
                                        $('#spinner').hide();
                                        $('#spinner-text').hide();
                                        $('#print_receipt').hide();


                                        $('#confirm_transfer').show();
                                        $('#confirm_button').attr('disabled', false);
                                    }
                                })

                            } else {

                                //alert('Hello');
                                var from_account = $('#from_account').val().split('~')
                                var from_account_ = from_account[2];
                                var alias_name = $('#onetime_beneficiary_alias_name').val();
                                var to_account = $('#onetime_beneficiary_account_number').val();
                                var currency = $('#onetime_beneficiary_account_currency').val();
                                var currency_ = currency[0];
                                var bank_name = $('#onetime_beneficiary_bank_name').val();
                                var onetime_beneficiary_phone = $('#onetime_beneficiary_phone').val();
                                var amount = $('#amount').val();
                                var category = $('#category').val().split('~');
                                var category_ = category[0];
                                var naration = $('#purpose').val();
                                var schedule_date = $('#schedule_payment_date').val();
                                var user_pin = $('#user_pin').val();

                                console.log(from_account_);
                                console.log(alias_name);
                                console.log(to_account);
                                console.log(currency_);
                                console.log(bank_name);
                                console.log(onetime_beneficiary_phone);
                                console.log(amount);
                                console.log(category_);
                                console.log(naration);
                                console.log(schedule_date);


                                if (from_account_.trim() == '' || to_account_.trim() == '' ||
                                    transfer_amount
                                    .trim() == '' || currency_ == '' || alias_name == '' || category_
                                .trim() ==
                                    '' || purpose.trim() == '' ||
                                    user_pin == '') {
                                    toaster('Field must not be empty', 'error', 10000)
                                    return false;
                                }

                                $('#spinner').show(),
                                    $('#spinner-text').show(),

                                    $('#confirm_transfer').hide(),
                                    $('#confirm_button').attr('disabled', true);

                                $.ajax({
                                    type: 'POST',
                                    url:  'transfer-to-other-bank-onetime-beneficiary-api',
                                    datatype: "application/json",
                                    data: {
                                        'from_account': from_account_,
                                        'beneficiary_name': alias_name,
                                        'to_account': to_account,
                                        'account_currency': currency_,
                                        'bankName': bank_name,
                                        'beneficiary_phone': onetime_beneficiary_phone,
                                        'amount': amount,
                                        'category': category_,
                                        'naration': naration,
                                        'schedule_date': schedule_date,
                                        'secPin': user_pin

                                    },
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    success: function(response) {
                                        console.log(response);


                                        if (response.responseCode == '000') {
                                            {{-- toaster(response.message, 'success', 1000) --}}
                                            $('#confirm_button').hide();
                                            $('#back_button').hide();
                                            $('#print_receipt').show();
                                            $(".success_gif").show();
                                            $(".rtgs_card_right").hide();

                                            Swal.fire(
                                                response.message,
                                                '',
                                                'success'
                                            );

                                        } else {
                                            toaster(response.message, 'error', 10000)

                                            $('#spinner').hide();
                                            $('#spinner-text').hide();
                                            $('#print_receipt').hide();
                                            $(".success_gif").hide();
                                            $(".rtgs_card_right").show();

                                            $('#confirm_transfer').show();
                                            $('#confirm_button').attr('disabled', false);


                                        }
                                    }
                                })

                            }
                        });




                    });

                </script>

            @endsection
