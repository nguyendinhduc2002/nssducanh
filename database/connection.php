<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    
    //connecting to database
    try {
        $conn = new PDO("mysql:host=localhost;dbname=nss", $username, $password);
        //set the PDO error mode  to exception.
        $conn->exec("set names utf8");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo 'Connect Succesfullly.';
    } catch (PDOException $e) {
        $error_message =$e->getMessage();
    }
?>