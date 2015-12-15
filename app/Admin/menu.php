<?php

use App\Admin\CategoryController;

Admin::menu()->url('/')->label('Start page')->icon('fa-dashboard');

Admin::menu('App\Category')->label('Категории');
Admin::menu('App\Product')->label('Товары');
Admin::menu('App\Order')->label('Заказы');

