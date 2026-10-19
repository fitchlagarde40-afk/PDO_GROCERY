<?php
require_once "dbconfig.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sql = "UPDATE grocery_items
            SET price = :price, quantity = :quantity
            WHERE item_id = :item_id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        "price" => 3.50,
        "quantity" => 80,
        "item_id" => 1
    ]);

    $message = "Record updated successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Grocery Item</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="shop-title">Ghibli Grocery Store</div>
    <div class="shop-subtitle">Update Grocery Item</div>

    <form method="POST">
        <button type="submit">Update Record</button>
    </form>

    <p class="message"><?php echo $message; ?></p>

    <div class="nav-links">
        <a href="index.php" class="button">Back to Home</a>
    </div>
</div>

</body>
</html>