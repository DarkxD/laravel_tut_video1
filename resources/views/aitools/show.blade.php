@extends('layout')

@section('content')

<h1>AI Tool neve: {{$aitool->name}}</h1>

<p>Kategóriája: {{$category->name}}</p>
<p>Leírás: {{$aitool->description}}</p>
<a href="{{ $aitool->link }}">{{ $aitool->link }}</a>

@if ($aitool->hasFreePlan == 1)
    <p>Van ingyenes verziója</p>
@else
    <p>Nincs ingyenes verziója</p>
@endif



<p>Ára: havi {{ $aitool->price }} Ft</p>
<p>Címkék:</p>
<ul>
    @foreach ($aitool->tags as $tag)
        <li>{{$tag->name}}</li>
    @endforeach
</ul>
<p>Utoljára frissítve: {{ $aitool->updated_at }}</p>


{{-- dd($aitool) --}}

@endsection