<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $signup = new Signup();
    $signup->handler();
    
}


if (isset($_SESSION["errors_signup"])) {

    $errors = $_SESSION['errors_signup'];
    unset($_SESSION['errors_signup']);
}