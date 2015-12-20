@extends('admin.base')

@section ('content')
<div class='container'>
    <h4>{{$message or ''}}</h4>
    <div><a href="/admin/orders">Назад к заказам</a></div>
    <h4>Информация по заказу № {{$instance->id}}</h4>

    <table class="table table-striped table-bordered table-condensed table-hover">
        <tr><td colspan="4"> ФИО клиента: {{$instance->customer_name}}</td></tr>
        <tr><td colspan="4">Телефон: {{$instance->phone}}</td></tr>
        <tr><td colspan="4">e-mail: <a href='mailto:{{$instance->email}}'>{{$instance->email}}</a></td></tr>
        <tr><td colspan="4">Адрес: {{$instance->delivery_address}}</td></tr>
        <tr><td colspan="4">Комментарий к заказу:<br> {{$instance->comment}}</td></tr>
        <tr>
            <td>Наименование товара</td>
            <td>Цена</td>
            <td>Количество</td>
            <td>Стоимость</td>
        </tr>
        @foreach($instance->content as $item)
        <tr>
            <td>{{$item->product->name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->price*$item->quantity}}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="3">Итого к оплате</td>
            <td>{{$instance->sum_order}}</td>
        </tr>
    </table>

    <form action="/changeStatus/{{$instance->id}}" method="post" class="form-inline">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <select name="order_status" {{$disabled}} class="form-control">
            @foreach($statuses as $item)
            <option value= "{{$item->id}}" @if($instance->order_status_id==$item->id) selected @endif>

               {{$item->title}}
            </option>
            @endforeach
        </select>
        <button {{$disabled}} class="btn btn-default">Изменить</button>
    </form>
</div>

@stop