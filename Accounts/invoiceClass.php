<?php
include '../connection/dbcon.php';

function getInvoices(){
  return getCnx()->query("SELECT * FROM  tbl_invoice i INNER JOIN invoiceno ino ON i.invoiceNoId=ino.invoiceNoId
INNER JOIN tbl_customers c ON c.CustomerId=i.CustomerId");
 }

?>