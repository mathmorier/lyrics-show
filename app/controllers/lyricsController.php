<?php
namespace App\Controllers;
use App\Src\SearchApi       as SearchApi;
use App\Models\Lyrics       as Lyrics;
use App\Models\ListLyrics   as ListLyrics;

class LyricsController
{
    public function index($params = null, $song = null)
    {

        $main['head'] = [
            '<link rel="stylesheet" href="/css/lyrics.css">'
        ];
        $main['script'] = [
            '<script src="/js/lyrics.js"></script>'
        ];

        $lyrics = new Lyrics;
        $main['script'][] = $lyrics->createLinkSave($song);

        $main['src']['searchGenius'] = SearchApi::index("/lyrics");
        $main['head'][] = SearchApi::style();
        $main['script'][] = SearchApi::script("/lyrics");

        $main['api_path'] = $song->api_path ?? ""; 

        ob_start();
        require __DIR__.'/../views/lyrics.php';
        $main['view'] = ob_get_clean();

        require __DIR__.'/../layouts/default.php';
    }

    public function firstShow($params)
    {
        $lyrics = new Lyrics;
        $song = $lyrics->getGenuisSong($params['id']);
        $this->index(null,$song);

    }
    public function shirShow($params)
    {
        $lyrics = new Lyrics;
        $song = $lyrics->getShirSong($params['id']);
dump($song);

        // $this->index(null,$song);

    }
    public function reciveList($params = null)
    {
        $li = new ListLyrics;
        $li->stToArray($params['idList'] ?? "");
        $li->createList();
        $main['list'] = $li->getListSong();

        $main['head'] = [
            '<link rel="stylesheet" href="/css/lyrics.css">',
            '<link rel="stylesheet" href="/css/reciveList.css">',
        ];
        $main['script'] = [
            '<script src="/js/lyrics.js"></script>'
        ];

        $main['script'][] = $li->saveNewList();
        

        ob_start();
        require __DIR__.'/../views/listLyrics.php';
        $main['view'] = ob_get_clean();

        require __DIR__.'/../layouts/default.php';


    }
    public function addList($params = null)
    {
        echo 'addList';
    }
}

?>