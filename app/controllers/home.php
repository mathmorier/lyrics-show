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
    public function stat($params = null)
    {
        echo "<br>ALL REQUEST COUNT :<br>";
        $temp = Db::getAllTimeCount();
        foreach ($temp as $key => $value) {
            echo $key." ".$value."<br>";
        }
        echo "<br>HOME REQUEST COUNT :<br>";
        $temp = Db::getAllTimeCount('/');
        foreach ($temp as $key => $value) {
            echo $key." ".$value."<br>";
        }
        echo "<br>SONG REQUEST COUNT :<br>";
        $temp = Db::getAllTimeCount('/lyrics/%');
        foreach ($temp as $key => $value) {
            echo $key." ".$value."<br>";
        }

        echo "<br><a href='/'>back home page</a>";

    }
}

?>