<nav class="main-sideBar-admin">
    <header class="navbar-header-img">
        <img src="public/imgs/logo.png" alt="logo-education">
    </header>
    <div class="navbar-container">
        <ul class="nav-list">
            <li class="nav-list-item active">
                <a href="user.php">
                    <i class="fa-solid fa-house fa-fw"></i>
                    <span>Trang chủ</span>
                </a>
            </li>
            <li class="nav-list-item">
                <a href="?page=teacher">
                    <i class="fa-solid fa-list fa-fw"></i>
                    <span>Thông tin GV</span>
                </a>
            </li>

            <li class="nav-list-item">
                <a href="#">
                    <i class="fa-solid fa-user"></i>
                    <span>Người dùng</span>
                    <i class="fa-solid fa-caret-down fa-fw down-arrow"></i>
                </a>
                <ul class="subnav">
                    <li class="nav-list-item">
                        <a href="?page=teacher_detail">
                            <i class="fa-solid fa-user-tie"></i>
                            <span>Thông tin</span>
                        </a>
                    </li>
                    <li class="nav-list-item">
                        <a href="?page=changePass">
                            <i class="fa-solid fa-key"></i>
                            <span>Đổi Mật Khẩu</span>
                        </a>
                    </li>
                </ul>
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