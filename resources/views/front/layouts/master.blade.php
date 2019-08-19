<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title')</title>

    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/plugins/fontawesome-free-5.9.0/css/all.min.css">
    @yield('styles')
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/responsive.css">
</head>
<body>
<div class="svg-block">
    <svg viewBox="0 0 40 40" id="icon-share" xmlns="http://www.w3.org/2000/svg">
        <path d="M19.13 8.876v15.039h1.75V8.92l3.01 3.054 1.246-1.229L21.13 6.68a1.43 1.43 0 0 0-1.127-.555 1.347 1.347 0 0 0-1.131.543l-4.007 3.98 1.233 1.24z">
        </path>
        <path d="M27.937 14.115h-3.538v1.75h3.538a.233.233 0 0 1 .239.227v13.806a.233.233 0 0 1-.239.227H12.063a.233.233 0 0 1-.239-.227V16.092a.233.233 0 0 1 .239-.227h3.521v-1.75h-3.521a1.985 1.985 0 0 0-1.989 1.977v13.806a1.985 1.985 0 0 0 1.989 1.977h15.874a1.985 1.985 0 0 0 1.989-1.977V16.092a1.985 1.985 0 0 0-1.989-1.977z"></path>
    </svg>
    <svg viewBox="0 0 40 40" id="header_icon-search" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd"
              d="M34.836 18.13c0 7.18-5.82 13-13 13a12.94 12.94 0 0 1-7.546-2.413l-.217.22L7.708 35.3c-.33.329-.494.493-.665.592a1.5 1.5 0 0 1-1.5 0c-.17-.099-.335-.263-.664-.592-.329-.329-.493-.493-.592-.664a1.5 1.5 0 0 1 0-1.5c.099-.171.263-.336.592-.664l6.364-6.364.186-.185a12.942 12.942 0 0 1-2.594-7.793c0-7.18 5.82-13 13-13s13 5.82 13 13zm-4.044-.096a9.148 9.148 0 1 1-18.297 0 9.148 9.148 0 0 1 18.297 0z">
        </path>
    </svg>
    @yield('svg')
</div>

<div class="super-container" id="app">

    @yield('header')

    @yield('content')

    @yield('footer')

    @include('front.layouts.utilites')

</div>

<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
@yield('scripts')
<script src="/js/main.js"></script>

</body>
</html>
