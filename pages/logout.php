<?php
if (isset($_POST['logout'])) {
    // Hủy toàn bộ phiên làm việc
    session_destroy();

    // Chuyển hướng người dùng về trang main.php
    echo "<script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Đăng xuất thành công',
                showConfirmButton: false,
                timer: 2000
              });

    setTimeout(function() {
        window.location.href='index.php';
    }, 1500);
</script>";
}
