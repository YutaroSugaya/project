<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js" defer></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
    <header>
        @include('header')
    </header>
    <br>
    <div class="container">
    @yield('content')
    </div>
    </div>
    <footer class="footer bg-dark  fixed-bottom">
        @include('footer')
    </footer>
</body>
</html>
