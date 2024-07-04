@extends('layout')

@section('content')


@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container">
    <div class="row my-4">
        <div class="col align-self-center">
            <h1 class="display-4 text-info">AI eszközök</h1>
            <p>Az AI-t használók számos előnyre tehetnek szert, amelyek jelentősen javíthatják hatékonyságukat és versenyképességüket. Az AI lehetővé teszi a rutin és időigényes feladatok automatizálását, ami nemcsak időt takarít meg, hanem csökkenti az emberi hibák lehetőségét is.</p>
            <i class="float-right">/ Chatgpt 2024 /</i>
        </div>
        <div class="col">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="https://ebsedu.org/wp-content/uploads/2023/07/What-is-ChatGPT.jpg" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="https://www.ideasanimation.net/wp-content/uploads/2023/11/Midjourney.png" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="https://miro.medium.com/v2/resize:fit:1200/0*ikGJU_1VX6x9rbrc.png" alt="Third slide">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Előző</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Következő</span>
                </a>
              </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="display-6">AI eszközök listája<a href="{{ route('aitools.index', ['sort_by' => 'name', 'sort_dir' => 'asc']) }}" title="Névszerint: ABC">▼</a>
                <a href="{{ route('aitools.index', ['sort_by' => 'name', 'sort_dir' => 'desc']) }}" title="Névszerint: ZYX">▲</a></h1>
           
        </div>
    </div>
    <div class="container">
        

        @foreach($aitools as $aitool)
            <div class="container border p-3 m-3" style="border-radius: 20px;">
                <div class="row ">
                    <div class="col-9" >
                        <div class="">
                            <h5 class="">{{ $aitool->name }}</h5>
                            <h6 class=""> {{ $aitool->description }} </h6>
                            <a class="link" href="{{ $aitool->link }}">{{ $aitool->link }}</a>
                            <br/>
                            @foreach ($aitool->tags as $tag)
                                <p class="badge badge-info p-2 ">{{$tag->name}}</p>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-3">
                        {{$aitool->category->name}}
                        @if ($aitool->hasFreePlan == 1) <p>Ingyenes</p> @endif
                        @if ($aitool->price == 0) @else  <p>{{$aitool->price}} Ft / hó</p> @endif
                        
                    </div>
                </div>
                <div class="d-flex flex-row-reverse">
                        
                        <div class="p-2">
                            <form action="{{ route('aitools.destroy', $aitool->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-warning" type="submit" onclick="return confirm('Biztos hogy törölni szeretné az elemet?')">Törlés</button>
                            </form>
                        </div>
                        <div class="p-2">
                            <a href="{{ route('aitools.edit', $aitool->id )}}" class="btn btn-info">Szerkesztés</a>
                        </div>
                </div>
            </div>
        @endforeach   
    </div>

        
        
    </div>
</div>

<div class="container">
    <div class="paginator text-center">
        {{-- $aitools-> links() --}}
            {{ $aitools->appends(['sort_by' => request('sort_by'), 'sort_dir' => request('sort_dir')])-> links() }} {{-- Lehozza az url ből a rendezést --}}
    </div>
</div>
@endsection