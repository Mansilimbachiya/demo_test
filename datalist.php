<?php

include 'dbcon.php';

$sql = "SELECT * FROM ajaxcrud";

$result = mysqli_query($con,$sql);

$output = '';

$output = "<table>
<tr>
<th style='padding: 10px;'> id </th>
<th style='padding: 10px;'> Name </th>
<th style='padding: 10px;'> Username </th>
    <th style='padding: 10px;'> Password </th>
    <th style='padding: 10px;'> Delete </th>
    <th style='padding: 10px;'> Edit </th>
    </tr>
";

while($row = mysqli_fetch_assoc($result))
{
$output .= "
<tr>
<td style='padding: 10px;'>{$row['id']}</td>
<td style='padding: 10px;'>{$row['name']}</td>
<td style='padding: 10px;'>{$row['username']}</td>
<td style='padding: 10px;'>{$row['password']}</td>   
<td style='padding: 10px;'><button class='dltbtn' data-id='{$row['id']}'> Delete </button></td>
<td style='padding: 10px;'><button class='edtbtn' data-id='{$row['id']}'> Edit </button></td>
";
}
$output .= '</table>';
echo $output;
?>