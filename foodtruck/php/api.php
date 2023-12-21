<?php

// Set CORS headers to allow requests from localhost
header("Access-Control-Allow-Origin: localhost");
header("Content-Type: application/json; charset=UTF-8");

// Include configuration file
require_once('php/config.inc.php');

// Get phone number from the request parameters
$phoneNumber = $_GET['phone'] ?? '';

try {
    // Establish a PDO connection to the database
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare and execute a SQL query to retrieve user information based on phone number
    $stmt = $pdo->prepare("SELECT * FROM customerdatas WHERE customernumber = ?");
    $stmt->execute([$phoneNumber]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the user was found
    if ($user) {
        // User found, return JSON response with success and user information
        echo json_encode([
            'success' => true,
            'name' => $user['full_name'],
            'email' => $user['email'],
        ]);
    } else {
        // User not found, return JSON response with failure message
        echo json_encode(['success' => false, 'message' => 'User not found']);
    }

} catch (PDOException $e) {
    // Handle database errors and return JSON response with error message
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
