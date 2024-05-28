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
        <input class="tcPresentKhoaID" type="hidden" value="<?php echo $row['KhoaID'] ?>">
        <input class="tcPresentID" type="hidden" value="<?php echo $row['GiangVienID'] ?>">
        <input class="tcPresentName" type="hidden" value="<?php echo $row['TenGiangVien'] ?>">
        <input class="tcPresentEmail" type="hidden" value="<?php echo $row['Email'] ?>">
        <input class="tcPresentPhone" type="hidden" value="<?php echo $row['SoDienThoai'] ?>">
        <button class="TCOpenFormUpdate updateBtn" type="button">
            <i class="fa-solid fa-pen"></i>
        </button>
    </td>
    <td class="col-d">
        <!-- Delete -->
        <form action="?page=teacher" method="post">
            <input name="TeacherID" type="hidden" value="<?php echo $row['GiangVienID'] ?>">
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
        <input class="tcPresentKhoaID" type="hidden" value="<?php echo $row['KhoaID'] ?>">
        <input class="tcPresentID" type="hidden" value="<?php echo $row['GiangVienID'] ?>">
        <input class="tcPresentName" type="hidden" value="<?php echo $row['TenGiangVien'] ?>">
        <input class="tcPresentEmail" type="hidden" value="<?php echo $row['Email'] ?>">
        <input class="tcPresentPhone" type="hidden" value="<?php echo $row['SoDienThoai'] ?>">
        <button class="TCOpenFormUpdate updateBtn" type="button">
            <i class="fa-solid fa-pen"></i>
        </button>
    </td>
    <td class="col-d">
        <!-- Delete -->
        <form action="?page=teacher" method="post">
            <input name="TeacherID" type="hidden" value="<?php echo $row['GiangVienID'] ?>">
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
        <input class="tcPresentKhoaID" type="hidden" value="<?php echo $row['KhoaID'] ?>">
        <input class="tcPresentID" type="hidden" value="<?php echo $row['GiangVienID'] ?>">
        <input class="tcPresentName" type="hidden" value="<?php echo $row['TenGiangVien'] ?>">
        <input class="tcPresentEmail" type="hidden" value="<?php echo $row['Email'] ?>">
        <input class="tcPresentPhone" type="hidden" value="<?php echo $row['SoDienThoai'] ?>">
        <button class="TCOpenFormUpdate updateBtn" type="button">
            <i class="fa-solid fa-pen"></i>
        </button>
    </td>
    <td class="col-d">
        <!-- Delete -->
        <form action="?page=teacher" method="post">
            <input name="TeacherID" type="hidden" value="<?php echo $row['GiangVienID'] ?>">
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
    }
?>