@extends('layouts.master')

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-xl-6">
                            <h4 class="header-title">Transfer Beneficiary</h4><br>
                            <p class="sub-header font-13">
                                Select Beneficiary
                            </p>

                            <div class="button-list">
                                <button type="button" class="btn btn-warning waves-effect waves-light">Same Bank</button>
                                <button type="button" class="btn btn-danger waves-effect waves-light">Other Local Bank</button>

                                {{--  <button type="button" class="btn btn-primary waves-effect waves-light">Primary</button>  --}}
                                <button type="button" class="btn btn-success waves-effect waves-light">International Bank</button>
                                {{--  <button type="button" class="btn btn-info waves-effect waves-light">Info</button>  --}}

                                {{--  <button type="button" class="btn btn-dark waves-effect waves-light">Dark</button>  --}}
                                {{--  <button type="button" class="btn btn-blue waves-effect waves-light">Blue</button>  --}}
                                {{--  <button type="button" class="btn btn-pink waves-effect waves-light">Pink</button>  --}}
                                {{--  <button type="button" class="btn btn-secondary waves-effect">Secondary</button>  --}}
                                {{--  <button type="button" class="btn btn-light waves-effect">Light</button>  --}}
                                {{--  <button type="button" class="btn btn-white waves-effect">White</button>  --}}
                                {{--  <button type="button" class="btn btn-link waves-effect">Link</button>  --}}
                            </div>
                        </div> <!-- end col -->

                        {{--  <div class="col-xl-6 mt-xl-0 mt-3">
                            <h4 class="header-title">Rounded Button</h4>
                            <p class="sub-header font-13">
                                Add <code>.btn-rounded</code> to default button to get rounded corners.
                            </p>

                            <div class="button-list">
                                <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">Primary</button>
                                <button type="button" class="btn btn-success btn-rounded waves-effect waves-light">Success</button>
                                <button type="button" class="btn btn-info btn-rounded waves-effect waves-light">Info</button>
                                <button type="button" class="btn btn-warning btn-rounded waves-effect waves-light">Warning</button>
                                <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light">Danger</button>
                                <button type="button" class="btn btn-dark btn-rounded waves-effect waves-light">Dark</button>
                                <button type="button" class="btn btn-blue btn-rounded waves-effect waves-light">Blue</button>
                                <button type="button" class="btn btn-pink btn-rounded waves-effect waves-light">Pink</button>
                                <button type="button" class="btn btn-secondary btn-rounded waves-effect">Secondary</button>
                                <button type="button" class="btn btn-white btn-rounded waves-effect">White</button>
                                <button type="button" class="btn btn-light btn-rounded waves-effect">Light</button>
                            </div>
                        </div>
                          --}}
                        <!-- end col -->
                    </div> <!-- end row -->
                </div> <!-- end card-box-->
            </div> <!-- end col -->
        </div>
    </div>

@endsection
