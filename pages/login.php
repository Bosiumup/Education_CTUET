<section class="form-login">
    <div class="container-register">
        <div class="title">Đăng nhập</div>
        <div class="content">
            <form action="<?php echo "index.php?page=login.php" ?>" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Tài khoản</span>
                        <input name="username" type="text" placeholder="Nhập tài khoản" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Mật khẩu</span>
                        <input name="pass" type="password" placeholder="*********" required>
                    </div>
                </div>
                <div class="button">
                    <input name="login" type="submit">
                </div>
            </form>
        </div>
    </div>
</section>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST['username'];
    $password = $_POST['pass'];

    $_SESSION['username'] = $_POST['username'];
    $_SESSION['pass'] = $_POST['pass'];

    $check_login = checkLogin($conn, $user_name);
    if ($check_login->num_rows > 0) {
        $user_data = $check_login->fetch_assoc();
        if (password_verify($password, $user_data['password'])) {
            if ($user_data["vai_tro"] == "admin") {
                // Chuyển hướng đến trang admin
                echo "<script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Đăng nhập thành công',
                showConfirmButton: false,
                timer: 2000
              });

    setTimeout(function() {
        window.location.href='index.php?page=khoa.php';
    }, 1500);
</script>";
            } elseif ($user_data["vai_tro"] == "giangvien") {
                echo "<script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Đăng nhập thành công',
                showConfirmButton: false,
                timer: 2000
              });

    setTimeout(function() {
        window.location.href='index.php?page=giangvien.php';
    }, 1500);
</script>";
            }
        } else {
            echo "<script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Mật khẩu không đúng!',
                showConfirmButton: false,
                timer: 2000
              });

    setTimeout(function() {
        window.location.href='index.php';
    }, 1500);
</script>";
            session_destroy();
        }
    } else {
        echo "<script>
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: 'Tài khoản không tồn tại!',
                showConfirmButton: false,
                timer: 2000
              });

    setTimeout(function() {
        window.location.href='index.php';
    }, 1500);
</script>";
        session_destroy();
    }
}
?>