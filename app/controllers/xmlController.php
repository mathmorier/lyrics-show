<?php
namespace App\Controllers;
use App\Models\Lyrics as Lyrics;
use App\Models\Xml as Xml;

class XmlController  
{
    public function osDown($param = null)
    {
        $lyrics = new Lyrics ;
        $song = $lyrics->getGenuisSong($param['id']);
        $xmlFile = Xml::create($lyrics->getLyricsToGenuis($param['id']), $song);
        header("Content-type: text/plain");
        header("Content-Disposition: attachment; filename=".$song->title);
        echo $xmlFile;
    }
}


?>
