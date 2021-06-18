<?php
class DataBase{

    public function __construct($servername, $username, $password, $dbname){
        $this->connexion  = mysqli_connect($servername, $username, $password, $dbname)
        or die("Connection failed: " . mysqli_connect_error());
    }


    public function __destruct(){
        mysqli_close($this->connexion);
    }

    public function query($sql){
        $result = mysqli_query($this->connexion, $sql);
        $resultAsAssocArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $resultAsAssocArray;
    }

}
?>