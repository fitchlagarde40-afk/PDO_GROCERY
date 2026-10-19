<?php
require_once "dbconfig.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sql = "SELECT item_id FROM grocery_items
            WHERE product_name = :product
            AND brand_name = :brand
            ORDER BY item_id DESC
            LIMIT 1";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        "product" => "Mini Goldbears",
        "brand" => "Haribo"
    ]);

    $item = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($item) {
        $delete = $pdo->prepare("DELETE FROM grocery_items WHERE item_id = :item_id");
        $delete->execute([
            "item_id" => $item["item_id"]
        ]);
        $message = "Record deleted successfully!";
    } else {
        $message = "Record not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Grocery Item</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="shop-title">Ghibli Grocery Store</div>
    <div class="shop-subtitle">Delete Grocery Item</div>

    <form method="POST">
        <button type="submit">Delete Record</button>
    </form>

    <p class="message"><?php echo $message; ?></p>

    <div class="nav-links">
        <a href="index.php" class="button">Back to Home</a>
    </div>
</div>

</body>
</html>