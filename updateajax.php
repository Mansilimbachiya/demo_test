<?php

include 'dbcon.php';

$id = $_POST['id'];
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "UPDATE ajaxcrud SET name='$name', username='$username', password='$password' WHERE id = '$id'";

if(mysqli_query($con,$sql))
{
echo 'success';
}

?>