<section class="form-handle">
    <div class="container-handle">
        <div class="title">Giảng viên</div>
        <div class="content_order">
            <form action="<?php echo "index.php?page=register" ?>" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Tài khoản</span>
                        <select name="username">
                            <?php
                                // $result = Faculty($conn); // Gọi hàm Faculty() và lưu kết quả trả về vào biến $result
                                // if ($result->num_rows > 0) {
                                //     while($row = $result->fetch_assoc()) {
                                //         echo '<option value="' . $row["KhoaID"] . '">' . $row["KhoaID"] . '</option>';
                                //     }
                                // }
                            ?>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="details">Mật khẩu</span>
                        <input name="pass" type="password" placeholder="********" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Khoa</span>
                        <select name="facultyRegister">
                            <?php
                                $result = Faculty($conn); // Gọi hàm Faculty() và lưu kết quả trả về vào biến $result
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row["KhoaID"] . '">' . $row["KhoaID"] . '</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="details">ID</span>
                        <select name="username">
                            <?php
                                // $result = Faculty($conn); // Gọi hàm Faculty() và lưu kết quả trả về vào biến $result
                                // if ($result->num_rows > 0) {
                                //     while($row = $result->fetch_assoc()) {
                                //         echo '<option value="' . $row["KhoaID"] . '">' . $row["KhoaID"] . '</option>';
                                //     }
                                // }
                            ?>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="details">Vai trò</span>
                        <input class="color_style" type="text" value="Giảng viên" readonly>
                        <input hidden value="user" name="vai_tro">
                    </div>
                </div>
                <div class="button">
                    <button name="register" type="submit">Đăng ký</button>
                </div>
            </form>
            <div class="handle_link">
                <a href="?page=student_register">Đăng ký sinh viên</a>
            </div>
        </div>
    </div>
</section>

<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST['username'];
    $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $name = $_POST['name_user'];
    $email = $_POST['email_user'];
    $numberPhone = $_POST['numberphone_user'];
    $address = trim($_POST['address_user']);
    $role = $_POST['vai_tro'];
    
    // Kiểm tra xem username và sđt đã tồn tại chưa
    $check_result = checkRegister($conn, $user_name, $numberPhone);
    if ($check_result->num_rows > 0) {
        $_SESSION['name'] = $_POST['name_user'];
        $_SESSION['email'] = $_POST['email_user'];
        $_SESSION['numberphone'] = $_POST['numberphone_user'];
        $_SESSION['address'] = $_POST['address_user'];
        echo "<script>
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: 'Tài khoản $user_name hoặc SĐT $numberPhone đã tồn tại',
                showConfirmButton: false,
                timer: 3000,
                customClass: {
                    title: 'custom-alert-title'
                }
              });

                setTimeout(function() {
                    window.location.href='index.php?page=register';
                }, 2500);
            </script>";
    } else {
        $sql_signUP = signUp($conn, $user_name, $password, $name, $email, $numberPhone, $address, $role);
        if ($sql_signUP) {
            echo "<script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Đăng ký tài khoản thành công',
                showConfirmButton: false,
                timer: 2500,
                customClass: {
                    title: 'custom-alert-title'
                }
              });

                setTimeout(function() {
                    window.location.href='index.php?page=login';
                }, 2000);
            </script>";
        } 
    }
}

?>