<?php

get('', [
	'as' => 'admin.home',
	function ()
	{
		$content = 'Админ панель магазина на Laravel 5.1.';
		return Admin::view($content, 'Админпанель');
	}
]);

