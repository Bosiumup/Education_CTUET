<?php

class Student_Model
{
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
        $conn->query('SET FOREIGN_KEY_CHECKS=0');
        $sql = "DELETE FROM sinhvien WHERE SinhVienID = '$id'";
        if($sql) {
            $sql_account= "DELETE FROM account WHERE SinhVienID = '$id'";
            $conn->query($sql_account);
        }
        $conn->query('SET FOREIGN_KEY_CHECKS=1');
        return $conn->query($sql);
    }
}

?>