<?php

    $server = 'us-cdbr-east-03.cleardb.com';
    $username = 'b61c0add977fa2';
    $password = '315075e8';
    $database = 'heroku_9a1be12fa54d8f9';

    try {
        $conn = new PDO("mysql:host=$server;dbname=$database;" , $username , $password);
    } 
    catch (PDOException $error) {
        
        die('Connected to server failed: ' .$error->getMessage() );

    }

?>
