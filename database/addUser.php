<?php
    session_start();
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email =  $_POST['email'];
    $password = $_POST['password'];
    $phone =  $_POST['phone'];
    
    //adding a record
    $sql = "INSERT INTO users(first_name, last_name, email, password, phone, create_at, update_at) 
                        VALUES (:first_name, :last_name, :email, :password, :phone ,NOW(), NOW())";
     $stmt->bindParam(':first_name', $first_name);
     $stmt->bindParam(':last_name', $last_name);
     $stmt->bindParam(":email", $email);
     $stmt->bindParam(":password", $password);
     $stmt->bindParam(":phone", $phone);
     // Execute the query
    include('connection.php');
    $conn->excec($sql);
?>