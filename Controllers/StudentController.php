<?php 
class StudentController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $student_code = $_POST['student_code'];
            $class = $_POST['class'];
            $name = $_POST['name'];
            
            require "Models/StudentModel.php";
            $studentModel = new StudentModel();
            if ($studentModel->AddStudent($this->conn, $name, $student_code, $class)) {
                header("Location: index.php");
                exit;
            } else {
                echo 'Có lỗi xảy ra khi thêm sinh viên';
            }
        }
    }
}
?>