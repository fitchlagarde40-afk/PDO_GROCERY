<?php
require_once "dbconfig.php";

$sql = "SELECT * FROM grocery_items ORDER BY brand_name, product_name, store_branch";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ghibli Grocery Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="shop-title">Ghibli Grocery Store</div>
    <div class="shop-subtitle">A cozy little grocery inventory from Germany</div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Price (€)</th>
                <th>Quantity</th>
                <th>Store Branch</th>
                <th>Country</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= $item["item_id"] ?></td>
                    <td><?= htmlspecialchars($item["product_name"]) ?></td>
                    <td><?= htmlspecialchars($item["brand_name"]) ?></td>
                    <td><?= htmlspecialchars($item["category"]) ?></td>
                    <td><?= number_format($item["price"], 2) ?></td>
                    <td><?= $item["quantity"] ?></td>
                    <td><?= htmlspecialchars($item["store_branch"]) ?></td>
                    <td><?= htmlspecialchars($item["country_origin"]) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="nav-links">
        <a href="index.php" class="button">Back to Home</a>
    </div>
</div>

</body>
</html>