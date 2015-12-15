@extends ('index')

@section ('title')
Форма заказа
@stop

@section('content')

<form class=" form-horizontal" action="/order/save" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label for="customer_name" class="col-sm-4 control-label">Ваши имя и фамилия</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="" required>
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-4 control-label">E-mail</label>
        <div class="col-sm-4">
            <input type="email" class="form-control" id="email" name="email" placeholder="" required>
        </div>    
    </div>
    <div class="form-group ">
        <label for="phone" class="col-sm-4 control-label">Телефон</label>
        <div class="col-sm-4">
            <input type="phone" class="form-control" id="phone" name="phone" required>
        </div>    
    </div>
    <div class="form-group ">
        <label for="address" class="col-sm-4 control-label">Адрес доставки</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="address" name="delivery_address" required>
        </div>    
    </div>
    <div class="form-group ">
        <label for="comment" class="col-sm-4 control-label">Комментарий к заказу</label>
        <div class="col-sm-4">
            <textarea rows="3" class="form-control" id="comment" name="comment" ></textarea>
        </div>    
    </div>
    <div class="col-sm-offset-4 col-sm-4">
        <button class="btn btn-primary btn-lg">Подтвердить</button>
    </div>    
</form>

@stop