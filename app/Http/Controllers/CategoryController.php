<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;

use App\Category;
use App\Product;



class CategoryController extends Controller
{   
    //Генерирует главную страницу 
    public function index(Category $category, Product $product)
    {
        //Получаем заглавные категории
        $data['categories'] = $category->getRootCategories();
        
        //Получаем товары с пометкой "топ"
        $data['products'] = $product->getTopProducts();
        $data['title_for_products'] = 'Топ товары';
        return view('catalog', $data);
    }
    
    //Генерирует страницы всех вложенных категорий
    public function subcategory($id, Category $category, Product $product)
    {
        if(Category::checkActivity($id))
        {

            //Получаем ids всех потомков заданной категории
            $ids_all_subcategories = $category->getAllSubcategories($id);

            //Получаем массив непосредственных потомков заданной категории
            $data['categories'] = $category->getCategoriesByParent($id)->toArray();
            //dd($id);
            //dd($data['categories']);
            //Получаем товары всех потомков заданной категории
            $data['products'] = $product->getProductsByCategories($ids_all_subcategories)->toArray();

            //Получаем коллекцию предков для заданной категории
            $data['route'] = $category->getRouteCategories($id);

            //Задаем заголовок секции "Товары"
            $data['title_for_products'] = !empty($data['products']) ? 'Каталог товаров':'В категории нет товаров' ;

            return view('catalog', $data);
        }
        else
        {
            abort(404);
        }
            
    }

    public function destroy(Request $request, Category $categories, Product $products)
    {       
        $id = $request->category_id;
        
        //Проверяет наличие потомков заданной категории
        $category = $categories->checkByChild($id);
        
        //Проверяет наличие товаров в заданной категории
        $product = $products->checkByCategories($id);
        
        if(!empty($category) or !empty($product))
        {
            return redirect()->back()->with('message', "<script>alert('Нельзя удалить категорию, в которой есть дочерние элементы или в которой есть товары')</script>");
        }
        else
        {
            Category::destroy($id);
            return redirect()->back();
        }
    }
       
}
