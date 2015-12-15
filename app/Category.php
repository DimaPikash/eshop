<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Category;

class Category extends Model
{
    protected $array_cat; //Универсальная переменная для работы с массивами категорий
    protected $totalNesting = 3; //уровень допустимой вложенности категорий
    
    public function scopeActive($query)
    {
        return $query->where('active', '=', true);
    }
    
//Метод возвращает массив всех категорий
    public function getCategoryList()
    {
        $this->array_cat = Self::All()->toArray();
        return $this->array_cat;
    }
   
//Метод возвращает коллекцию заглавных категорий
    public function getRootCategories()
    {
       return $this->where('parent_id', 1)->active()->get();
    }
    
//Метод возвращает колекцию подкатегорий по id категории
    public function getCategoriesByParent($parent_id)
    {
        return $this->where('parent_id', $parent_id)->active()->get();
    }
    
//Метод возвращает массив ids всех вложенных категорий заданной категории
    public function getAllSubcategories($id)
    {
        $array_cat = $this->active()->get();
        $array_id[] = $id;
            foreach ($array_cat as $item)
            {
                if(in_array($item->parent_id, $array_id))
                $array_id[] = $item->id;
            }
        return $array_id;
    }
    
// Возвращает строку, устанавливающую необходимое количество запросов, 
// необходимое для строительства дерева подкатегорий для заданной категории по ее id,
//  основанное на уровне вложенности заданной категории и допустимой глубине всего дерева
    public function getNesting($id)           
    {
        $children='children';
        $concatenation = '.children';
        $howManyTimes = $this->totalNesting - $this->findNestedCategoryById($id);
        for($i=1; $i<$howManyTimes; $i++)
        {
            $children .= $concatenation;
        }
        return $children;
    }

// Возвращает уровень вложенности категории относительно Root category по ее id 
    public function findNestedCategoryById($id) 
    {
        $level = 0;
        while($this->find($id)->parent_id != 0)
        {
            $id = $this->find($id)->parent->id;
            $level++;
        }
        return $level;
    }

//Устанавливает связь категории с родительской категорией
    public function parent()
    {
        return $this->belongsTo($this, 'parent_id');
    }

//Устанавливает связь категории с дочерними категориями
    public function children()
    {
        return $this->hasMany($this, 'parent_id');
    }

//Устанавливает связь категории с товарами категории
        public function product()
    {
        return $this->hasMany('App\Product');
    }
    
//Проверяет наличие подкатегорий у заданной категории
    public function checkByChild($id)
    {
        return $this->where('parent_id', $id)->first();
    }

//Возвращает дерево-массив по id родительской категории    
    public function createTree($id)
    {
        return ($this->with($this->getNesting($id))->find($id)->toArray());
    }
    
//Возвращает коллекцию родительских категорий для заданной категории
    public function getRouteCategories($id)
    {
        
        $category = $this->find($id);
        $route = [$category];
        while($category->parent->id !=1)
        {
            $category = $category->parent;
            array_unshift($route, $category);
        }
        return $route;
    }
    
    // Метод проверяет статус 'active' категории и всей цепочки родителей
    public static function checkActivity($id)
    {
        $category = static::find($id);
        //dd(static::find($id));
        do
        {
            if(!$category->active)
            {
                return false;
            }
                $category = $category->parent;
        }
        while($category->parent);
        return true;
    }
        
}


