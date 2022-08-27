<?php
namespace App\Controllers;
use App\Src\Db              as Db ;

class SongTVController
{
    public function create($params = null)
    {

        $main = [
            'head' => [
                '<link rel="stylesheet" href="/css/create.css">'
            ],
            'script' => [
                '<script src="/js/create.js"></script>'
            ]
        ];

        if (isset($params['success'])) {
            $params['msg'] = '';
            $params['msg'] = ($params['success'] == 1) ? 'the song is save' : $params['msg'] ;
            $params['msg'] = ($params['success'] == 2) ? 'you need to complete all entry' : $params['msg'] ;
        }

        ob_start();
        require __DIR__.'/../views/formSong.php';
        $main['view'] = ob_get_clean();
        require __DIR__.'/../layouts/default.php';
    }
    public function createPost($params = null)
    {
        $postTrime = [];
        foreach ($_POST as $key => $value) {
            $postTrime += [$key => checkImput($value)];
        }
        
        $params['done'] = true ;
        if (isset($postTrime['title']  ) AND $postTrime['title']     != ''   ){ $params['title'] = $postTrime['title']; }else{ $params['done'] =  false; }  
        if (isset($postTrime['author'] ) AND $postTrime['author']    != ''   ){ $params['author'] = $postTrime['author']; }else{ $params['done'] =  false;   }
        if (isset($postTrime['content']) AND $postTrime['content']   != ''   ){ $params['content'] = $postTrime['content']; }else{ $params['done'] =  false;   }
        if (isset($postTrime['creator']) AND $postTrime['creator']   != ''   ){ $params['creator'] = $postTrime['creator']; }else{ $params['done'] =  false;   }

        if ($params['done']) {
            Db::postValueTvSong($postTrime['title'],$postTrime['author'],$postTrime['content'],$postTrime['creator']);
            header("Location: " . $_SERVER['HTTP_ORIGIN'] ."/create/1");
        }else{
            $params['success'] = 2;
            $this->create($params);
        }
    }
}
?>