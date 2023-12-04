<!DOCTYPE html>
    <html>
        <head> 
            <meta charset="UTF-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name=" viewport" content="width=device-width,initial-scale=1.0">
            <link rel="stylesheet" href="Formstyle.css">
        <title>Assessment Form</title>

        <script>
        function confirmLogout() {
            var result = confirm("Are you sure you want to logout?");
            if (result) {
                window.location.href = "HOME.html";
            }
        }
        </script>

        <body>
            <img src="FI Logo.png" class="logo">
            <h1 class="reg-form">LORD IMMANUEL INSTITUTE <br> FOUNDATION INC.</h1>

            <div class="form_container">
                <div class="reg_container">
                <h3>REGISTRATION/ ASSESSMENT FORM</h3>
                <button class="printbutton"onclick="window.print()">Print<img src="print.png"></button>             
            </div>
                
            <div class="container">
                <h3>SENIOR HIGH SCHOOL</h3>
            </div>
            
    <?php
    $conn = new mysqli('localhost', 'root', '', 'enrollment_system');
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    }
    $result = $conn->query("SELECT * FROM registration ORDER BY id DESC LIMIT 1");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
                echo '<p>School Year: ' . $row['sy'] . '</p>';
                echo '<p>Student Name: ' . $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ' . $row['sname'] . '</p>';                
                echo '<p>Track/Strand: ' . $row['course'] . '</p>';
                echo '<p>Year Level: ' . $row['year'] . '</p>'; 
                
            } else {
                echo 'No records found in the database.';
            }
            $conn->close();
        
    ?>
            
            <img src="Reg Form.PNG">
            <button id="logoutbutton" class="logoutbutton" onclick="confirmLogout()">Logout</button>

            

        </div>
        </div>
                
        </body>
        </html>