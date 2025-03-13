<?php
// Kết nối đến cơ sở dữ liệu
$conn = new mysqli('localhost', 'username', 'password', 'database_name');

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý dữ liệu khi form được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $price = floatval($_POST['price']);
    $description = $conn->real_escape_string($_POST['description']);

    $sql = "INSERT INTO products (name, price, description) VALUES ('$name', '$price', '$description')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Lỗi: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Sản Phẩm</title>
    <style>
        form {
            width: 300px;
            margin: auto;
        }
        label, input, textarea {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }
        input, textarea {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 15px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        a {
            display: block;
            margin-top: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Thêm Sản Phẩm</h1>
    <form action="" method="POST">
        <label for="name">Tên Sản Phẩm:</label>
        <input type="text" id="name" name="name" required>

        <label for="price">Giá Sản Phẩm:</label>
        <input type="number" id="price" name="price" step="0.01" required>

        <label for="description">Mô Tả:</label>
        <textarea id="description" name="description" rows="4" required></textarea>

        <button type="submit">Thêm Sản Phẩm</button>
    </form>

    <a href="index.php">Quay lại danh sách sản phẩm</a>
</body>
</html>