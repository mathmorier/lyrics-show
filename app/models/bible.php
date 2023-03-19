<?php
namespace App\Models;

class Bible
{
    static function getIndexFile()
    {
        return json_decode(file_get_contents(__DIR__.'/../src/bibles/index.json'));
    }

    static function getBibleFile($bibleVersion = "en_kjv")
    {
        return json_decode(file_get_contents(__DIR__.'/../src/bibles/'.$bibleVersion.'.json'));
    }
    
    static function getLang()
    {     
        $index = self::getIndexFile();
        foreach ($index as $key => $value) {
            dump($value);
            dump($value->language);
        }
    }

    static function getText()
    {
        // dump( self::getBibleFile());
        foreach (self::getBibleFile('fr_apee') as $key => $value) {
            dump($value->name);
        }
    }

}
?>