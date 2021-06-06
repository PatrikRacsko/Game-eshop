@extends('layouts.app')
@section('content')
    <header>
<div class="jumbtron big-banner" style="height: 500px; padding-top: 150px;">
</div>
</header>
<style>
    .big-banner
    {
    background-image: url('../images/home_banner3.jpg');
    background-size: cover;
    }
    .sidebar {
    margin: 0;
    padding: 0;
    width: 200px;
    background-color: #f1f1f1;
    position: fixed;
    height:50%;
    overflow: auto;
}

.sidebar a {
    display: block;
    color: black;
    padding: 16px;
    text-decoration: none;
}

.sidebar a.active {
    background-color: #343a40;
    color: white;
}

.sidebar a:hover:not(.active) {
    background-color: #343a40;
    color: white;
}

div.content {
    margin-left: 200px;
    padding: 1px 16px;
    height: 1000px;
}

@media screen and (max-width: 700px) {
    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
    }
    .sidebar a {float: left;}
    div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
    .sidebar a {
        text-align: center;
        float: none;
    }
}

.container
{
    padding-top: 50px;
}
hr.hom
{
    width: 300px;
    border: 3px solid black;
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
.buy
{
    background-color: transparent;
    color: #434444;
    border-radius: 0;
    border: 1px solid #343a40;
    width: 100%;
    margin-top: 20px;
}
.buy:hover
{
    background-color: #343a40;
    color: #ffff;
}
.imgs
{
    position: relative;
    height: 250px;;
    width: 50%;
    margin-left: 85px;
}
    </style>
        <div class="sidebar">
        <a class="active" href={{ url('/home')}}>DOMOV</a>
                <a href={{ url('/products') }}>VŠETKY PRODUKTY</a>
                <a href={{ url('/products?platform=PC') }}>PC HRY</a>
                <a href={{ url('/products?platform=XBOX') }}>XBOX HRY</a>
                <a href={{ url('/products?platform=PS4') }}>PS4 HRY</a>
            </div>
    <div class="container">
    <h1 class="text-center display-4">NOVINKY</h1>
    <hr class="hom">
    <div class="row">
    @if(count($newProducts) > 0)
        @foreach($newProducts as $product)
            <div class="col-md-4 product-grid">
                <div class="images">
                 <a href={{ route('game', $product->id) }}>
                    
                        <img class="imgs" src="{{URL::asset($product->image)}}" class="w-100">
                    </a>
                </div>
            <h4 class="text-center">{{$product->name}}</h4>
                <h5 class="text-center">Cena: {{$product->price}} Eur</h5>
            <h5 class="text-center">Platforma: {{$product->platform}}</h5>
            <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn buy"> Pridať do košíka</a>
            </div>
            @endforeach
       @else
            <p>Nenasli sa produkty</p>
    @endif
    </div>
    <h1 class="text-center display-4">ODPORÚČAME</h1>
    <hr class="hom">
    <div class="row">
    @if(count($recommendedProducts) > 0)
        @foreach($recommendedProducts as $rProduct)
            <div class="col-md-4 product-grid">
                <div class="images">
                    <a href={{ route('game', $rProduct->id) }}>
                        <img class="imgs" src="{{URL::asset($rProduct->image)}}" class="w-100">
                    </a>
                </div>
            <h4 class="text-center">{{$rProduct->name}}</h4>
                <h5 class="text-center">Cena: {{$rProduct->price}} Eur</h5>
            <h5 class="text-center">Platforma: {{$rProduct->platform}}</h5>
                    <a class="btn buy" href="{{ route('product.addToCart', ['id' => $rProduct->id]) }}"> Pridať do košíka</a>
            </div>
            @endforeach
       @else
            <p>Nenasli sa produkty</p>
    @endif
    </div>
    </div>
@endsection
