<header class="header">
    <section class="header-main">
        <!-- logo -->
        <div class="header-main-r">
            <?php
            if (isset($_SESSION["user_name"])) {
                $account_inf = account($conn, $_SESSION["user_name"]);
                $row = $account_inf->fetch_assoc();
                $vai_tro = $row["vai_tro"];
            ?>
            <a class="header-logo_link"
                href="<?php echo $vai_tro == 'admin' ? 'index.php?page=khoa.php' : 'index.php?page=giangvien.php'; ?>">
                <img src="assets/imgs/logo.png" alt="header-logo">
                <span>
                    TRƯỜNG ĐẠI HỌC KỸ THUẬT - CÔNG NGHỆ CẦN THƠ
                </span>
            </a>
            <?php
            } else {
            ?>
            <a class="header-logo_link" href="index.php">
                <img src="assets/imgs/logo.png" alt="header-logo">
                <span>
                    TRƯỜNG ĐẠI HỌC KỸ THUẬT - CÔNG NGHỆ CẦN THƠ
                </span>
            </a>
            <?php
            }
            ?>

        </div>

        <!-- Login -->
        <div class="header-main-l">
            <?php
            if (isset($_SESSION["user_name"])) {
                $account_inf = account($conn, $_SESSION["user_name"]);
                // Kiểm tra kết quả truy vấn
                if ($account_inf->num_rows > 0) {
                    $row = $account_inf->fetch_assoc();
                    $name = $row["ten"];
                    $hoc_vi = $row["hoc_vi"];
                    $vai_tro = $row["vai_tro"];
                    if ($row["vai_tro"] == "admin") {
                        // Hiển thị thông tin người dùng
                        echo "Xin chào, " . $hoc_vi . " - " . $name . " - " . $vai_tro;

                        echo '<a href="index.php?page=register.php">Cấp tài khoản giảng viên</a>';
                    } else {
                        // Hiển thị thông tin người dùng
                        echo "Xin chào, " . $hoc_vi . " - " . $name . " - " . $vai_tro . "</br>";
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