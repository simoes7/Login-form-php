<?php


class Connect
{
    static $host = 'localhost';
    static $user = 'root';
    static $password = '';
    static $db = 'test';

    public function SelectData($r)
    {
        $cnx = new PDO("mysql:host=".self::$host.";dbname=".self::$db, self::$user, self::$password);
        $ex = $cnx->query($r);
        return $ex;
    }

    public function updateData($r)
    {
        $cnx = new PDO("mysql:host=".self::$host.";dbname=".self::$db, self::$user, self::$password);
        $ex = $cnx->exec($r);
        return $ex;
    }
}
?>
