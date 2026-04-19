<?php
include 'php/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT username, email, created_at FROM users WHERE id = $user_id";
$result = $conn->query($sql);

if ($result && $result->num_rows == 1) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Profile - House Price Prediction</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
include 'php/db.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<header>
    <h1>House Price Prediction</h1>
    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="prediction.php">Predict Price</a></li>
            <li><a href="data.html">Data</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="profile.php" class="active">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
<main>
    <h2>Your Profile</h2>
    <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
    <p><strong>Member since:</strong> <?php echo $user['created_at']; ?></p>
</main>
<footer>
    <p>&copy; 2024 House Price Prediction. All rights reserved.</p>
</footer>
</body>
</html>
