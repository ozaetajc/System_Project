<?php

function check_login($con)
{

    if(isset($_SESSION['user_id']))
    {

        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";

        $result = mysqli_query($conn,$query);
        if ($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;

        }
    }

//redirect Login

header("Location: student_login.html");
die;

}

function random_num($length, $conn)
{
    $text = "";
    if ($length < 5)
    {
        $length = 5;
    }

    do {
        $text = rand(intval(pow(10, $length - 1)), intval(pow(10, $length) - 1));
        $query = "SELECT user_id FROM users WHERE user_id = '$text'";
        $result = mysqli_query($conn, $query);
    } while (mysqli_num_rows($result) > 0);

    return $text;
}


?>