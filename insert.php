<?php
require_once "dbconfig.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sql = "INSERT INTO grocery_items
            (product_name, brand_name, category, price, quantity, store_branch, country_origin)
            VALUES
            (:product, :brand, :category, :price, :quantity, :branch, :country)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        "product" => "Mini Goldbears",
        "brand" => "Haribo",
        "category" => "Candy",
        "price" => 1.50,
        "quantity" => 30,
        "branch" => "Berlin",
        "country" => "Germany"
    ]);

    $message = "New record inserted successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert Grocery Item</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="shop-title">Ghibli Grocery Store</div>
    <div class="shop-subtitle">Insert Grocery Item</div>

    <form method="POST">
        <button type="submit">Insert Record</button>
    </form>

    <p class="message"><?php echo $message; ?></p>

    <div class="nav-links">
        <a href="index.php" class="button">Back to Home</a>
    </div>
</div>

</body>
</html>