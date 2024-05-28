<?php
class Teacher_Model {
    public function add($conn, $teacherID, $teacherKhoa, $teacherName, $emailTeacher, $sdtTeacher)
    {
        $sql = "INSERT INTO giangvien (GiangVienID, KhoaID, TenGiangVien, Email, SoDienThoai) VALUES ('$teacherID', '$teacherKhoa', '$teacherName', '$emailTeacher', '$sdtTeacher')";
        return $conn->query($sql);
    }
    public function checkAdd1($conn, $name) {
        $sql = "SELECT * FROM giangvien WHERE TenGiangVien = '$name'";
        return $conn->query($sql);
    }
    public function checkAdd2($conn, $phone) {
        $sql = "SELECT * FROM giangvien WHERE SoDienThoai = '$phone'";
        return $conn->query($sql);
    }
    public function checkUpdate1($conn, $id, $khoaID, $newName) {
        $sql = "SELECT * FROM giangvien WHERE GiangVienID != '$id' AND KhoaID = '$khoaID' AND TenGiangVien = '$newName'";
        return $conn->query($sql);
    }
    public function checkUpdate2($conn, $id, $khoaID, $newPhone) {
        $sql = "SELECT * FROM giangvien WHERE GiangVienID != '$id' AND KhoaID = '$khoaID' AND SoDienThoai = '$newPhone'";
        return $conn->query($sql);
    }
    function update($conn, $newKhoaID, $newName, $newEmail, $newPhone, $oldID)
    {
        // Tắt kiểm tra ràng buộc khóa ngoại
        // $conn->query('SET FOREIGN_KEY_CHECKS=0');

        $sql = "UPDATE giangvien SET KhoaID = '$newKhoaID', TenGiangVien = '$newName', Email = '$newEmail', SoDienThoai = '$newPhone' WHERE GiangVienID = '$oldID'";
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