<?php
namespace App\Controllers;
use App\Src\SearchApi       as SearchApi;
use App\Models\Bible        as Bible;

class BibleController
{

    
    public function index($params = null, $main = [])
    {

        $main['head'] = [
            '<link rel="stylesheet" href="/css/bible.css">'
        ];
        $main['script'] = [
            '<script src="/js/bible.js"></script>'
        ];

        ob_start();
        require __DIR__.'/../views/bible.php';
        $main['view'] = ob_get_clean();

        require __DIR__.'/../layouts/default.php';
    }
    public function bibleSelect($params = null)
    {
        $bible = new Bible ;
        $main['biblesList'] = $bible->getAllVersions();

        $this->index($params, $main);
    }
    public function bibleShow($params = null)
    {
        $bible = new Bible ;
        $bible->setVersion($params['version']);

        $main['bible'] = $bible->getBible();
        $main['bibleVersion'] = $bible->getVersion();

        $this->index($params, $main);
    }
    public function bibleBookShow($params = null)
    {
        $bible = new Bible ;
        $bible->setVersion($params['version']);
        $bible->setBook($params['book']);

        $main['book'] = $bible->getBook();

        $main['bibleVersion'] = $bible->getVersion();
        $this->index($params, $main);

    }
    public function bibleBookShowPart($params = null)
    {
        $bible = new Bible ;
        $bible->setVersion($params['version']);
        $bible->setBook($params['book']);
        $bible->setReference($params['reference']);

        $main['book'] = $bible->getReference();

        




        $main['bibleVersion'] = $bible->getVersion();
        $this->index($params, $main);

    }
    public function apiAskBible($params = null)
    {
        $bible = new Bible;
        $bible->setVersion($params["version"]??'en_kjv');
        $bible->setBook($params['book'] ?? null);
        $bible->setReference($params['reference'] ?? null);

        if (isset($params["reference"])) {
            $data = $bible->getReference();
        }else if (isset($params["version"])) {
            $data = $bible->getBibleStruct();
        }else {
            $data = $bible->getAllVersions();
        }
        echo json_encode($data);
    }
}
?>