<?php 
session_start();
include('../../connection.php');
if(isset($_SESSION['sasid']))
{
    $asid=$_SESSION['sasid'];
    $result=mysqli_query($conn,"Select * from questions where as_id='$asid' ");
    $data=array();
    while($row = mysqli_fetch_assoc($result))
    {
        $data[]=$row;
    }
    print_r($row);
    echo json_encode($data); 
}
