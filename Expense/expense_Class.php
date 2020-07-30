<?php
include '../connection/dbcon.php';
function getRecords(){
  return getCnx()->query("SELECT * FROM tbl_expense exp,tbl_expensetype ext where exp.ExpenseTypeId=Ext.ExpenseTypeId and exp.FinishDate is null");
 }
 
function addRecord($expid,$expdes,$expamount,$expdate,$user_id)
{
 $stmt= getCnx()->prepare("INSERT INTO tbl_expense(ExpenseTypeId, ExpenseDescription, ExpenseAmount, ExpenseDate, ExpenseCreateBy, ExpenseCreateDate)
       VALUES (:expid,:expdes,:expamount,:expdate,:user_id,now())");

       $stmt->bindParam(':expid', $expid);
       $stmt->bindParam(':expdes', $expdes);
       $stmt->bindParam(':expamount', $expamount);
       $stmt->bindParam(':expdate', $expdate);
       $stmt->bindParam(':user_id', $user_id);
       
	   
       $stmt->execute();
}

function getRecordById($up_id){
   return getCnx()->query("SELECT * FROM tbl_expense WHERE ExpenseId=$up_id");
  }
  
  function updateRecord($up_id,$up_expid,$up_expdes,$up_expamount,$up_expdate,$up_user_id)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_expense SET  ExpenseTypeId=:up_expid,ExpenseDescription=:up_expdes,ExpenseAmount=:up_expamount,ExpenseDate=:up_expdate,ExpenseCreateBy=:up_user_id WHERE ExpenseId = :up_id");

          $stmt->bindParam(':up_id', $up_id);
          $stmt->bindParam(':up_expid', $up_expid);
          $stmt->bindParam(':up_expdes', $up_expdes);
          $stmt->bindParam(':up_expamount', $up_expamount);
          $stmt->bindParam(':up_expdate', $up_expdate);
          $stmt->bindParam(':up_user_id', $up_user_id);
          
          $stmt->execute();
      }
      function deleteRecord($del_id)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_expense SET  FinishDate=now() WHERE ExpenseId = :del_id");

          $stmt->bindParam(':del_id', $del_id);
          $stmt->execute();
      }
?>