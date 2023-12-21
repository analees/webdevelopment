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
$sql = "SELECT customernumber, full_name, email
        FROM customerdatas WHERE customernumber = ?";

// Prepare an SQL statement for execution
$stmt = $mysqli->prepare($sql);

// Bind variable to a prepared statement as parameters "s" is string
$stmt->bind_param("s", $_GET['q']);

// Execute the SQL Statement
if (!$stmt->execute()) {
    die('Error executing the statement: ' . $stmt->error);
}

// Stores the result
$stmt->store_result();

// Bind variables to a prepared statement for result storage
// Associating variables with placeholders
$stmt->bind_result($customernumber, $full_name, $email);

// Fetch results from a prepared statement into the bound variables
$stmt->fetch();

// Close a previously opened database connection
$stmt->close();

// Display the results in a table
echo "<table>";
echo "<tr>";
echo "<th>CustomerNumber</th>";
echo "<td>" . $customernumber . "</td>";
echo "</tr>";
echo "<tr>";
echo "<th>FullName</th>";
echo "<td>" . $full_name . "</td>";
echo "</tr>";
echo "<tr>";
echo "<th>Email</th>";
echo "<td>" . $email . "</td>";
echo "</tr>";
echo "</table>";

// Close the database connection
$mysqli->close();
?>
