<!-- Modal add ctdt -->
<div class="modal js-modal-add">
    <div class="modal-container js-modal-container-add">
        <!-- header -->
        <header class="modal-header">
            <div class="modal-header-content">
                THÊM KHOA
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
            <form action="<?php echo "index.php?page=khoa.php" ?>" method="post">
                <div id="update_form">
                    <img src="assets/imgs/logo.png" alt="logo-form">
                    <div class="id_khoa df-center">
                        <label class="w-30" for="ma_khoa">Mã Khoa</label>
                        <input type="text" id="ma_khoa" name="ma_khoa" placeholder="Nhập mã Khoa">
                    </div>

                    <div class="name_khoa df-center">
                        <label class="w-30" for="ten_khoa">Tên Khoa</label>
                        <input type="text" id="ten_khoa" name="ten_khoa" placeholder="Nhập tên Khoa">
                    </div>

                    <div class="add_khoa">
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
    $ma_khoa = $_POST['ma_khoa'];
    $ten_khoa = $_POST['ten_khoa'];

    // Hàm kiểm tra mã CTDT or tên CTDT trùng
    $result = checkAddKhoa($conn, $ma_khoa, $ten_khoa);
    $check_khoa_row = $result->fetch_assoc();

    // Js xử lý khi người dùng chưa nhập mã hoặc tên 
    if (empty($ma_khoa) || empty($ten_khoa)) {
        echo "<script>alert('Nhập mã Khoa và tên Khoa trước khi thêm!');</script>";
    }
    // check xem đã có dữ liệu hay chưa ? nếu lớn hơn 0 thì đã có dữ liệu echo sẽ được in ra, ngược lại thì chưa có dữ liệu thì sẽ thêm dữ liệu vào database
    elseif ($check_khoa_row['count'] > 0) {
        echo "<script>alert('Mã Khoa hoặc tên Khoa đã tồn tại');</script>";
    } else {
        // Hàm add ctdt
        $result = addKhoa($conn, $ma_khoa, $ten_khoa);

        if ($result) {
            // Thêm thành công, hiển thị thông báo và tải lại trang
            echo "<script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Thêm khoa thành công',
                showConfirmButton: false,
                timer: 2000
              });

    setTimeout(function() {
        window.location.href='index.php?page=khoa.php';
    }, 1500);
</script>";
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