@extends('layout')

@section('content')


<h1>EDIT AI tool data</h1>


@error('name')
    <div class="alert alert-warning">{{ $message }}</div>
@enderror

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
<form action="{{ route('aitools.update', $aitool->id) }}" method="post">
    @csrf
    @method('PUT')
    <fieldset>
        <label for="name">AI eszköz neve</label>
        <input type="text" name="name" id="name" value="{{ old('name', $aitool->name) }}">
    </fieldset>
    <fieldset>
        <label for="category_id">Válassz kategóriát</label>
        <select name="category_id" id="category_id">
            @foreach ($categories as $category)
                @if ($category->id == $aitool->category_id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
            @endforeach
        </select>
    </fieldset>
    <fieldset>
        <label style="text-align:top;" for="description">Leírás</label>
        <textarea type="text" name="description" id="description" >{{ old('description', $aitool->description) }}</textarea>
    </fieldset>
    <fieldset>
        <label for="link">Link</label>
        <input type="text" name="link" id="link" value="{{ old('name', $aitool->name) }}">
    </fieldset>
    <fieldset>
        <label for="hasFreePlan">Van ingyenes változat?</label>
        @if ($aitool->hasFreePlan)
            <input type="checkbox" name="hasFreePlan" id="hasFreePlan" checked>
        @else
            <input type="checkbox" name="hasFreePlan" id="hasFreePlan">
        @endif
        
    </fieldset>
    <fieldset>
        <label for="price">Ár (havonta Ft-ban)</label>
        <input type="number" name="price" id="price" step=".01" value="{{ old('price', $aitool->price) }}">
    </fieldset>

    <fieldset>
        
        <label for="tags">Címkék</label>
        <select name="tags" id="tags" multiple>
            @foreach ( $tags as $tag )
                <option value=" {{ $tag->id }} ">{{ $tag->name }}</option>
            @endforeach
        </select>
    </fieldset>

    <button type="submit">Mentés</button>
</form>
</div>
@endsection
    