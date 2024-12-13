<?php
// dbconfig.php
try {
    $host = 'localhost';
    $dbname = 'assignment3_db'; // Replace with your database name
    $username = 'root'; // Default username for XAMPP
    $password = ''; // Default password for XAMPP (empty)
    
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
