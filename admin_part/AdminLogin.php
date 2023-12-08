<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="AdminLogin.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


</head>

<body>
<div class="header">
        <img src="FI Logo.png" class="logo">
        <div class="header-text">Lord Immanuel Institution Foundation Inc.</div>

</div>


    <div class="wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h2>Admin Login</h2>
            <br>
            <div class="input-box">
                <i class='bx bx-user'></i>
                <input type="text" name="username" placeholder="Username" required>
            </div>

            <div class="input-box">
                <i class='bx bx-lock-alt'></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["username"] == "Admin" && $_POST["password"] == "Admin00") {
                    header("Location: Admin.html");
                    exit();
                } else {
                    echo "<p class='error-message'> Invalid username or password. Try Again.</p>";
                }
            }
            ?>

            <br>

            <button type="submit" class="btn">Log in</button>
        </form>
    </div>

</body>

</html>