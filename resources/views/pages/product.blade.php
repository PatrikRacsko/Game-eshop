@extends('layouts.app')
@section('content')
<style>
    
body
{
    color: #434444;
}
.container
{
    padding-top: 50px;
}

/* grid */
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
.filtr:hover
{
    background-color: #434444;
    color: #ffff;
}
    </style>
<div class="container">
        <h1 class="text-center">ALL POINTS GAMING</h1>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center" style="background-color: #343a40; color: white;">Kategórie</h2>
                        <h5 class="display-8">Cena</h5>
                        <a href="{{ route('sorted') }}"><button class="btn btn-primary">Zoradiť podla ceny vzostupne</button> </a>
                        <hr>
                        <a href="{{ route('sortedAsc') }}"><button class="btn btn-primary">Zoradiť podla ceny zostupne</button> </a>
                        <hr>
                        <h5 class="display-8">Žáner</h5>
                        <br>
                        <hr>
                        <form action="/products" method="GET">
                            <input type="checkbox" name="genre[]" value="Action"><label>Akčné</label><br/>
                            <hr>
                            <input type="checkbox" name="genre[]" value="FPS"><label>Pohľad z prvej osoby</label><br/>
                            <hr>
                            <input type="checkbox" name="genre[]" value="Adventure"><label>Adventúry</label><br/>
                            <hr>
                            <input type="checkbox" name="genre[]" value="Shooter"><label>Strieľačky</label><br/>
                            <br>
                            <hr>
                            <h5 class="display-8">Plaforma</h5>
                                <input type="checkbox" name="platform[]" value="PC"><label>PC</label><br/>
                                <hr>
                                <input type="checkbox" name="platform[]" value="XBOX"><label>XBOX</label><br/>
                                <hr>
                                <input type="checkbox" name="platform[]" value="PS4"><label>PS4</label><br/>
                                <hr>
                                <input type="submit" name="submit" value="Filtruj" class="btn" style="width:100%;">
                        </form>
                        <a href={{ url('/products') }}>Obnovit filter</a>
                    </div>
                </div>
            </div>
    <div class="col-md-8">
        <div class="row">
    @if(count($products) > 0)
        @foreach($products as $product)
        <div class="col-md-4 product-grid">
            <div class="image">
                <a href={{ route('game', $product->id) }}>
                    <img src="{{URL::asset($product->image)}}" class="w-100">
                </a>
            </div>
            <h4 class="text-center" style="text-overflow:ellipsis;white-space: nowrap;overflow: hidden;">{{$product->name}}</h4>
                <h5 class="text-center">Cena: {{$product->price}} Eur</h5>
            <h5 class="text-center">Platforma: {{$product->platform}}</h5>
                <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn buy"> Pridať do košíka</a>
        </div>
        @endforeach
        @else
             <p>Nenasli sa produkty</p>
     @endif
        </div>
    </div>
    </div>
    </div>
@endsection