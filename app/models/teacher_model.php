<?php
class Teacher_Model {
    public function add($conn, $teacherID, $teacherKhoa, $teacherName, $emailTeacher, $sdtTeacher)
    {
        $sql = "INSERT INTO giangvien (GiangVienID, KhoaID, TenGiangVien, Email, SoDienThoai) VALUES ('$teacherID', '$teacherKhoa', '$teacherName', '$emailTeacher', '$sdtTeacher')";
        return $conn->query($sql);
    }
    public function checkAdd($conn, $name) {
        $sql = "SELECT * FROM giangvien WHERE TenGiangVien = '$name'";
        return $conn->query($sql);
    }
    public function checkUpdate($conn, $newName) {
        $sql = "SELECT * FROM chuongtrinhdaotao WHERE TenChuongTrinh = '$newName'";
        return $conn->query($sql);
    }
    function update($conn, $newID, $newKhoaID, $newName, $oldID)
    {
        // Tắt kiểm tra ràng buộc khóa ngoại
        // $conn->query('SET FOREIGN_KEY_CHECKS=0');

        $sql = "UPDATE chuongtrinhdaotao SET CTDaoTaoID = '$newID', KhoaID = '$newKhoaID', TenChuongTrinh = '$newName' WHERE CTDaoTaoID = '$oldID'";
        return $conn->query($sql);
        
        // Bật lại kiểm tra ràng buộc khóa ngoại
        // $conn->query('SET FOREIGN_KEY_CHECKS=1');
    }
    public function delete($conn, $id)
    {
        $sql = "DELETE FROM giangvien WHERE GiangVienID = '$id'";
        return $conn->query($sql);
    }
}
?>