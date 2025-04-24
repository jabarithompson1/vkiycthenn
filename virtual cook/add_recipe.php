<?php
// Enable error reporting for debugging purposes
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start session to ensure user authentication
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include the database connection file
include('connect.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $title = trim($_POST["title"]);
    $ingredients = trim($_POST["ingredients"]);
    $instructions = trim($_POST["instructions"]);
    $user_id = $_SESSION["user_id"] ?? null; // Check if user_id exists in the session

    // Handle cases where user_id is missing
    if (!$user_id) {
        echo "<p style='color: red;'>You must be logged in to add a recipe.</p>";
        exit;
    }

    // Check if the form fields are empty
    if (empty($title) || empty($ingredients) || empty($instructions)) {
        echo "<p style='color: red;'>All fields are required to add a recipe.</p>";
        exit;
    }

    // Prepare SQL query to insert the recipe
    $sql = "INSERT INTO recipes (user_id, title, ingredients, instructions) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("isss", $user_id, $title, $ingredients, $instructions);

        // Execute the query and handle success or failure
        if ($stmt->execute()) {
            echo "<p style='color: green;'>Recipe added successfully!</p>";
        } else {
            echo "<p style='color: red;'>Error adding recipe: " . $stmt->error . "</p>";
        }

        $stmt->close();
    } else {
        echo "<p style='color: red;'>Error preparing query: " . $conn->error . "</p>";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Recipe - Virtual Cook</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe5b4;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        form {
            display: inline-block;
            margin-top: 50px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        input, textarea {
            display: block;
            margin: 10px auto;
            padding: 10px;
            width: 80%;
            max-width: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #ff6f61;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #e85d04;
        }
    </style>
</head>
<body>
    <h1>Add a Recipe</h1>
    <form method="POST" action="add_recipe.php">
        <label for="title">Recipe Title:</label>
        <input type="text" id="title" name="title" placeholder="Enter recipe title" required>
        
        <label for="ingredients">Ingredients:</label>
        <textarea id="ingredients" name="ingredients" rows="5" placeholder="Enter ingredients" required></textarea>
        
        <label for="instructions">Instructions:</label>
        <textarea id="instructions" name="instructions" rows="5" placeholder="Enter instructions" required></textarea>
        
        <button type="submit">Add Recipe</button>
    </form>
</body>
</html>
