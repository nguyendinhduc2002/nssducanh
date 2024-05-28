<?php
    session_start();
    if(!isset($_SESSION['username'])) header('location: login.php');
    $username = $_SESSION['username'];
    $id = $_SESSION['id'];
    $rows = include("database/show-qrCode.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR CODE</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" href="css\font-awesome-4.7.0\css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="http://use.fontawesome.com/0c7a3095b5.js"></script>

</head>

<body>
    <div id="dashboardMainContainer">
        <?php include('partials/app-sidebar.php') ?>
        <div class="dashboard_content_container">
            <?php include('partials/app-topnav.php') ?>
            <div class="dashboard_content">
                <div class="dashboard_content_main">
                    <h1 class="mt-5">QR Code Generator</h1>
                    <form action="database/generate.php" method="post" class="mt-3">
                        <div class="form-group">
                            <label for="data">Nhập dữ liệu</label>
                            <input type="text" class="form-control" id="data" name="data" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tạo QR Code</button>
                    </form>
                    <div class="col-lg-12">
                        <h1>Danh sách QR CODE</h1>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Đường link</th>
                                    <th>QR CODE</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rows as $row) : ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['data']; ?></td>
                                    <td><?php echo '<img src="images/qrcodes/' . $row['qrCodePath'] . '" height=150px width=150px>' ?>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
    toggleBtn.addEventListener('click', (event) => {
        event.preventDefault();
        dashboard_sidebar.style.width = '10%';
    });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>