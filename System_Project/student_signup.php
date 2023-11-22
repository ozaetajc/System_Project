<?php
session_start();

    include("login_connection.php");
    include("login_functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password))
        {
            $user_id = random_num(20, $conn);
            $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

            mysqli_query($conn, $query);

            header("Location: details.php");
        die;
        
          
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>SignUp</title>
    <link rel="stylesheet" type="text/css" href="student_signupstyle.css">
</head>
<body>
    <h1 class="header">LORD IMMANUEL INSTITUTION FOUNDATION INC.</h1>
    <div class ="progressbar_container">
        <div class="progressbar">
            <div class="progress" id="progress"></div>
            <div class="progress-step" data-title="Personal Information"></div>
            <div class="progress-step progress-step-active" data-title="Create Username and Password"></div>
            <div class="progress-step" data-title="Validate Details"></div>
            <div class="progress-step" data-title="Finish"></div>
        </div>
    </div>
    </div>
    <div class="container">
    <h1>Sign Up</h1> <br>
    <form method="post">
    <div class="input">
        <input type="text" id="user_name" placeholder="Create Username" name="user_name">
    </div>
    <br>
    <div class="input">
        <input type="password" id="password" placeholder="Create Password" name="password">
        </div>
    <br>
    <div class="input">
        <input type="password" id="confirm_password" placeholder="Confirm Password" name="confirm_password">
        </div>
        <br>

        <p id="message"> tst</p><br>

        <button class="next-button" onclick="goToNextPage()">Next</button>

        <script src="student_signupscript.js"></script>
    </form>
</body>
</div>