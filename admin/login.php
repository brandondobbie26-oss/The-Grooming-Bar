<?php include 'auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TGB Admin Login</title>
    <link rel="stylesheet" href="../css/main.css">
    <style>
        body { display: flex; align-items: center; justify-content: center; height: 100vh; background: #0a192f; }
        .login-card { background: white; padding: 2.5rem; border-radius: 12px; width: 100%; max-width: 400px; box-shadow: 0 10px 30px rgba(0,0,0,0.3); }
        .btn-full { width: 100%; border-radius: 6px; margin-top: 1rem; }
        .error-msg { color: red; font-size: 0.9rem; margin-bottom: 1rem; text-align: center; }
    </style>
</head>
<body>

<div class="login-card">
    <div style="text-align: center; margin-bottom: 1.5rem;">
        <h2 style="color: var(--color-primary);">Manager Login</h2>
        <p style="color: var(--color-text-light);">The Grooming Barbershop</p>
    </div>

    <?php if(isset($error)): ?>
        <div class="error-msg"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" required autofocus>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit" name="login" class="btn btn-primary btn-full">Login to Dashboard</button>
    </form>
</div>

</body>
</html>
