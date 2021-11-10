@extends('layouts.master')

@section('content')


    {{-- <legend></legend> --}}

    <div class="col-12">

        <div class="card-body ">

            <div class="container-fluid">
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
                                <b class="text-primary"> Transfer </b> &nbsp; > &nbsp; <b class="text-danger">Add
                                    Beneficiary</b>


                            </span>

                        </h6>

                    </div>

                    <div class="col-md-12 ">
                        <hr class="text-primary" style="margin: 0px;">
                    </div>

                </div>
            </div>
            <br><br><br>
            <div class="container">
                <div class="row">


                    <div class="col-md-4">
                        <div class="card text-white bg-danger text-xs-center ">
                            <a href="{{ url('add-same-bank-beneficiary') }}">
                                <div class="card-body">
                                    <h3 class="text-white">Same Bank</h3>
                                    {{-- <i class="mdi mdi-cart-outline text-white" style="font-size: 200px"></i> --}}
                                    {{-- <i class="dripicons-export text-white" style="font-size: 100px"></i> --}}
                                    <i data-feather="refresh-cw" class="icons-l card-icon"></i>

                                    <blockquote class="card-bodyquote">
                                        {{-- <p class="p-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                erat a ante.</p> --}}
                                        <br>
                                        <footer class="p-text">Add Beneficiaries Within This Bank Here!
                                        </footer>
                                    </blockquote>
                                </div>
                            </a>
                        </div> <!-- end card-box-->
                    </div> <!-- end col -->



                    <div class="col-md-4">
                        <div class="card text-white bg-success text-xs-center">
                            <a href="{{ url('add-local-bank-beneficiary') }}">
                                <div class="card-body">
                                    <h3 class="text-white">Other Local Bank</h3>
                                    {{-- <i class="fas fa-external-link-alt" style="font-size: 100px"></i> --}}
                                    {{-- <i data-feather="feather-repeat" class="icons-xxl"></i> --}}
                                    <i data-feather="repeat" class="icons-l card-icon"></i>


                                    <blockquote class="card-bodyquote">
                                        {{-- <p class="p-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                erat a ante.</p> --}}
                                        <br>
                                        <footer class="p-text">Add Beneficiaries From Other Banks Here!</cite>
                                        </footer>
                                    </blockquote>
                                </div>
                        </div> <!-- end card-box-->
                        </a>
                    </div> <!-- end col -->


                    <div class="col-md-4">
                        <div class="card text-white bg-info text-xs-center">
                            <a href="{{ url('add-international-bank-beneficiary') }}">
                                <div class="card-body">
                                    <h3 class="text-white">International Bank</h3>
                                    <i data-feather="globe" class="icons-l card-icon"></i>
                                    <blockquote class="card-bodyquote">
                                        {{-- <p class="p-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                erat a ante.</p> --}}
                                        <br>
                                        <footer class="p-text">Add International Bank Beneficiaries Here!
                                        </footer>
                                    </blockquote>
                                </div>
                            </a>
                        </div> <!-- end card-box-->
                    </div> <!-- end col -->



                </div>



                {{-- <div class="col-md-1"></div> --}}
            </div>
        </div>
    </div>



@endsection
