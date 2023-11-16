@extends('app.header')
@section('title', 'Too Much, Too Little')
@section('content')
<section class="section_product">
    <div class="container">
    <div class="content_product">
       <div class="content_product_main">
        <img src="/img/{{$prod ->img}}" class="foto_product">
        <img src="/img/element_product.png" class="element_top">
       </div>
            <div class="product_text">
                <h2>{{$prod ->title}}</h2>
                <p><span>Описание:</span> {{$prod ->description}}</p>
                <p>Цена: <span>{{$prod ->cost}}</span></p>
            </div>
         </div>
        <a class="buy" href="/basket">Купить</a>
    </div>

</section>

@endsection('content')


