<?php
class Teacher_Model {
    public function add($conn, $teacherID, $teacherKhoa, $teacherName, $emailTeacher, $sdtTeacher)
    {
        $sql = "INSERT INTO giangvien (GiangVienID, KhoaID, TenGiangVien, Email, SoDienThoai) VALUES ('$teacherID', '$teacherKhoa', '$teacherName', '$emailTeacher', '$sdtTeacher')";
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
        $conn->query('SET FOREIGN_KEY_CHECKS=0');
        $sql = "DELETE FROM giangvien WHERE GiangVienID = '$id'";
        if($sql) {
            $sql_account= "DELETE FROM account WHERE GiangVienID = '$id'";
            $conn->query($sql_account);
        }
        $conn->query('SET FOREIGN_KEY_CHECKS=1');
        return $conn->query($sql);
    }

    public function ChangePass($conn, $new_pass)
    {
        $sql = "UPDATE account set password = '$new_pass'";
        return $conn->query($sql);
    }
}
?>