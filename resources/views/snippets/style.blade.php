<!-- App favicon -->
<link rel="shortcut icon" href="{{ asset('assets/images/slcb_favicon.png') }}">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<link href="{{ asset('assets/css/bootstrap-purple.min.css') }}" rel="stylesheet" type="text/css"
    id="bs-default-stylesheet" />
<link href="{{ asset('assets/css/app-purple.min.css') }}" rel="stylesheet" type="text/css"
    id="app-default-stylesheet" />
<link href="{{ asset('assets/css/rokel.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
<link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

<style>
    .form-group {
        margin-bottom: 0.4rem !Important;
    }

    .readOnly {
        background-color: #eceff1 !Important;
    }


    .site-shadow {
        box-shadow: 4px 4px 15px rgb(26 35 126 / 20%);
    }

    .site-card {
        background-color: #fff;
        #backdrop-filter: blur(5px);
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        border-radius: 0.25rem;
        margin-bottom: 2rem;
        padding: 2rem;
        min-height: 150px
    }

    /* styles for activate and block card */
    .box {
        border: 1px solid black;
        height: 240px;
        width: 400px;
        margin: 50px auto;
        margin-top: 90px;
        background-color: #0561ad;
        background-size: cover;
        border-radius: 8px;
        box-shadow: 2px 4px 18px 5px;
        color: currentColor;
        opacity: 0.8;
    }

    .box:hover {
        box-shadow: 3px 6px 28px 7px;
    }

    .visa_logo {
        position: absolute;
        left: 65%;
        top: 23%;
    }

    .chip {
        position: absolute;
        left: 24.4%;
        top: 46%;
    }


    .card_digits {
        font-family: kelly slab, cursive;
        color: wheat;
        font-size: 23px;
        position: absolute;
        left: 24.4%;
        top: 60%;
        letter-spacing: 6px;
    }

    .coded {
        font-family: kelly slab, cursive;
        color: wheat;
        font-size: 12px;
        position: absolute;
        left: 10%;
        top: 65%;
        font-weight: normal;
        opacity: 0.2;
    }

    .good_thru {
        width: 10px;
        display: none;
        font-family: kelly slab, cursive;
        color: wheat;
        font-size: 15px;
        position: absolute;
        left: 70%;
        top: 50%;
        font-weight: normal;
        line-height: -10px;
        opacity: 0.3;
    }

    .expiry {
        font-family: kelly slab, cursive;
        color: wheat;
        position: absolute;
        left: 55%;
        top: 73.4%;
        letter-spacing: 2px;

    }

    .card_holder {
        font-family: kelly slab, cursive;
        color: wheat;
        font-weight: normal;
        position: absolute;
        left: 24.4%;
        top: 73%;
        letter-spacing: 3px;
    }

    .mastercard {
        position: absolute;
        left: 67%;
        top: 68%;
    }

    // RECEIPT CSS

    .body-main {
        background: #ffffff;
        border-bottom: 15px solid #1E1F23;
        border-top: 15px solid #1E1F23;
        margin-top: 30px;
        margin-bottom: 30px;
        padding: 40px 30px !important;
        position: relative;
        box-shadow: 0 1px 21px #808080;
        /* font-size: 10px */
    }

    .main thead {
        background: #1E1F23;
        color: #fff
    }

    .img {
        height: 100px;

    }

    .logo {
        align: center
    }

    h2 {
        text-align: center
    }

    .form-center {
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;

    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type='number'] {
        -moz-appearance: textfield;
    }

    option[value=""][disabled] {
        background-color: #dddddd;
        color: #1E1F23
    }

    select:required:invalid {
        background-color: #fffbfb79;
        color: #1E1F23
    }

    .btn-primary {
        background-color: #e54659 !important;
        border-color: #e54659 !important;
        /* height: 3rem; */
    }

    .btn-primary:hover {
        background-color: #e54e5e !important;
        border-color: #e54e5e !important;
        box-shadow: 0 0 0 0.15rem #e54659 !important;
    }

    .btn-primary:focus {
        background-color: #e54e5e !important;
        border-color: #e54e5e !important;
        box-shadow: 0 0 0 0.15rem #e54659 !important;
    }


    .btn-primary:active {
        background-color: #e54e5e !important;
        border-color: #e54e5e !important;
        box-shadow: 0 0 0 0.15rem #e54659 !important;

    }

    .btn-primary:active {
        background-color: #f3d6d9 !important;
        border-color: #f3d6d9 !important;
        box-shadow: 0 0 0 0.15rem #e54659 !important;
    }

    .text-primary {
        color: #e54659 !important;
    }

    a.text-primary:focus,
    a.text-primary:hover {
        color: #e54659 !important;
    }


    .div-card {
        //background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));
        box-shadow: 4px 4px 15px rgb(26 35 126 / 20%);
    }

    .demo {
        font-weight: 500;
        font-size: 36px;
        position: absolute;
        width: 450px;
        left: 50%;
        margin-left: -225px;
        height: 40px;
        top: 50%;
        margin-top: -20px;
    }

    p {
        display: inline-block;
        vertical-align: top;
        margin: 0;
    }

    .word {
        position: absolute;
        width: 220px;
        opacity: 0;
    }

    .wisteria {
        color: #8e44ad;
    }

    .belize {
        color: #2980b9;
    }

    .pomegranate {
        color: #c0392b;
    }

    .green {
        color: #16a085;
    }

    .midnight {
        color: #B89C72;
    }

    .word {
        animation-iteration-count: infinite;
        animation-name: anim;
        animation-duration: 7.5s;
        /*calculate the exact time for looping*/
    }

    .word:nth-child(2) {
        animation-delay: 1.5s;
    }

    .word:nth-child(3) {
        animation-delay: 3s;
    }

    .word:nth-child(4) {
        animation-delay: 4.5s;
    }

    .word:nth-child(5) {
        animation-delay: 6s;
    }

    @keyframes anim {

        0% {
            transform: translateY(100%);
            opacity: 0;
        }

        6.66% {
            transform: translateY(0);
            opacity: 1;
            transition: transform 0.38s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        20% {
            transform: translateY(0);
            opacity: 1;
            transition: transform 0.38s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        46.66% {
            transform: translateY(-100%);
            opacity: 0;
            transition: transform 0.32s cubic-bezier(0.55, 0.055, 0.675, 0.19);
        }

        /*we give long pause after animation is done by this method*/
        100% {
            transform: translateY(-100%);
            opacity: 0;
            transition: transform 0.32s cubic-bezier(0.55, 0.055, 0.675, 0.19);
        }

    }

    #wrapper {
        height: auto;
    }

</style>
