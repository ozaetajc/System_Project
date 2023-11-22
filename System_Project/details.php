<!DOCTYPE html>
<html>
<head>
    <title>Validate Details</title>
    <link rel="stylesheet" type="text/css" href="details_style.css">
    <script src="details_script.js"></script>
</head>
<body>
    <h1 class="header">LORD IMMANUEL INSTITUTION FOUNDATION INC.</h1>
    <div class ="progressbar_container">
    <div class="progressbar">
        <div class="progress" id="progress"></div>
        <div class="progress-step" data-title="Personal Information"></div>
        <div class="progress-step" data-title="Create Username and Password"></div>
        <div class="progress-step progress-step-active" data-title="Validate Details"></div>
        <div class="progress-step" data-title="Finish"></div>
    </div>
</div>
</div>

    <div class="container">

<?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'enrollment_system');
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    }

    // Fetch the latest record from the database
    $result = $conn->query("SELECT * FROM registration ORDER BY id DESC LIMIT 1");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Display School Information
        echo '<details class="info-box" id="schoolDetails">';
        echo '<summary>School Information</summary>';
        echo '<p>Track/Strand: ' . $row['course'] . '</p>';
        echo '<p>Admit Type: ' . $row['admit'] . '</p>';
        echo '<p>School Year: ' . $row['sy'] . '</p>';
        echo '<p>Term: ' . $row['term'] . '</p>';
        echo '</details>';

        // Display Student Information
        echo '<details class="info-box" id="studentDetails">';
        echo '<summary>Student Information</summary>';
        echo '<p>First Name: ' . $row['fname'] . '</p>';
        echo '<p>Middle Name: ' . $row['mname'] . '</p>';
        echo '<p>Last Name: ' . $row['lname'] . '</p>';
        echo '<p>Suffix Name: ' . $row['sname'] . '</p>';
        echo '<p>Gender: ' . $row['gender'] . '</p>';
        echo '<p>Civil Status: ' . $row['status'] . '</p>';
        echo '<p>Nationality: ' . $row['nationality'] . '</p>';
        echo '<p>Religion: ' . $row['religion'] . '</p>';
        echo '<p>Date of Birth: ' . $row['dob'] . '</p>';
        echo '<p>Age: ' . $row['age'] . '</p>';
        echo '<p>Place of Birth: ' . $row['pob'] . '</p>';
        echo '<p>Email Address: ' . $row['email'] . '</p>';
        echo '<p>Home Address: ' . $row['address'] . '</p>';
        echo '<p>Date of Birth: ' . $row['dob'] . '</p>';
        echo '<p>Mobile Number: ' . $row['mobile'] . '</p>';
        echo '</details>';

        //Display Parent/Guardian Information
        echo '<details class="info-box" id="parentDetails">';
        echo '<summary>Parent/Guardian Information</summary>';
        echo '<p>Father Name: ' . $row['father_fname'] . ' ' . $row['father_mname'] . ' ' . $row['father_lname'] . ' ' . $row['father_sname'] . '</p>';
        echo '<p>Contact Number: ' . $row['father_mobile'] . '</p>';
        echo '<p>Mother Name: ' . $row['mother_fname'] . ' ' . $row['mother_mname'] . ' ' . $row['mother_lname'] . ' ' . $row['mother_sname'] . '</p>';
        echo '<p>Contact Number: ' . $row['mother_mobile'] . '</p>';
        echo '<p>Guardian Name: ' . $row['guardian_fname'] . ' ' . $row['guardian_mname'] . ' ' . $row['guardian_lname'] . ' ' . $row['guardian_sname'] . '</p>';
        echo '<p>Contact Number: ' . $row['guardian_mobile'] . '</p>';
        echo '</details>';

        //Display Educational Background
        echo '<details class="info-box" id="eduDetails">';
        echo '<summary>Educational Background</summary>';
        echo '<p>Elementary: ' . $row['elementary'] . '</p>';
        echo '<p>School Address: ' . $row['school_address1'] . '</p>';
        echo '<p>Year Graduated: ' . $row['year_graduated1'] . '</p>';
        echo '<p>Junior High: ' . $row['juniorhigh'] . '</p>';
        echo '<p>School Address: ' . $row['school_address2'] . '</p>';
        echo '<p>Year Graduated: ' . $row['year_graduated2'] . '</p>';
        echo '</details>';
            

    } else {
        echo 'No records found in the database.';
    }

    // Close the database connection
    $conn->close();

    ?>


    <button class="submit-button" onclick="goToNextPage()">Next</button>

</html>
