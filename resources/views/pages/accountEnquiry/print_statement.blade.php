@extends('layouts.print')
@section('content')


    <div class="card-body">


        <div class="row" style="zoom: 0.9">



            <table class="table table-bordered table-striped">
                <thead>
                    <tr class="___class_+?3___">

                        <th colspan="7">

                            <div class="row">

                                <div class="col-xs-4 col-md-2">
                                    <img src="{{ asset('assets/images/slcb_logo.png') }}" alt="" class="img-fluid"
                                        style="zoom: 0.2">
                                </div>

                                <div class="col-xs-8 col-md-6">

                                    <span class="h3">Sierra Leone Commerical Bank Ltd</span><br>
                                    <span class="h5"> 29/31 Siaka Stevens Street</span><br>
                                    <span class="h5"> Freetown, Sierra Leone</span><br>
                                    <span class="h5"> slcb@slcb.com</span><br>
                                    <span class="h5"> Phone : (+232) - 22 -225264</span><br>
                                    <span class="h5"> Fax: (+232) - 22-225-292</span>

                                </div>

                            </div>


                        </th>

                    </tr>

                    <tr class="___class_+?13___" style="background-color: #dce0e1!important;">
                        <th colspan="7">

                            <div class="row">

                                <div class="col-xs-3 col-md-2"></div>

                                <div class="col-xs-5 col-md-3">
                                    <h3 class="___class_+?17___"> <b>Account Details</b> </h3>
                                    <h5 class="___class_+?18___">Name: <b class="account_description">Joshua Tetteh</b>
                                    </h5>
                                    <h5 class="___class_+?20___">Account NO: <b class="account_number">012453234578521</b>
                                    </h5>
                                    <h5 class="___class_+?22___">Product: <b class="account_product">SAVINGS ACCOUNT</b>
                                    </h5>
                                    <h5 class="___class_+?24___">From: <b class="start_date"> 29-JUN-2001 </b> To <b
                                            class="end_date"> 29-JUN-2001 </b> </h5>

                                </div>

                                <div class="col-xs-5 col-md-3">
                                    <h3 class="___class_+?28___"> <b>Balance Details</b> </h4>
                                        <h5 class="___class_+?29___">Currency: <b class="account_currency">SLL</b> </h5>
                                        <h5 class="___class_+?31___">Book Balance : <b
                                                class="account_legder_balance">6,893,899,990.00</b> </h5>
                                        <h5 class="___class_+?33___">Cleared Balance : <b
                                                class="account_available_balance">6,893,899,990.00</b> </h5>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-xs-3 col-md-2"></div>
                            </div>


                        </th>

                    </tr>


                    <tr class="bg-info text-dark ">
                        <td>Value Date</td>
                        <td>Amount (SLL)<span class="account_number_display_"></span></td>
                        <td>Balance (SLL)<span class="account_description_display_"></span></td>
                        {{-- <td>Explanation <span class="account_currency_display_"></span> </td> --}}
                        <td>Transaction Details <span class="account_product_display_"></span> </td>
                        <td>Document Ref <span class="___class_+?41___"></span> </td>
                        <th>Batch No</th>
                    </tr>

                </thead>
                <tbody id="transaction_history">


                </tbody>
            </table>



        </div>





    </div>


@endsection


@section('scripts')


    @include("extras.datatables")

    <script>
        $(document).ready(function() {

            var account_number = @json($account_number);
            var start_date = @json($start_date);
            var end_date = @json($end_date);
            var transLimit = '10';

            setTimeout(function() {
                getAccountBalanceInfo(account_number)
                getAccountTransactions(account_number, start_date, end_date, transLimit)
            }, 200)





            function getAccountTransactions(account_number, start_date, end_date, transLimit) {



                $.ajax({
                    "type": "POST",
                    "url": "account-transaction-history",
                    datatype: "application/json",
                    data: {
                        "accountNumber": account_number,
                        "endDate": end_date,
                        "entrySource": "A",
                        "startDate": start_date,
                        "transLimit": transLimit
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log("transaction history" + response);
                        if (response.responseCode == '000') {

                            tranactions = response.data

                            load_data_into_table(tranactions, account_number, start_date, end_date)


                        } else {

                        }

                    },
                    error: function(xhr, status, error) {
                        setTimeout(function() {
                            getAccountTransactions(account_number, start_date, end_date,
                                transLimit)
                        }, $.ajaxSetup().retryAfter)
                    }
                })
            }


            function getAccountBalanceInfo(account_number) {
                $.ajax({
                    "type": "POST",
                    "url": "account-balance-info-api",
                    datatype: "application/json",
                    data: {
                        "accountNumber": account_number,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log("Account Balance info =>" + response);
                        if (response.responseCode == '000') {

                            let data = response.data

                            $('.account_description').text(data.ACCOUNT_DESCRIPTION)
                            $('.account_number').text(data.ACCOUNT_NUMBER)
                            $('.account_product').text(data.PRODUCT)
                            $('.start_date').text(start_date)
                            $('.end_date').text(end_date)

                            $('.account_currency').text(data.CURRENCY)
                            $('.account_legder_balance').text(data.LEGDER_BALANCE)
                            $('.account_available_balance').text(data.AVAILABLE_BALANCE)

                        } else {

                        }
                    },
                    error: function(xhr, status, error) {

                    }
                })
            }

            function formatToCurrency(amount) {
                return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
            };

            function load_data_into_table(data, account_number, start_date, end_date) {

                account_number = account_number
                start_date = start_date
                end_date = end_date

                if (data.length > 0) {

                    $.each(data, function(index) {

                        let today = new Date(data[index].postingSysDate);
                        let dd = String(today.getDate()).padStart(2, '0');
                        let mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                        let yyyy = today.getFullYear();


                        let debit = `
                        <tr>

                            <td>${dd + '/' + mm + '/' + yyyy}</td>
                            <td>${formatToCurrency(parseFloat(data[index].amount))}</td>
                            <td>${formatToCurrency(parseFloat(data[index].runningBalance))}</td>
                            <td>${data[index].narration}</td>
                            <td>${data[index].documentReference}</td>
                            <td>${data[index].batchNumber}</td>
                        </tr>

                        `;

                        console.log(debit)



                        $('#transaction_history').append(debit)


                    })

                    setTimeout(function() {
                        {{-- window.print(); --}}
                        window.close();
                    }, 2000)


                } else {

                }



            }





        })
    </script>

@endsection
