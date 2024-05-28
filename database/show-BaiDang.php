<?php
    include("connection.php");
    $stmt = $conn->prepare("SELECT * FROM baidang WHERE trangThai <> 'Bị từ chối'");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
?>