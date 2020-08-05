<?php
include '../connection/dbcon.php';
<<<<<<< HEAD
function getRecords(){
  return getCnx()->query("SELECT * FROM tbl_users where FinishDate is null");
 }
 
function addRecord($userName,$userPassword,$userType,$userEmployeeId)
{
 $stmt= getCnx()->prepare("INSERT INTO tbl_users(UserEmployeeId, UsersName, UsersPassword, userType)
       VALUES (:UserEmployeeId,:UsersName,:UsersPassword,:userType");

       $stmt->bindParam(':UsersName', $userName);
       $stmt->bindParam(':UsersPassword', $userPassword);
       $stmt->bindParam(':userType', $userType);
       $stmt->bindParam(':UserEmployeeId', $userEmployeeId);
       
	   
       $stmt->execute();
}

function getRecordById($up_id){
   return getCnx()->query("SELECT * FROM tbl_branch br,tbl_company com WHERE br.BranchCompanyID=com.CompanyId and br.BranchId=$up_id");
  }
  
  function updateRecord($up_id,$up_comid,$up_bname,$up_btell,$up_baddr,$up_user_id)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_branch SET  BranchCompanyID=:up_comid,BranchName=:up_bname,BranchPhone=:up_btell,BranchAddress=:up_baddr,BranchCreateBy=:up_user_id WHERE   BranchId = :up_id");

          $stmt->bindParam(':up_id', $up_id);
          $stmt->bindParam(':up_comid', $up_comid);
          $stmt->bindParam(':up_bname', $up_bname);
          $stmt->bindParam(':up_btell', $up_btell);
          $stmt->bindParam(':up_baddr', $up_baddr);
          $stmt->bindParam(':up_user_id', $up_user_id);
          
          $stmt->execute();
      }
      function deleteRecord($del_id)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_branch SET  FinishDate=now() WHERE BranchId = :del_id");

          $stmt->bindParam(':del_id', $del_id);
          $stmt->execute();
      }
?>
=======
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
>>>>>>> 334e8ac9642ed2d13b3a2007ddffbf77b5782684
