<?php
    if (isset($_GET['EpID'])) {
        $EpID = $_GET['EpID'];
        $result = Student_EpID($conn, $EpID); 
        if ($result->num_rows > 0) {  
            while ($row = $result->fetch_assoc()) {
                ?>
<tr class="row-d">
    <td class="col-d">
        <?php echo $row['CTDaoTaoID'] ?>
    </td>
    <td class="col-d">
        <?php echo $row['SinhVienID'] ?>
    </td>
    <td class="col-d">
        <?php echo $row['TenSinhVien'] ?>
    </td>
    <td class="col-d">
        <?php echo $row['Email'] ?>
    </td>
    <td class="col-d">
        <?php echo $row['SoDienThoai'] ?>
    </td>
    <td class="col-d">
        <!-- Button open modal update -->
        <input class="sdPresentEPID" type="hidden" value="<?php echo $row['CTDaoTaoID'] ?>">
        <input class="sdPresentID" type="hidden" value="<?php echo $row['SinhVienID'] ?>">
        <input class="sdPresentName" type="hidden" value="<?php echo $row['TenSinhVien'] ?>">
        <input class="sdPresentEmail" type="hidden" value="<?php echo $row['Email'] ?>">
        <input class="sdPresentPhone" type="hidden" value="<?php echo $row['SoDienThoai'] ?>">
        <button class="SDOpenFormUpdate updateBtn" type="button">
            <i class="fa-solid fa-pen"></i>
        </button>
    </td>
    <td class="col-d">
        <!-- Delete -->
        <form action="?page=student" method="post">
            <input name="SinhVienID" type="hidden" value="<?php echo $row['SinhVienID'] ?>">
            <button name="studentDelete" type="submit" class="deleteBtn">
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
    // NẾU CÓ TRA CỨU SINH VIÊN THÌ SẼ HIỂN THỊ RA KẾT QUẢ TRA CỨU 
    if(isset($_GET['StudentNameSearch'])) {
        $search = $_GET['StudentNameSearch'];
        $result = Student_Search($conn, $search);
        if ($result->num_rows > 0) {  
            while ($row = $result->fetch_assoc()) {
            ?>
<tr class="row-d">
    <td class="col-d">
        <?php echo $row['CTDaoTaoID'] ?>
    </td>
    <td class="col-d">
        <?php echo $row['SinhVienID'] ?>
    </td>
    <td class="col-d">
        <?php echo $row['TenSinhVien'] ?>
    </td>
    <td class="col-d">
        <?php echo $row['Email'] ?>
    </td>
    <td class="col-d">
        <?php echo $row['SoDienThoai'] ?>
    </td>
    <td class="col-d">
        <!-- Button open modal update -->
        <input class="sdPresentEPID" type="hidden" value="<?php echo $row['CTDaoTaoID'] ?>">
        <input class="sdPresentID" type="hidden" value="<?php echo $row['SinhVienID'] ?>">
        <input class="sdPresentName" type="hidden" value="<?php echo $row['TenSinhVien'] ?>">
        <input class="sdPresentEmail" type="hidden" value="<?php echo $row['Email'] ?>">
        <input class="sdPresentPhone" type="hidden" value="<?php echo $row['SoDienThoai'] ?>">
        <button class="SDOpenFormUpdate updateBtn" type="button">
            <i class="fa-solid fa-pen"></i>
        </button>
    </td>
    <td class="col-d">
        <!-- Delete -->
        <form action="?page=student" method="post">
            <input name="SinhVienID" type="hidden" value="<?php echo $row['SinhVienID'] ?>">
            <button name="studentDelete" type="submit" class="deleteBtn">
                <i class="fa-solid fa-trash"></i>
            </button>
        </form>
    </td>
</tr>
<?php
            }
        }
    }
    // NẾU KHÔNG CÓ TRA CỨU THÌ SẼ HIỂN THỊ RA TOÀN BỘ Sinh Viên
    else {
        $result = Student($conn);
        if ($result->num_rows > 0) {  
            while ($row = $result->fetch_assoc()) {
            ?>
<tr class="row-d">
    <td class="col-d">
        <?php echo $row['CTDaoTaoID'] ?>
    </td>
    <td class="col-d">
        <?php echo $row['SinhVienID'] ?>
    </td>
    <td class="col-d">
        <?php echo $row['TenSinhVien'] ?>
    </td>
    <td class="col-d">
        <?php echo $row['Email'] ?>
    </td>
    <td class="col-d">
        <?php echo $row['SoDienThoai'] ?>
    </td>
    <td class="col-d">
        <!-- Button open modal update -->
        <input class="sdPresentEPID" type="hidden" value="<?php echo $row['CTDaoTaoID'] ?>">
        <input class="sdPresentID" type="hidden" value="<?php echo $row['SinhVienID'] ?>">
        <input class="sdPresentName" type="hidden" value="<?php echo $row['TenSinhVien'] ?>">
        <input class="sdPresentEmail" type="hidden" value="<?php echo $row['Email'] ?>">
        <input class="sdPresentPhone" type="hidden" value="<?php echo $row['SoDienThoai'] ?>">
        <button class="SDOpenFormUpdate updateBtn" type="button">
            <i class="fa-solid fa-pen"></i>
        </button>
    </td>
    <td class="col-d">
        <!-- Delete -->
        <form action="?page=student" method="post">
            <input name="SinhVienID" type="hidden" value="<?php echo $row['SinhVienID'] ?>">
            <button name="studentDelete" type="submit" class="deleteBtn">
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