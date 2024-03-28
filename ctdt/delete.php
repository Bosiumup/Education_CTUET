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
                    <i style="color: #333 !important" class="fa-solid fa-xmark"></i>
                </div>
            </div>
        </header>

        <div class="modal-body">
            <form action="index.php" method="post">
                <div id="update_form">
                    <span class="fz-29">ĐỒNG Ý XÓA CTĐT</span>
                    <div class="delete_ctdt">
                        <input type='hidden' id='ctdt_id' name='ctdt_id'>
                        <input type="submit" name="delete_submit" value="XÁC NHẬN">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
// Xóa ctdt
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delete_submit'])) {
    $ma_ctdt = $_POST["ctdt_id"];
    $result_ctdt = deleteCtdt($conn, $ma_ctdt);
    if ($result_ctdt) {
        // Xoá thành công, chuyển hướng trang web lại để cập nhật table
        echo "<script>
               alert('Xóa chương trình đào tạo thành công!');
               window.location.href='index.php';
               </script>";
        exit;
    } else {
        echo "Xoá mã ctdt không thành công: " . $conn->error;
    }
}
?>

<!-- Xử lý js -->
<script>
    // Delete
    const deleteBtns = document.querySelectorAll(".deleteBtn");
    const modalDelete = document.querySelector(".js-modal-delete");
    const modalContainerDelete = document.querySelector(
        ".js-modal-container-delete"
    );
    const modalCloseDelete = document.querySelector(".js-modal-close-delete");

    const ctdtIdInput = document.getElementById("ctdt_id"); // Input ẩn chứa ctdt_id

    // Hàm hiển thị modal (thêm class open vào modal)
    function showModalDelete() {
        // Lấy mã ctdt để xóa
        const ctdtId = this.getAttribute("data-ctdt-id");
        ctdtIdInput.value = ctdtId; // Đặt giá trị ctdt_id vào input ẩn trong form

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