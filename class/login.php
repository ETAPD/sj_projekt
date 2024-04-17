<?php

declare(strict_types=1);

class Login {

    public function __construct() {
        
        require_once '../includes/dbh_inc.php';
    }

    public function handler() {

        if (($_SERVER["REQUEST_METHOD"]) === "POST") {

            $username = $_POST["username"];
            $pwd = $_POST["pwd"];

            try{

                $errors = [];
                if ($this->is_input_empty($username, $pwd)) {
                    $errors["empty_input"] = "Prosím, vyplňte všetky požadované polia!";
                }

                if ($this->login_control($username, $pwd)) {
                    $errors["login_failed"] = "Vaše zadané údaje pre používateľské meno a heslo boli nesprávne. Prosím, skontrolujte a zadajte ich znova.";
                }
                
                if ($errors) {

                    $this->errors_signup = $errors;
                    header("Location: ../signup.php");
                    die();
                }

    

            } catch (PDOException $error) {
                die( "Dotaz zlyhal: " . $error->getMessage());
            }  
        }
    }

    private function is_input_empty(string $username, string $pwd) {

        if (empty($username) || empty($pwd))  {
    
            return true;
        } else {
    
            return false;
        }
    }

    private function get_user(string $username) {

        $query = "SELECT * FROM users WHERE username = :username and pwd = :pwd";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
        
    }

    private function login_control(string $username, string $pwd) {

        $user= $this->get_user(string $username);

        if ($user) {

            if (passwrod_verify($pwd, $user["pwd"])) {
                return false;
            } else {
                return true;
            }
        }
    }

    private function session(string $username) {

        require_once("session.php");
        $user = $this->get_user($username);
        session_id(session_create_id() . "_" . $user["id"]);
        $_SESSION["regeneration_time"] = time();

    }
}