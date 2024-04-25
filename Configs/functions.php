<?php
// ------------------ Students --------------------
// Hàm render students
function Students($conn)
{
    $query = "SELECT * FROM student";
    return $conn->query($query);
}
function where_Students($conn, $student_code)
{
    $query = "SELECT * FROM student where student_code = '$student_code'";
    return $conn->query($query);
}