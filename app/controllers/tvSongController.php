<?php

namespace App\Controllers;
use App\Src\Db              as Db ;
use App\Models\TvSong       as TvSong ;


class TvSongController
{
    public function listSong($params = null)
    {
        $token = TvSong::checkLogin($_GET);
        if ($token) {

            $main['data'] = Db::getAllTvSong();

            ob_start();
            require __DIR__.'/../views/listAllTvSong.php';
            $main['view'] = ob_get_clean();
        }else{ 
            ob_start();
            require __DIR__.'/../views/loginTvSong.php';
            $main['view'] = ob_get_clean();
        }
        $main['head'] = ['<link rel="stylesheet" href="/css/tvSong.css">'] ;
        require __DIR__.'/../layouts/default.php';
    }
    public function apiAskSong($params = null)
    {
        echo json_encode(Db::getTvSongAskTitle(TvSong::trimVal($_GET['q'])));
    }
    public function upSong($params = null)
    {
        $token = TvSong::checkLogin($_GET);
        if($token){

            $main['data'] = Db::getTvSongWithId($params['id']);
            $main['postLink'] = '/tvsong/up/'.$params['id'].'/'.$token;
            $main['postBtn'] = 'save value';
            ob_start();
            require __DIR__.'/../views/formTvSong.php';
            $main['view'] = ob_get_clean();

        }else{
            ob_start();
            $main['backLink'] = '/tvsong/up/'.$params['id'];
            require __DIR__.'/../views/loginTvSong.php';
            $main['view'] = ob_get_clean();
        }
        $main['head'] = ['<link rel="stylesheet" href="/css/tvSong.css">'] ;
        require __DIR__.'/../layouts/default.php';
    }
    public function upSongPost($params = null)
    {
        $token = TvSong::checkLogin(['t' => $params['token']]);
        if ($token) {
            
            $data= TvSong::checkValue(TvSong::creatStruct($_POST));

            if ($data) {
                Db::upValueTvSong($params['id'],$data);
                header("Location: " . $_SERVER['HTTP_ORIGIN'] ."/tvsong?t=".$token."#i-".$params['id']);
            }else{
                $main['data'][0] = $_POST;
                $main['postLink'] = '/tvsong/up/'.$params['id'].'/'.$token;
                $main['postBtn'] = 'save value';
                ob_start();
                require __DIR__.'/../views/formTvSong.php';
                $main['view'] = ob_get_clean();
            }

        }else{
            ob_start();
            $main['backLink'] = '/tvsong/up/'.$params['id'];
            require __DIR__.'/../views/loginTvSong.php';
            $main['view'] = ob_get_clean();
        }
        $main['head'] = ['<link rel="stylesheet" href="/css/tvSong.css">'] ;
        require __DIR__.'/../layouts/default.php';
    }
    public function delSong($params = null)
    {
        if (TvSong::checkLogin($_GET)) {

            $main['data'] = Db::getTvSongWithId($params['id']);
            $main['postLink'] = '/tvsong/del/'.$params['id'].'/'.$_SESSION['token'];
            $main['postBtn'] = 'delete value';
            $main['option'] = 'disabled';
            ob_start();
            require __DIR__.'/../views/formTvSong.php';
            $main['view'] = ob_get_clean();

        }else{
            ob_start();
            $main['backLink'] = '/tvsong/del/'.$params['id'];
            require __DIR__.'/../views/loginTvSong.php';
            $main['view'] = ob_get_clean();
        }
        $main['head'] = ['<link rel="stylesheet" href="/css/tvSong.css">'] ;
        require __DIR__.'/../layouts/default.php';
    }
    public function delSongPost($params = null)
    {
        if (TvSong::checkLogin(['t' => $params['token']])) {
            Db::delValueTvSong($params['id']);
            header("Location: " . $_SERVER['HTTP_ORIGIN'] ."/tvsong?t=".$_SESSION['token']);
        }else{
            ob_start();
            $main['backLink'] = '/tvsong/del/'.$params['id'];
            require __DIR__.'/../views/loginTvSong.php';
            $main['view'] = ob_get_clean();
        }
        $main['head'] = ['<link rel="stylesheet" href="/css/tvSong.css">'] ;
        require __DIR__.'/../layouts/default.php';
        
    }
    public function createSong($params = null)
    {
        if (TvSong::checkLogin($_GET)) {
            $main['postLink'] = '/tvsong/create/'.$_SESSION['token'];
            $main['postBtn'] = 'create new song';
            ob_start();
            require __DIR__.'/../views/formTvSong.php';
            $main['view'] = ob_get_clean(); 
        }else{
            ob_start();
            $main['backLink'] = '/tvsong/create';
            require __DIR__.'/../views/loginTvSong.php';
            $main['view'] = ob_get_clean();
        }
        $main['head'] = ['<link rel="stylesheet" href="/css/tvSong.css">'] ;
        require __DIR__.'/../layouts/default.php';
    }
    public function createSongPost($params = null)
    {
        $token = TvSong::checkLogin(['t' => $params['token']]);
        if ($token) {
            
            $data= TvSong::checkValue(TvSong::creatStruct($_POST));

            if ($data) {
                Db::postValueTvSong($data);
                header("Location: " . $_SERVER['HTTP_ORIGIN'] ."/tvsong?t=".$token);
            }else{
                $main['data'][0] = $_POST;
                $main['postLink'] = '/tvsong/create/'.$token;
                $main['postBtn'] = 'create new song';
                ob_start();
                require __DIR__.'/../views/formTvSong.php';
                $main['view'] = ob_get_clean();
            }

        }else{
            ob_start();
            $main['backLink'] = '/tvsong/create';
            require __DIR__.'/../views/loginTvSong.php';
            $main['view'] = ob_get_clean();
        }
        $main['head'] = ['<link rel="stylesheet" href="/css/tvSong.css">'] ;
        require __DIR__.'/../layouts/default.php';
    }

}