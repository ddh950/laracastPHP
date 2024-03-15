<?php

namespace Core;

class Container{

    protected $bindings = [];


    function bind($key, $factoryFunction){

        $this->bindings[$key] = $factoryFunction;
 
    }

    function resolver($key){

        if(!array_key_exists($key, $this->bindings)) {

        echo "No matching binding found for {$key}";

        }

        $resolver = $this->bindings[$key];

        return call_user_func($resolver);

    }


}