<?php
<<<<<<< HEAD
 include 'branch_Class.php';
=======
 include 'user_Class.php';
>>>>>>> 334e8ac9642ed2d13b3a2007ddffbf77b5782684

if(isset($_POST["del_id"])) //  Delete Operation Starts Here
	
	{
		$del_id=$_POST["del_id"];
		 deleteRecord($del_id);
		 
		  echo 'Data Deleted';
		 
	}
<<<<<<< HEAD



?>
=======
>>>>>>> 334e8ac9642ed2d13b3a2007ddffbf77b5782684
