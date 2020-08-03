<?php
 include 'customer_Class.php';

if(isset($_POST["del"])) //  Delete Operation Starts Here
	
	{
		$del_id=$_POST["del"];
		 deleteCustomer($del_id);
		 
		  echo 'Data Deleted';
		 
	}



?>