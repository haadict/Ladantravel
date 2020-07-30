<?php
include '../connection/dbcon.php';
function getRecords(){
  return getCnx()->query("SELECT * FROM tbl_branch br,tbl_company com where br.BranchCompanyID=com.CompanyId and br.FinishDate is null");
 }
 
function addRecord($comid,$bname,$btell,$baddr,$user_id)
{
 $stmt= getCnx()->prepare("INSERT INTO tbl_branch(BranchCompanyID, BranchName, BranchPhone, BranchAddress, BranchCreateBy, BranchCreateDate)
       VALUES (:comid,:bname,:btell,:baddr,:user_id,now())");

       $stmt->bindParam(':comid', $comid);
       $stmt->bindParam(':bname', $bname);
       $stmt->bindParam(':btell', $btell);
       $stmt->bindParam(':baddr', $baddr);
       $stmt->bindParam(':user_id', $user_id);
       
	   
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