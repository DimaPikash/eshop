<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Product;


class OrderContent extends Model
{
    public function AddOrderContent($array, $order_id)
    {
        // Инициализируем массив, данные из которого будем записывать в таблицу БД
        $insert_array = array();
        
        // В цикле перекладываем в новый массив только те поля, 
        // которые необходимо записать в таблицу
        foreach($array as $key=>$item)
        {
            $insert_array[$key]['product_id'] = $item['id'];
            $insert_array[$key]['price'] = $item['price'];
            $insert_array[$key]['quantity'] = $item['quantity'];
            $insert_array[$key]['order_id'] = $order_id;
        }
        
        $this->insert($insert_array);
   }
    
   public function order()
    {
        return $this->belongsTo(App\Order::class);
    }
    
        public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
}
