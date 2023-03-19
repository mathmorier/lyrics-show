<?php
namespace App\Controllers;
use App\Src\SearchApi       as SearchApi;
use App\Models\Bible        as Bible;

class BibleController
{
    
    public function index($params = null, $song = null)
    {

        // echo file_get_contents(__DIR__.'/../src/biblesFiles/fr_apee.json');
        // die;

        $main['head'] = [
            '<link rel="stylesheet" href="/css/bible.css">'
        ];
        $main['script'] = [
            '<script src="/js/bible.js"></script>'
        ];

        Bible::getLang();

        Bible::getText();

        ob_start();
        require __DIR__.'/../views/bible.php';
        $main['view'] = ob_get_clean();

        require __DIR__.'/../layouts/default.php';
    }
}
?>