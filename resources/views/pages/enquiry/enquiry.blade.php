@extends('layouts.app')

@section('content')

    @include('snippets.top_navbar', ['page_title' => 'Enquiry'])



    <div class="container">

        <br> <br> <br>

        <br>
        <div class=" ">

            <div class="row ">

                <div class="col-md-2">
                    <a href="{{ url()->previous() }}" type="button"
                        class="btn btn-soft-blue waves-effect waves-light float-left"><i class="fe-arrow-left"></i>&nbsp;Go
                        Back</a>
                </div>

                <div class="col-md-8 card card-body">




                    <div class="row">
                        <div class="col-md-2"> </div>

                        <div class="col-md-8">
                            <div class="___class_+?8___">


                                <ul class="nav nav-tabs nav-bordered nav-justified">
                                    <li class="nav-item">
                                        <a href="#home-b2" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                            Enquiry
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile-b2" data-toggle="tab" aria-expanded="true" class="nav-link ">
                                            Complaint
                                        </a>
                                    </li>

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home-b2">
                                        <p>
                                        <h4 class="text-primary text-center">Send us an enquiry</h4>
                                        <hr>
                                        </p>

                                        <p>
                                        <div class="___class_+?17___">
                                            <form autocomplete="off" aria-autocomplete="off">

                                                <div class="form-group">
                                                    <label for="simpleinput">Type Of Enquiry</label>
                                                    <select class="custom-select ">
                                                        <option selected>-- Select Enquiry</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="example-textarea">Message</label>
                                                    <textarea class="form-control" id="example-textarea"
                                                        rows="5"></textarea>
                                                </div>


                                                <div class="form-group">
                                                    <label for="simpleinput">Prefered Contact</label>
                                                    <input type="text" id="simpleinput" class="form-control">
                                                </div>


                                                <div class="form-group">
                                                    <label for="simpleinput">Prefered Contact</label>
                                                    <input type="text" id="simpleinput" class="form-control">
                                                </div>


                                                <div class="form-group">
                                                    <label for="simpleinput">Prefered Date</label>
                                                    <input type="date" id="simpleinput" class="form-control">
                                                </div>

                                                <div class="form-group text-center">
                                                    <button class="btn btn-primary btn-rounded" type="button"
                                                        id="next_button">
                                                        &nbsp; Submit &nbsp;</button>
                                                </div>

                                            </form>
                                        </div> <!-- end col -->
                                        </p>

                                    </div>
                                    <div class="tab-pane " id="profile-b2">

                                        <p>
                                        <h4 class="text-primary text-center">Send us a complaint</h4>
                                        <hr>
                                        </p>

                                        <p>
                                        <div class="___class_+?32___">
                                            <form>

                                                <div class="form-group">
                                                    <label for="simpleinput">Type Of Complaint</label>
                                                    <select class="custom-select ">
                                                        <option selected>-- Select Enquiry</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="example-textarea">Message</label>
                                                    <textarea class="form-control" id="example-textarea"
                                                        rows="5"></textarea>
                                                </div>


                                                <div class="form-group">
                                                    <label for="simpleinput">Prefered Contact</label>
                                                    <input type="text" id="simpleinput" class="form-control">
                                                </div>


                                                <div class="form-group">
                                                    <label for="simpleinput">Prefered Contact</label>
                                                    <input type="text" id="simpleinput" class="form-control">
                                                </div>


                                                <div class="form-group">
                                                    <label for="simpleinput">Prefered Date</label>
                                                    <input type="date" id="simpleinput" class="form-control">
                                                </div>

                                                <div class="form-group text-center">
                                                    <button class="btn btn-primary btn-rounded" type="button"
                                                        id="next_button">
                                                        &nbsp; Submit &nbsp;</button>
                                                </div>

                                            </form>
                                        </div> <!-- end col -->
                                        </p>


                                    </div>

                                </div>
                            </div> <!-- end card-box-->
                        </div> <!-- end col -->

                        <div class="col-md-2"> </div>
                    </div>


                </div>

                <div class="col-md-2"></div>

            </div>

        </div>

    </div>



@endsection
