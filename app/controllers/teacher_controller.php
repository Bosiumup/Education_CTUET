<?php    
    class Teacher_Controller {
        public function add() {
            global $conn;
            if(isset($_POST['teacherAdd'])){
                $teacherID = $_POST['GiangVienID'];
                $teacherName = $_POST['TenGiangVien'];
                $teacherKhoa = $_POST['KhoaID'];
                $emailTeacher = $_POST['Email'];
                $sdtTeacher = $_POST['SoDienThoai'];
            

                     require "app/models/teacher_model.php";
                     $teacherModel = new Teacher_Model();

                     if ($teacherModel->checkAdd($conn, $teacherID, $teacherName)->num_rows > 0) {
                         echo "<script>
                             Swal.fire({
                                 position: 'center',
                                 icon: 'error',
                                 title: 'Mã giảng viên $teacherID hoặc tên giảng viên $teacherName đã tồn tại',
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
                     } else {
                         $teacherModel->add($conn, $teacherID, $teacherName, $teacherKhoa,$emailTeacher, $sdtTeacher);
                         
                         unset($_SESSION['GiangVienID']);
                         unset($_SESSION['TenGiangVien']);
                         unset($_SESSION['KhoaID']);
                         unset($_SESSION['Email']);
                         unset($_SESSION['SoDienThoai']);
                         
                         echo "<script>
                             Swal.fire({
                                 position: 'center',
                                 icon: 'success',
                                 title: 'Thêm giảng viên thành công',
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
            if (isset($_POST['EPUpdate'])) {
                $epOldID = $_POST['epOldID'];
                $epNewID = $_POST['epNewID'];
                $epNewName = $_POST['epNewName'];
                $epNewselectOption = $_POST['epNewselectOption'];

                require "app/models/teacher_model.php";
                $epModel = new EP_Model();
                if ($epModel->checkUpdate($conn, $epNewName)->num_rows > 0) {
                    echo "<script>
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Chương trình đào tạo $epNewName đã có',
                                showConfirmButton: false,
                                timer: 2500,
                                customClass: {
                                    title: 'custom-alert-title'
                                }
                            });

                            setTimeout(function() {
                                window.location.href='?page=ep';
                            }, 1500);
                            </script>";    
                } 
                else {
                    $epModel->update($conn, $epNewID, $epNewselectOption, $epNewName, $epOldID);
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
                                window.location.href='?page=ep';
                            }, 1500);
                            </script>";    
                }
            }
        }
        public function delete() {
            global $conn;
            if (isset($_POST['teacherbtn'])) {
                $TC = $_POST['teacherID'];
                
                require "app/models/teacher_model.php";
                $tcModel = new Teacher_Model();
                $tcModel->delete($conn, $TC);
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