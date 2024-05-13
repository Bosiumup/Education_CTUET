<?php
class StudentModel {
    public function AddStudent($conn, $name, $student_code, $class)
    {
        $sql = "INSERT INTO student (name, student_code, class) VALUES ('$name', '$student_code', '$class')";
        return $conn->query($sql);
    }
    public function CheckStudentID($conn, $student_code) {
        $sql = "SELECT * FROM student WHERE student_code = '$student_code'";
        return $conn->query($sql);
    }
    public function CheckUpdateStudentID($conn, $new_student_code) {
        $sql = "SELECT * FROM student WHERE student_code = '$new_student_code'";
        return $conn->query($sql);
    }
    function UpdateStudent($conn, $new_name, $new_class, $old_student_code)
    {
        $sql = "UPDATE student SET name = '$new_name', class = '$new_class' WHERE student_code = '$old_student_code'";
        return $conn->query($sql);
    }
    public function DeteleStudent($conn, $student_code)
    {
        $sql = "DELETE FROM student WHERE student_code = '$student_code'";
        return $conn->query($sql);
    }
}
?>