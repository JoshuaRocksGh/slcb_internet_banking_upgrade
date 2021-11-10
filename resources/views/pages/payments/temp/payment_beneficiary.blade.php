@extends('layouts.master')


@section('content')

    <div class="container-fluid">
        <br>
        <!-- start page title -->
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-primary">
                    <img src="{{ asset('assets/images/logoRKB.png') }}" alt="logo" style="zoom: 0.05">&emsp;
                    ADD BENEFICIARY

                </h4>
            </div>

            <div class="col-md-6 text-right">
                <h6>

                    <span class="flaot-right">
                        <b class="text-primary"> Payment </b> &nbsp; > &nbsp; <b class="text-danger">Add Beneficiary</b>


                    </span>

                </h6>

            </div>

            <div class="col-md-12 ">
                <hr class="text-primary" style="margin: 0px;">
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <br><br>
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-1"></div>

                    <div class="col-md-10">
                        <div class="col-md-12">
                            <div class="container">

                                <div class="text-center" id="loader">
                                    <div class="spinner-border avatar-lg text-primary m-2" role="status"></div>
                                    {{-- <div class="spinner-grow avatar-lg text-secondary m-2" role="status"></div> --}}
                                </div><!-- end col -->
                                <div class="row payment_types_card">

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="col-md-1"></div>
                </div>

            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        function paymentType() {
            $.ajax({
                type: 'GET',
                url: 'get-payment-types-api',
                datatype: "application/json",
                success: function(response) {
                    {{-- console.log(response.data.data) --}}

                    $('#loader').hide();

                    let data = response.data.data
                    console.log(data)
                    if (data.length > 0) {

                        $.each(data, function(index) {
                            let description = data[index].description
                            let payment_type_code = data[index].paymentType
                            let color = [
                                'bg-success',
                                'bg-info',
                                'bg-warning',
                                'bg-danger',
                                'bg-primary',
                                'bg-pink',
                                'bg-blue',
                                'bg-secondary',
                                'bg-dark'
                            ]
                            let card_color = color[index]
                            {{-- let card_color = color --}}
                            {{-- let randomItem = card_color[Math.floor(Math.random() * card_color.length)]; --}}
                            {{-- console.log(randomItem) --}}
                            {{-- console.log(description)
                            console.log(card_color) --}}


                            $('.payment_types_card').append(
                                `
                                <div class="col-md-4">
                                    <a href="{{ url('payment-beneficiary?beneficiary_type=${payment_type_code}') }}">


                                        <div class="card text-white ${card_color} text-xs-center">
                                            <div class="card-body">
                                                <blockquote class="card-bodyquote">
                                                    <h3 class="text-white">${data[index].description}</h3>
                                                    {{-- <footer>Someone famous in <cite title="Source Title">Source Title</cite>
                                                    </footer> --}}
                                                </blockquote>
                                            </div>
                                        </div> <!-- end card-box-->

                                        </a>
                                    </div> <!-- end col -->
                                `
                            )
                        })
                    } else {
                        return false;
                    }


                },
                error: function(xhr, status, error) {
                    $('#loader').show();

                    setTimeout(function() {
                        paymentType()
                    }, $.ajaxSetup().retryAfter)
                }
            })
        }

        $(document).ready(function() {

            setTimeout(function() {
                paymentType()
            }, 200)
        })
    </script>


@endsection
