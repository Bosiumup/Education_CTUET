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

    function update($conn, $newID, $newName, $oldID)
    {
        $conn->query('SET FOREIGN_KEY_CHECKS=0');
        $sql = "UPDATE khoa SET KhoaID = '$newID', TenKhoa = '$newName' WHERE KhoaID = '$oldID'";
        if($sql) {
            $sql_giangvien = "UPDATE giangvien SET KhoaID = '$newID' WHERE KhoaID = '$oldID'";
            $conn->query($sql_giangvien);
            $sql_ctdt = "UPDATE chuongtrinhdaotao SET KhoaID = '$newID' WHERE KhoaID = '$oldID'";
            $conn->query($sql_ctdt);
        }
        $conn->query('SET FOREIGN_KEY_CHECKS=1');
        return $conn->query($sql);
    }

    public function delete($conn, $id)
    {
        $sql = "DELETE FROM khoa WHERE KhoaID = '$id'";
        return $conn->query($sql);
    }
}

?>