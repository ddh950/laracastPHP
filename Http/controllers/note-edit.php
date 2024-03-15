<?php

use Core\App;
use function Core\authorize;
use Core\Responses;

$db =App::getContainer("Core\Database");

$heading = "Edit the Note";

$currentUserId = 1;

$id = $_GET["id"];

    $note = $db->query('select * from notes where id = :id', [
        'id' => $_GET['id']
    ])->findOrFail();
    
authorize($note["users_id"] === $currentUserId, Responses::NOT_ALLOWED);

require ("view/note-edit.view.php");