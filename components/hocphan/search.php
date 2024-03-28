<?php
$hocphan_searched = false; // Bắt đầu với giả sử không tìm kiếm

// Kiểm tra: nếu yêu cầu post có tồn tại name = hoc_phan_search hay không nếu có thì thực thi bên trong if
if (isset($_POST['hoc_phan_search'])) {
    $hoc_phan_search = $_POST['hoc_phan_search'];
    if (empty($hoc_phan_search)) {
        echo "<script>";
        echo "alert('Vui lòng nhập học phần trước khi tìm kiếm!');";
        echo "</script>";
    } else {
        // Hàm search học phần
        $result = searchHocphan($conn, $hoc_phan_search, $ma_ctdt);
        if ($result->num_rows != 0) {
            $hocphan_searched = true; // Đã tìm kiếm
            while ($row = $result->fetch_assoc()) {
                echo "<tr class='row-d row-item' data-ma_mon_hoc='{$row['ma_mon_hoc']}' data-ten_mon_hoc='{$row['ten_mon_hoc']}' data-hoc_ki='{$row['hoc_ki']}' data-so_tin_chi='{$row['so_tin_chi']}' data-stlt='{$row['so_tiet_ly_thuyet']}' data-stth='{$row['so_tiet_thuc_hanh']}'>";

                echo "<td class='col-d'>" . $row['ma_mon_hoc'] . "</td>";
                echo "<td class='col-d'>" . $row['ten_mon_hoc'] . "</td>";
                echo "<td class='col-d'>" . $row['hoc_ki'] . "</td>";
                echo "<td class='col-d'>" . $row['so_tin_chi'] . "</td>";
                echo "<td class='col-d'>" . $row['so_tiet_ly_thuyet'] . "</td>";
                echo "<td class='col-d'>" . $row['so_tiet_thuc_hanh'] . "</td>";

                echo "<td class='col-d'>
                        <input type='hidden' name='ma_mon_hoc' value='{$row['ma_mon_hoc']}'>
                        <input type='hidden' name='ten_mon_hoc' value='{$row['ten_mon_hoc']}'>
                        <input type='hidden' name='hoc_ki' value='{$row['hoc_ki']}'>
                        <input type='hidden' name='so_tin_chi' value='{$row['so_tin_chi']}'>
                        <input type='hidden' name='so_tiet_ly_thuyet' value='{$row['so_tiet_ly_thuyet']}'>
                        <input type='hidden' name='so_tiet_thuc_hanh' value='{$row['so_tiet_thuc_hanh']}'>
                        <button type='button' class='updateBtn'>
                            <i class='fa-solid fa-pen'></i>
                        </button>
                </td>";

                echo "<td class='col-d'>
                <button type='button' class='deleteBtn' data-hoc_phan-id='{$row['ma_mon_hoc']}'>
                    <i class='fa-solid fa-trash'></i>
                </button>
            </td>";

                echo "</tr>";
            }
        } else {
            echo "<script>alert('Không tìm thấy học phần tìm kiếm!');</script>";
        }
    }
}

// Nếu không có tìm kiếm thì sẽ render ra all ctdt. Do trong lệnh đk if của php nếu giá trị của if là false thì sẽ không thực thi bên trong nó nên là phải dùng phủ định $hocphan_searched thành !$ctdt_searched (tại ban đầu biến $hocphan_searched = false)
if (!$hocphan_searched) {
    // Hàm render mon_hoc theo mã ctdt ----------------
    $result = hocphan($conn, $ma_ctdt);

    // trong csdl có ít nhất 1 dòng dữ liệu thì true -> code bên trong if sẽ thực thi
    if ($result->num_rows > 0) {
        // phương thức fetch_assoc() -> trả về một mảng key: value;. Dùng while để duyệt qa các value trong csdl
        while ($row = $result->fetch_assoc()) {
            echo "<tr class='row-d row-item' data-ma_mon_hoc='{$row['ma_mon_hoc']}' data-ten_mon_hoc='{$row['ten_mon_hoc']}' data-hoc_ki='{$row['hoc_ki']}' data-so_tin_chi='{$row['so_tin_chi']}' data-stlt='{$row['so_tiet_ly_thuyet']}' data-stth='{$row['so_tiet_thuc_hanh']}'>";

            echo "<td class='col-d'>" . $row['ma_mon_hoc'] . "</td>";
            echo "<td class='col-d'>" . $row['ten_mon_hoc'] . "</td>";
            echo "<td class='col-d'>" . $row['hoc_ki'] . "</td>";
            echo "<td class='col-d'>" . $row['so_tin_chi'] . "</td>";
            echo "<td class='col-d'>" . $row['so_tiet_ly_thuyet'] . "</td>";
            echo "<td class='col-d'>" . $row['so_tiet_thuc_hanh'] . "</td>";

            echo "<td class='col-d'>
                        <input type='hidden' name='ma_mon_hoc' value='{$row['ma_mon_hoc']}'>
                        <input type='hidden' name='ten_mon_hoc' value='{$row['ten_mon_hoc']}'>
                        <input type='hidden' name='hoc_ki' value='{$row['hoc_ki']}'>
                        <input type='hidden' name='so_tin_chi' value='{$row['so_tin_chi']}'>
                        <input type='hidden' name='so_tiet_ly_thuyet' value='{$row['so_tiet_ly_thuyet']}'>
                        <input type='hidden' name='so_tiet_thuc_hanh' value='{$row['so_tiet_thuc_hanh']}'>
                        <button type='button' class='updateBtn'>
                            <i class='fa-solid fa-pen'></i>
                        </button>
                </td>";

            echo "<td class='col-d'>
                <button type='button' class='deleteBtn' data-hoc_phan-id='{$row['ma_mon_hoc']}'>
                    <i class='fa-solid fa-trash'></i>
                </button>
            </td>";

            echo "</tr>";
        }
    }
}