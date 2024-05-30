<?php

class Faculty_Model
{
    public function add($conn, $id, $name)
    {
        $sql = "INSERT INTO khoa (KhoaID, TenKhoa) VALUES ('$id', '$name')";
        return $conn->query($sql);
    }

    public function checkAdd($conn, $id, $name)
    {
        $sql = "SELECT * FROM khoa WHERE KhoaID = '$id' OR TenKhoa = '$name'";
        return $conn->query($sql);
    }

    public function checkUpdate($conn, $id, $newName)
    {
        $sql = "SELECT * FROM khoa WHERE KhoaID != '$id' AND TenKhoa = '$newName'";
        return $conn->query($sql);
    }

    function update($conn, $newName, $oldID)
    {
        $sql = "UPDATE khoa SET TenKhoa = '$newName' WHERE KhoaID = '$oldID'";
        return $conn->query($sql);
    }

    public function delete($conn, $id)
    {
        $conn->query('SET FOREIGN_KEY_CHECKS=0');
        $sql = "DELETE FROM khoa WHERE KhoaID = '$id'";
        if ($sql) {
            $sql_teacher = "DELETE FROM giangvien WHERE KhoaID = '$id'";
            $conn->query($sql_teacher);
            $sql_CTDT = "DELETE FROM chuongtrinhdaotao WHERE KhoaID = '$id'";
            if ($sql_CTDT) {
                $sql_ctdtID = "SELECT CTDaoTaoID FROM chuongtrinhdaotao WHERE KhoaID = '$id'";
                $result_ctdtID = $sql_ctdtID;
                if($result_ctdtID) {
                    $sql_subject = "DELETE FROM monhoc WHERE CTDaoTaoID = '$result_ctdtID'";
                    $conn->query($sql_subject);
                    $sql_student = "DELETE FROM sinhvien WHERE CTDaoTaoID = '$result_ctdtID'";
                    $conn->query($sql_student);
                }
            }
        }
        return $conn->query($sql);
        $conn->query('SET FOREIGN_KEY_CHECKS=1');
    }
}

?>