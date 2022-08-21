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
            $stmt->execute(
                array(
                    gmdate("Y-m-d H:i:s",$time),
                    $uri)
                );
            return true;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    static public function getAll($uri = null)
    {
        $db  = new PDO(self::$dsn, self::$user, self::$passwd);
        $stmt   = $db->prepare("SELECT * FROM request");
        $stmt->execute(); 
        return $stmt->fetchAll();
    }

    static public function getCountAll($uri = null)
    {
        $sql    = "SELECT COUNT(*) FROM request ";
        if ($uri) {
            $sql .= "WHERE 'uri'='".$uri."'";
        }
        dump($sql);
        $db     = new PDO(self::$dsn, self::$user, self::$passwd);
        $stmt   = $db->prepare($sql);
        $stmt->execute(); 
        return $stmt->fetchAll();
    }

}

?>