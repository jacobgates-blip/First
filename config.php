<?php
// Database connection.
// Update these four values to match your environment.
$host = 'db';
$db   = 'gearout';
$user = 'root';
$pass = 'example';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false, // use real prepared statements, not PHP-emulated ones
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    // In a real deployment this would log the error rather than display it.
    // For a classroom outcome, failing loudly during development is more useful.
    throw new PDOException($e->getMessage(), (int) $e->getCode());
}

// Needed so borrow.php can show validation errors and re-fill the form
// after save_loan.php redirects back to it (see save_loan.php).
session_start();
