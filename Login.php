<?php
session_start();
include_once "Data/SessionManager.php";

$view = new stdClass();
$view->pageTitle = "Login";
$sessionManager = SessionManager::getInstance();

if (isset($_POST['loginButton'])) {
    $email = htmlentities($_POST['emailSignIn']);
    $enteredPassword = htmlentities($_POST['passwordSignIn']);

        $loginResult = $sessionManager->loginUser($email, $enteredPassword);
        if ($loginResult !== true) {
            //show user and error message
            $view->errorMessage = $loginResult;
    }
}
include "Views/Login.phtml";

