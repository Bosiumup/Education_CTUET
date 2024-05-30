<?php
class Student_Model {
    public function add($conn, $studentID, $EPID, $tensinhvien, $email, $sdt)
    {
        $sql = "INSERT INTO sinhvien (SinhVienID, CTDaoTaoID, TenSinhVien, Email, SoDienThoai) VALUES ('$studentID', '$EPID', '$tensinhvien', '$email', $sdt)";
        return $conn->query($sql);
    }
    function update($conn, $newEPID, $newName, $newEmail, $newPhone, $oldID)
    {
        $sql = "UPDATE sinhvien SET CTDaoTaoID = '$newEPID', TenSinhVien = '$newName', Email = '$newEmail', SoDienThoai = '$newPhone' WHERE SinhVienID = '$oldID'";
        return $conn->query($sql);
    }
    public function delete($conn, $id)
    {
        $sql = "DELETE FROM sinhvien WHERE SinhVienID = '$id'";
        return $conn->query($sql);
    }
}
?>