<!-- Assignment-11 – COSC 2328 – Professor McCurry -->
<!-- Implemented by - Analee Maharaj  -->
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "testingPass@123";
$db = "foodtruck_customers";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Retrieve the raw input stream
    $inputData = file_get_contents("php://input");

    // Decode JSON data
    $requestData = json_decode($inputData, true);

    if (isset($requestData['action'])) {
        $action = $requestData['action'];

        switch ($action) {
            case 'checkPhoneNumber':
                checkPhoneNumber($requestData);
                break;
            case 'submitOrder':
                submitOrder($requestData);
                break;
            default:
                break;
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

function checkPhoneNumber($requestData) {
    global $conn;

    // Retrieve the phone number from the request data
    $phoneNumber = $requestData['phoneNumber'];

    // If yes, retrieve customer information and echo it as JSON
    // If no, echo a JSON response indicating that the customer does not exist

    // Example:
    $stmt = $conn->prepare("SELECT * FROM customers WHERE phone_number = ?");
    $stmt->execute([$phoneNumber]);
    $customerData = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($customerData) {
        // Customer exists
        echo json_encode(['customerExists' => true, 'customerInfo' => $customerData]);
    } else {
        // Customer does not exist
        echo json_encode(['customerExists' => false]);
    }
}

function submitOrder($requestData) {
    global $conn;

    // Retrieve data from the request
    $phoneNumber = $requestData['phoneNumber'];
    $name = $requestData['name'];
    $address = $requestData['address'];
    $orderDetails = $requestData['orderDetails']; // This should contain the order details

    // Insert or update customer information using prepared statement
    $stmt = $conn->prepare("INSERT INTO customers (phone_number, name, address) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE name = VALUES(name), address = VALUES(address)");
    $stmt->execute([$phoneNumber, $name, $address]);

    // Insert order details
    // You need to adapt this based on your actual database schema for orders
    $stmt = $conn->prepare("INSERT INTO orders (phone_number, order_details) VALUES (?, ?)");
    $stmt->execute([$phoneNumber, json_encode($orderDetails)]);

    // Echo a success message or any necessary response
    echo json_encode(['success' => true]);
}
?>