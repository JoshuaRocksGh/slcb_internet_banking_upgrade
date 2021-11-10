@extends('layouts.master')

@section('content')



        <div class="container-fluid">
            <br><br>
            <div class="row">
                <div class="col-md-3" >
                    <div class="card text-white bg-warning text-xs-center" >
                    <a href="#" >
                        <div class="card-body">
                            <h3 class="text-white" >Mobile Money</h3>
                            {{--  <i class="mdi mdi-cart-outline text-white" style="font-size: 200px"></i>  --}}
                            {{--  <i class="dripicons-export text-white" style="font-size: 100px"></i>  --}}
                            {{--  <i data-feather="refresh-cw" class="icons-xxl card-icon"></i>  --}}
                            <i class="mdi mdi-cellphone-message mdi-36px card-icon"></i>

                            <blockquote class="card-bodyquote">
                                <p class="p-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                    erat a ante.</p>
                                <footer class="p-text">Someone famous in <cite title="Source Title">Source Title</cite>
                                </footer>
                            </blockquote>
                        </div>
                    </a>
                    </div> <!-- end card-box-->
                </div> <!-- end col -->


            <div class="col-md-3" >
                <div class="card text-white bg-danger text-xs-center" >
                <a href="#">
                    <div class="card-body">
                        <h3 class="text-white" >Airtime</h3>
                        {{--  <i class="mdi mdi-cart-outline text-white" style="font-size: 200px"></i>  --}}
                        {{--  <i class="dripicons-export text-white" style="font-size: 100px"></i>  --}}
                        {{--  <i data-feather="refresh-cw" class="icons-xxl card-icon"></i>  --}}
                        <i class="mdi mdi-cellphone-arrow-down mdi-36px card-icon"></i>

                        <blockquote class="card-bodyquote">
                            <p class="p-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                erat a ante.</p>
                            <footer class="p-text">Someone famous in <cite title="Source Title">Source Title</cite>
                            </footer>
                        </blockquote>
                    </div>
                </a>
                </div> <!-- end card-box-->
            </div> <!-- end col -->



            <div class="col-md-3">
                <div class="card text-white bg-success text-xs-center">
                    <a href="#">
                    <div class="card-body">
                        <h3 class="text-white">Utility Payment</h3>
                        {{--  <i class="fas fa-external-link-alt" style="font-size: 100px"></i>  --}}
                        {{--  <i data-feather="feather-repeat" class="icons-xxl"></i>  --}}
                        {{--  <i data-feather="repeat" class="icons-xxl card-icon"></i>  --}}
                        <i class="mdi mdi-home-heart mdi-36px card-icon"></i>


                        <blockquote class="card-bodyquote">
                            <p class="p-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                erat a ante.</p>
                            <footer class="p-text">Someone famous in <cite title="Source Title">Source Title</cite>
                            </footer>
                        </blockquote>
                    </div>
                </div> <!-- end card-box-->
                </a>
            </div> <!-- end col -->

            </div>
        </div>



@endsection


