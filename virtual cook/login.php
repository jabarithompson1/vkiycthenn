<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('connect.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    
    $sql = "SELECT uid, username, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Verify the password against the hashed password in the database
        if (password_verify($password, $row["password"])) {
            $_SESSION["user_id"] = $row["uid"];
            $_SESSION["username"] = $row["username"];
            header("Location: recipes.php"); // Redirect to Recipes page after login
            exit;
        } else {
            echo "<p style='color: red;'>Invalid password.</p>";
        }
    } else {
        echo "<p style='color: red;'>User not found.</p>";
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Jabari's Kitchen - Login</title>
    <style>
        body {
            background-color: #f7e1c1;
            font-family: 'Arial', sans-serif;
            text-align: center;
        }
        .container {
            margin: auto;
            max-width: 500px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }
        h1 {
            color: #e85d04;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-size: 18px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #e85d04;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #d64000;
        }
        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Jabari's Kitchen 🍳</h1>
        <p>Login and unlock the tastiest recipes!</p>
        <form method="POST" action="login.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Login</button>
        </form>
        <p>Don’t have an account? <a href="register.php" style="color:#e85d04;">Register here!</a></p>
    </div>
    <div class="footer">
        <p>&copy; 2025 Jabari's Kitchen. Bringing flavor to your screen!</p>
    </div>
</body>
</html>
