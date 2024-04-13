<?php

    $dsn = 'mysql:host=localhost;dbname=database';
    $dbusername = "root";
    $dbpassword = "root";

    try {

        $pdo = new PDO($dsn, $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $error) {

        echo "Pripojenie zlyhalo: " . $error->getMessage();

    }