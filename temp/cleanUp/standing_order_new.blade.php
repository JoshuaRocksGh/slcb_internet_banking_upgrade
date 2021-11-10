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
            {{-- margin: 10px; --}}
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

    <div class="container-fluid hide_on_print">
        <br>
        <!-- start page title -->
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-primary">
                    <img src="{{ asset('assets/images/logoRKB.png') }}" alt="logo" style="zoom: 0.05">&emsp;
                    STANDING ORDER

                </h4>
            </div>

            <div class="col-md-6 text-right">
                <h6>

                    <span class="flaot-right">
                        <b class="text-primary"> Transfer </b> &nbsp; > &nbsp; <b class="text-danger">Standing Order</b>


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
            <div class=" ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">

                            {{-- RECEIPT --}}

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
                                                        <h2><span id="personal_transfer_receipt">Standing Order
                                                                Receipt</span>
                                                            {{-- <span id="coporate_transfer_approval">Transaction Awaiting
                                                                Approval</span> --}}
                                                        </h2>
                                                    </div>
                                                    <br>
                                                    {{-- <div class="row">
                                                        <div class="col-md-12 text-center">
                                                            <h2>INVOICE</h2>
                                                            <h5>04854654101</h5>
                                                        </div>
                                                    </div> --}}
                                                    <br />
                                                    {{-- <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th><h5>Description</h5></th>
                                                                    <th><h5>Further Details</h5></th>
                                                                    <th><h5>Amount</h5></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="col-md-9">
                                                                        From Account Number<br>
                                                                        004004110449140121
                                                                    </td>
                                                                    <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i> 50,000 </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-md-9">
                                                                        To Account Number<br>
                                                                        004004110445350137
                                                                    </td>
                                                                    <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i> 5,200 </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-md-9">Category Type</td>
                                                                    <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i> 25,000 </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-md-9">Purpose of Transfer</td>
                                                                    <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i> 2,200 </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-md-9"> Transfer Amount</td>
                                                                    <td class="text-right">
                                                                        <p> <strong>Shipment and Taxes:</strong> </p>
                                                                        <p> <strong>Total Amount: </strong> </p>
                                                                        <p> <strong>Discount: </strong> </p>
                                                                        <p> <strong>Payable Amount: </strong> </p>
                                                                    </td>
                                                                    <td>
                                                                        <p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> 500 </strong> </p>
                                                                        <p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> 82,900</strong> </p>
                                                                        <p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> 3,000 </strong> </p>
                                                                        <p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> 79,900</strong> </p>
                                                                    </td>
                                                                </tr>
                                                                <tr style="color: #F81D2D;">
                                                                    <td class="text-right">
                                                                        <h4><strong>Total:</strong></h4>
                                                                    </td>
                                                                    <td class="text-left">
                                                                        <h4><strong><i class="fas fa-rupee-sign" area-hidden="true"></i> 79,900 </strong></h4>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div> --}}
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
                                                                    <td class="text-right"><span
                                                                            id="from_account_receipt"></span></td>
                                                                    {{-- <td></td> --}}
                                                                </tr>
                                                                <tr>
                                                                    {{-- <th scope="row">2</th> --}}
                                                                    <td>Transfer To Account Number</td>
                                                                    <td class="text-right"><span
                                                                            id="to_account_receipt"></span></td>
                                                                    {{-- <td></td> --}}
                                                                </tr>
                                                                <tr>
                                                                    {{-- <th scope="row">3</th> --}}
                                                                    <td>Transfer Category</td>
                                                                    <td class="text-right"><span
                                                                            id="category_receipt"></span></td>
                                                                    {{-- <td></td> --}}
                                                                </tr>
                                                                <tr>
                                                                    {{-- <th scope="row">3</th> --}}
                                                                    <td>Transfer Purpose</td>
                                                                    <td class="text-right"><span
                                                                            id="purpose_receipt"></span></td>
                                                                    {{-- <td></td> --}}
                                                                </tr>
                                                                <tr>
                                                                    <td>Start Date:</td>
                                                                    <td>
                                                                        <span
                                                                            class="font-13 text-primary h3 display_so_start_date"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>End Date:</td>
                                                                    <td>
                                                                        <span
                                                                            class="font-13 text-primary h3 display_so_end_date"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Frequency:</td>
                                                                    <td>
                                                                        <span
                                                                            class="font-13 text-primary h3 display_frequency_so"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    {{-- <th scope="row">3</th> --}}
                                                                    <td>Amount</td>
                                                                    {{-- <td></td> --}}
                                                                    <td class="text-right"><strong><span
                                                                                class="receipt_currency"></span>
                                                                            &nbsp;<span id="amount_receipt"></span></strong>
                                                                    </td>
                                                                </tr>
                                                                {{-- <tr>
                                                                    <th scope="row">3</th>
                                                                    <td>Transaction Fee </td>
                                                                    <td></td>
                                                                    <td class="text-right"><strong>(<span
                                                                                class="receipt_currency"></span>) &nbsp;
                                                                            15.00</strong></td>
                                                                </tr> --}}
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
                                                        <div class="col-md-5"></div>
                                                        <div class="col-md-2">
                                                            <button
                                                                class="btn btn-light btn-rounded hide_on_print text-center"
                                                                type="button" onclick="window.print()">Print
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
                            </div>

                            <div class="form_process">

                                <div class="row">

                                    {{-- SUMMARY FORM GOES HERE --}}

                                    <div class="col-md-7" id="transaction_summary"
                                        style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));display: none">
                                        <br><br>
                                        <div class="col-md-12">
                                            <div class="card border p-3 mt-4 mt-lg-0 rounded">
                                                <h4 class="header-title mb-3">Transfer Detail Summary</h4>

                                                <p class="display-4 text-center text-success success-message "></p>

                                                <div class="table-responsive table-striped table-bordered">
                                                    <table class="table mb-0">

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


                                                                    {{-- <span class="d-block font-13 text-primary text-bold display_to_account_name"
                                                                        id="online_display_beneficiary_alias_name"> </span> --}}

                                                                    <span
                                                                        class="font-13 text-primary h3 online_display_beneficiary_account_no"
                                                                        id="online_display_beneficiary_account_no"> </span>
                                                                    {{-- &nbsp; | &nbsp; --}}
                                                                    <span
                                                                        class="font-13 text-primary h3 online_display_beneficiary_account_currency"
                                                                        id="online_display_beneficiary_account_currency">
                                                                    </span>

                                                                    <span
                                                                        class="d-block font-13 text-primary text-bold online_display_beneficiary_email"
                                                                        id="online_display_beneficiary_email"> </span>

                                                                    <span
                                                                        class="d-block font-13 text-primary text-bold online_display_beneficiary_phone"
                                                                        id="online_display_beneficiary_phone"> </span>


                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>Amount:</td>
                                                                <td>
                                                                    <span class="font-15 text-primary h3 display_currency"
                                                                        id="display_currency"> </span>
                                                                    &nbsp;
                                                                    <span
                                                                        class="font-15 text-primary h3 display_converted_amount"
                                                                        id="display_transfer_amount"></span>

                                                                </td>
                                                            </tr>


                                                            {{-- <tr>
                                                                <td>Category:</td>
                                                                <td>
                                                                    <span class="font-13 text-primary h3 display_category"
                                                                        id="display_category"></span>

                                                                </td>
                                                            </tr> --}}

                                                            <tr>
                                                                <td>Start Date:</td>
                                                                <td>
                                                                    <span
                                                                        class="font-13 text-primary h3 display_so_start_date"></span>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>End Date:</td>
                                                                <td>
                                                                    <span
                                                                        class="font-13 text-primary h3 display_so_end_date"></span>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>Frequency:</td>
                                                                <td>
                                                                    <span
                                                                        class="font-13 text-primary h3 display_frequency_so"></span>
                                                                </td>
                                                            </tr>


                                                            <tr>
                                                                <td>Purpose:</td>
                                                                <td>
                                                                    <span class="font-13 text-primary h3 display_purpose"
                                                                        id="display_purpose"></span>
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

                                                                    <div class="alert alert-info form-control col-md-12"
                                                                        role="alert">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox"
                                                                                class="custom-control-input"
                                                                                name="terms_and_conditions"
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
                                                            id="back_button"><i class="mdi mdi-reply-all-outline"></i>
                                                            &nbsp;Back</button> &nbsp; </span>
                                                    <span>&nbsp; <button class="btn btn-primary btn-rounded" type="button"
                                                            id="confirm_modal_button">
                                                            <span id="confirm_transfer" data-toggle="modal"
                                                                data-target="#centermodal">Confirm Transfer</span>
                                                            <span class="spinner-border spinner-border-sm mr-1"
                                                                role="status" id="spinner" aria-hidden="true"></span>
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

                                    <div class=" col-md-7 m-2" id="transaction_form"
                                        style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">
                                        <br>

                                        <form action="#" id="payment_details_form" autocomplete="off"
                                            aria-autocomplete="none">
                                            @csrf
                                            <div class="row container">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">


                                                    <div class="form-group row ">
                                                        <b class="col-md-12 text-primary">Account from which the money will
                                                            be
                                                            tansfered &nbsp <span class="text-danger">*</span></b>

                                                        <select class="form-control col-md-12" id="from_account" required>
                                                            <option value=""> -- Select Account --</option>
                                                        </select>

                                                    </div>
                                                    {{-- <input type="text" id="hidden_currency" > --}}

                                                    <hr style="padding-top: 0px; padding-bottom: 0px;">

                                                    <div class="form-group no_beneficiary" style="display:none;">
                                                        <div class="alert alert-warning" role="alert">
                                                            <i class="mdi mdi-alert-outline mr-2"></i>
                                                            <strong>No
                                                                beneficiary found
                                                            </strong>

                                                        </div>
                                                    </div>
                                                    <div class="row ">

                                                        <div class="col-md-4">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    name="onetime_beneficiary_type" id="customCheck1">
                                                                <label class="custom-control-label " for="customCheck1">
                                                                    <b class="text-primary">Onetime ?</b> </label>
                                                            </div>

                                                        </div>

                                                        <div class="col-md-8">
                                                            <div class="form-group  row mb-1 select_beneficiary">


                                                                <select class="form-control col-md-12" id="to_account"
                                                                    required>
                                                                    <option value=""> -- Select Beneficiary --</option>

                                                                </select>

                                                            </div>

                                                            {{-- <span class="badge badge-primary float-right"
                                                                style="cursor: pointer"><a
                                                                    href="{{ url('add-local-bank-beneficiary') }}"
                                                                    class="text-white" id="add_beneficiary_badge">Create
                                                                    Beneficiary</a>
                                                            </span> --}}
                                                        </div>
                                                        <hr>

                                                    </div>

                                                    <div class="row" id="saved_beneficiary_form">

                                                        <div class="col-md-12">

                                                            <div class="form-group row">
                                                                <b class="col-md-4 text-primary"> Beneficiary A/C Number</b>
                                                                <input type="text" class="form-control col-md-8 readOnly"
                                                                    id="saved_account_number" readonly>
                                                            </div>

                                                            <div class="form-group row">
                                                                <b class="col-md-4 text-primary"> Beneficiary Name</b>
                                                                <input type="text" class="form-control col-md-8 readOnly "
                                                                    id="saved_beneficiary_name" readonly>
                                                            </div>



                                                            <div class="form-group row">
                                                                <b class="col-md-4 text-primary"> Beneficiary Email</b>
                                                                <input type="text" class="form-control col-md-8 readOnly"
                                                                    id="saved_beneficiary_email" readonly>
                                                            </div>




                                                            <div class="form-group row">

                                                                <b class="col-md-4 text-primary">Actual Amount &nbsp; <span
                                                                        class="text-danger">*</span></b>

                                                                <div class="input-group mb-1 col-8" style="padding: 0px;">
                                                                    <div class="input-group-prepend">
                                                                        <input type="text" class="input-group-text "
                                                                            id="select_currency" style="width: 80px;"
                                                                            readonly>

                                                                        {{-- <select name=""
                                                                            class="input-group-text select_currency"
                                                                            id="select_currency">

                                                                        </select> --}}
                                                                    </div>

                                                                    &nbsp;&nbsp;
                                                                    <input type="text" class="form-control " id="amount"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                                        required>
                                                                </div>


                                                            </div>

                                                            <div class="form-group row mb-3">
                                                                <b class=" col-md-4 text-primary">Start Date &nbsp; <span
                                                                        class="text-danger">*</span></b>


                                                                <input type="date" class="form-control col-md-8"
                                                                    min="01-01-1997" max="31-12-2030" id="so_start_date"
                                                                    required>


                                                            </div>

                                                            <div class="form-group row mb-3">
                                                                <b class=" col-md-4 text-primary">End Date</b>

                                                                <input type="date" class="form-control col-md-8"
                                                                    id="so_end_date" required>


                                                            </div>

                                                            <div class="form-group row">

                                                                <b class="col-md-4 text-primary">Frequency &nbsp; <span
                                                                        class="text-danger">*</span></b>


                                                                <select class="form-control col-md-8 so_frequency"
                                                                    id="beneficiary_frequency"
                                                                    placeholder="Select Pick Up Branch" required>
                                                                    <option value="">--Select Frequency--</option>
                                                                    {{-- <option value="Joshua">Joshua </option> --}}
                                                                </select>

                                                            </div>

                                                            {{-- <div class="form-group row">

                                                                <b class="col-md-4 text-primary">Frequency &nbsp; <span
                                                                        class="text-danger">*</span></b>


                                                                <select class="form-control col-md-8 so_frequency"
                                                                    id="beneficiary_frequency"
                                                                    placeholder="Select Pick Up Branch" required>
                                                                    <option value="">--Select Frequency--</option>
                                                                    <option value="Joshua">Joshua </option>
                                                                </select>

                                                            </div> --}}

                                                            {{-- <div class="form-group row">

                                                                <b class="col-4 text-primary"> Cur / Rate / Amount</b>

                                                                <div class="input-group mb-1 col-8" style="padding: 0px;">
                                                                    <div class="input-group-prepend">
                                                                        <select name=""
                                                                            class="input-group-text select_currency"
                                                                            id="select_currency_">

                                                                        </select>
                                                                    </div>
                                                                    &nbsp;&nbsp;
                                                                    <div class="input-group-prepend">
                                                                        <input type="text" class="form-control readOnly "
                                                                            id="convertor_rate_" value="1.00"
                                                                            style="width: 100px;" readonly>
                                                                    </div>
                                                                    &nbsp;&nbsp;
                                                                    <input type="text" class="form-control"
                                                                        id="converted_amount" placeholder="Converted Amount"
                                                                        aria-label="converted_amount"
                                                                        aria-describedby="basic-addon1" readonly>
                                                                </div>


                                                            </div> --}}


                                                            <div class="form-group row">
                                                                <b class="col-md-4 text-primary">Purpose of Transfer
                                                                    <span class="text-danger">*</span>
                                                                </b>

                                                                <input type="text" class="form-control col-md-8"
                                                                    id="purpose" value="Standing Order Transfer"
                                                                    placeholder="Enter purpose of transaction" <div
                                                                    class="form-group row mb-3">


                                                            </div>



                                                            {{-- <div class="form-group row">
                                                                <b class="col-md-4 text-primary">Expense Category &nbsp;
                                                                </b>
                                                                <input type="hidden" value="Others" id="category_">


                                                                <select class="form-control col-md-8" id="category"
                                                                    required>
                                                                    <option value="">---Not Selected---</option>

                                                                </select>


                                                            </div> --}}


                                                            {{-- <div class="form-group row">
                                                                <b class="col-md-4 text-primary ">Future Payment &nbsp; </b>

                                                                <input type="date" class="form-control col-md-8"
                                                                    id="future_payement" required>
                                                            </div> --}}

                                                            {{-- <div class="row">
                                                                <div class="col-md-4"></div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group mb-0">
                                                                        <input type="checkbox" class="custom-control-inputt"
                                                                            id="invoice_check">
                                                                        &nbsp; &nbsp; <label class="h6">Invoice Attachment ?
                                                                            <span class="badge badge-primary text-right"
                                                                                style="cursor: pointer" data-toggle="modal"
                                                                                data-target="#centermodal">View</span>
                                                                        </label>
                                                                        <span class="hide_invoice">
                                                                            <br>
                                                                            <input type="file" class="hide_invoice"
                                                                                id="invoice_attachment" required>
                                                                        </span>


                                                                    </div>

                                                                </div>
                                                            </div> --}}



                                                            {{-- <div class="row">
                                                                <div class="col-md-4"></div>
                                                                <div class="col-md-8">

                                                                    <div class="form-group">

                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox"
                                                                                class="custom-control-input"
                                                                                id="customCheck1">
                                                                            <label class="custom-control-label"
                                                                                for="customCheck1">Schedule
                                                                                Payments</label>
                                                                        </div>
                                                                        <legend></legend>


                                                                        <input type="text" class="form-control"
                                                                            id="schedule_payment_contraint_input">

                                                                        <input type="date" class="form-control"
                                                                            id="schedule_payment_date">

                                                                    </div>
                                                                </div>
                                                            </div> --}}


                                                        </div>

                                                        <br>





                                                    </div>


                                                    <div class=" row form-group" id="onetime_beneficiary_form">
                                                        <div class="col-md-12">

                                                            <div class="form-group row">
                                                                <b class="col-md-4 text-primary"> Beneficiary A/C Number</b>
                                                                <input type="text" class="form-control col-md-8 "
                                                                    id="onetime_account_number"
                                                                    placeholder="Enter Account Number"
                                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                            </div>

                                                            <div class="form-group row">
                                                                <b class="col-md-4 text-primary"> Beneficiary A/C Name</b>
                                                                <input type="text" class="form-control col-md-8 readOnly"
                                                                    id="onetime_beneficiary_name" readonly>
                                                            </div>



                                                            <div class="form-group row">
                                                                <b class="col-md-4 text-primary"> Beneficiary Email</b>
                                                                <input type="text" class="form-control col-md-8 "
                                                                    id="onetime_beneficiary_email"
                                                                    placeholder="Enter Beneficiary Email">
                                                            </div>




                                                            <div class="form-group row">

                                                                <b class="col-md-4 text-primary">Actual Amount &nbsp; <span
                                                                        class="text-danger">*</span></b>

                                                                <div class="input-group mb-3 col-8" style="padding: 0px;">
                                                                    <div class="input-group-prepend">
                                                                        <input type="text" class="input-group-text "
                                                                            id="select_currency__" style="width: 80px;"
                                                                            readonly>

                                                                        {{-- <select name="" class="input-group-text"
                                                                            id="select_currency__">
                                                                            <option value="SLL" selected>SLL</option>

                                                                        </select> --}}
                                                                    </div>

                                                                    &nbsp;&nbsp;
                                                                    <input type="text" class="form-control " id="amount_"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                                        required>
                                                                </div>


                                                            </div>

                                                            <div class="form-group row mb-3">
                                                                <b class=" col-md-4 text-primary">Start Date &nbsp; <span
                                                                        class="text-danger">*</span></b>


                                                                <input type="date" class="form-control col-md-8"
                                                                    min="01-01-1997" max="31-12-2030" id="so_start_date"
                                                                    required>


                                                            </div>


                                                            <div class="form-group row mb-3">
                                                                <b class=" col-md-4 text-primary">End Date</b>

                                                                <input type="date" class="form-control col-md-8"
                                                                    id="so_end_date" required>


                                                            </div>

                                                            {{-- <div class="form-group row">

                                                                <b class="col-4 text-primary"> Cur / Rate / Amount</b>

                                                                <div class="input-group mb-3 col-8" style="padding: 0px;">
                                                                    <div class="input-group-prepend">
                                                                        <select name=""
                                                                            class="input-group-text select_currency"
                                                                            id="select_currency__">
                                                                            <option value="SLL" selected>SLL</option>
                                                                            <option value="EUR">EURO</option>
                                                                            <option value="USD">USD</option>
                                                                        </select>
                                                                    </div>
                                                                    &nbsp;&nbsp;
                                                                    <div class="input-group-prepend">
                                                                        <input type="text"
                                                                            class="form-control display_midrate"
                                                                            id="convertor_rate" value="1.00"
                                                                            style="width: 100px;" readonly>
                                                                    </div>
                                                                    &nbsp;&nbsp;
                                                                    <input type="text"
                                                                        class="form-control  display_converted_amount"
                                                                        id="converted_amount_"
                                                                        placeholder="Converted Amount"
                                                                        aria-label="Converted Amount"
                                                                        aria-describedby="basic-addon1" readonly>
                                                                </div>


                                                            </div> --}}

                                                            <div class="form-group row mb-3">
                                                                <b class="col-md-4 text-primary">Purpose of Transfer
                                                                    &nbsp; <span class="text-danger">*</span>
                                                                </b>

                                                                <input type="text" class="form-control col-md-8"
                                                                    id="onetime_purpose" value="Standing Order Transfer"
                                                                    placeholder="Enter purpose of transaction">

                                                            </div>


                                                            {{-- <div class="form-group row">
                                                                <b class="col-md-4 text-primary">Expense Category &nbsp;
                                                                </b>


                                                                <select class="form-control col-md-8" id="onetime_category"
                                                                    required>
                                                                    <option value="">---Not Selected---</option>

                                                                </select>


                                                            </div> --}}






                                                            {{-- <div class="form-group row mb-3">
                                                                <b class="col-md-4 text-primary ">Future Payment &nbsp;

                                                                </b>

                                                                <input type="date" class="form-control col-md-8"
                                                                    id="onetime_future_payement" required>

                                                            </div> --}}





                                                        </div>

                                                    </div>
                                                    <legend></legend>

                                                    <div class="form-group text-right yes_beneficiary">
                                                        <button class="btn btn-primary btn-rounded" type="button"
                                                            id="next_button">
                                                            &nbsp; Next &nbsp;<i class="fe-arrow-right"></i></button>
                                                    </div>


                                                </div>




                                                <div class="col-md-1"></div>
                                        </form>



                                    </div><!-- end col -->


                                    {{-- RIGHT CARD --}}


                                </div>

                                <div class="col-md-4 m-2 d-none d-sm-block card_right"
                                    style="background-image: linear-gradient(to bottom right, white, rgb(201, 223, 230)); zoom: 0.9 ;">

                                    <div class=" col-md-12">
                                        <br><br>
                                        <div class="card card-body">
                                            <h4 class="text-primary">Sender Acc. Info</h4>
                                            <hr class="mt-0">
                                            <div class="row ">
                                                <p class="col-md-5">Sender Name:</p>
                                                <span class="text-primary display_from_account_name col-md-7"></span>

                                                <p class="col-md-5">Sender Account:</p>
                                                <span class="text-primary display_from_account_no col-md-7"></span>

                                                <p class="col-md-5">Available Balance:</p>
                                                <span class="text-primary display_from_account_amount col-md-7"></span>

                                                <p class="col-md-5">Account Currency:</p>
                                                <span class="text-primary display_from_account_currency col-md-7"></span>
                                            </div>

                                            <h4 class="text-primary">Receiver Acc. Info</h4>
                                            <hr class="mt-0">
                                            <div class="row">
                                                <p class="col-md-5">Receiver Name:</p>
                                                <span class="text-primary display_to_account_name col-md-7"></span>

                                                <p class="col-md-5">Receiver Account:</p>
                                                <span class="text-primary display_to_account_no col-md-7"></span>

                                                <p class="col-md-5">Account Currency:</p>
                                                <span class="text-primary display_to_account_currency col-md-7"></span>

                                                <p class="col-md-5">Start Date:</p>
                                                <span class="text-primary display_so_start_date col-md-7"></span>

                                                <p class="col-md-5">End Date:</p>
                                                <span class="text-primary display_so_end_date col-md-7"></span>

                                                <p class="col-md-5">Frequency:</p>
                                                <span class="text-primary display_frequency_so col-md-7"></span>
                                            </div>

                                            <hr>
                                            <div class="row">
                                                <p class="col-md-5 mt-2 text-primary">Transfer Amount:</p>
                                                <h4 class="row col-md-7">
                                                    <span class="text-danger display_transfer_currency col-md-4"></span>
                                                    <span class="text-danger display_amount col-md-8"></span>

                                                </h4>

                                                {{-- <p class="col-md-5">Currency Rate:</p> --}}
                                                {{-- <span class="text-primary display_midrate col-md-7"></span> --}}

                                                {{-- <p class="col-md-5">Converted Amount:</p> --}}
                                                {{-- <span class="text-primary display_converted_amount col-md-7"></span> --}}
                                            </div>

                                            <br>

                                            {{-- <div class="row">
                                                <h6 class="text-primary col-md-5">Transaction Fee:</h6>
                                                <span class="text-danger text-bold col-md-7">0.10% of transfer amount</span>
                                            </div> --}}

                                            {{-- <br>
                                            <div class="row">
                                                <h6 class="text-primary col-md-5">Please Note:</h6>
                                                <span class="text-danger col-md-7">RTGS Tranfers should be above (SLL
                                                    50,000,000.00)</span>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div> <!-- end card-body -->

                <div class="">



                    <div class="">


                    </div> <!-- end col -->

                    {{-- <div class="col-md-5 text-center">
                                <img src="{{ asset('land_asset/images/same-bank.gif') }}" class="img-fluid" />
                            </div> <!-- end col --> --}}


                    <!-- end row -->



                </div>

                <div class="" id="">








                </div>

                <!-- Center modal content -->
                <div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title text-primary text-center" id="myCenterModalLabel ">ENTER TRANSACTION
                                    PIN</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                            </div>
                            <div class="modal-body transfer_pin_modal">

                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-9  text-center">
                                        <form action="#" autocomplete="off" aria-autocomplete="off">
                                            <input type="text" name="user_pin" maxlength="4" autocomplete="off"
                                                aria-autocomplete="off" class="form-control key hide_on_print" id="user_pin"
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

                {{-- IMAGE MODAL --}}


                <!-- Center modal content -->
                <div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true" style="zoom: 0.9;">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title text-primary" id="myCenterModalLabel">Aquiring a Savings
                                    Account</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Ã—</button>
                            </div>
                            <div class="modal-body">
                                <div class=" ">
                                    <img src="" id="display_invoice_attachment" class="img-fluid" />
                                </div>

                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->



                <!-- Modal -->
                <div id="multiple-one" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="multiple-oneModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="POST" id="confirm_details" autocomplete="off" aria-autocomplete="off">
                                <div class="modal-header">
                                    <h4 class="modal-title font-16 purple-color" id="multiple-oneModalLabel">Confirm
                                        Details</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>

                                <div class="modal-body">

                                    From: <span class="font-13 text-primary" id="display_from_account"> &nbsp
                                    </span><br><br>
                                    To: <span class="font-13 text-muted" id="display_to_account"> &nbsp
                                    </span><br><br>
                                    Schedule Payments: <span class="font-13 text-muted" id="display_payments"> &nbsp
                                    </span><br><br>
                                    Amount: <span class="font-13 text-muted" id="display_amount"> &nbsp
                                    </span><br><br>
                                    Naration: <span class="font-13 text-muted" id="display_naration"> &nbsp
                                    </span><br><br>
                                    Transaction fee: <span class="font-13 text-muted" id="display_trasaction_fee">
                                    </span><br><br>
                                    Total: <span class="font-13 text-muted" id="display_total"> &nbsp
                                    </span><br><br>

                                    <div class="form-group">
                                        <label class="font-16 purple-color">Enter Pin</label>
                                        <input type="text" class="form-control" id="pin" data-toggle="input-mask"
                                            placeholder="enter pin" required
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">

                                    </div>

                                </div>



                                <div class="modal-footer">
                                    <button type="send" id="send" class="btn btn-primary" data-target="#multiple-two"
                                        data-toggle="modal" data-dismiss="modal">Send</button>
                                </div>
                            </form>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->




            </div> <!-- end col -->

        </div> <!-- end row -->



    </div>


@endsection


@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        var c = {}

        var forex_rate = []
        var cur_1 = "SLL"
        var cur_2 = "SLL"

        var _cur_ = []
        var get_cur_1 = []
        var get_cur_2 = []

        function get_correct_fx_rate() {


            $.ajax({
                type: 'GET',
                url: 'get-correct-fx-rate-api',
                datatype: "application/json",
                success: function(response) {
                    console.log(response.data);
                    let data = response.data


                    if (response.responseCode == '000') {
                        forex_rate = response.data
                        console.log(forex_rate)
                    } else {

                    }


                },
                error: function(xhr, status, error) {
                    setTimeout(function() {
                        get_correct_fx_rate()
                    }, $.ajaxSetup().retryAfter)
                }

            })
        }

        function get_so_frequencies() {
            $.ajax({
                type: 'GET',
                url: 'get-standing-order-frequencies-api',
                datatype: "application/json",
                success: function(response) {
                    console.log(response.data);
                    let data = response.data
                    $.each(data, function(index) {

                        $('.so_frequency').append($('<option>', {
                            value: data[index].code
                        }).text(data[index].name));

                    });
                },
                error: function(xhr, status, error) {

                    setTimeout(function() {
                        get_so_frequencies()
                    }, $.ajaxSetup().retryAfter)
                }

            })
        }



        function from_account() {
            $.ajax({
                type: 'GET',
                url: 'get-my-account',
                datatype: "application/json",
                success: function(response) {
                    console.log(response.data);
                    if (response.responseCode == '000') {
                        let data = response.data
                        $.each(data, function(index) {

                            $('#from_account').append($('<option>', {
                                value: data[index].accountType + '~' + data[index]
                                    .accountDesc + '~' + data[index].accountNumber + '~' +
                                    data[index].currency + '~' + data[index]
                                    .availableBalance +
                                    '~' + data[index].accountMandate
                            }).text(data[index].accountNumber +
                                '~' + data[index].currency + ' ~ ' + formatToCurrency(
                                    parseFloat(data[index].availableBalance))
                            ));

                        });
                    } else {
                        if (response.data == null) {
                            window.location = 'logout'
                        }
                    }
                },
                error: function(xhr, status, error) {

                    setTimeout(function() {
                        from_account();
                    }, $.ajaxSetup().retryAfter)
                }

            })
        }

        function get_currency() {
            {{-- let name = $("#hidden_currency").val();
                console.log(name); --}}
            $.ajax({
                type: "GET",
                url: "get-currency-list-api",
                datatype: "application/json",
                success: function(response) {
                    {{-- console.log(response); --}}

                    let data = response.data


                    _cur_ = data
                    get_cur_1 = data
                    get_cur_2 = data

                    console.log(data);

                    $.each(data, function(index) {
                        $('.select_currency').append($('<option>', {
                            value: data[index].isoCode
                        }).text(data[index].isoCode));
                    })

                    $('.select_currency option').each(function() {
                        if ($(this).val() == 'SLL') {
                            $(this).prop("selected", true);
                        } else {

                        }
                    });

                    // $.each(data, function(index) {
                    //     $('#select_currency__').append($('<option>', {
                    //         value: data[index].isoCode
                    //     }).text(data[index].isoCode));
                    // })

                    // $('#select_currency__ option').each(function() {
                    //     if ($(this).val() == 'SLL') {
                    //         $(this).prop("selected", true);
                    //     } else {

                    //     }
                    // });

                },
                error: function(xhr, status, error) {

                    setTimeout(function() {
                        get_currency();
                    }, $.ajaxSetup().retryAfter)
                }
            })
        }

        function to_account() {
            $.ajax({
                type: 'GET',
                url: 'get-transfer-beneficiary-api?beneType=SAB',
                datatype: "application/json",
                success: function(response) {
                    console.log(response);
                    let data = response.data
                    {{-- console.log(data); --}}
                    if (response.data.length > 0) {
                        {{-- $('.yes_beneficiary').show() --}}
                        $('.no_beneficiary').hide()
                        $.each(data, function(index) {
                            //$('#from_account').append($('<option>', { value : data[index].accountType+'~'+data[index].accountDesc+'~'+data[index].accountNumber+'~'+data[index].currency+'~'+data[index].availableBalance}).text(data[index].accountType +'~'+ data[index].accountNumber +'~'+data[index].currency+'~'+data[index].availableBalance));
                            $('#to_account').append($('<option>', {
                                value: data[index].BENEF_TYPE + '~' + data[
                                        index]
                                    .NICKNAME + '~' + data[index].BEN_ACCOUNT +
                                    '~' + data[index].BEN_ACCOUNT_CURRENCY +
                                    '~' + data[index].EMAIL
                            }).text(data[index].BENEF_TYPE + '~' + data[index]
                                .BEN_ACCOUNT +
                                '~' + data[index].NICKNAME + '~' + data[index]
                                .BEN_ACCOUNT_CURRENCY));

                        });


                    } else {
                        {{-- $('.yes_beneficiary').hide() --}}
                        $('.no_beneficiary').show()
                    }


                },
                error: function(xhr, status, error) {
                    setTimeout(function() {
                        to_account()
                    }, $.ajaxSetup().retryAfter)
                }

            })
        }

        function expenseTypes() {
            let name = $('#category_').val();
            $.ajax({
                "type": "GET",
                "url": "get-expenses",
                datatype: "application/json",
                success: function(response) {
                    {{-- console.log(response.data); --}}
                    let data = response.data;

                    let exType = response.data.expenseName
                    console.log(name);

                    $.each(data, function(index) {

                        if ('Others' == data[index].expenseName) {
                            $("#category").append($('<option selected>', {
                                value: data[index].expenseCode + '~' + data[index]
                                    .expenseName
                            }).text(data[index].expenseName))
                        } else {
                            $("#category").append($('<option>', {
                                value: data[index].expenseCode + '~' + data[index]
                                    .expenseName
                            }).text(data[index].expenseName))
                        }


                    });

                    $.each(data, function(index) {

                        if ('Others' == data[index].expenseName) {
                            $("#onetime_category").append($('<option selected>', {
                                value: data[index].expenseCode + '~' + data[index]
                                    .expenseName
                            }).text(data[index].expenseName))
                        } else {
                            $("#onetime_category").append($('<option>', {
                                value: data[index].expenseCode + '~' + data[index]
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


        function customer() {
            var customerType = @json(session()->get('customerType'));
            console.log(customerType);

            if (customerType == 'C') {

                $('#coporate_transfer_approval').show();
                $('#personal_transfer_receipt').hide();
            } else {
                $('#personal_transfer_receipt').show();
                $('#coporate_transfer_approval').hide();
            }
        }

        $(document).ready(function() {

            $(".success_gif").hide();
            $('#spinner').hide();
            $('#spinner-text').hide();
            $('#print_receipt').hide();
            $(".hide_invoice").hide();
            $('.no_beneficiary').hide();
            $("#onetime_payment_details_form").show();
            $('.badge').hide();
            $(".card_right").hide();
            $(".receipt").hide();



            setTimeout(function() {
                from_account();
                to_account();
                expenseTypes();
                get_currency();
                get_correct_fx_rate();
                customer();
                get_so_frequencies();

            }, 500);

            var customerType = @json(session()->get('customerType'));
            console.log(customerType);

            if (customerType == 'C') {

                $('#coporate_transfer_approval').show();
                $('#personal_transfer_receipt').hide();
            } else {
                $('#personal_transfer_receipt').show();
                $('#coporate_transfer_approval').hide();
            }

            function getAccountDescription(account_no) {
                $.ajax({
                    "type": "POST",
                    "url": "get-account-description",
                    datatype: "application/json",
                    data: {
                        "authToken": "string",
                        "accountNumber": account_no
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function(response) {

                        console.log(response.responseCode)
                        if (response.responseCode == "000") {
                            console.log(response.data)
                            toaster(response.message, 'success', 5000);
                            $('#onetime_beneficiary_name').val(response.data
                                .accountDescription);
                            $('.display_to_account_name').text(response.data
                                .accountDescription);
                            $('.display_to_account_currency').text(response.data
                                .accountCurrencyDescription);
                            $('.display_to_account_no').text(account_no);
                            {{-- $('#select_currency_i').val(response.data.accountCurrencyDescription)
                            $('#select_currency').val(response.data.accountCurrencyCode + '~' +
                                response.data.accountCurrencyDescription) --}}


                            $('#save_beneficiary').show('')

                        } else {
                            toaster(response.message, 'error', 10000);
                            {{-- $('#account_name').val('')
                            $('#select_currency_i').val('')
                            $('#select_currency').val('')
                            $('#save_beneficiary').hide('') --}}


                        }
                    }

                })
            };


            $("#onetime_account_number").keyup(function() {
                let account_no = $(this).val();
                if (account_no.length > 17) {
                    getAccountDescription(account_no)
                }


            })

            $("#customCheck1").click(function() {
                if ($(this).is(":checked")) {
                    console.log("Checkbox is checked.");

                    $("#onetime_beneficiary_form").toggle(500);
                    $("#saved_beneficiary_form").hide();
                    $(".badge").toggle(500);
                    $(".select_beneficiary").hide();
                } else if ($(this).is(":not(:checked)")) {
                    console.log("Checkbox is unchecked.");
                    $("#saved_beneficiary_form").toggle(500);
                    $(".select_beneficiary").toggle(500);
                    $("#onetime_beneficiary_form").hide();
                    $(".badge").hide();
                }
            });

            $('#saved_beneficiary').change(function() {
                var beneficiary_name = $('#saved_beneficiary').val().split('~');
                console.log(beneficiary_name);
                $("#saved_beneficiary_name").val(beneficiary_name[1]);
                $("#saved_account_number").val(beneficiary_name[2]);
                $("#saved_beneficiary_email").val(beneficiary_name[6]);
            });

            $("#beneficiary_frequency").change(function() {
                var frequency = $("#beneficiary_frequency").val();
                var optionText = $("#beneficiary_frequency option:selected").text();
                $(".display_frequency_so").text(optionText);
                console.log(frequency);
            })

            // function currency_convertor(forex_rate) {

            //         {{-- let select_currency__ = $('.select_currency_').val()
            //         select_currency___info = select_currency__.split("~") --}}

            //         let amount = $("#amount").val()
            //         let convert_amount_currency = $('#select_currency_').val()
            //         let converted_amount = ''



            //         console.log(convert_amount_currency)



            //         cur_1 = $('#select_currency').val()
            //         cur_2 = $('#select_currency_').val()



            //         let currency_pair_1 = cur_1 + '/ ' + cur_2
            //         let currency_pair_2 = cur_2 + '/ ' + cur_1

            //         let to_local_currency = cur_1 + '/ SLL'
            //         let local_currency = ''


            //         console.log(currency_pair_1)
            //         console.log(currency_pair_2)
            //         console.log(forex_rate)

            //         $('#converted_amount').val('')
            //         $('#convertor_rate_').val('')


            //         if (forex_rate.length > 0) {
            //             $.each(forex_rate, function(index) {

            //                 if (String(forex_rate[index].PAIR.trim()) == String(to_local_currency
            //                         .trim())) {
            //                     local_currency = parseFloat(amount) / parseFloat(forex_rate[index]
            //                         .MIDRATE)

            //                 }



            //                 if (String(forex_rate[index].PAIR.trim()) == String(currency_pair_1
            //                         .trim())) {

            //                     converted_amount = parseFloat(amount) * parseFloat(forex_rate[index]
            //                         .MIDRATE)
            //                     $('#convertor_rate_').val(formatToCurrency(parseFloat(forex_rate[
            //                             index].MIDRATE
            //                         .toFixed(2))))
            //                     $('.display_midrate').text(currency_pair_1.trim() + ' => ' +
            //                         formatToCurrency(
            //                             parseFloat(forex_rate[index].MIDRATE.toFixed(2))))
            //                     $('#converted_amount').val(formatToCurrency(parseFloat(
            //                         converted_amount.toFixed(
            //                             2))))
            //                     $('.display_converted_amount').text(convert_amount_currency + ' ' +
            //                         formatToCurrency(parseFloat(converted_amount.toFixed(2))))
            //                     console.log(`match 1 => ${converted_amount}`)
            //                     console.log(parseFloat(forex_rate[index].MIDRATE))

            //                 } else if (String(forex_rate[index].PAIR.trim()) == String(
            //                         currency_pair_2
            //                         .trim())) {

            //                     $('#convertor_rate_').val(formatToCurrency(parseFloat(forex_rate[
            //                             index].MIDRATE
            //                         .toFixed(2))))
            //                     $('.display_midrate').text(currency_pair_2.trim() + ' => ' +
            //                         formatToCurrency(
            //                             parseFloat(forex_rate[index].MIDRATE.toFixed(2))))
            //                     converted_amount = parseFloat(amount) / parseFloat(forex_rate[index]
            //                         .MIDRATE)
            //                     $('#converted_amount').val(formatToCurrency(parseFloat(
            //                         converted_amount.toFixed(
            //                             2))))
            //                     $('.display_converted_amount').text(convert_amount_currency + ' ' +
            //                         formatToCurrency(parseFloat(converted_amount.toFixed(2))))
            //                     console.log(`match 2 => ${converted_amount}`)
            //                     console.log(parseFloat(forex_rate[index].MIDRATE))

            //                 } else {

            //                 }
            //             })
            //         }

            // }



            $("#select_currency_").change(function() {
                currency_convertor(forex_rate, amount);
            })

            $("#select_currency__").change(function() {
                currency_converter(forex_rate);
            });

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


            function toaster(message, icon, timer) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: timer,
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
            }

            {{-- $(".select_onetime").css("display", "none"); --}}
            {{-- $(".select_beneficiary").css("display", "block"); --}}

            var type = $("input[type='radio']:checked").val();

            $(".radio").click(function() {

                var type = $("input[type='radio']:checked").val();

                if (type == 'beneficiary') {
                    {{-- $(".select_onetime").css("display", "none"); --}}
                    {{-- $(".select_beneficiary").css("display", "block"); --}}

                    // set amonut to empty
                    // $("#amount").val('');


                    //$(".select_onetime").hide();
                    $(".select_beneficiary").show();

                }
                if (type == 'onetime') {

                    {{-- $(".select_beneficiary").css("display", "none"); --}}
                    {{-- $(".select_onetime").css("display", "block"); --}}

                    // set amonut to empty
                    $("#amount").val('');

                    $(".select_beneficiary").hide();
                    //$(".select_onetime").show();
                }

            });

            // hide select accounts info
            $(".from_account_display_info").hide()
            $(".to_account_display_info").hide()
            $("#schedule_payment_date").hide()
            $('#schedule_payment_contraint_input').hide()
            $('.display_schedule_payment_date').text('N/A')
            $('#select_frequency').hide(),
                $('#select_frequency_text').hide(),

                $("#transaction_form").show();
            $("#transaction_summary").hide();
            $('#onetime_beneficiary_form').hide();

            $("#back_button").click(function(e) {
                e.preventDefault()
                $("#transaction_form").toggle();
                $("#transaction_summary").hide();


            })

            {{-- Event on From Account field --}}
            var amt = 0

            $("#from_account").change(function() {
                var from_account = $(this).val()
                {{-- alert(from_account) --}}
                if (from_account.trim() == '' || from_account.trim() == undefined) {
                    {{-- alert('money') --}}
                    $(".from_account_display_info").hide()

                } else {
                    from_account_info = from_account.split("~")
                    {{-- alert('continue') --}}

                    var to_account = $('#to_account').val()

                    if ((from_account.trim() == to_account.trim()) && from_account.trim() != '' &&
                        to_account.trim() != '') {
                        toaster('can not transfer to same account', 'error', 10000)

                        $(this).val('')
                    }

                    // set summary values for display
                    {{-- $(".display_from_account_type").text(from_account_info[0].trim()) --}}
                    $(".display_from_account_name").text(from_account_info[1].trim())
                    $(".display_from_account_no").text(from_account_info[2].trim())
                    $(".display_from_account_currency").text(from_account_info[3].trim())
                    $(".display_transfer_currency").text(from_account_info[3].trim())

                    $("#select_currency").val(from_account_info[3].trim())
                    $("#select_currency__").val(from_account_info[3].trim())


                    let crr = from_account_info[3].trim()

                    $('#select_currency option').each(function() {

                        if ($(this).val() == crr) {
                            $(this).prop("selected", true);
                        } else {

                        }

                    });



                    $(".display_currency").text(from_account_info[3].trim()) // set summary currency

                    amt = from_account_info[4].trim()
                    $(".display_from_account_amount").text(formatToCurrency(parseFloat(
                        from_account_info[4]
                        .trim())))
                    {{-- alert('and show' + from_account_info[3].trim()) --}}
                    $(".from_account_display_info").show()
                }




                // alert(from_account_info[0]);
            });


            $("#to_account").change(function() {
                var to_account = $(this).val()
                {{-- alert(to_account) --}}
                if (to_account.trim() == '' || to_account.trim() == undefined) {

                    $(".to_account_display_info").hide()

                } else {
                    to_account_info = to_account.split("~")


                    var from_account = $('#from_account').val()

                    if ((from_account.trim() == to_account.trim()) && from_account.trim() != '' &&
                        to_account.trim() != '') {
                        toaster('can not transfer to same account', 'error', 10000)

                        {{-- alert('can not transfer to same account') --}}
                        $(this).val('')
                    }

                    // set summary values for display
                    {{-- $(".display_to_account_type").text(to_account_info[0].trim()) --}}
                    $(".display_to_account_name").text(to_account_info[1].trim())
                    $(".display_to_account_no").text(to_account_info[2].trim())
                    $(".display_to_account_currency").text(to_account_info[3].trim())
                    //$(".display_to_account_amount").text(formatToCurrency(parseFloat(to_account_info[4].trim())))

                    $(".to_account_display_info").show()
                }




                // alert(to_account_info[0]);
            });


            $("#amount").keyup(function() {
                var from_account = $('#from_account').val()
                var to_account = $('#to_account').val()
                console.log(forex_rate)
                let amount = $(this).val();
                currency_convertor(forex_rate, amount);


                if (from_account.trim() == '' || to_account.trim() == '') {

                    toaster('Please select source and destination accounts', 'error', 10000)
                    $(this).val('')
                    return false;
                } else {
                    var transfer_amount = $(this).val()
                    if (parseFloat(amt) < parseFloat(transfer_amount)) {
                        toaster('Insufficient account balance', 'error', 10000)
                        return false
                    } else {
                        $(".display_amount").text(formatToCurrency(parseFloat(
                            transfer_amount)));
                        $(".display_amount").text(formatToCurrency(parseFloat(
                            transfer_amount)));
                    }

                }

                // let amount = $("#amount").val()
                $('.display_amount').text(formatToCurrency(parseFloat(amount)))

            });


            $("#category").change(function() {
                var category = ($(this).val().split('~'));
                var category_ = category[1]
                console.log(category_);
                $("#display_category").text(category_);
            });

            $("#purpose").keyup(function() {
                var purpose = ($(this).val());
                $("#display_purpose").text(purpose);

            });

            $("#amount").keyup(function() {
                var from_account = $('#from_account').val()
                var to_account = $("#onetime_account_number").val()

                var amount = ($(this).val());
                console.log(forex_rate)
                currency_convertor(forex_rate, amount);

                $(".display_amount").text(formatToCurrency(parseFloat(amount.trim())))
                $("#display_transfer_amount").text(formatToCurrency(parseFloat(amount)))
                {{-- $('#display_transfer_amount').text(amount); --}}

            });

            //category
            $("#onetime_category").change(function() {
                var category = ($(this).val().split('~'));
                $("#display_category").text(category[1]);

            })

            //purpose
            {{-- $("#onetime_purpose").keyup(function() {
                if ($(this).val() == '') {
                    $("#display_purpose").text('Same Bank Transfer');

                } else {
                    var purpose = ($(this).val());
                    $('#display_purpose').text(purpose);

                }

            }) --}}

            $("#from_account").change(function() {
                var from_acc_currency = ($(this).val().split('~'))
                {{-- console.log(from_acc_currency); --}}
                $("#hidden_currency").val(from_acc_currency[3]);


            })


            function formatToCurrency(amount) {
                return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
            };


            // CHECK BOX CONSTRAINT SCHEDULE PAYMENT
            $("#customCheck1").on("change", function() {
                if ($(this).is(":checked")) {
                    //console.log("Checkbox Checked!");
                    $("#schedule_payment_date").show()
                    $(".display_schedule_payment").text('YES')
                    $('#schedule_payment_contraint_input').val('TRUE')
                    $('#select_frequency').show();
                    $('#select_frequency_text').show();

                } else {
                    //console.log("Checkbox UnChecked!");
                    $("#schedule_payment_date").val('')
                    $("#schedule_payment_date").hide()
                    $('.display_schedule_payment').text('NO')
                    $('.display_schedule_payment_date').text('N/A')

                    $('#schedule_payment_contraint_input').val('')
                    $('#schedule_payment_contraint_input').hide()
                    $('#schedule_payment_date').val('')
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

            $("#so_start_date").change(function() {
                var display_start_date = $("#so_start_date").val();
                $(".display_so_start_date").text(display_start_date);
                console.log(display_start_date);
            });

            $("#so_end_date").change(function() {
                var display_end_date = $("#so_end_date").val();
                $(".display_so_end_date").text(display_end_date);
                console.log(display_end_date);
            });




            // NEXT BUTTON CLICK
            $("#next_button").click(function() {

                var type = $("input[type='radio']:checked").val();
                if ($('#customCheck1').is(':checked')) {
                    var type = "onetime_beneficiary";

                } else {
                    var type = "Saved_beneficiary";
                }
                console.log(type);




                if (type == 'Saved_beneficiary') {

                    var to_account = $('#to_account').val()

                    $('.display_schedule_payment_date').text("| " + schedule_payment_date)

                    var from_account = $('#from_account').val()
                    var transfer_amount = $('#amount').val()
                    var category = $('#category').val()
                    $("#display_category").text(category);
                    var category = $('#category').val()
                    console.log(category)


                    var purpose = $('#purpose').val();
                    $("#display_purpose").text(purpose);
                    console.log(purpose);

                    {{-- var purpose = $('#onetime_purpose').val();
                    $("#display_purpose").text(purpose); --}}

                    var schedule_payment_contraint_input = $('#schedule_payment_contraint_input').val()
                    var schedule_payment_date = $('#schedule_payment_date').val();


                    if (parseFloat(amt) < parseFloat(transfer_amount)) {
                        toaster('Insufficient account balance', 'error', 10000)
                        return false
                    }

                    //set purpose and category values
                    {{-- var category_info = category.split("~") --}}
                    {{-- $("#display_category").text(category_info[1]) --}}
                    {{-- var purpose =
                    $("#display_purpose").text(purpose) --}}

                    {{-- $("#transaction_form").hide()
                    $("#transaction_summary").show() --}}


                    if (from_account.trim() == '' || to_account.trim() == '' || transfer_amount.trim() ==
                        '' || purpose.trim() == '') {
                        toaster('Field must not be empty', 'error', 10000)
                        return false;
                    } else {
                        //set purpose and category values
                        {{-- var category_info = category.split("~")
                        $("#display_category").text(category_info[1]) --}}
                        {{-- $("#display_purpose").text(purpose) --}}

                        $("#transaction_form").hide()
                        $("#transaction_summary").show()
                    }




                } else if (type == 'onetime_beneficiary') {

                    var from_account = $('#from_account').val()

                    // ONETIME BENEFICIARY DETAILS
                    var onetime_beneficiary_name = $('#onetime_beneficiary_name').val()
                    var onetime_account_number = $('#onetime_account_number').val()
                    var onetime_beneficiary_account_currency = $(
                            '#onetime_beneficiary_account_currency')
                        .val()
                    var onetime_beneficiary_name = $('#onetime_beneficiary_name').val()
                    var onetime_beneficiary_email = $('#onetime_beneficiary_email').val()
                    var select_currency__ = $('#select_currency__').val()
                    var onetime_category = $('#onetime_category').val();
                    var onetime_purpose = $('#onetime_purpose').val();
                    $("#display_purpose").text(onetime_purpose);



                    // END OF ONETIME BENEFICIARY DETAILS


                    ///////////////////////////////

                    //////////////////////////////


                    if (from_account.trim() == '' || onetime_account_number.trim() == '' || onetime_purpose
                        .trim() == '' || select_currency__.trim() == '' ||
                        onetime_beneficiary_email.trim() == '') {
                        toaster('Field must not be empty', 'error', 10000)

                        {{-- alert('Field must not be empty') --}}
                        return false
                    } else {
                        //set purpose and category values
                        {{-- var category_info = onetime_category.split("~");
                        console.log(category_info);
                        $("#display_category").text(category_info[1]) --}}
                        {{-- $("#display_purpose").text(purpose) --}}

                        $("#transaction_form").hide()
                        $("#transaction_summary").show()
                    }




                } else {
                    toaster('CHOOSE EITHER BENEFICIARY OR ONTIME', 'error', 10000)

                    {{-- alert('CHOOSE EITHER BENEFICIARY OR ONTIME') --}}
                }


                var from_account = $('#from_account').val().split('~');
                var onetime_beneficiary_alias_name = $('#onetime_beneficiary_alias_name').val()
                var onetime_beneficiary_account_number = $('#onetime_beneficiary_account_number')
                    .val()
                var onetime_beneficiary_account_currency = $(
                    '#onetime_beneficiary_account_currency').val()
                {{-- var purpose = $('#purpose').val() --}}
                var onetime_beneficiary_email = $('#onetime_beneficiary_email').val()
                var onetime_beneficiary_phone = $('#onetime_beneficiary_phone').val()
                var transfer_amount = $('#amount').val();
                {{-- var select_frequency = $('#select_frequency').val() --}}
                var schedule_payment_date = $('#schedule_payment_date').val();
                var category = $('#category').val();
                var user_pin = $('#user_pin').val();

                var from_account_ = from_account[2];


                {{-- $('#online_display_beneficiary_alias_name').text(onetime_beneficiary_alias_name); --}}
                $('#online_display_beneficiary_account_no').text(
                    onetime_beneficiary_account_number);
                $('#online_display_beneficiary_account_currency').text(
                    onetime_beneficiary_account_currency);
                $('#online_display_beneficiary_email').text(onetime_beneficiary_email);
                $('#online_display_beneficiary_phone').text(onetime_beneficiary_phone);

            });

            // POST TO API



            $("#confirm_modal_button").click(function(e) {
                e.preventDefault();

                if ($("#terms_and_conditions").is(":checked")) {
                    {{-- alert("Terms Accepted"); --}}


                    // Coporate Account check
                    var customerType = @json(session()->get('customerType'));
                    console.log(customerType);

                    if (customerType == "C") {
                        $('#confirm_transfer').removeAttr('data-toggle');

                        if ($('#customCheck1').is(':checked')) {

                            // ONETIME TRANSFER API

                            var from_account = $('#from_account').val().split('~');
                            var from_account_ = from_account[2];
                            $("#from_account_receipt").text(from_account_);
                            var account_mandate = from_account[5]


                            console.log(from_account);

                            var onetime_beneficiary_name = $('#onetime_beneficiary_name').val();
                            console.log(onetime_beneficiary_name);

                            var onetime_account_number = $('#onetime_account_number').val();
                            console.log(onetime_account_number);
                            $("#to_account_receipt").text(onetime_account_number);

                            var onetime_currency = $("#select_currency__").val();
                            console.log(onetime_currency);
                            $(".receipt_currency").text(onetime_currency);


                            var purpose = $('#onetime_purpose').val()
                            {{-- console.log(purpose); --}}
                            if (purpose == '') {
                                $("#purpose_receipt").text("Same Bank Transfer");
                                var purpose = $("#onetime_purpose").val("Same Bank Transfer");
                            } else {
                                $("#purpose_receipt").text(purpose);

                            }
                            {{-- $("#purpose_receipt").text(purpose); --}}

                            var onetime_beneficiary_email = $('#onetime_beneficiary_email').val();
                            console.log(onetime_beneficiary_email);


                            var transfer_amount = $('#amount_').val();
                            console.log(transfer_amount);
                            $("#amount_receipt").text(formatToCurrency(parseFloat(transfer_amount
                                .trim())));

                            {{-- var select_frequency = $('#select_frequency').val() --}}

                            var onetime_future_payement = $('#onetime_future_payement').val();
                            console.log(onetime_future_payement);

                            var category = $('#onetime_category').val();
                            if (category != 'Others') {
                                var category_ = $('#onetime_category').val().split('~');
                                var category = category_[1];
                            }
                            {{-- var category = category_[1];
                            console.log(category);
                            $("#category_receipt").text(category); --}}

                            var user_pin = $('#user_pin').val();
                            console.log(user_pin);


                            $('#confirm_transfer').hide()
                            $('#spinner').show();
                            $('#spinner-text').show();
                            $("#confirm_modal_button").prop('disabled', true);

                            function redirect_page() {
                                window.location.href = "{{ url('home') }}";

                            };

                            $.ajax({
                                type: 'POST',
                                url: 'corporate-standing-order-request-api',
                                datatype: "application/json",
                                data: {
                                    'from_account': from_account_,
                                    'alias_name': onetime_beneficiary_name,
                                    'to_account': onetime_account_number,
                                    'account_currency': onetime_currency,
                                    'purpose': purpose,
                                    'beneficiary_email': onetime_beneficiary_email,
                                    'amount': transfer_amount,
                                    'schedule_payment_date': onetime_future_payement,
                                    'category': category,
                                    'account_mandate': account_mandate
                                },
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                        'content')
                                },
                                success: function(response) {
                                    {{-- console.log(response); --}}


                                    if (response.responseCode == '000') {

                                        $("#related_information_display").removeClass(
                                            "d-none d-sm-block");
                                        Swal.fire(
                                            '',
                                            response.message,
                                            'success'
                                        );

                                        setTimeout(function() {

                                            redirect_page();
                                        }, 5000);

                                        // $(".receipt").show();
                                        // $(".form_process").hide();


                                        $('#confirm_modal_button').hide();
                                        $('#spinner').hide();
                                        $('#spinner-text').hide();
                                        $('#back_button').hide();
                                        // $('#print_receipt').show();


                                        $(".card_right").hide();
                                        $(".success_gif").show();



                                    } else {
                                        toaster(response.message, 'error', 10000)

                                        $(".receipt").hide();

                                        $("#confirm_transfer").show();
                                        $("#confirm_modal_button").prop('disabled',
                                            false);
                                        $('#spinner').hide();
                                        $('#spinner-text').hide();
                                        $('#back_button').show();
                                        $('#print_receipt').hide();
                                        {{-- $("#related_information_display").addClass("d-none d-sm-block"); --}}
                                        $("#related_information_display").show();
                                        $(".success_gif").hide();


                                    }


                                }
                            });

                        } else {


                            var from_account = $('#from_account').val().split('~');
                            console.log(from_account);
                            var from_account_ = from_account[2];
                            $("#from_account_receipt").text(from_account_);
                            var account_mandate = from_account[5]


                            console.log(from_account_);

                            var to_account = $('#to_account').val().split('~');
                            var to_account_ = to_account[2];
                            console.log(to_account_)
                            $("#to_account_receipt").text(to_account_);

                            var beneficiary_name = to_account[1];
                            console.log(beneficiary_name);

                            var beneficiary_currency = $("#select_currency").val();
                            console.log(beneficiary_currency);

                            var purpose = $('#purpose').val();
                            $("#display_purpose").text(purpose);
                            $("#purpose_receipt").text(purpose);

                            console.log(purpose);


                            var purpose = $('#purpose').val()
                            {{-- console.log(purpose); --}}
                            {{-- if (purpose == '') {
                                $("#purpose_receipt").text("Same Bank Transfer");
                                var purpose = $("#purpose").val("Same Bank Transfer");
                            } else {
                                $("#purpose_receipt").text(purpose);

                            } --}}

                            var beneficiary_email = to_account[4];
                            console.log(beneficiary_email);


                            var transfer_amount = $('#amount').val();
                            console.log(transfer_amount);
                            $("#amount_receipt").text(formatToCurrency(parseFloat(transfer_amount
                                .trim())));

                            var select_currency = $("#select_currency").val();
                            console.log(select_currency);
                            $(".receipt_currency").text(select_currency);

                            {{-- var select_frequency = $('#select_frequency').val() --}}

                            var future_payement = $('#future_payement').val();
                            console.log(future_payement);

                            var category = $('#category').val();
                            if (category != 'Others') {
                                var category_ = $('#category').val().split('~');
                                var category = category_[1];
                            }
                            $("#category_receipt").text(category);


                            console.log(category);
                            $("#category_receipt").text(category);

                            var user_pin = $('#user_pin').val();
                            console.log(user_pin);

                            $('#confirm_transfer').hide()
                            $('#spinner').show();
                            $('#spinner-text').show();
                            $("#confirm_modal_button").prop('disabled', true);

                            function redirect_page() {
                                window.location.href = "{{ url('home') }}";

                            };

                            $.ajax({
                                type: 'POST',
                                url: 'corporate-standing-order-request-api',
                                datatype: "application/json",
                                data: {
                                    'from_account': from_account_,
                                    'alias_name': beneficiary_name,
                                    'to_account': to_account_,
                                    'account_currency': beneficiary_currency,
                                    'purpose': purpose,
                                    'beneficiary_email': beneficiary_email,
                                    'amount': transfer_amount,
                                    'schedule_payment_date': future_payement,
                                    'category': category,
                                    'account_mandate': account_mandate
                                },

                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                        'content')
                                },
                                success: function(response) {
                                    {{-- console.log(response); --}}


                                    if (response.responseCode == '000') {

                                        $("#related_information_display").removeClass(
                                            "d-none d-sm-block");
                                        Swal.fire(
                                            '',
                                            response.message,
                                            'success'
                                        );
                                        setTimeout(function() {

                                            redirect_page();
                                        }, 5000);

                                        // $(".receipt").show();
                                        // $(".form_process").hide();

                                        $('#confirm_modal_button').hide();
                                        $('#spinner').hide();
                                        $('#spinner-text').hide();
                                        $('#back_button').hide();
                                        // $('#print_receipt').show();


                                        $(".card_right").hide();
                                        $(".success_gif").show();



                                    } else {
                                        toaster(response.message, 'error', 10000)

                                        $(".receipt").hide();
                                        {{-- $(".form_process").hide(); --}}

                                        $("#confirm_transfer").show();
                                        $("#confirm_modal_button").prop('disabled',
                                            false);
                                        $('#spinner').hide();
                                        $('#spinner-text').hide();
                                        $('#back_button').show();
                                        $('#print_receipt').hide();
                                        {{-- $("#related_information_display").addClass("d-none d-sm-block"); --}}
                                        $("#related_information_display").show();
                                        $(".success_gif").hide();


                                    }


                                }
                            });

                        }

                    } else {
                        $("#transfer_pin").click(function(e) {
                            e.preventDefault();

                            if ($('#customCheck1').is(':checked')) {

                                // ONETIME TRANSFER API

                                var from_account = $('#from_account').val().split('~');
                                var from_account_ = from_account[2];
                                $("#from_account_receipt").text(from_account_);

                                console.log(from_account);

                                var onetime_beneficiary_name = $(
                                    '#onetime_beneficiary_name').val();
                                console.log(onetime_beneficiary_name);

                                var onetime_account_number = $('#onetime_account_number')
                                    .val();
                                console.log(onetime_account_number);
                                $("#to_account_receipt").text(onetime_account_number);

                                var onetime_currency = $("#select_currency__").val();
                                console.log(onetime_currency);
                                $(".receipt_currency").text(onetime_currency);


                                var purpose = $('#onetime_purpose').val()
                                {{-- console.log(purpose); --}}
                                if (purpose == '') {
                                    $("#purpose_receipt").text("Same Bank Transfer");
                                    var purpose = $("#onetime_purpose").val(
                                        "Same Bank Transfer");
                                } else {
                                    $("#purpose_receipt").text(purpose);

                                }
                                {{-- $("#purpose_receipt").text(purpose); --}}

                                var onetime_beneficiary_email = $(
                                        '#onetime_beneficiary_email')
                                    .val();
                                console.log(onetime_beneficiary_email);


                                var transfer_amount = $('#amount_').val();
                                console.log(transfer_amount);
                                $("#amount_receipt").text(formatToCurrency(parseFloat(
                                    transfer_amount
                                    .trim())));

                                {{-- var select_frequency = $('#select_frequency').val() --}}

                                var onetime_future_payement = $('#onetime_future_payement')
                                    .val();
                                console.log(onetime_future_payement);

                                var category_ = $('#onetime_category').val();
                                if (category_ != 'Others') {
                                    var category_ = $('#category').val().split('~');
                                    var category = category_[1];
                                }
                                var category = category_[1];
                                console.log(category);
                                $("#category_receipt").text(category);

                                var user_pin = $('#user_pin').val();
                                console.log(user_pin);


                                $('#confirm_transfer').hide()
                                $('#spinner').show();
                                $('#spinner-text').show();
                                $("#confirm_modal_button").prop('disabled', true);


                                $.ajax({
                                    type: 'POST',
                                    url: 'initiate-standing-order-request-api',
                                    datatype: "application/json",
                                    data: {
                                        'from_account': from_account_,
                                        'alias_name': onetime_beneficiary_name,
                                        'to_account': onetime_account_number,
                                        'account_currency': onetime_currency,
                                        'purpose': purpose,
                                        'beneficiary_email': onetime_beneficiary_email,
                                        'amount': transfer_amount,
                                        'schedule_payment_date': onetime_future_payement,
                                        'category': category,
                                        'secPin': user_pin
                                    },
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                            .attr(
                                                'content')
                                    },
                                    success: function(response) {
                                        {{-- console.log(response); --}}


                                        if (response.responseCode == '000') {

                                            $("#related_information_display")
                                                .removeClass(
                                                    "d-none d-sm-block");
                                            Swal.fire(
                                                '',
                                                response.message,
                                                'success'
                                            );

                                            $(".receipt").show();
                                            $(".form_process").hide();


                                            $('#confirm_modal_button').hide();
                                            $('#spinner').hide();
                                            $('#spinner-text').hide();
                                            $('#back_button').hide();
                                            $('#print_receipt').show();


                                            $(".card_right").hide();
                                            $(".success_gif").show();



                                        } else {
                                            toaster(response.message, 'error',
                                                10000)

                                            $(".receipt").hide();

                                            $("#confirm_transfer").show();
                                            $("#confirm_modal_button").prop(
                                                'disabled',
                                                false);
                                            $('#spinner').hide();
                                            $('#spinner-text').hide();
                                            $('#back_button').show();
                                            $('#print_receipt').hide();
                                            {{-- $("#related_information_display").addClass("d-none d-sm-block"); --}}
                                            $("#related_information_display")
                                                .show();
                                            $(".success_gif").hide();


                                        }


                                    }
                                });

                            } else {

                                var from_account = $("#from_account").val()
                                var to_account = $("#to_account").val()
                                var amount = $('#amount').val()
                                var start_date = $("#so_start_date").val()
                                var end_date = $("#so_end_date").val()
                                var beneficiary_frequency = $("#beneficiary_frequency").val()

                                var user_pin = $('#user_pin').val();
                                console.log(user_pin);

                                $('#confirm_transfer').hide()
                                $('#spinner').show();
                                $('#spinner-text').show();
                                $("#confirm_modal_button").prop('disabled', true);

                                $.ajax({
                                    type: 'POST',
                                    url: 'initiate-standing-order-request-api',
                                    datatype: "application/json",
                                    data: {
                                        'from_account': from_account,
                                        'amount': amount,
                                        'beneficiary_account': beneficiary,
                                        'standing_order_start_date': so_start_date,
                                        'standing_order_end_date': so_end_date,
                                        'standing_order_frequency': so_frequency,
                                        'narration': narration,
                                        'bank_code': bankCode,
                                        'user_pin': pin
                                    },

                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                            .attr(
                                                'content')
                                    },
                                    success: function(response) {
                                        {{-- console.log(response); --}}


                                        if (response.responseCode == '000') {

                                            $("#related_information_display")
                                                .removeClass(
                                                    "d-none d-sm-block");
                                            Swal.fire(
                                                '',
                                                response.message,
                                                'success'
                                            );

                                            $(".receipt").show();
                                            $(".form_process").hide();

                                            $('#confirm_modal_button').hide();
                                            $('#spinner').hide();
                                            $('#spinner-text').hide();
                                            $('#back_button').hide();
                                            $('#print_receipt').show();


                                            $(".card_right").hide();
                                            $(".success_gif").show();



                                        } else {
                                            toaster(response.message, 'error',
                                                10000)

                                            $(".receipt").hide();
                                            {{-- $(".form_process").hide(); --}}

                                            $("#confirm_transfer").show();
                                            $("#confirm_modal_button").prop(
                                                'disabled',
                                                false);
                                            $('#spinner').hide();
                                            $('#spinner-text').hide();
                                            $('#back_button').show();
                                            $('#print_receipt').hide();
                                            {{-- $("#related_information_display").addClass("d-none d-sm-block"); --}}
                                            $("#related_information_display")
                                                .show();
                                            $(".success_gif").hide();


                                        }


                                    }
                                });

                            }

                        });
                    }





                } else {
                    toaster('Accept Terms & Conditions to continue', 'error', 6000)
                    {{-- console.log("UNCHECKED"); --}}
                    return false;
                }
            })


        });

        // function currency_convertor_(forex_rate) {

        //     let select_currency = $('#select_currency_').val()


        //     let amount = $("#amount").val()
        //     let convert_amount_currency = $('#select_converted_currency_').val()

        //     let converted_amount = '';



        //     console.log(convert_amount_currency)

        //     cur_1 = $('#select_currency_').val()
        //     cur_2 = $('#select_converted_currency_').val()

        //     console.log(cur_1)
        //     console.log(cur_2)



        //     cur_1 = $('#select_currency__').val()
        //     cur_2 = $('#select_converted_currency__').val()


        //     let currency_pair_1 = cur_1 + '/ ' + cur_2
        //     let currency_pair_2 = cur_2 + '/ ' + cur_1

        //     let to_local_currency = cur_1 + '/ SLL'
        //     let local_currency = ''


        //     console.log(currency_pair_1)
        //     console.log(currency_pair_2)
        //     console.log(forex_rate)

        //     $('#converted_amount').val('')
        //     $('#convertor_rate').val('')

        //     $('#convertor_amount_').val('')
        //     $('#convertor_rate_').val('')


        //     if (forex_rate.length > 0) {
        //         $.each(forex_rate, function(index) {

        //             if (String(forex_rate[index].PAIR.trim()) == String(to_local_currency
        //                     .trim())) {
        //                 local_currency = parseFloat(amount) / parseFloat(forex_rate[index]
        //                     .MIDRATE)

        //             }



        //             if (String(forex_rate[index].PAIR.trim()) == String(currency_pair_1
        //                     .trim())) {

        //                 converted_amount = parseFloat(amount) * parseFloat(forex_rate[index]
        //                     .MIDRATE)
        //                 $('#convertor_rate').val(formatToCurrency(parseFloat(forex_rate[
        //                         index].MIDRATE
        //                     .toFixed(2))))
        //                 $('.display_midrate').text(currency_pair_1.trim() + ' => ' +
        //                     formatToCurrency(
        //                         parseFloat(forex_rate[index].MIDRATE.toFixed(2))))

        //                 $('#convertor_rate_').val(formatToCurrency(parseFloat(forex_rate[index].MIDRATE
        //                     .toFixed(
        //                         2))))

        //                 $('#converted_amount').val(formatToCurrency(parseFloat(
        //                     converted_amount.toFixed(
        //                         2))))
        //                 $('.display_converted_amount').text(convert_amount_currency + ' ' +
        //                     formatToCurrency(parseFloat(converted_amount.toFixed(2))))
        //                 console.log(`match 1 => ${converted_amount}`)
        //                 console.log(parseFloat(forex_rate[index].MIDRATE))

        //             } else if (String(forex_rate[index].PAIR.trim()) == String(
        //                     currency_pair_2
        //                     .trim())) {

        //                 $('#convertor_rate').val(formatToCurrency(parseFloat(forex_rate[
        //                         index].MIDRATE
        //                     .toFixed(2))))
        //                 $('.display_midrate').text(currency_pair_2.trim() + ' => ' +
        //                     formatToCurrency(
        //                         parseFloat(forex_rate[index].MIDRATE.toFixed(2))))
        //                 converted_amount = parseFloat(amount) / parseFloat(forex_rate[index]
        //                     .MIDRATE)

        //                 $('#convertor_rate_').val(formatToCurrency(parseFloat(forex_rate[index].MIDRATE
        //                     .toFixed(
        //                         2))))

        //                 $('#converted_amount').val(formatToCurrency(parseFloat(
        //                     converted_amount.toFixed(
        //                         2))))
        //                 $('.display_converted_amount').text(convert_amount_currency + ' ' +
        //                     formatToCurrency(parseFloat(converted_amount.toFixed(2))))
        //                 console.log(`match 2 => ${converted_amount}`)
        //                 console.log(parseFloat(forex_rate[index].MIDRATE))

        //             } else {

        //             }
        //         })
        //     }

        // }

        // function currency_convertor(forex_rate) {



        //         let amount = $("#amount").val()
        //         let convert_amount_currency = $('#select_currency_').val()
        //         let converted_amount = ''



        //         console.log(convert_amount_currency)



        //         cur_1 = $('#select_currency_').val()
        //         cur_2 = $('#select_currency_').val()



        //         let currency_pair_1 = cur_1 + '/ ' + cur_2
        //         let currency_pair_2 = cur_2 + '/ ' + cur_1

        //         let to_local_currency = cur_1 + '/ SLL'
        //         let local_currency = ''


        //         console.log(currency_pair_1)
        //         console.log(currency_pair_2)
        //         console.log(forex_rate)

        //         $('#converted_amount').val('')
        //         $('#convertor_rate').val('')


        //         if (forex_rate.length > 0) {
        //             $.each(forex_rate, function(index) {

        //                 if (String(forex_rate[index].PAIR.trim()) == String(to_local_currency
        //                         .trim())) {
        //                     local_currency = parseFloat(amount) / parseFloat(forex_rate[index]
        //                         .MIDRATE)

        //                 }



        //         if (String(forex_rate[index].PAIR.trim()) == String(currency_pair_1
        //                 .trim())) {

        //             converted_amount = parseFloat(amount) * parseFloat(forex_rate[index]
        //                 .MIDRATE)
        //             $('#convertor_rate').val(formatToCurrency(parseFloat(forex_rate[
        //                     index].MIDRATE
        //                 .toFixed(2))))
        //             $('.display_midrate').text(currency_pair_1.trim() + ' => ' +
        //                 formatToCurrency(
        //                     parseFloat(forex_rate[index].MIDRATE.toFixed(2))))
        //             $('#converted_amount').val(formatToCurrency(parseFloat(
        //                 converted_amount.toFixed(
        //                     2))))
        //             $('.display_converted_amount').text(convert_amount_currency + ' ' +
        //                 formatToCurrency(parseFloat(converted_amount.toFixed(2))))
        //             console.log(`match 1 => ${converted_amount}`)
        //             console.log(parseFloat(forex_rate[index].MIDRATE))

        //         } else if (String(forex_rate[index].PAIR.trim()) == String(
        //                 currency_pair_2
        //                 .trim())) {

        //             $('#convertor_rate').val(formatToCurrency(parseFloat(forex_rate[
        //                     index].MIDRATE
        //                 .toFixed(2))))
        //             $('.display_midrate').text(currency_pair_2.trim() + ' => ' +
        //                 formatToCurrency(
        //                     parseFloat(forex_rate[index].MIDRATE.toFixed(2))))
        //             converted_amount = parseFloat(amount) / parseFloat(forex_rate[index]
        //                 .MIDRATE)
        //             $('#converted_amount').val(formatToCurrency(parseFloat(
        //                 converted_amount.toFixed(
        //                     2))))
        //             $('.display_converted_amount').text(convert_amount_currency + ' ' +
        //                 formatToCurrency(parseFloat(converted_amount.toFixed(2))))
        //             console.log(`match 2 => ${converted_amount}`)
        //             console.log(parseFloat(forex_rate[index].MIDRATE))

        //         } else {

        //         }
        //     })
        // }

        function currency_convertor(forex_rate, amount) {

            // let amount = $("#amount").val()
            let convert_amount_currency = $('#select_currency_').val()
            let converted_amount = ''



            console.log(convert_amount_currency)



            cur_1 = $('#select_currency').val()
            cur_2 = $('#select_currency_').val()



            let currency_pair_1 = cur_1 + '/ ' + cur_2
            let currency_pair_2 = cur_2 + '/ ' + cur_1

            let to_local_currency = cur_1 + '/ SLL'
            let local_currency = ''


            console.log(currency_pair_1)
            console.log(currency_pair_2)
            console.log(forex_rate)

            $('#converted_amount').val('')
            $('#convertor_rate_').val('')


            if (forex_rate.length > 0) {
                $.each(forex_rate, function(index) {

                    if (String(forex_rate[index].PAIR.trim()) == String(to_local_currency
                            .trim())) {
                        local_currency = parseFloat(amount) / parseFloat(forex_rate[index]
                            .MIDRATE)

                    }



                    if (String(forex_rate[index].PAIR.trim()) == String(currency_pair_1
                            .trim())) {

                        converted_amount = parseFloat(amount) * parseFloat(forex_rate[index]
                            .MIDRATE)
                        $('#convertor_rate_').val(formatToCurrency(parseFloat(forex_rate[
                                index].MIDRATE
                            .toFixed(2))))
                        $('.display_midrate').text(currency_pair_1.trim() + ' => ' +
                            formatToCurrency(
                                parseFloat(forex_rate[index].MIDRATE.toFixed(2))))
                        $('#converted_amount').val(formatToCurrency(parseFloat(
                            converted_amount.toFixed(
                                2))))
                        $('#converted_amount_').val(formatToCurrency(parseFloat(
                            converted_amount.toFixed(
                                2))))
                        $('.display_converted_amount').text(convert_amount_currency + ' ' +
                            formatToCurrency(parseFloat(converted_amount.toFixed(2))))
                        console.log(`match 1 => ${converted_amount}`)
                        console.log(parseFloat(forex_rate[index].MIDRATE))

                    } else if (String(forex_rate[index].PAIR.trim()) == String(
                            currency_pair_2
                            .trim())) {

                        $('#convertor_rate_').val(formatToCurrency(parseFloat(forex_rate[
                                index].MIDRATE
                            .toFixed(2))))
                        $('.display_midrate').text(currency_pair_2.trim() + ' => ' +
                            formatToCurrency(
                                parseFloat(forex_rate[index].MIDRATE.toFixed(2))))
                        converted_amount = parseFloat(amount) / parseFloat(forex_rate[index]
                            .MIDRATE)
                        $('#converted_amount').val(formatToCurrency(parseFloat(
                            converted_amount.toFixed(
                                2))))

                        $('#converted_amount_').val(formatToCurrency(parseFloat(
                            converted_amount.toFixed(
                                2))))
                        $('.display_converted_amount').text(convert_amount_currency + ' ' +
                            formatToCurrency(parseFloat(converted_amount.toFixed(2))))
                        console.log(`match 2 => ${converted_amount}`)
                        console.log(parseFloat(forex_rate[index].MIDRATE))

                    } else {

                    }
                })
            }

        }

        function currency_convertor_(forex_rate, amount) {

            // let amount = $("#amount").val()
            let convert_amount_currency = $('#select_currency___').val()
            let converted_amount = ''



            console.log(convert_amount_currency)



            cur_1 = $('#select_currency__').val()
            cur_2 = $('#select_currency___').val()



            let currency_pair_1 = cur_1 + '/ ' + cur_2
            let currency_pair_2 = cur_2 + '/ ' + cur_1

            let to_local_currency = cur_1 + '/ SLL'
            let local_currency = ''


            console.log(currency_pair_1)
            console.log(currency_pair_2)
            console.log(forex_rate)

            $('#converted_amount_').val('')
            $('#convertor_rate').val('')


            if (forex_rate.length > 0) {
                $.each(forex_rate, function(index) {

                    if (String(forex_rate[index].PAIR.trim()) == String(to_local_currency
                            .trim())) {
                        local_currency = parseFloat(amount) / parseFloat(forex_rate[index]
                            .MIDRATE)

                    }



                    if (String(forex_rate[index].PAIR.trim()) == String(currency_pair_1
                            .trim())) {

                        converted_amount = parseFloat(amount) * parseFloat(forex_rate[index]
                            .MIDRATE)
                        $('#convertor_rate').val(formatToCurrency(parseFloat(forex_rate[
                                index].MIDRATE
                            .toFixed(2))))
                        $('.display_midrate').text(currency_pair_1.trim() + ' => ' +
                            formatToCurrency(
                                parseFloat(forex_rate[index].MIDRATE.toFixed(2))))
                        $('#converted_amount').val(formatToCurrency(parseFloat(
                            converted_amount.toFixed(
                                2))))
                        $('.display_converted_amount').text(convert_amount_currency + ' ' +
                            formatToCurrency(parseFloat(converted_amount.toFixed(2))))
                        console.log(`match 1 => ${converted_amount}`)
                        console.log(parseFloat(forex_rate[index].MIDRATE))

                    } else if (String(forex_rate[index].PAIR.trim()) == String(
                            currency_pair_2
                            .trim())) {

                        $('#convertor_rate').val(formatToCurrency(parseFloat(forex_rate[
                                index].MIDRATE
                            .toFixed(2))))
                        $('.display_midrate').text(currency_pair_2.trim() + ' => ' +
                            formatToCurrency(
                                parseFloat(forex_rate[index].MIDRATE.toFixed(2))))
                        converted_amount = parseFloat(amount) / parseFloat(forex_rate[index]
                            .MIDRATE)
                        $('#converted_amount').val(formatToCurrency(parseFloat(
                            converted_amount.toFixed(
                                2))))
                        $('.display_converted_amount').text(convert_amount_currency + ' ' +
                            formatToCurrency(parseFloat(converted_amount.toFixed(2))))
                        console.log(`match 2 => ${converted_amount}`)
                        console.log(parseFloat(forex_rate[index].MIDRATE))

                    } else {

                    }
                })
            }

        }
    </script>
@endsection
