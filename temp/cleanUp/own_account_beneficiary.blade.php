@extends('layouts.master')

@section('content')

<!-- Start Content-->
<div class="container-fluid">
    <br><br>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title"><a href="{{ url('add-beneficiary') }}"><i class="fe-arrow-left"></i></a> Own Account</h4><br>
                    <p class="sub-header font-13">
                        Add account
                    </p>

                    <div class="row">
                        <div class="col-md-6">
                            <form action="#" autocomplete="off" aria-autocomplete="off">
                                <div class="form-group">
                                    <label class="purple-color"> Own Account Details</label>
                                    <input type="text" class="form-control" id="account_name" data-toggle="input-mask" data-mask-format="00/00/0000" placeholder="Account Number">
                                    {{--  <span class="font-13 text-muted">e.g "DD/MM/YYYY"</span>  --}}
                                </div>
                                <div class="form-group">
                                    {{--  <label>Account Name</label>  --}}
                                    <input type="text" class="form-control"id="account_number"data-toggle="input-mask" data-mask-format="00:00:00" placeholder="Account Name">
                                    {{--  <span class="font-13 text-muted">e.g "HH:MM:SS"</span>  --}}
                                </div><br>
{{--
                                <div class="form-group">
                                    <label class="purple-color">Beneficiary Personal Details</label>
                                    <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00/00/0000 00:00:00" placeholder="Beneficiary Name">
                                    <span class="font-13 text-muted">e.g "DD/MM/YYYY HH:MM:SS"</span>
                                </div>
                                  --}}
{{--
                                <div class="form-group">
                                    <label>Beneficiary Email</label>
                                    <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00000-000" placeholder="Beneficiary Email">
                                    <span class="font-13 text-muted">e.g "xxxxx-xxx"</span>
                                    <label class="custom-control-label" for="checkmeout0">Check me out !</label>

                                </div>  --}}

                                <br>
                                {{--  <div class="form-group">
                                <label class="custom-control-label" for="checkmeout">Check me out !</label>

                                </div>  --}}

                                <div class="form-group">
                                    {{--  <input type="checkbox" class="form-control" data-toggle="input-mask" data-mask-format="0-00-00-00" name="checkbox" value="Email beneficiary when a transfer is made"><p></p>
                                      --}}
                                    {{--  <span class="font-13 text-muted">e.g "x-xx-xx-xx"</span>  --}}
{{--
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1">Email beneficiary when a transfer is made</label>
                                    </div>  --}}

                                </div>
                                {{--  <div class="form-group">
                                    <label>Money</label>
                                    <label class="custom-control-label" for="checkmeout0">Check me out !</label>

                                    <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="000.000.000.000.000,00" data-reverse="true">
                                    <span class="font-13 text-muted">e.g "Your money"</span>
                                </div>  --}}
{{--
                                <p class="sub-header font-13">
                                    Providing  beneficairy email  and  checking
                                    the box, enables us to send an alert mail to
                                    the beneficiary each time a transfer is made
                                </p>  --}}
{{--
                                <div class="form-group">
                                    <label>Money 2</label>
                                    <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="#.##0,00" data-reverse="true">
                                    <span class="font-13 text-muted">e.g "#.##0,00"</span>
                                </div>  --}}

                                <button class="btn btn-primary" type="submit">Add Account</button>
                            </form>
                        </div> <!-- end col -->


                        <div class="col-md-6">
                            <img src="{{ asset('assets/images/add.png') }}" class="img-fluid" alt="" >
                       </div> <!-- end col -->



                    </div>
                    <!-- end row -->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->




@endsection
