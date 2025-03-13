<?php
$servername = "localhost";    // Máy chủ MySQL (XAMPP luôn là localhost)
$username = "root";           // Mặc định XAMPP sử dụng username là 'root'
$password = "";               // Mặc định không có mật khẩu
$dbname = "optimized_php_system";  // Tên cơ sở dữ liệu đã tạo

// Kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
