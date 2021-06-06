<?php

session_start();
include('../connection.php');
unset($_SESSION['sasid']);
if(isset($_POST['yes']))
{
    $asname= $_POST['asname'];
    $query=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM assignment WHERE as_name='$asname'"));
    $_SESSION['sasid']=$query['as_id'];
  
    echo $_SESSION['sasid'];
    header('Location: tests/mathtest.php');
    
}
else{
    header('Location: assignment.php');
}



