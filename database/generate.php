<?php

include 'connection.php';
include '../phpqrcode/qrlib.php';

if (isset($_POST['data'])) {
    $data = $_POST['data'];
    //echo 'Data received: ' . htmlspecialchars($data) . '<br>';
    // Lưu dữ liệu vào cơ sở dữ liệu
    try {
        $stmt = $conn->prepare("INSERT INTO qr_codes (data) VALUES (:data)");
        $result = $stmt->execute(['data' => $data]);
        if ($result) {
            //echo '<script>alert("Data inserted successfully.")</script>';
            // Tạo mã QR code
            //$qrCodePath = '../images/qrcodes/' . uniqid() . '.png'; // Sửa đổi đường dẫn
            //$qrCodePath = '../images/qrcodes/'. urlencode($data). '.png';
            //QRcode::png($data, $qrCodePath);

            // Generate QR code image file name based on data
            //$qrCodePath = urlencode($data). '.png';
            $qrCodePath = 'qlbaidang_'. time(). '.png';

            // Generate QR code image
            QRcode::png($data, '../images/qrcodes/'. $qrCodePath);

            // Update database with QR code file path
            $stmt = $conn->prepare("UPDATE qr_codes SET qrCodePath = :qrCodePath WHERE data = :data");
            $stmt->bindParam(':qrCodePath', $qrCodePath);
            $stmt->bindParam(':data', $data);
            $stmt->execute();

            echo '<div class="alert alert-success" role="alert">QR Code đã được tạo thành công!</div>';
            //echo '<img src="' . $qrCodePath . '" class="img-fluid" alt="QR Code">';
        } else {
            //echo 'Data insertion failed.<br>';
            echo '<script>alert("Fail, vui lòng thử lại.")</script>';

        }
    } catch (PDOException $e) {
        echo 'Database error: ' . $e->getMessage();
    }
    header("refresh:0; url='../qrcode.php'");

}
?>
