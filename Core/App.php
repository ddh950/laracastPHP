<?php

namespace Core;

use function Core\dd;

class App{

     protected static $container;

    static function setContainer($fillcontainer){

        static::$container = $fillcontainer;
    
    }


    static function getContainer($key){

        return static::$container->resolver($key);

    }

}