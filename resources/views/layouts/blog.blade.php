<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#f3f5f2">
    <title>@yield('title', 'Enriquez Journal')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Newsreader:ital,opsz,wght@0,6..72,400;0,6..72,500;1,6..72,400&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="blog-shell">
    <header class="site-header">
        <a class="wordmark" href="{{ route('posts.index') }}" aria-label="Enriquez Journal home">
            <span class="wordmark-symbol" aria-hidden="true">e</span>
            <span class="wordmark-text">ENRIQUEZ<small>THE JOURNAL</small></span>
        </a>
        <nav class="site-nav" aria-label="Main navigation">
            <a href="{{ route('posts.index') }}">Stories</a>
            <a class="nav-cta" href="{{ route('posts.create') }}">Write a post <span aria-hidden="true">+</span></a>
        </nav>
    </header>

    <main class="site-main">
        @yield('content')
    </main>

    <footer class="site-footer">
        <span>ENRIQUEZ JOURNAL</span>
        <span>Personal stories, thoughtfully kept.</span>
    </footer>
</body>
</html>