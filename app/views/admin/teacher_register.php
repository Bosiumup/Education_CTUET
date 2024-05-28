<section class="form-handle">
    <div class="container-handle">
        <div class="title">Giảng viên</div>
        <div class="content_order">
            <form action="admin.php?page=teacher_register" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Tài khoản</span>
                        <select name="username">
                            <?php
                                $result = teacher($conn);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        $selected = ($row["GiangVienID"] == $_SESSION['teacher_username']) ? 'selected' : '';
                                        echo '<option value="' . $row["GiangVienID"] . '" ' . $selected . '>' . $row["GiangVienID"] . '</option>';
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
                        <input class="color_style" type="text" value="Giảng viên" readonly>
                        <input hidden value="giangvien" name="role">
                    </div>
                </div>
                <div class="button">
                    <button name="register" type="submit">Tạo</button>
                </div>
            </form>
            <div class="handle_link">
                <a href="?page=student_register">Cấp tài khoản sinh viên</a>
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
        $_SESSION['teacher_username'] = $_POST['username'];
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
                    window.location.href='admin.php?page=teacher_register';
                }, 1500);
            </script>";
    } else {
        $sql_signUP = registerTeacher($conn, $username, $username, $password, $role);
        if ($sql_signUP) {
            $_SESSION['teacher_username'] = $_POST['username'];
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
                    window.location.href='admin.php?page=teacher_register';
                }, 1500);
            </script>";
        } 
    }
}

?>