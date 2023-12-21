<!-- Assignment-11 – COSC 2328 – Professor McCurry -->
<!-- Implemented by - Analee Maharaj -->
<?php
try {
    // Create a connection to the DB
    require_once('config.inc.php');
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the 'phone' parameter is set in the POST request
    if (isset($_POST['phone'])) {
        // Use prepared statement to prevent SQL injection
        $phone = $_POST['phone'];
        $stmt = $pdo->prepare("SELECT * FROM customerdatas WHERE customer_phone = :phone");
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->execute();

        // Fetch the results
        $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Output the results
        echo "Testing<br>";
        foreach ($customers as $customer) {
            echo "Customer Phone: " . $customer['customer_phone'] . "<br>";
            echo "Customer Name: " . $customer['full_name'] . "<br>";
            echo "Customer Email: " . $customer['email'] . "<br>";
        }
    }

    // Close the database connection
    $pdo = null;
} catch (PDOException $e) {
    die($e->getMessage());
}
?>
