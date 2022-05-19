<?php
namespace App\Controllers;
use App\Models\Home         as HomeModel ;
use App\Src\SearchGenius    as SearchGenius ;

class Home
{
    public function index($params)
    {
        $main = [
            'head' => [
                '<link rel="stylesheet" href="/css/home.css">'
            ],
            'script' => [
            ]
        ];


        $main['src']['searchGenius'] = SearchGenius::index();
        $main['head'][] = SearchGenius::style();
        $main['script'][] = SearchGenius::script("/lyrics");
     


        $data = HomeModel::getData();

        ob_start();
        require __DIR__.'/../views/home.php';
        $main['view'] = ob_get_clean();
        require __DIR__.'/../layouts/default.php';
    }
}

?>