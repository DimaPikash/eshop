<h4>Информация по заказу № {{$instance->id}}</h4>

<table class="table table-striped table-bordered table-condensed table-hover">
    <tr><td colspan="4"> ФИО клиента: {{$instance->customer_name}}</td></tr>
    <tr><td colspan="4">Телефон: {{$instance->phone}}</td></tr>
    <tr><td colspan="4">e-mail: {{$instance->email}}</td></tr>
    <tr><td colspan="4">Адрес: {{$instance->delivery_address}}</td></tr>
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

<h3>Редактировать данные по заказу:</h3>


