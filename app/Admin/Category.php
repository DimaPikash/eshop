<?php

Admin::model('\App\Category')->title('Управление категориями')->display(function ()
{
    $instance = new App\Category;
    $message = Session::get('message'); //('message') ? $message : '';
    $categories = $instance->createTree(1);
    return view('admin.categories', compact('categories', 'message'));
})->createAndEdit(function ($id)
{
    $form = AdminForm::form();
    $form->items([
	FormItem::text('title', 'Название категории')->required(),
        FormItem::select('parent_id', 'Родительская категория')->model('App\Category')->display('title')->required(),
        FormItem::checkbox('active', 'Активность')
    ]);
	return $form;
});
