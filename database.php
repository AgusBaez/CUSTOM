<?php

    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'custom';

    try {
        $conn = new PDO("mysql:host=$server;dbname=$database;" , $username , $password);
    } 
    catch (PDOException $error) {
        
        die('Connected to server failed: ' .$error->getMessage() );

    }

?>
