@extends('layouts.app')
@section('content')
<style>
    .btn{
    border:0px;
    margin:10px 0px;
    box-shadow:none !important;
}
    </style>
@include('messages.message')
@if(Session::has('cart'))
<table class="table table-hover table-condensed" style="margin-top: 55px;">
        <thead>
        <tr>
            <th style="width:50%">Produkt</th>
            <th style="width:10%">Cena</th>
            <th style="width:8%">Počet</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody> 
                @foreach($products as $product)
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ $product['item']['image'] }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $product['item']['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{{ $product['price'] }} Eur</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $product['qty'] }}" class="form-control quantity" />
                    </td>
                    <td>
                            <li><a href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}">Vymazať 1</a></li>
                            <li><a href="{{ route('product.removeItem', ['id' => $product['item']['id']]) }}">Vymazať celé</a></li>
                        </td>
                    @endforeach
                </tr>
        </tbody>
        <tfoot>
                    <tr>
                        <td colspan="2" class="hidden-xs"></td>
                        <td class="hidden-xs text-center"><strong>Total: {{ $totalPrice }}</strong></td>
                        @guest
                        <td>Bez prihlasenia sa neda pokračovať</td>
                        @else
                        <td><a href="{{ route('checkout') }}" class="btn btn-success">Checkout</a></td>
                        @endguest
                    </tr>
        </tfoot>
    </table>
    @else
    <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3" style="margin-top: 50px;">
                   <h1>Nenasli sa produkty</h1> 
            </div>
        </div>
    @endif
@endsection