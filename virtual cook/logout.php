<?php
session_start();
session_destroy(); // End the session and clear all data
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout - Jabari's Kitchen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7e1c1; /* Warm kitchen colors */
            text-align: center;
            padding: 20px;
        }
        .container {
            margin: auto;
            max-width: 400px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }
        h1 {
            color: #e85d04;
        }
        p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            background-color: #e85d04;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #d64000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Logged Out Successfully 🍳</h1>
        <p>Thank you for visiting Jabari's Kitchen! Want to log back in and continue exploring?</p>
        <a href="login.php" class="button">Log Back In</a>
    </div>
</body>
</html>
