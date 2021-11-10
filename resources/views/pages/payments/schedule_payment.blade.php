@extends('layouts.master')


@section('styles')

    <!-- third party css -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- third party css end -->

    <style>

    </style>

@endsection


@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-1"></div>


                            <div class="col-md-9">
                                <h3 class="text-primary">  <span class="">Schedule Payment</span>

                                    <button type="button" class="btn btn-primary btn-sm float-right  mod-open"
                                         id="display_view_list"> View List</button>
                                         &emsp;&emsp;&emsp;
                                    <button type="button" class="btn btn-info btn-sm float-right  mod-open"
                                         id="centermodal"> Schedule Payment</button>


                                </h3>

                                <hr>
                            </div>


                            <div class="col-md-2"></div>
                        </div>

                        <div class="row">
                            <div class="container">
                                <div class="col-md-1"></div>
                            <div class="col-md-10">

                                <form action="#" id="schedule_payment_form" autocomplete="off" aria-autocomplete="off">
                                    <h5 class=""> Schedule Payment Form</h5>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label class="h6">Transfer From<span class="text-danger">*</span></label>


                                                <select class="custom-select" id="from_account" required>
                                                    <option value="">Select Account</option>

                                                    {{-- <option value="Saving Account~kwabeane Ampah~001023468976001~GHS~2000">
                                                            Saving Account~001023468976001~GHS~2000
                                                         </option> --}}

                                                </select>
                                                <table
                                                class="table-responsive table table-centered table-nowrap mb-0 from_account_display_info card">
                                                <tbody class="text-primary">
                                                    <tr class="text-primary">

                                                        <td class="text-primary">
                                                            <a
                                                                class="text-body font-weight-semibold display_from_account_name text-primary"></a>
                                                            <small
                                                                class="d-block display_from_account_no text-primary"></small>
                                                        </td>

                                                        <td class="text-right font-weight-semibold text-primary">
                                                            <span
                                                                class="display_from_account_currency text-primary"></span>
                                                            <span
                                                                class="display_from_account_amount text-primary"></span>

                                                        </td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                            </div>

                                            <div class="form-group">
                                                <label class="">Effective Date From<span class="text-danger">*</span></label>

                                                {{-- <label class="h6">Category</label> --}}

                                                <input type="date" class="form-control" id="effective_date_from"
                                                    placeholder="Date From" autocomplete="off" required>

                                            </div>

                                            <div class="form-group">
                                                <label class="h6">Select Frequency<span class="text-danger">*</span></label>


                                                <select class="custom-select" id="select_frequency" required>
                                                    <option value="">Select Frequency</option>
                                                    <option value="01~DAILY">DAILY</option>
                                                    <option value="02~WEEKLY">WEEKLY</option>
                                                    <option value="03~FORTNIGHTLY">FORTNIGHTLY</option>
                                                    <option value="04~MONTHLY">MONTHLY</option>
                                                    <option value="05~QUARTERLY">QUARTERLY</option>
                                                    <option value="06~HALF YEARLY">HALF YEARLY</option>
                                                    <option value="07~THIRTY DAYS">THIRTY DAYS</option>
                                                    <option value="08~NINETY ONE DAYS">NINETY ONE DAYS</option>
                                                    <option value="09~ONE HUNDRED AND EIGHTY TWO DAYS">ONE HUNDRED AND EIGHTY TWO DAYS</option>
                                                    <option value="10~TWO HUNDERED AND SEVENTY DAYS">TWO HUNDERED AND SEVENTY DAYS</option>
                                                    <option value="11~THREE HUNDERD AND SIXTY FIVE DAYS">THREE HUNDERD AND SIXTY FIVE DAYS</option>
                                                    <option value="12~FOUR HUNDERD AND FIFTY DAYS">FOUR HUNDERD AND FIFTY DAYS</option>
                                                    <option value="13~SEVEN HUNDERD AND TWENTY DAYS">SEVEN HUNDERD AND TWENTY DAYS</option>
                                                    <option value="14~FIVE HUNDRED AND FORTY SEVEN DAYS">FIVE HUNDRED AND FORTY SEVEN DAYS</option>


                                                    {{-- <option value="Saving Account~kwabeane Ampah~001023468976001~GHS~2000">
                                                            Saving Account~001023468976001~GHS~2000
                                                         </option> --}}

                                                </select>
                                            {{--  <div class="form-group row">
                                                <label for="" class="col-md-12"> From Account: <span class="text-danger">*</span> </label>
                                                <input class="col-md-12"    type="text" placeholder="Enter Account Number">
                                            </div>  --}}
                                            </div>

                                            {{--  <div class="form-group">
                                                <label class="h6">Select Currency<span class="text-danger">*</span></label>


                                                <select class="custom-select" id="select_currency" required>
                                                    <option value="">Select Currency</option>



                                                </select>

                                            </div>  --}}

                                            <div class="form-group">
                                                <label class="">Transaction Details<span class="text-danger">*</span></label>

                                                {{-- <label class="h6">Category</label> --}}

                                                <input type="text" class="form-control" id="tansaction_details"
                                                    placeholder="Enter Transaction Details" autocomplete="off" required>

                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label class="h6">Select Beneficiary<span class="text-danger">*</span></label>

                                                <input type="hidden" value="" id="bank_i">
                                                <select class="custom-select" id="select_beneficiary" required>
                                                    <option value="">Select Beneficiary</option>

                                                    {{-- <option value="Saving Account~kwabeane Ampah~001023468976001~GHS~2000">
                                                            Saving Account~001023468976001~GHS~2000
                                                         </option> --}}

                                                </select>
                                                <table
                                                class="table-responsive table table-centered table-nowrap mb-0 to_account_display_info card">
                                                <tbody>
                                                    <tr>

                                                        <td>
                                                            <a
                                                                class="text-body font-weight-semibold display_to_account_name"></a>
                                                            <small class="d-block display_to_account_no"></small>
                                                        </td>

                                                        <td class="text-right font-weight-semibold">

                                                            <span class="display_to_account_currency"></span>
                                                            <span class="display_to_account_amount"></span>

                                                        </td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                            </div>

                                            <div class="form-group">
                                                <label class="">Effective Date To<span class="text-danger">*</span></label>

                                                {{-- <label class="h6">Category</label> --}}

                                                <input type="date" class="form-control" id="effective_date_to"
                                                    placeholder="Date To" autocomplete="off" required>

                                            </div>


                                            <div class="form-group maximum_attempts">
                                                <label class="h6">Maximum Default Attempts<span class="text-danger">*</span></label>


                                                <select class="custom-select" id="select_default_attempts" required>
                                                    <option value="">Select Attempts</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>

                                                    {{-- <option value="Saving Account~kwabeane Ampah~001023468976001~GHS~2000">
                                                            Saving Account~001023468976001~GHS~2000
                                                         </option> --}}

                                                </select>
                                            {{--  <div class="form-group row">
                                                <label for="" class="col-md-12"> From Account: <span class="text-danger">*</span> </label>
                                                <input class="col-md-12"    type="text" placeholder="Enter Account Number">
                                            </div>  --}}
                                            </div>

                                            <div class="form-group">
                                                <label class="">Enter Amount<span class="text-danger">*</span></label>

                                                {{-- <label class="h6">Category</label> --}}

                                                <input type="text" class="form-control" id="amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                    placeholder="Enter Amount" autocomplete="off" required>

                                            </div>


                                        </div>

                                    </div>

                                    <div class="form-group text-right">
                                        <button class="btn btn-primary btn-rounded" type="button" id="next_button">
                                            &nbsp; Next <i class="fe-arrow-right"></i> &nbsp;</button>
                                    </div>
                                </form>


                            </div>
                            <div class="col-md-1"></div>
                            </div>


                            {{--  SUMMARY FORM  --}}

                            <div class="container">
                                <div class="col-md-1"></div>
                            <div class="col-md-10">

                                <form action="#" id="schedule_payment_form_summary" autocomplete="off" aria-autocomplete="off">
                                    <h5 class=""> Schedule Payment Summary</h5>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group row">
                                                <label class="h5 col-12">Transfer From:</label>

                                                <span class="col-12" id="display_from_account" ></span>

                                            {{--  <div class="form-group row">
                                                <label for="" class="col-md-12"> From Account: <span class="text-danger">*</span> </label>
                                                <input class="col-md-12"    type="text" placeholder="Enter Account Number">
                                            </div>  --}}
                                            </div>

                                            <div class="form-group row">
                                                <label class="h5 col-12">Effective Date From:</label>

                                                {{-- <label class="h6">Category</label> --}}
                                                <span class="col-12" id="display_effective_date_from" ></span>

                                            </div>

                                            <div class="form-group row">
                                                <label class="h5 col-12">Select Frequency:</label>
                                                <span class="col-12" id="display_select_frequency"></span>

                                            {{--  <div class="form-group row">
                                                <label for="" class="col-md-12"> From Account: <span class="text-danger">*</span> </label>
                                                <input class="col-md-12"    type="text" placeholder="Enter Account Number">
                                            </div>  --}}
                                            </div>

                                            {{--  <div class="form-group">
                                                <label class="h6">Select Currency:</label>

                                                <input type="hidden" value="" id="currency_i">
                                                <span id="display_select_currency"></span>


                                            </div>  --}}

                                            <div class="form-group row">
                                                <label class="h5 col-12">Transaction Details:</label>

                                                {{-- <label class="h6">Category</label> --}}
                                                <span class="col-12" id="display_tansaction_details"></span>

                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group row">
                                                <label class="h5 col-12">Select Beneficiary:</label>
                                                <span class="col-12" id="display_select_beneficiary"></span>


                                            {{--  <div class="form-group row">
                                                <label for="" class="col-md-12"> From Account: <span class="text-danger">*</span> </label>
                                                <input class="col-md-12"    type="text" placeholder="Enter Account Number">
                                            </div>  --}}
                                            </div>

                                            <div class="form-group row">
                                                <label class="h5 col-12">Effective Date To:</label>
                                                <span class="col-12" id="display_effective_date_to"></span>
                                                {{-- <label class="h6">Category</label> --}}



                                            </div>


                                            <div class="form-group row maximum_attempts">
                                                <label class="h5 col-12">Maximum Default Attempts:</label>

                                                <span class="col-12" id="diaply_select_default_attempts"></span>


                                            </div>

                                            <div class="form-group row">
                                                <label class="h5 col-12">Enter Amount:</label>
                                                <span class="col-12" id="display_amount"></span>
                                                {{-- <label class="h6">Category</label> --}}

                                            </div>


                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <button class="btn btn-secondary btn-rounded text-left" type="button" id="back_button">
                                                &nbsp;<i class="fe-arrow-left"></i> Back  &nbsp;</button>
                                        </div>
                                        <div class="col-6">
                                            <button class="btn btn-primary btn-rounded float-right" type="submit" id="submit_button">
                                                &nbsp; Submit <i class="fe-arrow-right"></i> &nbsp;</button>
                                        </div>

                                    </div>


                                </form>
                            </div>
                            <div class="col-md-1"></div>
                            </div>

                            <div class="container-fluid">
                                {{--  <div class="col-md-1"></div>  --}}
                                <div class="col-md-12">
                                    <div class="" id="schedule_payment_table" style="zoom: 0.8;">
                                        <div class="">

                                            <table id="datatable-buttons"
                                                class="table table-bordered table-striped dt-responsive nowrap w-100 beneficiary_list_display">
                                                {{-- <table id="datatable-buttons" class="table table-bordered table-striped dt-responsive nowrap w-100"> --}}
                                                <thead>
                                                    <tr class="bg-secondary text-white">
                                                        <th> <b> Oder Number </b> </th>
                                                        <th> <b> Order Date </b> </th>
                                                        <th> <b> Value Date </b> </th>
                                                        <th> <b> Beneficiary Account </b> </th>
                                                        <th> <b> Due Amount </b> </th>
                                                        <th> <b> Transaction Details </b> </th>
                                                        <th> <b> Termination Date </b> </th>
                                                        <th class="text-center"> <b>Actions </b> </th>

                                                    </tr>
                                                </thead>


                                            </table>
                                        </div>

                                    </div>
                                </div>
                                {{--  <div class="col-md-1"></div>  --}}
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

        function to_account() {
            $.ajax({
                type: 'GET',
                url:  'get-transfer-beneficiary-api?beneType=SAB',
                datatype: "application/json",
                success: function(response) {
                    {{--  console.log(response);  --}}
                    let data = response.data
                    if (response.responseCode == '000' ) {

                        $.each(data, function(index) {
                            //$('#from_account').append($('<option>', { value : data[index].accountType+'~'+data[index].accountDesc+'~'+data[index].accountNumber+'~'+data[index].currency+'~'+data[index].availableBalance}).text(data[index].accountType +'~'+ data[index].accountNumber +'~'+data[index].currency+'~'+data[index].availableBalance));
                            $('#select_beneficiary').append($('<option>', {
                                value: data[index].BENEF_TYPE + '~' + data[index]
                                    .NICKNAME + '~' + data[index].BEN_ACCOUNT +
                                    '~' +
                                    data[index].BEN_ACCOUNT_CURRENCY
                            }).text(data[index].BENEF_TYPE + '~' + data[index]
                                .BEN_ACCOUNT +
                                '~' + data[index].NICKNAME + '~' + data[index]
                                .BEN_ACCOUNT_CURRENCY));

                        });

                    }


                },

            })
        }

        function get_accounts() {

            $.ajax({
                "type": "GET",
                "url": "get-accounts-api",
                datatype: "application/json",

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    {{--  console.log(response);  --}}
                    if (response.responseCode == '000') {

                        let data = response.data;
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

                        })


                    }
                },

            })
        }


        function get_currency(){

            $.ajax({
                "type" : "GET" ,
                "url" : "get-currency-list-api" ,
                datatype: "application/json",
                success: function(response) {
                    {{--  console.log(response);  --}}

                    let data = response.data
                    {{--  console.log(data);  --}}
                    $.each(data, function(index){
                        $('#select_currency').append($('<option>', {
                            value: data[index].isoCode
                        }).text(data[index].isoCode + '~' + data[index]
                            .description));
                    })
                }
            })
        };



        $('#schedule_payment_form_summary').hide();
        $('#schedule_payment_form').hide();
        $('#schedule_payment_table').show();
        $('#display_view_list').hide();


        $(document).ready(function(){

            setTimeout(function(){

                    get_accounts()
                    to_account();
                    get_currency();

            },2000)

            $(".from_account_display_info").hide();
            $(".to_account_display_info").hide();
            $(".maximum_attempts").hide();

            function sweet_alert() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: false,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'error',
                    title: 'Can not send to same account'
                })
            }

        $('#display_view_list').click(function(){
            $('#schedule_payment_table').show();
            $('#schedule_payment_form_summary').hide();
            $('#schedule_payment_form').hide();
            $('#display_view_list').hide();
            $(".maximum_attempts").hide();


            $("#centermodal").attr("disabled", false);



        });


            $('#centermodal').click(function(){

                {{--  alert("Clicked");  --}}
                $('#schedule_payment_table').hide();
                {{--  $('#schedule_payment_table').show();  --}}
                $('#display_view_list').show();
                $('#schedule_payment_form').toggle(500);
                $("#centermodal").attr("disabled", true);

            });



            $('#back_button').click(function(){
                $('#schedule_payment_table').hide();
                $('#display_view_list').show();

                $('#schedule_payment_form_summary').hide();
                $('#schedule_payment_form').toggle(500);
                {{--  $("#centermodal").attr("disabled", false);  --}}

            })

            $("#from_account").change(function() {
                var from_account = $(this).val();
                {{--  console.log(from_account);  --}}
                if (from_account == '' || from_account == undefined) {
                    {{-- alert('money') --}}
                    $(".from_account_display_info").hide()

                } else {

                    var from_account_info = from_account.split("~");
                    console.log(from_account_info);

                    // set summary values for display
                    $(".display_from_account_type").text(from_account_info[0])
                    $(".display_from_account_name").text(from_account_info[1])
                    $(".display_from_account_no").text(from_account_info[2])
                    $(".display_from_account_currency").text(from_account_info[3])

                    $(".display_currency").text(from_account_info[3]) // set summary currency

                    amt = from_account_info[4].trim()
                    $(".display_from_account_amount").text( from_account_info[4] )
                    {{-- alert('and show' + from_account_info[3].trim()) --}}
                    $(".from_account_display_info").show()
                }

            });

            $("#select_beneficiary").change(function() {
                var to_account = $(this).val();
                console.log(to_account);
                if (to_account == '' || to_account == undefined) {

                    $(".to_account_display_info").hide()

                } else {
                     var to_account_info = to_account.split("~");
                     console.log(to_account_info);

                    var from_account = $('#from_account').val()

                    if ((from_account.trim() == to_account.trim()) && from_account.trim() != '' &&
                        to_account.trim() != '') {
                        toaster('can not transfer to same account', 'error', 10000)

                        {{-- alert('can not transfer to same account') --}}
                        $(this).val('')
                    }

                    // set summary values for display
                    $(".display_to_account_type").text(to_account_info[0].trim())
                    $(".display_to_account_name").text(to_account_info[1].trim())
                    $(".display_to_account_no").text(to_account_info[2].trim())
                    $(".display_to_account_currency").text(to_account_info[3].trim())
                    //$(".display_to_account_amount").text(formatToCurrency(parseFloat(to_account_info[4].trim())))

                    $(".to_account_display_info").show()
                }

            });

            $("#effective_date_to").change(function(e){
                let date_from = $('#effective_date_from').val();
                let date_to = $(this).val();

                if ( date_from == date_to) {

                    $(".maximum_attempts").show();

                }else {

                    $(".maximum_attempts").hide();
                }
            })

            $('#next_button').click(function(e){
                e.preventDefault();

                var from_account_ = $('#from_account').val().split('~');
                var from_account = from_account_[2];
                $('#display_from_account').text(from_account);

                var beneficiary_account_ = $('#select_beneficiary').val().split('~');
                var beneficiary_account = beneficiary_account_[2];
                $('#display_select_beneficiary').text(beneficiary_account);

                var effective_date_from = $('#effective_date_from').val();
                $('#display_effective_date_from').text(effective_date_from);

                var effective_data_to = $('#effective_date_to').val();
                $('#display_effective_date_to').text(effective_data_to);

                var frequency = $('#select_frequency').val();
                $('#display_select_frequency').text(frequency);

                var maximum_attempts = $('#select_default_attempts').val();
                $('#diaply_select_default_attempts').text(maximum_attempts);

                var transaction_details = $('#tansaction_details').val();
                $('#display_tansaction_details').text(transaction_details);

                var amount = $('#amount').val();
                $('#display_amount').text(amount);




                $('#schedule_payment_table').hide();
                $('#display_view_list').show();

                $('#schedule_payment_form_summary').show();
                $('#schedule_payment_form').hide();
            });

            $('#submit_button').click(function(e){
                e.preventDefault();

                {{--  alert('clicked');  --}}

                var from_account_ = $('#from_account').val().split('~');
                var from_account = from_account_[2];

                var beneficiary_account_ = $('#select_beneficiary').val().split('~');
                var beneficiary_account = beneficiary_account_[2];

                var effective_date_from = $('#effective_date_from').val();

                var effective_data_to = $('#effective_date_to').val();

                var frequency = $('#select_frequency').val();

                var maximum_attempts = $('#select_default_attempts').val();

                var transaction_details = $('#tansaction_details').val();

                var amount = $('#amount').val();

                $.ajax({
                    "type" : "POST" ,
                    "url" : "schedule-payment-api" ,
                    datatype: "application/json",
                    "data" : {
                        'from_account' : from_account ,
                        'beneficiary_account' : beneficiary_account ,
                        'effective_date_from' : effective_date_from ,
                        'effective_data_to' : effective_data_to ,
                        'frequency' : frequency ,
                        'maximum_attempts' : maximum_attempts ,
                        'transaction_details' : transaction_details ,
                        'amount' : amount

                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response){
                        console.log(response.responseCode)

                        if (response.responseCode == '000'){
                            toaster(response.message, 'success', 20000);

                        }else {

                            toaster(response.message, 'error', 10000);
                        }
                    }
                })

            })


        });

    </script>


@endsection
