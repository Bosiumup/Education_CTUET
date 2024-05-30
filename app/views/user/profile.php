<div class=auth-page>
    <div class="form">
        <form method="post" enctype="multipart/form-data">
            <!-- Hiển thị các trường thông tin người dùng -->
            <div>
                <div>
                    <p>Tài khoản</p>
                    <input type="text" name="username" value="<?php echo $student['SinhVienID'] ?>" readonly>
                </div>

                <div>
                    <p>Tên</p>
                    <input type="text" name="name" value="<?php echo $student['TenSinhVien']; ?>" readonly>
                </div>

                <div>
                    <p>Lớp</p>
                    <input type="text" name="name" value="<?php echo $EP['TenChuongTrinh']; ?>" readonly>
                </div>

                <div>
                    <p>Email</p>
                    <input type="text" name="birth_year" value="<?php echo $student['Email'] ?>" readonly>
                </div>

                <div>
                    <p>Số điện thoại</p>
                    <input type="text" name="hometown" value="<?php echo $student['SoDienThoai'] ?>" readonly>
                </div>
                <br>
            </div>
            <div class="message">
                <a class="button" href="?page=change_pass">Đổi mật khẩu</a>
            </div>
        </form>
    </div>
</div>
