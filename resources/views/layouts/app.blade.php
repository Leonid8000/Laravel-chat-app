<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   @include('layouts.head')
</head>
<body>
    <div id="app">

        @include('layouts.nav')

        <main>
            @yield('content')
        </main>
    </div>

@include('layouts.footer')
</body>
</html>
