<?php
    session_start();
    if(!isset($_SESSION['username'])) header('location: login.php');

    $username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard NSS</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="http://use.fontawesome.com/0c7a3095b5.js"></script>

</head>
<body>
    <div id="dashboardMainContainer">
        <?php include('partials/app-sidebar.php') ?>
        <div class="dashboard_content_container">
        <?php include('partials/app-topnav.php') ?>
            <div class="dashboard_content">
                <div class="dashboard_content_main">
                </div>
            </div>
        </div>
    </div>
    <script src="js/script.js"> </script>
</body>
</html>