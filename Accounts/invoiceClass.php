<?php
include '../connection/dbcon.php';

function getInvoices(){
  return getCnx()->query("SELECT * FROM  tbl_invoice i INNER JOIN invoiceno ino ON i.invoiceNoId=ino.invoiceNoId
INNER JOIN tbl_customers c ON c.CustomerId=i.CustomerId");
 }
 function getCustomers(){
  return getCnx()->query("SELECT * FROM  tbl_customers WHERE FinishDate IS NULL");
 }
 function getInvoiceNo(){
  return getCnx()->query("SELECT * FROM invoiceno WHERE FinishDate IS NULL ORDER BY invoiceNoId DESC limit 1");
 }

?>