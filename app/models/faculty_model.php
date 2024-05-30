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
            $sql_CTDT = "DELETE FROM chuongtrinhdaotao WHERE KhoaID = '$id'";
            if ($sql_CTDT) {
                $sql_CTDTm = "SELECT CTDaoTaoID FROM chuongtrinhdaotao WHERE KhoaID = '$id'";
                $result_CTDT = $sql_CTDTm;
                $sql_DLTm = "DELETE FROM monhoc WHERE CTDaoTaoID = '$result_CTDT'";
            }
        }
        return $conn->query($sql);
        $conn->query('SET FOREIGN_KEY_CHECKS=1');
    }
}

?>