@extends('layout')

@section('content')


<h1>Kategóriák</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container" style="display:flex;">
<ul>
    @foreach($categories as $category)
    <li>
        <a> {{ $category->id }} - {{ $category->name }}</a>
        <a href="{{ route('categories.show', $category->id )}} " class="button">Megjelenítés</a>
        <a href="{{ route('categories.edit', $category->id )}} " class="button">Szerkesztés</a>
        
        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Biztos hogy törölni szeretné az elemet?')">Törlés</button>
        </form>
    </li>
    @endforeach
</ul>
</div>

@endsection