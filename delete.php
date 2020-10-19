<?php

require"conn.php";
$id = $_GET['id'];
$sql = "DELETE FROM student WHERE stid='$id'";
if (mysqli_query($conn, $sql)) {
    
    session_start();
    $_SESSION["message"]="Record Deleted Successfully";

    header('Location: index.php');
} else {
    echo "Error";
}
?>