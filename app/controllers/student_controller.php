<?php    
    class Student_Controller {
        public function add() {
            global $conn;
            if(isset($_POST['studentAdd'])){
                $prefix = "2101";
                $SinhVienID = $prefix . str_pad(crc32(uniqid()) % 10000, 3, '0', STR_PAD_LEFT);

//                           $prefix là một chuỗi cố định để đánh dấu ID sinh viên.
//                       Số 3 chữ số được tạo bằng cách:
//                       Tạo một ID duy nhất bằng uniqid().
//                        Tính mã CRC-32 của ID này bằng crc32().
//                       Lấy phần dư khi chia cho 10000 để giới hạn độ lớn.
//                      Thêm các số 0 phía trước để đảm bảo có 3 chữ số.

                $PassWord = "1";
                $PassWord_hash = password_hash($PassWord, PASSWORD_DEFAULT);

                $Role = "student";

                $CTDaoTaoID = $_POST['StudentselectOption'];
                $StudentName = $_POST['StudentName'];

                $suffix = "@student.ctuet.edu.vn";
                $Email = $SinhVienID . $suffix;

                $SoDienThoai = $_POST['SoDienThoai'];          

                require "app/models/student_model.php";
                $StudentModel = new Student_Model();
                $result_add = $StudentModel->add($conn, $SinhVienID, $CTDaoTaoID, $StudentName, $Email, $SoDienThoai);
                if($result_add) {
                    $sql_register = registerStudent($conn, $SinhVienID, $SinhVienID, $PassWord_hash, $Role);
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
                            window.location.href='?page=student';
                        }, 1500);
                        </script>";
                
            }
        }
        public function update() {
            global $conn;
            if (isset($_POST['SDUpdate'])) {
                $sdOldID = $_POST['sdOldID'];
                $sdNewName = $_POST['sdNewName'];
                $sdOldEmail = $_POST['sdOldEmail'];
                $sdNewPhone = $_POST['sdNewPhone'];
                $sdNewselectOption = $_POST['sdNewselectOption'];

                require "app/models/student_model.php";
                $StudentModel = new Student_Model();
                $StudentModel->update($conn, $sdNewselectOption, $sdNewName, $sdOldEmail, $sdNewPhone, $sdOldID);
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