<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "enrollment_system";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection Failed: " . $connection->connect_error);
}

// Check if 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record with the specified 'id'
    $deleteSql = "DELETE FROM registration WHERE id=$id";

    if ($connection->query($deleteSql) === TRUE) {
        // Redirect back to the original page after deleting
        header("Location: students.php");
        exit();
    } else {
        die("Error deleting record: " . $connection->error);
    }
} else {
    die("Invalid request. 'id' parameter is missing.");
}

$connection->close();
?>