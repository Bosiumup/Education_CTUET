<?php
if (isset($_POST['import_hocphan'])) {
    if (isset($_FILES['excel_file'])) {
        $excel_file = $_FILES['excel_file'];
        if ($excel_file['error'] == UPLOAD_ERR_OK) {
            $file_name = $excel_file['name'];
            move_uploaded_file($excel_file['tmp_name'], 'uploads/' . $file_name);

            require 'vendor/autoload.php';
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('uploads/' . $file_name);
            $worksheet = $spreadsheet->getActiveSheet();

            // Thêm một biến để kiểm soát xem đã đọc dòng tiêu đề chưa
            $skipHeader = true;

            foreach ($worksheet->getRowIterator() as $row) {
                // Bỏ qua dòng tiêu đề
                if ($skipHeader) {
                    $skipHeader = false;
                    continue;
                }

                $cellIterator = $row->getCellIterator();
                $data = [];
                foreach ($cellIterator as $cell) {
                    $data[] = $cell->getValue();
                }

                // Kiểm tra xem có đủ dữ liệu cần thiết
                if (count($data) < 6) { // Đổi 3 thành 6 vì bạn có 6 cột trong file Excel
                    echo "Dữ liệu không đủ hoặc không đúng định dạng. Bỏ qua dòng này.<br>";
                    continue;
                }

                $ma_mon_hoc = $data[0];
                $ten_mon_hoc = $data[1];
                $hoc_ki = $data[2];
                $so_tin_chi = $data[3];
                $so_tiet_ly_thuyet = $data[4];
                $so_tiet_thuc_hanh = $data[5];

                // Hàm check mã học phần or tên học phần có trùng không 
                $result_check = checkImport($conn, $ma_mon_hoc, $ten_mon_hoc);
                $check_hoc_phan_row = $result_check->fetch_assoc();

                // check xem đã có dữ liệu hay chưa ?
                if ($check_hoc_phan_row['count'] > 0) {
                    echo "<script>
           alert('Mã học phần hoặc tên học phần đã tồn tại!');
           window.location.href='index.php';
           </script>";
                    exit;
                } else {
                    // Tiến hành nhập dữ liệu vào cơ sở dữ liệu MySQL
                    $result = importHocphan($conn, $ma_mon_hoc, $ten_mon_hoc, $hoc_ki, $so_tin_chi, $so_tiet_ly_thuyet, $so_tiet_thuc_hanh);
                }
            }
            // Sau khi nhập dữ liệu xong, bạn có thể xử lý thông báo hoặc điều hướng người dùng tới trang khác.
            echo "<script>
           alert('Import học phần thành công!');
           window.location.href='index.php';
           </script>";
            exit;
        } else {
            echo "Lỗi khi tải lên tệp Excel.";
        }
    }
}
