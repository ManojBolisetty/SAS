<?php
session_start();
if(isset($_POST['yes'])){
    $_SESSION['asid']=$_POST['asid'];
    $_SESSION['asname']=$_POST['asname'];
    header('Location: faculty_index.php');
}