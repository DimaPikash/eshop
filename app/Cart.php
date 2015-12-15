<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

use App\Product;


class Cart extends Model
{
    //Добавляем в корзину одну единицу товара по id
    public function add($id)
    {
        $product = new Product;
        
        // Проверяем остаток товара на складе
        if($rest = $product->getRestById($id))
        {
            $quantity = 0;
            
            //Проверяем, есть ли уже товар в корзине
            if(Session::has("cart.$id"))
            {
                $quantity = Session::get("cart.$id");
            }
            
            $quantity++;
            
            //Записываем в сессионную переменную id и количество товара 
            Session::put("cart.$id", $quantity);
            
            //Уменьшаем количество товара на складе на 1
            $product->restDecrement($id);
            
            return true;
        }
        else
        {
            return false;
        }
    }
    
    // Метод удаляет из корзины одну единицу товара  
    // и возвращаем ее на склад
    public function del($id)
    {
        $product = new Product;
        if(($quantity = Session::get("cart.$id"))>1)
        {
            Session::put("cart.$id", --$quantity);
            $product->restIncrement($id);
        }
    }
    
    // Метод удаляет товарную позицию из корзины
    // и возвращает на склад ее количество
    public function deletePosition($id)
    {
        $product = new Product;
        $quantity = Session::get("cart.$id");
        $product->restIncrement($id, $quantity);
        Session::forget("cart.$id");
    }
    
    // Метод возвращает массив с подробным содержанием корзины 
    // на основе сессионных данных
    public function cartConstruct()
    {
        $cart_id_q = Session::get('cart');
        if (!empty($cart_id_q))
        {
            $product = new Product;
            for($i=0;$i<count($cart_id_q);$i++)
            {
                $id = key($cart_id_q);
                $product_position = [
                    'id'=>$id,
                    'name' => $product->getProductById($id)->name,
                    'price' => $product->getProductById($id)->price,
                    'quantity' => $cart_id_q[$id],
                    'cost' => $product->getProductById($id)->price*$cart_id_q[$id],
                ];
                $cart[$id] = $product_position;
                next($cart_id_q);
            }
            return $cart;
        }
        else
        {
            return false;
        }      
    }
    
    
    //Метод подсчитвыет и возвращает сумму заказа 
    public function CostSumOrder($cart)
    {
        $SumOrder=0;
        foreach($cart as $product)
        {
           $SumOrder =  $SumOrder + ($product['price']*$product['quantity']);
        }
        return $SumOrder;
    }
    
    //Очищает корзину и возвращает все товары на склад
    public function clear()
    {
        $product = new Product;
        $cart = Session::get("cart");
        foreach ($cart as $id => $quantity)
        {
            $product->restIncrement($id, $quantity);
        }
        Session::forget("cart");
    }
}
