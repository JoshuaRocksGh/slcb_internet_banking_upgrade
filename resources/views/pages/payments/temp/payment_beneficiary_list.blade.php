@extends('layouts.master')


@section('styles')


<style>
    <blade media|%20print%20%7B>.hide_on_print {
        display: none
    }
    }

    <blade font|-face%20%7B>font-family: 'password';
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
                PAYMENT BENEFICIARY LIST
            </h4>
        </div>

        <div class="col-md-6 text-right">
            <h6>

                <span class="flaot-right">
                    <b class="text-primary"> Transfer </b> &nbsp; > &nbsp; <b class="text-danger">Payment Beneficiary
                        List</b>


                </span>

            </h6>

        </div>

        <div class="col-md-12 ">
            <hr class="text-primary" style="margin: 0px;">
        </div>

    </div>
</div>

<div class="row">
    <br>
    <div class="col-12">
        <div class="">

            <div class="card-body">


                <div class="row">



                    {{-- <div class="col-md-1"></div> --}}
                    <div class="col-md-12">

                        <div class="row">
                            <div class="col-md-12">


                                <span class="text-sm-right float-left">


                                </span>

                                <span class="text-sm-right float-right " id="add_beneficiary" style="display:none">

                                    <div class="btn-group drop-left">
                                        <a href="{{ url('payment-beneficiary') }}">
                                            <button type="button" class="btn btn-primary dropdown-toggle btn-rounded"
                                                data-toggle="" aria-expanded="false"> Add Beneficiary </button>
                                        </a>

                                    </div>
                                </span>


                            </div>
                        </div>

                        <div class="text-center" id="beneficiary_list_loader">
                            <div class="spinner-border text-primary avatar-lg" role="status"></div>
                        </div>


                        <div class="row" id="beneficiary_table" style="display: none">
                            <div class="col-md-12 col-sm-12 col-xs-12 m-2 customize_card" id="transaction_summary"
                                style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">
                                <div class="p-3 mt-4 mt-lg-0 rounded table-responsive">
                                    <br>

                                    <table id="datatable-buttons"
                                        class="table table-bordered table-striped dt-responsive w-100 mb-0 beneficiary_list_display">
                                        {{-- <table id="datatable-buttons" class="table table-bordered table-striped dt-responsive nowrap w-100"> --}}
                                        <thead>
                                            <tr class="bg-primary text-white">
                                                <th> <b> Alias Name </b> </th>
                                                <th> <b> Payment Type</b> </th>
                                                <th> <b> Payee Name</b> </th>
                                                <th> <b> Account</b> </th>
                                                {{-- <th> <b> Beneficiary Bank </b> </th> --}}
                                                <th class="text-center"> <b>Actions </b> </th>

                                            </tr>
                                        </thead>


                                    </table>

                                </div>


                            </div>

                        </div>

                        {{-- <div class="row">
                            <div class="col-md-12">
                                <div class="text-center" id="beneficiary_list_loader">
                                    <div class="spinner-border text-primary avatar-lg" role="status"></div>
                                </div>
                                <br><br><br><br>
                                <div class="text-center" id="beneficiary_list_retry_btn">
                                    <button class="btn btn-lg btn-secondary">Retry</button>
                                </div>
                            </div>
                        </div> --}}



                        <!-- Center modal content -->
                        <div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        {{-- <h4 class="modal-title" id="myCenterModalLabel">Center modal</h4> --}}
                                        {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> --}}
                                    </div>
                                    <div class="modal-body">
                                        <h1 class="text-center"
                                            style="font-family: 'Segoe UI',Geneva, Verdana, sans-serif">Do
                                            you want to Delete Beneficiary?</h1>
                                        <br><br><br>
                                        <div class="form-group row">
                                            <div class="col-md-2"></div>

                                            <div class="col-md-8">
                                                <button type="button" class="btn btn-success btn-lg"
                                                    id="confirm_delete">Confirm</button>

                                                <button type="button" class="btn btn-danger btn-lg float-right"
                                                    data-dismiss="modal" aria-hidden="true"
                                                    id="decline_delete">Decline</button>
                                            </div>

                                            <div class="col-md-2"></div>

                                            <div class="col-md-2"></div>

                                        </div>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->





                    </div> <!-- end card body-->


                </div>

                {{-- <div class="col-md-1"></div> --}}



            </div> <!-- end card-body -->



        </div> <!-- end col -->

    </div> <!-- end row -->



</div>


@endsection

@section('scripts')

@include("extras.datatables")
<script>
    $('#beneficiary_list_loader').show();
        $("#add_beneficiary").hide()
        $("#beneficiary_table").hide()

        function beneficiary_list() {
            var table = $('.beneficiary_list_display').DataTable();
            var nodes = table.rows().nodes();
            $.ajax({
                tpye: 'GET',
                url: 'payment-beneficiary-list-api',
                datatype: "application/json",
                success: function(response) {
               

                    let data = response.data;
                    console.log(data);
                    if (response.responseCode == '000') {

                        $('#beneficiary_table').show();
                        $('#beneficiary_list_loader').hide();
                        $("#add_beneficiary").show()
                        $.each(data, function(index) {

                            // console.log(data % 5 Bindex % 5 D)


                            model_data = data[index]

                            table.row.add([
                                data[index].NICKNAME,
                                data[index].PAYMENT_TYPE,
                                data[index].PAYEE_NAME,
                                data[index].ACCOUNT,


                                `&emsp;&emsp; <a class='beneficiary_data'> <span class="fe-edit noti-icon text-primary"></span></a>

                            &emsp;&emsp; <a class='delete_beneficiary_data' ><span class="fe-trash noti-icon text-danger delete_beneficiary_data" data-value="${ data[index].BENE_ID}"></span></a>`,




                            ]).draw(false)

                        })

                    } else {
                        $('#beneficiary_list_loader').show();
                        $("#add_beneficiary").hide()
                        $("#beneficiary_table").hide()
                    }

                },
                error: function(xhr, status, error) {

                    setTimeout(function() {
                        beneficiary_list()
                    }, $.ajaxSetup().retryAfter)
                }
            })
        }


        $(document).ready(function() {
            setTimeout(function() {
                beneficiary_list();
            }, 2000);




        })
</script>


@endsection