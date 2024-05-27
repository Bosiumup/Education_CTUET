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
        // Tắt kiểm tra ràng buộc khóa ngoại
        // $conn->query('SET FOREIGN_KEY_CHECKS=0');

        $sql = "UPDATE chuongtrinhdaotao SET CTDaoTaoID = '$newID', KhoaID = '$newKhoaID', TenChuongTrinh = '$newName' WHERE CTDaoTaoID = '$oldID'";
        return $conn->query($sql);
        
        // Bật lại kiểm tra ràng buộc khóa ngoại
        // $conn->query('SET FOREIGN_KEY_CHECKS=1');
    }
    public function delete($conn, $id)
    {
        $sql = "DELETE FROM chuongtrinhdaotao WHERE CTDaoTaoID = '$id'";
        return $conn->query($sql);
    }
}
?>