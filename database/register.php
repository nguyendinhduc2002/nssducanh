<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $maVaiTro = $_POST['vaitro'];

    // Kiểm tra xem tài khoản đã tồn tại hay chưa
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        //echo "<h2>Email đã tồn tại!</h2>";
        echo '<script>alert("<h2>Email đã tồn tại!</h2>")</script>';
    } else {
        // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
        //$hashed_password = password_hash($password, PASSWORD_DEFAULT);

        try {
            $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, phone, maVaiTro) 
            VALUES (:first_name, :last_name, :email, :password, :phone, :maVaiTro)");
            $stmt->bindParam(':first_name', $first_name);
            $stmt->bindParam(':last_name', $last_name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':maVaiTro', $maVaiTro);
            // Thực thi truy vấn
            $stmt->execute();
            //echo "<h2>Đăng ký thành công</h2> ";
            echo '<script>alert("<h2>Đăng ký thành công</h2>")</script>';
        } catch(PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    header("refresh:5; url='../signup.php'");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3><a href="../signup.php">Quay lại</a></h3>   
</body>
</html>

