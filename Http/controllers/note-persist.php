<?php

use Core\Database;
use Core\Validator;
use Core\App;

$db =App::getContainer("Core\Database");


    $errors = [];

    if(! Validator::string($_POST["body"], 1, 1000)){

        $errors["body"] = "A body of no more than 1,000 characters is required.";

    }


    if (! empty($errors)) {

        require ("view/note-create.view.php");
    }
        $db->query("INSERT INTO notes(body, users_id)VALUES(:body, :users_id)", [

            "body" => $_POST["body"],
    
            "users_id" => 1
        ]);

        header("location: /notes");

        die();
    
       

  


