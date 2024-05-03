<?php
// ------------------ Teachers --------------------
// Hàm render students
function Students($conn)
{
    $query = "SELECT * FROM student";
    return $conn->query($query);
}