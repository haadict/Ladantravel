<?php
 include 'airLine_Class.php';

if(isset($_POST["aid"])) //  Delete Operation Starts Here
	
	{
		$aid=$_POST["aid"];
		 deleteAirLine($aid);
		 
		  echo 'Data Deleted';
		 
	}



?>