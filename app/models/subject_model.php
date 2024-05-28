<?php
class SJ_Model {
    public function add($conn, $id, $idctdt, $name,$hocky,$tinchi,$lythuyet,$thuchanh)
    {
        $sql = "INSERT INTO monhoc (MonHocID, CTDaoTaoID, TenMonHoc, HocKy, SoTinChi, SoTietLyThuyet, SoTietThucHanh)
         VALUES ('$id', '$idctdt', '$name','$hocky','$tinchi','$lythuyet','$thuchanh')";
        return $conn->query($sql);
    }
    public function checkAdd($conn, $id, $name) {
        $sql = "SELECT * FROM monhoc WHERE CTDaoTaoID = '$id' AND TenMonHoc = '$name'";
        return $conn->query($sql);
    }
    public function checkUpdate($conn, $id, $idctdt, $newName) {
        $sql = "SELECT * FROM monhoc WHERE MonHocID != '$id' AND CTDaoTaoID = '$idctdt' AND TenMonHoc = '$newName'";
        return $conn->query($sql);
    }
    function update($conn, $oldid, $newidctdt, $newname, $newhocky, $newtinchi, $newlythuyet, $newthuchanh)
    {

        $sql = "UPDATE monhoc SET CTDaoTaoID = '$newidctdt', TenMonHoc = '$newname', HocKy = '$newhocky', SoTinChi = '$newtinchi', SoTietLyThuyet = '$newlythuyet', SoTietThucHanh= '$newthuchanh' WHERE MonHocID = '$oldid'";
        return $conn->query($sql);
    }
    public function delete($conn, $id)
    {
        $sql = "DELETE FROM monhoc WHERE MonHocID = '$id'";
        return $conn->query($sql);
    }
}
?>