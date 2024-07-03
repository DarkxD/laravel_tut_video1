@extends('layout')

@section('content')

<h1>AI eszközök
    <a href="{{ route('aitools.index', ['sort_by' => 'name', 'sort_dir' => 'asc']) }}" title="ABC">▼</a>
    <a href="{{ route('aitools.index', ['sort_by' => 'name', 'sort_dir' => 'desc']) }}" title="ZYX">▲</a>
</h1>

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
            <ul>
                @foreach ($aitool->tags as $tag)
                    <li>{{$tag->name}}</li>
                @endforeach
           </ul>
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

<div class="paginator">
    {{-- $aitools-> links() --}}
        {{ $aitools->appends(['sort_by' => request('sort_by'), 'sort_dir' => request('sort_dir')])-> links() }} {{-- Lehozza az url ből a rendezést --}}
</div>


</div>


@endsection