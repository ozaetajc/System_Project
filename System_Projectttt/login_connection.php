<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "enrollment_system";

if(!$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{
    die("failed to connect" . mysqli_connect_error());
}
