<?php
include 'config.php';

// Cek jika user belum login, redirect ke halaman login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Ambil data user dari database
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
        }
        
        .dashboard-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            text-align: center;
        }
        
        .dashboard-content {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .user-info {
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .btn-logout {
            display: inline-block;
            padding: 10px 20px;
            background: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        
        .btn-logout:hover {
            background: #c82333;
        }
    </style>
</head>
<body>
    <div class="dashboard-header">
        <h1>Dashboard</h1>
    </div>
    
    <div class="dashboard-content">
        <div class="user-info">
            <h2>Selamat datang, <?php echo htmlspecialchars($user['username']); ?>!</h2>
            <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
            <p>Bergabung sejak: <?php echo date('d F Y', strtotime($user['created_at'])); ?></p>
        </div>
        
        <p>Ini adalah halaman dashboard Anda. Anda telah berhasil login.</p>
        
        <br>
        <a href="logout.php" class="btn-logout">Logout</a>
    </div>
</body>
</html>