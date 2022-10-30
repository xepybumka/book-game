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
    @include('main.content.header')
    <div class="float-right sidebar-button-block">
        @include('main.content.sidebar')
    </div>
    <div class="float-left w-80">
        @include('main.content.content', ['title'=>$contentTitle, 'text'=>$contentText])
        @include('main.content.tutorial', ['title'=>$tutorialTitle, 'content'=>$tutorialContent])
    </div>
</div>
</body>
</html>
