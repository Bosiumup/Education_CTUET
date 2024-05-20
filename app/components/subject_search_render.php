<?php

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
                        <input class="SJPresentMonHocID" type="hidden" value="<?php echo $row['MonHocID'] ?>">
                        <input class="SJOldMonHocID" type="hidden" value="<?php echo $row['MonHocID'] ?>">
                        <input class="SJPresentID" type="hidden" value="<?php echo $row['CTDaoTaoID'] ?>">
                        <input class="SJPresentName" type="hidden" value="<?php echo $row['TenMonHoc'] ?>">
                        <input class="SJPresentHocKy" type="hidden" value="<?php echo $row['HocKy'] ?>">
                        <input class="SJPresentTinChi" type="hidden" value="<?php echo $row['SoTinChi'] ?>">
                        <input class="SJPresentLyThuyet" type="hidden" value="<?php echo $row['SoTietLyThuyet'] ?>">
                        <input class="SJPresentThucHanh" type="hidden" value="<?php echo $row['SoTietThucHanh'] ?>">

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
                        <input class="SJPresentMonHocID" type="hidden" value="<?php echo $row['MonHocID'] ?>">
                        <input class="SJOldMonHocID" type="hidden" value="<?php echo $row['MonHocID'] ?>">
                        <input class="SJPresentID" type="hidden" value="<?php echo $row['CTDaoTaoID'] ?>">
                        <input class="SJPresentName" type="hidden" value="<?php echo $row['TenMonHoc'] ?>">
                        <input class="SJPresentHocKy" type="hidden" value="<?php echo $row['HocKy'] ?>">
                        <input class="SJPresentTinChi" type="hidden" value="<?php echo $row['SoTinChi'] ?>">
                        <input class="SJPresentLyThuyet" type="hidden" value="<?php echo $row['SoTietLyThuyet'] ?>">
                        <input class="SJPresentThucHanh" type="hidden" value="<?php echo $row['SoTietThucHanh'] ?>">

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

?>