<?php
    // NẾU CÓ TRA CỨU SINH VIÊN THÌ SẼ HIỂN THỊ RA KẾT QUẢ TRA CỨU 
    if(isset($_GET['StudentNameSearch'])) {
        $search = $_GET['StudentNameSearch'];
        $result = Student_Search($conn, $search);
        if ($result->num_rows > 0) {  
            while ($row = $result->fetch_assoc()) {
            ?>
<tr class="row-d">
    <td class="col-d">
        <?php echo $row['SinhVienID'] ?>
    </td>
    <td class="col-d">
            <?php echo $row['CTDaoTaoID'] ?>
        </a>
    </td>
    <td class="col-d">
            <?php echo $row['TenSinhVien'] ?>
        </a>
    </td>
    <td class="col-d">
            <?php echo $row['Email'] ?>
        </a>
    </td>
    <td class="col-d">
            <?php echo $row['SoDienThoai'] ?>
        </a>
    </td>
    <td class="col-d">
        <!-- Button open modal update -->
        <input class="StudentPresentID" type="hidden" value="<?php echo $row['SinhVienID'] ?>">
        <input class="CTDaoTaoPresentID" type="hidden" value="<?php echo $row['CTDaoTaoID'] ?>">
        <input class="StudentNamePresent" type="hidden" value="<?php echo $row['TenSinhVien'] ?>">
        <input class="EmailPresent" type="hidden" value="<?php echo $row['Email'] ?>">
        <input class="SoDienThoaiPresent" type="hidden" value="<?php echo $row['SoDienThoai'] ?>">
        <button class="studentOpenFormUpdate updateBtn" type="button">
            <i class="fa-solid fa-pen"></i>
        </button>
    </td>
    <td class="col-d">
        <!-- Delete -->
        <form action="?page=student" method="post">
            <input name="studentID" type="hidden" value="<?php echo $row['SinhVienID'] ?>">
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
        <?php echo $row['SinhVienID'] ?>
    </td>
    <td class="col-d">
            <?php echo $row['CTDaoTaoID'] ?>
        </a>
    </td>
    <td class="col-d">
            <?php echo $row['TenSinhVien'] ?>
        </a>
    </td>
    <td class="col-d">
            <?php echo $row['Email'] ?>
        </a>
    </td>
    <td class="col-d">
            <?php echo $row['SoDienThoai'] ?>
        </a>
    </td>
    <td class="col-d">
        <!-- Button open modal update -->
        <input class="StudentPresentID" type="hidden" value="<?php echo $row['SinhVienID'] ?>">
        <input class="StudentPresentName" type="hidden" value="<?php echo $row['TenSinhVien'] ?>">
        <button class="StudentOpenFormUpdate updateBtn" type="button">
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
?>