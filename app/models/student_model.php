<?php
class Student_Model {
    public function add($conn, $id, $name, $tensinhvien, $email, $sdt)
    {
        $sql = "INSERT INTO sinhvien (SinhVienID, CTDaoTaoID, TenSinhVien, Email, SoDienThoai) VALUES ('$id', '$name', '$tensinhvien', '$email', $sdt)";
        return $conn->query($sql);
    }
    public function checkAdd($conn, $id) {
        $sql = "SELECT * FROM sinhvien WHERE SinhVienID = '$id'";
        return $conn->query($sql);
    }
    public function checkUpdate($conn, $newName) {
        $sql = "SELECT * FROM sinhvien WHERE TenSinhVien = '$newName'";
        return $conn->query($sql);
    }
    function update($conn, $newName, $oldID)
    {
        $sql = "UPDATE sinhvien SET TenSinhVien = '$newName' WHERE SinhVienID = '$oldID'";
        return $conn->query($sql);
    }
    public function delete($conn, $id)
    {
        $sql = "DELETE FROM sinhvien WHERE SinhVienID = '$id'";
        return $conn->query($sql);
    }
}
?>