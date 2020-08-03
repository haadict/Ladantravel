<?php 
session_start(); 
$Name = "";
$usertype =""; 
 if(isset($_SESSION["Name"]) && isset($_SESSION["userType"]) && isset($_SESSION["EmployeeId"]))
 {  
	$Name = $_SESSION["Name"];
	$usertype = $_SESSION["userType"];
 }  
 else  
 {  
      header("location:index");  
 }  

	
 
?>
