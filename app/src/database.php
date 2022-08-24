<?php
namespace App\Src;

use PDO;

class Db extends PDO{

    private static $dsn = "mysql:host=localhost:3306;dbname=lyrics";
    private static $user = "root";
    private static $passwd = "";
    private static $db = null ;


    static public function connect()
    {
        self::$db = new PDO(self::$dsn, self::$user, self::$passwd);
    }
    static public function disconnect()
    {
        self::$db = null;
    }

    static public function saveUri($uri = null, $time = 0)
    {
        try {
            $db     = new PDO(self::$dsn, self::$user, self::$passwd);
            $stmt   = $db->prepare("INSERT INTO `request` (`id`, `time`, `uri`) VALUES (NULL, ? , ?);");
            $stmt->execute( [ gmdate("Y-m-d H:i:s", $time ), $uri ] );
            return true;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    static public function getAllRequest($uri = "/%" ,$dStart = '1900-01-30',$dEnd = '2500-01-30')
    {
        $db  = new PDO(self::$dsn, self::$user, self::$passwd);
        $stmt   = $db->prepare("SELECT * FROM request WHERE uri LIKE ? AND ( time BETWEEN ? AND ?)");
        $stmt->execute([$uri,$dStart,$dEnd]); 
        return $stmt->fetchAll();
    }

    static public function getCountAll($uri = "/%",$dStart = '2000-01-30',$dEnd = '2200-01-30')
    {
        $db     = new PDO(self::$dsn, self::$user, self::$passwd);
        $stmt   = $db->prepare("SELECT COUNT(*) FROM request WHERE uri LIKE ? AND ( time BETWEEN ? AND ?) ");
        $stmt->execute([$uri,$dStart,$dEnd]); 
        return $stmt->fetchAll();
    }
    static public function getAllTimeCount($uri = "/%")
    {
        return array(
            'to day'   =>  self::getCountAll($uri,date('Y-m-d'),date("Y-m-d",strtotime(date('Y-m-d')."+ 1 days")))[0][0],
            'yesterday'   =>  self::getCountAll($uri,date("Y-m-d",strtotime(date('Y-m-d')."- 1 days")),date('Y-m-d'))[0][0],
            '1 month'   =>  self::getCountAll($uri,date("Y-m-d",strtotime(date('Y-m-d')."- 1 months")),date('Y-m-d'))[0][0],
            '6 months'   =>  self::getCountAll($uri,date("Y-m-d",strtotime(date('Y-m-d')."- 6 months")),date('Y-m-d'))[0][0],
            '1 year'   =>  self::getCountAll($uri,date("Y-m-d",strtotime(date('Y-m-d')."- 1 years")),date('Y-m-d'))[0][0],
            'all'   =>  self::getCountAll($uri)[0][0]
        );
    }
    static public function getAllTvSong()
    {
        self::connect();
        $stmt   = self::$db->prepare("SELECT * FROM `songtv`");
        $stmt->execute(); 
        self::disconnect();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    static public function getTvSongAskTitle($q = null)
    {
        self::connect();
            $stmt   = self::$db->prepare("SELECT `id`,`title`,`author`,`creator` FROM `songtv` WHERE `title` LIKE ? OR `author` LIKE ? OR `creator` LIKE ? LIMIT 9");
        $stmt->execute(['%'.$q.'%','%'.$q.'%','%'.$q.'%']); 
        self::disconnect();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  
    }
    static public function getTvSongWithId($id = null)
    {
        self::connect();
        $stmt = self::$db->prepare("SELECT * FROM `songtv` WHERE id = ?");
        $stmt->execute([$id]);
        self::disconnect();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    static public function postValueTvSong($struct = [])
    {
        self::connect();
        $stmt   = self::$db->prepare("INSERT INTO `songtv` (`id`, `title`, `author`, `content`, `creator`, `dt`) VALUES (NULL, ?, ?, ?, ?, current_timestamp());");
        $stmt->execute([
            $struct['input']['title']   ?? '',
            $struct['input']['author']  ?? '',
            $struct['input']['content'] ?? '',
            $struct['input']['creator'] ?? ''
        ]); 
        self::disconnect();
        return $stmt->fetchAll();
    }
    static public function upValueTvSong($id = null, $struct = [])
    {
        self::connect();
        $stmt = self::$db->prepare("UPDATE `songtv` SET `title` = ?, `author` = ?, `content` = ?, `creator` = ? WHERE `id` = ?");
        $stmt->execute([
            $struct['input']['title']   ?? '',
            $struct['input']['author']  ?? '',
            $struct['input']['content'] ?? '',
            $struct['input']['creator'] ?? '',
            $id
        ]);
        self::disconnect();
        return $stmt->fetchAll();

    }
    static public function delValueTvSong($id = null)
    {
        self::connect();
        $stmt = self::$db->prepare("DELETE FROM `songtv` WHERE `id` = ?");
        $stmt->execute([$id]);
        self::disconnect();
        return $stmt->fetchAll();
    }


}

?>