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

    <div class="row">
        <div class="col-12">
            <div class="">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2"></div>

                        <div class="col-md-8  card-body">
                            <h3 class=" m-t-0 text-primary">CARDLESS PAYMENT</h3>
                            <hr>


                            <div class="row" id="cardless_payment_form">


                                <div class="col-md-6">
                                    <form action="#" id="payment_details_form" autocomplete="off" aria-autocomplete="off">
                                        @csrf
                                        <div class="form-group">
                                            <label class="h6">Pay From<span class="text-danger">*</span></label>


                                            <select class="custom-select" id="from_account" required>
                                                <option value="">Select Account</option>
                                            </select>


                                            <table
                                                class="table-responsive table table-centered table-nowrap mb-0 from_account_display_info card">
                                                <tbody class="">
                                                    <tr>

                                                        <td>
                                                            <a
                                                                class="text-body font-weight-semibold display_from_account_name"></a>
                                                            <small class="d-block display_from_account_no"></small>
                                                        </td>

                                                        <td class="text-right font-weight-semibold">
                                                            <span class="display_from_account_currency"></span>
                                                            <span class="display_from_account_amount"></span>

                                                        </td>
                                                    </tr>


                                                </tbody>
                                            </table>


                                        </div>


                                        <div class="form-group">
                                            <label class="">Enter Amount<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="amount"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                required>
                                        </div>


                                        <div class="form-group">
                                            <label class="">Receiver Name<span class="text-danger">*</span></label>

                                            <input type="text" class="form-control" id="receiver_name"
                                                placeholder="receiver Name" autocomplete="off" required>

                                            <table
                                                class="table-responsive table table-centered table-nowrap mb-0 to_account_display_info card">
                                                <tbody>
                                                    <tr>

                                                        <td>
                                                            <a class="text-body font-weight-semibold"></a>
                                                            <small class="d-block display_receiver_name"></small>
                                                        </td>
                                                    </tr>


                                                </tbody>
                                            </table>

                                        </div>

                                        <div class="form-group">
                                            <label class="h6">Receiver Phone Number<span class="text-danger">*</span></label>

                                            <input type="text" class="form-control" id="receiver_phoneNum"
                                                placeholder="receiver Phone Number" autocomplete="off"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                required>

                                        </div>


                                        <div class="form-group">
                                            <label class="">Receiver Address<span class="text-danger">*</span></label>

                                            {{-- <label class="h6">Category</label> --}}

                                            <input type="text" class="form-control" id="receiver_address"
                                                placeholder="receiver Address" autocomplete="off" required>

                                        </div>
                                        {{-- <img src="{{ asset("land_asset/images/own-account-img.PNG") }}" /> --}}

                                        {{-- <img src="{{ asset('assets/images/wallet1.jpg') }}" class="img-fluid" alt="" style="opacity: 0.5"> --}}

                                        <div class="form-group text-right">
                                            <button class="btn btn-primary btn-rounded" type="button" id="next_button">
                                                &nbsp; Next &nbsp;</button>
                                        </div>

                                        {{-- <div class="form-group">

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">Schedule
                                                    Payments</label>
                                            </div>
                                            <legend></legend>

                                            <input type="text" class="form-control" id="schedule_payment_contraint_input">

                                            <label class="">Value Date</label>

                                            <input type="date" class="form-control" id="schedule_payment_date">

                                        </div> --}}


                                        <br><br>







                                    </form>
                                </div> <!-- end col -->



                                <div class="col-md-6">



                                </div> <!-- end col -->


                                <!-- end row -->



                            </div>

                            <div class="row" id="cardless_payment_summary">


                                <div class="col-md-12">
                                    <div class="border card p-3 mt-4 mt-lg-0 rounded">
                                        <h4 class="header-title mb-3">Cardless Payment Summary</h4>

                                        <div class="table-responsive">
                                            <table class="table mb-0 table-bordered table-striped">

                                                <tbody>
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
                                                        <td>Amount:</td>
                                                        <td>
                                                            <span class="font-15 text-primary h3 display_currency"
                                                                id="display_currency"> </span>
                                                            &nbsp;
                                                            <span class="font-15 text-primary h3 display_amount"
                                                                id="display_amount"></span>

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Receiver Name:</td>
                                                        <td>
                                                            <span
                                                                class="d-block font-13 text-primary text-bold display_receiver_name"
                                                                id="display_receiver_name"> </span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Receiver Phone Number:</td>
                                                        <td>
                                                            <span class="font-13 text-primary h3 display_receiver_phoneNum"
                                                                id="display_receiver_phoneNum"></span>

                                                        </td>
                                                    </tr>


                                                    {{-- <tr>
                                                        <td>Schedule Payment:</td>
                                                        <td>
                                                            <span class="font-13 text-primary h3 display_schedule_payment"
                                                                id="display_schedule_payment">NO </span>
                                                            &nbsp;
                                                            <span
                                                                class="font-13 text-primary h3 display_schedule_payment_date"
                                                                id="display_schedule_payment_date"> N/A

                                                            </span>
                                                            &nbsp;

                                                            <span class="font-13 text-primary h3 display_frequency"
                                                                id="display_frequency">

                                                            </span>
                                                        </td>
                                                    </tr> --}}

                                                    <tr>
                                                        <td>Payment Date: </td>
                                                        <td>
                                                            <span class="font-13 text-primary h3"
                                                                id="display_payment_date">{{ date('d F, Y') }}</span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Posted By: </td>
                                                        <td>
                                                            <span class="font-13 text-primary h3" id="display_posted_by">
                                                                {{ session()->get('userAlias') }}</span>
                                                        </td>
                                                    </tr>

                                                    <tr class="hide_on_print">
                                                        <td>Enter Pin: </td>
                                                        <td>

                                                            <input type="text" class="form-control key" id="user_pin"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">

                                                        </td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end table-responsive -->
                                        <br>
                                        <div class="form-group text-center">
                                            <span> <button class="btn btn-secondary btn-rounded" type="button"
                                                    id="back_button">Back</button> &nbsp; </span>
                                            <span>&nbsp; <button class="btn btn-primary btn-rounded" type="button"
                                                    id="confirm_button"><span id="confirm_payment">Confirm Payment</span>
                                                    <span class="spinner-border spinner-border-sm mr-1" role="status"
                                                        id="spinner" aria-hidden="true"></span>
                                                    <span id="spinner-text">Loading...</span>
                                                </button></span>
                                            <span>&nbsp; <button class="btn btn-light btn-rounded hide_on_print"
                                                    type="button" id="print_receipt" onclick="window.print()">Print Receipt
                                                </button></span>
                                        </div>
                                    </div>

                                </div> <!-- end col -->





                            </div>



                        </div>

                        <div class="col-md-2"></div>

                    </div> <!-- end card-body -->

                </div> <!-- end col -->

            </div> <!-- end row -->



        </div>


        <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>
            function from_account() {
                $.ajax({
                    type: 'GET',
                    url:  'get-my-account',
                    datatype: "application/json",
                    success: function(response) {
                        console.log(response.data);
                        let data = response.data
                        $.each(data, function(index) {

                            $('#from_account').append($('<option>', {
                                value: data[index].accountType + '~' + data[index]
                                    .accountDesc + '~' + data[index].accountNumber + '~' +
                                    data[index].currency + '~' + data[index]
                                    .availableBalance
                            }).text(data[index].accountType + '~' + data[index].accountNumber +
                                '~' + data[index].currency + '~' + data[index].availableBalance
                            ));

                        });
                    },

                })
            }

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

                $('#spinner').hide(),
                    $('#spinner-text').hide(),
                    $('#print_receipt').hide();

                setTimeout(function() {
                    from_account();
                }, 200);

                function sweet_alert(message, icon, timer) {
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
                        icon: icon,
                        title: message
                    })
                }

                {{-- hide select accounts info --}}
                $(".from_account_display_info").hide()
                $(".to_account_display_info").hide()
                $("#schedule_payment_date").hide()
                $("#frequency").hide()
                $('#schedule_payment_contraint_input').hide()
                $('.display_schedule_payment_date').text('N/A')

                $("#cardless_payment_form").show()
                $("#cardless_payment_summary").hide()

                //show card after the from_account value changes
                $("#from_account").change(function() {
                    var from_account = $(this).val()
                    {{-- alert(from_account) --}}
                    if (from_account == '' || from_account.trim() == undefined) {
                        {{-- alert('money') --}}
                        // $(".from_account_display_info").hide()

                    } else {
                        from_account_info = from_account.split("~")


                        // var to_account = $('#to_account').val()

                        // set summary values for display
                        $(".display_from_account_type").text(from_account_info[0].trim())
                        $(".display_from_account_name").text(from_account_info[1].trim())
                        $(".display_from_account_no").text(from_account_info[2].trim())
                        $(".display_from_account_currency").text(from_account_info[3].trim())

                        $(".display_currency").text(from_account_info[3].trim()) // set summary currency

                        amt = from_account_info[4].trim()

                        $(".display_from_account_amount").text(formatToCurrency(parseFloat(from_account_info[4]
                            .trim())))
                        $(".from_account_display_info").show()
                    }





                });



                function formatToCurrency(amount) {
                    return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
                };

                $("#next_button").click(function(e) {
                    e.preventDefault();

                    //go to the cardless payment summary page...
                    // let from_account = $('#from_account').val();
                    let from_account = $('#from_account').val().split('~');
                    let transfer_amount = $('#amount').val();
                    let receiver_name = $('#receiver_name').val();
                    let receiver_phoneNum = $('#receiver_phoneNum').val();
                    let receiver_address = $('#receiver_address').val();
                    let sender_name = @json(session()->get('userAlias'));
                    let user_pin = $('#user_pin').val();


                    if (from_account == '' || amount == '' || receiver_name == '' || receiver_phoneNum ==
                        '' || receiver_address == '') {
                        toaster('Field must not be empty', 'error', 10000)
                        return false
                    } else {

                        //hide the payment form and show the summary form
                        $("#cardless_payment_form").hide()
                        $("#cardless_payment_summary").show();

                        amt = from_account_info[4].trim();
                        if (amt < transfer_amount) {
                            toaster('Insufficient account balance', 'error', 9000);
                            return false
                        } else {

                            //display this is the payment summary
                            $("#display_amount").text(transfer_amount);
                            $("#display_receiver_name").text(receiver_name);
                            $("#display_receiver_address").text(receiver_name);
                            $("#display_receiver_phoneNum").text(receiver_phoneNum);



                        }


                    }

                    $("#cardless_payment_form").hide();
                    $("#cardless_payment_summary").show();



                });


                $("#back_button").click(function(e) {
                    e.preventDefault()
                    $("#cardless_payment_summary").hide();
                    $("#cardless_payment_form").show();

                });



                $('#confirm_button').click(function() {
                    let from_account = $('#from_account').val().split('~');
                    from_account = from_account[2];
                    let transfer_amount = $('#amount').val();
                    let receiver_name = $('#receiver_name').val();
                    let receiver_phoneNum = $('#receiver_phoneNum').val();
                    let receiver_address = $('#receiver_address').val();
                    let sender_name = @json(session()->get('userAlias'));
                    let user_pin = $('#user_pin').val();
                    console.log(sender_name);


                    if (user_pin == "") {
                        toaster('enter your pin', 'error', 9000);
                        console.log("Error is from here.");
                        return false;
                    } else {

                        $('#spinner').show(),
                            $('#spinner-text').show(),
                            $('#print_receipt').hide();
                        $('#confirm_payment').hide();
                        $.ajax({

                            type: 'POST',
                            url:  'initiate-cardless',
                            datatype: "application/json",
                            'data': {
                                'amount': transfer_amount,
                                'debit_account': from_account,
                                'pin_code': user_pin,
                                'receiver_address': receiver_address.trim(),
                                'receiver_name': receiver_name.trim(),
                                'receiver_phone': receiver_phoneNum,
                                'sender_name': sender_name.trim()
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {

                                console.log(response)

                                if (response.responseCode == '000') {
                                    toaster(response.message, 'success', 20000);
                                    $('#confirm_button').hide();
                                    $('#back_button').hide();
                                    $('#print_receipt').hide();
                                    $('.hide_on_print').hide();
                                } else {

                                    toaster(response.message, error, 9000);

                                    $('#spinner').hide();
                                    $('#spinner-text').hide();
                                    $('#print_receipt').hide();
                                    $('#confirm_payment').show();
                                    $('#confirm_button').attr('disabled', false);
                                }
                            }
                        });
                    }
                });

                //for testing process
                $('#from_account').change(function() {
                    var from_account = $('#from_account').val();
                    console.log(from_account);
                    // alert(from_account);
                });

                $('#amount').change(function() {
                    var amount = $('#amount').val();
                    console.log(amount);
                });

                $('#receiver_name').change(function() {
                    var receiver_name = $('#receiver_name').val();
                    console.log(receiver_name);
                });

                $('#receiver_phoneNum').change(function() {
                    var receiver_phoneNum = $('#receiver_phoneNum').val();
                    console.log(receiver_phoneNum);
                });

                $('#receiver_address').change(function() {
                    var receiver_address = $('#receiver_address').val();
                    console.log(receiver_address);
                });

                $('#user_pin').change(function() {
                    var user_pin = $('#user_pin').val();
                    console.log(user_pin);
                });
                //end of testing process




            });

        </script>
    @endsection
