<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $signup = new Login();
    $signup->handler();

}

if (isset($_SESSION["errors_login"])) {

    $errors = $_SESSION['errors_login'];
    unset($_SESSION['errors_login']);

}