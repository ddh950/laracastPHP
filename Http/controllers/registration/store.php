<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Core\functions;
use function Core\dd;
use function Core\login;


$db = App::getContainer(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if (!Validator::email($email)) {
   $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least seven characters.';
}

if (! empty($errors)) {
    return require ('view/registration/create.view.php');
}

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    header('location: /');
    exit();
} else {
    $db->query('INSERT INTO users(password, email) VALUES(:password, :email)', [
        'password' => password_hash($password, PASSWORD_BCRYPT), 
        'email' => $email
        // NEVER store database passwords in clear text. We'll fix this in the login form episode. :)
    ]);


    login([
        'email' => $email
    ]);

    header('location: /');

    exit();
}