<?php

declare(strict_types=1);

$signup = new Signup();
$signup->handler();
class Signup {

    private $errors_signup;
    private $pdo; 
    

    public function __construct() {
        
        try {
    
            $this->pdo = new PDO('mysql:host=localhost;dbname=database', "root", "root");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        } catch (PDOException $error) {
    
            echo "Pripojenie zlyhalo: " . $error->getMessage();
    
        }
    }

    public function handler() {
        
        
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
                
            $username = $_POST["username"];
            $pwd_1 = $_POST["pwd_1"];
            $pwd_2 = $_POST["pwd_2"];
            $email = $_POST["email"];

            try{
                    
                $errors = [];
                if ($this->is_input_empty($username, $email, $pwd_1, $pwd_2)) {
                    $errors["empty_input"] = "Fill in all fields!";
                }
                if ($this->is_email_invalid($email)) {
                    $errors["invalid_email"] = "Invalid email!";
                }
                if ($this->is_username_taken($username)) {    
                    $errors["username_taken"] = "Username already taken!";            
                }
                if ($this->is_email_taken($email)) {      
                    $errors["email_used"] = "Email already used!";            
                }
                
                if ($pwd_1 === $pwd_2){
                    $pwd = $pwd_1;
                } else{
                    echo "Heslá sa nezhodujú";
                    die();
                }

                if ($errors) {

                    $this->errors_signup = $errors;
                    
                    
                    header("Location: ../signup.php");
                    die();
                }

                $this->create_user($username, $email, $pwd);
                header("Location: ../signup.php?signup=success");
                

                $this->pdo = null;
                $stmt = null;
                die();

            } catch (PDOException $error) {
                echo "Dotaz zlyhal: " . $error->getMessage();
            }  
        } else {

            header("Location: signup.php");
            die();
        }
        
    }

    private function check_signup() {
        if (isset( $this->errors_signup)) {

            $errors =  $this->errors_signup;
            echo "<br>";
            
            foreach ($errors as $error) {
                echo '<p class="form-error">' . $error . "</p>";
                
            }

        } elseif (isset($_GET["signup"]) && $_GET["signup"] === "success") {
            
            echo '<p class="form-success">' . $_SESSION["signup_success"] . "</p>";
            echo "ahoj";
            
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
        return $result === [];
    }
    
    private function is_email_taken(string $email) {
    
        $query = "SELECT email FROM users WHERE email = :email;";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result === [];
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

    

}