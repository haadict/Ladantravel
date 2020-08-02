<?php
include '../connection/dbcon.php';
function getRecords()
{
  return getCnx()->query("SELECT * FROM tbl_users WHERE FinishDate is null");
}

function addRecord($EmployeeId, $UsersName, $UsersPassword, $userType, $createBy)
{
  $stmt = getCnx()->prepare("INSERT INTO tbl_users(UserEmployeeId, UsersName, UsersPassword, userType,UserCreateBy,UserCreateDate)
       VALUES (:UserEmployeeId,:UsersName,:UsersPassword,:userType,:UserCreateBy,now())");

  $stmt->bindParam(':UserEmployeeId', $EmployeeId);
  $stmt->bindParam(':UsersName', $UsersName);
  $stmt->bindParam(':UsersPassword', $UsersPassword);
  $stmt->bindParam(':userType', $userType);
  $stmt->bindParam(':UserCreateBy', $createBy);

  $stmt->execute();
}

function getRecordById($up_id)
{
  return getCnx()->query("SELECT * FROM tbl_users user,tbl_employee emp WHERE user.UsersId=$up_id");
}

function updateRecord($up_employeeId, $up_id, $up_userName, $up_userPassword, $up_userType, $up_crateBy_id)
{
  $stmt = getCnx()->prepare("UPDATE tbl_users SET  UserEmployeeId=:UserEmployeeId,UsersName=:UsersName,UsersPassword=:UsersPassword,userType=:userType,UserCreateBy=:UserCreateBy WHERE   UsersId=$up_id");

  $stmt->bindParam(':UserEmployeeId', $up_employeeId);
  $stmt->bindParam(':UsersName', $up_userName);
  $stmt->bindParam(':UsersPassword', $up_userPassword);
  $stmt->bindParam(':userType', $up_userType);
  $stmt->bindParam(':UserCreateBy', $up_crateBy_id);

  $stmt->execute();
}
function deleteRecord($del_id)
{
  $stmt = getCnx()->prepare("UPDATE tbl_users SET  FinishDate=now() WHERE UsersId = :del_id");

  $stmt->bindParam(':del_id', $del_id);
  $stmt->execute();
}
