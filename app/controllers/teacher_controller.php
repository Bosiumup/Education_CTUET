<?php
class Teacher_Controller
{
    public function add()
    {
        global $conn;
        if (isset($_POST['teacherAdd'])) {
            $prefix = "GV";
            $teacherID = $prefix . str_pad(crc32(uniqid()) % 10000, 5, '0', STR_PAD_LEFT);

            $password = "1";
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $role = "teacher";

            $teacherKhoa = $_POST['TCselectOption'];
            $teacherName = $_POST['TenGiangVien'];

            $suffix = "@ctuet.edu.vn";
            $emailTeacher = $teacherID . $suffix;

            $sdtTeacher = $_POST['SoDienThoai'];

            require "app/models/teacher_model.php";
            $teacherModel = new Teacher_Model();
            $result_add = $teacherModel->add($conn, $teacherID, $teacherKhoa, $teacherName, $emailTeacher, $sdtTeacher);
            if($result_add) {
                $sql_register = registerTeacher($conn, $teacherID, $teacherID, $password_hash, $role);
            }
            echo "<script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Thêm thành công',
                        showConfirmButton: false,
                        timer: 2500,
                        customClass: {
                            title: 'custom-alert-title'
                        }
                    });
                    
                    setTimeout(function() {
                        window.location.href='?page=teacher';
                    }, 1500);
                </script>";

        }
    }
    public function update()
    {
        global $conn;
        if (isset($_POST['TCUpdate'])) {
            $tcOldID = $_POST['tcOldID'];
            $tcNewName = $_POST['tcNewName'];
            $tcOldEmail = $_POST['tcOldEmail'];
            $tcNewPhone = $_POST['tcNewPhone'];
            $tcNewselectOption = $_POST['tcNewselectOption'];

            require "app/models/teacher_model.php";
            $tcModel = new Teacher_Model();
            $tcModel->update($conn, $tcNewselectOption, $tcNewName, $tcOldEmail, $tcNewPhone, $tcOldID);
            echo "<script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Cập nhật thành công',
                        showConfirmButton: false,
                        timer: 2000,
                        customClass: {
                            title: 'custom-alert-title'
                        }
                    });

                    setTimeout(function() {
                        window.location.href='?page=teacher';
                    }, 1500);        
                </script>";
        }
    }
    public function delete()
    {
        global $conn;
        if (isset($_POST['EPDelete'])) {
            $id = $_POST['TeacherID'];

            require "app/models/teacher_model.php";
            $tcModel = new Teacher_Model();
            $tcModel->delete($conn, $id);
            echo "<script>
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Xóa thành công',
                                showConfirmButton: false,
                                timer: 2500,
                                customClass: {
                                    title: 'custom-alert-title'
                                }
                            });

                            setTimeout(function() {
                                window.location.href='?page=teacher';
                            }, 1500);
                        </script>";
        }
    }

    public function ChangePass()
    {
        global $conn;
        if (isset($_POST['changePass'])) {
            $username = $_SESSION['Username'];
            $result = checkLogin($conn, $username);
            $row = $result->fetch_assoc();
            $pass_db = $row['Password'];


            $cur_pass = $_POST['current-password'];
            // $cur_pass_hash = password_hash($cur_pass, PASSWORD_DEFAULT);
            // echo $cur_pass_hash;

            $new_pass = $_POST['new-password'];
            $new_pass_hash = password_hash($new_pass, PASSWORD_DEFAULT);
            $confirm_password = $_POST['confirm-password'];
            if ($new_pass !== $confirm_password) {
                echo "<script>
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: 'Mật khẩu không khớp',
                                    showConfirmButton: false,
                                    timer: 2500,
                                    customClass: {
                                        title: 'custom-alert-title'
                                    }
                                });
    
                                setTimeout(function() {
                                    // window.location.href='?page=ChangePass';
                                }, 1500);
                            </script>";
            } else if (!password_verify($cur_pass, $pass_db)) {
                echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Sai Mật Khẩu',
                    showConfirmButton: false,
                    timer: 2500,
                    customClass: {
                        title: 'custom-alert-title'
                    }
                });

                setTimeout(function() {
                    // window.location.href='?page=ChangePass';
                }, 1500);
            </script>";
            } else {
                require "app/models/teacher_model.php";
                $chagePass = new Teacher_Model();
                $chagePass->ChangePass($conn, $new_pass_hash);
                echo "<script>
                Swal.fire({
                    position: 'sucses',
                    icon: 'success',
                    title: 'Đổi Mật Khẩu Thành Công',
                    showConfirmButton: false,
                    timer: 2500,
                    customClass: {
                        title: 'custom-alert-title'
                    }
                });

                setTimeout(function() {
                    // window.location.href='index.php';
                }, 1500);
            </script>";
            }


        }
    }
}
?>