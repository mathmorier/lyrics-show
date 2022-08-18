<?php
namespace App\Controllers;
use App\Src\SearchApi   as SearchApi ;
use App\Models\Lyrics   as Lyrics ;


class OsController  
{
    public function index($param=null,$data=null)
    {
        $main = [
            'head' => [
                '<link rel="stylesheet" href="/css/os.css">'
            ],
            'script' => [
            ]
        ];

        $ly = new Lyrics;
        $main['script'][] = $ly->createLinkSave($data['song'] ?? null);

        $main['src']['searchGenius'] = SearchApi::index('/os');
        $main['head'][] = SearchApi::style();
        $main['script'][] = SearchApi::script('/os');

        $main['song'] = $data['song'] ?? null;
     
        ob_start();
        require __DIR__.'/../views/os.php';
        $main['view'] = ob_get_clean();
        require __DIR__.'/../layouts/default.php';

    }
    public function fileShow($params = null)
    {
        $lyrics = new Lyrics;
        $data['song'] = $lyrics->getGenuisSong($params['id']);
        $data['song']->api_path_full = "/xml/os".$data['song']->api_path;
        $this->index(null,$data);

    }
    public function shirShow($params = null)
    {
        $lyrics = new Lyrics();
        $data['song'] = $lyrics->getShirSong($params['id']);
        $data['song']->api_path_full = "http://shir.fr/chant/opensong/".$data['song']->title;
        $this->index(null, $data);

    }
}


?>