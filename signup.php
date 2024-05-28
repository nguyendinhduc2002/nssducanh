<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard NSS</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" href="css\font-awesome-4.7.0\css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="http://use.fontawesome.com/0c7a3095b5.js"></script>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-8-offset-md-6">
            <form action="database/register.php" class="bg-light p-4 my-4"  method="post">
                <h2 class="py-3 text-center text-uppercase"> Đăng ký tài khoản</h2>
                    <?php
                        // Hiển thị thông báo lỗi nếu có
                        if (isset($_SESSION['error_message'])) {
                            echo "<p style='color: red;'>".$_SESSION['error_message']."</p>";
                            unset($_SESSION['error_message']);
                        }
                        // Hiển thị thông báo thành công nếu có
                        if (isset($_SESSION['success_message'])) {
                            echo "<p style='color: green;'>".$_SESSION['success_message']."</p>";
                            unset($_SESSION['success_message']);
                        }
                    ?>
                        <div class="form-group">
                            <label for="">Tên</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required/>
                        </div>
                        <div class="form-group">
                            <label for="">Họ Đệm</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required/>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" id="email" name="email" required/>
                        </div>
                        <div class="form-group">
                            <label for="">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="password" required/>
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone"/>
                        </div>
                        <div class="form-group">
                            <label for="vaiTro">Bạn là ?</label> <br>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="vaitro" id="vaitro" value="2" class="form-check-input">
                                <label for="vendor" class="form-check-label">Người bán</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="vaitro" id="vaitro" value="3" class="form-check-input">
                                <label for="user" class="form-check-label">Khách hàng</label>
                            </div>
                        </div>
                        <button type="submit" class="btn-primary btn btn-block" name="dangky">Đăng ký</button> <br>
                        <button class="btn"><a style=" text-transform:UPPERCASE; color:green; align:center;" href="login.php" >Quay lại trang đăng nhập </a></button>
                    </form>
            </div>
        </div>
    </div>
    </div>
</body>
</html>