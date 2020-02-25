<?php
/**
 * Example Singleton
 */
final class Db
{
    public $something;
    private static $DbCon;

    public static function getConnection(){
        try{
            if(!self::$DbCon){
                self::$DbCon = new PDO('dsn', 'user', 'password', 'dbname');
            }
            return self::$DbCon;
        } catch(PDOException $e){
            //Handle error
        }
    }
}

$dbconn = Db::getConnection();