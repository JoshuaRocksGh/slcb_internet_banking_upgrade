@extends('layouts.master')

@section('content')


<legend></legend>
    <div class="card container-fluid">

        <div class="card-body">

            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-primary">List Of Payments</h4>
                        <hr>
                </div>
            </div>

            <div class="row">
                <div class="col-md-1"></div>
                    <div class="col-md-10">
                    <div class="row">



                            <div class="col-md-4 col-xl-12 text-center">
                                <a href="{{ url('mobile-money') }}">
                                    <div class="p-2 ">
                                        <div class="">
                                            <img src="{{ asset('assets/images/payment-icon-images/receive.png') }}" class="img-fluid" alt="user-img" style="height: 70px;"/>
                                        </div>

                                        <h3 class="text-primary"><span >Mobile Money</span></h3>

                                    </div>
                                </a>
                            </div>




                        <div class="col-md-4 col-xl-3 text-center">
                            <div class="p-2 ">
                                <div class="">
                                    <img src="{{ asset('assets/images/payment-icon-images/phone.png') }}" class="img-fluid" alt="user-img" style="height: 70px;"/>
                                </div>

                                <h3 class="text-primary"><span >Airtime & Data</span></h3>

                            </div>
                        </div>


                        <div class="col-md-4 col-xl-3 text-center">
                            <div class="p-2 ">
                                <div class="">
                                    <img src="{{ asset('assets/images/payment-icon-images/house.png') }}" class="img-fluid" alt="user-img" style="height: 70px;"/>
                                </div>

                                <h3 class="text-primary"><span >Utilities & More</span></h3>

                            </div>
                        </div>



                        <div class="col-md-4 col-xl-3 text-center">
                            <div class="p-2 ">
                                <div class="">
                                    <img src="{{ asset('assets/images/payment-icon-images/graduation-hat.png') }}" class="img-fluid" alt="user-img" style="height: 70px;"/>
                                </div>

                                <h3 class="text-primary"><span >School & Educational</span></h3>

                            </div>
                        </div>


                        <div class="col-md-4 col-xl-3 text-center">
                            <div class="p-2 ">
                                <div class="">
                                    <img src="{{ asset('assets/images/payment-icon-images/plane.png') }}" class="img-fluid" alt="user-img" style="height: 70px;"/>
                                </div>

                                <h3 class="text-primary"><span >Transport & Travel</h3>

                            </div>
                        </div>


                        <div class="col-md-4 col-xl-3 text-center">
                            <div class="p-2 ">
                                <div class="">
                                    <img src="{{ asset('assets/images/payment-icon-images/church.png') }}" class="img-fluid" alt="user-img" style="height: 70px;"/>
                                </div>

                                <h3 class="text-primary"><span >Church & Religion</span></h3>

                            </div>
                        </div>


                        <div class="col-md-4 col-xl-3 text-center">
                            <div class="p-2 ">
                                <div class="">
                                    <img src="{{ asset('assets/images/payment-icon-images/hotel.png') }}" class="img-fluid" alt="user-img" style="height: 70px;"/>
                                </div>

                                <h3 class="text-primary"><span >Hotel & Restorants</span></h3>

                            </div>
                        </div>



                        <div class="col-md-4 col-xl-3 text-center">
                            <div class="p-2 ">
                                <div class="">
                                    <img src="{{ asset('assets/images/payment-icon-images/coin.png') }}" class="img-fluid" alt="user-img" style="height: 70px;"/>
                                </div>

                                <h3 class="text-primary"><span >Donations & NGOs</span></h3>

                            </div>
                        </div>



                        <div class="col-md-4 col-xl-3 text-center">
                            <div class="p-2 ">
                                <div class="">
                                    <img src="{{ asset('assets/images/payment-icon-images/hospital-buildings.png') }}" class="img-fluid" alt="user-img" style="height: 70px;"/>
                                </div>

                                <h3 class="text-primary"><span >Hospital & Mediccal</span></h3>

                            </div>
                        </div>



                    </div>
                    </div>
                    <div class="col-md-1"></div>
        </div>

            </div>


        </div>
    </div>



@endsection
