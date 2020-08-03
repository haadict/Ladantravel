<?php
include '../connection/dbcon.php';
function getRecords(){
  return getCnx()->query("SELECT r.`receiptId`,r.`invoiceId`,r.`Amount`,r.`Paid`,r.`Balance`,r.`pymentMethod`,r.`ReciptDate`,r.`ReceiptCreateDate`,i.invoiceId FROM tbl_receipt r,tbl_invoice i where r.invoiceId=i.invoiceId and r.FinishDate is null");
 }
 
function addRecord($inv,$amount,$paid,$blance,$recdate,$pm)
{
 $stmt= getCnx()->prepare("INSERT INTO tbl_receipt(invoiceId, Amount, Paid, Balance,pymentMethod, ReciptDate, ReceiptCreateDate)
       VALUES (:inv,:amount,:paid,:blance,:pm,:recdate,now())");

       $stmt->bindParam(':inv', $inv);
       $stmt->bindParam(':amount', $amount);
       $stmt->bindParam(':paid', $paid);
       $stmt->bindParam(':blance', $blance);
       $stmt->bindParam(':recdate', $recdate);
       $stmt->bindParam(':pm', $pm);
       
       
	   
       $stmt->execute();
}

function getRecordById($up_id){
   return getCnx()->query("SELECT * FROM tbl_receipt WHERE receiptId=$up_id");
  }
  
  function updateRecord($up_id,$up_inv,$up_amount,$up_paid,$up_blance,$up_pm,$up_recdate)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_receipt SET  invoiceId=:up_inv,Amount=:up_amount,Paid=:up_paid,Balance=:up_blance,pymentMethod=:up_pm,ReciptDate=:up_recdate,ReceiptCreateDate=now() WHERE receiptId = :up_id");

          $stmt->bindParam(':up_id', $up_id);
          $stmt->bindParam(':up_inv', $up_inv);
          $stmt->bindParam(':up_amount', $up_amount);
          $stmt->bindParam(':up_paid', $up_paid);
          $stmt->bindParam(':up_blance', $up_blance);
          $stmt->bindParam(':up_pm', $up_pm);
          $stmt->bindParam(':up_recdate', $up_recdate);
          
          $stmt->execute();
      }
      function deleteRecord($del_id)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_receipt SET  FinishDate=now() WHERE receiptId = :del_id");

          $stmt->bindParam(':del_id', $del_id);
          $stmt->execute();
      }
?>