<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use App\Category;


class ProductController extends Controller
{
    //Генерирует страничку товара
    public function index($slug, Product $product, Category $category)
    {
        if($data['product'] = $product->getProductBySlug($slug))
        {
            $id = $data['product']->id;
        
            //Получаем категорию продукта
            $category_id = $product->getCategoryByProduct($id)->id;

            //Получаем коллекцию предков для заданной категории
            $data['route'] = $category->getRouteCategories($category_id);
            
            return view('product_page', $data);
        }
        else
        {
            abort(404);
        }
    }
       
}
