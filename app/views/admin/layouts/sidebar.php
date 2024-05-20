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
                <a href="?page=subject">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <span>Môn học</span>
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
                        <a href="#">
                            <i class="fa-solid fa-user-graduate"></i>
                            <span>Sinh viên</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-list-item">
                <a href="?page=register">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    <span>Cấp tài khoản</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const items = document.querySelectorAll(".nav-list-item");
    const storageKey = "activeItem";

    // Lấy trạng thái active từ session storage (nếu có)
    let activeIndex = sessionStorage.getItem(storageKey);
    if (activeIndex !== null) {
        items.forEach((item) => {
            item.classList.remove("active");
        });
        items[activeIndex].classList.add("active");
    }

    items.forEach((item, index) => {
        item.addEventListener("click", (event) => {
            items.forEach((item) => {
                item.classList.remove("active");
            });
            event.currentTarget.classList.add("active");

            // Lưu trạng thái active vào session storage
            sessionStorage.setItem(storageKey, index);
        });
    });
});
</script>