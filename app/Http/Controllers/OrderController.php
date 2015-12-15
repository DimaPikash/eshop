<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CartController;

use App\Product;
use App\Order;
use App\Cart;
use App\OrderContent;

class OrderController extends Controller
{
    protected $validationRules = [
        'customer_name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'delivery_address' => 'required',
    ];
    
    public function index()
    {
        return view('order_form');
    }
    
    public function save(Request $request, Order $order, OrderContent $order_content, Cart $cart)
    {
        // Валидация данных из формы в соответствии с заданными правилами
        $this->validate($request, $this->validationRules);
        
        // Получаем массив с данными покупателя
        $input = $request->only('customer_name', 'email', 'phone', 'delivery_address', 'comment');

        // Получаем данные о заказе из корзины
        $cart_content = $cart->cartConstruct();
        
        // Получаем сумму заказа
        $sum_order = $cart->CostSumOrder($cart_content);
        
        // Записываем данные покупателя и сумму заказа в таблицу #orders 
        // и получаем id заказа
        $data['order_id'] = $order->addOrder($input, $sum_order);
        
        // Записываем данные с содержимым заказа в таблицу #order_contents
        $order_content->AddOrderContent($cart_content, $data['order_id']);
        
        // Удаляем сессионную переменную с корзиной
        Session::forget('cart');
        
        return view('order_success', $data);
    }
    
}
