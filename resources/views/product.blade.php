@extends('layouts.menu')
@section('content')
        <!DOCTYPE html>
<html>
<head>
    <title>Товары</title>
    @if(session()->has("productAddToCart"))
        {{session("productAddToCart")}}
    @endif
</head>
<body>
<style>
    .button {
        display: inline-block;
        padding: .69231em 1.46154em .61538em 1.76923em;
        text-indent: -9999px;
    }
</style>
<div class="container">
    @foreach($product as $p)
        <form class="product-form">
            <div class="col-lg-4 product">
                <h3>{{$p->name}}</h3>
                <img src="{{$p->image}}" width="200" height="200"><br>
                <h3>{{$p->price}}</h3>
                <button type="button" onclick="addProductInCart(this)">Добавить в корзину</button>
                <input type="hidden" name="idVal" value="{{$p->id}}">
                <input type="hidden" name="priceVal" value="{{$p->price}}">
                {{ csrf_field() }}
            </div>
        </form>
    @endforeach
</div>

</body>
@endsection
</html>
