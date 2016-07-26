

<?php
class Database
{
    private static $db_name = "csdl";
    private static $host_name = "localhost";
    private static $user_name = "root";
    private static $pass_word = "123456";
    public static $conn = null;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        die('Init function is not allowed');
    }





    function connect
    public static function connect()
    {
        if (null == self::$conn) {
            try {
                self::$conn = new PDO("mysql:host=" . self::$host_name . ";" . "dbname=" . self::$db_name, self::$user_name, self::$pass_word);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$conn;
    }

 function disconnect
    public static function disconnect()
    {
        self::$conn = null;
    }
    public function read(){
        self::$pdo = Database::connect();
        $sql ="Select * from user";
        $stml= $conn->query($sql);
    }
    public function update(){

    }
}
?>