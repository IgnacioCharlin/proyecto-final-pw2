<?php
class DataBase{
    private $conection;

    public function __construct($servername, $username, $password, $dbname){
        $this->conection  = mysqli_connect($servername, $username, $password, $dbname)
        or die("Connection failed: " . mysqli_connect_error());
    }

    public function __destruct(){
        mysqli_close($this->conection);
    }

    public function query($sql){
        $result = mysqli_query($this->conection, $sql);
        $resultAsAssocArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
//        var_dump($resultAsAssocArray);
        return $resultAsAssocArray;
    }
    public static function createDatabaseFromConfig(Config $config){
        return new Database(
            $config->get( "database","servername"),
            $config->get("database","username"),
            $config->get("database","password"),
            $config->get("database","dbname")
        );
    }
    public function insert($sql) {
        return mysqli_query($this->conection, $sql);
    }
}
?>