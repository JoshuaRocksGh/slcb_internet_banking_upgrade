@extends('layouts.master')

@section('content')

    <div></div>
    <legend></legend>

    <div class="container-fluid">
        <br>
        <!-- start page title -->
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-primary">
                    <img src="{{ asset('assets/images/logoRKB.png') }}" alt="logo" style="zoom: 0.05">&emsp;
                    MANAGE SAME BANK BENEFICIARY
                </h4>
            </div>

            <div class="col-md-6 text-right">
                <h6>

                    <span class="flaot-right">
                        <b class="text-primary"> Beneficiary List </b> &nbsp; > &nbsp; <b class="text-danger"> Edit Beneficiary </b>
                        


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
            <div class="">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6 m-2" id="transaction_summary"
                            style="background-image: linear-gradient(to bottom right, white, rgb(201, 223, 230));">
                            <br><br><br>

                            <div class="row"></div>
                            <div class="col-md-12">

                                <form action="#" method="POST" id="same_bank_beneficiary_form_summary"
                                        autocomplete="off" aria-autocomplete="off">
                                        <div class="col-md-12">
                                            <div class="card card-body">

                                                <h4 class="text-primary"> Account Details</h4>
                                                <hr>

                                                <div class="form-group row mb-2">
                                                
                                                    <b class="col-md-6">Account Number:</b>
                                                    <span class="col-md-6 text-primary" id="display_account_number"></span>
                                                    
                                                </div>

                                                <div class="form-group row mb-2">
                                                    <b class="col-md-6">Account Name:</b>
                                                    <span class="col-md-6 text-primary" id="display_account_name"></span>
                                                    
                                                </div>

                                                <div class="form-group row mb-2">
                                                    <b class="col-md-6">Account currency:</b>
                                                    <span class="col-md-6 text-primary" id="display_account_currency"></span>
                                                   
                                                </div>
                                                <hr>

                                                <h4 class="text-primary"> Beneficiary Details</h4>
                                                <hr>

                                                <div class="form-group row mb-2">
                                                    <b class="col-md-6">Beneficiary Name:</b>
                                                    <span class="col-md-6 text-primary" id="display_beneficiary_name"></span>
    
                                                </div>

                                                <div class="form-group row mb-2">
                                                    <b class="col-md-6">Beneficiary Mobile Number:</b>
                                                    <span class="col-md-6 text-primary" id="display_beneficiary_mobile_number"></span>
                                                </div>

                                                <div class="form-group row mb-2">
                                                    <b class="col-md-6">Beneficiary Address:</b>
                                                    <span class="col-md-6 text-primary" id="display_beneficiary_Address"></span>
                                                </div>

                                                <div class="form-group row mb-2">
                                                    <b class="col-md-6">Beneficiary Email:</b>
                                                    <span class="col-md-6 text-primary" id="display_beneficiary_email"> </span>
                                                </div>

                                                <div class="form-group row mb-2">
                                                    {{-- <input id="checkbox2" type="checkbox"> --}}
                                                    <b class="col-md-6">Email beneficiary when a transfer is made:</b>
                                                    <span class="col-md-6 text-primary" id="display_transfer_email"></span>


                                                </div>



                                            </div>

                                        </div>

                                    </form>
                            </div>

                            <div class="form-group">

                                <button type="button" class="btn btn-secondary btn-rounded mb-2"id="save_beneficiary_back">
                                    <i class="mdi mdi-reply-all-outline"></i> &nbsp;  Back
                                </button>

                                <button class="btn btn-primary btn-rounded float-right" type="submit" id="save_beneficiary_summary_btn">
                                    <span id="confirm_save_beneficiary_text">Save Beneficiary</span>
                                                        
                                </button>


                            </div>

                            

                        </div>
                            


                        <div class="col-md-6 m-2" id="transaction_form"
                            style="background-image: linear-gradient(to bottom right, white, rgb(201, 223, 230));">
                            <br><br><br>
                            <div class="row">

                                <div class="col-md-12">
                                    <form action="#" id="same_bank_beneficiary_form" autocomplete="off"
                                    aria-autocomplete="off">
                                    {{-- @csrf --}}
                                    <div class="col-md-12">


                                        <h4 class="text-primary"> Account Details</h4>
                                        <hr>

                                        <div class="form-group row">
                                                
                                            <b class="col-md-4 text-primary">Account Number</b>
                                            <input class="form-control col-md-7" type="text" class="form-control"
                                                id="account_number" placeholder="Account Number" required>

                                        </div>

                                        <div class="form-group row">
                                            <b class="col-md-4 text-primary">Account Name</b>
                                            <input type="text" class="form-control col-md-7" id="account_name"
                                                parsley-trigger="change" placeholder="Account Name" readonly required>
                                           

                                        </div>

                                        <div class="form-group row">
                                            <b class="col-md-4 text-primary">Account Currency</b>
                                            <input type="text" class="form-control col-md-7" readonly value="" id="select_currency">
                                            {{--  <input type="text" class="form-control col-md-7" readonly value="" id="select_currency_i">  --}}

                                        </div>

                                        <h4 class="text-primary"> Beneficiary Details</h4>
                                            <hr>

                                            <div class="form-group row">
                                               
                                                <b class="col-md-4 text-primary">Beneficiary Name</b>
                                                <input type="text" class="form-control col-md-7" id="beneficiary_name"
                                                    parsley-trigger="change" placeholder="Beneficiary Name" required>
                                               

                                            </div>

                                            <div class="form-group row">
                                                <b class="col-md-4 text-primary">Beneficiary Mobile Number</b>
                                                <input type="text" class="form-control  col-md-7" id="beneficiary_mobile_number"
                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                    parsley-trigger="change" placeholder="Beneficiary Mobile Number" required>
                                            </div>

                                            <div class="form-group row">
                                                <b class="col-md-4 text-primary">Beneficiary Address</b>
                                                <input type="text" class="form-control col-md-7" id="beneficiary_address"
                                                    parsley-trigger="change" placeholder="Beneficiary Address" required>
                                            </div>

                                            <div class="form-group row">
                                                <b class="col-md-4 text-primary">Beneficiary Email</b>
                                                <input type="email" class="form-control col-md-7" id="beneficiary_email"
                                                    parsley-trigger="change" placeholder="Beneficiary Email" required>
                                                

                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4"></div>
                                                <div class="checkbox checkbox-primary mb-2 col-md-7" id="transfer_email">
                                                    <input id="checkbox2" type="checkbox">
                                                    <label for="checkbox2">
                                                        Email beneficiary when a transfer is made
                                                    </label>
                                                </div>

                                            </div>

                                        <div class=" form-group text-right">

                                            <button class="btn btn-primary waves-effect waves-light btn-rounded" type="submit"
                                                id="save_beneficiary">Next  &nbsp;<i class="fe-arrow-right"></i></button>
                                            {{-- <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#centermodal" id="center_modal">Center modal</button> --}}


                                        </div>

                                        <br>



                                    </div>

                                    </form>




                                    

                                </div> <!-- end col -->
                            </div>

                        </div>

                        <div class="col-md-5">
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel"
                                        style="min-height: 120px; max-height: auto;">
                                        <div class="carousel-inner" role="listbox">
                                            <div class="carousel-item active">
                                                <img class="d-block img-fluid" style="min-height: 100%"
                                                    src="{{ asset('assets/images/ads/rokel.jpeg') }}" alt="First slide">
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
                                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                            data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                            data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div> <!-- end card-body -->


                    <!-- /.modal -->



                </div> <!-- end col -->

            </div> <!-- end row -->



        </div>


        <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>


            var bene_id = @json($bene_id);
            var bene_type = @json($bene_type);
            {{--  console.log(bene_id);
            console.log(bene_type);  --}}

            function get_beneficiary_details(){
                $.ajax({
                    'type' : 'POST' ,
                    datatype: "application/json",
                    'url' : 'edit-same-bank-api',
                    'data' : {
                        'bene_id' : bene_id
                    },headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:
                    function(response){
                        {{--  console.log(response);  --}}

                        if(response.responseCode == '000'){
                            let beneficiary_details = response.data;
                            console.log(beneficiary_details);

                        $('#account_number').val(beneficiary_details[0].BEN_ACCOUNT);
                        $('#account_name').val(beneficiary_details[0].NICKNAME);
                        $('#select_currency').val(beneficiary_details[0].BEN_ACCOUNT_CURRENCY);
                        $('#beneficiary_name').val(beneficiary_details[0].NICKNAME);
                        $('#beneficiary_address').val(beneficiary_details[0].ADDRESS_1);
                        $('#beneficiary_email').val(beneficiary_details[0].EMAIL);
                        {{--  NICKNAME  --}}

                        $('#save_beneficiary').show('');
                        let account_no = $('#account_number').val(beneficiary_details[0].BEN_ACCOUNT);


                        }
                    }

                })
            }


            $(document).ready(function() {

                setTimeout(function(){
                    get_beneficiary_details();
                },2000);

                $('#save_beneficiary').hide('')

                $('#transaction_summary').hide();
                $('#account_number_error').hide();
                $('#account_name_error').hide();
                $('#beneficiary_name_error').hide();
                $('#beneficiary_email_error').hide();
                {{-- $('#spinner').hide(),
                $('#spinner-text').hide(), --}}


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
                                {{--  console.log(response.data)  --}}
                                toaster(response.message, 'success');
                                $('#account_name').val(response.data.accountDescription)
                                $('#select_currency_i').val(response.data.accountCurrencyDescription)
                                $('#select_currency').val(response.data.accountCurrencyCode  + '~' + response.data.accountCurrencyDescription)

                                $('#save_beneficiary').show('')

                            } else {
                                toaster(response.message, 'error');
                                $('#account_name').val('')
                                $('#select_currency_i').val('')
                                $('#select_currency').val('')
                                $('#save_beneficiary').hide('')


                            }
                        }

                    })
                };


                $("#account_number").keyup(function() {
                    let account_no = $(this).val();
                    if(account_no.length > 10){
                        getAccountDescription(account_no)
                    }


                })

                $('#same_bank_beneficiary_form').submit(function(e) {
                    e.preventDefault();


                    var account_number = $('#account_number').val();
                    var account_name = $('#account_name').val();
                    var beneficiary_name = $('#beneficiary_name').val();
                    var beneficiary_email = $('#beneficiary_email').val();
                    var beneficiary_number = $('#beneficiary_mobile_number').val();
                    var beneficiary_address = $('#beneficiary_address').val();
                    var transfer_email = $("#transfer_email input[type='checkbox']:checked").val();
                    var currency = $('#select_currency').val().split('~');
                    var currency_ = currency[1];
                    console.log(currency_);

                    var account_number = $('#account_number').val();
                    $('#display_account_number').text(account_number);

                    var account_name = $('#account_name').val();
                    $('#display_account_name').text(account_name);

                    var currency_ = currency[1];
                    $('#display_account_currency').text(currency);

                    var beneficiary_name = $('#beneficiary_name').val();
                    $('#display_beneficiary_name').text(beneficiary_name);

                    var beneficiary_email = $('#beneficiary_email').val();
                    $('#display_beneficiary_email').text(beneficiary_email);

                    var beneficiary_number = $('#beneficiary_mobile_number').val();
                    $('#display_beneficiary_mobile_number').text(beneficiary_number);

                    var beneficiary_address = $('#beneficiary_address').val();
                    $('#display_beneficiary_Address').text(beneficiary_address)

                    var transfer_email = $("#transfer_email input[type='checkbox']:checked").val();
                    if (transfer_email == 'on') {
                        $('#display_transfer_email').text('Yes');
                    } else {
                        $('#display_transfer_email').text('No');
                    }


                    if (account_number.trim() != '' && account_name.trim() != '' && beneficiary_name
                    .trim() != '' && beneficiary_email.trim() != '' && beneficiary_number.trim() != '' &&
                        beneficiary_address.trim() != '') {
                            $("#transaction_summary").toggle('500');
                            $('#transaction_form').hide();

                    }

                })

                {{--  $('#save_beneficiary').click(function(e) {
                    e.preventDefault();
                    $("#transaction_summary").toggle('500');
                    $('#transaction_form').hide();
                })  --}}


                $('#save_beneficiary_back').click(function(e) {
                    e.preventDefault(e);

                    $("#transaction_form").toggle('500');
                    $('#transaction_summary').hide();

                })


                $('#save_beneficiary_summary_btn').click(function(e) {
                    e.preventDefault();
                    var account_number = $('#account_number').val();
                    var account_name = $('#account_name').val();
                    var beneficiary_name = $('#beneficiary_name').val();
                    var currency = $('#select_currency').val();
                    var currency_ = currency[1];
                    {{--  console.log(currency);  --}}
                    var beneficiary_number = $('#beneficiary_mobile_number').val();
                    var beneficiary_address = $('#beneficiary_address').val();
                    var beneficiary_email = $('#beneficiary_email').val();
                    var send_email = $("#transfer_email input[type='checkbox']:checked").val();
                    if (send_email == "on") {
                        var transfer_email = ('Y');
                    } else {
                        var transfer_email = ('N');
                    }

                    var bene_id = @json($bene_id);
                    var bene_type = @json($bene_type);

                    {{-- $('#spinner').show();
                    $('#spinner-text').show();
                    $('#confirm_save_beneficiary_text').hide();
                    $('#save_beneficiary_summary_btn').attr('disabled',true); --}}


                    function redirect_page(){
                        window.location.href = "{{ url('beneficiary-list') }}";

                    };

                    console.log(account_number);
                    console.log(beneficiary_name);
                    console.log(currency_);
                    console.log(beneficiary_number);
                    console.log(beneficiary_address);
                    console.log(beneficiary_email);
                    console.log(transfer_email);



                    $.ajax({
                        "type": "PUT",
                        "url": "edit-same-bank-beneficiary-api",
                        datatype: "application/json",
                        data: {
                            "account_number": account_number,
                            "account_name": account_name,
                            "account_currency": currency,
                            "beneficiary_name": beneficiary_name,
                            "beneficiary_email": beneficiary_email,
                            "send_mail": transfer_email,
                            "number": beneficiary_number,
                            "beneficiary_address": beneficiary_address,
                            "beneID" : bene_id ,
                            "beneficiaryType" : bene_type
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        success: function(response) {

                            console.log(response.responseCode)
                            if (response.responseCode == "000") {
                                {{--  toaster(response.message, 'success');  --}}
                                Swal.fire(
                                response.message,
                                '',
                                'success'
                                )

                                setTimeout(function(){

                                    redirect_page();
                                },3000);

                                {{-- $('#spinner').hide();
                            $('#spinner-text').hide();

                            $('#confirm_save_beneficiary_text').show();
                            $('#save_beneficiary_summary_btn').attr('disabled',false); --}}

                            } else {
                                toaster(response.message, 'error');
                                {{-- $('#spinner').hide();
                            $('#spinner-text').hide();
                            $('#confirm_save_beneficiary_text').show();
                            $('#save_beneficiary_summary_btn').attr('disabled',false); --}}
                            }
                        }

                    })

                });

                {{--  var bene_id = @json($bene_id) ;
                console.log($bene_id) ;  --}}

            });

        </script>
    @endsection
