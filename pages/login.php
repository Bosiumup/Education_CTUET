minh thien
<!-- label -->
style="font-size: 19px;
padding-bottom: 5px;
margin-right: 11px;
border-bottom: 1px solid;"
<!-- select -->
style="font-size: 17px;
font-weight: 600;
padding: 10px 15px;
border-radius: 15px;"

<?php
// Kiểm tra nếu có yêu cầu $_GET thì sẽ thực hiện bên trong if
if (isset($_GET['ma_ctdt'])) {
    // Lấy mã CTDĐ từ tham số truyền qua URL
    $ma_ctdt = $_GET['ma_ctdt'];

    // Truy vấn dữ liệu chi tiết CTDĐ dựa trên mã CTDĐ
    $query = "SELECT * FROM chitiet WHERE ma_ctdt = '$ma_ctdt'";
    $result = $conn->query($query);

    // Trong csdl có ít nhất 1 dòng dữ liệu thì true -> code bên trong if sẽ thực thi
    if ($result->num_rows > 0) {
        // Phương thức fetch_assoc() -> trả về một mảng key: value
        $row = $result->fetch_assoc();
    }
}
?>