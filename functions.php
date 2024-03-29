<?php
// ------------------ Login & SignUp -------------------

// check db xem có dữ liệu chưa
function checkLogin($conn, $username)
{
    $query = "SELECT * FROM account WHERE username = '$username'";
    return $conn->query($query);
}

// Thêm dữ liệu vào db
function sighUp($conn, $username, $pass)
{
    $query = "INSERT INTO account (username, password) VALUES ('$username', '$pass')";
    return $conn->query($query);
}

// ------------------ CTDT --------------------

// Hàm render ctdt
function ctdt($conn)
{
    $query = "SELECT * FROM ctdt";
    return $conn->query($query);
}

// Hàm get mã ctdt
function maCtdt($conn, $maCtdt)
{
    $query = "SELECT * FROM ctdt WHERE ma_ctdt = '$maCtdt'";
    return $conn->query($query);
}

// Hàm kiểm tra mã CTDT or tên CTDT trùng
function checkAddCtdt($conn, $maCtdt, $tenCtdt)
{
    $check_ctdt_add = "SELECT COUNT(*) as count FROM ctdt WHERE ma_ctdt = '$maCtdt' OR ten_ctdt = '$tenCtdt'";
    return $conn->query($check_ctdt_add);
}

// Hàm tra xem mã CTDT mới hoặc tên CTDT mới đã tồn tại trong cơ sở dữ liệu
function checkUpdateCtdt($conn, $maCtdtCu, $maCtdtNew, $tenCtdtNew)
{
    $check_update_update = "SELECT COUNT(*) as count FROM ctdt WHERE (ma_ctdt = '$maCtdtNew' OR ten_ctdt = '$tenCtdtNew') AND ma_ctdt != '$maCtdtCu'";
    return $conn->query($check_update_update);
}

// Hàm add ctdt
function addCtdt($conn, $maCtdt, $tenCtdt)
{
    $sql = "INSERT INTO ctdt (ma_ctdt, ten_ctdt) VALUES ('$maCtdt', '$tenCtdt')";
    return $conn->query($sql);
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

// Hàm update mã ctdt in table mon_hoc
function updateMaCTmonhoc($conn, $maCtdtCu, $maCtdtNew)
{
    $query_mon_hoc = "UPDATE mon_hoc SET ma_ctdt = '$maCtdtNew' WHERE ma_ctdt = '$maCtdtCu'";
    return $conn->query($query_mon_hoc);
}

// Hàm delete ctdt
function deleteCtdt($conn, $maCtdt)
{
    $sql_delete_chitiet = "DELETE FROM chitiet WHERE ma_ctdt = $maCtdt";
    $conn->query($sql_delete_chitiet);

    $sql_delete = "DELETE FROM ctdt WHERE ma_ctdt = $maCtdt";
    return $conn->query($sql_delete);
}

// Hàm delete all ctdt
function deleteAllctdt($conn)
{
    $sql_delete_all_chitiet = "DELETE FROM chitiet";
    $conn->query($sql_delete_all_chitiet);

    $sql_delete_all_ctdt = "DELETE FROM ctdt";
    return $conn->query($sql_delete_all_ctdt);
}
// ------------------ End CTDT --------------------

// ------------------ Mon_hoc --------------------

// Hàm render học phần theo mã ctdt 
function hocphan($conn, $maCtdt)
{
    $query_hoc_phan = "SELECT mon_hoc.* FROM chitiet, mon_hoc WHERE chitiet.ma_mon_hoc = mon_hoc.ma_mon_hoc AND chitiet.ma_ctdt = $maCtdt";
    return $conn->query($query_hoc_phan);
}

function getHocphan($conn)
{
    $sql = "SELECT * FROM mon_hoc";
    return $conn->query($sql);
}

// Hàm kiểm tra add mã học phần or tên học phần trùng trong ctdt đó chưa
function checkAddHocphan($conn, $maCtdt, $maMonhoc)
{
    $check_hoc_phan_query = "SELECT COUNT(*) as count FROM ctdt, mon_hoc, chitiet WHERE chitiet.ma_ctdt = ctdt.ma_ctdt AND chitiet.ma_mon_hoc = mon_hoc.ma_mon_hoc AND chitiet.ma_mon_hoc = '$maMonhoc' AND chitiet.ma_ctdt = '$maCtdt'";
    return $conn->query($check_hoc_phan_query);
}

function checkImport($conn, $maMonhoc, $tenMonhoc)
{
    $check_hoc_phan_query = "SELECT COUNT(*) as count FROM mon_hoc WHERE ma_mon_hoc = '$maMonhoc' OR ten_mon_hoc = '$tenMonhoc'";
    return $conn->query($check_hoc_phan_query);
}

// Hàm check update học phần có trùng mã học phần or tên học phần không
function checkUpdateHocphan($conn, $tenMonhocNew, $maMonhocCu)
{
    $check_update_hocphan_query = "SELECT COUNT(*) as count FROM mon_hoc, chitiet WHERE chitiet.ma_mon_hoc = mon_hoc.ma_mon_hoc AND mon_hoc.ten_mon_hoc = '$tenMonhocNew' AND mon_hoc.ma_mon_hoc != '$maMonhocCu' AND chitiet.ma_mon_hoc != '$maMonhocCu'";
    return $conn->query($check_update_hocphan_query);
}

// Hàm add học phần
function addHocphan($conn, $maCtdt, $maMonhoc)
{
    $add_chitiet_query = "INSERT INTO chitiet (ma_ctdt, ma_mon_hoc) VALUES ('$maCtdt', '$maMonhoc')";
    return $conn->query($add_chitiet_query);
}

function importHocphan($conn, $maMonhoc, $tenMonhoc, $hocKi, $soTinchi, $sTlt, $sTth)
{
    $add_hoc_phan_query = "INSERT INTO mon_hoc (ma_mon_hoc, ten_mon_hoc, hoc_ki, so_tin_chi, so_tiet_ly_thuyet, so_tiet_thuc_hanh) VALUES ('$maMonhoc', '$tenMonhoc','$hocKi', '$soTinchi', '$sTlt', '$sTth')";
    $conn->query($add_hoc_phan_query);
}

// Hàm search học phần
function searchHocphan($conn, $search, $maCtdt)
{
    $search_hoc_phan = "SELECT mh.* FROM chitiet ct, mon_hoc mh WHERE ct.ma_mon_hoc = mh.ma_mon_hoc AND mh.ten_mon_hoc LIKE '%$search%' AND ct.ma_ctdt = '$maCtdt'";
    return $conn->query($search_hoc_phan);
}

// Hàm update học phần
function updateHocphanAll($conn, $maMonhocNew, $tenMonhocNew, $hocKiNew, $soTinchiNew, $sTltNew, $sTthNew, $maMonhocCu)
{
    $query_chitiet = "UPDATE chitiet SET ma_mon_hoc = '$maMonhocNew' WHERE ma_mon_hoc = '$maMonhocCu'";
    $conn->query($query_chitiet);

    $update_mon_hoc = "UPDATE mon_hoc
    SET ma_mon_hoc = '$maMonhocNew', 
    ten_mon_hoc = '$tenMonhocNew', 
    hoc_ki = '$hocKiNew', 
    so_tin_chi = '$soTinchiNew', 
    so_tiet_ly_thuyet = '$sTltNew', 
    so_tiet_thuc_hanh = '$sTthNew' 
    WHERE ma_mon_hoc = '$maMonhocCu'";

    return $conn->query($update_mon_hoc);
}
function updateHocphanElement($conn, $maMonhoc, $tenMonhoc, $hocKi, $soTinchi, $sTlt, $sTth, $maMonhocCu, $maCtdt)
{
    $sql = "DELETE FROM chitiet WHERE ma_ctdt = '$maCtdt' AND ma_mon_hoc = '$maMonhocCu'";
    $conn->query($sql);

    $sql = "DELETE FROM mon_hoc WHERE ma_mon_hoc = '$maMonhocCu'";
    $conn->query($sql);

    $add_hoc_phan_query = "INSERT INTO mon_hoc (ma_mon_hoc, ten_mon_hoc, hoc_ki, so_tin_chi, so_tiet_ly_thuyet, so_tiet_thuc_hanh) VALUES ('$maMonhoc', '$tenMonhoc','$hocKi', '$soTinchi', '$sTlt', '$sTth')";
    $conn->query($add_hoc_phan_query);

    $add_chitiet_query = "INSERT INTO chitiet (ma_ctdt, ma_mon_hoc) VALUES ('$maCtdt', '$maMonhoc')";
    return $conn->query($add_chitiet_query);
}

// Hàm lấy dữ liệu table chitiet theo mã ctdt
function maCTmonhoc($conn, $maCtdt)
{
    $query = "SELECT * FROM chitiet WHERE ma_ctdt = '$maCtdt'";
    return $conn->query($query);
}

// Hàm lấy dữ liệu ma_mon_hoc trong table mon_hoc
function maMonhoc($conn, $maCtdt)
{
    $query = "SELECT ma_mon_hoc FROM chitiet WHERE ma_ctdt = '$maCtdt'";
    return $conn->query($query);
}

// Hàm delete học phần
function deleteHocphan($conn, $maMonhoc, $maCtdt)
{
    $sql = "DELETE FROM chitiet WHERE ma_ctdt = '$maCtdt' AND ma_mon_hoc = '$maMonhoc'";
    return $conn->query($sql);
}

function countHocphan($conn, $maMonhoc)
{
    $sql = "SELECT COUNT(ma_mon_hoc) as count FROM chitiet WHERE ma_mon_hoc = '$maMonhoc'";
    return $conn->query($sql);
}

function countMahocphan($conn, $maMonhoc)
{
    $sql = "SELECT COUNT(ma_mon_hoc) as count FROM mon_hoc WHERE ma_mon_hoc = '$maMonhoc'";
    return $conn->query($sql);
}

// Hàm delete all học phần
function deleteAllhocphan($conn, $maMonhoc, $maCtdt)
{
    // Xóa tất cả các môn học trong chitiet với maCtdt cụ thể
    $sql_delete_all_monhoc = "DELETE FROM chitiet WHERE ma_ctdt = '$maCtdt'";
    $conn->query($sql_delete_all_monhoc);

    // Xóa các môn học có mã nằm trong mảng $maMonhoc
    $maMonhocList = implode("','", $maMonhoc);
    $sql = "DELETE FROM mon_hoc WHERE ma_mon_hoc IN ('$maMonhocList')";
    return $conn->query($sql);
}
function deleteAllhp($conn)
{
    // Xóa tất cả các môn học trong chitiet
    $sql_delete_all_chitiet = "DELETE FROM chitiet";
    $conn->query($sql_delete_all_chitiet);

    // Xóa tất cả các môn học trong mon_hoc
    $sql_delete_all_monhoc = "DELETE FROM mon_hoc";
    return $conn->query($sql_delete_all_monhoc);
}

// ------------------ End Mon_hoc --------------------

// ------------------ Khoa ---------------------------
// Hàm render ctdt
function khoa($conn)
{
    $query = "SELECT * FROM khoa";
    return $conn->query($query);
}

// Hàm kiểm tra mã Khoa or tên Khoa trùng
function checkAddKhoa($conn, $maKhoa, $tenKhoa)
{
    $check_khoa_add = "SELECT COUNT(*) as count FROM khoa WHERE ma_khoa = '$maKhoa' OR ten_khoa = '$tenKhoa'";
    return $conn->query($check_khoa_add);
}

// Hàm add khoa
function addKhoa($conn, $makhoa, $tenkhoa)
{
    $sql = "INSERT INTO khoa (ma_khoa, ten_khoa) VALUES ('$makhoa', '$tenkhoa')";
    return $conn->query($sql);
}

// -------------------- Account --------------------

// Thông tin account 
function account($conn, $username)
{
    $query = "SELECT * FROM account WHERE username = '{$username}'";
    return $conn->query($query);
}
