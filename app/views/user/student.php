<div class="grid wide majors-full">
    <table id="table-majors">
        <thead id="table-head">
        <tr class="row-h">
            <th class="col-h">Tên môn học</th>
            <th class="col-h">Học kỳ</th>
            <th class="col-h">Số tín chỉ</th>
            <th class="col-h">Số tiết lý thuyết</th>
            <th class="col-h">Số tiết thực hành</th>
        </tr>
        </thead>

        <?php
        while ($row = $result->fetch_assoc()) {
            ?>
            <tbody id="table-body">
            <tr class="row-d">
                <td class="col-d"><?php echo $row["TenMonHoc"] ?></td>
                <td class="col-d"><?php echo $row["HocKy"] ?></td>
                <td class="col-d"><?php echo $row["SoTinChi"] ?></td>
                <td class="col-d"><?php echo $row["SoTietLyThuyet"] ?></td>
                <td class="col-d"><?php echo $row["SoTietThucHanh"] ?></td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
</div>