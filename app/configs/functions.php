<?php
// ------------------- Account --------------------------

    // inf account
    function account($conn, $username) {
        $query = "SELECT * FROM account WHERE Username = '$username'";
        return $conn->query($query);
    }
    // check login
    function checkLogin($conn, $username)
    {
        $query = "SELECT * FROM account WHERE Username = '$username'";
        return $conn->query($query);
    }
    // Create account student
    function registerStudent($conn, $SinhVienID, $Username, $Password, $LoaiTaiKhoan)
    {
        $query = "INSERT INTO account (SinhVienID, Username, Password, LoaiTaiKhoan) VALUES ('$SinhVienID', '$Username', '$Password', '$LoaiTaiKhoan')";
        return $conn->query($query);
    }
    // Create account teacher
    function registerTeacher($conn, $GiangVienID, $Username, $Password, $LoaiTaiKhoan)
    {
        $query = "INSERT INTO account (GiangVienID, Username, Password, LoaiTaiKhoan) VALUES ('$GiangVienID', '$Username', '$Password', '$LoaiTaiKhoan')";
        return $conn->query($query);
    }
    // Kiểm tra có trùng ID và Username không
    function checkRegister($conn, $Username)
    {
        $query = "SELECT * FROM account WHERE Username = '$Username'";
        return $conn->query($query);
    }

// ------------------- Faculty (Khoa) --------------------------
// render faculty
function Faculty($conn)
{
    $sql = "SELECT * FROM khoa";
    return $conn->query($sql);
}
// render faculty follow search
function Faculty_Search($conn, $search)
{
    $sql = "SELECT * FROM khoa WHERE TenKhoa LIKE '%$search%'";
    return $conn->query($sql);
}

// ------------------- EP (Chuong trinh dao tao) --------------------------
// render EP
function EP($conn)
{
    $sql = "SELECT * FROM chuongtrinhdaotao";
    return $conn->query($sql);
}
// render EP follow search
function EP_Search($conn, $search)
{
    $sql = "SELECT * FROM chuongtrinhdaotao WHERE TenChuongTrinh LIKE '%$search%'";
    return $conn->query($sql);
}
// render EP follow KhoaID
function EP_KhoaID($conn, $idkhoa)
{
    $sql = "SELECT * FROM chuongtrinhdaotao WHERE KhoaID = '$idkhoa'";
    return $conn->query($sql);
}

// ------------------- Teacher (Giang vien) --------------------------
// viết các hàm liên quan đến giảng viên dựa vào ở trên \
function teacher($conn)
{
    $sql = "SELECT * FROM giangvien";
    return $conn->query($sql);
}
function TC_Search($conn, $search)
{
    $sql = "SELECT * FROM giangvien WHERE TenGiangVien LIKE '%$search%'";
    return $conn->query($sql);
}



// ------------------- Student (Sinh vien) --------------------------
function Student($conn)
{
    $sql = "SELECT * from sinhvien";
    return $conn->query($sql);
}
function Student_Search($conn, $search)
{
    $sql = "SELECT * FROM sinhvien WHERE TenSinhVien LIKE '%$search%'";
    return $conn->query($sql);
}

// ------------------- Subject (Môn học) --------------------------
// viết các hàm liên quan đến môn học dựa vào ở trên 
function SJ($conn)
{
    $sql = "SELECT * from monhoc";

    return $conn->query($sql);
}
function SJ_Search($conn, $search)
{
    $sql = "SELECT * FROM monhoc WHERE TenMonHoc LIKE '%$search%'";
    return $conn->query($sql);
}
function SJ_EpID($conn, $idEp)
{
    $sql = "SELECT * FROM monhoc WHERE CTDaoTaoID = '$idEp'";
    return $conn->query($sql);
}