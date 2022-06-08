<?php 


$server = "localhost";
$username = "root";
$password = "rootroot";
$database = "u754966425_avocado_db";

$con = new mysqli($server, $username, $password, $database);
if (mysqli_connect_errno()){
    die(mysqli_connect_error());

    mysqli_set_charset($con, 'utf8');
    date_default_timezone_set("Asia/Baghdad");
}
else{}

?>
