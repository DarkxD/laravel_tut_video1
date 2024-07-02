@extends('layout')

@section('content')

<h1>AI tools lista</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container" style="display:flex;">
<ul>
    @foreach($aitools as $aitool)
    <li>
        <a> {{ $aitool->id }} - {{ $aitool->name }}</a>
        <a href="{{ route('aitools.show', $aitool->id )}} " class="button">Megjelenítés</a>
        <a href="{{ route('aitools.edit', $aitool->id )}} " class="button">Szerkesztés</a>
        
        <form action="{{ route('aitools.destroy', $aitool->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Biztos hogy törölni szeretné az elemet?')">Törlés</button>
        </form>
    </li>
    @endforeach
</ul>
</div>


@endsection