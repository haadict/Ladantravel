<?php
if(isset($_POST))
{ //  Delete Operation Starts Here
	if($_POST['status']=='deletevisa')
	{
		include 'visa_Class.php';
		$del_id=$_POST["del_id"];
		 deleteRecord($del_id);
		 
		  echo 'Data Deleted';
		 
	}
	 if($_POST['status']=='deleteticket')
	{
		include 'ticket_Class.php';

		$t_del_id=$_POST["t_del_id"];
		 deleteTicketRecord($t_del_id);
		 
		  echo 'Data Deleted';
		 
	}
	if($_POST['status']=='deletecargo')
	{
		include 'cargo_Class.php';

		$cr_del_id=$_POST["cr_del_id"];
		 deleteCargoRecord($cr_del_id);
		 
		  echo 'Data Deleted';
		 
	}
}
?>