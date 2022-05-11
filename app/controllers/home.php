<?php
namespace App\Controllers;

class Home
{
    public function index($params)
    {

        require __DIR__.'/../models/home.php';

        $main['head'] = [
            '<link rel="stylesheet" href="/css/CSSVIEW.css">'
        ];
        $main['script'] = [
            '<script src="/js/JSVIEW.js"></script>'
        ];

        ob_start();
        require __DIR__.'/../views/home.php';
        $main['view'] = ob_get_clean();

        require __DIR__.'/../layouts/default.php';
    }
}

?>