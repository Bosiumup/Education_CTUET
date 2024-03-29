<?php
$ctdt_searched = false; // Bắt đầu với giả sử không tìm kiếm
// Kiểm tra: nếu yêu cầu post có tồn tại name = ctdt_search hay không nếu có thì thực thi bên trong if
if (isset($_POST['ctdt_search'])) {
    $ctdt_search = $_POST['ctdt_search'];
    if (empty($ctdt_search)) {
        echo "<script>
         Swal.fire({
            title: 'Thất bại!',
            text: 'Vui lòng nhập CTĐT trước khi tra cứu',
            icon: 'error'
          });
        </script>";
    } else {
        // Hàm searchCtdt
        $result = searchCtdt($conn, $ctdt_search);
        if ($result->num_rows != 0) {
            $ctdt_searched = true; // Đã tìm kiếm
            while ($row = $result->fetch_assoc()) {
                echo "<tr class='row-d row-item' data-ma_ctdt='{$row['ma_ctdt']}' data-ten_ctdt='{$row['ten_ctdt']}'>";

                echo "<td class='col-d'>" . "<a class='branch-item' href='index.php?page=hocphan.php&ma_ctdt={$row['ma_ctdt']}'>{$row['ma_ctdt']}</a>" . "</td>";
                echo "<td class='col-d'>" . "<a class='branch-item' href='index.php?page=hocphan.php&ma_ctdt={$row['ma_ctdt']}'>{$row['ten_ctdt']}</a>" . "</td>";

                echo "<td class='col-d'>
                <input type='hidden' name='ma_ctdt' value='{$row['ma_ctdt']}'>
                <input type='hidden' name='ten_ctdt' value='{$row['ten_ctdt']}'>
                <button type='button' class='updateBtn'>
                <i class='fa-solid fa-pen'></i>
                </button>
            </td>";

                echo "<td class='col-d'>
            <button type='button' class='deleteBtn' data-ctdt-id='$row[ma_ctdt]'>
            <i class='fa-solid fa-trash'></i>
            </button>
    </td>";

                echo "</tr>";
            }
        } else {
            echo "<script>alert('Không tìm thấy chương trình đào tạo!');</script>";
        }
    }
}

// Nếu không có tìm kiếm thì sẽ render ra all ctdt. Do trong lệnh đk if của php nếu giá trị của if là false thì sẽ không thực thi bên trong nó nên là phải dùng phủ định $ctdt_searched thành !$ctdt_searched (tại ban đầu biến $ctdt_searched = false)
if (!$ctdt_searched) {
    //  Render chương trình đào tạo ----------------
    $result = khoa($conn);

    // trong csdl có ít nhất 1 dòng dữ liệu thì true -> code bên trong if sẽ thực thi
    if ($result->num_rows > 0) {
        // phương thức fetch_assoc() -> trả về một mảng key: value;. Dùng while để duyệt qa các value trong csdl
        while ($row = $result->fetch_assoc()) {
            echo "<tr class='row-d row-item' data-ma_khoa='{$row['ma_khoa']}' data-ten_khoa='{$row['ten_khoa']}'>";

            echo "<td class='col-d'>" . "<a class='branch-item' href='index.php?page=hocphan.php&ma_khoa={$row['ma_khoa']}'>{$row['ma_khoa']}</a>" . "</td>";
            echo "<td class='col-d'>" . "<a class='branch-item' href='index.php?page=hocphan.php&ma_khoa={$row['ma_khoa']}'>{$row['ten_khoa']}</a>" . "</td>";

            echo "<td class='col-d'>
                <input type='hidden' name='ma_khoa' value='{$row['ma_khoa']}'>
                <input type='hidden' name='ten_khoa' value='{$row['ten_khoa']}'>
                <button type='button' class='updateBtn'>
                <i class='fa-solid fa-pen'></i>
                </button>
            </td>";

            echo "<td class='col-d'>
                    <button type='button' class='deleteBtn' data-khoa-id='$row[ma_khoa]'>
                    <i class='fa-solid fa-trash'></i>
                    </button>
            </td>";

            echo "</tr>";
        }
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.all.min.js"></script>