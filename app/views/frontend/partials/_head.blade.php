{{-- Basic --}}
<meta charset="utf-8">
<title>@yield('title')</title>
<meta name="description" content="@yield('meta-description')">
<meta name="author" content="{{ TCN('name') }}">
@yield('metas')

{{-- Favicons --}}
<link rel="shortcut icon" type='image/x-icon' href="{{ IMG('favicon/favicon.ico') }}">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('apple-touch-icon-144x144-precomposed.png') }}">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('apple-touch-icon-114x114-precomposed.png') }}">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('apple-touch-icon-72x72-precomposed.png') }}">
<link rel="apple-touch-icon-precomposed" href="{{ asset('apple-touch-icon-precomposed.png') }}">

{{-- Mobile Metas --}}
<meta name="viewport" content="width=device-width, initial-scale=1.0">

{{-- Bootstrap CSS --}}
<link rel="stylesheet" href="{{ ASSETS('bootstrap/css/bootstrap.min.css') }}" />

{{-- AWESOME and ICOMOON fonts --}}
<link rel="stylesheet" href="{{ FONT('awesome/css/font-awesome.min.css') }}">

<link rel="stylesheet" href="{{ FONT('fonts.css') }}">

{{-- Page Specific CSS --}}
@section('stylesheets')
	
@show