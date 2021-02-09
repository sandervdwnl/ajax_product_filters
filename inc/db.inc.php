<?php

/**
 * This file is the PDO database connection
 * 
 * This file is imported in each other file, that queries the database
 */

// DB user info, adjust for your database
$user = 'root';
$pass = 'pass';

// Try and catch to connect to the database
try {
    // Adjust dbname to your own database name and host when necessary
    $pdo = new PDO('mysql:host=localhost;dbname=ajax_product_filters;user', $user, $pass);
} catch (PDOException $e) {
    // Display error message when connection could not be established
    print "Error: " . $e->getMessage() . "<br/>";
    die();
}
