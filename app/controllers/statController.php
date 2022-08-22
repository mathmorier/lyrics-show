<?php
namespace App\Controllers;
use App\Models\Stat         as StatModel;

class statController
{
    public function index($params = null)
    {


        $main = [
            'head' => [
                '<link rel="stylesheet" href="/css/stat.css">'
            ],
            'script' => []
        ];

        $main['data'] = StatModel::getContent();

        ob_start();
        require __DIR__.'/../views/stat.php';
        $main['view'] = ob_get_clean();
        require __DIR__.'/../layouts/default.php';

    }
}

?>