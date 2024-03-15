<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Core\Session;

use Core\Authenticator;
use Http\Forms\LoginForm;
use function Core\dd;
use function Core\login;
use function Core\redirect;

$errors =[];

$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$signedIn = (new Authenticator)->attempt(
    $form->attributes['email'], $form->attributes['password']
);

if (!$signedIn) {
    $form->error(
        'email', 'No matching account found for that email address and password.'
    )->throw();
}

//$errors = $form->getErrors();

redirect("/");
   