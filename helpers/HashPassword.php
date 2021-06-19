<?php


class HashPassword
{

    public static function getHashPassword ($password){
        $options = parse_ini_file("./Config/password.ini");
        var_dump($options);
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

}