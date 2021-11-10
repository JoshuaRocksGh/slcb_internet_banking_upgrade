@extends('layouts.app')

@section('content')


    <div class="auth-fluid">
        <!--Auth fluid left content -->
        <div class="auth-fluid-form-box"
            style="background-image: url({{ asset('assets/images/login-bg.jpg') }});background-repeat: no-repeat;background-size: cover;">
            <div class="align-items-center d-flex h-100">
                <div class="card-body">

                    <!-- Logo -->
                    <div class="auth-brand text-center text-lg-left">
                        <div class="auth-logo">
                            <a href="index.html" class="logo logo-dark text-center">
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/images/' . env('APPLICATION_INFO_LOGO_DARK')) }} " alt=""
                                        height="40">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light text-center">
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/images/' . env('APPLICATION_INFO_LOGO_DARK')) }} " alt=""
                                        height="40">
                                </span>
                            </a>
                        </div>
                    </div>

                    <!-- title-->
                    <h4 class="mt-0"><b>Change Password</b></h4>
                    <p class="text-muted mb-1"></p>
                    <br>
                    <!-- form -->
                    <form action="#" autocomplete="off" aria-autocomplete="off" id="change-password-form">

                        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show"
                            role="alert" id="failed_login">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                {{-- <span aria-hidden="true">&times;</span> --}}
                            </button>
                            <i class="mdi mdi-block-helper mr-2"></i>
                            <span id="error_message"></span>
                        </div>

                        <div class="form-group">
                            <label for="new_password">Security Question</label>
                            <div class="input-group input-group-merge">
                                <select class="form-control" id="security_questions" required>
                                    <option value="">Select Security Queston</option>
                                </select>

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="security_answer">Security Answer</label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="security_answer" class="form-control" placeholder="Security Answer"
                                    required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="security_answer">New User ID</label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="user_id" class="form-control" placeholder="User Id" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="new_pin">New Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="new_password" class="form-control" placeholder="New Password"
                                    required>
                                <div class="input-group-append" data-password="false">
                                    <div class="input-group-text">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="new_pin">Confirm Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="confirm_new_password" class="form-control"
                                    placeholder="Confirm Password" required>
                                <div class="input-group-append" data-password="false">
                                    <div class="input-group-text">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-primary btn-block" type="submit" id="submit"><span
                                    id="set_password">Change
                                    Password</span>
                                <span class="spinner-border spinner-border-sm mr-1" role="status" id="spinner"
                                    aria-hidden="true"></span>
                                <span id="spinner-text">Loading...</span>
                            </button>

                            {{-- <button class="btn btn-primary btn-block" type="submit">Log In </button> --}}
                        </div>


                    </form>
                    <!-- end form-->

                    <!-- Footer-->
                    {{-- <footer class="footer footer-alt">
                            <p class="text-muted">Dont have an account? <a href="auth-register-2.html" class="text-muted ml-1"><b>Sign Up</b></a></p>
                        </footer> --}}

                </div> <!-- end .card-body -->
            </div> <!-- end .align-items-center.d-flex.h-100-->
        </div>
        <!-- end auth-fluid-form-box-->

        <!-- Auth fluid right content -->
        <div class="auth-fluid-right"
            style="background-image:  linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)),url({{ asset('assets/images/meeting.jpg') }});background-repeat: no-repeat;background-size: cover;">
            <div class="auth-user-testimonial">
            </div> <!-- end auth-user-testimonial-->
        </div>
        <!-- end Auth fluid right content -->


    </div>
    <!-- end auth-fluid-->


@endsection


@section('scripts')
    <script>
        function get_security_question() {
            $.ajax({
                type: 'GET',
                url: 'get-security-question-api',
                datatype: "application/json",
                success: function(response) {
                    console.log(response.data);
                    let data = response.data
                    $.each(data, function(index) {

                        $('#security_questions').append($('<option>', {
                            value: data[index].Q_CODE
                        }).text(data[index].Q_DESCRIPTION));

                    });

                },

            })
        };





        $(document).ready(function() {

            setTimeout(function() {
                get_security_question();
            }, 2000);

            function hide_alert() {
                setTimeout(function() {
                    $('#failed_login').hide()
                }, 3000)
            }

            $('#failed_login').hide(),
                $('#spinner').hide(),
                $('#spinner-text').hide(),



                $('#change-password-form').submit(function(e) {
                    e.preventDefault();
                    var security_question = $("#security_questions").val();
                    var security_answer = $('#security_answer').val();
                    var new_password = $('#new_password').val();
                    var confirm_new_password = $('#confirm_new_password').val();
                    var user_id = $("#user_id").val()
                    $('#spinner').show(),
                        $('#spinner-text').show(),

                        $('#set_password').hide(),
                        $('#submit').attr('disabled', true);

                    //var show_error = $('#failed_login').show();

                    if (new_password == confirm_new_password) {
                        $.ajax({
                            "type": "POST",
                            "url": "post-change-password",
                            "datatype": "application/json",
                            data: {
                                "security_question": security_question,
                                "security_answer": security_answer,
                                "new_password": new_password,
                                "confirm_new_password": confirm_new_password,
                                "user_id": user_id
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },

                            success: function(response) {
                                console.log(response);
                                var res = response.data
                                $('#submit').attr('disabled', false);

                                if (response.responseCode == "000") {

                                    window.location = 'home';

                                } else {
                                    $('#spinner').hide()
                                    $('#spinner-text').hide()

                                    $('#set_password').show()
                                    $('#error_message').text(response.message)
                                    $('#failed_login').toggle('500')
                                    $('#submit').attr('disabled', false);
                                    hide_alert()

                                }
                            }
                        })
                    } else {
                        $('#spinner').hide()
                        $('#spinner-text').hide()

                        $('#set_password').show()
                        $('#error_message').text("Passwords do not match")
                        $('#failed_login').toggle('500')
                        $('#submit').attr('disabled', false);
                        hide_alert()
                    }

                })


        })
    </script>
@endsection
