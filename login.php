<?php
// login.php
session_start();

// Giả sử thông tin đăng nhập hợp lệ (thay thế với kiểm tra cơ sở dữ liệu thực tế)
$valid_email = "user@example.com";
$valid_password = "password123";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Kiểm tra thông tin đăng nhập
    if ($email === $valid_email && $password === $valid_password) {
        // Lưu thông tin đăng nhập vào session
        $_SESSION['email'] = $email;
        header("Location: index.php");
        exit();
    } else {
        $error = "Email hoặc mật khẩu không đúng.";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F0F9FF;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 350px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #374151;
        }
        input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 16px;
        }
        button {
            padding: 12px;
            background-color: #3B82F6;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #2563EB;
        }
        .links {
            text-align: center;
            margin-top: 20px;
        }
        .links span {
            color: #000000;
        }
        .links a {
            color: #1D4ED8;
            text-decoration: none;
        }
        .links a:last-child {
            display: block;
            margin-top: 5px;
        }
        .links a:hover {
            text-decoration: underline;
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Đăng Nhập</h2>
        <?php if (!empty($error)) : ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form action="" method="POST">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Nhập email" required>

            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>

            <button type="submit">Đăng Nhập</button>
        </form>
        <div class="links">
            <span>Chưa có tài khoản?</span> <a href="register.php">Đăng Ký</a>
            <a href="reset-password.php">Quên mật khẩu?</a>
        </div>
    </div>
</body>
</html>