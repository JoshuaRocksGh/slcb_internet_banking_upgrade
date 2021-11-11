@extends('layouts.master')

@section('styles')

    <style>
        @media print {
            .hide_on_print {
                display: none;
            }

            ;
        }

        @page {
            size: A4;

                {
                    {
                    -- margin: 10px;
                    --
                }
            }
        }

        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;
            }

            /* ... the rest of the rules ... */
        }


        @font-face {
            font-family: 'password';
            font-style: normal;
            font-weight: 400;
            src: url(https://jsbin-user-assets.s3.amazonaws.com/rafaelcastrocouto/password.ttf);
        }

        /* input[name="reverse_pin"] {
                                                                                                                                                                                                                                                                    display: none;
                                                                                                                                                                                                                                                                } */

    </style>


@endsection

@section('content')

    <div class="container-fluid">
        <br>
        <!-- start page title -->
        <div class="row">
            <div class="col-md-4">
                <a href="{{ url()->previous() }}" type="button"
                    class="btn btn-sm btn-soft-danger waves-effect waves-light float-left"><i
                        class="mdi mdi-reply-all-outline"></i>&nbsp;Go
                    Back</a>
            </div>
            <div class="col-md-4">
                <h4 class="text-primary mb-0 page-header text-center text-uppercase">
                    {{-- <img src="{{ asset('assets/images/logoRKB.png') }}" alt="logo" style="zoom: 0.05">&emsp; --}}
                    MY INVESTMENT
                </h4>
            </div>

            <div class="col-md-4 text-right">
                <h6>

                    <span class="float-right">
                        <b class="text-primary"> Investment </b> &nbsp; > &nbsp; <b class="text-danger">My Investment
                            Payment</b>


                    </span>

                </h6>

            </div>

            <div class="col-md-12 ">
                <hr class="text-primary" style="margin: 0px;">
            </div>

        </div>
    </div>

    <br>

    <div class="table-responsive table-bordered my_investment_display_area">
        <table id="" class="table table-striped mb-0 ">
            <thead>
                <tr class="bg-info text-white ">
                    <td> <b> Account No </b> </td>
                    <td> <b> Deal Amount </b> </td>
                    <td> <b> Tunure </b> </td>
                    <td> <b> FixedInterestRate </b> </td>
                    <td> <b> Rollover </b> </td>

                </tr>
            </thead>
            <tbody class="fixed_deposit_account">
                <td colspan="100%" class="text-center">
                    {{-- global noDataAvailable image variable shared with all views --}}
                    {!! $noDataAvailable !!}
                </td>

            </tbody>
        </table>
    </div>

@endsection

@section('scripts')

    <script>
        let noDataAvailable = {!! json_encode($noDataAvailable) !!}
        let account_data = new Object()
    </script>

    <script>
        function fixed_deposit() {

            $('.my_investment_loading_area').hide()
            $('.my_investment_error_area').hide()
            $('.my_investment_no_data_found').hide()
            $('.my_investment_display_area').hide()

            $.ajax({

                type: "GET",
                url: "fixed-deposit-account-api",
                datatype: "application/json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);

                    let data = response.data;
                    let noInvestments = noDataAvailable.replace(
                        "Data",
                        "Investments"
                    );



                    if (response.responseCode == '000') {


                        {{-- console.log("fixed-deposit" + data) --}}

                        if (response.data == null) {
                            $('.my_investment_loading_area').hide()
                            $('.my_investment_error_area').hide()
                            $('.my_investment_no_data_found').show()
                            $('.my_investment_display_area').hide()
                            return false;
                        }

                        {{-- let loan_count = 0 --}}
                        let fixed_deposit_count = 0
                        if (response.data.length > 0) {
                            console.log(response.data.length);

                            account_data.i_invest_total = 0
                            $.each(data, function(index) {
                                console.log(data[index])


                                let invest_amount = data[index].dealAmount
                                invest_amount = invest_amount.replace(/,/g, "");
                                account_data.i_invest_total += Math.abs(parseFloat(invest_amount))

                                if (account_data.i_invest_total != null || account_data
                                    .i_invest_total != "") {
                                    $(".total_investment_amount").text(
                                        `${formatToCurrency(parseFloat(account_data.i_invest_total))}`
                                    )
                                } else {
                                    $(".total_investment_amount").text("0.00")
                                }


                                var data_rollover = data[index].rollover
                                if (data_rollover == "Y") {
                                    var rollover_ = "Yes"
                                } else {
                                    var rollover_ = "No"
                                }

                                console.log(`total investments ${account_data.i_invest_total}`)
                                $(".fixed_deposit_account td").remove()
                                $('.fixed_deposit_account').append(
                                    `<tr>
                                                    <td><b> ${data[index].interestAccount} </b></td>
                                                    <td><b class="float-right"> ${ formatToCurrency(parseFloat(data[index].dealAmount))} </b></td>
                                                    <td><b> ${data[index].tenure} </b></td>
                                                    <td><b> ${data[index].fixedInterestRate} </b></td>
                                                    <td><b> ${rollover_ } </b></td>
                                                </tr>`
                                )

                                {{-- loan_count = loan_count + 1; --}}
                                fixed_deposit_count = fixed_deposit_count + 1;
                            })

                            {{-- console.log('i_invest_total: ' + i_invest_total) --}}

                            {{-- $(".loan_count").text(loan_count); --}}
                            $(".investment_count").text(fixed_deposit_count);

                            $('.my_investment_loading_area').hide()
                            $('.my_investment_error_area').hide()
                            $('.my_investment_no_data_found').hide()
                            $('.my_investment_display_area').show()

                            {{-- show_chart(i_have, i_owe, i_invest_total) --}}
                        } else {

                            $(".fixed_deposit_account").append(
                                `
                                                <td colspan="100%"  class="text-center">${noInvestments} </td>

                                            `
                            );
                            return;

                            {{-- $('#p_fixed_deposit_account').html(
                                    `<h2 class="text-center text-warning">No Investment</h2>`) --}}

                            $('.my_investment_loading_area').hide()
                            $('.my_investment_error_area').hide()
                            $('.my_investment_no_data_found').show()
                            $('.my_investment_display_area').hide()

                        }


                    } else {
                        $('.my_investment_loading_area').hide()
                        $('.my_investment_error_area').show()
                        $('.my_investment_no_data_found').hide()
                        $('.my_investment_display_area').hide()
                    }



                },
                error: function(xhr, status, error) {

                    $('.my_investment_loading_area').hide()
                    $('.my_investment_error_area').show()
                    $('.my_investment_no_data_found').hide()
                    $('.my_investment_display_area').hide()

                    setTimeout(function() {
                        fixed_deposit()
                    }, $.ajaxSetup().retryAfter)

                }
            })
        }



        $(document).ready(function() {
            setTimeout(function() {
                fixed_deposit()
            }, 500)
        })
    </script>


@endsection
