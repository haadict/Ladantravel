<?php
include 'connection/dbcon.php';
function getUser($usern,$passw){
  return getCnx()->query("SELECT * FROM  tbl_users u INNER JOIN tbl_employee e ON e.EmployeeId=u.UserEmployeeID
WHERE u.UsersName='$usern' AND u.UsersPassword='$passw' AND u.FinishDate IS NULL");
 }

?>