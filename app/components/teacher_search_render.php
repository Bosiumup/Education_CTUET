<?php
    if (isset($_GET['KhoaID'])) {
        $khoaID = $_GET['KhoaID'];
        $result = TC_KhoaID($conn, $khoaID);
        if ($result->num_rows > 0) {  
            while ($row = $result->fetch_assoc()) {
                ?>
<tr class="row-d">
    <td class="col-d"><?php echo $row['KhoaID'] ?></td>
    <td class="col-d"><?php echo $row['GiangVienID'] ?></td>
    <td class="col-d"><?php echo $row['TenGiangVien'] ?></td>
    <td class="col-d"><?php echo $row['Email'] ?></td>
    <td class="col-d"><?php echo $row['SoDienThoai'] ?></td>
    <td class="col-d">
        <!-- Button open modal update -->
        <!-- <input class="epPresentKhoaID" type="hidden" value="<?php echo $row['KhoaID'] ?>">
        <input class="epPresentID" type="hidden" value="<?php echo $row['CTDaoTaoID'] ?>">
        <input class="epPresentName" type="hidden" value="<?php echo $row['TenChuongTrinh'] ?>"> -->
        <button class="EPOpenFormUpdate updateBtn" type="button">
            <i class="fa-solid fa-pen"></i>
        </button>
    </td>
    <td class="col-d">
        <!-- Delete -->
        <form action="?page=ep" method="post">
            <!-- <input name="EPID" type="hidden" value="<?php echo $row['CTDaoTaoID'] ?>"> -->
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
    else {
        // NẾU CÓ TRA CỨU THÌ CHỈ RA KẾT QUẢ TRA CỨU
        if(isset($_GET['teacherSearch'])) {
            $search = $_GET['teacherSearch'];
            $result = TC_Search($conn, $search);
            if ($result->num_rows > 0) {  
                while ($row = $result->fetch_assoc()) {
                    ?>
<tr class="row-d">
    <td class="col-d"><?php echo $row['KhoaID'] ?></td>
    <td class="col-d"><?php echo $row['GiangVienID'] ?></td>
    <td class="col-d"><?php echo $row['TenGiangVien'] ?></td>
    <td class="col-d"><?php echo $row['Email'] ?></td>
    <td class="col-d"><?php echo $row['SoDienThoai'] ?></td>
    <td class="col-d">
        <!-- Button open modal update -->
        <input class="epPresentKhoaID" type="hidden" value="<?php echo $row['GiangVienID'] ?>">
        <input class="epPresentID" type="hidden" value="<?php echo $row['KhoaID'] ?>">
        <input class="epPresentName" type="hidden" value="<?php echo $row['TenGiangVien'] ?>">
        <button class="EPOpenFormUpdate updateBtn" type="button">
            <i class="fa-solid fa-pen"></i>
        </button>
    </td>
    <td class="col-d">
        <!-- Delete -->
        <form action="?page=teacher" method="post">
            <input name="teacherID" type="hidden" value="<?php echo $row['GiangVienID'] ?>">
            <button name="teacherbtn" type="submit" class="deleteBtn">
                <i class="fa-solid fa-trash"></i>
            </button>
        </form>
    </td>
</tr>
<?php
                }
            }
        }
        else {
            $result = teacher($conn);
            if ($result->num_rows > 0) {  
                while ($row = $result->fetch_assoc()) {
                    ?>
<tr class="row-d">
    <td class="col-d"><?php echo $row['KhoaID'] ?></td>
    <td class="col-d"><?php echo $row['GiangVienID'] ?></td>
    <td class="col-d"><?php echo $row['TenGiangVien'] ?></td>
    <td class="col-d"><?php echo $row['Email'] ?></td>
    <td class="col-d"><?php echo $row['SoDienThoai'] ?></td>
    <td class="col-d">
        <!-- Button open modal update -->
        <input class="epPresentKhoaID" type="hidden" value="<?php echo $row['GiangVienID'] ?>">
        <input class="epPresentID" type="hidden" value="<?php echo $row['KhoaID'] ?>">
        <input class="epPresentName" type="hidden" value="<?php echo $row['TenGiangVien'] ?>">
        <button class="EPOpenFormUpdate updateBtn" type="button">
            <i class="fa-solid fa-pen"></i>
        </button>
    </td>
    <td class="col-d">
        <!-- Delete -->
        <form action="?page=teacher" method="post">
            <input name="teacherID" type="hidden" value="<?php echo $row['GiangVienID'] ?>">
            <button name="teacherbtn" type="submit" class="deleteBtn">
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