<section class="form-login">
    <div class="container-register">
        <div class="title">Cấp Tài Khoản</div>
        <div class="content">
            <form action="<?php echo "index.php?page=register.php" ?>" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Tài khoản</span>
                        <input value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : '' ?>"
                            name="username" type="text" placeholder="Nhập tài khoản" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Mật khẩu</span>
                        <input name="pass" type="password" placeholder="********" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Tên</span>
                        <input value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : '' ?>" name="name-user"
                            type="text" placeholder="Nhập tên" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Học vị</span>
                        <select name="hoc_vi" required>
                            <option value="TienSi"
                                <?php if (isset($_SESSION['hoc_vi']) && $_SESSION['hoc_vi'] == 'TienSi') echo 'selected'; ?>>
                                Tiến Sĩ</option>
                            <option value="ThacSi"
                                <?php if (isset($_SESSION['hoc_vi']) && $_SESSION['hoc_vi'] == 'ThacSi') echo 'selected'; ?>>
                                Thạc Sĩ</option>
                            <option value="KySu"
                                <?php if (isset($_SESSION['hoc_vi']) && $_SESSION['hoc_vi'] == 'KySu') echo 'selected'; ?>>
                                Kỹ Sư</option>
                            <option value="CuNhan"
                                <?php if (isset($_SESSION['hoc_vi']) && $_SESSION['hoc_vi'] == 'CuNhan') echo 'selected'; ?>>
                                Cử Nhân</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <!-- <span class="details">Vai trò</span> -->
                        <input hidden value="giangvien" name="vai_tro">
                    </div>
                </div>
                <div class="button">
                    <input name="register" type="submit">
                </div>
            </form>
        </div>
    </div>
</section>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST['username'];
    $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $name = $_POST['name-user'];
    $hoc_vi = $_POST['hoc_vi'];
    $vai_tro = $_POST['vai_tro'];

    $_SESSION['username'] = $_POST['username'];
    $_SESSION['name'] = $_POST['name-user'];
    $_SESSION['hoc_vi'] = $_POST['hoc_vi'];

    // Kiểm tra xem username và tên đã tồn tại chưa
    $check_result = account($conn, $user_name);
    if ($check_result->num_rows > 0) {
        echo "<script>
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: 'Tài khoản đã được cấp trước đó!',
                showConfirmButton: false,
                timer: 2500
              });

    setTimeout(function() {
        window.location.href='index.php?page=register.php';
    }, 2000);
</script>";
    } else {

        $sql_signUP = signUp($conn, $name, $user_name, $password, $hoc_vi, $vai_tro);

        if ($sql_signUP) {
            echo "<script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Cấp tài khoản thành công!',
                showConfirmButton: false,
                timer: 2000
              });

    setTimeout(function() {
        window.location.href='index.php?page=register.php';
    }, 1500);
</script>";
        } else {
            echo "<script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Cấp tài khoản không thành công!',
                showConfirmButton: false,
                timer: 2000
              });

    setTimeout(function() {
        window.location.href='index.php?page=register.php';
    }, 1500);
</script>";
        }
    }
}

?>