<?php
session_start();
require_once "connection.php";

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $pwd = trim($_POST['password']);

    $sql = $db->prepare("SELECT * FROM login WHERE email = ?");
    $sql->execute([$email]);
    $login = $sql->fetch();

    if ($login && password_verify($pwd, $login['password'])) {
        $_SESSION['login'] = [
            'id' => $login['id'],
            'name' => $login['name'],
            'email' => $login['email']
        ];
        header("Location: dashboard.php");
        exit();
    } else {
        $_SESSION['error'] = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Page</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: #f0f2f5;
      margin: 0;
    }

    .login-container {
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      width: 100%;
      max-width: 400px;
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 15px;
      position: relative;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: 600;
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px 40px 10px 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      outline: none;
    }

    input[type="email"]:focus,
    input[type="password"]:focus {
      border-color: #007bff;
    }

    .btn {
      width: 100%;
      background: #007bff;
      color: white;
      border: none;
      padding: 12px;
      border-radius: 8px;
      cursor: pointer;
      font-size: 16px;
    }

    .btn:hover {
      background: #0056b3;
    }

    .error {
      color: red;
      font-size: 14px;
      margin-top: -10px;
      margin-bottom: 10px;
    }

    .toggle-eye {
      position: absolute;
      top: 38px;
      right: 10px;
      cursor: pointer;
      font-size: 18px;
      user-select: none;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <form id="loginForm" method="post">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required />
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required />
        <span class="toggle-eye" id="togglePassword">👁️</span>
      </div>

      <?php if (isset($_SESSION['error'])): ?>
        <p class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
      <?php endif; ?>

      <button type="submit" class="btn" name="login">Login</button>
    </form>
  </div>

  <script>
    const togglePassword = document.getElementById("togglePassword");
    const passwordInput = document.getElementById("password");

    togglePassword.addEventListener("click", function () {
      const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
      passwordInput.setAttribute("type", type);
      this.textContent = type === "password" ? "👁️" : "🙈";
    });
  </script>
</body>
</html>
