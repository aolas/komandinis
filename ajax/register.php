<?php

define('__CONFIG__', true);

    if(!defined('__CONFIG__')) {

        exit('You do not have a config file');
    }
    require_once "../includes/config.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        header('Content-Type: application/json');
        //$array = ["test1","test2","test3"];
        $return = [];
        $email = $_POST['email'];

        $findeUser = $con->prepare("SELECT user_id FROM users WhERE email = LOWER(:email) LIMIT 1");
        $findeUser->bindParam(':email', $email, PDO::PARAM_STR);
        $findeUser->execute();


        if ($findeUser->rowCount() == 1){
            //user exist
            $return['error'] = 'email alredy in use';
        } else{
            //User does not exist

            $password = password_hash($_POST['password'],PASSWORD_BCRYPT ,$hashOptions);
            $addUser = $con->prepare("INSERT INTO users(email, password) VALUES (LOWER(:email), :password)");
            $addUser->bindParam(':email',$email, PDO::PARAM_STR);
            $addUser->bindParam(':password',$password, PDO::PARAM_STR);
            $addUser->execute();

            $return['success'] = 'Registration successfull';
        }

        echo json_encode($return,JSON_PRETTY_PRINT);
        exit;
    } else{
        exit("Wrong method");
    }

?>