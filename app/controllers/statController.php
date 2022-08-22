<?php
namespace App\Controllers;
use App\Src\Db              as Db ;
use App\Models\Stat         as StatModel;

class statController
{
    public function index($params = null)
    {
        // echo "<br>ALL REQUEST COUNT :<br>";
        // $temp = Db::getAllTimeCount();
        // foreach ($temp as $key => $value) {
        //     echo $key." ".$value."<br>";
        // }
        // echo "<br>HOME REQUEST COUNT :<br>";
        // $temp = Db::getAllTimeCount('/');
        // foreach ($temp as $key => $value) {
        //     echo $key." ".$value."<br>";
        // }
        // echo "<br>SONG REQUEST COUNT :<br>";
        // $temp = Db::getAllTimeCount('/lyrics/%');
        // foreach ($temp as $key => $value) {
        //     echo $key." ".$value."<br>";
        // }

        // echo "<br><a href='/'>back home page</a>";


        $main = [
            'head' => [
                '<link rel="stylesheet" href="/css/stat.css">'
            ],
            'script' => [
                '<script src="/js/stat.js"></script>'
            ]
        ];

        $main['data'] = StatModel::getContent();

        ob_start();
        require __DIR__.'/../views/stat.php';
        $main['view'] = ob_get_clean();
        require __DIR__.'/../layouts/default.php';

    }
}

?>