@extends('layouts.master')

@section('content')

<!-- Start Content-->
<div class="container-fluid">
    <br><br>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title"><a href="{{ url('payment-add-beneficiary') }}"><i class="fe-arrow-left"></i></a> Utility Beneficiary</h4><br>
                    <p class="sub-header font-13">
                        Add a new beneficiary purposely for Utility Bill Payments
                    </p>

                    <div class="row">
                        <div class="col-md-6">
                            <form action="#" autocomplete="off" aria-autocomplete="off">
                                <div class="form-group">
                                    <label class="purple-color"> Beneficiary Account Details</label>
                                    {{--  <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00/00/0000" placeholder="Account Number">  --}}
                                    {{--  <span class="font-13 text-muted">e.g "DD/MM/YYYY"</span>  --}}
                                </div>
                                <div class="form-group">
                                    {{--  <label>Account Name</label>  --}}
                                    {{--  <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00:00:00" placeholder="Account Name">  --}}
                                    {{--  <span class="font-13 text-muted">e.g "HH:MM:SS"</span>  --}}

                                    <select class="custom-select" >
                                        <option selected>Select Utlily Type</option>
                                        <option value="1"><img src="{{ asset('assets/images/mtn.png') }}" alt="image" class="img-fluid avatar-xs rounded"> DSTV</option>
                                        <option value="2">GOTV</option>
                                        <option value="3">Electricity Company of Ghana</option>
                                        <option value="4">Ghana Water Company</option>

                                        {{--  <img src="{{ asset('assets/images/mtn.png') }}" alt="mtn" class="img-fluid">  --}}

                                    </select>

                                </div>
                                <br>

                                <span id="payment_mode"></span>
                                <div class="form-group">
                                    {{--  <label class="purple-color"> Beneficiary Account Details</label>  --}}
                                    <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00/00/0000" placeholder=" ">
                                    {{--  <span class="font-13 text-muted">e.g "DD/MM/YYYY"</span>  --}}
                                </div>
                                {{--  <div class="form-group">
                                    <label>Account Name</label>
                                    <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00:00:00" placeholder="Account Name">
                                    <span class="font-13 text-muted">e.g "HH:MM:SS"</span>
                                </div>  --}}
                                <br>
                                <div class="form-group">
                                    <label class="purple-color">Beneficiary Personal Details</label>
                                    <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00/00/0000 00:00:00" placeholder="Beneficiary Name">
                                    {{--  <span class="font-13 text-muted">e.g "DD/MM/YYYY HH:MM:SS"</span>  --}}
                                </div>
                                <div class="form-group">
                                    {{--  <label>Beneficiary Email</label>  --}}
                                    <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00000-000" placeholder="Beneficiary Email">
                                    {{--  <span class="font-13 text-muted">e.g "xxxxx-xxx"</span>  --}}
                                    {{--  <label class="custom-control-label" for="checkmeout0">Check me out !</label>  --}}

                                </div><br>
                                {{--  <div class="form-group">
                                <label class="custom-control-label" for="checkmeout">Check me out !</label>

                                </div>  --}}

                                <div class="form-group">
                                    {{--  <input type="checkbox" class="form-control" data-toggle="input-mask" data-mask-format="0-00-00-00" name="checkbox" value="Email beneficiary when a transfer is made"><p></p>
                                      --}}
                                    {{--  <span class="font-13 text-muted">e.g "x-xx-xx-xx"</span>  --}}

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Email beneficiary when payment is made</label>
                                    </div>

                                </div>
                                {{--  <div class="form-group">
                                    <label>Money</label>
                                    <label class="custom-control-label" for="checkmeout0">Check me out !</label>

                                    <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="000.000.000.000.000,00" data-reverse="true">
                                    <span class="font-13 text-muted">e.g "Your money"</span>
                                </div>  --}}

                                <div class="row">
                                    &nbsp; <h4>NB</h4> &nbsp;
                                    <div class="col-8">

                                        <p class="sub-header font-13">
                                            Providing  beneficairy email  and  checking
                                            the box, enables us to send an alert mail to
                                            the beneficiary each time a payment is made
                                        </p>
                                    </div>
                                </div>
{{--
                                <div class="form-group">
                                    <label>Money 2</label>
                                    <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="#.##0,00" data-reverse="true">
                                    <span class="font-13 text-muted">e.g "#.##0,00"</span>
                                </div>  --}}

                                <button class="btn btn-primary" type="submit" id="save_beneficiary">Save Beneficiary</button>
                            </form>
                        </div> <!-- end col -->


                        <div class="col-md-6">
                            <img src="{{ asset('assets/images/Receipt.png') }}" class="img-fluid" alt="" >
                       </div> <!-- end col -->



                    </div>
                    <!-- end row -->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){

            {{--  $("#save_beneficiary").click(function(e) {

                e.preventDefault()
                $("#transaction_summary").hide()
                $("#transaction_form").show()
                var selected = $(".custom-select option:selected").text();
                  console.log(selected);
                if (selected == "DSTV"){
                    $("#payment_mode").val("")
                }

            })  --}}

            $(".custom-select").change(function(){
                var selected = $(".custom-select option:selected").text();
                console.log(selected);
                {{--  $("#payment_mode").text("Hello");  --}}

                if (selected == "DSTV" ){
                    $("#payment_mode").text("Enter Card Number");
                    {{--  alert(this);  --}}
                    {{--  alert($(this).attr("id"));  --}}

                }
            });

        });
    </script>



@endsection
