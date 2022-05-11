<?php
    require __DIR__ . '/../vendor/autoload.php';

    echo $t;

    $rt = new AltoRouter();
    $rt->addRoutes(array(
        array('GET|POST', '/', 'home', 'home.default')
    ));

    $match = $rt->match();


    if (is_array($match)) {
        $mP = $match['params'];
        $mT = $match['target'];
        $mN = $match['name'];
        
        if  (is_callable($match['target'])) {
            call_user_func_array( $match['target'], $match['params'] ); 
        }else {

            ob_start();
            require __DIR__. '/../app/views/'.$mT.'.php';
            $mainView = ob_get_clean();

        }
    }else {
        ob_start();
        echo 'ERROR 404';
        $mainView = ob_get_clean();
    }
    
    require __DIR__. '/../app/layouts/default.php';

?>