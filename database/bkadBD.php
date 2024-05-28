<?php
session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //lấy thông tin từ form
    $title = $_POST['title'];
    $description = $_POST['description'];

    //lấy thông tin từ session
    $username = $_SESSION['username']; // Lấy user id từ session
    
    // Thêm bài viết vào cơ sở dữ liệu
    $stmt = $conn->prepare("INSERT INTO baidang(title, description, images, date, maQR, id) VALUES (:title, :description, :images, NOW(), :id)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':images', $images);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Lấy id của bài viết vừa thêm
    //$maBaiDang = $conn->lastInsertId();

    // Xử lý tải lên hình ảnh nếu có
    if(isset($_FILES['images'])){
        $errors= array();
        foreach($_FILES['images']['tmp_name'] as $key => $tmp_name ){
            $file_name = $key.$_FILES['images']['name'][$key];
            $file_size =$_FILES['images']['size'][$key];
            $file_tmp =$_FILES['images']['tmp_name'][$key];
            $file_type=$_FILES['images']['type'][$key];
            if($file_size > 2097152){
                $errors[]='File size must be less than 2 MB';
            }
            $desired_dir="../images/baidang";
            if(empty($errors)==true){
                if(is_dir($desired_dir)==false){
                    mkdir("$desired_dir", 0700); // Tạo thư mục nếu chưa tồn tại
                }
                if(is_dir("$desired_dir/".$file_name)==false){
                    move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
                }else{                                  //rename the file if another one exist
                    $new_dir="$desired_dir/".$file_name.time();
                    rename($file_tmp,$new_dir) ;                
                }
                // Lưu đường dẫn hình ảnh vào cơ sở dữ liệu
                $stmt = $conn->prepare("INSERT INTO `baidang` (maBaiDang, title, description, images, date, maQR, id) 
                VALUES (NULL, NULL, NULL, 'anhsach.jpg', '2024-05-06 13:32:02.000000', NULL, '1');");
                $images = "$desired_dir/".$file_name;
                $stmt->bindParam(':images', $images);
                $stmt->execute();
            }else{
                print_r($errors);
            }
        }
    }

    echo "Bài viết đã được thêm thành công!";
}
?>
