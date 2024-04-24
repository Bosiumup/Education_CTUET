<?php
// ------------------ Students --------------------
// Hàm render students
function Students($conn)
{
    $query = "SELECT * FROM student";
    return $conn->query($query);
}

// Hàm kiểm tra mã CTDT or tên CTDT trùng
function CheckAddStudent($conn, $maCtdt, $tenCtdt)
{
    $check_ctdt_add = "SELECT COUNT(*) as count FROM ctdt WHERE ma_ctdt = '$maCtdt' OR ten_ctdt = '$tenCtdt'";
    return $conn->query($check_ctdt_add);
}

// Hàm add ctdt
function AddStudent($conn, $tenCtdt, $age, $student_code, $class)
{
    $sql = "INSERT INTO ctdt (ma_ctdt, ten_ctdt) VALUES ('$maCtdt', '$tenCtdt')";
    return $conn->query($sql);
}

// Hàm tra xem mã CTDT mới hoặc tên CTDT mới đã tồn tại trong cơ sở dữ liệu
function checkUpdateCtdt($conn, $maCtdtCu, $maCtdtNew, $tenCtdtNew)
{
    $check_update_update = "SELECT COUNT(*) as count FROM ctdt WHERE (ma_ctdt = '$maCtdtNew' OR ten_ctdt = '$tenCtdtNew') AND ma_ctdt != '$maCtdtCu'";
    return $conn->query($check_update_update);
}

// Hàm search ctdt
function searchCtdt($conn, $search)
{
    $sql = "SELECT * FROM ctdt WHERE ten_ctdt LIKE '%$search%'";
    return $conn->query($sql);
}

// Hàm update ctdt
function updateCtdt($conn, $maCtdtCu, $maCtdtNew, $tenCtdtNew)
{
    $query_chitiet = "UPDATE chitiet SET ma_ctdt = '$maCtdtNew' WHERE ma_ctdt = '$maCtdtCu'";
    $conn->query($query_chitiet);

    $query_ctdt = "UPDATE ctdt
    SET ma_ctdt = '$maCtdtNew',
    ten_ctdt = '$tenCtdtNew' 
    WHERE ma_ctdt = '$maCtdtCu'";
    return $conn->query($query_ctdt);
}

// Hàm delete ctdt
function deleteCtdt($conn, $maCtdt)
{
    $sql_delete_chitiet = "DELETE FROM chitiet WHERE ma_ctdt = $maCtdt";
    $conn->query($sql_delete_chitiet);

    $sql_delete = "DELETE FROM ctdt WHERE ma_ctdt = $maCtdt";
    return $conn->query($sql_delete);
}
// ------------------ End CTDT --------------------