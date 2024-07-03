<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Eszközök listája</title>
    <link rel="stylesheet" href=" {{ asset('style.css') }}">
    <link rel="shortcut icon" href=" {{ asset('style.ico') }} " type="image/x-icon">
</head>
<body>
    <header>
        <img src="{{ asset('logo.png') }}" alt="logo">
        <nav>
            <ul>
                <li><a href="{{ route('categories.index')}}">Kategóriák</a></li>
                <li><a href="{{ route('categories.create')}}">Új kategória</a></li>
                <li><a href="{{ route('aitools.index')}}">AI tools</a></li>
                <li><a href="{{ route('aitools.create')}}">AI tools create</a></li>
                <li><a href="{{ route('tags.index')}}">Tags</a></li>
                <li><a href="{{ route('tags.create')}}">Tags create</a></li>
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>

    </footer>
</body>
</html>