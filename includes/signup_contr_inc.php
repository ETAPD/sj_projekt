<?php

declare(strict_types=1);

function is_input_empty(string $username, string $email, string $pwd_1, string $pwd_2) {

    if (empty($username) || empty($email) || empty($pwd_1) || empty($pwd_2)) {

        return true;
    } else {

        return false;
    }
}

function is_email_invalid(string $email) {

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        return true;
    } else {
        
        return false;
    }
}

function is_username_taken(object $pdo, string $username) {

    if (get_username($pdo, $username)) {

        return true;
    } else {
        
        return false;
    }
}

function is_email_taken(object $pdo, string $email) {

    if (get_email($pdo, $email)) {

        return true;
    } else {
        
        return false;
    }
}