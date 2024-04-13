<?php

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        //if ($_POST["pwd_1"] === $POST["pwd_2"]){
            
            $username = $_POST["username"];
            $pwd_1 = $_POST["pwd_1"];
            $pwd_2 = $_POST["pwd_2"];
            $email = $_POST["email"];

            try {

                require_once "dbh_inc.php";
                require_once "signup_contr_inc.php";
                require_once "signup_model_inc.php";
                
                $errors = [];

                if (is_input_empty($username, $email, $pwd_1, $pwd_2)) {
                    $errors["empty_input"] = "Fill in all fields!";
                }
                if (is_email_invalid($email)) {
                    $errors["invalid_email"] = "Invalid email!";
                }
                if (is_username_taken( $pdo,  $username)) {    
                    $errors["username_taken"] = "Username already taken!";            
                }
                if (is_email_taken( $pdo,  $email)) {      
                    $errors["email_used"] = "Email already used!";            
                }
                
                require_once "session_inc.php";

                if ($errors) {

                    $_SESSION["errors_signup"] = $errors;
                    header("Location: ../signup.php");
                    die();
                }

                create_user

            } catch (PDOException $error) {
                echo "Dotaz zlyhal: " . $error->getMessage();
            }

        } else {
            header("Location: ../signup.php");
            echo "Heslá sa nezhodujú";
            die();
        }

    //} else {

        //header("Location: ../singup.php");
       // die();
//}