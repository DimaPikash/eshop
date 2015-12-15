<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\View\Factory;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Cart;


class CartController extends Controller
{
    protected $cart = array();
    protected $sumOrder;
    
    //Метод выводит содержание корзины
    public function index(Cart $cart)
    {
        if ($cart->cartConstruct())
        {
            $data['products'] = $cart->cartConstruct();
            $data['sumOrder'] = $cart->CostSumOrder($data['products']);
        }
        else
        {
            $data['msg'] = 'Корзина пуста';
        }
        return view('cart', $data);
    }
    
    public function add2Cart(Request $request, Cart $cart)
    {
        $id = $request->product;
        if($cart->add($id))
        {
            return redirect()->back();
        }
        else
        {
            return 'товара больше нет';
        }
    }
    
    public function delOneFromCart(Request $request, Cart $cart)
    {
        $id = $request->product;
        $cart->del($id);
        return redirect()->back();
    }
    
    public function delPositionFromCart(Request $request, Cart $cart)
    {
        $id = $request->product;
        $cart->deletePosition($id);
        return redirect()->back();
    }
    
    public function clearCart(Request $request, Cart $cart)
    {
        $cart->clear();
        return redirect()->back();
    }
}
