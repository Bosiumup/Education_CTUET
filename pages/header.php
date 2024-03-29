<header class="header">
    <section class="header-main">
        <!-- logo -->
        <div class="header-main-r">
            <a class="header-logo_link" href="index.php">
                <img src="assets/imgs/logo.png" alt="header-logo">
                <span>
                    TRƯỜNG ĐẠI HỌC KỸ THUẬT - CÔNG NGHỆ CẦN THƠ
                </span>
            </a>
        </div>

        <!-- Login -->
        <div class="header-main-l">
            <?php
            if (isset($_SESSION["username"])) {
                $account_inf = account($conn, $_SESSION["username"]);
                // Kiểm tra kết quả truy vấn
                if ($account_inf->num_rows > 0) {
                    $row = $account_inf->fetch_assoc();
                    $hoc_vi = $row["hoc_vi"];
                    $vai_tro = $row["vai_tro"];
                    if ($row["vai_tro"] == "admin") {
                        // Hiển thị thông tin người dùng
                        echo "Xin chào, " . $hoc_vi . " - " . $vai_tro;

                        echo '<a href="index.php?page=register.php">Cấp tài khoản giảng viên</a>';
                    } else {
                        // Hiển thị thông tin người dùng
                        echo "Xin chào, " . $hoc_vi . " - " . $vai_tro . "</br>";
                    }
                }
            ?>
            <form action="<?php echo "index.php?page=logout.php" ?>" method="post">
                <button type="submit" name="logout">Đăng xuất</button>
            </form>
            <?php
            }
            ?>
        </div>
    </section>
</header>