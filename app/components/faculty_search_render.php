<?php
    // NẾU CÓ TRA CỨU KHOA THÌ SẼ HIỂN THỊ RA KẾT QUẢ TRA CỨU 
    if(isset($_GET['facultyNameSearch'])) {
        $search = $_GET['facultyNameSearch'];
        $result = Faculty_Search($conn, $search);
        if ($result->num_rows > 0) {  
            while ($row = $result->fetch_assoc()) {
            ?>
<tr class="row-d">
    <td class="col-d">
        <a href="?page=ep&KhoaID=<?php echo $row['KhoaID'] ?>">
            <?php echo $row['KhoaID'] ?>
        </a>
    </td>
    <td class="col-d">
        <a href="?page=ep&KhoaID=<?php echo $row['KhoaID'] ?>">
            <?php echo $row['TenKhoa'] ?>
        </a>
    </td>
    <td class="col-d">
        <!-- Button open modal update -->
        <input class="facultyPresentID" type="hidden" value="<?php echo $row['KhoaID'] ?>">
        <input class="facultyPresentName" type="hidden" value="<?php echo $row['TenKhoa'] ?>">
        <button class="facultyOpenFormUpdate updateBtn" type="button">
            <i class="fa-solid fa-pen"></i>
        </button>
    </td>
    <td class="col-d">
        <!-- Delete -->
        <form action="?page=faculty" method="post">
            <input name="facultyID" type="hidden" value="<?php echo $row['KhoaID'] ?>">
            <button name="facultyDelete" type="submit" class="deleteBtn">
                <i class="fa-solid fa-trash"></i>
            </button>
        </form>
    </td>
</tr>
<?php
            }
        }
    }
    // NẾU KHÔNG CÓ TRA CỨU THÌ SẼ HIỂN THỊ RA TOÀN BỘ KHOA
    else {
        $result = Faculty($conn);
        if ($result->num_rows > 0) {  
            while ($row = $result->fetch_assoc()) {
            ?>
<tr class="row-d">
    <td class="col-d">
        <a href="?page=ep&KhoaID=<?php echo $row['KhoaID'] ?>">
            <?php echo $row['KhoaID'] ?>
        </a>
    </td>
    <td class="col-d">
        <a href="?page=ep&KhoaID=<?php echo $row['KhoaID'] ?>">
            <?php echo $row['TenKhoa'] ?>
        </a>
    </td>
    <td class="col-d">
        <!-- Button open modal update -->
        <input class="facultyPresentID" type="hidden" value="<?php echo $row['KhoaID'] ?>">
        <input class="facultyPresentName" type="hidden" value="<?php echo $row['TenKhoa'] ?>">
        <button class="facultyOpenFormUpdate updateBtn" type="button">
            <i class="fa-solid fa-pen"></i>
        </button>
    </td>
    <td class="col-d">
        <!-- Delete -->
        <form action="?page=faculty" method="post">
            <input name="facultyID" type="hidden" value="<?php echo $row['KhoaID'] ?>">
            <button name="facultyDelete" type="submit" class="deleteBtn">
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