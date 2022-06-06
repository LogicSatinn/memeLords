<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="{{ asset('favicon_package/favicon.ico')}}" rel="icon" >

    <!-- Basic Page Needs
        ================================================== -->
    <title>{{ config('app.name') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <meta name="description" content="Socialite is - Professional A unique and beautiful collection of UI elements">--}}

{{--    Favicon Files--}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_package/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_package/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_package/favicon-16x16.png')}}">
    <link rel="manifest" href="{{ asset('favicon_package/site.webmanifest')}}">
    <link rel="mask-icon" href="{{ asset('favicon_package/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('assets/css/icons.css')}}">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('assets/css/uikit.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles

</head>
