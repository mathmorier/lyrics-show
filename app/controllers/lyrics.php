<?php
namespace App\Controllers;

class Lyrics
{
    public function index($params = null, $song = null)
    {

        require __DIR__.'/../models/lyrics.php';

        $main['head'] = [
            '<link rel="stylesheet" href="/css/lyrics.css">',
            '<link rel="stylesheet" href="/css/searchBar.css">'
        ];
        $main['script'] = [
            '<script src="/js/lyrics.js"></script>'
        ];

        ob_start();
        require __DIR__.'/../views/lyrics.php';
        $main['view'] = ob_get_clean();

        require __DIR__.'/../layouts/default.php';
    }

    public function firstShow($params)
    {

        require __DIR__.'/../models/lyricsFristShow.php';

        $this->index(null,$song);


    }
}

?>