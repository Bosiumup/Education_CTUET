<?php 
class StudentController {
    public function add() {
        global $conn;
        if (isset($_POST['btn_add'])) {
            $student_code = $_POST['student_code'];
            $class = $_POST['class'];
            $name = $_POST['name'];

            // Kiểm tra xem tất cả các trường đã được nhập chưa
            if (empty($student_code) || empty($class) || empty($name)) {
                echo "<script>
                    Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: 'Chưa nhập đủ thông tin',
                        showConfirmButton: false,
                        timer: 2000,
                        customClass: {
                            title: 'custom-alert-title'
                        }
                    });
                    </script>";
            } 
            else {
                require "Models/StudentModel.php";
                $studentModel = new StudentModel();
                if ($studentModel->CheckStudentID($conn, $student_code)->num_rows > 0) {
                    echo "<script>
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Mã sinh viên $student_code đã tồn tại',
                            showConfirmButton: false,
                            timer: 2000,
                            customClass: {
                                title: 'custom-alert-title'
                            }
                        });
                        </script>";
                } 
                else {
                    $studentModel->AddStudent($conn, $name, $student_code, $class);
                    echo "<script>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Thêm sinh viên thành công',
                            showConfirmButton: false,
                            timer: 2000,
                            customClass: {
                                title: 'custom-alert-title'
                            }
                        });
                        </script>";
                }
            }
        }
    }
    public function update() {
        global $conn;
        if (isset($_POST['btn_update'])) {
            $new_class = $_POST['new_class'];
            $new_name = $_POST['new_name'];
            $old_student_code = $_POST['old_student_code'];

            // Kiểm tra xem tất cả các trường đã được nhập chưa
            if (empty($new_class) || empty($new_name)) {
                echo "<script>
                    Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: 'Chưa nhập đủ thông tin',
                        showConfirmButton: false,
                        timer: 2000,
                        customClass: {
                            title: 'custom-alert-title'
                        }
                    });
                    </script>";
            } 
            else {
                require "Models/StudentModel.php";
                $studentModel = new StudentModel();
                $studentModel->UpdateStudent($conn, $new_name, $new_class, $old_student_code);
                    echo "<script>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Cập nhật thông tin thành công',
                            showConfirmButton: false,
                            timer: 2000,
                            customClass: {
                                title: 'custom-alert-title'
                            }
                        });
                        </script>";
                
            }
        }
    }
    public function delete() {
        global $conn;
        if (isset($_POST['btn_delete'])) {
            $student_code = $_POST['student_code'];
            $name = $_POST['name'];

            require "Models/StudentModel.php";
            $studentModel = new StudentModel();
            $studentModel->DeteleStudent($conn, $student_code);
            echo "<script>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Xóa sinh viên $name thành công',
                            showConfirmButton: false,
                            timer: 2000,
                            customClass: {
                                title: 'custom-alert-title'
                            }
                        });
                        </script>";
        }
    }
}
?>