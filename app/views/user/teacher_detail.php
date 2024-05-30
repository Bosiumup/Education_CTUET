<table id="table-majors">
    <!-- Heading table -->
    <thead id="table-head">
        <tr class="row-h">
            <th class="col-h">Mã Khoa</th>
            <th class="col-h">Mã giảng viên</th>
            <th class="col-h">Tên giảng viên</th>
            <th class="col-h">Email</th>
            <th class="col-h">Số điện thoại</th>
        </tr>
    </thead>
    <?php
    $idGiangVien = $_SESSION['Username'];
    $result = IN4_Teacher($conn, $idGiangVien);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr class="row-d">
                <td class="col-d"><?php echo $row['KhoaID'] ?></td>
                <td class="col-d"><?php echo $row['GiangVienID'] ?></td>
                <td class="col-d"><?php echo $row['TenGiangVien'] ?></td>
                <td class="col-d"><?php echo $row['Email'] ?></td>
                <td class="col-d"><?php echo $row['SoDienThoai'] ?></td>
            </tr>
            <?php
        }
    }

    ?>
</table>