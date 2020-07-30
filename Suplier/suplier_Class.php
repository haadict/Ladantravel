<?php
include '../connection/dbcon.php';
function getRecords(){
  return getCnx()->query("SELECT * FROM tbl_supplier where FinishDate is null");
 }
 
function addRecord($sname,$tell,$addr,$email,$user_id)
{
 $stmt= getCnx()->prepare("INSERT INTO tbl_supplier(supplierName, supplierphone, supplierAddress, supplierEmail, supplierCreateBy, supplierCreateDate)
       VALUES (:sname,:tell,:addr,:email,:user_id,now())");

       $stmt->bindParam(':sname', $sname);
       $stmt->bindParam(':tell', $tell);
       $stmt->bindParam(':addr', $addr);
       $stmt->bindParam(':email', $email);
       $stmt->bindParam(':user_id', $user_id);
       
	   
       $stmt->execute();
}

function getRecordById($up_id){
   return getCnx()->query("SELECT * FROM tbl_supplier WHERE supplierId=$up_id");
  }
  
  function updateRecord($up_id,$up_sname,$up_tell,$up_addr,$up_email,$up_user_id)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_supplier SET  supplierName=:up_sname,supplierphone=:up_tell,supplierAddress=:up_addr,supplierEmail=:up_email,supplierCreateBy=:up_user_id WHERE   supplierId = :up_id");

          $stmt->bindParam(':up_id', $up_id);
          $stmt->bindParam(':up_sname', $up_sname);
          $stmt->bindParam(':up_tell', $up_tell);
          $stmt->bindParam(':up_addr', $up_addr);
          $stmt->bindParam(':up_email', $up_email);
          $stmt->bindParam(':up_user_id', $up_user_id);
          
          $stmt->execute();
      }
      function deleteRecord($del_id)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_supplier SET  FinishDate=now() WHERE supplierId = :del_id");

          $stmt->bindParam(':del_id', $del_id);
          $stmt->execute();
      }
?>