<!DOCTYPE html>
<html class="no-js" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="description" content="{{ config('app.name') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="{{ config('app.name') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/e-test/css/app.css') }}">

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="{{ asset('vendor/e-test/img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('vendor/e-test/img/favicon.png') }}">

    <script src="{{ asset('vendor/e-test/js/vendor/modernizr.js') }}"></script>

</head>
<body class="video-bg">

<!-- Preloader -->
<div class="preloader flex flex-middle flex-center">
    <div class="wrapper">
        <div class="loader"></div>
    </div>
</div>

<!-- Navbar -->
<nav class="navbar navbar-burger navbar-fixed-top is-transparent" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('index') }}">
                <img src="{{ asset('vendor/e-test/img/logo.png') }}" alt="{{ config('app.name') }}" title="{{ config('app.name') }}" style="height: 40px">
            </a>
            <span class="sr-only">Toggle navigation</span>
            <button class="icon icon-menu burger-menu"></button>
        </div>
        <div class="menu-wrapper">
            <div class="overlay-menu flex flex-middle">
                <ul class="navigation" role="menubar">
                    <li role="menuitem"><a href="{{ route('index') }}">Home</a></li>
                    <li role="menuitem"><a href="{{ route('about') }}">About</a></li>
                    <li role="menuitem"><a href="{{ route('contact') }}">Contact</a></li>
                    <li role="menuitem"><a href="{{ route('job-application.index') }}">Apply for a Job</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
