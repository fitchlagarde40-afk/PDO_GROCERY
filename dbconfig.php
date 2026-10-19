
<?php
// Database connection settings
$host = "localhost";
$dbname = "germany_grocery_db";
$username = "root";
$password = "";

// Connect to the database using PDO
try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    // Enable exception handling for SQL errors
    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    // Fetch query results as associative arrays
    $pdo->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC
    );

} catch (PDOException $e) {
    // Stop execution when the connection fails
    die("Database connection failed: " . $e->getMessage());
}
?>
