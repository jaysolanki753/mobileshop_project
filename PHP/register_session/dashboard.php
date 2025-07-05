<?php
// Optional: Start session (for future login-based dashboards)
session_start();

// Check if user is logged in
 if (!isset($_SESSION['login'])) {
     header("Location: login.php");
     exit();
}

$user=$_SESSION['login'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <style>
    :root {
      --bg-color: #f5f5f5;
      --text-color: #333;
      --sidebar-color: #2c3e50;
      --sidebar-text: #ecf0f1;
      --primary-color: #3498db;
    }

    body.dark {
      --bg-color: #181818;
      --text-color: #f5f5f5;
      --sidebar-color: #1c1c1c;
      --sidebar-text: #ffffff;
      --primary-color: #2980b9;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Segoe UI", sans-serif;
    }

    body {
      background-color: var(--bg-color);
      color: var(--text-color);
      display: flex;
    }

    .sidebar {
      width: 240px;
      height: 100vh;
      background: var(--sidebar-color);
      color: var(--sidebar-text);
      padding: 20px;
      position: fixed;
      left: 0;
      top: 0;
    }

    .sidebar h2 {
      margin-bottom: 30px;
      font-size: 24px;
    }

    .sidebar a {
      display: block;
      margin: 15px 0;
      text-decoration: none;
      color: var(--sidebar-text);
      font-size: 18px;
    }

    .sidebar a:hover {
      color: var(--primary-color);
    }

    .main {
      margin-left: 240px;
      padding: 20px;
      width: 100%;
    }

    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .topbar h1 {
      font-size: 24px;
    }

    .toggle-mode {
      cursor: pointer;
      font-size: 20px;
      background: var(--primary-color);
      border: none;
      padding: 8px 12px;
      border-radius: 5px;
      color: white;
    }

    .cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      margin-top: 30px;
    }

    .card {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    body.dark .card {
      background: #2a2a2a;
    }

    @media (max-width: 768px) {
      .sidebar {
        width: 180px;
      }

      .main {
        margin-left: 180px;
      }
    }

    @media (max-width: 576px) {
      .sidebar {
        display: none;
      }

      .main {
        margin-left: 0;
      }
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <h2>My Dashboard</h2>
    <a href="#"><i class="fas fa-home"></i> Home</a>
    <a href="#"><i class="fas fa-user"></i> Profile</a>
    <a href="#"><i class="fas fa-cog"></i> Settings</a>
    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
  </div>

  <div class="main">
      <h1>Welcome, <?=htmlspecialchars($user['name'])?>!</h1>
      <p>Email: <?=htmlspecialchars($user['email'])?></p>
      <button class="toggle-mode" onclick="toggleMode()">Toggle Mode</button>
    </div>

  <script>
    function toggleMode() {
      document.body.classList.toggle('dark');
    }
  </script>

</body>
</html>
