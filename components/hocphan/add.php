<?php
$maCtdt = $_GET["ma_ctdt"];

// Khi click vào nút submit add thì dữ liệu sẽ được chèn vào database
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_submit'])) {
    // Lấy dữ liệu từ biểu mẫu
    $ma_mon_hoc = $_POST['dsmh'];

    if (empty($ma_mon_hoc)) {
        echo "<script>
           alert('Không có môn để thêm!');
           window.location.href='index.php?page=hocphan.php&ma_ctdt=$maCtdt';
           </script>";
    } else {
        // Hàm check mã học phần or tên học phần có trùng trong ctdt đó không 
        $result_hoc_phan_row = checkAddHocphan($conn, $maCtdt,  $ma_mon_hoc);
        $check_hoc_phan_row = $result_hoc_phan_row->fetch_assoc();

        // check xem đã có dữ liệu hay chưa ? nếu lớn hơn 0 thì đã có dữ liệu echo sẽ được in ra, ngược lại thì chưa có dữ liệu thì sẽ thêm dữ liệu vào database
        if ($check_hoc_phan_row['count'] > 0) {
            echo "<script>alert('Mã học phần tồn tại. Hãy chọn lại học phần khác!.');</script>";
        } else {
            // Hàm add học phần
            $result = addHocphan(
                $conn,
                $maCtdt,
                $ma_mon_hoc
            );

            if ($result) {
                // Thêm thành công, hiển thị thông báo và tải lại trang
                echo "<script>
           alert('Thêm học phần thành công!');
           window.location.href='index.php?page=hocphan.php&ma_ctdt=$maCtdt';
           </script>";
            } else {
                echo "Lỗi: " . $result . "<br>" . $conn->error;
            }
        }
    }
}
