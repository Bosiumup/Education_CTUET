<?php
class SJ_Model {
    public function add($conn, $id, $idctdt, $name,$hocky,$tinchi,$lythuyet,$thuchanh)
    {
        $sql = "INSERT INTO monhoc (MonHocID, CTDaoTaoID, TenMonHoc, HocKy, SoTinChi, SoTietLyThuyet, SoTietThucHanh)
         VALUES ('$id', '$idctdt', '$name','$hocky','$tinchi','$lythuyet','$thuchanh')";
        return $conn->query($sql);
    }
    public function checkAdd($conn, $name) {
        $sql = "SELECT * FROM monhoc WHERE TenMonHoc = '$name'";
        return $conn->query($sql);
    }
    public function checkUpdate($conn, $newName) {
        $sql = "SELECT * FROM monhoc WHERE TenMonHoc = '$newName'";
        return $conn->query($sql);
    }
    function update($conn, $newid,$oldid, $newidctdt, $newname,$newhocky,$newtinchi,$newlythuyet,$newthuchanh)
    {

        $sql = "UPDATE monhoc SET MonHocID = '$newid', CTDaoTaoID = '$newidctdt', TenMonHoc = '$newname', HocKy ='$newhocky', SoTinChi = '$newtinchi',SoTietLyThuyet ='$newlythuyet',SoTietThucHanh='$newthuchanh' WHERE MonHocID = '$oldid'";
        return $conn->query($sql);
    }
    public function delete($conn, $id)
    {
        $sql = "DELETE FROM monhoc WHERE MonHocID = '$id'";
        return $conn->query($sql);
    }
}
?>