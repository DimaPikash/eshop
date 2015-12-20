<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderContent;
use App\OrderStatus;


class Order extends Model
{
    // Метод возвращает все существующие статусы заказа
    public function getOrderStatuses()
    {
        return $this->status->get();
    }
    
    // Метод изменяет статус заказа
    public function changeStatus($id, $order_status_id)
    {
        $order = $this->find($id);
        $order->order_status_id = $order_status_id;
        $order->save();
    }

    public function AddOrder($array, $sumOrder)
    {
        // Добавляем к входящему массиву с данными о покупателе сумму заказа
        $array = array_add($array, 'sum_order', $sumOrder);
        
        //Записываем в таблицу и возвращаем id новой записи
        return $this->insertGetId($array);
    }

    public function content()
    {
        return $this->hasMany(OrderContent::class);
    }
    
    public function status()
    {
        return $this->belongsTo('App\OrderStatus', 'order_status_id', 'id');
    }
    
}
