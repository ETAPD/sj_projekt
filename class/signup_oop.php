<?php

declare(strict_types=1);
require_once 'db_oop.php';



class Signup extends Database{

    private $errors_signup;
    
    
    public function handler() {
        
        
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
                
            $username = $_POST["username"];
            $pwd_1 = $_POST["pwd_1"];
            $pwd_2 = $_POST["pwd_2"];
            $email = $_POST["email"];

            try{
                    
                $errors = [];
                if ($this->is_input_empty($username, $email, $pwd_1, $pwd_2)) {
                    $errors["empty_input"] = True;
                }
                if ($this->is_email_invalid($email)) {
                    $errors["invalid_email"] = True;
                } elseif ($this->is_email_taken($email)) {      
                    $errors["email_used"] = True;
                    }
                if ($this->is_username_taken($username)) {    
                    $errors["username_taken"] = True;            
                }
                
                if ($pwd_1 === $pwd_2){
                    $pwd = $pwd_1;
                } else {
                    $errors["pwd_not_match"] = True;
                }

                

                if ($errors) {
                    $this->errors_signup = $errors;
                    $this->invalid_input();
                    header("Location: signup.php");
                    echo "Nastala chyba";
                    $this->disconnect();
                    die();
                    
                    
                }else{

                    $this->create_user($username, $email, $pwd);
                    header("Location: signup.php?signup=success");
                    $this->disconnect();
                    $stmt = null;
                    die();

                }

                
            } catch (PDOException $error) {
                die( "Dotaz zlyhal: " . $error->getMessage());
            }  
        } else {

            header("Location: signup.php");
            die();
        }
        
    }

    private function is_input_empty(string $username, string $email, string $pwd_1, string $pwd_2) {

        if (empty($username) || empty($email) || empty($pwd_1) || empty($pwd_2)) {
    
            return true;
        } else {
    
            return false;
        }
    }

    private function is_email_invalid(string $email) {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    
            return true;
        } else {
            
            return false;
        }
    }
    
    private function is_username_taken(string $username) {
    
        $query = "SELECT username FROM users WHERE username = :username;";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
    private function is_email_taken(string $email) {
    
        $query = "SELECT email FROM users WHERE email = :email;";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
    private function create_user(string $username, string $email, string $pwd) {
    
        $query = "INSERT INTO users (username, email, pwd) VALUES (:username, :email, :pwd);";
        $stmt = $this->pdo->prepare($query);

        $options = [
            "cost" => 12,
        ];
        $hashed_pwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":pwd", $hashed_pwd);
        $stmt->execute();  
    }

    private function invalid_input() {

        $errors = $this->errors_signup;
        $error = [];
        
        if ($errors["empty_input"] === True) {
            $error['emptyError'] = "Prázdne pole";
        }
        if ($errors["invalid_email"] === True) {
            $error['emailError'] = "Neplatný email";
        }
        if ($errors["username_taken"] === True) {    
            $error['usernameError'] = "Používateľské meno je už obsadené";
        }
        if ($errors["email_used"] === True) {      
            $error['emailError'] = "Email je už použitý";
        }
        if ($errors["pwd_not_match"] === True) {
            $error['pwdError'] = "Heslá sa nezhodujú";
        }
        
        $_SESSION['errors_signup'] = $error;
    }

    private function signup_input() {


    }

}

