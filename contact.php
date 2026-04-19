<?php
include 'php/db.php';

$error = null;
$success = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";
    if ($conn->query($sql) === TRUE) {
        $success = "Thank you for contacting us. We will get back to you soon.";
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Contact Us - House Price Prediction</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<header>
    <h1>House Price Prediction</h1>
    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="prediction.php">Predict Price</a></li>
            <li><a href="data.html">Data</a></li>
            <li><a href="contact.php" class="active">Contact</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="profile.php">Profile</a></li>
        </ul>
    </nav>
</header>
<main>
    <h2>Contact Us</h2>
    <?php if ($error): ?>
        <p class="error-message"><?php echo $error; ?></p>
    <?php endif; ?>
    <?php if ($success): ?>
        <p class="success-message"><?php echo $success; ?></p>
    <?php endif; ?>
    <div class="contact-container">
        <form method="post" action="contact.php" class="contact-form">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required />
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required />
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Send" />
            </div>
        </form>
    </div>
</main>
<footer>
    <p>&copy; 2024 House Price Prediction. All rights reserved.</p>
</footer>
</body>
</html>
