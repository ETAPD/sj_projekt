<?php

declare(strict_types=1);
require_once 'db_oop.php';

class Login extends Database{

    private $errors_login = [];

    public function handler() {

        if (($_SERVER["REQUEST_METHOD"]) === "POST") {

            $username = $_POST["username"];
            $pwd = $_POST["pwd"];

            try{

                $errors = [];
                if ($this->is_input_empty($username, $pwd)) {
                    $errors["empty_input"] = True;
                }

                if ($this->login_control($username, $pwd)) {
                    $errors["login_failed"] = True;
                }
                
                if ($errors) {

                    $this->errors_login = $errors;
                    $this->invalid_input();
                    header("Location: login.php");
                    die();
                }

                $this->session($username);
                $this->disconnect();
                header("Location: index.php");
                $stmt = null;
                die();
                
                

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

        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
        
    }

    private function login_control(string $username, string $pwd) {


        $user= $this->get_user($username);

        if ($user) {

            if (password_verify($pwd, $user["pwd"])) {
                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }

    private function invalid_input() {

        $errors = $this->errors_login;
        $error = [];
        
        if ($errors["empty_input"] === True) {
            $error['emptyError'] = "Prázdne pole";
        }
        if ($errors["login_failed"] === True) {
            $error['loginError'] = "Nesprávne prihlasovacie údaje";
        }
        /*if ($errors["username_taken"] === True) {    
            $error['usernameError'] = "Používateľské meno je už obsadené";
        }
        if ($errors["email_used"] === True) {      
            $error['emailError'] = "Email je už použitý";
        }*/
        $_SESSION['errors_login'] = $error;
        header("Location: index.php");
        
    }

    private function session(string $username) {

        $user = $this->get_user($username);
        session_id(session_create_id() . "_" . $user["user_id"]);
        $_SESSION["user_id"] = $user["user_id"];
        $_SESSION["username"] = htmlspecialchars($user["username"]);
        $_SESSION["regeneration_time"] = time();
        
        
    }
}