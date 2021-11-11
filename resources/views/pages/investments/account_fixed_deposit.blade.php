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
                    FIXED DEPOSIT
                </h4>
            </div>

            <div class="col-md-4 text-right">
                <h6>

                    <span class="float-right">
                        <b class="text-primary"> Investment </b> &nbsp; > &nbsp; <b class="text-danger">Fixed
                            Deposit</b>


                    </span>

                </h6>

            </div>

            <div class="col-md-12 ">
                <hr class="text-primary" style="margin: 0px;">
            </div>

        </div>
    </div>

@endsection
