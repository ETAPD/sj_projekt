<?php


$session = new Session();
$session->handler();

if (isset($_GET['logout'])) {
    $session->logout();
}