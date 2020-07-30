<?php
include '../connection/dbcon.php';
function getRecords(){
  return getCnx()->query("SELECT * FROM tbl_expensetype where FinishDate is null");
 }
 
function addRecord($exp_type){
 $stmt= getCnx()->prepare("INSERT INTO tbl_expensetype(ExpenseTypeName,ExpenseTypeCreateDate)
       VALUES (:exp_type,now())");

       $stmt->bindParam(':exp_type', $exp_type);
       
	   
       $stmt->execute();
}

function getRecordById($up_id){
   return getCnx()->query("SELECT * FROM tbl_expensetype WHERE ExpenseTypeId =$up_id");
  }
  
  function updateRecord($up_id,$up_exp_type)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_expensetype SET  ExpenseTypeName=:up_exp_type WHERE   ExpenseTypeId = :up_id");

          $stmt->bindParam(':up_id', $up_id);
          $stmt->bindParam(':up_exp_type', $up_exp_type);
          
          $stmt->execute();
      }
      function deleteRecord($del_id)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_expensetype SET  FinishDate=now() WHERE ExpenseTypeId = :del_id");

          $stmt->bindParam(':del_id', $del_id);
          $stmt->execute();
      }
?>