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

    <div class="___class_+?0___">

        <div class="container-fluid hide_on_print">
            <br>
            <!-- start page title -->
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ url()->previous() }}" type="button" class="btn btn-soft-blue waves-effect waves-light"><i
                            class="mdi mdi-reply-all-outline"></i>&nbsp;Back</a>
                </div>
                <div class="col-md-4">
                    <h4 class="text-primary">
                        <img src="{{ asset('assets/images/logoRKB.png') }}" alt="logo" style="zoom: 0.05">&emsp;
                        CHEQUE BOOK REQUEST

                    </h4>
                </div>

                <div class="col-md-4 text-right">
                    <h6>

                        <span class="flaot-right">
                            <b class="text-primary"> Account Services </b> &nbsp; > &nbsp; <b
                                class="text-danger">CHEQUE
                                BOOK REQUEST</b>


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

                            <div class="receipt" style="display: none">
                                <div class="container card card-body">

                                    <div class="container">
                                        <div class="___class_+?19___">
                                            <div class="col-md-12 col-md-offset-3 body-main">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4 "> <img class="img "
                                                                alt="InvoIce Template"
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
                                                        <h2><span id="personal_transfer_receipt">Cheque Book Request</span>
                                                            <span id="coporate_transfer_approval">Cheque Book Request
                                                                Awaiting Approval</span>
                                                        </h2>
                                                    </div>
                                                    <br>
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
                                                                    <td>Account Name</td>
                                                                    <td class="text-right"><span
                                                                            id="from_account_name"></span></td>
                                                                    {{-- <td></td> --}}
                                                                </tr>
                                                                <tr>
                                                                    {{-- <th scope="row">1</th> --}}
                                                                    <td>Account Number</td>
                                                                    <td class="text-right"><span
                                                                            id="from_account_number"></span></td>
                                                                    {{-- <td></td> --}}
                                                                </tr>
                                                                <tr>
                                                                    {{-- <th scope="row">1</th> --}}
                                                                    <td>Number of Leaflets</td>
                                                                    <td class="text-right"><span
                                                                            id="number_of_leaflets"></span></td>
                                                                    {{-- <td></td> --}}
                                                                </tr>

                                                                <tr>
                                                                    {{-- <th scope="row">1</th> --}}
                                                                    <td>Pickup Branch</td>
                                                                    <td class="text-right"><span
                                                                            id="pickup_branch"></span>
                                                                    </td>
                                                                    {{-- <td></td> --}}
                                                                </tr>

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
                                                            <button
                                                                class="btn btn-light btn-rounded hide_on_print text-center"
                                                                type="button" onclick="window.print()">Print
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

                            <div class="form_process">

                                <div class="row ">
                                    <div class=" col-md-7 m-2 h-100" id="request_form_div" mh-100
                                        style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">
                                        <br><br><br>

                                        <form action="#" class="select_beneficiary" id="payment_details_form"
                                            autocomplete="off" aria-autocomplete="none">
                                            @csrf
                                            <div class="row container">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">

                                                    {{-- <br><br><br> --}}
                                                    <div class="row">
                                                        {{-- <div class="col-md-1"></div> --}}

                                                        <div class="col-md-12">

                                                            <div class="form-group row mb-3">
                                                                <b class="col-md-12 text-primary">Account which cheque
                                                                    book will be made for &nbsp; <span
                                                                        class="text-danger">*</span> </b>


                                                                <select class="form-control col-md-12 " id="my_account"
                                                                    required>
                                                                    <option value="">Select Account</option>
                                                                </select>
                                                            </div>
                                                            <br>
                                                            <hr class="mt-0">

                                                            <div class="form-group row mb-3">

                                                                <b class="col-md-4 text-primary" for="leaflet">
                                                                    Number of Leftlets
                                                                    <span class="text-danger">*</span></b>

                                                                <select class="form-control col-md-8" id="leaflet" required>
                                                                    <option value="">-- Select number --</option>
                                                                    <option value="25">25</option>
                                                                    <option value="50">50</option>
                                                                    <option value="100">100</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group row mb-3">

                                                                <b class="col-md-4 text-primary">Pick up Branch
                                                                    <span class="text-danger">*</span></b>

                                                                <select class="form-control col-md-8" id="branch" required>
                                                                    <option value="">-- Selected Branch --</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group row mb-3 pin">
                                                                <b class="col-md-4 text-primary">Enter Pin
                                                                    <span class="text-danger">*</span></b>

                                                                <input type="text" class="form-control col-md-8" id="pin"
                                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">


                                                            </div>




                                                            <div class="form-group text-right">
                                                                <button type="button"
                                                                    class="btn btn-primary btn-rounded waves-effect waves-light disappear-after-success m-2"
                                                                    id="submit_cheque_request">
                                                                    <span class="submit-text">Submit</span>
                                                                    <span class="spinner-border spinner-border-sm mr-1"
                                                                        role="status" id="spinner"
                                                                        aria-hidden="true"></span>
                                                                    <span id="spinner-text">Loading...</span>
                                                                </button>
                                                            </div>


                                                        </div>

                                                        {{-- <div class="col-md-1"></div> --}}
                                                    </div>









                                                </div>
                                                <div class="col-md-1"></div>

                                            </div>











                                        </form>


                                    </div> <!-- end col -->

                                    <div class="col-md-4 m-2" id="atm_request_summary"
                                        style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">
                                        <br><br>
                                        <div class=" col-md-12 card card-body">
                                            <h4 class="text-primary">Account Info.</h4>
                                            <hr class="mt-0">
                                            {{-- <br><br> --}}
                                            <div class="row">
                                                <span class="col-md-12 success-message"></span>
                                                <p class="col-md-5">Account Name:</p>
                                                <span class="text-primary display_my_account_name col-md-7"></span>

                                                <p class="col-md-5">Account Number:</p>
                                                <span class="text-primary display_my_account_no col-md-7"></span>

                                                <p class="col-md-5">Account Currency:</p>
                                                <span class="text-primary display_my_account_currency col-md-7"></span>

                                                <p class="col-md-5">Available Balance:</p>
                                                <span class="text-primary display_my_account_amount col-md-7"></span>
                                            </div>

                                            <h4 class="text-primary">Request Info.</h4>
                                            <hr class="mt-0">

                                            <div class="row">

                                                <p class="col-md-5">Number Of Leaves:</p>
                                                <span class="text-primary display_leaflet col-md-7"></span>

                                                <p class="col-md-5">Pick Up Branch:</p>
                                                <span class="text-primary display_branch col-md-7"></span>
                                            </div>

                                        </div>

                                        <div class="form-group text-center display_button_print">

                                            <span> <button class="btn btn-secondary btn-rounded" type="button"
                                                    id="back_button">Back</button> &nbsp; </span>
                                            <span>&nbsp;
                                                <span>&nbsp; <button class="btn btn-light btn-rounded hide_on_print"
                                                        type="button" id="print_receipt" onclick="window.print()">Print
                                                        Receipt
                                                    </button></span>
                                        </div>
                                    </div>

                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <script>
        function my_account() {
            $.ajax({
                type: 'GET',
                'url': 'get-my-account',
                "datatype": "application/json",
                success: function(response) {
                    console.log(response);
                    let data = response.data
                    $.each(data, function(index) {

                        $('#my_account').append($('<option>', {
                            value: data[index].accountType + '~' + data[index].accountDesc +
                                '~' + data[index].accountNumber + '~' + data[index]
                                .currency + '~' + data[index].availableBalance + '~' + data[
                                    index].accountMandate
                        }).text(data[index].accountType + '|' + data[index].accountNumber +
                            '|' + data[index].currency + '  ' + data[index].availableBalance
                        ));

                    });
                },
                error: function(xhr, status, error) {

                    setTimeout(function() {
                        my_account()
                    }, $.ajaxSetup().retryAfter)
                }

            })
        }



        function branches() {
            $.ajax({
                type: 'GET',
                'url': 'get-bank-branches-list-api',
                "datatype": "application/json",
                success: function(response) {
                    console.log(response.data);
                    let data = response.data
                    $.each(data, function(index) {

                        $('#branch').append($('<option>', {
                            value: data[index].branchCode + '~' + data[index]
                                .branchDescription
                        }).text(data[index].branchDescription));

                    });
                },
                error: function(xhr, status, error) {

                    setTimeout(function() {
                        branches()
                    }, $.ajaxSetup().retryAfter)
                }

            })
        }



        function formatToCurrency(amount) {
            return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
        };


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

        function customer() {
            var customerType = @json(session()->get('customerType'));
            console.log(customerType);

            if (customerType == 'C') {

                $('#coporate_transfer_approval').show();
                $('#personal_transfer_receipt').hide();
                $('.pin').hide();
            } else {
                $('#personal_transfer_receipt').show();
                $('#coporate_transfer_approval').hide();
                $(".pin").show();
            }
        }

        $(document).ready(function() {

            //hide spinner on display of the main screen..
            $(".display_button_print").hide();
            $("#spinner").hide();
            $("#spinner-text").hide();
            $(".receipt").hide();



            setTimeout(function() {
                branches();
                my_account();
                customer();
            }, 1000)



            $("#my_account").change(function() {
                var my_account = $(this).val()

                my_account_info = my_account.split("~")
                // set summary values for display
                $(".display_my_account_type").text(my_account_info[0].trim())
                $(".display_my_account_name").text(my_account_info[1].trim())
                $(".display_my_account_no").text(my_account_info[2].trim())
                $(".display_my_account_currency").text(my_account_info[3].trim())

                $(".display_currency").text(my_account_info[3].trim()) // set summary currency

                $(".display_my_account_amount").text(formatToCurrency(parseFloat(my_account_info[4]
                    .trim())))

                $("#from_account_name").text(my_account_info[1].trim());
                $("#from_account_number").text(my_account_info[2].trim());

                console.log
                {{-- alert('and show' + my_account_info[3].trim()) --}}
                $(".my_account_display_info").show()





                // alert(my_account_info[0]);
            });


            $("#leaflet").change(function() {
                $('.display_leaflet').text("")
                var leaflet = $(this).val()
                if (leaflet != "") {
                    $('.display_leaflet').text(leaflet);
                    $('#number_of_leaflets').text(leaflet);
                }


            })




            $("#branch").change(function() {
                $('.display_branch').text("")
                var branch = $(this).val()
                if (branch != "") {
                    let branch_info = branch.split("~")
                    console.log(branch)
                    $('.display_branch').text(branch_info[1]);
                    $('#pickup_branch').text(branch_info[1]);
                }


            })

            $("#submit_cheque_request").click(function() {

                var customerType = @json(session()->get('customerType'));
                console.log(customerType);

                if (customerType == 'C') {

                    {{-- alert("Corporate Account"); --}}

                    var account_num = $('#my_account').val();
                    var num = account_num.split('~');
                    console.log(num);
                    var accountNumber = num[2]
                    var account_mandate = num[5]

                    var leaflet = $('#leaflet').val();

                    var branch_ = $('#branch').val()
                    var branch_code = branch_.split("~")
                    var branch = branch_code[0]


                    if (branch == "" || accountNumber == "" || leaflet == "") {
                        toaster("Please fill all required fieilds", "error", 6000);
                    } else {
                        $(".submit-text").hide();
                        $("#spinner").show();
                        $("#spinner-text").show();


                        $.ajax({
                            type: 'POST',
                            url: 'corporate-chequebook-request',
                            datatype: "application/json",
                            data: {
                                'accountNumber': accountNumber,
                                'branch': branch_code[1],
                                'branchCode': branch_code[0],
                                'leaflet': leaflet,
                                'account_mandate': account_mandate

                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                console.log(response);

                                if (response.responseCode == "000") {
                                    Swal.fire(
                                        '',
                                        response.message,
                                        'success'
                                    )
                                    $(".receipt").show();
                                    $(".form_process").hide();

                                } else {
                                    toaster(response.message, 'error', 9000);
                                    $('#spinner').hide()
                                    $('#spinner-text').hide()
                                    $(".submit-text").show()
                                    $(".form_process").show();
                                    $(".receipt").hide();

                                }
                            }
                        })
                    }





                } else {

                    //show button features after the submit button has been pressed..


                    //MY ACCOUNT
                    let my_account = $('#my_account').val()
                    //Leaflet
                    let leaflet = $('#leaflet').val()
                    //branch
                    let branch = $('#branch').val()

                    let pin = $('#pin').val()

                    if (branch == "" || my_account == "" || leaflet == "" || pin == "") {
                        toaster("Please fill all required fieilds", "error", 6000);
                    } else {

                        let branch_info = branch.split("~")
                        let branchCode = branch_info[0]

                        my_account_info = my_account.split("~")
                        let accountNumber = my_account_info[2].trim()


                        $(".submit-text").hide();
                        $("#spinner").show();
                        $("#spinner-text").show();



                        $.ajax({

                            'type': 'POST',
                            'url': 'submit-cheque-book-request',
                            "datatype": "application/json",
                            'data': {
                                'accountNumber': accountNumber.trim(),
                                'branchCode': branchCode.trim(),
                                'leaflet': leaflet.trim(),
                                'pinCode': pin
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {

                                console.log(response)

                                if (response.responseCode == '000') {
                                    {{-- toaster(response.message, 'success', 200000) --}}
                                    Swal.fire(
                                        '',
                                        response.message,
                                        'success'
                                    )
                                    {{-- $("#request_form_div").hide()
                                    $(".disappear-after-success").hide()
                                    $(".hh").text(response.message)
                                    $("#request_detail_div").show()
                                    $(".display_button_print").show();
                                    $(".receipt").show();
                                    $(".form_process").hide(); --}}


                                } else {

                                    toaster(response.message, 'error', 9000);
                                    $('#spinner').hide()
                                    $('#spinner-text').hide()
                                    $(".submit-text").show()
                                    $(".form_process").show();
                                    {{-- $(".receipt").hide(); --}}

                                }
                            }

                        })


                    }

                }


            })


        });
    </script>

@endsection
