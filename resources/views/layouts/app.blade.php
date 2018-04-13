<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{!! asset('css/style.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/collages.css') !!}" media="all" rel="stylesheet" type="text/css" />
    {{--<link href="{!! asset('css/table-main.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/table-utl.css') !!}" media="all" rel="stylesheet" type="text/css" />--}}
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
@include('parts.navbar')
<!-- Header -->
<header id="header">
    <div class="intro">
        <div class="container">
            <div class="row">
                <div class="intro-text">
                    <h1>Welcome, <span id="intro_user_name">{{Auth::user()->name}}</span></h1>
                    <p>Education • Quality • Assurance</p>
                    <a href="collages/create" class="btn btn-custom btn-lg page-scroll">Fill Application</a></div>
            </div>
        </div>
    </div>
</header>

@yield('content')

<div id="footer">
    <div class="container text-center">
        <div class="fnav">
            <p>Copyright &copy; 2018 Education Quality Assurence. Designed by <a href="#" rel="nofollow">CIC</a></p>
        </div>
    </div>
</div>

@include('parts.scripts')
</body>
</html>


