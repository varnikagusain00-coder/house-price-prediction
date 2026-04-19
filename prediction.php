<?php
include 'php/db.php';

$predicted_price = null;
$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Collect updated form data
    $bedrooms = intval($_POST['bedrooms']);
    $bathrooms = intval($_POST['bathrooms']);
    $area_sqft = intval($_POST['area_sqft']);
    $stories = intval($_POST['stories']);
    $parking = intval($_POST['parking']);
    $airconditioning = $conn->real_escape_string($_POST['airconditioning']);
    $furnishingstatus = $conn->real_escape_string($_POST['furnishingstatus']);

    // 2. Updated Prediction Logic 
    // We adjust the multipliers to be more realistic based on your CSV data
    $base_price = 1000000; 
    $calc_area = $area_sqft * 600;
    $calc_rooms = ($bedrooms * 50000) + ($bathrooms * 100000);
    $calc_ac = ($airconditioning == 'yes') ? 200000 : 0;
    $calc_parking = $parking * 50000;

    $predicted_price = $base_price + $calc_area + $calc_rooms + $calc_ac + $calc_parking;

    // 3. Save to database using the NEW column names
    $sql = "INSERT INTO predictions (bedrooms, bathrooms, area_sqft, stories, airconditioning, parking, furnishingstatus, price) 
            VALUES ($bedrooms, $bathrooms, $area_sqft, $stories, '$airconditioning', $parking, '$furnishingstatus', $predicted_price)";
    
    if (!$conn->query($sql)) {
        $error = "Error saving prediction: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Predict House Price</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<header>
    <h1>House Price Prediction</h1>
    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="prediction.php" class="active">Predict Price</a></li>
            <li><a href="data.html">Data</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="profile.php">Profile</a></li>
        </ul>
    </nav>
</header>
<main>
    <h2>Enter House Details</h2>
    <?php if ($error): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="post" action="prediction.php">
        <label for="area_sqft">Square Footage (Area):</label>
        <input type="number" id="area_sqft" name="area_sqft" placeholder="e.g. 5000" required /><br />

        <label for="bedrooms">Bedrooms:</label>
        <input type="number" id="bedrooms" name="bedrooms" min="1" max="10" required /><br />

        <label for="bathrooms">Bathrooms:</label>
        <input type="number" id="bathrooms" name="bathrooms" min="1" max="5" required /><br />

        <label for="stories">Stories/Floors:</label>
        <input type="number" id="stories" name="stories" min="1" max="4" required /><br />

        <label for="parking">Parking Spaces:</label>
        <input type="number" id="parking" name="parking" min="0" max="3" required /><br />

        <label for="airconditioning">Air Conditioning:</label>
        <select name="airconditioning" id="airconditioning">
            <option value="no">No</option>
            <option value="yes">Yes</option>
        </select><br />

        <label for="furnishingstatus">Furnishing Status:</label>
        <select name="furnishingstatus" id="furnishingstatus">
            <option value="unfurnished">Unfurnished</option>
            <option value="semi-furnished">Semi-Furnished</option>
            <option value="furnished">Furnished</option>
        </select><br />

        <input type="submit" value="Calculate Price" />
    </form>

    <?php if ($predicted_price !== null): ?>
        <div class="result-box">
            <h3>Estimated Market Value:</h3>
            <h2 style="color: green;">₹<?php echo number_format($predicted_price); ?></h2>
        </div>
    <?php endif; ?>
</main>
<footer>
    <p>&copy; 2026 House Price Prediction Project. All rights reserved.</p>
</footer>
</body>
</html>