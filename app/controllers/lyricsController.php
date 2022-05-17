<?php
namespace App\Controllers;
use App\Src\SearchGenius    as SearchGenius;
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

        $main['src']['searchGenius'] = SearchGenius::index();
        $main['head'][] = SearchGenius::style();
        $main['script'][] = SearchGenius::script("/lyrics");

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
    public function reciveList($params = null)
    {
        $li = new ListLyrics;
        $li->stToArray($params['idList'] ?? "");
        $li->createList();
        dump($li->getListSong());

        // A modifier

    }
    public function addList($params = null)
    {
        echo 'addList';
    }
}

?>