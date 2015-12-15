<?php

Admin::model('App\Order')->title('Управление заказами')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with('status');
	$display->columns([
		Column::string('id')->label('№'),
		Column::string('customer_name')->label('ФИО'),
                Column::string('phone')->label('Телефон'),
                Column::string('sum_order')->label('Сумма заказа'),
                Column::string('status.title')->label('Статус заказа'),
	]);
	return $display;
})->edit(function ()
{
	$form = AdminForm::form();
	$form->items([
                FormItem::view('admin.ordercontent'),
                FormItem::select('order_status_id', 'Статус заказа')->model('App\OrderStatus')->display('title'),
		FormItem::text('customer_name', 'Заказчик'),
                FormItem::text('phone', 'Телефон'),
                FormItem::text('email', 'E-mail'),
                FormItem::textarea('comment', 'Комментарий')->defaultValue('0')
                
	]);
	return $form;
})->delete(null);