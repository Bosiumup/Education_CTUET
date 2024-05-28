<section class="form-handle">
    <div class="container-handle">
        <div class="title">Sinh viên</div>
        <div class="content_order">
            <form action="admin.php?page=student_register" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Tài khoản</span>
                        <select name="username">
                            <?php
                                $result = Student($conn);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        $selected = ($row["SinhVienID"] == $_SESSION['teacher_username']) ? 'selected' : '';
                                        echo '<option value="' . $row["SinhVienID"] . '" ' . $selected . '>' . $row["SinhVienID"] . '</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="details">Mật khẩu</span>
                        <input name="pass" type="password" placeholder="********" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Vai trò</span>
                        <input class="color_style" type="text" value="Sinh viên" readonly>
                        <input hidden value="sinhvien" name="role">
                    </div>
                </div>
                <div class="button">
                    <button name="register" type="submit">Tạo</button>
                </div>
            </form>
            <div class="handle_link">
                <a href="?page=teacher_register">Cấp tài khoản giảng viên</a>
            </div>
        </div>
    </div>
</section>

<?php 

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    
    $check_result = checkRegister($conn, $username);
    if ($check_result->num_rows > 0) {
        $_SESSION['student_username'] = $_POST['username'];
        echo "<script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Tài khoản $username đã có',
                showConfirmButton: false,
                timer: 2000,
                customClass: {
                    title: 'custom-alert-title'
                }
              });

                setTimeout(function() {
                    window.location.href='admin.php?page=student_register';
                }, 1500);
            </script>";
    } else {
        $sql_signUP = registerStudent($conn, $username, $username, $password, $role);
        if ($sql_signUP) {
            $_SESSION['student_username'] = $_POST['username'];
            echo "<script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Cấp tài khoản thành công',
                showConfirmButton: false,
                timer: 2000,
                customClass: {
                    title: 'custom-alert-title'
                }
              });

                setTimeout(function() {
                    window.location.href='admin.php?page=student_register';
                }, 1500);
            </script>";
        } 
    }
}

?>