<?php
session_start();

    include("login_connection.php");
    include("login_functions.php");

    $error_message = ""; // Initialize an empty error message

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
    
        if (!empty($user_name) && !empty($password) && !empty($confirm_password) && $password === $confirm_password) {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
            $user_id = random_num(20, $conn);
            $query = "INSERT INTO users (user_id, user_name, password) VALUES ('$user_id', '$user_name', '$hashed_password')";
            
            $result = mysqli_query($conn, $query);
    
            if ($result) {
                header("Location: details.php");
                die;
            } else {
                $error_message = "Error: " . mysqli_error($conn);
            }
        } else {
            $error_message = "Passwords do not match or some fields are empty.";
        }
    }


?>

<!DOCTYPE html>
<html>
<head>
    <title>SignUp</title>
    <link rel="stylesheet" type="text/css" href="student_signupstyle.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <img src="FI Logo.png" class="logo">
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
        <button type="button" onclick="togglePassword()"><i class='bx bxs-low-vision'></i></button>
        </div>
    <br>
    <div class="input">
        <input type="password" id="confirm_password" placeholder="Confirm Password" name="confirm_password">
        <button type="button" onclick="toggleCpassword()"><i class='bx bxs-low-vision'></i></button>
        </div>
        <br>

        <div class="error-message">
                <?php echo $error_message; ?>
            </div>

        <br><br>
        <button class="next-button" onclick="goToNextPage()">Next</button>

    </form>
</body>
</div>

<script>
function goToNextPage() {
    window.location.href = "details.php";
}


function togglePassword() {
    var passwordField = document.getElementById("password");
    if (passwordField.type === "password") {
        passwordField.type = "text";
    } else {
        passwordField.type = "password";
    }
}

function toggleCpassword() {
    var cpasswordField = document.getElementById("confirm_password");
    if (cpasswordField.type === "password") {
        cpasswordField.type = "text";
    } else {
        cpasswordField.type = "password";
    }
}
</script>

</body>