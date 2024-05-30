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
        // $conn->query('SET FOREIGN_KEY_CHECKS=0');
        // $sql = "DELETE FROM khoa WHERE KhoaID = '$id'";
        // if ($conn->query($sql)) {
        //     $sql_teacher = "DELETE FROM giangvien WHERE KhoaID = '$id'";
        //     $conn->query($sql_teacher);
        //     $sql_CTDT = "DELETE FROM chuongtrinhdaotao WHERE KhoaID = '$id'";
        //     if ($conn->query($sql_CTDT)) {
        //         $sql_ctdtID = "SELECT CTDaoTaoID FROM chuongtrinhdaotao WHERE KhoaID = '$id'";
        //         $result_ctdtID = $conn->query($sql_ctdtID);
        //         if($result_ctdtID) {
        //             while($row = $result_ctdtID->fetch_assoc()) {
        //                 $ctdtID = $row['CTDaoTaoID'];
        //                 $sql_subject = "DELETE FROM monhoc WHERE CTDaoTaoID = '$ctdtID'";
        //                 $conn->query($sql_subject);
        //                 $sql_student = "DELETE FROM sinhvien WHERE CTDaoTaoID = '$ctdtID'";
        //                 $conn->query($sql_student);
        //             }
        //         }
        //     }
        // }
        // $conn->query('SET FOREIGN_KEY_CHECKS=1');
        // return $conn->query($sql);
    }
}

?>