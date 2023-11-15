<?php
session_start();

// Check if there's an error message in the session
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';

// Clear the error message
unset($_SESSION['error']);

// Example authentication (replace this with your authentication logic)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        if ($_POST['email'] === 'admin@gmail.com' && $_POST['password'] === '1234') {
            $_SESSION['admin'] = true; // Set the admin session
            header("Location: admin_dashboard.php"); // Redirect to admin dashboard
            exit;
        } else {
            $_SESSION['error'] = 'Incorrect email or password. Please try again.';
            header("Location: login.php"); // Redirect back to login page to display the error message
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Style for the login form */
        .login-form {
            max-width: 300px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 8px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }
        .form-group button {
            padding: 8px 12px;
            border: none;
            border-radius: 3px;
            background-color: #009688;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form class="login-form" action="" method="POST">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
        <?php if(isset($error)) { ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php } ?>
    </form>
</body>
</html>
