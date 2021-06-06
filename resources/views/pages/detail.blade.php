@extends('layouts.app')
@section('content')
<style>
    .container
{
    padding-top: 50px;
}
.product-grid
{
    padding-bottom:  20px;
    padding-top: 20px;
}
.product-grid:hover
{
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}
.image
{
    position:relative;
}

.buy
{
    background-color: transparent;
    color: #434444;
    border-radius: 0;
    border: 1px solid #434444;
    width: 100%;
    margin-top: 20px;
}
.buy:hover
{
    background-color: #434444;
    color: #ffff;
}
    </style>
<div class="row" style="margin-top: 70px;">
        <div class="col-sm-6">
            <img src="{{URL::asset($game[0]->ingame)}}" class="img-fluid">
        </div>
        <div class="col-sm-6">
            <h1 class="display-4">{{$game[0]->name}}</h1>
            <hr>
            <h5><b>Popis hry</b></h5>
            <p>
                {{$game[0]->description}}
            </p>
            <h5><b>Žáner</b></h5>
            <p>{{$game[0]->genre}}</p>
            <h5><b>Hodnotenie</b></h5>
            <p>{{$game[0]->rating}}</p>
            <h5><b>Platforma</b></h5>
            <p>{{$game[0]->platform}}</p>
            <h5><b>Rok vydania</b></h5>
            <p>{{$game[0]->release_date}}</p>
            <hr>
            <a href="{{ route('product.addToCart', ['id' => $game[0]->id]) }}" class="btn btn-lg btn-outline-dark text-uppercase"> <i class="fas fa-shopping-cart"></i> Pridať do košíka </a>
        </div>
        </div>
    <hr>
    <article>
        <h1 class="display-4">Hry, ktoré by sa Vám mohli páčiť</h1>
        <div class="container">
        <div class="row">
            @if(count($products) > 0)
                @foreach($products as $product)
            <div class="col-md-3 product-grid">
                <div class="image">
                    <a href={{ route('game', $product->id) }}>
                        <img src="{{URL::asset($product->image)}}" class="w-100">
                    </a>
                </div>
                <h4 class="text-center" >{{$product->name}}</h4>
                <h5 class="text-center">Cena: {{$product->price}} Eur</h5>
            <h5 class="text-center">Platforma: {{$product->platform}}</h5>
                <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn buy"> Pridať do košíka</a>
            </div>
            @endforeach
            @else
                <p>Nenasli sa posty</p>
            @endif
        </div>
    </div>
    </article>
@endsection