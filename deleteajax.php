<?php

include 'dbcon.php';

$id = $_POST['id'];

$sql = "DELETE FROM ajaxcrud WHERE id = '$id'";

if(mysqli_query($con,$sql))
{
echo 'success';
}

?>