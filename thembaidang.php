<?php
    session_start();
    if(!isset($_SESSION['username'])) header('location: login.php');
    $username = $_SESSION['username'];
    $id = $_SESSION['id'];
    $rows = include("database/show-BaiDang.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Bài Đăng</title>
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
                    <h2 class="mt-5 mb-4">Thêm Bài Đăng</h2>
                    <form action="database/addBaiDang.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Tiêu đề:</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả:</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label label for="images">Hình ảnh:</label>
                            <input type="file" class="form-control-file" id="images" name="images" multiple>
                        </div>
                        <button type="submit" class="btn btn-primary">Đăng bài</button>
                    </form>
                </div>
            </div>
            <div class="container mt-5">
                <h2>Post List</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tiêu đề</th>
                            <th>Trạng thái</th>
                            <th>Lý do</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($rows as $row) : ?>
                            <tr>
                                <td><?php echo $row['tenBaiDang']; ?></td>
                                <td><span class="badge badge-warning">Pending</span></td>
                                <td>Chờ thanh toán</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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