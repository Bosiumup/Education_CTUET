<?php 
class StudentController {
    public function add() {
        global $conn;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $student_code = $_POST['student_code'];
            $class = $_POST['class'];
            $name = $_POST['name'];
            
            require "Models/StudentModel.php";
            $studentModel = new StudentModel();
            if ($studentModel->AddStudent($conn, $name, $student_code, $class)) {
                echo "<script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Thêm sinh viên thành công',
                showConfirmButton: false,
                timer: 1500,
                customClass: {
                    title: 'custom-alert-title'
                }
              });
            </script>";
            } else {
                echo 'Có lỗi xảy ra khi thêm sinh viên';
            }
        }
    }
    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {}
    }
}
?>