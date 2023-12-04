<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Students</title>

    <style>

@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

     body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
    }


    .case {
    width: 100%;
    max-width: 1100px;
    min-height: 50px;
    margin: auto;
    padding: 30px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}

    .course-box {
        width: 180px;
        height:170px;
        margin: 10px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #41B8D5;
        color:#1A5875;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    

    .refresh-button button {
        background-color: #1A5875;
        color: #fff;
        font-size:18px;
        width: 999px; /* Adjust the width as needed */
        margin-top: 25px;
        padding: 15px;
        border-radius:7px;
        margin-left: 220px;
        border: none;
        cursor:pointer;
}

    .refresh-button button:hover {
        background-color: #3291A1;
    }
    p {
        font-size: 24px;
        color: #1A5875;
}

</style>

<body>




<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "enrollment_system";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$tableName = "registration";

// Count the total number of students for each course and the overall total
$sql = "SELECT course, COUNT(*) as total_students, logo_path FROM registration GROUP BY course WITH ROLLUP";
$result = $connection->query($sql);

if ($result) {
    ?>
    <div class="case">
        <?php
        $totalStudentsLogoPath = '/admin_part/logos/students.png'; // Set default logo path for total students

        while ($row = $result->fetch_assoc()) {
            $course = isset($row['course']) ? $row['course'] : 'Total Students';
            $totalStudents = $row['total_students'];
            $logoPath = isset($row['logo_path']) ? $row['logo_path'] : $totalStudentsLogoPath;

            // Display the "Total Students" row separately
            if ($course == 'Total Students') {
                ?>
                <div class="course-box">
                    <img src="<?= "/admin_part/logos/students.png" ?>" alt="Total Students Logo" class="course-logo">
                    <h3>Total Students</h3>
                    <p><?= $totalStudents ?></p>
                </div>
                <?php
            } else {
                ?>
                <div class="course-box">
                    <img src="<?= $logoPath ?>" alt="<?= $course ?> Logo" class="course-logo">
                    <h3><?= $course ?></h3>
                    <p><?= $totalStudents ?></p>
                </div>
                <?php

                // Update the logo path only if the current row is not "Total Students"
                $totalStudentsLogoPath = $logoPath;
            }
        }
        ?>
        
        <div class="course-box">
            <img src="/admin_part/logos/subjects.png" alt="Total Subjects Logo" class="course-logo">
            <h3>Total Subjects</h3>
            <p>50</p>
        </div>
    </div>
    </div>
        
    

        <div class="refresh-button">
        <form method="post" action="">
            <button type="submit" name="refresh">Refresh</i></button>
        </form>
    </div>

    <?php
    
    

    $result->free_result();
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

$connection->close();
?>
<script>
    function refreshPage() {
        location.reload(true); // Reload the page
    }
</script>