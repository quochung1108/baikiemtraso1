<?php
// Kết nối đến cơ sở dữ liệu
$conn = new mysqli('localhost', 'username', 'password', 'database_name');

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn danh sách sản phẩm
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Sản Phẩm</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        .action-btns a {
            margin: 0 5px;
            text-decoration: none;
            padding: 5px 10px;
            background-color: #007BFF;
            color: #fff;
            border-radius: 4px;
        }
        .action-btns a.delete {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <h1>Danh Sách Sản Phẩm</h1>
    <a href="add_product.php">Thêm Sản Phẩm</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo number_format($row['price'], 0, ',', '.'); ?> VNĐ</td>
                        <td class="action-btns">
                            <a href="edit_product.php?id=<?php echo $row['id']; ?>">Sửa</a>
                            <a href="delete_product.php?id=<?php echo $row['id']; ?>" class="delete" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Không có sản phẩm nào.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php $conn->close(); ?>
</body>
</html>
