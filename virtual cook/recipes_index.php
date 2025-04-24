<?php
include('connect.php');

$sql = "SELECT rid, name, description, type, cookingtime FROM recipes";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "<h2><a href='recipe.php?id=" . $row['rid'] . "'>" . $row['name'] . "</a></h2>";
    echo "<p><strong>Type:</strong> " . $row['type'] . "</p>";
    echo "<p><strong>Description:</strong> " . $row['description'] . "</p>";
    echo "<p><strong>Cooking Time:</strong> " . $row['cookingtime'] . " minutes</p>";
    echo "</div>";
}
?>
