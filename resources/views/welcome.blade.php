<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Calistoga&display=swap" rel="stylesheet">
        {{-- Style --}}
        <link href="{{ asset('css/main-page.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}" class="home-link">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="home-link">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="home-link">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                   <h2 class="title-change">
                       @include('layouts.title')
                   </h2>
                </div>
            </div>
        </div>
    </body>
</html>
