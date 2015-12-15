@extends ('index')

@section ('title')
Корзина
@stop

@section('content')

@if(isset($products))
<table class="table">
    <thead style="text-align: center">
        <td>Название</td>
        <td>Цена</td>
        <td>Количество</td>
        <td>Стоимость</td>
    </thead>
@foreach($products as $item )
<tr>
    <td>{{$item['name']}}</td>
    <td style="text-align: center">{{$item['price']}} грн.</td>
    <td>
        <div class="container" style="width: 120px;">
            <div class="col-md-4">   
                <form action="/delOneFromCart" method="post" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <button {{$item['quantity'] < 2 ? 'disabled' :''}} class="btn btn-xs" name='product' value='{{$item['id']}}'>
                        -
                    </button>
                </form> 
             </div>
            <div class="col-md-4" style="text-align: center">{{$item['quantity']}}</div>
            <div class="col-md-4">  
                <form action="/add2cart" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button class="btn btn-xs" name='product' value='{{$item['id']}}'>
                        +
                    </button>
                </form>
            </div>  
        </div>   
    </td>
    <td>{{$item['cost']}}</td>
    <td>
        <form action="/delPositionFromCart" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="DELETE">
            <button name='product' value='{{$item['id']}}'>
                удалить
            </button>
        </form> 
    </td>
</tr>
@endforeach
</table>
<div style="text-align: right;"><b>Всего к оплате: {{$sumOrder}} грн.</b></div>

<div style="text-align: right;">
    <form action="/clearCart" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="DELETE">
        <button>очистить корзину</button>
    </form> 
</div>
<div>
    <form action="/orderform" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button>Оформить заказ</button>
    </form>
</div>
@endif
@if (isset($msg))
<h2>{{$msg}}</h2>
@endif

@stop