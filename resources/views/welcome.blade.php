<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name')}} </title>
    <link rel="icon" type="image/x-icon" href="{{ asset("src/assets/img/favicon.ico") }}"/>
    <link href="{{ asset("layouts/vertical-light-menu/css/light/loader.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("layouts/vertical-light-menu/css/dark/loader.css") }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset("layouts/vertical-light-menu/loader.js") }}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset("src/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset("layouts/vertical-light-menu/css/light/plugins.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("src/assets/css/light/authentication/auth-cover.css") }}" rel="stylesheet" type="text/css" />
    
    <link href="{{ asset("layouts/vertical-light-menu/css/dark/plugins.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("src/assets/css/dark/authentication/auth-cover.css") }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <style>
        body.dark .theme-logo.dark-element {
            display: inline-block;
        }
        .theme-logo.dark-element {
            display: none;
        }
        body.dark .theme-logo.light-element {
            display: none;
        }
        .theme-logo.light-element {
            display: inline-block;
        }
    </style>

</head>
<body class="maintanence text-center">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->
    
    <div class="container maintanence-content">
        <div class="">
            <div class="maintanence-hero-img">
                <a href="#" class="justify-content-center">
                    <img alt="logo" src="{{ asset("src/assets/img/logo.svg") }}" class="dark-element theme-logo w-25 p-3">
                    <img alt="logo" src="{{ asset("src/assets/img/logo2.svg") }}" class="light-element theme-logo w-25 p-3">
                </a>
            </div>
            <h1 class="error-title">Invoice System Managment</h1>
            <p class="error-text">Thank you for visiting us.</p>
            <p class="text">We are currently working on making some improvements <br/>
            <a href="{{ route('login') }}" class="btn btn-dark mt-4">My Account</a>
        </div>
    </div>
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset("src/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</body>
</html>