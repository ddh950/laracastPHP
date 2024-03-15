<?php

namespace Core;

/*return [

    "/" => "/dashboard.php",
    "/about" => "/about.php",
    "/home" => "/home.php",
    "/notes" => "/notes.php",
    "/note" => "/note.php",
    "/note-create" => "/notes-create.php"             
];
*/


$router->get('/', '/dashboard.php');
$router->get('/home', '/home.php');
$router->get('/about', '/about.php');

$router->get('/notes', '/notes-show.php')->only("auth");
$router->get('/note', '/note-show.php');
$router->post("/note-create", "/note-persist.php");
$router->delete('/note', '/note-delete.php');
$router->get('/note-create', '/note-create.php');

$router->get('/note-edit', '/note-edit.php');
$router->patch('/note-edit', '/note-update.php');

$router->get("/register", "/registration/create.php")->only("guest");
$router->post("/register", "/registration/store.php");

$router->get("/login", "/session/create.php")->only("guest");
$router->post('/session', '/session/store.php')->only('guest');
$router->delete('/session', '/session/delete.php')->only('auth');