@extends('layouts.app')
@section('content')
<div class="card mx-auto" style="margin-top: 50px; width: 50rem;">
    <h5 class="card-header">Checkout</h5>
    <div class="card-body">
<form action="{{ route('checkout') }}" method="POST" id="checkout-form">
    <div class="col-xs-12">
        <div class="form-group">
                <label for="name">Meno</label>
                <input type="text" id="name" class="form-control" required name="name">
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
                <label for="address">Adresa</label>
                <input type="text" id="address" class="form-control" required name="address">
        </div>
    </div>
    <div class="col-xs-12">
            <div class="form-group">
                    <label for="psc">PSC</label>
                    <input type="number" id="psc" class="form-control" required name="psc" maxlength="5">
            </div>
        </div>
    <div class="col-xs-12">
            <div class="form-group">
                    <label for="delivery">Doprava</label>
                    <select id="delivery" name="delivery" class="custom-select">
                            <option value="Post" name="Posta">Poštová služba</option>
                            <option value="Dobierka" name="Dobierkou">Dobierka</option>
                            <option value="Osobne" name="Osobny odber">Osobný odber</option>
                    </select>
            </div>
    </div>
    <div class="col-xs-12">
            <div class="form-group">
                    <label for="payment">Platba</label>
                    <select id="payment" name="payment" class="custom-select">
                            <option value="Card" name="Bankovy prevod">Bankový prevod</option>
                            <option value="Hotovost" name="Hotovost">Hotovosť</option>
                    </select>
            </div>
    </div>
    </div>
</div>
{{ csrf_field() }}
<button type="submit" class="btn btn-primary">Objednať</button>
</form>
@endsection