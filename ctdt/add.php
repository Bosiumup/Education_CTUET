<!-- Modal add ctdt -->
<div class="modal js-modal-add">
    <div class="modal-container js-modal-container-add">
        <!-- header -->
        <header class="modal-header">
            <div class="modal-header-content">
                THÊM CHƯƠNG TRÌNH ĐÀO TẠO
            </div>
            <!-- icon close -->
            <div class="close-container">
                <div class="modal-close js-modal-close-add">
                    <!-- icon -->
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </div>

        </header>

        <div class="modal-body">
            <form action="index.php" method="post">
                <div id="update_form">
                    <img src="src/assets/imgs/logo.png" alt="logo-form">
                    <div class="id_ctdt df-center">
                        <label class="w-30" for="ma_ctdt">Mã chương trình đào tạo</label>
                        <input type="text" id="ma_ctdt" name="ma_ctdt" placeholder="Mã chương trình đào tạo">
                    </div>

                    <div class="name_ctdt df-center">
                        <label class="w-30" for="ten_ctdt">Tên chương trình đào tạo</label>
                        <input type="text" id="ten_ctdt" name="ten_ctdt" placeholder="Tên chương trình đào tạo">
                    </div>

                    <div class="add_ctdt">
                        <input type="submit" name="add_submit" value="XÁC NHẬN">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Xử lý data -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_submit'])) {
    // Lấy dữ liệu từ biểu mẫu
    $ma_ctdt = $_POST['ma_ctdt'];
    $ten_ctdt = $_POST['ten_ctdt'];

    // Hàm kiểm tra mã CTDT or tên CTDT trùng
    $result = checkAddCtdt($conn, $ma_ctdt, $ten_ctdt);
    $check_ctdt_row = $result->fetch_assoc();

    // Js xử lý khi người dùng chưa nhập mã hoặc tên 
    if (empty($ma_ctdt) || empty($ten_ctdt)) {
        echo "<script>alert('Vui lòng nhập mã CTDT và tên CTDT trước khi thêm!');</script>";
    }
    // check xem đã có dữ liệu hay chưa ? nếu lớn hơn 0 thì đã có dữ liệu echo sẽ được in ra, ngược lại thì chưa có dữ liệu thì sẽ thêm dữ liệu vào database
    elseif ($check_ctdt_row['count'] > 0) {
        echo "<script>alert('Mã CTDT hoặc tên CTDT đã tồn tại. Vui lòng nhập lại!.');</script>";
    } else {
        // Hàm add ctdt
        $result = addCtdt($conn, $ma_ctdt, $ten_ctdt);

        if ($result) {
            // Thêm thành công, hiển thị thông báo và tải lại trang
            echo "<script>
           alert('Thêm chương trình đào tạo thành công!');
           window.location.href='index.php';
           </script>";
            exit;
        } else {
            echo "Lỗi: " . $result . "<br>" . $conn->error;
        }
    }
}
?>

<!-- Xử lý js -->
<script>
    // Add
    const addBtn = document.querySelector(".addCtdt");
    const modalAdd = document.querySelector(".js-modal-add");
    const modalContainerAdd = document.querySelector(".js-modal-container-add");
    const modalCloseAdd = document.querySelector(".js-modal-close-add");

    // Hàm hiển thị modal (thêm class open vào modal)
    function showModalAdd() {
        modalAdd.classList.add("open");
    }

    // Hàm ẩn modal (gỡ bỏ class open của modal)
    function hideModalAdd() {
        modalAdd.classList.remove("open");
    }

    // Nghe hành vi click
    addBtn.addEventListener("click", showModalAdd);

    // Nghe hành vi click vào button close
    modalCloseAdd.addEventListener("click", hideModalAdd);

    // Hành vi nhấn ra bên ngoài container sẽ close đi
    modalAdd.addEventListener("click", hideModalAdd);

    // Hàm ngăn chặn hành vi close của thẻ cha (thuật ngữ sủi bọt nước trong js)
    modalContainerAdd.addEventListener("click", function(event) {
        event.stopPropagation();
    });
</script>