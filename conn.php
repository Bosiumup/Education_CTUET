<?php
// Thông tin kết nối đến cơ sở dữ liệu
$host = "localhost"; // Địa chỉ máy chủ MySQL
$username = "root"; // Tên đăng nhập MySQL
$password = ""; // Mật khẩu MySQL
$database = "qlctdt"; // Tên cơ sở dữ liệu bạn đã tạo

// Tạo kết nối đến cơ sở dữ liệu
$conn = mysqli_connect($host, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}
