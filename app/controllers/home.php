<?php
namespace App\Controllers;
use App\Models\Home as HomeModel ;

class Home
{
    public function index($params)
    {
        $main = [
            'head' => [
                '<link rel="stylesheet" href="/css/home.css">',
                '<link rel="stylesheet" href="/css/searchBar.css">'
            ],
            'script' => [
                '<script src="/js/home.js"></script>'
            ]
        ];

        $data = HomeModel::getData();

        ob_start();
        require __DIR__.'/../views/home.php';
        $main['view'] = ob_get_clean();

        require __DIR__.'/../layouts/default.php';
    }
}

?>