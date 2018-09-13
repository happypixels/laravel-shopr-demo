<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="stripe-key" content="{{config('shopr.gateways.stripe.publishable_key')}}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <title>{{ config('app.name', 'Laravel') }}</title>
  </head>
  <body>
    <div id="app">
        @yield('body')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
  </body>
</html>
