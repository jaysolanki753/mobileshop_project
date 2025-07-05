<?php
session_start();
require_once "connection.php";

if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $pwd = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = $db->prepare("SELECT id FROM login WHERE email=?");
    $sql->execute([$email]);

    if ($sql->rowCount() > 0) {
        $_SESSION['error'] = "You have already registered!";
    } else {
        $sql = $db->prepare("INSERT INTO login(name, email, password) VALUES(?,?,?)");
        if ($sql->execute([$name, $email, $pwd])) {
            $_SESSION['success'] = "Hooray! You are registered successfully!";
            header("Location: login.php");
            exit();
        } else {
            $_SESSION['error'] = "Registration failed. Please try again.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Clean Registration Form</title>
    <style>
        * { box-sizing: border-box; }
        body {
            background: linear-gradient(135deg, #6dd5ed, #2193b0);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }
        label {
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
            color: #333;
        }
        .input-group {
            position: relative;
            margin-bottom: 20px;
        }
        input {
            width: 100%;
            padding: 10px 40px 10px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            transition: 0.3s ease;
        }
        input:focus {
            border-color: #2193b0;
            outline: none;
        }
        .eye-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            width: 20px;
            height: 20px;
            fill: #888;
            transition: fill 0.2s;
        }
        .eye-icon:hover { fill: #2193b0; }
        button {
            width: 100%;
            padding: 12px;
            background-color: #2193b0;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        button:hover { background-color: #17688a; }
        #message {
            text-align: center;
            margin-top: 15px;
            font-weight: 500;
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create Account</h2>
        <?php if (!empty($_SESSION['error'])): ?>
            <div style="color:red;">
                <?= $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($_SESSION['success'])): ?>
            <div style="color:green;">
                <?= $_SESSION['success']; unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>
        <form id="registrationForm" method="POST" action="">
            <label for="name">Full Name</label>
            <div class="input-group">
                <input type="text" id="name" name="name" required />
            </div>
            <label for="email">Email Address</label>
            <div class="input-group">
                <input type="email" id="email" name="email" required />
            </div>
            <label for="password">Password</label>
            <div class="input-group">
                <input type="password" id="password" name="password" required />
                <svg class="eye-icon" onclick="togglePassword('password', this)" viewBox="0 0 24 24">
                    <path d="M12 4.5C7 4.5 2.73 8.11 1 12c1.73 3.89 6 7.5 11 7.5s9.27-3.61 11-7.5c-1.73-3.89-6-7.5-11-7.5zm0 13a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11zm0-9a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7z"/>
                </svg>
            </div>
            <button type="submit" name="submit">Register</button>
            <p id="message"></p>
        </form>
    </div>
    <script>
        function togglePassword(fieldId, icon) {
            const field = document.getElementById(fieldId);
            const isPassword = field.type === 'password';
            field.type = isPassword ? 'text' : 'password';
            icon.style.fill = isPassword ? '#2193b0' : '#888';
        }
    </script>
</body>
</html>