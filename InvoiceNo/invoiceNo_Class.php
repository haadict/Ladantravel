<?php
include '../connection/dbcon.php';
function getRecords(){
  return getCnx()->query("SELECT * FROM invoiceno where FinishDate is null");
 }
 
function addRecord($inv_no,$pref){
 $stmt= getCnx()->prepare("INSERT INTO invoiceno(Prefix,invoiceNo,startDate)
       VALUES (:pref,:inv_no,now())");

       $stmt->bindParam(':pref', $pref);
       $stmt->bindParam(':inv_no', $inv_no);
       
	   
       $stmt->execute();
}

function getRecordById($up_id){
   return getCnx()->query("SELECT * FROM invoiceno WHERE invoiceNoId =$up_id");
  }
  
  function updateRecord($up_id,$up_inv_no,$up_pref)
      {
        $stmt =getCnx()->prepare("UPDATE invoiceno SET  Prefix=:up_pref,invoiceNo=:up_inv_no WHERE   invoiceNoId = :up_id");

          $stmt->bindParam(':up_id', $up_id);
          $stmt->bindParam(':up_pref', $up_pref);
          $stmt->bindParam(':up_inv_no', $up_inv_no);
          
          $stmt->execute();
      }
      function deleteRecord($del_id)
      {
        $stmt =getCnx()->prepare("UPDATE invoiceno SET  FinishDate=now() WHERE invoiceNoId = :del_id");

          $stmt->bindParam(':del_id', $del_id);
          $stmt->execute();
      }
?>