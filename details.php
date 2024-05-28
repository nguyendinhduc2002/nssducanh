<?php
session_start();
if (!isset($_SESSION['username'])) header('location: login.php');
$username = $_SESSION['username'];
$id = $_SESSION['id'];
$rows = include("database/search-BaiDang.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Bài Đăng</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div id="dashboardMainContainer">
        <?php include('partials/app-sidebar.php') ?>
        <div class="dashboard_content_container">
            <?php include('partials/app-topnav.php') ?>
            <div class="dashboard_content">
                <?php
// product_detail.php

require 'database/connection.php';

$id = isset($_GET['maBaiDang']) ? (int) $_GET['maBaiDang'] : 0;

$stmt = $pdo->prepare("SELECT * FROM baidang WHERE maBaiDang = ?");
$stmt->execute([$id]);
$product = $stmt->fetch();

if (!$product) {
    echo "Product not found.";
    exit;
}

?>

                <!DOCTYPE html>
                <html>

                <head>
                    <title>Product Detail</title>
                </head>

                <body>
                    <h1>Product Detail</h1>
                    <p><strong>ID:</strong> <?= htmlspecialchars($product['maBaiDang']) ?></p>
                    <p><strong>Name:</strong> <?= htmlspecialchars($product['tenBaiDang']) ?></p>
                    <p><strong>Price:</strong> <?= htmlspecialchars($product['moTa']) ?></p>
                    <p><strong>Description:</strong> <?= htmlspecialchars($product['trangThai']) ?></p>
                    <a href="xembaidang.php">Back to Products List</a>
                </body>

                </html>

            </div>
</body>

</html>