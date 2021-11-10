@extends('layouts.master')

@section('content')


    <div class="container-fluid">
        <br>
        <!-- start page title -->
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-primary">
                    <img src="{{ asset('assets/images/logoRKB.png') }}" alt="logo" style="zoom: 0.05">&emsp;
                    OTHER LOCAL BANK BENEFICIARY

                </h4>
            </div>

            <div class="col-md-6 text-right">
                <h6>

                    <span class="flaot-right">
                        <b class="text-primary"> Transfer </b> &nbsp; > &nbsp; <b class="text-primary"> Add Beneficiary </b>
                        &nbsp; > &nbsp; <b class="text-danger">Other Local Bank Beneficiary</b>


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
                <div class="card-body ">
                    <div class="row">

                        <div class="col-md-6 m-2 " id="local_bank_beneficiary_summary"
                            style="background-image: linear-gradient(to bottom right, white, rgb(201, 223, 230));display:none;">
                            <br><br><br>

                            <div class="col-md-12">
                                <form action="#" method="POST" autocomplete="off" aria-autocomplete="off">

                                    <div class="col-md-12">
                                        <div class="card card-body">

                                            <h4 class="text-primary">Bank Details</h4>
                                            {{-- <hr> --}}

                                            <div class="form-group row mb-1">
                                                <b class="col-md-6 "> Select Bank:</b>
                                                <span class="col-md-6 text-primary" id="display_selected_bank"></span>
                                            </div>

                                            <div class="form-group row mb-1">
                                                <b class="col-md-6">Bank Swift Code:</b>
                                                <span class="col-md-6 text-primary" id="display_swift_code"> &nbsp</span>
                                                {{-- <input type="text" class="form-control" id="account_name" placeholder="Account Name"> --}}


                                            </div>
                                            {{-- <label class="purple-color">  Account Details</label> --}}
                                            <hr>
                                            <h4 class="text-primary">Account Details</h4>


                                            <div class="form-group row mb-1">
                                                <b class="col-md-6 ">Account Number:</b>
                                                <span class="col-md-6 text-primary" id="display_account_number"> </span>
                                                {{-- <input type="number" class="form-control" id="account_number" placeholder="Account Number" required> --}}


                                            </div>
                                            <div class="form-group row mb-1">
                                                <b class="col-md-6">Account Name:</b>
                                                <span class="col-md-6 text-primary" id="display_account_name"> </span>
                                                {{-- <input type="text" class="form-control" id="account_name" placeholder="Account Name"> --}}


                                            </div>
                                            <div class="form-group row mb-1 ">
                                                <b class="col-md-6">Account Currency:</b>
                                                <span class="col-md-6 text-primary" id="display_account_currency"> </span>
                                                {{-- <input type="text" class="form-control" id="account_name" placeholder="Account Name"> --}}


                                            </div>
                                            <hr>

                                            <h4 class="text-primary">Beneficiary Details</h4>



                                            {{-- <label class="purple-color"> Personal Details</label> --}}
                                            <div class="form-group row mb-1">
                                                <b class="col-md-6">Beneficiary Name:</b>
                                                <span class="col-md-6 text-primary" id="display_beneficiary_name"></span>
                                                {{-- <input type="text" class="form-control" id="beneficiary_name" placeholder="Beneficiary Name"> --}}


                                            </div>

                                            <div class="form-group row mb-1">
                                                <b class="col-md-6">Beneficiary Address:</b>
                                                <span class="col-md-6 text-primary" id="display_beneficiary_address">
                                                </span>
                                                {{-- <input type="text" class="form-control" id="beneficiary_name" placeholder="Beneficiary Name"> --}}


                                            </div>
                                            <div class="form-group row mb-1">
                                                <b class="col-md-6">Beneficiary Phone Number:</b>
                                                <span class="col-md-6 text-primary" id="display_beneficiary_phone"> </span>
                                                {{-- <input type="text" class="form-control" id="beneficiary_name" placeholder="Beneficiary Name"> --}}


                                            </div>
                                            <div class="form-group row mb-1">
                                                <b class="col-md-6">Beneficiary Email:</b>
                                                <span class="col-md-6 text-primary" id="display_beneficiary_email"> /span>
                                                    {{-- <input type="email" class="form-control" id="beneficiary_email" placeholder="Beneficiary Name"> --}}


                                            </div>

                                            <div class="form-group">

                                            </div><br>

                                            <div class="form-group">

                                                <div class="">
                                                    {{-- <input id="checkbox2" type="checkbox"> --}}
                                                    <label>Email beneficiary when a transfer is made:&emsp;</label><span
                                                        class="font-weight-light mr-2" id="display_transfer_email">
                                                        &nbsp</span>

                                                </div>

                                            </div>

                                            <div class="form-group">

                                                <button type="submit"
                                                    class="btn btn-secondary btn-rounded waves-effect waves-light mb-2"
                                                    id="save_beneficiary_back"><i class="fe-arrow-left"></i> &nbsp;
                                                    Back</button>

                                                <button
                                                    class="btn btn-primary btn-rounded waves-effect waves-light float-right"
                                                    type="submit" id="save_beneficiary">Add Beneficiary &nbsp; <i
                                                        class="fe-arrow-right"></i></button>
                                            </div>



                                        </div>
                                    </div>
                                </form>



                            </div>
                        </div>


                        <div class="col-md-6 m-2" id="local_bank_beneficiary_details"
                            style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">


                            <br><br><br>
                            <div class="row m-2" id="transaction_form">


                                <div class="col-md-12">

                                    <form action="#" autocomplete="off" aria-autocomplete="off" id="beneficiary_form">

                                        <h4 class="text-primary"> Bank Details</h4>
                                        <hr>


                                        <div class="form-group row">
                                            <b class="col-4 text-primary">Select Bank &nbsp;<span
                                                    class="text-danger">*</span></b>
                                            <div class="col-7">
                                                <select class="form-control " id="select_bank" required>
                                                    <option value="">Select Bank</option>

                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <b class="col-4 text-primary">Bank Swift Code &nbsp;<span
                                                    class="text-danger">*</span></b>
                                            <div class="col-7">
                                                <input type="text" class="form-control readOnly" id="swift_code"
                                                    placeholder="Bank Swift Code" readonly>
                                            </div>

                                        </div>

                                        <h4 class="text-primary"> Account Details</h4>
                                        <hr>


                                        <div class="form-group row">
                                            <b class="col-4 text-primary">Account Number &nbsp;<span
                                                    class="text-danger">*</span></b>
                                            <div class="col-7">
                                                <input type="text" class="form-control" id="account_number"
                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                    placeholder="Account Number" required>
                                            </div>

                                            {{-- <span class="text-danger" id="account_number_error"><i class="fas fa-times-circle"></i>This field is reqiured</span> --}}
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-4 text-primary">Account Name &nbsp; <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-7">
                                                <input type="text" class="form-control" id="account_name"
                                                    placeholder="Account Name" required>
                                            </div>

                                            {{-- <span class="text-danger" id="account_name_error"><i class="fas fa-times-circle"></i>This field is reqiured</span> --}}

                                        </div>
                                        <div class="form-group row">
                                            <b class="col-4 text-primary">Account Currency &nbsp; <span
                                                    class="text-danger">*</span></b>
                                            <div class="col-7">
                                                <select class="form-control" id="select_currency" required>
                                                    <option value="">Select Currency</option>

                                                </select>
                                            </div>

                                        </div>

                                        <h4 class="text-primary"> Beneficiary Details</h4>
                                        <hr>

                                        <div class="form-group row">
                                            <b class="col-4 text-primary">Beneficiary Name &nbsp;<span
                                                    class="text-danger">*</span></b>
                                            <div class="col-7">
                                                <input type="text" class="form-control" id="beneficiary_name"
                                                    placeholder="Beneficiary Name" required>
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label class="col-4 text-primary">Beneficiary Address &nbsp; <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-7">
                                                <input type="text" class="form-control" id="beneficiary_address"
                                                    placeholder="Beneficiary Address" required>
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label class="col-4 text-primary">Beneficiary Phone &nbsp; <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-7">
                                                <input type="number" class="form-control" id="beneficiary_telephone"
                                                    placeholder="Beneficiary Phone Number" required>
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label class="col-4 text-primary">Beneficiary Email &nbsp; <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-7">
                                                <input type="email" class="form-control" id="beneficiary_email"
                                                    placeholder="Beneficiary Email" required>
                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <div class="checkbox checkbox-primary mb-2" id="transfer_email">
                                                <input id="checkbox2" type="checkbox">
                                                <label class="custom-control-label" for="checkbox2">
                                                    Email beneficiary when a transfer is made
                                                </label>
                                            </div>

                                        </div>

                                        <p class="sub-header font-13">
                                            Providing beneficiary email and checking
                                            the box, enables us to send an alert mail to
                                            the beneficiary each time a transfer is made
                                        </p>

                                        <div class="form-group error_div">
                                            <div class="alert alert-warning" role="alert">
                                                <i class="mdi mdi-alert-outline mr-2"></i> <strong>warning</strong>
                                                <span class="error_message"></span>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary btn-rounded waves-effect waves-light float-right"
                                            type="submit" id="save_beneficiary_next">&nbsp; Next &nbsp;<i
                                                class="fe-arrow-right"></i> </button>
                                    </form>

                                    <br>
                                </div>

                                <!-- end row -->



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


                    <!-- Modal -->
                    <div id="multiple-one" class="modal fade" tabindex="-1" role="dialog"
                        aria-labelledby="multiple-oneModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="POST" id="confirm_details" autocomplete="off" aria-autocomplete="off">
                                    <div class="modal-header">
                                        <h4 class="modal-title font-16 purple-color" id="multiple-oneModalLabel">Confirm
                                            Details</h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">×</button>
                                    </div>

                                    <div class="modal-body">

                                        From: <span class="font-13 text-primary" id="display_from_account"> &nbsp
                                        </span><br><br>
                                        To: <span class="font-13 text-muted" id="display_to_account"> &nbsp </span><br><br>
                                        Schedule Payments: <span class="font-13 text-muted" id="display_payments"> &nbsp
                                        </span><br><br>
                                        Amount: <span class="font-13 text-muted" id="display_amount"> &nbsp </span><br><br>
                                        Naration: <span class="font-13 text-muted" id="display_naration"> &nbsp
                                        </span><br><br>
                                        Transaction fee: <span class="font-13 text-muted" id="display_trasaction_fee">
                                        </span><br><br>
                                        Total: <span class="font-13 text-muted" id="display_total"> &nbsp </span><br><br>

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


        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
                crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>
            function bank_list() {
                $.ajax({
                    type: 'GET',
                    url: 'get-bank-list-api',
                    datatype: "application/json",
                    success: function(response) {
                        console.log(response.data);
                        let data = response.data
                        $.each(data, function(index) {

                            $('#select_bank').append($('<option>', {
                                value: data[index].bankCode + '~' + data[index]
                                    .bankDescription + '~' + data[index].bankSwiftCode
                            }).text(data[index].bankDescription));

                        });

                    },
                    error: function(xhr, status, error) {
                        setTimeout(function() {
                            bank_list()
                        }, $.ajaxSetup().retryAfter)
                    }

                })
            };

            function get_currency() {
                $.ajax({
                    type: 'GET',
                    url: 'get-currency-list-api',
                    datatype: "application/json",
                    success: function(response) {
                        {{-- console.log(response.data); --}}
                        let data = response.data
                        $.each(data, function(index) {

                            $('#select_currency').append($('<option>', {
                                value: data[index].currCode + '~' + data[index].isoCode +
                                    '~' + data[index].description
                            }).text(data[index].isoCode + '~' + data[index].description));

                        });

                    },
                    error: function(xhr, status, error) {
                        setTimeout(function() {
                            get_currency()
                        }, $.ajaxSetup().retryAfter)
                    }

                })
            };


            function validate_account_number(account_no) {
                $.ajax({
                    "type": "POST",
                    "url": "validate-account-no",
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
                        console.log(response.data.flag)
                        if (response.responseCode == "000" && response.data.flag == 'Y') {
                            console.log(response.data)
                            toaster("valid account number entered", 'success', 10000);
                            $('.error_div').hide()

                            {{-- $('#save_beneficiary_next').show() --}}

                        } else {
                            toaster("Invalid account number entered", 'error', 10000);
                            $('.error_message').text("Invalid account number entered")
                            $('.error_div').show()

                            $('#account_name').val('')
                            $('#select_currency_i').val('')
                            $('#select_currency').val('')
                            {{-- $('#save_beneficiary_next').hide() --}}
                            {{-- return false --}}

                        }
                    },
                    error: function(xhr, status, error) {
                        setTimeout(function() {
                            validate_account_number()
                        }, $.ajaxSetup().retryAfter)
                    }

                })
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
            };



            {{-- var bene_id = @json($bene_id);
            console.log(bene_id);

            function get_beneficiary_details(){
                $.ajax({
                    'type' : 'POST',
                    datatype: "application/json",
                    'url' : 'edit-local-bank-api',
                    'data' : {
                        'bene_id' : bene_id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:
                    function(response){
                        console.log(response);
                        if(response.responseCode == '000'){

                        let beneficiary_details = response.data;
                        console.log(beneficiary_details)
                        }
                    }
                })
            }; --}}

            $(document).ready(function() {

                {{-- $('#save_beneficiary_next').hide() --}}
                $('.error_div').hide()

                setTimeout(function() {
                    get_currency();
                    bank_list();
                }, 2000);

                $('#local_bank_beneficiary_summary').hide();
                $('#select_bank_error').hide();
                $('#account_number_error').hide();
                $('#account_name_error').hide();
                $('#beneficiary_name_error').hide();
                $('#beneficiary_email_error').hide();

                $("#select_bank").change(function() {
                    var bank_name = $(this).val().split("~");
                    $("#swift_code").val(bank_name[2])
                    console.log(bank_name);
                })

                $("#select_currency").change(function() {
                    var currency = $(this).val().split("~");
                    console.log(currency);

                })

                $("#account_number").keyup(function() {
                    let account_no = $(this).val();
                    if (account_no.length > 10) {
                        validate_account_number(account_no)
                    }


                })


                $('#beneficiary_form').submit(function(e) {
                    e.preventDefault();

                    var select_bank = $('#select_bank').val();
                    var account_number = $('#account_number').val();
                    var account_name = $('#account_name').val();
                    var beneficiary_name = $('#beneficiary_name').val();
                    var beneficiary_email = $('#beneficiary_email').val();
                    var transfer_email = $("#transfer_email input[type='checkbox']:checked").val();
                    var currency = $('#select_currency').val().split('~');
                    var swift_code = $('#swift_code').val();
                    var beneficiary_address = $('#beneficiary_address').val();
                    var beneficiary_phone = $('#beneficiary_telephone').val();

                    var select_bank = $('#select_bank').val().split("~");
                    $('#display_selected_bank').text(select_bank[1]);

                    var account_number = $('#account_number').val();
                    $('#display_account_number').text(account_number);

                    var account_name = $('#account_name').val();
                    $('#display_account_name').text(account_name);

                    var beneficiary_name = $('#beneficiary_name').val();
                    $('#display_beneficiary_name').text(beneficiary_name);

                    var beneficiary_email = $('#beneficiary_email').val();
                    $('#display_beneficiary_email').text(beneficiary_email);

                    var transfer_email = $("#transfer_email input[type='checkbox']:checked").val();
                    {{-- console.log(transfer_email); --}}
                    if (transfer_email == 'on') {
                        $('#display_transfer_email').text('Yes');
                    } else {
                        $('#display_transfer_email').text('No');
                    };

                    var currency = $('#select_currency').val().split('~');
                    var currency_ = currency[1];
                    $('#display_account_currency').text(currency_);

                    var swift_code = $('#swift_code').val();
                    $('#display_swift_code').text(swift_code);

                    var beneficiary_address = $('#beneficiary_address').val();
                    $('#display_beneficiary_address').text(beneficiary_address);

                    var beneficiary_phone = $('#beneficiary_telephone').val();
                    $('#display_beneficiary_phone').text(beneficiary_phone);

                    $('#local_bank_beneficiary_details').hide();
                    $("#local_bank_beneficiary_summary").toggle('500');

                    {{-- if (select_bank.trim() != '' && account_number.trim() != '' && account_name.trim() !=
                        '' && beneficiary_name.trim() != '') {


                    } --}}


                })

                // GO BACK TO ENTER BENEFICIARY FORM
                $('#save_beneficiary_back').click(function(e) {
                    e.preventDefault();

                    $('#local_bank_beneficiary_summary').hide();
                    $('#local_bank_beneficiary_details').toggle('500');

                })


                // SEND TO API
                $('#local_bank_beneficiary_summary').submit(function(e) {
                    e.preventDefault();


                    var select_bank_ = $('#select_bank').val().split('~');
                    var select_bank = select_bank_[1];
                    var account_number = $('#account_number').val();
                    var account_name = $('#account_name').val();
                    var beneficiary_name = $('#beneficiary_name').val();
                    var beneficiary_email = $('#beneficiary_email').val();
                    var send_email = $("#transfer_email input[type='checkbox']:checked").val();
                    {{-- console.log(send_email); --}}
                    if (send_email == 'on') {
                        var transfer_email = ('Yes');
                    } else {
                        var transfer_email = ('No');
                    }
                    var currency = $('#select_currency').val().split('~');
                    var currency_ = currency[1];
                    var currCode = currency[0];

                    console.log(currCode);

                    var beneficiary_number = $('#beneficiary_telephone').val();
                    var beneficiary_address = $('#beneficiary_address').val();
                    var beneficiary_email = $('#beneficiary_email').val();
                    var swift_code = $('#swift_code').val();
                    {{-- console.log(currency); --}}

                    {{-- console.log(select_bank)
                    return false; --}}

                    function redirect_page() {
                        window.location.href = "{{ url('beneficiary-list') }}";

                    };

                    $.ajax({
                        type: 'POST',
                        url: 'add-local-bank-beneficiary-api',
                        datatype: "application/json",
                        'data': {
                            'bank_name': select_bank,
                            'account_number': account_number,
                            'account_name': account_name,
                            'beneficiary_name': beneficiary_name,
                            'beneficiary_email': beneficiary_email,
                            'send_mail': transfer_email,
                            "account_currency": currency_,
                            "number": beneficiary_number,
                            "beneficiary_address": beneficiary_address,
                            "bank_swift_code": swift_code,
                            "currency_code": currCode
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        success: function(response) {

                            console.log(response.responseCode);
                            if (response.responseCode == "000") {
                                toaster(response.message, 'success', 10000);
                                setTimeout(function() {

                                    redirect_page();
                                }, 2000);

                            } else {
                                toaster(response.message, 'error', 10000);

                            }
                        }

                    })
                })

            });
        </script>
    @endsection
