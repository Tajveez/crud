
<a href="index.php">Record of Students</a>

<form  method="POST" >
Name: <input type="text" name="stName"><br/><br/>
Email: <input type="text" name="stEmail"><br/><br/>
Contact: <input type="text" name="stContact"> <br/><br/>
<input type="submit" name="submit">
</form>

<?php

require_once"conn.php";

error_reporting(0);
$name = $_POST['stName'];
$email = $_POST['stEmail'];
$contact = $_POST['stContact'];

if(!empty($name) && !empty($email) && !empty($contact))
{
$sql = "INSERT INTO student (stname, stemail, stcontact)
VALUES ('$name', '$email', '$contact')";

if (mysqli_query($conn, $sql)) {
    session_start();
    $_SESSION["message"]="Record Added Successfully";

    header('Location: index.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
else{
    echo "Please enter the required data";
}

mysqli_close($conn);
?>