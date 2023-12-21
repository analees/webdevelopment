<?php
// Create a connection to the DB
$mysqli = new mysqli('127.0.0.1', 'root', 'testingPass@123', 'foodtruckcustomers');

/* The object operator, ->, is used in object scope to access methods and properties of an object.
It’s meaning is to say that what is on the right of the operator is a member of the object instantiated into the variable on the left side of the operator.
Instantiated is the key term here. */
if ($mysqli->connect_error) {
    die('Could not connect: ' . $mysqli->connect_error);
}

// Create the SQL Statement to obtain data
$sql = "SELECT customernumber, full_name, email FROM customerdatas";

// Prepare an SQL statement for execution
$stmt = $mysqli->prepare($sql);

// Execute the SQL Statement
if (!$stmt->execute()) {
    die('Error executing the statement: ' . $stmt->error);
}

// Stores the result
$stmt->store_result();

// Bind variables to a prepared statement for result storage
// Associating variables with placeholders
$stmt->bind_result($customernumber, $full_name, $email);

// Display the results in a table
echo "<table border='1'>";
echo "<tr>";
echo "<th>CustomerNumber</th>";
echo "<th>Full Name</th>";
echo "<th>Email</th>";
echo "</tr>";

// Fetch results from a prepared statement into the bound variables
while ($stmt->fetch()) {
    echo "<tr>";
    echo "<td>" . $customernumber . "</td>";
    echo "<td>" . $full_name . "</td>";
    echo "<td>" . $email . "</td>";
    echo "</tr>";
}

echo "</table>";

// Close a previously opened database connection
$stmt->close();

// Close the database connection
$mysqli->close();
?>
