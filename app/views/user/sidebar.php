<nav class="main-sideBar-admin">
    <header class="navbar-header-img">
        <img src="public/imgs/logo.png" alt="logo-education">
    </header>
    <div class="navbar-container">
        <ul class="nav-list">
            <li class="nav-list-item no-hover">
                <a href="#">
                    <i class="fa-solid fa-school"></i>
                    <span><?php echo $EP["TenChuongTrinh"] ?></span>
                </a>
            </li>
            <li class="nav-list-item no-hover">
                <a href="#">
                    <i class="fa-solid fa-house fa-fw"></i>
                    <span>Khoa <?php echo $faculty["TenKhoa"] ?></span>
                </a>
            </li>
            <li class="nav-list-item active">
                <a href="?page=student">
                    <i class="fa-solid fa-list fa-fw"></i>
                    <span>Học phần</span>
                </a>
            </li>
            <li class="nav-list-item">
                <a href="?page=student_option">
                    <i class="fa-solid fa-user"></i>
                    <span>Người dùng</span>
                    <i class="fa-solid fa-caret-down fa-fw down-arrow"></i>
                </a>
                <ul class="subnav">
                    <li class="nav-list-item">
                        <a href="?page=profile">
                            <i class="fa-solid fa-user-tie"></i>
                            <span>Thông tin sinh viên</span>
                        </a>
                    </li>
                    <li class="nav-list-item">
                        <a href="?page=change_pass">
                            <i class="fa-solid fas fa-wrench"></i>
                            <span>Đổi mật khẩu</span>
                        </a>
                    </li>
                </ul>
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