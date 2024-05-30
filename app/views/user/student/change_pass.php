<div class="auth-page">
    <h1 class="textCenterWhite">Thay đổi mật khẩu</h1>
    <form class="form" method="post">
        <div class="inf-detail">
            <div class="text-start inf-item">
                <p>Mật khẩu cũ</p>
                <input class="cursor" type="password" name="old-pass" placeholder="******" required>
            </div>
            <div class="text-start inf-item">
                <p>Mật khẩu mới</p>
                <input class="cursor" type="password" name="new-pass" placeholder="******" required>
            </div>
            <div class="text-start inf-item">
                <p>Nhập lại mật khẩu mới</p>
                <input class="cursor" type="password" name="confirm-new-pass" placeholder="******" required>
            </div>
        </div>

        <button type="submit" name="update_pass">Cập nhật</button>
    </form>
</div>

<?php
if (isset($_SERVER["REQUEST_METHOD"]) && isset($_POST["update_pass"])) {
    // Lấy dữ liệu từ form
    $username = $_SESSION['Username'];
    echo $old_pass = $_POST['old-pass'];
    echo $new_pass = $_POST["new-pass"];
    echo $hash_new_pass = password_hash($new_pass, PASSWORD_DEFAULT);
    $confirm_new_pass = $_POST["confirm-new-pass"];

    // Kiểm tra xem người dùng có tồn tại trong database hay không
    $check_result = account($conn, $username);

    if ($check_result->num_rows > 0) {
        // Nếu người dùng tồn tại, lấy dữ liệu từ bản ghi đầu tiên
        $user_data = $check_result->fetch_assoc();
        // Nếu mật khẩu nhập vào khớp với mật khẩu từ database
        if (password_verify($old_pass, $user_data['Password'])) {
            if (password_verify($confirm_new_pass, $hash_new_pass)) {
                // Cập nhật pass người dùng trong cơ sở dữ liệu
                $sql_update_data = updatePass($conn, $username, $hash_new_pass);

                if ($sql_update_data === TRUE) {
                    echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Thành công',
                    showConfirmButton: false,
                    timer: 2500,
                    customClass: {
                        title: 'custom-alert-title'
                    }
                  });
    
                    setTimeout(function() {
                        window.location.href='?page=profile';
                    }, 1500);
                </script>";
                } else {
                    echo "Lỗi: " . $conn->error;
                }
            } else {
                echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: 'Mật khẩu mới không khớp',
                    showConfirmButton: false,
                    timer: 2500,
                    customClass: {
                        title: 'custom-alert-title'
                    }
                  });
    
                    setTimeout(function() {
                        window.location.href='';
                    }, 1500);
                </script>";
            }
        } else {
            echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Mật khẩu cũ không đúng',
                    showConfirmButton: false,
                    timer: 2500,
                    customClass: {
                        title: 'custom-alert-title'
                    }
                  });
    
                    setTimeout(function() {
                        window.location.href='';
                    }, 1500);
                </script>";
        }
    }
}
?>