<?php
session_start();

    include("login_connection.php");
    include("login_functions.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
    
        if (!empty($user_name) && !empty($password)) {
            $query = "SELECT * FROM users WHERE user_name = '$user_name' LIMIT 1";
            $result = mysqli_query($conn, $query);
    
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
    
                // Use password_verify to check the entered password against the hashed password
                if (password_verify($password, $user_data['password'])) {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: NOTIF.php");
                    die;
                }
            }
        }
     echo '<script>
     document.addEventListener("DOMContentLoaded", function() {
         var notificationBox = document.createElement("div");
         notificationBox.className = "notification-box";
         var notification = document.createElement("div");
         notification.className = "custom-notification";
         notification.textContent = "Wrong Username or Password";
         notificationBox.appendChild(notification);
         document.body.appendChild(notificationBox);
         setTimeout(function() {
             document.body.removeChild(notificationBox);
         }, 3000); // Adjust the time (in milliseconds) the notification stays visible
     });
   </script>';
        
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF=8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name=" viewport" content="width=device-width,initial-scale=1.0">
    <title>Student GUI</title>
    <link rel="stylesheet" href="student_loginstyle.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

            <div class="header">
                    <img src="FI Logo.png" class="logo">
                    <div class="header-text">Lord Immanuel Institution Foundation Inc.</div>

                </div>

<body>
    
    
    <div class= "wrapper">
        <form method="post">
            <h2>Student Login</h2>
            <br>
            <div class="input-box">
                <i class='bx bx-user' ></i>
                <input type="text" id="user_name" placeholder="Username" name="user_name" class= "user_name" required>
            </div>

            <div class="input-box">
            <button type="button" onclick="togglePassword()"><i class='bx bxs-low-vision'></i></button>
                <input type="password" id="password" placeholder="Password" name="password" class="password" required>
            </div>
            <br><br>

        <input id="button" type="submit" class="btn" value="Sign In">
        <a href="student_signup.php"></a>

        </form>
    </div>
<script>
    function togglePassword() {
    var passwordField = document.getElementById("password");
    if (passwordField.type === "password") {
        passwordField.type = "text";
    } else {
        passwordField.type = "password";
    }
}
</script>

</body>
</html>
