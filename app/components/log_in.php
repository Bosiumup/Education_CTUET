<?php 
if (isset($_SESSION["Username"])) {
    $username = $_SESSION["Username"];
    $check_login = checkLogin($conn, $username);
    if ($check_login->num_rows > 0) {
        $account_data = $check_login->fetch_assoc();
        if ($account_data["LoaiTaiKhoan"] == "admin") {
            header("location: admin.php");
        }
        else {
            header("location: user.php");
        }
    }
}
?>
<main class="container-main-login">
    <section class="form-handle">
        <div class="container-handle">
            <div class="title">Đăng nhập</div>
            <div class="content_order">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Tài khoản</span>
                            <input name="username" type="text" placeholder="Tài khoản" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Mật khẩu</span>
                            <input name="pass" type="password" placeholder="*********" required>
                        </div>
                    </div>
                    <div class="button">
                        <button name="Login" type="submit">Đăng nhập</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<!-- Xử lý dữ liệu bằng PHP -->
<?php 
    if (isset($_POST['Login'])) {
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $check_login = checkLogin($conn, $username);
        if ($check_login->num_rows > 0) {
            $account_data = $check_login->fetch_assoc();
            if (password_verify($pass, $account_data['Password'])) {
                if ($account_data["LoaiTaiKhoan"] == "admin") {
                    $_SESSION['Username'] = $_POST['username'];
                    // Chuyển hướng đến trang admin
                    echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Đăng nhập thành công',
                    showConfirmButton: false,
                    timer: 2500,
                    customClass: {
                        title: 'custom-alert-title'
                    }
                  });
    
                    setTimeout(function() {
                        window.location.href='admin.php';
                    }, 1500);
                </script>";
                } 
                elseif ($account_data["LoaiTaiKhoan"] == "giangvien" || $account_data["LoaiTaiKhoan"] == "sinhvien") {
                    $_SESSION['Username'] = $_POST['username'];
                    echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Đăng nhập thành công',
                    showConfirmButton: false,
                    timer: 2500,
                    customClass: {
                        title: 'custom-alert-title'
                    }
                  });
    
                    setTimeout(function() {
                        window.location.href='user.php';
                    }, 1500);
                </script>";
                }
            }
            else {
                echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Mật khẩu không đúng',
                    showConfirmButton: false,
                    timer: 2500,
                    customClass: {
                        title: 'custom-alert-title'
                    }
                  });
    
                    setTimeout(function() {
                        window.location.href='index.php';
                    }, 1500);
                </script>";
            }
        }
        else {
            echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: 'Tài khoản không tồn tại',
                    showConfirmButton: false,
                    timer: 2500,
                    customClass: {
                        title: 'custom-alert-title'
                    }
                  });
    
                    setTimeout(function() {
                        window.location.href='index.php';
                    }, 1500);
                </script>";
        }
    }
?>