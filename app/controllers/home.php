<?php
namespace App\Controllers;
use App\Models\Home         as HomeModel ;
use App\Src\SearchApi       as SearchApi ;
use App\Src\Db              as Db ;

class Home
{
    public function index($params)
    {
        $main = [
            'head' => [
                '<link rel="stylesheet" href="/css/home.css">'
            ],
            'script' => [
                '<script src="/js/home.js"></script>'
            ]
        ];


        $main['src']['searchShir'] = SearchApi::index();
        $main['head'][] = SearchApi::style();
        $main['script'][] = SearchApi::script("/lyrics");
     


        $data = HomeModel::getData();

        ob_start();
        require __DIR__.'/../views/home.php';
        $main['view'] = ob_get_clean();
        require __DIR__.'/../layouts/default.php';
    }
    public function analyse($params = null)
    {
        // ANALYSE
        dump(Db::info());
        
    }
}

?>