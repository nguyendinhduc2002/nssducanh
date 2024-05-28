<?php
    session_start();
    if(!isset($_SESSION['username'])) header('location: login.php');
    $username = $_SESSION['username'];
    $id = $_SESSION['id'];
    $rows = include("database/show-User.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard NSS</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" href="css\font-awesome-4.7.0\css/font-awesome.min.css">
    <script src="http://use.fontawesome.com/0c7a3095b5.js"></script>

</head>
<body>
    <div id="dashboardMainContainer">
    <?php include('partials/app-sidebar.php') ?>
        <div class="dashboard_content_container">
        <?php include('partials/app-topnav.php') ?>
        <div class="dashboard_content">
                <div class="dashboard_content_main">
                    <div id="userAddFormContainer">
                    <form action="database/addUser.php" class="appForm">
                        <div class="appFormInputContainer">
                            <label for="">Tên</label>
                            <input type="text" class="appFormInput" id="first_name" name="first_name"/>
                        </div>
                        <div class="appFormInputContainer">
                            <label for="">Họ Đệm</label>
                            <input type="text" class="appFormInput" id="last_name" name="last_name"/>
                        </div>
                        <div class="appFormInputContainer">
                            <label for="">Email</label>
                            <input type="text" class="appFormInput" id="email" name="email"/>
                        </div>
                        <div class="appFormInputContainer">
                            <label for="">Mật khẩu</label>
                            <input type="text" class="appFormInput" id="password" name="password"/>
                        </div>
                        <div class="appFormInputContainer">
                            <label for="">Phone</label>
                            <input type="text" class="appFormInput" id="phone" name="phone"/>
                        </div>
                        <button type="submit" class="appBtn" name=""> <i class="fa fa-plus"></i>Thêm</button>
                    </form>
                    <div class="col-lg-12">
                        <h1>Danh sách người dùng</h1>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Tên</th>
                                    <th>Họ đệm</th>
                                    <th>Password</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rows as $row) : ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['first_name']; ?></td>
                                    <td><?php echo $row['last_name']; ?></td>
                                    <td><?php echo $row['password']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td>
                                    <button class="btn btn-warning warning-btn"
                                            data-id="<?php echo $row['id']; ?>">Sửa</button> 
                                        <button class="btn btn-danger delete-btn"
                                            data-id="<?php echo $row['id']; ?>">Xóa</button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php if(isset($_SESSION['response'])) { 
                            $response_message = $_SESSION['response']['message'];
                            $is_success = $_SESSION['response']['success'];    
                    ?>                              
                        <div class="responseMessage">
                            <p class="<?= $is_success ? 'responseMessage_success' : 'responseMessage_error'?>">
                            <?php echo $response_message?>
                            </p>
                        </div>
                    <?php unset($_SESSION['response']); } ?>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <script>
        toggleBtn.addEventListener( 'click', (event) => {
            event.preventDefault();
            dashboard_sidebar.style.width = '10%';
        });
    </script>
</body>
</html>