<?php
namespace App\Models;
use SimpleXMLElement;

class Xml  
{
    static function create($lyrics = null, $song = null)
    {
        if ($lyrics) {
    
            $lyricsString = "";
            $lineCount = 0;
    
            foreach ($lyrics as $key => $value) {
                if (!str_contains( $value , '[')) {
                    $lyricsString.=" " ;
                    $lineCount += 1;
                }else {
                    $lineCount = 0;
                    $lyricsString.="\r\n";
                }
    
    
    
                if ($lineCount >= 5) {
                    $lyricsString.="||\r\n ";
                    $lineCount = 0;
                }
                $lyricsString.=$value.="\r\n";
            }
    
            
    
    
            $xml = new SimpleXMLElement('<song/>');
            $xml->addChild('title', $song->title ?? 'no-title');
            $xml->addChild('lyrics' , $lyricsString);
            $xml->addChild('author' , $song->artist_names ?? 'no-autor');
            $xml->addChild('copyright');
            $xml->addChild('hymn_number');
            $xml->addChild('presentation');
            $xml->addChild('ccli');
            $xml->addChild('capo');
            $xml->addChild('key');
            $xml->addChild('key_line');
            $xml->addChild('user1');
            $xml->addChild('user2');
            $xml->addChild('user3');
            $xml->addChild('theme');
            $xml->addChild('linked_songs');
            $xml->addChild('tempo');
            $xml->addChild('time_sig');
            $xml->addChild('backgrounds');
    
    
    
            // $xml->asXML("aaTest");
    
    
            return $xml->asXML() ;
        }else {
            return null ;
        }
    }
}



?>