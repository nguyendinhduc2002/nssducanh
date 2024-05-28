<?php
// searchProduct.php
require_once('connection.php');

if (isset($_POST['searchValue'])) {
    $searchValue = $_POST['searchValue'];

    $stmt = $conn->prepare("SELECT * FROM baidang WHERE tenBaiDang LIKE :searchValue AND trangThai <> 'Đã xóa'");
    $stmt->bindValue(':searchValue', '%' . $searchValue . '%', PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        echo '<table border="1" class="user">';
        echo '<tr><th>Mã Bài Đăng</th><th>Tiêu đề</th><th>Nội dung</th><th>Trạng thái</th><th>Hình ảnh</th></tr>';
        
        foreach ($result as $row) {
            echo '<tr>';
            echo '<td>' . $row['maBaiDang'] . '</td>';
            echo '<td>' . $row['tenBaiDang'] . '</td>';
            // Add other columns as needed
            echo '<td>' . $row['moTa'] . '</td>';
            echo '<td>' . $row['trangThai'] . '</td>';
            echo '<td>' . '<img src="images/baidang/' . $row['images'] . '" height=35px width=100%>' . '</td>' ;
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'No results found';
    }
}
?>