<?php 
    session_start();
    $conn=mysqli_connect("localhost","root","","sas");
    $sid=$_SESSION['s_id'];
    $sdetails= mysqli_fetch_assoc(mysqli_query($conn,"select * from students where s_id='$sid'"));
    $sbranch=$sdetails['s_branch'];
    $syear=$sdetails['s_year'];
    $result=mysqli_query($conn,"Select * from assignment where branch='$sbranch' and year='$syear'");
    
    $data=array();
    while($row = mysqli_fetch_assoc($result))
    {
        $data[]=$row;
    }
    print_r($row);
    echo json_encode($data); 