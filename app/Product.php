<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Category;
use App\OrdersContent;

class Product extends Model
{
    public function getProductById($id)
    {
        return $this->find($id);
    }
    
    public function getProductBySlug($slug)
    {
        $product = $this->where('slug', $slug)->first();
        if(Category::checkActivity($product->category_id)){
            return $product;
        }
        else
        {
            abort(404);
        }
    }

//Возвращает товары группы категорий
    public function getProductsByCategories($array)
    {
        return $this->whereIn('category_id', $array)->get();
    }
    
//Возвращает товары c пометкой "Топ" из активных категорий
    public function getTopProducts()
    {
        $collection = $this->where('active', true)->get();
        $only_active = $this->checkActivityCategories($collection);
        return $this->whereIn('id', $only_active)->get();
    }
    
    //Метод проверяет статус 'active' всей цепочки родительскихкатегорий для коллекции товаров
    public function checkActivityCategories($collection)
    {
        foreach($collection as $item)
        {
            $category_id = $item->category_id;
            if(Category::checkActivity($item->category_id)) $only_active[] = $item->id;
        }
        return $only_active;
    }

//Проверяет есть ли в категории товары    
    public function checkByCategories($id)
    {
        return $this->where('category_id', $id)->first();
    }

//Возвращает остаток товара на складе    
    public function getRestById($id)
    {
        return $this->find($id)->product_rest;
    }

//Уменьшает остаток товара на складе    
    public function restDecrement($id, $quantity = 1)
    {   
        $this->find($id)->decrement('product_rest', $quantity);
    }

//Увеличивает остаток товара на складе    
    public function restIncrement($id, $quantity = 1)
    {    
        $this->find($id)->increment('product_rest', $quantity);
    }

//Устанавливает связь с таблицей категорий    
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

//Устанавливает связь с таблицей содержимого заказов     
    public function ordercontent()
    {
        return $this->hasMany('App\OrdersContent');
    }

//Возвращает категорию по продукту    
    public function getCategoryByProduct($id)
    {
        return $this->find($id)->category;
    }
}