<a href="addstudent.php">Add new student</a>
<table>
<tr>
<th>Name</th>
<th>Email</th>
<th>Contact</th>

</tr>
<?php
session_start();
if(isset($_SESSION["message"]))
{
    echo $_SESSION['message'];
    unset($_SESSION["message"]);
}
require"conn.php";
$sql = "SELECT * FROM student";
$res = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
        echo"<tr>";
        echo"<td> $row[stname] </td>";
        echo"<td> $row[stemail] </td>";
        echo"<td> $row[stcontact] </td>";
        echo"<td> <a href='edit.php?id=$row[stid]'>Edit</a> </td>";
        echo"<td> <a href='delete.php?id=$row[stid]'>Delete</a> </td>";
        echo"</tr>";
    }
?>


</table>