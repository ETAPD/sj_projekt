<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $signup = new Signup();
    $signup->handler();
    
}

$errors = $_SESSION['errors_signup'];
unset($_SESSION['errors_signup']);

if (isset($_SESSION["errors_signup"])) {

}