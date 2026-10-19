
-- PDO METHODS ACTIVITY
-- Country: Germany
-- Create the database
CREATE DATABASE IF NOT EXISTS germany_grocery_db;
USE germany_grocery_db;

-- Create the grocery items table
CREATE TABLE IF NOT EXISTS grocery_items (
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(150) NOT NULL,
    brand_name VARCHAR(100) NOT NULL,
    category VARCHAR(50) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    quantity INT NOT NULL,
    store_branch VARCHAR(50) NOT NULL,
    country_origin VARCHAR(50) NOT NULL
);

-- Add 100 grocery inventory records
-- 20 actual German-branded products x 5 example branches
INSERT INTO grocery_items
(product_name, brand_name, category, price,
 quantity, store_branch, country_origin)
SELECT
    products.product_name,
    products.brand_name,
    products.category,
    products.price + branches.price_adjustment,
    products.quantity + branches.stock_adjustment,
    branches.store_branch,
    'Germany'
FROM (
    SELECT 'Alpine Milk Chocolate' AS product_name,
           'Ritter Sport' AS brand_name,
           'Chocolate' AS category,
           2.50 AS price, 50 AS quantity
    UNION ALL SELECT 'Whole Hazelnuts Chocolate',
           'Ritter Sport','Chocolate',3.20,40
    UNION ALL SELECT 'Marzipan Chocolate',
           'Ritter Sport','Chocolate',2.80,45
    UNION ALL SELECT 'White Whole Hazelnuts',
           'Ritter Sport','Chocolate',3.30,35

    UNION ALL SELECT 'Goldbears',
           'Haribo','Candy',1.80,70
    UNION ALL SELECT 'Happy Cola',
           'Haribo','Candy',1.90,65
    UNION ALL SELECT 'Starmix',
           'Haribo','Candy',2.10,55
    UNION ALL SELECT 'Tropifrutti',
           'Haribo','Candy',2.00,60

    UNION ALL SELECT 'Leibniz Butterkeks',
           'Bahlsen','Biscuits',2.40,40
    UNION ALL SELECT 'Choco Leibniz Milk',
           'Bahlsen','Biscuits',2.90,35
    UNION ALL SELECT 'Pick Up Choco',
           'Bahlsen','Biscuits',2.60,50
    UNION ALL SELECT 'Zoo Original',
           'Bahlsen','Biscuits',2.20,45

    UNION ALL SELECT 'Ristorante Pizza Mozzarella',
           'Dr. Oetker','Frozen Food',4.50,25
    UNION ALL SELECT 'Ristorante Pizza Salame',
           'Dr. Oetker','Frozen Food',4.80,20
    UNION ALL SELECT 'Vitalis Crunchy Muesli',
           'Dr. Oetker','Breakfast',3.80,30
    UNION ALL SELECT 'Original Pudding Vanilla',
           'Dr. Oetker','Dessert',1.70,40

    UNION ALL SELECT 'Camomile Tea',
           'Teekanne','Beverages',2.30,60
    UNION ALL SELECT 'Peppermint Tea',
           'Teekanne','Beverages',2.40,55
    UNION ALL SELECT 'Fruit Kiss Tea',
           'Teekanne','Beverages',2.80,45
    UNION ALL SELECT 'Green Tea',
           'Teekanne','Beverages',2.50,50
) AS products
CROSS JOIN (
    SELECT 'Berlin' AS store_branch,
           0.00 AS price_adjustment,
           0 AS stock_adjustment
    UNION ALL SELECT 'Munich',0.20,5
    UNION ALL SELECT 'Hamburg',0.10,10
    UNION ALL SELECT 'Frankfurt',0.15,15
    UNION ALL SELECT 'Cologne',0.05,20
) AS branches;

-- Check the number of records
SELECT COUNT(*) AS total_records
FROM grocery_items;

-- Display all grocery items
SELECT * FROM grocery_items;
