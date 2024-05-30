<?php
class EP_Model {
    public function add($conn, $id, $idkhoa, $name)
    {
        $sql = "INSERT INTO chuongtrinhdaotao (CTDaoTaoID, KhoaID, TenChuongTrinh) VALUES ('$id', '$idkhoa', '$name')";
        return $conn->query($sql);
    }
    public function checkAdd($conn, $id, $name) {
        $sql = "SELECT * FROM chuongtrinhdaotao WHERE CTDaoTaoID = '$id' OR TenChuongTrinh = '$name'";
        return $conn->query($sql);
    }
    public function checkUpdate($conn, $id, $newName) {
        $sql = "SELECT * FROM chuongtrinhdaotao WHERE CTDaoTaoID != '$id' AND TenChuongTrinh = '$newName'";
        return $conn->query($sql);
    }
    function update($conn, $newID, $newKhoaID, $newName, $oldID)
    {
        $conn->query('SET FOREIGN_KEY_CHECKS=0');
        $sql = "UPDATE chuongtrinhdaotao SET CTDaoTaoID = '$newID', KhoaID = '$newKhoaID', TenChuongTrinh = '$newName' WHERE CTDaoTaoID = '$oldID'";
        if($sql) {
            $sql_monhoc = "UPDATE monhoc SET CTDaoTaoID = '$newID' WHERE CTDaoTaoID = '$oldID'";
            $conn->query($sql_monhoc);
            $sql_sinhvien = "UPDATE sinhvien SET CTDaoTaoID = '$newID' WHERE CTDaoTaoID = '$oldID'";
            $conn->query($sql_sinhvien);
        }
        $conn->query('SET FOREIGN_KEY_CHECKS=1');
        return $conn->query($sql);
    }
    public function delete($conn, $id)
    {
        $sql = "DELETE FROM chuongtrinhdaotao WHERE CTDaoTaoID = '$id'";
        return $conn->query($sql);
    }
}
?>