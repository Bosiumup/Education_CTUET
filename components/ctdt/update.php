<!-- Modal update ctdt -->
<div class="modal js-modal-update">
    <div class="modal-container js-modal-container-update">
        <!-- header -->
        <header class="modal-header">
            <div class="modal-header-content">
                CHỈNH SỬA THÔNG TIN
            </div>
            <!-- icon close -->
            <div class="close-container">
                <div class="modal-close js-modal-close-update">
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </div>
        </header>

        <div class="modal-body">
            <form action="index.php" method="post">
                <div id="update_form">
                    <img src="src/assets/imgs/logo.png" alt="logo-form">

                    <input type="hidden" id="ma_ctdt_cu" name="ma_ctdt_cu">

                    <div class="id_ctdt df-center">
                        <label class="w-30" for="ma_ctdt_updated">Mã chương trình đào tạo</label>
                        <input type="text" id="ma_ctdt_updated" name="ma_ctdt_updated">
                    </div>
                    <div class="name_ctdt df-center">
                        <label class="w-30" for="ten_ctdt_updated">Tên chương trình đào tạo</label>
                        <input type="text" id="ten_ctdt_updated" name="ten_ctdt_updated">
                    </div>
                    <div class="update_ctdt">
                        <input type="submit" name="update_Btn" value="XÁC NHẬN">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Xử lý data -->
<?php
// Mã PHP để cập nhật dữ liệu
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_Btn'])) {

    $ma_ctdt_cu = $_POST['ma_ctdt_cu'];
    $ma_ctdt_updated = $_POST['ma_ctdt_updated'];
    $ten_ctdt_updated = $_POST['ten_ctdt_updated'];

    if (empty($ma_ctdt_updated) || empty($ten_ctdt_updated)) {
        echo "<script>";
        echo "alert('Vui lòng nhập mã CTDT và tên CTDT trước khi cập nhật!');";
        echo "</script>";
    } else {
        // Hàm kiểm tra xem mã CTDT mới hoặc tên CTDT mới đã tồn tại trong cơ sở dữ liệu
        $result = checkUpdateCtdt($conn, $ma_ctdt_cu, $ma_ctdt_updated, $ten_ctdt_updated);
        $check_row = $result->fetch_assoc();

        if ($check_row['count'] > 0) {
            echo "<script>";
            echo "alert('Mã CTDT hoặc tên CTDT đã tồn tại. Vui lòng chọn mã CTDT và tên CTDT khác.');";
            echo "</script>";
        } else {
            $conn->query("SET FOREIGN_KEY_CHECKS=0");
            // Hàm update ctdt
            $result = updateCtdt($conn, $ma_ctdt_cu, $ma_ctdt_updated, $ten_ctdt_updated);

            if ($result) {
                // Cập nhật thành công, hiển thị thông báo và tải lại trang
                echo "<script>";
                echo "alert('Cập nhật chương trình đào tạo thành công!');";
                echo "window.location.href='index.php';";
                echo "</script>";
                exit;
            } else {
                echo "Có lỗi xảy ra khi cập nhật dữ liệu trong bảng ctdt: " . $conn->error;
            }
            $conn->query("SET FOREIGN_KEY_CHECKS=1");
        }
    }
}
?>

<!-- Xử lý js -->
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
        const row = event.currentTarget.closest(".row-item");
        const ma_ctdt = row.getAttribute("data-ma_ctdt");
        const ten_ctdt = row.getAttribute("data-ten_ctdt");

        const ma_ctdtInput = document.getElementById("ma_ctdt_updated");
        const ten_ctdtInput = document.getElementById("ten_ctdt_updated");
        const ma_ctdtCuInput = document.getElementById("ma_ctdt_cu");

        ma_ctdtInput.value = ma_ctdt;
        ten_ctdtInput.value = ten_ctdt;
        ma_ctdtCuInput.value = ma_ctdt;

        modalUpdate.classList.add("open");
    }

    function hideModalUpdate() {
        const ma_ctdtInput = document.getElementById("ma_ctdt_updated");
        const ten_ctdtInput = document.getElementById("ten_ctdt_updated");
        const ma_ctdtCuInput = document.getElementById("ma_ctdt_cu");

        ma_ctdtInput.value = "";
        ten_ctdtInput.value = "";
        ma_ctdtCuInput.value = "";

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