<?php
include('connect.php');

$search = "%" . $_POST['search'] . "%";
$sql = "SELECT * FROM recipes WHERE name LIKE ? OR type LIKE ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $search, $search);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo "<div><h2>" . $row['name'] . "</h2><p>" . $row['description'] . "</p></div>";
}
?>
