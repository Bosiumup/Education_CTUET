<?php
class Faculty_Model {
    public function add($conn, $id, $name)
    {
        $sql = "INSERT INTO khoa (KhoaID, TenKhoa) VALUES ('$id', '$name')";
        return $conn->query($sql);
    }
    public function checkAdd($conn, $id, $name) {
        $sql = "SELECT * FROM khoa WHERE KhoaID = '$id' OR TenKhoa = '$name'";
        return $conn->query($sql);
    }
    public function checkUpdate($conn, $newName) {
        $sql = "SELECT * FROM khoa WHERE TenKhoa = '$newName'";
        return $conn->query($sql);
    }
    function update($conn, $newName, $oldID)
    {
        $sql = "UPDATE khoa SET TenKhoa = '$newName' WHERE KhoaID = '$oldID'";
        return $conn->query($sql);
    }
    public function delete($conn, $id)
    {
        $sql = "DELETE FROM khoa WHERE KhoaID = '$id'";
        return $conn->query($sql);
    }
}
?>