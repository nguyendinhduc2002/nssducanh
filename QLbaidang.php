<?php
session_start();
if (!isset($_SESSION['username'])) header('location: login.php');
$username = $_SESSION['username'];
$id = $_SESSION['id'];
$rows = include("database/show-BaiDang.php");
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
                <div class="dashboard_content_main">
                    <h2>Tìm kiếm bài đăng</h2>
                    <!-- <input type="text" id="searchInput" placeholder="Nhập nguyên vật liệu">
            <button style="border: 0px 2px solid " onclick="searchProduct()"><i class="fa fa-search"></i> Search</button>
            <div id="searchResults"></div> -->
                    <form action="" method="post" class="p-3">
                        <div class="input-group">
                            <input type="text" id="searchInput" placeholder="Nhập thứ cần tìm kiếm"
                                class="form-control form-control-lg rounded-0 border-info" autocomplete="off" required>
                            <div class="input-group-append">
                                <input onclick="searchProduct()" value="Tìm kiếm" class="btn btn-info btn-lg rounded-0">
                            </div>
                        </div>
                        <br>
                        <div id="searchResults"></div>
                    </form>
                    <div class="col-lg-12">
                        <h1>Xem bài đăng</h1>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Mã bài đăng</th>
                                    <th>Tiêu đề</th>
                                    <th>Nội dung</th>
                                    <th>Hình Ảnh</th>
                                    <th>QR CODE</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rows as $row) : ?>
                                <tr>
                                    <td><?php echo $row['maBaiDang']; ?></td>
                                    <td><?php echo $row['tenBaiDang']; ?></td>
                                    <td><?php echo $row['moTa']; ?></td>
                                    <td><?php echo '<img src="images/baidang/' . $row['images'] . '" height=100px width=150px>' ?>
                                    <td><?php echo $row['QR']?></td>
                                    <td>
                                    <button class="btn btn-warning warning-btn"
                                            data-id="<?php echo $row['maBaiDang']; ?>">Sửa</button> 
                                        <button class="btn btn-danger delete-btn"
                                            data-id="<?php echo $row['maBaiDang']; ?>">Xóa</button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script>
            $(document).ready(function() {
                $('.delete-btn').click(function() {
                    var maBaiDang = $(this).data(
                        'id'); // Get the maBaiDang from the button's data attribute
                    if (confirm('Bạn có chắc chắn muốn xóa bài đăng này?')) {
                        $.ajax({
                            url: 'database/delete-BaiDang.php',
                            type: 'POST',
                            data: {
                                maBaiDang: maBaiDang
                            }, // Pass the maBaiDang as the data parameter
                            success: function(response) {
                                alert('Xóa thành công!');
                                location.reload();
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });
                    }
                });
            });
            </script>

            <script>
            function searchProduct() {
                var searchValue = $("#searchInput").val();

                $.ajax({
                    type: "POST",
                    url: "database/search-BaiDang.php",
                    data: {
                        searchValue: searchValue
                    },
                    success: function(response) {
                        $("#searchResults").html(response);
                    }
                });
            }
            </script>
        </div>
</body>

</html>