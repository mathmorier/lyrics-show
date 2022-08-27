<?php
namespace App\Models;

class TvSong 
{
    static public function creatStruct($post = null, $title = null ,$author = null ,$content = null ,$creator = null )
    {
        return [
            'dataDone'    => false,  
            'msg'         => '',
            'input'       => [
                'title'       => self::trimVal($post['title']),
                'author'      => self::trimVal($post['author']),
                'content'     => self::trimVal($post['content']),
                'creator'     => self::trimVal($post['creator'])
            ]
        ];

    }
    static public function trimVal($data)
        {
            # Vérification anti attaque
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    static public function checkValue($struct)
    {
        foreach ($struct['input'] as $key => $value) {
            $struct['dataDone'] = ($value != '') ? true : false ;
            $struct['msg']      = ($value != '') ? ''   : "error with : ".$key ;
        }

        return $struct['dataDone'] ? $struct : false ;  
    }

    static public function checkLogin($get = null)
    {
        $userOk = 'worship';
        $passOk = 'pass';

        $token = $get['t'] ?? null ;
        $u = $get['u'] ?? null;
        $p = $get['p'] ?? null;

        session_start();

        if (isset($_SESSION['token']) AND $_SESSION['token'] == $token) {
            $_SESSION['token'] = $token = random_int(999,999999);
        }elseif ($u == $userOk AND $p == $passOk){
            $_SESSION['token'] = $token = random_int(999,999999);
        }else{
            $token = false ;
        }

        return $token ;
    }

}
?>