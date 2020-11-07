<?php

define('__CONFIG__', true);

    if(!defined('__CONFIG__')) {

        exit('You do not have a config file');
    }
    require_once "../includes/config.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        header('Content-Type: application/json');
        $return = [];
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $return['error'] = 'Invalid email';
            echo json_encode($return,JSON_PRETTY_PRINT);
            exit;
        }

        $findeUser = $con->prepare("SELECT user_id FROM users WhERE email = LOWER(:email) LIMIT 1");
        $findeUser->bindParam(':email', $email, PDO::PARAM_STR);
        $findeUser->execute();


        if ($findeUser->rowCount() == 1){
            //user exist
            $return['error'] = 'Email alredy in use';
        } else{
            //User does not exist
            if(strlen($_POST['password'])  < 8){
                $return['error'] = 'Invalid password';
                echo json_encode($return,JSON_PRETTY_PRINT);
                exit;
            }
            $password = password_hash($_POST['password'],PASSWORD_BCRYPT ,$hashOptions);
            $addUser = $con->prepare("INSERT INTO users(email, password) VALUES (LOWER(:email), :password)");
            $addUser->bindParam(':email',$email, PDO::PARAM_STR);
            $addUser->bindParam(':password',$password, PDO::PARAM_STR);
            $addUser->execute();

            $return['redirect'] = '/komandinis/index.php?message=welcome';
        }

        echo json_encode($return,JSON_PRETTY_PRINT);
        exit;
    } else{
        exit("Wrong method");
    }

?>