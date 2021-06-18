<?php


class Config{
    private $config;

   public function __construct($configDB)
   {
       $this->config = parse_ini_file($configDB, true);
   }

    private static function getConfigurationParameters(){

        return parse_ini_file("./Config/config.ini");

    }
    public function get($section,$key){
        return $this->config[$section][$key];
    }

}

?>