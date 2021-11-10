@extends('layouts.app')

@section('content')

    <br><br>

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="container">
                <div class="container">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">


                                <div class="card" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                                    <div class="container">



                                        <div class=" row">


                                            <div class="col-md-6">
                                                <div class="container">
                                                    <div class=" row ">

                                                        <div class=" col-md-12 m-1 p-1">

                                                            <div class="text-center w-75 m-auto">

                                                                @php
                                                                    if (!config('app.corporate')) {
                                                                        $TYPE = 'Personal';
                                                                    } else {
                                                                        $TYPE = 'Corporate';
                                                                    }
                                                                @endphp
                                                                <h1
                                                                    class="text-primary page-header my-5 text-center font-20 ">
                                                                    {{ $TYPE }} Internet Banking
                                                                </h1>

                                                            </div>

                                                            <form action="#" id="login_form">

                                                                <div class="alert alert-success" role="alert"
                                                                    id="success_alert" style="display: none;">
                                                                    <i class="mdi mdi-check-all mr-2 alert-success"></i>

                                                                </div>
                                                                <div class="alert alert-danger bg-warning text-white border-0 "
                                                                    role="alert" id="failed_login" style="display: none">
                                                                </div>

                                                                <div class="alert alert-danger" role="alert"
                                                                    id="error_alert" style="display: none">
                                                                    <i class="mdi mdi-block-helper mr-2"></i>
                                                                    {{-- <span class="error_alert_message">Hello</span> --}}
                                                                </div>
                                                                <h2 class="mt-0 text-left font-weight-bold font-18">Sign In
                                                                </h2>
                                                                <p class="error_alert_message"></p>
                                                                <div class="form-group mb-3">
                                                                    <label class="h4">User ID</label>
                                                                    <input class="form-control" type="text" id="user_id"
                                                                        required="" placeholder="Enter Your User Id">
                                                                </div>

                                                                <div class="form-group mb-3">
                                                                    <label for="password"
                                                                        class="h4">Password</label>
                                                                    <div class="input-group input-group-merge">
                                                                        <input type="password" id="password"
                                                                            class="form-control"
                                                                            placeholder="Enter Your Password">
                                                                        <div class="input-group-append"
                                                                            data-password="false">
                                                                            <div class="input-group-text">
                                                                                <span class="password-eye"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <button class="btn btn-primary btn-block " type="submit"
                                                                    id="submit"><span id="log_in">Log
                                                                        In</span>
                                                                    <span class="spinner-border spinner-border-sm mr-1"
                                                                        role="status" style="display: none" id="spinner"
                                                                        aria-hidden="true"></span>
                                                                    <span id="spinner-text"
                                                                        style="display: none">Loading...</span>
                                                                </button>
                                                                <br><br>

                                                            </form>

                                                        </div> <!-- end card-body -->

                                                    </div>
                                                </div>

                                                <!-- end card -->
                                                <!-- end row -->

                                            </div> <!-- end col -->


                                            <div class="col-md-6 w-50">
                                                <div class=" h-100"
                                                    style="background-image: url({{ asset('assets/images/bk2.jpg') }});background-repeat: no-repeat;background-size: cover;">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10 text-center">
                                                                <br><br><br>
                                                                <img src="{{ asset('assets/images/slcb_logo.png') }}"
                                                                    class="img-fluid" alt="">
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>


                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->
        </div>


    </div>
    <!-- end Auth fluid right content -->


    </div>
    <!-- end auth-fluid-->

@endsection

@section('scripts')

    <script src="{{ asset('assets/js/pages/login.js') }}">
    </script>


@endsection
