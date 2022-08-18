<?php
namespace App\Src;

use PDO;

class Db extends PDO{

    static public function analytics($uri = null, $time = 0)
    {
        try {
            $dsn = "mysql:host=localhost:3306;dbname=lyrics";
            $user = "root";
            $passwd = "";
            $pdo = new PDO($dsn, $user, $passwd);
            $sql = "INSERT INTO `request` (`id`, `time`, `uri`) VALUES (NULL, '".gmdate("Y-m-d H:i:s",$time)."', '".$uri."');" ;
            $pdo->query($sql);
            return true;
        } catch (\Throwable $th) {
            return $th;
        }
    }
    static public function info()
    {
        try {
            $dsn = "mysql:host=localhost:3306;dbname=lyrics";
            $user = "root";
            $passwd = "";
            $pdo = new PDO($dsn, $user, $passwd);
            $sql = "SELECT count(*) FROM request WHERE uri='/'" ;
            $res = $pdo->query($sql);
            return $res ;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    // Select count(*) From lyrics.request Where uri="/"


}

?>