<?php

class Session {

    private $interval = 60 * 30;

    public function __construct() {
        
        ini_set("session.use_only_cookies", 1);
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

        if (isset($_SESSION["user_id"])) {
            
            if (!isset($_SESSION["regeneration_time"])) {

                $_SESSION["regeneration_time"] = time();
                $this->login_session();
    
            } elseif (time() - $_SESSION["regeneration_time"] >= $this->interval) {
                
                $_SESSION["regeneration_time"] = time();
                
                
            }
        } else {

            if (!isset($_SESSION["regeneration_time"])) {

                $_SESSION["regeneration_time"] = time();
                $this->guest_session();

            } elseif (time() - $_SESSION["regeneration_time"] >= $this->interval) {
                
                $this->guest_session();
                
            }
        }
    }

    private function guest_session() {

        session_regenerate_id(true);
        $_SESSION["regeneration_time"] = time();
        
    }

    private function login_session() {

        session_regenerate_id();
        $user_id = $_SESSION["user_id"];
        session_id(session_create_id() . "_" . $user_id);
        $_SESSION["regeneration_time"] = time();

    }

    public function logout() {

        session_unset();
        session_destroy();
        session_write_close();
        setcookie(session_name(), "", 0, "/");
        $this->guest_session();

    }
}