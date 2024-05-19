<?php
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
    } else {
        if(isset($_GET['epNameSearch'])) {
            $search = $_GET['epNameSearch'];
            $result = EP_Search($conn, $search);
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
        else {
            $result = EP($conn);
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
    }
?>