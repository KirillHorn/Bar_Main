@extends('app.header')
@section('title', 'Too Much, Too Little')
@section('content')
    <section class="section_catalog">
        <div class="container">
            <div class="main_catalog d-flex justify-content-center">
                <div class="catalog_content">
                    @forelse($products as $product)
                    <div class="catalog_block">
                        <img src="storage/img/{{$product ->img}}">
                        <p>{{$product ->title_prod}}</p>
                        <span>{{$product ->cost}}</span>
                        <a style="color:#FCEE0A;" href="/product/{{$product ->id}}">Купить</a>
                    </div>
                    @empty
                    <p>Тут нету продуктов.</p>
                    @endforelse
                    {{ $products->withQueryString()->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </section>

@endsection('content')
