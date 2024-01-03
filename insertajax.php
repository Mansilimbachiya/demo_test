<?php

include 'dbcon.php';

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO ajaxcrud(name,username,password)VALUES('$name','$username','$password')";

if(mysqli_query($con,$sql))
{
echo 'success';
}

?>