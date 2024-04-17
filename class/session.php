<?php
session_start();
class Session {

    private $interval = 60 * 30;

    public function __construct() {
        
        ini_set("session.use_only_cokies", 1);
        ini_set("session.use_strict_mode", 1);

        session_set_cookie_params([
            "lifetime" => 60 * 30,
            "domain" => "localhost",
            "path" => "/",
            "secure" => true,
            "httponly" => true,
        ]);

        session_start();
    
    }

    public function handler() {


    }

    private function guest_session() {

        if (!isset($_SESSION["regeneration_time"])) {

            session_regenerate_id(true);
            $_SESSION["regeneration_time"] = time();

        } elseif (time() - $_SESSION["regeneration_time"] >= $this->$interval) {
            
            session_regenerate_id(true);
            $_SESSION["regeneration_time"] = time();
            
        }
    }

    private function login_session() {


    }
}