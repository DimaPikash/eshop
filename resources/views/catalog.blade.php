@extends ('index')

@section ('title')
Каталог
@stop

@section('categories')

    @if(!empty($categories))
        <div class="navbar navbar-default">
            <ul class="nav navbar-nav">
            @foreach($categories as $category)
                <li><a href="/category/{{$category['id']}}">{{$category['title']}}</a></li>
            @endforeach
            </ul>
        </div>
    
    @endif


@stop

@section('content')

    @if(isset($products))
        <h3>{{$title_for_products}}</h3>
        <div class="">
            @foreach($products as $product)
            <div class=" col-md-3" style="margin-bottom: 50px">
                    <div class="product-img" style="text-align: center"><img src="/{{$product['image']}}" class="img-responsive"></div>
                    <div class="product-title" style="text-align: center"><a href="/products/{{$product['slug']}}">{{$product['name']}}</a></div>
                    <div class="row">
                        @if($product['product_rest'] > 0)
                            <div class="col-md-6" style="text-align: center">{{$product['price']}} грн.</div>
                            <div class="col-md-6">
<!--                                <a href="/add2cart/{{$product['id']}}">Купить</a>-->
                                <form action="/add2cart" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button class="btn btn-primary" name='product' value='{{$product['id']}}'>
                                        Купить
                                    </button>
                                </form>
                            </div>
                        @else 
                        <div style="text-align: center">
                            <span >Нет в наличии</span>
                        </div>
                        @endif                    
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@stop