<?php
// Kết nối đến cơ sở dữ liệu
$conn = new mysqli('localhost', 'username', 'password', 'database_name');

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra ID sản phẩm
if (!isset($_GET['id'])) {
    echo "ID sản phẩm không hợp lệ.";
    exit();
}

$id = intval($_GET['id']);

// Xử lý khi form được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $price = floatval($_POST['price']);
    $description = $conn->real_escape_string($_POST['description']);

    $sql = "UPDATE products SET name='$name', price='$price', description='$description' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Lỗi: " . $conn->error;
    }
}

// Lấy thông tin sản phẩm hiện tại
$sql = "SELECT * FROM products WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows != 1) {
    echo "Sản phẩm không tồn tại.";
    exit();
}

$product = $result->fetch_assoc();
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Cập Nhật Sản Phẩm</title>
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
            background-color: #ffc107;
            color: #000;
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
    <h1>Cập Nhật Sản Phẩm</h1>
    <form action="" method="POST">
        <label for="name">Tên Sản Phẩm:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>

        <label for="price">Giá Sản Phẩm:</label>
        <input type="number" id="price" name="price" step="0.01" value="<?php echo $product['price']; ?>" required>

        <label for="description">Mô Tả:</label>
        <textarea id="description" name="description" rows="4" required><?php echo htmlspecialchars($product['description']); ?></textarea>

        <button type="submit">Cập Nhật</button>
    </form>

    <a href="index.php">Quay lại danh sách sản phẩm</a>
</body>
</html>