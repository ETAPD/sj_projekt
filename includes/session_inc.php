<?php
    ini_set("session.use_only_cokies", 1);
    ini_set("session.use_strict_mode", 1);

    session_set_cookie_params([
        "lifetime" => 60 * 30,
        "domain" => "localhost",
        "path" => "/",
        "secure" => true,
        "httponly" => true
    ]);

    session_start();
    
    $interval = 60 * 30;

    if (!isset($_SESSION["regeneration_time"])) {

        session_regenerate_id(true);
        $_SESSION["regeneration_time"] = time();

    } elseif (time() - $_SESSION["regeneration_time"] >= $interval) {
        
        session_regenerate_id(true);
        $_SESSION["regeneration_time"] = time();
    }

   