<?php
    require __DIR__ . '/../vendor/autoload.php';
    
    $router = new AltoRouter();

    $router->addRoutes(Router\Routes::getRoutes());

    $match = $router->match();
    
    if ($match) {
        list($controller,$method)=explode("#",$match['target']);
        
        $controller = "App\\Controllers\\".$controller ;
        $controller = new $controller ;
        
        if (is_callable(array($controller, $method))) {
            call_user_func_array(array($controller,$method), array($match['params']));
        }else{
            error(500);
        }
    }else{
        error(404);
    }

    // Analyse
    App\Src\Db::analytics($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_TIME'])

    // https://programmierfrage.com/items/how-to-call-controller-method-with-alto-router



?>