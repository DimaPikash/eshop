<?php

Admin::model(App\Product::class)->title('Управление товарами')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with('category');
	$display->filters([
            Filter::related('category_id')->model(App\Category::class),
        ]);
	$display->columns([
		Column::string('name')->label('Название'),
		Column::string('price')->label('Цена'),
		Column::image('image')->label('Изображение'),
                Column::string('category.title')->label('Категория')->append(Column::filter('category_id')),
                Column::custom()->label('Топ')->callback(function ($instance)
                    {
                        return $instance->active ? 'да' : 'нет';
                    }),
                Column::string('product_rest')->label('Остаток'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Название'),
		FormItem::text('slug', 'Slug'),
		FormItem::text('price', 'Цена'),
		FormItem::image('image', 'Изображение'),
		FormItem::select('category_id', 'Категория')->model(App\Category::class)->display('title'),
		FormItem::checkbox('active', 'Топ'),
		FormItem::ckeditor('description', 'Описание'),
                FormItem::text('product_rest', 'Количество товара')->defaultValue('0'),
	]);
	return $form;
});