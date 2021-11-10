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
    <link rel="shortcut icon" href="{{ asset('assets/images/slcb_favicon.PNG') }}">

    <style>
        .btn-primary {
            color: #fff;
            background-color: #e54e5e;
            border-color: #e54e5e;

        }

        .btn-primary:hover {

            background-color: #f3d6d9;
            border-color: #e54e5e;

        }

    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        $.ajaxSetup({
            timeout: 3000,
            retryAfter: 5000
        });
    </script>
    @include('snippets.style')
    @include('snippets.script')


</head>

<body class="loading auth-fluid-pages pb-0"
    style="background-image: url('{{ asset('assets/images/beautiful_gif.gif') }}');background-size: cover;background-repeat: no-repeat;">


    @yield('content')


    @yield('scripts')
</body>

</html>
