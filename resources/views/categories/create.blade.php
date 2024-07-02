@extends('layout')

@section('content')

<h1>NEW Category</h1>


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
<form action="{{ route('categories.store') }}" method="post">
    @csrf
    <fieldset>
        <label for="name">Kategória név</label>
        <input type="text" name="name" id="name">
    </fieldset>
    <button type="submit">Mentés</button>
</form>
</div>
@endsection