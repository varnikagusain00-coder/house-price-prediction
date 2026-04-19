<?php
include 'php/db.php';

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string(trim($_POST['username']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        // Check if username or email already exists
        $check_sql = "SELECT id FROM users WHERE username = '$username' OR email = '$email'";
        $check_result = $conn->query($check_sql);
        if ($check_result && $check_result->num_rows > 0) {
            $error = "Username or email already exists.";
        } else {
            // Hash password and insert new user
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $insert_sql = "INSERT INTO users (username, email, password_hash, created_at) VALUES ('$username', '$email', '$password_hash', NOW())";
            if ($conn->query($insert_sql) === TRUE) {
                $success = "Registration successful. You can now <a href='login.php'>login</a>.";
            } else {
                $error = "Error: " . $conn->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register - House Price Prediction</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<header>
    <h1>House Price Prediction</h1>
    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="register.php" class="active">Register</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
</header>
<main>
    <h2>Register</h2>
    <?php if ($error): ?>
        <p class="error-message"><?php echo $error; ?></p>
    <?php endif; ?>
    <?php if ($success): ?>
        <p class="success-message"><?php echo $success; ?></p>
    <?php endif; ?>
    <form method="post" action="register.php" class="contact-form">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required />
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required />
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required />
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required />
        </div>
        <div class="form-group">
            <input type="submit" value="Register" />
        </div>
    </form>
</main>
<footer>
    <p>&copy; 2024 House Price Prediction. All rights reserved.</p>
</footer>
</body>
</html>
