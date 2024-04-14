<?php

declare(strict_types=1);


function get_username(object $pdo, string $username){

    $query = "SELECT username FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo, string $email){

    $query = "SELECT email FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $username, string $email, string $pwd_1) {

    
    $query = "INSERT INTO users (username, email, pwd) VALUES (:username, :email, :pwd);";
    $stmt = $pdo->prepare($query);

    $options = [
        "cost" => 12,
    ];
    $hashed_pwd = password_hash($pwd_1, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":pwd", $hashed_pwd);
    $stmt->execute();

    
}