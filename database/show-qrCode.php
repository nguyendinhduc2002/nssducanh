<?php
    include("connection.php");
    $stmt = $conn->prepare("SELECT * FROM qr_codes");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
?>