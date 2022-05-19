<?php

function error($num)
{

    switch ($num) {
        case 404:
            # Error 404
            header("HTTP/1.0 404 Not Found"); ?>
            <div style="background-color: #ddd; margin: auto; height: 100%; width:100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                <h1>404 Not Found</h1>
                <p>The page that you have requested could not be found.<p>
                <a href="/" style="text-decoration: none;">> home <</a>
            </div>
            <?php
            die();
        case 500 :
            echo "<h1>500 error metode</h1>";
            echo '<a href="/">home</a>';


        default:
            break;
    }

}
function get_http_response_code($url) {
    $headers = get_headers($url);
    return substr($headers[0], 9, 3);
}


function getGenuisSong($id)
{
    $path = "/songs/".$id;
    $api = 'https://api.genius.com';
    $token = 'xkHGfcbtHLNZuvfUoHkz9ioSIISH7YsnvQSO_Mav4y9E2c-Z3iTo5FbzJqHb_fyI';
    $url = $api.$path.'?access_token='.$token;
    $res = json_decode(file_get_contents($url));
    return $res->response->song;
}

?>