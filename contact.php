<?php
// contact.php
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #3B82F6;
            color: #374151;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header, footer {
            background-color: #60A5FA;
            color: white;
            padding: 10px 20px;
        }
        header .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        nav a {
            color: #E0E7FF;
            margin: 0 10px;
            text-decoration: none;
            font-weight: bold;
        }
        nav a:hover {
            color: #BFDBFE;
        }
        .content {
            padding: 0px;
            background-color: white;
            margin: 0;
            flex-grow: 1;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            max-width: 600px;
            margin: auto;
        }
        input, textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
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
        footer {
            text-align: center;
            padding: 15px 0;
            background-color: #60A5FA;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <h2>LOGO</h2>
            </div>
            <nav class="nav-links">
                <a href="index.php">Trang Chủ</a>
                <a href="#">Giới Thiệu</a>
                <a href="contact.php">Liên Hệ</a>   
            </nav>
        </div>
    </header>

    <div class="content">
        <form action="" method="POST">
            <input type="text" name="name" placeholder="Họ tên" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="subject" placeholder="Chủ đề" required>
            <textarea name="message" placeholder="Nội dung" rows="5" required></textarea>
            <button type="submit">Gửi Thông Tin</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2025 Bản quyền thuộc Trần Biển</p>
    </footer>
</body>
</html>