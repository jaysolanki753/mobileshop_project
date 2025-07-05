<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['login'])) {
    // If not, redirect to login page
    header("Location: login.php");
    exit();
}

// Get user info from session
$user = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #6dd5ed, #2193b0);
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .dashboard {
      background: #ffffff;
      color: #333;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
      text-align: center;
      max-width: 400px;
      width: 100%;
    }

    h2 {
      margin-bottom: 20px;
    }

    a {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      color: #fff;
      background-color: #2193b0;
      border-radius: 6px;
      text-decoration: none;
      transition: background 0.3s;
    }

    a:hover {
      background-color: #17688a;
    }
  </style>
</head>
<body>
  <div class="dashboard">
    <h2>Welcome, <?= htmlspecialchars($login['name']) ?>!</h2>
    <p>Email: <?= htmlspecialchars($login['email']) ?></p>
    <a href="logout.php">Logout</a>
  </div>
</body>
</html>
