<?php
if (isset($_POST['Logout'])) {
    $account = account($conn, $_SESSION["Username"]);
    if ($account->num_rows > 0) {
        $row = $account->fetch_assoc();
        if ($row["LoaiTaiKhoan"] == "admin") {
            session_destroy();
            echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Đăng xuất thành công',
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
        else {
            session_destroy();
            echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Đăng xuất thành công',
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
}