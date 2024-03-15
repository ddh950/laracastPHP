<?php
namespace Core;



function dd($value){

   echo "<pre>";
   var_dump($value);
   echo"<pre>";
    die();

}

function abort($code = 404){
    http_response_code($code);
    require ("view/{$code}.php");

    die();
}


function authorize($condition, $status = Responses::NOT_FOUND){

    if (! $condition) {

        abort($status);
    }

}

function view($path, $attributes = [])
{
    extract($attributes);

    require ('views/' . $path);
}

function redirect($path)
{

    header("location: {$path}");
    exit();

}

function old($key, $default = '')
{
    return Core\Session::get('old')[$key] ?? $default;
}