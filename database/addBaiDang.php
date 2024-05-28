<?php
session_start();
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $id = $_SESSION['id'];

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["images"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        echo '<script>alert("File is not an image.")</script>';
        $uploadOk = 0;
    }

    $target_dir = "../images/baidang/";
    $imageFileType = strtolower(pathinfo(basename($_FILES["images"]["name"]),PATHINFO_EXTENSION));
    $file_name = basename($_FILES["images"]["name"]);
    #$file_name = 'Bai dang - ' . time() . '.' . $imageFileType;
    $target_file = $target_dir . $file_name;

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        //echo "";
        echo '<script>alert("Sorry, your file was not uploaded.")</script>';
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) {
            //echo "The file ". basename( $_FILES["images"]["name"]). " has been uploaded.";
        } else {
            //echo "Sorry, there was an error uploading your file.";
            echo '<script>alert("Sorry, there was an error uploading your file.")</script>';
        }
    }

    // Insert into database if no errors occurred during image upload
    if ($uploadOk != 0) {

        $sql = "INSERT INTO baidang (tenBaiDang, moTa, images, id) VALUES (:tenBaiDang, :moTa,:images, :id)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':tenBaiDang', $title);
        $stmt->bindParam(':moTa', $description);
        $stmt->bindParam(':images', $file_name);
        $stmt->bindParam(':id', $id);
        try {
            $stmt->execute();
            //echo "Bài đăng đã được thêm thành công!";
            echo '<script>alert("Bài đăng đã được thêm thành công!")</script>';
        } catch(PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    header("refresh:1; url='../thembaidang.php'");
}
?>