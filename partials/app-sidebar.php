<div class="dashboard_sidebar">
    <h3 class="dashboard_logo">Nông Sản Sạch</h3>
    <div class="dashboard_sidebar_user"> <br>
        <img src="images/user/user.jpg" alt="User Image." />
        <?php
        $username = json_encode($username); // Convert the array to a JSON string
        $username = json_decode($username, true); // Decode the JSON string into an associative array
        if ($username === null) {
            // Handle the case when the string cannot be decoded as JSON
            $username = array(
                "first_name" => "",
                "last_name" => ""
            );
        }
        $firstName = $username['first_name'] ?? "";
        $lastName = $username['last_name'] ?? "";

        echo "<span>Hi, " . htmlspecialchars($firstName) . ' ' . htmlspecialchars($lastName) . " </span>";
        ?>
    </div>
    <div class="dashboard_sidebar_menus">
        <ul class="dashboard_menu_lists">
            <li class="menuActive">
                <a href=""><i class="fa fa-dashboard"></i> <span class="menuText">Dashboard</span></a>
            </li>
            <li>
                <a href="account.php"><i class="fa fa-user"></i> <span class="menuText">Quản lý tài khoản</span></a>
            </li>
            <li>
                <a href="QLbaidang.php"><i class="fa fa-newspaper-o"></i> <span class="menuText">Quản lý bài
                        đăng</span></a>
                <ul class="submenus">
                    <li class="elementmenus"><a href="xembaidang.php"><i class="">Xem bài đăng</i></a></li>
                    <li class="elementmenus"><a href="thembaidang.php"><i class="">Thêm bài đăng</i></a></li>
                </ul>
            </li>
            <li>
                <a href="qrcode.php"><i class="fa fa-qrcode"></i> <span class="menuText">Tạo QR CODE</span></a>
            </li>
            <li>
                <a href="naptien.php"><i class="fa fa-money"></i> <span class="menuText">Nạp Tiền</span></a>
            </li>
        </ul>
    </div>
</div>