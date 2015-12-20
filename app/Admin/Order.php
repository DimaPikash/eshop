<?php

Admin::model('App\Order')->title('Управление заказами')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with('status');
        $display->filters([
        Filter::related('order_status_id')->model('App\OrderStatus')->display('title'),
        ]);
	$display->columns([
		Column::string('id')->label('№'),
		Column::string('customer_name')->label('ФИО'),
                Column::string('phone')->label('Телефон'),
                Column::string('sum_order')->label('Сумма заказа'),
                Column::string('status.title')->label('Статус заказа')->append(Column::filter('order_status_id')),
                Column::action('show')->label('Подробности')->icon('fa fa-share')->url('order_content/:id')
	]);
	return $display;
})->delete(null);