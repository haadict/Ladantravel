<?php
include '../connection/dbcon.php';
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