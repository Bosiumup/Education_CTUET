<?php    
    class Teacher_Controller {
        public function add() {
            global $conn;
            if(isset($_POST['teacherAdd'])){
                $prefix = "GV";
                $random_number = mt_rand(10000, 99999);
                $teacherID = $prefix . $random_number;
                $teacherKhoa = $_POST['TCselectOption'];
                $teacherName = $_POST['TenGiangVien'];
                $suffix = "@ctuet.edu.vn";
                $emailTeacher =  $teacherID . $suffix;
                $sdtTeacher = $_POST['SoDienThoai'];
                
                require "app/models/teacher_model.php";
                    $teacherModel = new Teacher_Model();
                    if ($teacherModel->checkAdd1($conn, $teacherName)->num_rows > 0) {
                        echo "<script>
                             Swal.fire({
                                 position: 'center',
                                 icon: 'error',
                                 title: 'Giảng viên $teacherName đã có',
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
                    elseif ($teacherModel->checkAdd2($conn, $sdtTeacher)->num_rows > 0) {
                        echo "<script>
                             Swal.fire({
                                 position: 'center',
                                 icon: 'error',
                                 title: 'SĐT $sdtTeacher đã có',
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
                    else {
                        $teacherModel->add($conn, $teacherID, $teacherKhoa, $teacherName, $emailTeacher, $sdtTeacher);
                        //  unset($_SESSION['KhoaID']);
                        //  unset($_SESSION['TenGiangVien']);
                        //  unset($_SESSION['Email']);
                        //  unset($_SESSION['SoDienThoai']);
                         
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
        }
        public function update() {
            global $conn;
            if (isset($_POST['TCUpdate'])) {
                $tcOldID = $_POST['tcOldID'];
                $tcNewName = $_POST['tcNewName'];
                $tcOldEmail = $_POST['tcOldEmail'];
                $tcNewPhone = $_POST['tcNewPhone'];
                $tcNewselectOption = $_POST['tcNewselectOption'];

                require "app/models/teacher_model.php";
                $tcModel = new Teacher_Model();
                if ($tcModel->checkUpdate1($conn, $tcOldID, $tcNewselectOption, $tcNewName)->num_rows > 0) {
                    echo "<script>
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Giảng viên $tcNewName đã có',
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
                elseif ($tcModel->checkUpdate2($conn, $tcOldID, $tcNewselectOption, $tcNewPhone)->num_rows > 0) {
                    echo "<script>
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'SĐT $tcNewPhone đã có',
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
                else {
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
        }
        public function delete() {
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
    }
?>