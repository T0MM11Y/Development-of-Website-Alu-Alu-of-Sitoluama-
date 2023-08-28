<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Alu - Alu of Sitoluama</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


    <link href="{{ asset('backend/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}"
        rel="stylesheet">

    <!-- App Css-->
    <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link href='{{ asset('front/assets/css/general91ac.css') }}' type='text/css' media='all' />

    <style>
        .jdlalu {
            color: #6c757d;
            padding-bottom: 1.5em;
            text-align: center;
            font-weight: bold;
        }

        .onlyalu {
            width: 100%;
            height: 45px;
            padding: 12px;
            border-radius: 12px;
            border: 1.5px solid lightgrey;
            outline: none;
            transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);
            box-shadow: 0px 0px 20px -18px;

        }

        .onlyalu:active {
            transform: scale(0.95);
        }

        .onlyalu:focus {
            border: 2px solid grey;
        }

        .onlyalu2:active {
            transform: scale(0.95);
        }

        .onlyalu2:focus {
            border: 2px solid grey;
        }


        .onlyalu2 {
            width: 100%;
            height: 150px;
            padding: 12px;
            border-radius: 12px;
            border: 1.5px solid lightgrey;
            outline: none;
            transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);
            box-shadow: 0px 0px 20px -18px;

        }

        .onlyalu:hover {
            border: 2px solid lightgrey;
            box-shadow: 0px 0px 20px -17px;
        }

        .custom-select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            height: 37px;
            padding: 10px 38px 10px 16px;
            background: #fff url("select-arrows.svg") no-repeat right 12px center;
            background-size: 7px;
            transition: border-color .1s ease-in-out, box-shadow .1s ease-in-out;
            border: 1px solid #ddd;
            margin-top: 8px;
            border-radius: 3px;
        }

        .custom-select:hover {
            border: 1px solid #999;
        }

        .custom-select:focus {
            border: 1px solid #999;
            box-shadow: 0 3px 5px 0 rgba(0, 0, 0, .2);
            outline: none;
        }

        /* remove default arrow in IE */
        select::-ms-expand {
            display: none;
        }

        h1 {
            font-family: Merriweather, serif;
        }

        a {
            color: #333;
            font-weight: 700;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .custom-select {
            font-family: "Source Sans Pro", sans-serif;
            font-size: 0.8rem;
        }

        button {
            color: black;
            text-decoration: none;
            cursor: pointer;
            outline: none;
            border: none;
            background: transparent;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .get-started-btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .ctn {
            display: flex;
            justify-content: flex-end;
        }

        .form {

            --input-bg: whitesmoke;
            /*  background of input */
            --padding: 1.5em;
            --rotate: 80deg;
            /*  rotation degree of input*/
            --gap: 2em;
            /*  gap of items in input */
            --icon-change-color: #15A986;
            /*  when rotating changed icon color */
            --height: 40px;
            /*  height */
            width: 100%;
            padding-inline-end: 1em;
            /*  change this for padding in the end of input */
            background: var(--input-bg);
            position: relative;
            border-radius: 4px;

        }

        .form label {
            display: flex;
            align-items: center;
            width: 100%;
            height: var(--height);
        }

        .form input {
            width: 100%;
            padding-inline-start: calc(var(--padding) + var(--gap));
            outline: none;
            background: none;
            border: 0;
        }

        /* style for both icons -- search,close */
        .form svg {
            /* display: block; */
            color: #111;
            transition: 0.3s cubic-bezier(.4, 0, .2, 1);
            position: absolute;
            height: 18px;
        }

        /* search icon */
        .icon {
            position: absolute;
            left: var(--padding);
            transition: 0.3s cubic-bezier(.4, 0, .2, 1);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* arrow-icon*/
        .swap-off {
            transform: rotate(-80deg);
            opacity: 0;
            visibility: hidden;
        }

        /* close button */
        .close-btn {
            /* removing default bg of button */
            background: none;
            border: none;
            right: calc(var(--padding) - var(--gap));
            box-sizing: border-box;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #111;
            padding: 0.1em;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            transition: 0.3s;
            opacity: 0;
            transform: scale(0);
            visibility: hidden;
        }

        .form input:focus~.icon {
            transform: rotate(var(--rotate)) scale(1.3);
        }

        .form input:focus~.icon .swap-off {
            opacity: 1;
            transform: rotate(-80deg);
            visibility: visible;
            color: var(--icon-change-color);
        }

        .form input:focus~.icon .swap-on {
            opacity: 0;
            visibility: visible;
        }

        .form input:valid~.icon {
            transform: scale(1.3) rotate(var(--rotate))
        }

        .form input:valid~.icon .swap-off {
            opacity: 1;
            visibility: visible;
            color: var(--icon-change-color);
        }

        .form input:valid~.icon .swap-on {
            opacity: 0;
            visibility: visible;
        }

        .form input:valid~.close-btn {
            opacity: 1;
            visibility: visible;
            transform: scale(1);
            transition: 0s;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--Modal -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- Favicons -->
    <link href="{{ asset('front/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('front/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('front/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/aos/aos.css" rel="stylesheet') }}">
    <link href="{{ asset('front/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('front/assets/css/style.css') }}" rel="stylesheet">
    <style>
        .form-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-controllogin {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px;
            width: 100%;
        }

        .text-center {
            text-align: center;
        }

        .mt-3 {
            margin-top: 15px;
        }

        .pt-1 {
            padding-top: 5px;
        }

        .custom-title {
            color: var(--font-color);
            font-weight: 900;
            font-size: 17px;
            margin-bottom: 25px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-info {
            background-color: #17a2b8;
            color: #fff;
        }

        .btn-info:hover {
            background-color: #138496;
            color: #fff;
        }

        .text-muted {
            color: #6c757d;
        }

        .mt-2 {
            margin-top: 10px;
        }
    </style>

</head>

<body>

    <!-- ======= Header ======= -->
    @include('front.body.header')
    <!-- End Header -->


    @include('front.partials.auth')


    <main id="main" style="padding-top: 30px">
        @yield('user_content')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('front.body.footer')
    <!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->

    <script src="{{ asset('front/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('front/assets/js/main.js') }}"></script>

    <!-- Import library jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Import library Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <script src="{{ asset('backend/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>



</body>

</html>
