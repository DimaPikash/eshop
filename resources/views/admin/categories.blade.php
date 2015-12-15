
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Управление категориями</title>
    </head>
    <body>
        
        <h4><a href="categories/create">Добавить категорию</a></h4>
        <div style="text-align: right"><span style="display: inline-block; margin-right: 75px">Активная</span></div>
        <ul>
        @include('admin.category', $categories)
        </ul>
        {!!$message or ''!!}
     </body>
 </html>


