<nav class="main-sideBar-admin">
    <header class="navbar-header-img">
        <img src="public/imgs/logo.png" alt="logo-education">
    </header>
    <div class="navbar-container">
        <ul class="nav-list">
            <li class="nav-list-item active">
                <a href="admin.php">
                    <i class="fa-solid fa-house fa-fw"></i>
                    <span>Trang chủ</span>
                </a>
            </li>
            <li class="nav-list-item">
                <a href="?page=faculty">
                    <i class="fa-solid fa-list fa-fw"></i>
                    <span>Khoa</span>
                </a>
            </li>
            <li class="nav-list-item">
                <a href="?page=ep">
                    <i class="fa-solid fa-school"></i>
                    <span>Chương trình đạo tạo</span>
                </a>
            </li>
            <li class="nav-list-item">
                <a href="">
                    <i class="fa-solid fa-user"></i>
                    <span>Người dùng</span>
                    <i class="fa-solid fa-caret-down fa-fw down-arrow"></i>
                </a>
                <ul class="subnav">
                    <li class="nav-list-item">
                        <a href="?page=teacher">
                            <i class="fa-solid fa-user-tie"></i>
                            <span>Giảng viên</span>
                        </a>
                    </li>

                    <li class="nav-list-item">
                        <a href="">
                            <i class="fa-solid fa-user-graduate"></i>
                            <span>Sinh viên</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-list-item">
                <a href="">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    <span>Cấp tài khoản</span>
                    <i class="fa-solid fa-caret-down fa-fw down-arrow"></i>
                </a>
                <ul class="subnav">
                    <li class="nav-list-item">
                        <a href="">
                            <i class="fa-solid fa-user-tie"></i>
                            <span>Giảng viên</span>
                        </a>
                    </li>

                    <li class="nav-list-item">
                        <a href="">
                            <i class="fa-solid fa-user-graduate"></i>
                            <span>Sinh viên</span>
                        </a>
                    </li>
                </ul>
            </li>
    </div>
</nav>

<script>
document.addEventListener("DOMContentLoaded", () => {
    // Lấy danh sách các item
    const items = document.querySelectorAll(".nav-list-item");

    // biến lưu trữ slide hiện tại. ban đầu = 0
    let currentItem = 0;

    // Điều hướng đến slide khi click vào box tương ứng
    items.forEach((item, index) => {
        item.addEventListener("click", () => {
            // Chuyển đến slide được nhấp vào
            goToItem(index);
        });
    });

    let goToItem = (index) => {
        // Ẩn item hiện tại và hiển thị item mới
        items[currentItem].classList.remove("active");
        items[index].classList.add("active");

        // Cập nhật vị trí item hiện tại
        currentItem = index;
    };
});
</script>