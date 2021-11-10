@extends('layouts.master')

@section('styles')

<link href="{{ asset('assets/css/payments.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

@endsection

@section('content')

@php
$pageTitle = "payment BENEFICIARY";
$basePath = "payment";
$currentPath = "payment Beneficiary";
@endphp
@include("snippets.pageHeader")

<div class="p-3">
    <div class="site-card ">
        <div class="row mx-auto" style="max-width: 80rem;">
            <div class="col-md-3 mx-auto" style="max-width: 20rem">
                <h2 class="font-18 text-center font-weight-bold text-capitalize mb-3 text-primary">select Beneficiary
                    type
                </h2>
                <div class="mb-4 justify-content-center mx-auto" style="max-width: 750px;">
                    <div class="beneficiary-type current-type display-card bg-success" data-value="MOM"
                        data-title="Mobile Money" id=''>
                        <span class="box-circle"></span>
                        <span id=''>Mobile Money</span>
                    </div>

                    <div class="beneficiary-type display-card bg-info  " data-value="AIR" data-title="Airtime" id=''>
                        <span class="box-circle"></span>
                        <span id=''>Airtime</span>
                    </div>
                    <div class="beneficiary-type display-card bg-warning " data-value="UTL" data-title="Utility" id=''>
                        <span class="box-circle"></span>
                        <span id=''>Utility </span>
                    </div>
                    <div class="beneficiary-type display-card bg-danger  " data-value="EDU" data-title="Education"
                        id=''>
                        <span class="box-circle"></span>
                        <span id=''>Education </span>
                    </div>
                    <div class="beneficiary-type display-card bg-secondary  " data-value="GVT"
                        data-title="Government tax" id=''>
                        <span class="box-circle"></span>
                        <span id=''>Government tax </span>
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-md-9 mx-auto" style="max-width: 55rem;">

                <div class="row justify-content-center mt-1 ">
                    <h3
                        class="font-18 text-capitalize text-center mx-3 font-weight-bold align-self-center text-primary my-auto">
                        <i class="font-18 text-info mx-2 fa fa-user-friends"></i><span
                            id="beneficiary_type_title">Mobile Money
                        </span>Beneficiaries</h3>
                    <button type="button" class="btn px-3 btn-sm font-14 font-weight-bold btn-info btn-rounded"
                        id="add_beneficiary"><i class="pr-2 fa fa-user-plus"></i>Add</button>
                </div>

                <div class="p-3 mt-3 rounded-lg m-2 customize_card table-responsive" id="transaction_summary">
                    <table id="beneficiary_list"
                        class="table table-hover table-centered w-100 mb-0 beneficiary_list_display">
                        <thead>
                            <tr class="bg-info text-white">
                                <th> <b> Name </b> </th>
                                <th> <b> Account </b> </th>
                                <th> <b> Sub Type </b> </th>
                                <th class="text-center"> <b>Actions </b> </th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div> <!-- end card body-->
        </div>
        {{-- <div class="col-md-1"></div> --}}
    </div> <!-- end card-body -->
</div> <!-- end col -->


@include("pages.payments.payment_beneficiary_form_modal")

@endsection

@section('scripts')
@include("extras.datatables")
<script>
    const noDataAvailable =   {!! json_encode($noDataAvailable) !!}
</script>
<script src="{{ asset("assets/js/pages/payments/paymentBeneficiaryList.js") }}">
</script>
@endsection