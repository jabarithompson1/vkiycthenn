<?php
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST["title"]);
    $ingredients = trim($_POST["ingredients"]);
    $instructions = trim($_POST["instructions"]);
    $user_id = $_SESSION["user_id"];

    // Insert the new recipe
    $sql = "INSERT INTO recipes (user_id, title, ingredients, instructions) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $user_id, $title, $ingredients, $instructions);

    if ($stmt->execute()) {
        echo "Recipe added successfully!";
    } else {
        echo "Error adding recipe.";
    }
    $stmt->close();
}
$conn->close();
?>
