<?php
session_start();
if(isset($_SESSION['s_id']))
{
	unset($_SESSION['s_id']);
}
header("Location: login.php");
die;
