<!DOCTYPE HTML>
<html lang="ru">
<html>
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="../css/bootstrap.css" rel="stylesheet">
   <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
 </head> 
 <body>

  <div class="container">
    <header>
        <div style="display:inline-block; text-align: right;" class="navbar-fixed-top"><a href="/cart"><img src="/images/cart/cart.png"></a>
            (@if($quantity = Session::get('cart')) 
            {{array_sum($quantity)}}
            @else 0 
            @endif)
        </div>
        <div style="display:inline-block;"><a href="/"><img src="/images/logo/eshop.jpg"> </a></div>
        <nav>
         @yield('categories')
        </nav>
  
        @if(isset($route))
            <ol class="breadcrumb">
            @foreach($route as $item)
                <li><a href="{{$item->id}}">{{$item->title}}</a></li>
<!--            <span class="glyphicon glyphicon-circle-arrow-right"></span> <a href="{{$item->id}}">{{$item->title}}</a>-->
            @endforeach
            </ol>
        @endif
    
    </header>
     
    @yield('content')
    
    </div>

     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.maskedinput.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(function($){
           $("#phone").mask("+38(099) 999-99-99");
        });
    </script>
 </body> 
</html>