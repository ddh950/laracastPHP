<?php 

use Core\Database;
use Core\Responses;
use Core\Validator;
use Core\functions;
use function Core\authorize;
use Core\App;

$currentUserId = 1;

$db =App::getContainer("Core\Database");

$heading = "Note";
 
$id = $_GET["id"];

    $note = $db->query('select * from notes where id = :id', [
        'id' => $_GET['id']
    ])->findOrFail();
    

authorize($note["users_id"] === $currentUserId, Responses::NOT_ALLOWED);

require ('view/note.view.php');

?>

