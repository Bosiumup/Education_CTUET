<?php
// NẾU TỪ TRANG KHOA TRONG BẢNG KHOA NHẤP VÀO MÃ KHOA HOẶC TÊN KHOA THÌ SẼ BAY QUA TRANG CHƯƠNG TRÌNH ĐÀO TẠO THUỘC KHOA ĐÓ
if (isset($_GET['KhoaID'])) {
    $khoaID = $_GET['KhoaID'];
    $result = EP_KhoaID($conn, $khoaID); // Gọi hàm EP_KhoaID() nếu có mã khoa được nhận
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr class="row-d">
                <td class="col-d"><?php echo $row['KhoaID'] ?></td>
                <td class="col-d"><?php echo $row['CTDaoTaoID'] ?></td>
                <td class="col-d"><?php echo $row['TenChuongTrinh'] ?></td>
                <td class="col-d">
                    <!-- Button open modal update -->
                    <input class="epPresentKhoaID" type="hidden" value="<?php echo $row['KhoaID'] ?>">
                    <input class="epPresentID" type="hidden" value="<?php echo $row['CTDaoTaoID'] ?>">
                    <input class="epPresentName" type="hidden" value="<?php echo $row['TenChuongTrinh'] ?>">
                    <button class="EPOpenFormUpdate updateBtn" type="button">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                </td>
                <td class="col-d">
                    <!-- Delete -->
                    <form action="?page=ep" method="post">
                        <input name="EPID" type="hidden" value="<?php echo $row['CTDaoTaoID'] ?>">
                        <button name="EPDelete" type="submit" class="deleteBtn">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            <?php
        }
    }
}
// NẾU NHẤP VÀO THẲNG TRANG CHƯƠNG TRÌNH ĐÀO TẠO THÌ CODE SẼ CHẠY TRONG ELSE
else {
    // NẾU CÓ TRA CỨU THÌ CHỈ RA KẾT QUẢ TRA CỨU
    if (isset($_GET['SJNameSearch'])) {
        $search = $_GET['SJNameSearch'];
        $result = SJ_Search($conn, $search);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr class="row-d">
                    <td class="col-d"><?php echo $row['MonHocID'] ?></td>
                    <td class="col-d"><?php echo $row['CTDaoTaoID'] ?></td>
                    <td class="col-d"><?php echo $row['TenMonHoc'] ?></td>
                    <td class="col-d"><?php echo $row['HocKy'] ?></td>
                    <td class="col-d"><?php echo $row['SoTinChi'] ?></td>
                    <td class="col-d"><?php echo $row['SoTietLyThuyet'] ?></td>
                    <td class="col-d"><?php echo $row['SoTietThucHanh'] ?></td>
                    <td class="col-d">
                        <!-- Button open modal update -->
                        <input class="SJPresentKhoaID" type="hidden" value="<?php echo $row['MonHocID'] ?>">
                        <input class="SJPresentID" type="hidden" value="<?php echo $row['CTDaoTaoID'] ?>">
                        <input class="SJPresentName" type="hidden" value="<?php echo $row['TenMonHoc'] ?>">
                        <button class="SJOpenFormUpdate updateBtn" type="button">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                    </td>
                    <td class="col-d">
                        <!-- Delete -->
                        <form action="?page=subject" method="post">
                            <input name="SJID" type="hidden" value="<?php echo $row['MonHocID'] ?>">
                            <button name="SJDelete" type="submit" class="deleteBtn">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php
            }
        }
    }
    // NẾU KHÔNG CÓ TRA CỨU THÌ MẶC ĐỊNH SẼ HIỂN THỊ RA HẾT TẤT CẢ CHƯƠNG TRÌNH ĐÀO TẠO
    else {
        $result = SJ($conn);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr class="row-d">
                    <td class="col-d"><?php echo $row['MonHocID'] ?></td>
                    <td class="col-d"><?php echo $row['CTDaoTaoID'] ?></td>
                    <td class="col-d"><?php echo $row['TenMonHoc'] ?></td>
                    <td class="col-d"><?php echo $row['HocKy'] ?></td>
                    <td class="col-d"><?php echo $row['SoTinChi'] ?></td>
                    <td class="col-d"><?php echo $row['SoTietLyThuyet'] ?></td>
                    <td class="col-d"><?php echo $row['SoTietThucHanh'] ?></td>
                    <td class="col-d">
                        <!-- Button open modal update -->
                        <input class="SJPresentKhoaID" type="hidden" value="<?php echo $row['MonHocID'] ?>">
                        <input class="SJPresentID" type="hidden" value="<?php echo $row['CTDaoTaoID'] ?>">
                        <input class="SJPresentName" type="hidden" value="<?php echo $row['TenMonHoc'] ?>">
                        <button class="SJOpenFormUpdate updateBtn" type="button">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                    </td>
                    <td class="col-d">
                        <!-- Delete -->
                        <form action="?page=subject" method="post">
                            <input name="SJID" type="hidden" value="<?php echo $row['MonHocID'] ?>">
                            <button name="SJDelete" type="submit" class="deleteBtn">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php
            }
        }
    }
}
?>