<?php
session_start();
require_once "connection.php";

if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $pwd = password_hash($_POST['password'],PASSWORD_BCRYPT);

    // Check if email already exists
    $sql = $db->prepare("SELECT id FROM login WHERE email = ?");
    $sql->execute([$email]);

    if ($sql->rowCount() > 0) {
        $_SESSION['error'] = "You have already registered.";
    } else {
        $insert = $db->prepare("INSERT INTO login (name, email, password) VALUES (?, ?, ?)");
        if ($insert->execute([$name, $email, $pwd])) {
            $_SESSION['success'] = "Registered successfully.";
            header("Location:login.php");
            exit();
        } else {
            $_SESSION['error'] = "Something went wrong during registration.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registration Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f6f8;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .form-container {
      background-color: #fff;
      padding: 25px 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 300px;
    }
    .form-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    input {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    button {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      margin-top: 10px;
      cursor: pointer;
    }
    button:hover {
      background-color: #0056b3;
    }
    .message {
      text-align: center;
      margin-top: 10px;
      color: red;
    }
    .message.success {
      color: green;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Register</h2>
    
    <?php if (isset($_SESSION['error'])): ?>
      <div class="message"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
      <div class="message success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php endif; ?>

    <form method="POST">
      <input type="text" name="name" placeholder="Full Name" required />
      <input type="email" name="email" placeholder="Email" required />
      <input type="password" name="password" placeholder="Password" required minlength="6" />
      <button type="submit" name="submit">Register</button>
    </form>
  </div>
</body>
</html>
