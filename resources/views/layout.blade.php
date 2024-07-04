<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Eszközök listája</title>
    <link rel="stylesheet" href=" {{ asset('style.css') }}">
    <link rel="shortcut icon" href=" {{ asset('style.ico') }} " type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>
<body>
    
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
        <img class="navbar-brand d-inline-block align-top" width="60" height="60" src="{{ asset('logo.png') }}" alt="logo">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('aitools.index')}}">AI eszközök <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('aitools.create')}}">AI eszköz hozzáadása</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.index')}}">Kategóriák</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.create')}}">Új kategória</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tags.index')}}">Címkék</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tags.create')}}">Címke hozzáadása</a>
            </li>
            
          </ul>
        </div>
        </div>
      </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="card-footer bg-dark text-light text-center" >2024 @ Remete Gergő</div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </footer>
</body>
</html>