<?php

include 'dbcon.php';

$id = $_POST['id'];

$sql = "SELECT * FROM ajaxcrud WHERE id = '$id'";

$result = mysqli_query($con,$sql);

$output = '';

while($row = mysqli_fetch_assoc($result))
{
$output .= "

Name : <input type='text' id='ename' value='{$row['name']}' class='form-control'>
<input type='hidden' id='eid' value='{$row['id']}'>
<br><br>
Username : <input type='text' id='eusername' value='{$row['username']}' class='form-control'>
<br><br>
Password : <input type='text' id='epassword' value='{$row['password']}' class='form-control'>

    <input type='submit' id='update' value='submit'>

";

}

echo $output;

?>