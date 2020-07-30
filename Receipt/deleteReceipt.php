<?php
 include 'receipt_Class.php';

if(isset($_POST["del_id"])) //  Delete Operation Starts Here
	
	{
		$del_id=$_POST["del_id"];
		 deleteRecord($del_id);
		 
		  echo 'Data Deleted';
		 
	}



?>