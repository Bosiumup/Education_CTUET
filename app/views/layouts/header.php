<?php
require "app/components/log_out.php";
require "app/components/role.php";
?>

<header class="header">
    <section class="header-main">
        <!-- logo -->
        <div class="header-main-r">
            <span>
                TRƯỜNG ĐẠI HỌC KỸ THUẬT - CÔNG NGHỆ CẦN THƠ
            </span>
        </div>
        <!-- thông tin người dùng và đăng xuất -->
        <div class="header-main-l">
            <?php
            if (isset($_SESSION["Username"])) {
                $account_inf = account($conn, $_SESSION["Username"]);
                if ($account_inf->num_rows > 0) {
                    $row = $account_inf->fetch_assoc();
                    if ($row["LoaiTaiKhoan"] == "admin") {
                        ?>
            <div class="inf-log_out">
                <div class="inf">
                    <i class="fa-solid fa-circle-user fa-fw"></i>
                    <span><?php echo $row["Username"]; ?></span>
                    <span><?php echo $row["LoaiTaiKhoan"]; ?></span>
                </div>
                <div class="log_out">
                    <form action="admin.php" method="post">
                        <button name="Logout" type="submit">Đăng xuất</button>
                    </form>
                </div>
            </div>
            <?php
                    }
                    elseif ($row["LoaiTaiKhoan"] == "student") {
                        $student_inf= Student($conn, $_SESSION["Username"]);
                        $row_student = $student_inf->fetch_assoc();
                        ?>
            <div class="inf-log_out">
                <div class="inf">
                    <i class="fa-solid fa-circle-user fa-fw"></i>
                    <span><?php echo $row_student["TenSinhVien"]; ?></span>
                    <span><?php echo $row["Username"]; ?></span>
                </div>
                <div class="log_out">
                    <form action="admin.php" method="post">
                        <button name="Logout" type="submit">Đăng xuất</button>
                    </form>
                </div>
            </div>
            <?php
                    } 
                    else {
                        ?>
            <div class="inf-log_out">
                <div class="inf">
                    <i class="fa-solid fa-circle-user fa-fw"></i>
                    <span><?php echo $row["Username"]; ?></span>
                    <span><?php echo $row["LoaiTaiKhoan"]; ?></span>
                </div>

                <div class="log_out">
                    <form action="user.php" method="post">
                        <button name="Logout" type="submit">Đăng xuất</button>
                    </form>
                </div>
            </div>
            <?php
                    }
                }
            }
            ?>
        </div>
    </section>
</header>