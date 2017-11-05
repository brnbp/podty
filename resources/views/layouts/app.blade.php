<!DOCTYPE html>
<html lang="en" class="app bg-dark">
<head>
    <meta charset="utf-8">
    <meta name="theme-color" content="#232c32">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    @yield('meta')

    <title>@yield('title', 'Podty')</title>

    <link rel="shortcut icon" type="image/png" href="/img/favicon.png"/>
    <script src="/js/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="/css/simple-line-icons.css" type="text/css" />
    <link rel="stylesheet" href="/css/font.css" type="text/css" />
    <link rel="stylesheet" href="/css/app.css" type="text/css" />

    @yield('head')
</head>
<body class="bg-dark body">
    @yield('content')

    @yield('footer')
    <script async src="/js/app.js"></script>
    <script async src="/js/bootstrap.js"></script>
    @yield('footer-scripts')
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-104119175-1', 'auto');
        ga('send', 'pageview');

    </script>
</body>
</html>
