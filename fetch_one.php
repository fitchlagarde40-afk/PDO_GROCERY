<?php
require_once "dbconfig.php";

$sql = "SELECT * FROM grocery_items WHERE item_id = :item_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(["item_id" => 1]);
$item = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fetch One Record</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="shop-title">Ghibli Grocery Store</div>
    <div class="shop-subtitle">Fetch One Record</div>

    <pre><?php print_r($item); ?></pre>

    <div class="nav-links">
        <a href="index.php" class="button">Back to Home</a>
    </div>
</div>

</body>
</html>