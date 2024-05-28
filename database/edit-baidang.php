<?php
require 'connection.php';

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'fetch') {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("SELECT * FROM baidang WHERE maBaiDang = ?");
        $stmt->execute([$id]);
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($post);
    } elseif ($_POST['action'] == 'update') {
        $id = $_POST['id'];
        $tenBaiDang = $_POST['tenBaiDang'];
        $moTa = $_POST['moTa'];
        $trangThai = $_POST['trangThai'];
        $stmt = $pdo->prepare("UPDATE baidang SET tenBaiDang = ?, moTa = ?, trangThai = ? WHERE maBaiDang = ?");
        $stmt->execute([$tenBaiDang, $moTa, $trangThai, $id]);
        echo 'success';
    }
}
?>
