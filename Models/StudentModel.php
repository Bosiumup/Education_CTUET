<?php
class StudentModel {
    public function AddStudent($conn, $name, $student_code, $class)
    {
        $sql = "INSERT INTO student (name, student_code, class) VALUES ('$name', '$student_code', '$class')";
        return $conn->query($sql);
    }
}
?>