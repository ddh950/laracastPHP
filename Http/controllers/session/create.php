<?php
use Core\Session;

$errors = Session::get("errors");

$heading = "Log In";

require ("view/session/create.view.php");