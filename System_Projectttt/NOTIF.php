<!DOCTYPE HTML>
<html lang="en">

    <head>
        <link rel="stylesheet" href="Notif_style.css">

       
        <body>
            <h1 class="notif_center">LORD IMMANUEL INSTITUTE <br> FOUNDATION INC.</h1>
            <div class="Notif_container">

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
                echo '<p>Student Name: ' . $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ' . $row['sname'] . '</p>';                
                echo '<p>Admit Type: ' . $row['admit'] . '</p>';
                echo '<p>Year Level: ' . $row['year'] . '</p>'; 
                
            } else {
                echo 'No records found in the database.';
            }
        
            // Close the database connection
            $conn->close();
        
            ?>
                <br>
                <br>
                <p>All transferee and returnee students, please proceed to the Registrar's Office for evaluation purposes.</p><br>
                <h3>LORD IMMANUEL INSTITUTE FOUNDATION INC.</h3>

                <label class="checkbox" for="myCheckboxId">
                    <input class="checkbox_input" type="checkbox" name="myCheckboxName" id="myCheckboxId">
                    <div class="checkbox-box"></div>
                    &nbsp;
                    Proceed with the Assessment of the Specialization Track and Tuition Fees
                </label>
                <br>
                <br>
                <br>
                
                <button id="next-button">Proceed</button>
                <script src="button.js"></script>
                
                
            </div>
        </body>
    </head>
</html>