# House Price Prediction Website

## Overview
This is a simple house price prediction website built using HTML, CSS, PHP, JavaScript, and MySQL database. It includes 7 pages:
- Home (index.html)
- About (about.html)
- Predict Price (prediction.php)
- Data (data.html)
- Contact (contact.php)
- FAQ (faq.html)

## Features
- Predict house price based on user input features.
- Save prediction data and contact messages to MySQL database.
- Display sample data and charts using Chart.js.

## Setup Instructions

1. Install XAMPP and start Apache and MySQL servers.

2. Create the database and tables:

```sql
CREATE DATABASE house_price_prediction;

USE house_price_prediction;

CREATE TABLE predictions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    bedrooms INT NOT NULL,
    bathrooms INT NOT NULL,
    sqft INT NOT NULL,
    location VARCHAR(255) NOT NULL,
    predicted_price FLOAT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

3. Place the project folder `house-price-prediction` inside the `htdocs` directory of XAMPP.

4. Access the website in your browser at `http://localhost/house-price-prediction/index.html`.

## Notes
- The prediction formula is a simple demo and not based on real machine learning.
- Customize and extend the project as needed.

## License
This project is for demonstration purposes.
