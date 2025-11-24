<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Book game</title>
        <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet"/>
    </head>
    <body class="book-body">
        <header class="header">
            @yield('header')
        </header>
        <main class="main">
            @yield('content')
        </main>
        <footer class="footer">
            @yield('footer')
        </footer>
        <script src="{{ URL::asset('assets/js/jquery-3.7.1.js') }}"></script>
        @yield('scripts')
    </body>
</html>
