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
    // viết các hàm liên quan đến giảng viên dựa vào ở trên 

// ------------------- Student (Sinh vien) --------------------------
    // viết các hàm liên quan đến sinh viên dựa vào ở trên 
    
// ------------------- Subject (Môn học) --------------------------
    // viết các hàm liên quan đến môn học dựa vào ở trên 