<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "ajaxcrud_2023";
//create connection
$con = new mysqli($server, $username, $password, $database);
//check connection
if($con->connect_error)
{
    die("Connection is failed:". $con->connect_error);
}
else
{
    //echo "Connection is ok.";
}
//op: Connection is ok.
?>
