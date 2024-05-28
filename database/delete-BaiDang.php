<?php
require 'connection.php';

if (isset($_POST['maBaiDang'])) {
    $maBaiDang = $_POST['maBaiDang'];
    $stmt = $pdo->prepare("DELETE FROM baidang WHERE maBaiDang = :maBaiDang");
    $stmt->bindParam(':maBaiDang', $maBaiDang);
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}