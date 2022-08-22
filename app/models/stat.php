<?php
namespace App\Models ;
use App\Src\Db              as Db ;

class Stat
{
    static public function getContent()
    {
        
        $temp = [
            'all page count'                => Db::getAllTimeCount('/%'),
            'home page count'               => Db::getAllTimeCount('/'),
            'lyrics page count'             => Db::getAllTimeCount('/lyrics/%'),
            'opensong page count'           => Db::getAllTimeCount('/os/%'),
            'opensong genius download count'=> Db::getAllTimeCount('/xml/os/%')
        ];

        return $temp;

    }
}

?>