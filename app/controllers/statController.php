<?php
namespace App\Controllers;
use App\Src\Db              as Db ;

class statController
{
    public function index($params = null)
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