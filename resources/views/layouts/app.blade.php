<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>{{ config('app.name', 'Tierbestandsverwaltung') }}</title>
    </head>
    <body>
        @include('inc.nav')

        <div class="container-xl pt-4 pb-4">
            @include('inc.messages')
            @yield('content')
        </div>

    </body>
</html>
