<?php
class Database
{
    private static $dbName = 's145878' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 's145878';
    private static $dbUserPassword = 'BAY890oLM';
     
    private static $cont  = null;
     
    public function __construct() {
        die('Funkcja Init nie jest dozwolona');
    }
     
    public static function connect()
    {
       // Jedno połaczenie za pośrednictwem aplikacji
       if ( null == self::$cont )
       {     
        try
        {
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
        }
        catch(PDOException $e)
        {
          die($e->getMessage()); 
        }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>
        
