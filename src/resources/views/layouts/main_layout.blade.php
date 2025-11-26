<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Book game</title>
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
         @vite([
            'public/assets/css/app.css',
            'public/assets/js/app.js'
        ])
        @yield('scripts')
    </body>
</html>
