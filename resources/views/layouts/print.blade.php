<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8" />
    <title>SLCB BANKING</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Internet Banking Application" name="Internet Banking Portal for Sierra Leone Commercial Bank." />
    <meta content="Banking Application" name="Union Systems Global" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/slcb_favicon.png') }}">



    @include('snippets.style')

    <script src="https://code.jquery.com/jquery-3.5.1.js">
        $.ajaxSetup({
            timeout: 3000,
            retryAfter: 5000
        });
    </script>

    @yield('styles')


</head>

<body style="zoom: 0.9; background-color: white;">

    <!-- Pre-loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner">Loading...</div>
        </div>
    </div>
    <!-- End Preloader-->

    <!-- Begin page -->

    <div class="container-fluid">
        <div class="row">



            <div class="col-md-12">
                <div class="content" style="zoom: 0.9 ;">
                    @yield('content')
                </div>

            </div>



        </div>
    </div>

    @include('snippets.script')


    @yield('scripts')


</body>


</html>
