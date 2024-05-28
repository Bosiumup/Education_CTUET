<?php    
    class Student_Controller {
        public function add() {
            global $conn;
            if(isset($_POST['studentAdd'])){
                $prefix = "21";
                $random_number = mt_rand(10000, 99999);
                $SinhVienID = $prefix . $random_number;
                $CTDaoTaoID = $_POST['StudentselectOption'];
                $StudentName = $_POST['StudentName'];
                $Email = $_POST['Email'];
                $SoDienThoai = $_POST['SoDienThoai'];          

                require "app/models/student_model.php";
                $StudentModel = new Student_Model();
                if ($StudentModel->checkAdd($conn, $StudentName)->num_rows > 0) {
                    echo "<script>
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Sinh viên $StudentName đã có',
                                showConfirmButton: false,
                                timer: 2500,
                                customClass: {
                                    title: 'custom-alert-title'
                                }
                            });

                            setTimeout(function() {
                                window.location.href='?page=student';
                            }, 1500);
                            </script>";    
                } 
                else {
                    $StudentModel->add($conn, $SinhVienID, $CTDaoTaoID, $StudentName, $Email, $SoDienThoai);
                    if($StudentModel) {
                      
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
                                window.location.href='?page=student';
                            }, 1500);
                            </script>";
                    } 
                }
            }
        }
        public function update() {
            global $conn;
            if (isset($_POST['StudentUpdate'])) {
                $StudentOldID = $_POST['StudentOldID'];
                $StudentNewID = $_POST['StudentNewID'];
                $StudentNewName = $_POST['StudentNewName'];
                $StudentNewEmail = $_POST['StudentNewEmail'];
                $StudentNewSDT = $_POST['StudentNewSDT'];
                $StudentNewselectOption = $_POST['StudentNewselectOption'];

                require "app/models/student_model.php";
                $StudentModel = new Student_Model();
                if ($StudentModel->checkUpdate($conn, $StudentNewName)->num_rows > 0) {
                    echo "<script>
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Chương trình đào tạo $StudentNewName đã có',
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
                    $StudentModel->update($conn, $StudentNewID, $StudentNewselectOption, $StudentNewName,$StudentNewEmail,$StudentNewSDT, $StudentOldID);
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
                                window.location.href='?page=student';
                            }, 1500);
                            </script>";    
                }
            }
        }
        public function delete() {
            global $conn;
            if (isset($_POST['studentDelete'])) {
                $SinhVienID = $_POST['SinhVienID'];
                
                require "app/models/student_model.php";
                $StudentModel = new Student_Model();
                $StudentModel->delete($conn, $SinhVienID);
                echo "<script>
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Xóa thành công',
                                showConfirmButton: false,
                                timer: 2000,
                                customClass: {
                                    title: 'custom-alert-title'
                                }
                            });

                            setTimeout(function() {
                                window.location.href='?page=student';
                            }, 1500);
                        </script>";
            }
        }
    }
?>