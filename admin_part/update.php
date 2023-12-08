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

    // Fetch the record to be updated
    $sql = "SELECT * FROM registration WHERE id = $id";
    $result = $connection->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
    } else {
        die("Error fetching record: " . $connection->error);
    }
} else {
    die("Invalid request. 'id' parameter is missing.");
}

// Check if the update form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the submitted form data and update the record
    $newFirstName = $_POST['newFirstName'];
    $newLastName = $_POST['newLastName'];

    $updateSql = "UPDATE registration SET fname='$newFirstName', lname='$newLastName' WHERE id=$id";

    if ($connection->query($updateSql) === TRUE) {
        // Redirect back to the original page after updating
        header("Location: students.php");
        exit();
    } else {
        die("Error updating record: " . $connection->error);
    }
}

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include your head content here -->
</head>
<body>
    
<style>
       
       body {
    background-image: linear-gradient(to right, #3291A1 10%, #004AAD 100%);
}

h1 {
    margin-left: 30px;
    color: #1A5875;
}

form {
    max-width: 600px;
    margin: 40px auto;
}

label {
    display: block;
    margin-top: 10px;
    font-weight: bold;
    color: #1A5875;
}

input {
    width: 100%;
    box-sizing: border-box;
    margin-bottom: 10px;
    padding: 10px;
    background-color: #A5DDE6;
    border: none;
    color: #1A5875;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #3291A1;
    color: #fff;
    border: none;
    border-radius: 20px;
    cursor: pointer;
}

button:hover {
    background-color: #29717D;
}

.container {
    width: 50%;
    max-width: 1100px;
    margin: auto;
    padding: 50px;
    background-color: #fff;
    border-radius: 5px;
}


    </style>
    <div class="container">
    <h1>Update Student Info</h1>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <form method="POST" action="">
    <form class="mt-3" method="POST" action="">
        <label for="newFirstName" class="form-label">New First Name:</label>
        <input type="text" name="newFirstName" value="<?php echo $row['fname']; ?>" class="form-control" required>

        <br>

        <label for="newLastName" class="form-label">New Last Name:</label>
        <input type="text" name="newLastName" value="<?php echo $row['lname']; ?>" class="form-control" required>

        <br>

        <label for="newCourse" class="form-label">New Course:</label>
        <input type="text" name="newCourse" value="<?php echo $row['course']; ?>" class="form-control" required>

        <br>

        <label for="newYear" class="form-label">New Year Level:</label>
        <input type="text" name="newYear" value="<?php echo $row['year']; ?>" class="form-control" required>

        <br>

        <label for="newEmail" class="form-label">New Email Address:</label>
        <input type="email" name="newEmail" value="<?php echo $row['email']; ?>" class="form-control" required>

        <br>

        <label for="newMobile" class="form-label">New Mobile Number:</label>
        <input type="text" name="newMobile" value="<?php echo $row['mobile']; ?>" class="form-control" required>

        <br>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</body>
</html>