<?php

if (isset($_POST['submitLogin'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once '../classes/database.class.php';
    require_once '../classes/login.class.php';
    require_once '../classes/login-controller.class.php';

    $loginController = new LoginController($username, $password);

    $loginController->loginUser();

    //Going back to index page after logging in
    header("location: ../index.php?error=none");
}
