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
            $query = "select * from users where user_name = '$user_name' limit 1";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            
            if ($user_data['password'] === $password);
            {
                $_SESSION['user_id'] = $user_data['user_id'];
               header("Location: NOTIF.html");
               die;
            }
        }
     }
        echo "Wrong Username or Password";
        
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

<body>
    <div class="upper-left-heading">
        <h2>Lord Immanuel Institute Foundation Inc.</h2>
    </div>
    
    <div class= "wrapper">
        <form method="post">
            <h2>Student Login</h2>
            <br>
            <div class="input-box">
                <i class='bx bx-user' ></i>
                <input type="text" id="user_name" placeholder="Username" name="user_name"required>
            </div>

            <div class="input-box">
                <i class='bx bx-lock-alt' ></i>
                <input type="password" id="password" placeholder="Password" name="password" required>
            </div>

            <br>

        <input id="button" type="submit" class="btn" value="Sign In">
        <a href="student_signup.php"></a>

        </form>
    </div>

</body>
</html>
