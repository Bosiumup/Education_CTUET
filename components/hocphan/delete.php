<div class="modal js-modal-delete">
    <div class="modal-container js-modal-container-delete">
        <!-- header -->
        <header class="modal-header" style="background: radial-gradient(
    89.999% 99.8999% at 0% 0%,
    rgb(173 247 247 / 45%) 0%,
    rgb(255, 255, 255) 100% ); 
    border-bottom: 1px solid #e5e5e5;">
            <div class="modal-header-content" style="display: flex; margin-left: 25px;">
                <img style="width: 11%;" src="src/assets/imgs/logo.png" alt="logo-form">
            </div>
            <!-- icon close -->
            <div class="close-container">
                <div class="modal-close js-modal-close-delete">
                    <i style="color: #333;" class="fa-solid fa-xmark"></i>
                </div>
            </div>
        </header>

        <div class="modal-body">
            <form action="<?php echo "index.php?page=hocphan.php&ma_ctdt={$row['ma_ctdt']}"; ?>" method="post">
                <div id="update_form">
                    <span class="fz-29">ĐỒNG Ý XÓA HỌC PHẦN</span>
                    <div class="delete_ctdt">
                        <input type='hidden' id='hoc_phan_id' name='hoc_phan_id'>
                        <input type="submit" name="delete_submit" value="XÁC NHẬN">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Xử lí data -->
<?php
// Kiểm tra xem có yêu cầu POST xoá hay không
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delete_submit'])) {
    $ma_ctdt = $_GET["ma_ctdt"];
    $hoc_phan_id = $_POST['hoc_phan_id'];
    // Hàm delete học phần
    $result = deleteHocphan($conn, $hoc_phan_id, $ma_ctdt);
    if ($result) {
        // Xoá thành công, chuyển hướng trang web lại để cập nhật table
        echo "<script>
               alert('Xóa học phần thành công!');
               window.location.href='index.php?page=hocphan.php&ma_ctdt={$row['ma_ctdt']}';
               </script>";
        exit;
    }
} else {
    // echo "Xoá môn học không thành công: " . $conn->error;
}

// Xóa all học phần trong ctdt
$query = maMonhoc($conn, $ma_ctdt);
if ($query->num_rows > 0) {
    $maMonhocArray = array();
    // Lặp qua các dòng dữ liệu từ kết quả truy vấn
    while ($row = $query->fetch_assoc()) {
        // Thêm mã môn vào mảng
        $maMonhocArray[] = $row['ma_mon_hoc'];
    }

    for ($i = 0; $i <= count($maMonhocArray) - 1; $i++) {
        $count = countHocphan($conn, $maMonhocArray[$i]);
        $col = $count->fetch_assoc();
        if (isset($_POST["delete_all_hp"])) {
            if ($col["count"] > 1) {
                $sql = "DELETE FROM chitiet WHERE ma_mon_hoc = '$maMonhocArray[$i]' AND ma_ctdt = '$ma_ctdt'";
                $conn->query($sql);
                if ($i >= count($maMonhocArray) - 1) {
                    echo "<script>
                    alert('Xóa tất cả học phần của CTDT $ma_ctdt thành công!');
                    window.location.href='index.php?page=hocphan.php&ma_ctdt=$maCtdt';
                    </script>";
                }
            } else {
                $sql = "DELETE FROM chitiet WHERE ma_mon_hoc = '$maMonhocArray[$i]' AND ma_ctdt = '$ma_ctdt'";
                $conn->query($sql);
                if ($i >= count($maMonhocArray) - 1) {
                    echo "<script>
                    alert('Xóa tất cả học phần của CTDT $ma_ctdt thành công!');
                    window.location.href='index.php?page=hocphan.php&ma_ctdt=$maCtdt';
                    </script>";
                }
            }
        }
    }
}
?>

<!-- js -->
<script>
    // Delete
    const deleteBtns = document.querySelectorAll(".deleteBtn");
    const modalDelete = document.querySelector(".js-modal-delete");
    const modalContainerDelete = document.querySelector(
        ".js-modal-container-delete"
    );
    const modalCloseDelete = document.querySelector(".js-modal-close-delete");

    const hocphanIdInput = document.getElementById("hoc_phan_id"); // Input ẩn chứa ctdt_id

    // Hàm hiển thị modal (thêm class open vào modal)
    function showModalDelete() {
        // Lấy mã học phần để xóa
        const maMonhoc = this.getAttribute("data-hoc_phan-id");
        hocphanIdInput.value = maMonhoc; // Đặt giá trị hocphan_id vào input ẩn trong form

        modalDelete.classList.add("open");
    }

    // Hàm ẩn modal (gỡ bỏ class open của modal)
    function hideModalDelete() {
        modalDelete.classList.remove("open");
    }

    // Nghe hành vi click
    for (const deleteBtn of deleteBtns) {
        deleteBtn.addEventListener("click", showModalDelete);
    }

    // Nghe hành vi click vào button close
    modalCloseDelete.addEventListener("click", hideModalDelete);

    // Hành vi nhấn ra bên ngoài container sẽ close đi
    modalDelete.addEventListener("click", hideModalDelete);

    // Hàm ngăn chặn hành vi close của thẻ cha (thuật ngữ sủi bọt nước trong js)
    modalContainerDelete.addEventListener("click", function(event) {
        event.stopPropagation();
    });
</script>