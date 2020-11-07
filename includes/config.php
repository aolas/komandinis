<?php
    if(!defined('__CONFIG__')) {
        exit('You do not have a config file');
    }

    //connect to database
    include_once "../database/DB.php";

    $con = DB::getConnection();
    //Hash bcrypto settings
    $hashOptions = [
        'cost' => 12,
    ];
?>