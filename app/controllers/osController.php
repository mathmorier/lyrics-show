<?php
namespace App\Controllers;
use App\Src\SearchGenius    as SearchGenius ;
use App\Models\Lyrics as Lyrics ;


class OsController  
{
    public function index($param=null,$data=null)
    {
        $main = [
            'head' => [
                '<link rel="stylesheet" href="/css/os.css">'
            ],
            'script' => [
                '<script src="/js/os.js"></script>'
            ]
        ];


        $main['src']['searchGenius'] = SearchGenius::index('/os');
        $main['head'][] = SearchGenius::style();
        $main['script'][] = SearchGenius::script('/os');

        $main['song'] = $data['song'] ?? null;
     
        ob_start();
        require __DIR__.'/../views/os.php';
        $main['view'] = ob_get_clean();
        require __DIR__.'/../layouts/default.php';

    }
    public function fileShow($param = null)
    {
        $lyrics = new Lyrics();

        $data['song'] = $lyrics->getGenuisSong($param['id']);

        $this->index(null, $data);
    }
}


?>