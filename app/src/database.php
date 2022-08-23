<?php
namespace App\Src;

use PDO;

class Db extends PDO{

    private static $dsn = "mysql:host=localhost:3306;dbname=lyrics";
    private static $user = "root";
    private static $passwd = "";

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

    static public function getAll($uri = "/%" ,$dStart = '1900-01-30',$dEnd = '2500-01-30')
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

}

?>