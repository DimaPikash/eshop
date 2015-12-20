<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
get('/', ['as'=>'Category', 'uses'=>'CategoryController@index']);
get('category', ['as'=>'Category', 'uses'=>'CategoryController@index']);
get('category/{id}', ['as'=>'Subcategory', 'uses'=>'CategoryController@subcategory']);
delete('/categories/delete', '\App\Http\Controllers\CategoryController@destroy');
get('products/{slug}', ['as'=>'Product', 'uses'=>'ProductController@index']);
get('cart', ['uses'=>'CartController@index']);
post('add2cart', ['as'=>'AddBaskket', 'uses'=> 'CartController@add2Cart']);
delete('delOneFromCart', ['as'=>'delFromCart', 'uses'=> 'CartController@delOneFromCart']);
delete('delPositionFromCart', ['as'=>'delPosFromCart', 'uses'=> 'CartController@delPositionFromCart']);
delete('clearCart', ['as'=>'clearCart', 'uses'=> 'CartController@clearCart']);
post('orderform', ['as'=>'orderform', 'uses'=> 'OrderController@index']);
post('order/save', ['as'=>'order', 'uses'=> 'OrderController@save']);
post('changeStatus/{id}', ['uses'=>'OrderController@changeStatus']);


