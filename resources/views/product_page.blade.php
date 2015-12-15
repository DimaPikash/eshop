@extends ('index')

@section('content')
<div class="container"> 
    <h2>{{$product->name}}</h2>
    <div class="container">
        <div class ="col-md-6">
            <h3>Цена: {{$product->price}} грн.</h3>
        </div>
        <div class ="col-md-6">
            <form action="/add2cart" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button class="btn btn-primary" name='product' value='{{$product->id}}'>
                    Купить
                </button>
            </form>
        </div>
    </div>
    <div class="container">
        <div class ="col-md-6"><img src="/{{$product->image}}"></div>
        <h3>Описание:</h3>
        <div class ="col-md-6">{!!$product->description!!}</div>
    </div>
</div>
@stop
