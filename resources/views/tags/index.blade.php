@extends('layout')

@section('content')


<h1>Címkék</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container" style="display:flex;">
<ul>
    @foreach($tags as $tag)
    <li>
        <a> {{ $tag->id }} - {{ $tag->name }}</a>
        <a href="{{ route('tags.show', $tag->id )}} " class="button">Megjelenítés</a>
        <a href="{{ route('tags.edit', $tag->id )}} " class="button">Szerkesztés</a>
        
        <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Biztos hogy törölni szeretné az elemet?')">Törlés</button>
        </form>
    </li>
    @endforeach
</ul>
</div>
@endsection