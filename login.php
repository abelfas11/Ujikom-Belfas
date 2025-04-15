<?php
    include "koneksi.php";

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $data = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
        $cek = mysqli_num_rows($data);

        if($cek > 0){
            $_SESSION['user'] = mysqli_fetch_array($data);
            echo '<script>alert("Berhasil Login"); location.href="index.php";</script>';
        } else {
            echo '<script>alert("Username atau Password salah!");</script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Perpustakaan Online</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background-color: #ffffff;
            padding: 60px;  /* Meningkatkan padding agar lebih besar */
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 500px;  /* Memperbesar lebar maksimum */
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #4e54c8;
        }

        .input-group {
            margin-bottom: 20px;
            position: relative;
        }

        .input-group i {
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            color: #aaa;
        }

        .input-group input {
            width: 100%;
            padding: 12px 12px 12px 40px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 14px;
            transition: border 0.3s;
        }

        .input-group input:focus {
            border-color: #4e54c8;
            outline: none;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background-color: #4e54c8;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: background 0.3s;
        }

        .btn:hover {
            background-color: #3b41a1;
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            font-size: 13px;
            color: #999;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login Perpustakaan Online</h2>
    <form method="post">
        <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" id="username" name="username" placeholder="Username" required>
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" id="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn" name="login" value="login">Login</button>
    </form>
    <div class="footer">
        &copy; Perpustakaan Online 2025
    </div>
</div>

</body>
</html>
