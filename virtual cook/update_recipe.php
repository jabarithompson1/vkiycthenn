<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php"); // Redirects to login if not logged in
    exit;
}
include('connect.php');

// Get recipe details
$recipe_id = $_GET["id"]; // Pass recipe ID via GET parameter
$sql = "SELECT * FROM recipes WHERE recipe_id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $recipe_id, $_SESSION["user_id"]);
$stmt->execute();
$result = $stmt->get_result();
$recipe = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Recipe - Jabari's Kitchen</title>
</head>
<body>
    <form method="POST" action="update_recipe.php?id=<?php echo $recipe_id; ?>">
        <label for="title">Recipe Title:</label>
        <input type="text" id="title" name="title" value="<?php echo $recipe['title']; ?>" required>
        
        <label for="ingredients">Ingredients:</label>
        <textarea id="ingredients" name="ingredients" rows="5" required><?php echo $recipe['ingredients']; ?></textarea>
        
        <label for="instructions">Instructions:</label>
        <textarea id="instructions" name="instructions" rows="5" required><?php echo $recipe['instructions']; ?></textarea>
        
        <input type="submit" value="Update Recipe">
    </form>
</body>
</html>
