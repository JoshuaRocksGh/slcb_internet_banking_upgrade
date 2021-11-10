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

<div class="">
    <div class="container-fluid">
        <br>
        <!-- start page title -->
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-primary">
                    <img src="{{ asset('assets/images/logoRKB.png') }}" alt="logo" style="zoom: 0.05">&emsp;
                    CUSTOMER COMPLAINT

                </h4>
            </div>

            <div class="col-md-6 text-right">
                <h6>

                    <span class="flaot-right">
                        <b class="text-primary"> Account Services </b> &nbsp; > &nbsp; <b class="text-danger">Customer complaint</b>


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
                    <div class="col-md-6  m-2" id="request_form_div"
                                                        style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">
                                                        <br><br><br>

                    <form action="#" class="select_beneficiary" id="payment_details_form" autocomplete="off"
                                                            aria-autocomplete="none">
                                                            @csrf

                                                        <div class="col-md-12">
                                                                    {{-- <br><br><br> --}}
                                                                    <div class="row">
                                                                        {{-- <div class="col-md-1"></div> --}}

                                                                        <div class="col-md-12">




                                    {{-- <div class="form-group row">

                                        <b class="col-md-5 text-primary"> Select Account &nbsp; <span
                                                class="text-danger">*</span></b>


                                        <input type="text" class="form-control col-md-7"
                                            id="reference_no"
                                            placeholder="0098348789" autocomplete="off" required>
                                        <br>

                                    </div> --}}
                                    <div class="form-group row ">
                                        <b class="col-md-12 text-primary">Select Account&nbsp; <span
                                                class="text-danger">*</span></b>

                                        <select class="form-control col-md-12" id="from_account"
                                            required>
                                            <option value=""> -- Select Account --</option>
                                        </select>

                                    </div>

                                    <br>
                                    <div class="form-group row">

                                        <b class="col-md-5 text-primary"> Select Service Type:
                                            &nbsp; <span class="text-danger">*</span></b>

                                        <select name="" id="service_type" class="form-control col-md-7">
                                            <option value="">---- select a service type ----</option>
                                            <option value="operations">Operations</option>
                                            <option value="credit">Credit</option>
                                            <option value="kyc">KYC</option>
                                            <option value="network">Network</option>
                                            <option value="other">Other</option>
                                        </select>
                                        {{-- <input type="text" class="form-control col-md-7"
                                            id="receiver_phoneNo_proceed"
                                            placeholder="enter phone number" autocomplete="off"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                            required> --}}
                                        <br>

                                    </div>


                                    <br>
                                    <div class="form-group row">

                                        <b class="col-md-5 text-primary" for="description">
                                            Description
                                            <span class="text-danger">*</span></b>
                                        {{-- <input type="password" class="form-control col-md-7"
                                            id="user_pin_proceed"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"> --}}
                                        <textarea name="" id="description" class="form-control col-md-7" cols="30" rows="10"></textarea>


                                    </div>
                                    <br><br><br>
                                    <div class="form-group text-right ">
                                        <button type="button"
                                            class="btn btn-primary btn-rounded waves-effect waves-light disappear-after-success"
                                            id="proceed_button">
                                            <span id="proceed-text">Proceed</span>
                                            <span class="spinner-border spinner-border-sm mr-1"
                                                id="spinner-proceed" role="status"
                                                aria-hidden="true"></span>
                                            <span id="spinner-text-proceed">Loading...</span>
                                        </button>
                                    </div>


                                </div>

                                {{-- <div class="col-md-1"></div> --}}
                            </div>

                        </div>
                    </form>

                    </div>
                <div class="col-md-5">
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <div id="carouselExampleControls" class="carousel slide"
                                data-ride="carousel" style="min-height: 120px; max-height: auto;">
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img class="d-block img-fluid" style="min-height: 100%"
                                            src="{{ asset('assets/images/ads/sim_korpor_ad_5.jpeg') }}"
                                            alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid" style="height: auto;"
                                            src="{{ asset('assets/images/ads/sim_korpor_ad_6.jpeg') }}"
                                            alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid" style="min-height"
                                            src="{{ asset('assets/images/ads/sim_korpor_ad_7.jpeg') }}"
                                            alt="Third slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls"
                                    role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls"
                                    role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>


                        </div>
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

    <script>
                //function to select user's account
                function from_account() {
                            $.ajax({
                                type: 'GET',
                                url:  'get-accounts-api',
                                datatype: "application/json",
                                success: function(response) {
                                    //console.log(response.data);
                                    let data = response.data
                                    $.each(data, function(index) {
                                        $('#from_account').append($('<option>', {
                                            value: data[index].accountType + '~' + data[index]
                                                .accountDesc + '~' + data[index].accountNumber +
                                                '~' + data[index].currency + '~' + data[index]
                                                .availableBalance
                                        }).text(data[index].accountType + '~' + data[index]
                                            .accountNumber + '~' + data[index].currency + '~' + data[
                                                index].availableBalance));
                                        //$('#to_account').append($('<option>', { value : data[index].accountType+'~'+data[index].accountNumber+'~'+data[index].currency+'~'+data[index].availableBalance}).text(data[index].accountType+'~'+data[index].accountNumber+'~'+data[index].currency+'~'+data[index].availableBalance));

                                    });
                                },

                            })
                }

                    //function to alert users.
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





                    $(document).ready(function() {

                    $('#spinner-proceed').hide();
                    $('#spinner-text-proceed').hide();

                            setTimeout(function() {
                                from_account()
                            },200);




                            //console account
                            $("#from_account").change(function(){
                                var from_account = $("#from_account").val();
                                console.log(from_account);
                            });

                            //console service type entered
                            $("#service_type").change(function(){
                                var service_type = $("#service_type").val();;
                                console.log(service_type);
                            });

                            //console description entered
                            $("#description").change(function(){
                                var description = $("#description").val();;
                                console.log(description);
                            });


                        //code to handle the proceed button when clicked.
                        $("#proceed_button").click(function(){

                            //declare variables to be used universally here
                            // let account= $("#from_account").val();

                            //show card after the from_account value changes


                            let from_account = $("#from_account").val();
                            let service_type= $("#service_type").val();
                            let description = $("#description").val();

                            //validate to ensure fields are not empty
                            // account.trim() =='' ||
                            if(from_account=='' || service_type=='' || description==''){
                                toaster('Fields must not be empty', 'error', 10000)
                                return false;
                            }
                            else{


                                var from_account_info = from_account.split("~");
                                let account = from_account_info[2].trim();
                                console.log(account);
                                $("#proceed-text").hide();
                                $("#spinner-proceed").show();
                                $("#spinner-text-proceed").show();

                                $.ajax({

                                        type: 'POST',
                                        url:  'complaint-api',
                                        datatype: "application/json",
                                        data: {
                                            // 'accountNumber': account,
                                            'account_no': account,
                                            'service_type': service_type,
                                            'description': description
                                        },
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        success: function(response) {

                                            // console.log(response)

                                            // if (response.responseCode == '000') {
                                                // toaster(response.message, 'success', 20000);
                                                // $("#request_form_div").hide();
                                                // $('.display_button_print').show();
                                                toaster('Complaint submitted successfully','success',2000);

                                                $("#spinner-proceed").hide();
                                                $("#spinner-text-proceed").hide();
                                                $("#proceed-text").show();
                                                setTimeout(function() {
                                                    window.location.reload();
                                                },2000);
                                            // } else {
                                                return false;
                                                // toaster(response.message, 'error', 9000);
                                                $("#proceed-text").show();
                                                $("#spinner-proceed").hide();
                                                $("#spinner-text-proceed").hide();
                                                // $('#confirm_payment').show();
                                                // $('#confirm_button').attr('disabled', false);
                                            // }
                                        }
                                });

                            }
                        });

                });

    </script>

@endsection
