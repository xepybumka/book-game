<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="xepybumka" content="">
    <title>Game book test</title>
    <link rel="icon" href="/icons/icons8-bookmark-80.png" type="image/x-icon">

    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <script src="/js/jquery-3.6.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/scripts.js"></script>
</head>
<body>
<div class="container-fluid">
    @yield ('header')
    <div class="float-right sidebar-button-block">
        @yield('sidebar')
    </div>
    @yield('content')
</div>
</body>
</html>
