@extends('layouts.master')

@section('content')

<div></div>
<legend></legend>

<div class="row">
    <div class="col-12">
        <br>
        <div class="card">
            <div class="card-body card-background-image">
                <div class="row">
                    <div class="col-md-1"></div>

                    <div class="col-md-10">
                        <h2 class="header-title m-t-0 text-primary" style="cursor: pointer;"
                            onclick="window.history.back()"><i class="fe-arrow-left"></i> &emsp; MANAGE OTHER LOCAL BANK
                            BENEFICIARY</h2>

                        <p class="text-muted font-14 m-b-20">
                            Parsley is a javascript form validation library. It helps you provide your
                            users with feedback on their form submission before sending it to your
                            server.
                        </p>
                        <hr>


                        <div class="row" id="transaction_form">


                            <div class="col-md-6">

                                <form action="#" id="local_bank_beneficiary_details" autocomplete="off"
                                    aria-autocomplete="off">

                                    <label class="purple-color"> Bank Details</label>

                                    <div class="form-group row">
                                        <label class="col-3"> Select Bank:<span class="text-danger">*</span></label>
                                        <div class="col-7">
                                            <input type="hidden" value="" id="bank_i">
                                            <select class="custom-select " id="select_bank" required>
                                                <option value="">Select Bank</option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- <span class="text-danger" id="select_bank_error"><i class="fas fa-times-circle"></i>This field is reqiured</span> --}}


                                    <label class="purple-color"> Account Details</label>
                                    <div class="form-group row">
                                        <label class="col-3">Account Number:<span class="text-danger">*</span></label>
                                        <div class="col-7">
                                            <input type="number" class="form-control" id="account_number"
                                                placeholder="Account Number" required>
                                        </div>

                                        {{-- <span class="text-danger" id="account_number_error"><i class="fas fa-times-circle"></i>This field is reqiured</span> --}}
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Account Name:<span class="text-danger">*</span></label>
                                        <div class="col-7">
                                            <input type="text" class="form-control" id="account_name"
                                                placeholder="Account Name" required>
                                        </div>

                                    </div>
                                    {{-- <span class="text-danger" id="account_name_error"><i class="fas fa-times-circle"></i>This field is reqiured</span> --}}

                                    <div class="form-group row">
                                        <label class="col-3">Account Currency:<span class="text-danger">*</span></label>
                                        <div class="col-7">
                                            <input type="hidden" value="" id="currency_i">
                                            <select class="custom-select" id="select_currency" required>
                                                <option value="">Select Currency</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Bank Swift Code:<span class="text-danger">*</span></label>
                                        <div class="col-7">
                                            <input type="text" class="form-control" id="swift_code"
                                                placeholder="Bank Swift Code" required>
                                        </div>
                                    </div>

                                    {{-- <span class="text-danger" id="account_name_error"><i class="fas fa-times-circle"></i>This field is reqiured</span> --}}



                            </div>
                            <div class="col-md-6">
                                <label class="purple-color"> Personal Details</label>
                                <div class="form-group row ">
                                    <label class="col-3">Beneficiary Name:<span class="text-danger">*</span></label>
                                    <div class="col-7">
                                        <input type="text" class="form-control" id="beneficiary_name"
                                            placeholder="Beneficiary Name" required>
                                    </div>

                                    {{-- <span class="text-danger" id="beneficiary_name_error"><i class="fas fa-times-circle"></i>This field is reqiured</span> --}}

                                </div>
                                <br>
                                <div class="form-group row">
                                    <label class="col-3">Beneficiary Address:<span class="text-danger">*</span></label>
                                    <div class="col-7">
                                        <input type="text" class="form-control" id="beneficiary_address"
                                            placeholder="Beneficiary Address" required>
                                    </div>

                                    {{-- <span class="text-danger" id="beneficiary_name_error"><i class="fas fa-times-circle"></i>This field is reqiured</span> --}}

                                </div>
                                <div class="form-group row">
                                    <label class="col-3">Beneficiary Phone Number:<span
                                            class="text-danger">*</span></label>
                                    <div class="col-7">
                                        <input type="number" class="form-control" id="beneficiary_number"
                                            placeholder="Beneficiary Phone Number" required>
                                    </div>

                                    {{-- <span class="text-danger" id="beneficiary_name_error"><i class="fas fa-times-circle"></i>This field is reqiured</span> --}}

                                </div>

                                <div class="form-group row">
                                    <label class="col-3">Beneficiary Email:<span class="text-danger">*</span></label>
                                    <div class="col-7">
                                        <input type="email" class="form-control" id="beneficiary_email"
                                            placeholder="Beneficiary Email" required>
                                    </div>

                                    {{-- <span class="text-danger" id="beneficiary_email_error"><i class="fas fa-times-circle"></i>This field is reqiured</span> --}}

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
                                <button class="btn btn-primary btn-rounded waves-effect waves-light" type="submit"
                                    id="save_beneficiary_next">Next</button>
                                </form>


                                <form action="#" method="POST" id="local_bank_beneficiary_summary" autocomplete="off"
                                    aria-autocomplete="off">
                                    <div class="card-box">
                                        @csrf
                                        <div class="form-group">
                                            <label class="purple-color"> Bank Details Summary</label>
                                        </div>
                                        <div class="form-group">
                                            <label> Select Bank:&emsp;</label>
                                            <span class="font-weight-light mr-2" id="display_selected_bank">
                                                &nbsp</span>
                                        </div>

                                        {{--  <label class="purple-color">  Account Details</label>  --}}
                                        <div class="form-group">
                                            <label>Account Number:&emsp;</label><span class="font-weight-light mr-2"
                                                id="display_account_number"> &nbsp</span>
                                            {{-- <input type="number" class="form-control" id="account_number" placeholder="Account Number" required> --}}


                                        </div>
                                        <div class="form-group">
                                            <label>Account Name:&emsp;</label><span class="font-weight-light mr-2"
                                                id="display_account_name"> &nbsp</span>
                                            {{-- <input type="text" class="form-control" id="account_name" placeholder="Account Name"> --}}


                                        </div>
                                        <div class="form-group">
                                            <label>Account Currency:&emsp;</label><span class="font-weight-light mr-2"
                                                id="display_account_currency"> &nbsp</span>
                                            {{-- <input type="text" class="form-control" id="account_name" placeholder="Account Name"> --}}


                                        </div>
                                        <div class="form-group">
                                            <label>Bank Swift Code:&emsp;</label><span class="font-weight-light mr-2"
                                                id="display_swift_code"> &nbsp</span>
                                            {{-- <input type="text" class="form-control" id="account_name" placeholder="Account Name"> --}}


                                        </div>

                                        <br>


                                        {{--  <label class="purple-color"> Personal Details</label>  --}}
                                        <div class="form-group">
                                            <label>Beneficiary Name:&emsp;</label><span class="font-weight-light mr-2"
                                                id="display_beneficiary_name"> &nbsp</span>
                                            {{-- <input type="text" class="form-control" id="beneficiary_name" placeholder="Beneficiary Name"> --}}


                                        </div>

                                        <div class="form-group">
                                            <label>Beneficiary Address:&emsp;</label><span
                                                class="font-weight-light mr-2" id="display_beneficiary_address">
                                                &nbsp</span>
                                            {{-- <input type="text" class="form-control" id="beneficiary_name" placeholder="Beneficiary Name"> --}}


                                        </div>
                                        <div class="form-group">
                                            <label>Beneficiary Phone Number:&emsp;</label><span
                                                class="font-weight-light mr-2" id="display_beneficiary_phone">
                                                &nbsp</span>
                                            {{-- <input type="text" class="form-control" id="beneficiary_name" placeholder="Beneficiary Name"> --}}


                                        </div>
                                        <div class="form-group">
                                            <label>Beneficiary Email:&emsp;</label><span class="font-weight-light mr-2"
                                                id="display_beneficiary_email"> &nbsp</span>
                                            {{-- <input type="email" class="form-control" id="beneficiary_email" placeholder="Beneficiary Name"> --}}


                                        </div>

                                        <div class="form-group">

                                        </div>

                                        <div class="form-group">

                                            <div class="">
                                                {{-- <input id="checkbox2" type="checkbox"> --}}
                                                <label>Email beneficiary when a transfer is made:&emsp;</label><span
                                                    class="font-weight-light mr-2" id="display_transfer_email">
                                                    &nbsp</span>

                                            </div>

                                        </div>

                                        {{-- <p class="sub-header font-13">
                                            Providing  beneficairy email  and  checking
                                            the box, enables us to send an alert mail to
                                            the beneficiary each time a transfer is made
                                        </p> --}}

                                        <button type="submit"
                                            class="btn btn-secondary btn-rounded waves-effect waves-light"
                                            id="save_beneficiary_back">Back</button>&emsp;&emsp;

                                        <button class="btn btn-primary btn-rounded waves-effect waves-light"
                                            type="submit" id="save_beneficiary">Save Beneficiary</button>
                                    </div>
                                </form>

                            </div> <!-- end col -->

                            {{-- <div class="col-md-5 text-center d-none d-md-block" style="margin-top: 80px;">

                                    <img src="{{ asset('assets/images/transfer1.png') }}" class="img-fluid" alt="" >
                        </div> <!-- end col --> --}}


                        <!-- end row -->



                    </div>

                </div>

                <div class="col-md-1"></div>

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
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
    {{--

            function get_currency() {
                $.ajax({
                    type: 'GET',
                    url:  'get-currency-list-api',
                    datatype: "application/json",
                    success: function(response) {
                        console.log(response.data);
                        let data = response.data
                        $.each(data, function(index) {

                            $('#select_currency').append($('<option>', {
                                value: data[index].code + '~' + data[index].currency
                            }).text(data[index].currency));
                            $('#to_account').append($('<option>', { value : data[index].accountType+'~'+data[index].accountNumber+'~'+data[index].currency+'~'+data[index].availableBalance}).text(data[index].accountType+'~'+data[index].accountNumber+'~'+data[index].currency+'~'+data[index].availableBalance));

                        });

                    },

                })
            };  --}}


            var bene_id = @json($bene_id);
            var bene_type = @json($bene_type);
            console.log(bene_id);
            console.log(bene_type);

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
                        {{--  console.log(beneficiary_details)  --}}

                        $.each(beneficiary_details, function(index) {



                            {{--  $('#select_bank').append($('<option>', {
                                value: beneficiary_details[index].Q_CODE
                            }).text(beneficiary_details[index].BANK_NAME));  --}}

                            {{--  $('#select_currency').append($('<option>', {
                                value: beneficiary_details[index].Q_CODE
                            }).text(beneficiary_details[index].BEN_ACCOUNT_CURRENCY));  --}}



                        });

                        var ACCOUNT_CURRENCY = beneficiary_details[0].BEN_ACCOUNT_CURRENCY ;
                        var BANK_NAME_ = beneficiary_details[0].BANK_NAME ;

                        {{--  alert(BANK_NAME_);  --}}
                        $('#bank_i').val(BANK_NAME_)
                        $('#currency_i').val(ACCOUNT_CURRENCY)

                        {{--

                        if ( ACCOUNT_CURRENCY == "978"){

                            $('#select_currency').text('EUR~EURO');
                        }else if(beneficiary_details[0].BEN_ACCOUNT_CURRENCY == "010"){
                            $('#select_currency').text('SLL~LEONES');
                            var ACCOUNT_CURRENCY = ('SLL~LEONES')
                        }else if(beneficiary_details[0].BEN_ACCOUNT_CURRENCY == "840"){
                            $('#select_currency').text('EUR~EURO');
                            var ACCOUNT_CURRENCY = ('USD~US DOLLAR');
                        }else {
                            $('#select_currency').text('EUR~EURO');
                            var ACCOUNT_CURRENCY = ('GBP~BRITISH POUNDS');
                        };  --}}

                        {{--  $('#select_bank').val(beneficiary_details[0].BANK_NAME);  --}}
                        $('#account_name').val(beneficiary_details[0].NICKNAME);
                        $('#account_number').val(beneficiary_details[0].BEN_ACCOUNT);
                        {{--  $('#account_name').val(beneficiary_details[0].);  --}}
                        {{--  $('#select_currency').val(ACCOUNT_CURRENCY);  --}}
                        $('#swift_code').val(beneficiary_details[0].BANK_SWIFT_CODE);
                        $('#beneficiary_name').val(beneficiary_details[0].NICKNAME);
                        $('#beneficiary_address').val(beneficiary_details[0].ADDRESS_1);
                        {{--  $('#beneficiary_number').val(beneficiary_details[0].);  --}}
                        $('#beneficiary_email').val(beneficiary_details[0].EMAIL);
                        $('#transfer_email').val(beneficiary_details[0].SEND_MAIL);



                        }
                    }
                })
            };


            function bank_list() {
                let name = $('#bank_i').val();
                {{--  alert(name) ;
                return false;  --}}
                $.ajax({
                    type: 'GET',
                    url:  'get-bank-list-api',
                    datatype: "application/json",
                    success: function(response) {
                        {{--  console.log(response.data);  --}}
                        let data = response.data
                        $.each(data, function(index) {

                            {{--  console.log(data[index].bankCode + '~' + data[index].bankDescription)  --}}

                            if(name == data[index].bankCode){

                                $('#select_bank').append($('<option selected>', {
                                    value: data[index].bankCode + '~' + data[index].bankDescription
                                }).text(data[index].bankDescription));

                                {{--  $('#select_bank').append($('<option selected>', {
                                    value: data[index].bankCode + '~' + data[index].bankDescription
                                }).text(data[index].bankDescription));  --}}
                            }
                            else{
                                {{--  $('#select_bank').append(`<option >
                                    ${data[index].bankDescription }
                                 </option>`)  --}}
                                 $('#select_bank').append($('<option>', {
                                    value: data[index].bankDescription
                                }).text(data[index].bankDescription));
                            }

                            {{--  $('#select_bank').append($('<option>', {
                                value: data[index].bankCode + '~' + data[index].bankDescription
                            }).text(data[index].bankDescription));  --}}

                        });

                    },

                })
            };


            function get_currency() {
                let cur =  $('#currency_i').val();


                {{--  alert(cur)

                return false  --}}
                $.ajax({
                    type: 'GET',
                    url:  'get-currency-list-api',
                    datatype: "application/json",
                    success: function(response) {
                        {{--  console.log(response.data);  --}}
                        let data = response.data
                        $.each(data, function(index) {
                            {{--  console.log(cur)
                            console.log(data[index].isoCode + '~' + data[index].description )  --}}

                            if(cur == data[index].currCode){

                                $('#select_currency').append($('<option selected>', {
                                    value: data[index].currCode + '~' + data[index].description
                                }).text(data[index].isoCode + '~' + data[index].description));
                            }else{
                                $('#select_currency').append(`<option >
                                    ${data[index].isoCode + '~' + data[index].description }
                                 </option>`)
                            }

                            {{--  $('#select_currency').append($('<option selected>', {
                                value: data[index].currCode + '~' + data[index].description
                            }).text(data[index].isoCode + '~' + data[index].description));  --}}

                        });

                    },

                })
            };

            $(document).ready(function(){


                setTimeout(function() {

                    get_beneficiary_details();


                    setTimeout(function() {
                        bank_list();
                        get_currency();
                    }, 2000);

                }, 2000);



                $('#local_bank_beneficiary_summary').hide();
                $('#select_bank_error').hide();
                $('#account_number_error').hide();
                $('#account_name_error').hide();
                $('#beneficiary_name_error').hide();
                $('#beneficiary_email_error').hide();


                function toaster(message, icon )
                {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 60000,
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

                $('#local_bank_beneficiary_details').submit(function(e){
                    e.preventDefault();

                    var select_bank = $('#select_bank').val();
                    var account_number = $('#account_number').val();
                    var account_name = $('#account_name').val();
                    var beneficiary_name =  $('#beneficiary_name').val();
                    var beneficiary_email = $('#beneficiary_email').val();
                    var transfer_email = $("#transfer_email input[type='checkbox']:checked").val();
                    var currency = $('#select_currency').val().split('~');
                    var swift_code = $('#swift_code').val();
                    var beneficiary_address = $('#beneficiary_address').val();
                    var beneficiary_phone = $('#beneficiary_number').val();

                    var select_bank = $('#select_bank').val();
                    $('#display_selected_bank').text(select_bank);

                    var account_number = $('#account_number').val();
                    $('#display_account_number').text(account_number);

                    var account_name = $('#account_name').val();
                    $('#display_account_name').text(account_name);

                    var beneficiary_name =  $('#beneficiary_name').val();
                    $('#display_beneficiary_name').text(beneficiary_name);

                    var beneficiary_email = $('#beneficiary_email').val();
                    $('#display_beneficiary_email').text(beneficiary_email);

                    var transfer_email = $("#transfer_email input[type='checkbox']:checked").val();
                    {{--  console.log(transfer_email);  --}}
                    if (transfer_email == 'on'){
                        $('#display_transfer_email').text('Yes');
                     }else {
                        $('#display_transfer_email').text('No');
                     };

                    var currency = $('#select_currency').val().split('~');
                    var currency_ = currency[1];
                    $('#display_account_currency').text(currency_);

                    var swift_code = $('#swift_code').val();
                    $('#display_swift_code').text(swift_code) ;

                    var beneficiary_address = $('#beneficiary_address').val();
                     $('#display_beneficiary_address').text(beneficiary_address);

                    var beneficiary_phone = $('#beneficiary_number').val();
                     $('#display_beneficiary_phone').text(beneficiary_phone);

                    if(select_bank.trim() != '' && account_number.trim() != '' && account_name.trim() != '' && beneficiary_name.trim() != ''){
                        $('#local_bank_beneficiary_details').hide();
                        $("#local_bank_beneficiary_summary" ).toggle( '500' );

                    }


                })

                // GO BACK TO ENTER BENEFICIARY FORM
                $('#save_beneficiary_back').click(function(e){
                    e.preventDefault();

                    $('#local_bank_beneficiary_summary').hide();
                    $('#local_bank_beneficiary_details').toggle('500');

                })


                // SEND TO API
                $('#local_bank_beneficiary_summary').submit(function(e){
                    e.preventDefault();


                    var select_bank = $('#select_bank').val().split('~');
                    var select_bank_ = select_bank[0];
                    var account_number = $('#account_number').val();
                    var account_name = $('#account_name').val();
                    var beneficiary_name =  $('#beneficiary_name').val();
                    var beneficiary_email = $('#beneficiary_email').val();
                    var send_email = $("#transfer_email input[type='checkbox']:checked").val();
                    {{--  console.log(send_email);  --}}
                    if(send_email == 'on'){
                        var transfer_email = ('Yes');
                    }else{
                        var transfer_email = ('No');
                    }
                    {{--  console.log(select_bank);  --}}
                    var currency = $('#select_currency').val().split('~');
                    var currency_ = currency[0];
                    var beneficiary_number = $('#beneficiary_number').val();
                    var beneficiary_address = $('#beneficiary_address').val();
                    var beneficiary_email = $('#beneficiary_email').val();
                    var swift_code = $('#swift_code').val();
                    var bene_id = @json($bene_id);
                    var bene_type = @json($bene_type);

                    {{--  console.log(select_bank);  --}}

                    {{--  console.log(select_bank_);
                    console.log(account_number);
                    console.log(account_name);
                    console.log(beneficiary_name);
                    console.log(beneficiary_email);
                    console.log(transfer_email);
                    console.log(currency_);
                    console.log(beneficiary_number);
                    console.log(beneficiary_address);
                    console.log(beneficiary_email);
                    console.log(swift_code);
                    console.log(bene_id);
                    console.log(bene_type);  --}}

                    {{--  console.log(select_bank_);
                    console.log(currency_);
                    return false;  --}}

                    function redirect_page(){
                        window.location.href = "{{ url('beneficiary-list') }}";

                    };

                    $.ajax({
                        'type' : 'PUT' ,
                        'url' : 'edit-local-bank-beneficiary-api',
                        "datatype" : "application/json",
                        'data' : {
                            'bank_name' : select_bank_ ,
                            'account_number' : account_number ,
                            'account_name' : account_name ,
                            'beneficiary_name' : beneficiary_name ,
                            'beneficiary_email' : beneficiary_email ,
                            'send_mail' : transfer_email ,
                            "account_currency": currency_,
                            "number": beneficiary_number,
                            "beneficiary_address": beneficiary_address,
                            "bank_swift_code" : swift_code,
                            "bene_id" : bene_id,
                            "bene_type" : bene_type
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        success:
                        function(response){

                            console.log(response.responseCode);
                            if(response.responseCode == "000"){
                                toaster(response.message, 'success' );

                                setTimeout(function(){

                                    redirect_page();
                                },3000);

                            }else{
                                toaster(response.message, 'error' );

                        }
                    }

                    })
                })

            });

</script>
@endsection