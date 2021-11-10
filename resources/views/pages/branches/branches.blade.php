@extends('layouts.app')

@section('content')

    @include('snippets.top_navbar', ['page_title' => 'BRANCHES'])




    <div class="container">

        <br><br><br><br>

        <div class="card">
            <div class="card-body">


                <div class="row">
                    <div class="col-md-5">
                        <div class="col-12 ">
                            <form class="search-bar form-inline" autocomplete="off" aria-autocomplete="off">
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="mdi mdi-magnify"></span>
                                </div>
                            </form>
                        </div>
                        <br>

                        <div class="col-12 ">

                            <div class="table-responsive" style="height: 420px;">

                                <div class="text-center" id="branches_info_loader">
                                    <div class="spinner-border avatar-lg" role="status"></div>
                                </div>

                                <div class="text-center" id="branches_info_retry_btn">
                                    <button class="btn btn-sm btn-secondary">retry</button>
                                </div>


                                <table class="table table-centered table-nowrap mb-0">
                                    <tbody id="branches_display">



                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>



                    </div> <!-- end col -->

                    <div class="col-md-7">
                        <img src="{{ asset('assets/images/map.jpg') }}" class="img-fluid" alt="">
                    </div> <!-- end col -->
                </div>
                <!-- end row -->


            </div>
        </div>


        <br>



    </div>
    <!-- end row -->


@endsection





@section('scripts')
    <script>
        $("#branches_info_display").hide();
        $("#branches_info_retry_btn").hide();

        function get_branches() {
            $.ajax({
                type: 'GET',
                url: 'get-branches-api',
                datatype: "application/json",
                success: function(response) {
                    console.log(response.data);
                    let data = response.data

                    if (response.responseCode == '000') {

                        let data = response.data;


                        $.each(data, function(index) {
                            $('#branches_display').append(`

                    <tr data-value='${data[index]}'>
                        <td style="width: 10px;">
                            <div class="avatar-sm rounded bg-soft-info">
                                <i class="dripicons-map font-12 avatar-title text-info"></i>
                            </div>
                        </td>
                        <td>
                            <a href="ecommerce-product-detail.html"
                                class="text-body font-weight-semibold">${data[index].branchDescription}</a>
                            <small class="d-block">0302720885</small>
                            <small class="d-block">8:00-16:00 Mon-Fri</small>
                        </td>

                    </tr>

                    `)


                        });



                        $("#branches_info_loader").hide();
                        $("#branches_info_retry_btn").hide();
                        $("#branches_info_display").show();


                    } else {
                        $("#branches_info_loader").hide();
                        $("#branches_info_display").hide();
                        $("#branches_info_retry_btn").show();
                    }


                },
                error: function(xhr, status, error) {

                        setTimeout(function() {
                            get_branches()
                        }, $.ajaxSetup().retryAfter)
                    }

            })
        };

        $(document).ready(function() {

            setTimeout(function() {
                get_branches();
            }, 2000);
        })
    </script>

@endsection
