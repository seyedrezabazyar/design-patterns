<?php

class Singleton
{
    private static $instance;
    protected function __construct()
    {
    }
    public static function getInstance()
    {
        if (self::$instance == null){
            self::$instance = new static;
        }
        return self::$instance;
    }
}

class Config extends Singleton
{
    public function getData()
    {
        return [
            'host' => '127.0.0.1'
        ];
    }
}

$config = Config::getInstance();
$config1 = Config::getInstance();
//$config2 = new Config(); // Error after protected construct

var_dump($config);
var_dump($config->getData()); // array(1) { 'host' => string(9) "127.0.0.1" }
var_dump($config === $config1); // bool(true)
//var_dump($config === $config2); // bool(false)