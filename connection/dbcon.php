<?php
 	try {
$dbcon = new PDO('mysql:host=localhost;dbname=traval_agency_db;charset=utf8', 'root', '');
 		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 	} catch (Exception $e) {
 		echo "Wrong";
 	}
 	function getCnx()
 	{
 		global $dbcon;
 		return $dbcon;
 	}
 	?>





