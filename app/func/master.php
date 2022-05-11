<?php

function error($num)
{

    switch ($num) {
        case 404:
            # Error 404
            header("HTTP/1.0 404 Not Found");
            echo "<h1>404 Not Found</h1>";
            echo "The page that you have requested could not be found.";
            echo '<a href="/">home</a>';
            die();
        case 500 :
            echo "<h1>500 error metode</h1>";
            echo '<a href="/">home</a>';


        default:
            break;
    }

}

?>