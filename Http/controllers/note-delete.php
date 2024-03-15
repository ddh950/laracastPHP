<?php

use core\Database;
use function core\authorize;
use function core\dd;
use core\App;

    //$config = require("core/config.php");
    //$db = new Database($config['database']);

   $db =App::getContainer("core\Database");

    $currentUserId = 1;

    $note = $db->query('select * from notes where id = :id', [
        'id' => $_GET['id']
    ])->findOrFail();

    authorize($note['users_id'] === $currentUserId);

    $db->query('delete from notes where id = :id', [
        'id' => $_GET['id']
    ]);

    header('location: /notes');
    exit();