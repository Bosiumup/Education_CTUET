<?php
$maCtdt = $_GET['ma_ctdt'];
$result_maCtdt = maCTmonhoc($conn, $maCtdt);
$row = $result_maCtdt->fetch_assoc();

?>

<div class="modal js-modal-update">
    <div class="modal-container js-modal-container-update">
        <!-- header -->
        <header class="modal-header">
            <div class="modal-header-content">
                <img style="width: 11%" src="src/assets/imgs/logo.png" alt="logo-form">
            </div>
            <!-- icon close -->
            <div class="close-container">
                <div class="modal-close js-modal-close-update">
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </div>

        </header>

        <div class="modal-body">
            <form action="<?php echo "index.php?page=hocphan.php&ma_ctdt=$row[ma_ctdt]"; ?>" method="post">
                <div id="update_form">

                    <input type="hidden" id="ma_mon_hoc_cu" name="ma_mon_hoc_cu">

                    <div class="id-name">
                        <div class="id_mon_hoc">
                            <label for="ma_mon_hoc_updated">Mã học phần</label>
                            <input type="text" id="ma_mon_hoc_updated" name="ma_mon_hoc_updated">
                        </div>

                        <div class="name_mon_hoc">
                            <label for="ten_mon_hoc_updated">Tên học phần</label>
                            <input type="text" id="ten_mon_hoc_updated" name="ten_mon_hoc_updated">
                        </div>
                    </div>

                    <div class="hk-tc">
                        <div class="hk">
                            <label for="hoc_ki_updated">Học kì</label>
                            <input type="text" id="hoc_ki_updated" name="hoc_ki_updated">
                        </div>

                        <div class="tc">
                            <label for="so_tin_chi_updated">Số tín chỉ</label>
                            <input type="text" id="so_tin_chi_updated" name="so_tin_chi_updated">
                        </div>
                    </div>

                    <div class="stlt-stth">
                        <div class="stlt">
                            <label for="so_tiet_ly_thuyet_updated">Số tiết lý thuyết</label>
                            <input type="text" id="so_tiet_ly_thuyet_updated" name="so_tiet_ly_thuyet_updated">
                        </div>

                        <div class="stth">
                            <label for="so_tiet_thuc_hanh_updated">Số tiết thực hành</label>
                            <input type="text" id="so_tiet_thuc_hanh_updated" name="so_tiet_thuc_hanh_updated">
                        </div>
                    </div>

                    <div class="update_hoc_phan">
                        <input type="submit" name="update_submit" value="CẬP NHẬT (Khi có từ 2 CTDT)">
                        <input type="submit" name="update_submit_all" value="CẬP NHẬT TẤT CẢ">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Xử lí data -->
<?php

// Update all --------------------
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_submit_all'])) {
    // Lấy dữ liệu được gửi từ form bằng phương thức POST
    $ma_mon_hoc_cu = $_POST['ma_mon_hoc_cu'];
    $ma_mon_hoc_updated = $_POST['ma_mon_hoc_updated'];
    $ten_mon_hoc_updated = $_POST['ten_mon_hoc_updated'];
    $hoc_ki_updated = $_POST['hoc_ki_updated'];
    $so_tin_chi_updated = $_POST['so_tin_chi_updated'];
    $so_tiet_ly_thuyet_updated = $_POST['so_tiet_ly_thuyet_updated'];
    $so_tiet_thuc_hanh_updated = $_POST['so_tiet_thuc_hanh_updated'];

    // Hàm check update mon_hoc
    $result_mon_hoc = checkUpdateHocphan($conn, $ten_mon_hoc_updated, $ma_mon_hoc_cu);
    $check_row_mon_hoc = $result_mon_hoc->fetch_assoc();

    // Lấy danh sách tên và mã môn học từ cơ sở dữ liệu
    $resultHocphan = getHocphan($conn);
    $maMonhocArray = [];
    $tenMonhocArray = [];
    while ($rowHocphan = $resultHocphan->fetch_assoc()) {
        $maMonhocArray[] = $rowHocphan['ma_mon_hoc'];
        $tenMonhocArray[] = $rowHocphan['ten_mon_hoc'];
    }

    // Js xử lý khi người dùng nhập chưa đủ thông tin
    if (
        empty($ten_mon_hoc_updated) || empty($hoc_ki_updated) || empty($so_tin_chi_updated) ||
        empty($so_tiet_ly_thuyet_updated) || empty($so_tiet_thuc_hanh_updated)
    ) {
        echo "<script>";
        echo "alert('Vui lòng nhập đầy đủ thông tin trước khi cập nhật!');";
        echo "</script>";
    } elseif ($check_row_mon_hoc['count'] > 0) {
        echo "<script>";
        echo "alert('Tên học phần đã tồn tại. Vui lòng điền tên học phần khác!');";
        echo "</script>";
    }
    // elseif (in_array($ma_mon_hoc_updated, $maMonhocArray)) {
    //     echo "<script>";
    //     echo "alert('Đã có mã học phần hoặc tên học phần trong danh sách môn!');";
    //     echo "</script>";
    // } 
    else {
        // Tắt tạm thời ràng buộc khóa ngoại
        $conn->query("SET FOREIGN_KEY_CHECKS=0");

        // Hàm update theo mã học phần
        $result_mon_hoc = updateHocphanAll(
            $conn,
            $ma_mon_hoc_updated,
            $ten_mon_hoc_updated,
            $hoc_ki_updated,
            $so_tin_chi_updated,
            $so_tiet_ly_thuyet_updated,
            $so_tiet_thuc_hanh_updated,
            $ma_mon_hoc_cu
        );

        if ($result_mon_hoc) {
            // Cập nhật thành công, hiển thị thông báo và tải lại trang
            echo "<script>
           alert('Cập nhật học phần thành công!');
           window.location.href='index.php?page=hocphan.php&ma_ctdt=$row[ma_ctdt]';
           </script>";
            exit;
        } else {
            echo "Có lỗi xảy ra khi cập nhật dữ liệu trong bảng mon_hoc: " . $conn->error;
        }

        // Mở lại ràng buộc khóa ngoại
        $conn->query("SET FOREIGN_KEY_CHECKS=1");
    }
}

// Update element --------------------
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_submit'])) {
    // Lấy dữ liệu được gửi từ form bằng phương thức POST
    $ma_mon_hoc_cu = $_POST['ma_mon_hoc_cu'];
    $ma_mon_hoc_updated = $_POST['ma_mon_hoc_updated'];
    $ten_mon_hoc_updated = $_POST['ten_mon_hoc_updated'];
    $hoc_ki_updated = $_POST['hoc_ki_updated'];
    $so_tin_chi_updated = $_POST['so_tin_chi_updated'];
    $so_tiet_ly_thuyet_updated = $_POST['so_tiet_ly_thuyet_updated'];
    $so_tiet_thuc_hanh_updated = $_POST['so_tiet_thuc_hanh_updated'];

    // Hàm check update mon_hoc
    $result_mon_hoc = checkUpdateHocphan($conn, $ten_mon_hoc_updated, $ma_mon_hoc_cu);
    $check_row_mon_hoc = $result_mon_hoc->fetch_assoc();

    // Lấy danh sách tên và mã môn học từ cơ sở dữ liệu
    $resultHocphan = getHocphan($conn);
    $maMonhocArray = [];
    $tenMonhocArray = [];
    while ($rowHocphan = $resultHocphan->fetch_assoc()) {
        $maMonhocArray[] = $rowHocphan['ma_mon_hoc'];
        $tenMonhocArray[] = $rowHocphan['ten_mon_hoc'];
    }
    if (
        empty($ma_mon_hoc_updated) || empty($ten_mon_hoc_updated) || empty($hoc_ki_updated) || empty($so_tin_chi_updated) ||
        empty($so_tiet_ly_thuyet_updated) || empty($so_tiet_thuc_hanh_updated)
    ) {
        echo "<script>";
        echo "alert('Vui lòng nhập đầy đủ thông tin trước khi cập nhật!');";
        echo "</script>";
    } elseif ($check_row_mon_hoc['count'] > 0) {
        echo "<script>";
        echo "alert('Tên học phần đã tồn tại. Vui lòng điền tên học phần khác!');";
        echo "</script>";
    } elseif (in_array($ma_mon_hoc_updated, $maMonhocArray) || in_array($ten_mon_hoc_updated, $tenMonhocArray)) {
        echo "<script>";
        echo "alert('Đã có mã học phần hoặc tên học phần trong danh sách môn!');";
        echo "</script>";
    } else {
        // Hàm update theo mã học phần
        $result_mon_hoc = updateHocphanElement(
            $conn,
            $ma_mon_hoc_updated,
            $ten_mon_hoc_updated,
            $hoc_ki_updated,
            $so_tin_chi_updated,
            $so_tiet_ly_thuyet_updated,
            $so_tiet_thuc_hanh_updated,
            $ma_mon_hoc_cu,
            $row["ma_ctdt"]
        );

        if ($result_mon_hoc) {
            // Cập nhật thành công, hiển thị thông báo và tải lại trang
            echo "<script>
           alert('Cập nhật học phần thành công!');
           window.location.href='index.php?page=hocphan.php&ma_ctdt=$row[ma_ctdt]';
           </script>";
            exit;
        } else {
            echo "Có lỗi xảy ra khi cập nhật dữ liệu trong bảng mon_hoc: " . $conn->error;
        }
    }
}
?>

<!-- js -->
<script>
    // Update
    const updateBtns = document.querySelectorAll(".updateBtn");
    const modalUpdate = document.querySelector(".js-modal-update");
    const modalContainerUpdate = document.querySelector(
        ".js-modal-container-update"
    );
    const modalCloseUpdate = document.querySelector(".js-modal-close-update");

    function showModalUpdate(event) {
        // combo để lấy dữ liệu 1 hàng
        const rowHocphan = event.currentTarget.closest(".row-item");
        const maMonhoc = rowHocphan.getAttribute("data-ma_mon_hoc");
        const tenMonhoc = rowHocphan.getAttribute("data-ten_mon_hoc");
        const hocKi = rowHocphan.getAttribute("data-hoc_ki");
        const soTinchi = rowHocphan.getAttribute("data-so_tin_chi");
        const sTlt = rowHocphan.getAttribute("data-stlt");
        const sTth = rowHocphan.getAttribute("data-stth");

        const ma_mon_hocCuInput = document.getElementById("ma_mon_hoc_cu");
        const ma_mon_hocInput = document.getElementById("ma_mon_hoc_updated");
        const ten_mon_hocInput = document.getElementById("ten_mon_hoc_updated");
        const hocKiInput = document.getElementById("hoc_ki_updated");
        const soTinchiInput = document.getElementById("so_tin_chi_updated");
        const sTltInput = document.getElementById("so_tiet_ly_thuyet_updated");
        const sTthInput = document.getElementById("so_tiet_thuc_hanh_updated");

        ma_mon_hocCuInput.value = maMonhoc;
        ma_mon_hocInput.value = maMonhoc;
        ten_mon_hocInput.value = tenMonhoc;
        hocKiInput.value = hocKi;
        soTinchiInput.value = soTinchi;
        sTltInput.value = sTlt;
        sTthInput.value = sTth;

        modalUpdate.classList.add("open");
    }

    function hideModalUpdate() {
        const ma_mon_hocCuInput = document.getElementById("ma_mon_hoc_cu");
        const ma_mon_hocInput = document.getElementById("ma_mon_hoc_updated");
        const ten_mon_hocInput = document.getElementById("ten_mon_hoc_updated");
        const hocKiInput = document.getElementById("hoc_ki_updated");
        const soTinchiInput = document.getElementById("so_tin_chi_updated");
        const sTltInput = document.getElementById("so_tiet_ly_thuyet_updated");
        const sTthInput = document.getElementById("so_tiet_thuc_hanh_updated");

        ma_mon_hocCuInput.value = "";
        ma_mon_hocInput.value = "";
        ten_mon_hocInput.value = "";
        hocKiInput.value = "";
        soTinchiInput.value = "";
        sTltInput.value = "";
        sTthInput.value = "";

        modalUpdate.classList.remove("open");
    }

    for (const updateBtn of updateBtns) {
        updateBtn.addEventListener("click", showModalUpdate);
    }

    modalCloseUpdate.addEventListener("click", hideModalUpdate);
    modalUpdate.addEventListener("click", hideModalUpdate);
    modalContainerUpdate.addEventListener("click", function(event) {
        event.stopPropagation();
    });
</script>