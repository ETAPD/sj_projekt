<?php

class Session {

    private $interval = 60 * 60 * 3;

    public function __construct() {
        
        session_start();
        if (isset($_SESSION["user_id"]) and (!isset($_SESSION["session_true"]))) {
            $_SESSION["session_true"] = True;
            session_regenerate_id();

        } elseif (!isset($_SESSION["user_id"]) and (!isset($_SESSION["session_faĺse"]))) {
            $_SESSION["session_faĺse"] = False;
            session_regenerate_id(true);
        } 
    }

    public function logout() {

        session_unset();
        session_destroy();
        session_write_close();
        setcookie(session_name(), "", 0, "/");
        session_create_id();

    }
}