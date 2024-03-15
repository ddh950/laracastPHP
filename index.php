<?php
use Core\Session;
use Core\ValidationException;
use function Core\redirect;

session_start();


require("Core/functions.php");

//require("core/Database.php");

//require("core/Responses.php");

//require("core/router.php");

spl_autoload_register(function ($class) {
  // Core\Database
  $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

  require ("{$class}.php");
});

require ("Bootstrap/bootstrap.php");

$router = new \Core\Router();
$routes = require ('Core/routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];


try{
$router->route($uri, $method);

} catch(ValidationException $e) {

  Session::flash("errors", $e->errors);
  Session::flash('old', $e->old);

return redirect($router->previousUrl());

}
Session::unflash();

//spl_autoload_register(function ($class) {

   // $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
   //require ("core/" .$class. '.php');
 //});

//$id= $_GET["id"];

//$query = "select * from posts where id = 1";

//$posts = $db->query($query)->fetch();




