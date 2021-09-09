<?php

$host = 'localhost';
$db = 'netmatters_db';
$user = 'root';
$password = 'test1234';

try {
    $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
    $pdo = new PDO($dsn, $user, $password);

    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}




