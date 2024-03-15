<?php 

use Core\Database;
use function Core\dd;
use Core\App;

$db =App::getContainer("Core\Database");

$heading = "Notes";



$notes = $db->query("select * from notes")->findAll(); 



require ('view/notes.view.php');

?>