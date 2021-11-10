@extends('layouts.master')

@section('styles')
@include("extras.selectize")

<style>
    @media print {
        .hide_on_print {
            display: none
        }
    }

    .bootstrap-select .btn {
        display: inline-block;
        width: 100%;
        height: calc(1.5em + 0.9rem + 2px);
        padding: 0.45rem 1.9rem 0.45rem 0.9rem;
        /* font-size: 0.8125rem; */
        font-size: 0.9rem;
        font-weight: 400;
        line-height: 1.5;
        color: #6c757d;
        vertical-align: middle;
        background: #fff url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right 0.9rem center/8px 10px;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    @font-face {
        font-family: 'password';
        font-style: normal;
        font-weight: 400;
        font-size: 40px;
        src: url(https://jsbin-user-assets.s3.amazonaws.com/rafaelcastrocouto/password.ttf);
    }

    input.key {
        font-family: 'password';
        width: 300px;
        height: 80px;
        font-size: 100px;
    }

    .table_over_flow {
        overflow-y: hidden;

    }
</style>

@endsection

@section('content')

<div class="container-fluid">
    <br>
    <!-- start page title -->
    <div class="row">
        <div class="col-md-6">
            <h4 class="text-primary">
                <img src="{{ asset('assets/images/logoRKB.png') }}" alt="logo" style="zoom: 0.05">&emsp;
                INTERNATIONAL BANK BENEFICIARY
            </h4>
        </div>

        <div class="col-md-6 text-right">
            <h6>

                <span class="flaot-right">
                    <b class="text-primary"> Transfer </b> &nbsp; > &nbsp; <b class="text-primary"> Add Beneficiary </b>
                    &nbsp; > &nbsp; <b class="text-danger">International Bank Beneficiary</b>


                </span>

            </h6>

        </div>

        <div class="col-md-12 ">
            <hr class="text-primary" style="margin: 0px;">
        </div>

    </div>
</div>



<!-- Start Content-->
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="">
                <div class="card-body">



                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10 m-2"
                            style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">


                            <div class="">
                                <div class=" ">
                                    <div class="card-body">

                                        {{-- <br><br><br> --}}

                                        <div id="rootwizard">
                                            <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-3">
                                                <li class="nav-item" id="details_tab" data-target-form="#accountForm">
                                                    <a href="#first" data-toggle="tab"
                                                        class="nav-link rounded-0 pt-2 pb-2">
                                                        <span class="d-none d-sm-inline">Bank Details</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item" id="account_tab" data-target-form="#profileForm">
                                                    <a href="#second" data-toggle="tab"
                                                        class="nav-link rounded-0 pt-2 pb-2">
                                                        <span class="d-none d-sm-inline">Account Details</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item" id="beneficiary_tab" data-target-form="#otherForm">
                                                    <a href="#third" data-toggle="tab"
                                                        class="nav-link rounded-0 pt-2 pb-2">
                                                        <span class="d-none d-sm-inline">Beneficiary Details</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item" id="summary_tab" data-target-form="#summaryForm">
                                                    <a href="#fourth" data-toggle="tab"
                                                        class="nav-link rounded-0 pt-2 pb-2">
                                                        <span class="d-none d-sm-inline">Summary</span>
                                                    </a>
                                                </li>
                                            </ul>

                                            <div class="tab-content mb-0 b-0 pt-0">

                                                <div class="tab-pane active" id="first">
                                                    <form id="international_bank_details" action="#"
                                                        class="form-horizontal" autocomplete="off"
                                                        aria-autocomplete="off">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <b class="text-primary"> Beneficiary Bank
                                                                    Details</b><br><br>
                                                                <div class="form-group row mb-3">
                                                                    <div class="col-md-6">
                                                                        <label for="form-group"
                                                                            class="text-primary">Bank Country &nbsp;
                                                                            <span class="text-danger">*</span></label>
                                                                        {{-- <select class="custom-select" id="bank_country" --}}
                                                                        <select class="selectize" id="bank_country"
                                                                            required>
                                                                            <option selected disabled>Bank Country
                                                                            </option>
                                                                        </select>
                                                                        {{-- <br><br> --}}

                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <label for="form-group"
                                                                            class="text-primary">Bank Name
                                                                            &nbsp; <span
                                                                                class="text-danger">*</span></label>

                                                                        <select class="selectize"
                                                                            data-live-search="true" id="bank_name"
                                                                            required>
                                                                            <option value="">Bank Name</option>
                                                                            {{-- @foreach($banks as $key => $bank) --}}
                                                                            {{-- <option
                                                                                value="{{ $bank['bankCode'] }}~{{ $bank['bankDescription'] }}">
                                                                            {{ $bank['bankDescription']}}
                                                                            </option> --}}
                                                                            {{-- @endforeach --}}

                                                                        </select>
                                                                        {{-- <br><br> --}}
                                                                    </div>

                                                                    <div class="col-md-6" style="display: none">
                                                                        <label for="form-group"
                                                                            class="text-primary">Bank City
                                                                            &nbsp; <span
                                                                                class="text-danger">*</span></label>
                                                                        <select class="custom-select" id="bank_city"
                                                                            name="bank_city">
                                                                            <option value="">Bank City</option>
                                                                            <option value="Accra">Accra</option>

                                                                        </select>
                                                                        <br><br>

                                                                    </div>

                                                                    <div class="col-md-6" style="display: none">
                                                                        <label for="form-group"
                                                                            class="text-primary">Bank Branch
                                                                            &nbsp;<span
                                                                                class="text-danger">*</span></label>
                                                                        <select class="custom-select" id="bank_branch"
                                                                            name="bank_branch">
                                                                            <option value="">Bank Branch
                                                                            </option>
                                                                            {{-- <option value="High-Street">High Street</option> --}}

                                                                        </select>
                                                                        <br><br>
                                                                    </div>



                                                                    <div class="col-md-6" style="display: none">
                                                                        <label for="form-group"
                                                                            class="text-primary">Bank Address
                                                                            &nbsp;<span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="text" id="bank_address"
                                                                            name="bank_address" class="form-control"
                                                                            placeholder="Bank Address" required>
                                                                        <br><br>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <label for="form-group"
                                                                            class="text-primary">Swift Code
                                                                            &nbsp;<span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="text" id="swift_code" name="swift"
                                                                            class="form-control"
                                                                            placeholder="Swift Code" required>
                                                                        <br><br>
                                                                    </div>

                                                                </div>

                                                                <button
                                                                    class="btn btn-primary btn-rounded waves-effect waves-light float-right"
                                                                    type="submit" id="bank_details_next_btn">&nbsp; Next
                                                                    &nbsp;<i class="fe-arrow-right"></i></button>

                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                    </form>
                                                </div>

                                                <div class="tab-pane fade" id="second">
                                                    <form id="international_bank_account_details"
                                                        class="form-horizontal">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <b class="text-primary"> Beneficiary Account
                                                                    Details</b><br><br>

                                                                <div class="form-group row mb-3">
                                                                    <div class="col-md-6">
                                                                        <label class="form-group text-primary"> Account
                                                                            Number &nbsp;<span
                                                                                class="text-danger">*</span></label>

                                                                        <input type="text" id="acc_number"
                                                                            name="acc_number" class="form-control"
                                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                            placeholder="Account number/BBAN" required>
                                                                        <br>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <label class="form-group text-primary"> Account
                                                                            Name &nbsp;<span
                                                                                class="text-danger">*</span></label>

                                                                        <input type="text" id="acc_name" name="acc_name"
                                                                            class="form-control"
                                                                            placeholder="Account name" required>
                                                                        <br>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        {{-- <input type="text" id="surname3" name="surname3" class="form-control" required> --}}
                                                                        <label class="form-group text-primary">Currency
                                                                            &nbsp;<span
                                                                                class="text-danger">*</span></label>

                                                                        <select class="selectize" id="currency"
                                                                            name="currency" required>
                                                                            <option disabled selected value="">Currency
                                                                            </option>
                                                                            {{-- <option value="GHS">GHS</option> --}}

                                                                        </select>
                                                                        <br>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <label class="form-group text-primary">Firstname
                                                                            &nbsp;<span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="text" id="firstname"
                                                                            name="firstname" class="form-control"
                                                                            placeholder="Firstname" required>
                                                                        <br>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <label class="form-group text-primary">Lastname
                                                                            &nbsp;<span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="text" id="lastname" name="lastname"
                                                                            class="form-control" placeholder="Lastname"
                                                                            required>
                                                                        <br>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <label
                                                                            class="form-group text-primary">Middlename
                                                                            &nbsp;</label>
                                                                        {{-- <span class="text-danger">*</span> --}}
                                                                        <input type="text" id="middlename"
                                                                            name="middlename" class="form-control"
                                                                            placeholder="Middlename" required>
                                                                        <br>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <!-- end col -->
                                                        </div>
                                                        <!-- end row -->
                                                        <ul class="list-inline wizard mb-0">
                                                            <li class=" list-inline-item"><button
                                                                    class="btn btn-secondary btn-rounded waves-effect waves-light"
                                                                    type="button" id="account_details_back_btn">
                                                                    &nbsp;<i class="mdi mdi-reply-all"></i> Back
                                                                    &nbsp;</button></li>

                                                            <li class="list-inline-item float-right"><button
                                                                    class="btn btn-primary btn-rounded waves-effect waves-light"
                                                                    id="account_details_next_btn" type="submit"> &nbsp;
                                                                    Next &nbsp;<i class="fe-arrow-right"></i></button>
                                                            </li>
                                                        </ul>
                                                    </form>
                                                </div>

                                                <div class="tab-pane fade" id="third">
                                                    <form id="international_bank_beneficiary_details" method=""
                                                        action="#" class="form-horizontal" autocomplete="off"
                                                        aria-autocomplete="off">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <b class="text-primary"> Beneficiary Personal
                                                                    Details</b><br><br>


                                                                <div class="form-group row mb-3">
                                                                    {{-- <label class="col-md-3 col-form-label" for="name3"> First name</label> --}}
                                                                    <div class="col-md-6">
                                                                        <label
                                                                            class="form-group text-primary">Beneficiary
                                                                            Name &nbsp;<span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="text" id="beneficiary_name"
                                                                            name="beneficiary_name" class="form-control"
                                                                            placeholder="Beneficiary name" required>
                                                                        <br>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <label
                                                                            class="form-group text-primary">Beneficiary
                                                                            Email &nbsp;<span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="text" id="beneficiary_email"
                                                                            name="beneficiary_name" class="form-control"
                                                                            placeholder="Beneficiary email" required>
                                                                        <br>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        {{-- <input type="text" id="surname3" name="surname3" class="form-control" required> --}}
                                                                        <label
                                                                            class="form-group text-primary">Nationality
                                                                            &nbsp;<span
                                                                                class="text-danger">*</span></label>
                                                                        <select class="custom-select" id="nationality"
                                                                            name="nationality" required>
                                                                            <option value="">Nationality</option>
                                                                            <option value="Ghanaian">Ghanaian</option>

                                                                        </select>
                                                                        <br>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        {{-- <input type="text" id="surname3" name="surname3" class="form-control" required> --}}
                                                                        <label class="form-group text-primary">Country
                                                                            of Residence &nbsp;<span
                                                                                class="text-danger">*</span></label>

                                                                        <select class="selectize"
                                                                            id="country_of_residence" name="residence"
                                                                            required>
                                                                            <option value="">Country of residence
                                                                            </option>
                                                                            <option value="Ghana">Ghana</option>

                                                                        </select>
                                                                        <br><br>
                                                                    </div>

                                                                    <div class="col-md-6" style="display: none">
                                                                        {{-- <input type="text" id="surname3" name="surname3" class="form-control" required> --}}
                                                                        <label class="form-group text-primary">City
                                                                            &nbsp;<span
                                                                                class="text-danger">*</span></label>

                                                                        <select class="custom-select" id="city"
                                                                            name="city" required>
                                                                            <option value="">City</option>
                                                                            <option value="Accra">Accra</option>

                                                                        </select>
                                                                        <br>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <label class="form-group text-primary">Address
                                                                            &nbsp;<span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="text" id="address" name="address"
                                                                            class="form-control" placeholder="Address"
                                                                            required>
                                                                        <br>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="form-group text-primary">Telephone
                                                                            &nbsp;<span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="text" id="telephone" name="address"
                                                                            class="form-control" placeholder="Telephone"
                                                                            required>
                                                                        <br>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="col-md-10">
                                                                            <br>
                                                                            <div class="form-group">

                                                                                <div class="checkbox checkbox-primary mb-2"
                                                                                    id="transfer_email">
                                                                                    <input id="checkbox2"
                                                                                        type="checkbox">
                                                                                    <label class="custom-control-label"
                                                                                        for="checkbox2">
                                                                                        Email beneficiary when a
                                                                                        transfer is made
                                                                                    </label>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                            <!-- end col -->
                                                        </div>
                                                        <!-- end row -->
                                                        <ul class="list-inline wizard mb-0">
                                                            <li class=" list-inline-item"><button
                                                                    class="btn btn-secondary btn-rounded waves-effect waves-light"
                                                                    type="back"
                                                                    id="beneficiary_details_back_btn">&nbsp;<i
                                                                        class="mdi mdi-reply-all"></i> Back
                                                                    &nbsp;</button></li>

                                                            <li class="list-inline-item float-right"><button
                                                                    class="btn btn-primary btn-rounded waves-effect waves-light"
                                                                    type="submit" id="beneficiary_details_submit_btn">
                                                                    &nbsp; Submit &nbsp;</button>
                                                            </li>
                                                        </ul>
                                                    </form>
                                                </div>

                                                <div class="tab-pane fade " id="fourth">
                                                    <form id="international_bank_summary" method="POST" action="#"
                                                        class="form-horizontal" autocomplete="off"
                                                        aria-autocomplete="off">
                                                        @csrf
                                                        <div class="row card card-body">
                                                            <div class="col-12">
                                                                <b class="text-primary"> Summary</b><br><br>
                                                                <div class="form-group row mb-3">

                                                                    <div class="col-md-6">

                                                                        <div class="col-md-12 row">
                                                                            <label class="col-md-6"> Bank Country:
                                                                            </label>
                                                                            <span
                                                                                class="font-weight-bold text-primary col-md-6"
                                                                                id="display_bank_country"></span>
                                                                            <br>
                                                                        </div>

                                                                        <div class="col-md-12 row">
                                                                            <label class="col-md-6"> Bank
                                                                                branch:</label>
                                                                            <span
                                                                                class="font-weight-bold text-primary col-md-6"
                                                                                id="display_bank_branch"></span>
                                                                            <br>
                                                                        </div>

                                                                        <div class="col-md-12 row">
                                                                            <label class="col-md-6"> Bank
                                                                                Address:</label>
                                                                            <span
                                                                                class="font-weight-bold col-md-6 text-primary"
                                                                                id="display_bank_address"></span>
                                                                            <br>
                                                                        </div>

                                                                        <div class="col-md-12 row">
                                                                            <label class="col-md-6"> Account
                                                                                Number:</label>
                                                                            <span
                                                                                class="font-weight-bold col-md-6 text-primary"
                                                                                id="display_account_number"></span>
                                                                            <br>
                                                                        </div>

                                                                        <div class="col-md-12 row">
                                                                            <label class="col-md-6"> Currency:</label>
                                                                            <span
                                                                                class="font-weight-bold col-md-6 text-primary"
                                                                                id="display_currency"></span>
                                                                            <br>
                                                                        </div>

                                                                        <div class="col-md-12 row">
                                                                            <label class="col-md-6"> Lastname:</label>
                                                                            <span
                                                                                class="font-weight-bold col-md-6 text-primary"
                                                                                id="display_lastname"></span>
                                                                            <br>
                                                                        </div>

                                                                        <div class="col-md-12 row">
                                                                            <label class="col-md-6"> Beneficiary
                                                                                Name:</label>
                                                                            <span
                                                                                class="font-weight-bold col-md-6 text-primary"
                                                                                id="display_beneficiary_name"></span>
                                                                            <br>
                                                                        </div>

                                                                        <div class="col-md-12 row">
                                                                            <label class="col-md-6">
                                                                                Nationality:</label>
                                                                            <span
                                                                                class="font-weight-bold col-md-6 text-primary"
                                                                                id="display_nationality"></span>
                                                                            <br>
                                                                        </div>

                                                                        <div class="col-md-12 row">
                                                                            <label class="col-md-6"> City:</label>
                                                                            <span
                                                                                class="font-weight-bold col-md-6 text-primary"
                                                                                id="display_city"></span>
                                                                            <br>
                                                                        </div>

                                                                        <div class="col-md-12 row">
                                                                            <label class="col-md-6 ">Telephone:</label>
                                                                            <span
                                                                                class="font-weight-bold col-md-6 text-primary"
                                                                                id="display_telephone"></span>
                                                                            <br>
                                                                        </div>

                                                                    </div>


                                                                    <div class="col-md-6">

                                                                        <div class="col-md-12 row">
                                                                            <label class="col-md-6"> Bank City:</label>
                                                                            <span
                                                                                class=" col-md-6 font-weight-bold text-primary"
                                                                                id="display_bank_city"></span>
                                                                            <br>
                                                                        </div>

                                                                        <div class="col-md-12 row">
                                                                            <label class="col-md-6"> Bank Name:</label>
                                                                            <span
                                                                                class="font-weight-bold text-primary col-md-6"
                                                                                id="display_bank_name"></span>
                                                                            <br>
                                                                        </div>

                                                                        <div class="col-md-12 row">
                                                                            <label class="col-md-6"> Swift Code:</label>
                                                                            <span
                                                                                class="font-weight-bold col-md-6 text-primary"
                                                                                id="display_swift_code"></span>
                                                                            <br>
                                                                        </div>

                                                                        <div class="col-md-12 row">
                                                                            <label class="col-md-6"> Account Name:
                                                                            </label>
                                                                            <span
                                                                                class="font-weight-bold col-md-6 text-primary"
                                                                                id="display_account_name"></span>
                                                                            <br>
                                                                        </div>

                                                                        <div class="col-md-12 row">
                                                                            <label class="col-md-6"> Firstname:</label>
                                                                            <span
                                                                                class="font-weight-bold col-md-6 text-primary"
                                                                                id="display_firstname"></span>
                                                                            <br>
                                                                        </div>

                                                                        <div class="col-md-12 row">
                                                                            <label class="col-md-6"> Middlename:</label>
                                                                            <span
                                                                                class="font-weight-bold col-md-6 text-primary"
                                                                                id="display_middlename"></span>
                                                                            <br>
                                                                        </div>

                                                                        <div class="col-md-12 row">
                                                                            <label class="col-md-6"> Beneficiary
                                                                                Email:</label>
                                                                            <span
                                                                                class="font-weight-bold col-md-6 text-primary"
                                                                                id="display_beneficiary_email"></span>
                                                                            <br>
                                                                        </div>

                                                                        <div class="col-md-12 row">
                                                                            <label class="col-md-6">Country of
                                                                                Residence:</label>
                                                                            <span
                                                                                class="font-weight-bold col-md-6 text-primary"
                                                                                id="display_country_of_residence"></span>
                                                                            <br>
                                                                        </div>

                                                                        <div class="col-md-12 row">
                                                                            <label class="col-md-6">Address:</label>
                                                                            <span
                                                                                class="font-weight-bold col-md-6 text-primary"
                                                                                id="display_address"></span>
                                                                            <br>
                                                                        </div>

                                                                        <div class="col-md-12 row">
                                                                            <label class="col-md-6">Email
                                                                                Beneficiary:</label>
                                                                            <span
                                                                                class="font-weight-bold col-md-6 text-primary"
                                                                                id="display_transfer_email"></span>
                                                                            <br>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- <button class="btn btn-primary btn-roundFimged waves-effect waves-light" type="submit" id="bank_add_beneficiary_btn">Add Beneficiary <i class="fe-arrow-right"></i></button> --}}
                                                        <ul class="list-inline wizard mb-0">
                                                            <li class=" list-inline-item"><button
                                                                    class="btn btn-secondary btn-rounded waves-effect waves-light"
                                                                    type="back"
                                                                    id="bank_add_beneficiary_back_btn">&nbsp;<i
                                                                        class="mdi mdi-reply-all"></i> Back
                                                                    &nbsp;</button>
                                                            </li>

                                                            <li class="list-inline-item float-right"><button
                                                                    class="btn btn-primary btn-rounded waves-effect waves-light"
                                                                    type="submit" id="bank_add_beneficiary_btn">Add
                                                                    Beneficiary </button></li>
                                                        </ul>
                                                    </form>
                                                </div>


                                                {{-- <ul class="list-inline wizard mb-0">
                                                    <li class="previous list-inline-item"><a href="javascript: void(0);" class="btn btn-color">Previous</a>
                                                    </li>
                                                    <li class="next list-inline-item float-right"><a href="javascript: void(0);" class="btn btn-color">Next</a></li>
                                                </ul> --}}

                                            </div> <!-- tab-content -->
                                        </div> <!-- end #rootwizard-->

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->

                        </div> <!-- end col -->

                        <div class="col-md-1"></div>
                    </div>
                    <!-- end row -->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->

    <script src={{ asset("assets/js/pages/transfer/beneficiary/international_bank_beneficiary.js") }}></script>



    @endsection