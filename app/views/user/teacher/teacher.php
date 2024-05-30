<table id="table-majors">
    <!-- Heading table -->
    <thead id="table-head">
        <tr class="row-h">
            <?php if (isset($_GET['TenChuongTrinh'])): ?>
            <div class="d-flex">
                <h4>THÔNG TIN CHƯƠNG TRÌNH ĐÀO TẠO</h4>
                <button class="back_btn" type="submit"><a href="?page=teacher">Quay Lại</a></button>
            </div>
            <form>

            </form>
            <th class="col-h">Mã Chương Trình Đào Tạo</th>
            <th class="col-h">Tên Chương Trình</th>
            <th class="col-h">Mã Môn</th>
            <th class="col-h">Tên Môn</th>
            <?php else: ?>
            <h4 style="margin-top: 20px;">THÔNG TIN KHOA</h4>
            <th class="col-h">Mã Khoa</th>
            <th class="col-h">Tên Khoa</th>
            <th class="col-h">Tên chương trình đào tạo</th>
            <?php endif; ?>
        </tr>
    </thead>
    <!-- End -->

    <!-- Body table -->
    <tbody id="table-body">
        <?php
        if (isset($_GET['TenChuongTrinh'])) {
            // Xử lý khi có tham số TenChuongTrinh trong URL
            $tenChuongTrinh = $_GET['TenChuongTrinh'];
            $result = SJ_EP($conn, $tenChuongTrinh);
            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
        <tr class="row-d">
            <td class="col-d"><?php echo $row['CTDaoTaoID'] ?></td>
            <td class="col-d"><?php echo $row['TenChuongTrinh'] ?></td>
            <td class="col-d"><?php echo $row['MonHocID'] ?></td>
            <td class="col-d"><?php echo $row['TenMonHoc'] ?></td>
        </tr>
        <?php
                }
            } else {
                ?>
        <tr class="row-d">
            <td class="col-d" colspan="4">Không có dữ liệu</td>
        </tr>
        <?php
            }
        } else {
            // Xử lý khi không có tham số TenChuongTrinh trong URL
            $idGiangVien = $_SESSION['Username'];
            $result = EP_GiangVienID($conn, $idGiangVien);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    ?>
        <tr class="row-d">
            <td class="col-d"><?php echo $row['KhoaID'] ?></td>
            <td class="col-d"><?php echo $row['CTDaoTaoID'] ?></td>
            <td class="col-d">
                <form method="GET" name="TenChuongTrinh">
                    <input type="hidden" name="page" value="teacher">
                    <input type="hidden" name="TenChuongTrinh" value="<?php echo $row['TenChuongTrinh'] ?>">
                    <button type="submit"><?php echo $row['TenChuongTrinh'] ?></button>
                </form>
            </td>
        </tr>
        <?php
                }
            } else {
                ?>
        <tr class="row-d">
            <td class="col-d" colspan="4">Không có dữ liệu</td>
        </tr>
        <?php
            }

        }
        ?>
    </tbody>
    <!-- End -->
</table>
<style>
form button:hover {
    color: var(--primary-hover-color);
    cursor: pointer;
}

button {
    font-size: 16px;
}

.back_btn {
    float: right;
    margin-bottom: 20px;
    font-size: 14px;
    font-weight: 600;
    background-color: var(--primary-color);
    color: #fff;
    border: none;
    outline: none;
    padding: 10px 20px;
    margin-left: 10px;
    border-radius: 10px;
    transition: all ease 0.1s;
    box-shadow: 0px 5px 0px 0px #9bbafe;
}

.back_btn a {
    color: #fff;
}

.back_btn:hover {
    opacity: 0.9;
    cursor: pointer;
}

.back_btn:active {
    transform: translateY(5px);
    box-shadow: 0px 0px 0px 0px #9badfe;
}

.d-flex {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
</style>