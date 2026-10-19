<?php
require_once "dbconfig.php";

$sql = "SELECT * FROM grocery_items";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fetch All Records</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="shop-title">Ghibli Grocery Store</div>
    <div class="shop-subtitle">Fetch All Records</div>

    <pre><?php print_r($items); ?></pre>

    <div class="nav-links">
        <a href="index.php" class="button">Back to Home</a>
    </div>
</div>

</body>
</html>