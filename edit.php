<?php 
require"conn.php";
error_reporting(0);
$id = $_GET['id'];
$sql = "SELECT * FROM student WHERE stid='$id'";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($res, MYSQLI_BOTH);
$name = $row['stname'];
$email = $row['stemail'];
$contact = $row['stcontact'];
?>

<form  method="POST" >
Name: <input type="text" name="stName" value="<?php echo $name ?>"><br/><br/>
Email: <input type="text" name="stEmail" value="<?php echo $email ?>"><br/><br/>
Contact: <input type="text" name="stContact" value="<?php echo $contact ?>"> <br/><br/>
<input type="submit" value="update">
</form>
<?php

error_reporting(0);
$name = $_POST['stName'];
$email = $_POST['stEmail'];
$contact = $_POST['stContact'];

if(!empty($name) && !empty($email) && !empty($contact))
{
$sql = "UPDATE student SET stname='$name', stemail='$email', stcontact='$contact' WHERE stid='$id'";

if (mysqli_query($conn, $sql)) {

    session_start();
    $_SESSION["message"]="Record Edited Successfully";
    
    header('Location: index.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
else{
    echo "Please enter the required data to Update";
}

mysqli_close($conn);
?>