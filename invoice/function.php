<?php 
include '../connection/dbcon.php';
function RedQuatationDetails($qutationId)
{
  $stmt=getCnx()->prepare("SELECT c.CustomerId,inv.SubTotal,inv.InvoiceDate,s.ServName,ivd.ServiceId,ivd.InvoiceId,ivd.Qty,ivd.Amount,ivd.Discount,ivd.Tax,ivd.Total FROM tbl_invoice inv
        INNER JOIN tbl_invoicedetails ivd on ivd.InvoiceId=inv.invoiceId
        INNER JOIN services s on s.ServId=ivd.ServiceId
        INNER JOIN tbl_customers c on c.CustomerId=inv.CustomerId
        WHERE inv.FinishDate is null and ivd.InvoiceId=:qutationId");
		  $stmt->bindParam(':qutationId', $qutationId);
		  $stmt->execute();
		  return $stmt;
}
function getQuatation($barcodeId){
 $stmt=getCnx()->prepare("SELECT * FROM `services` WHERE services.ServId=:barcodeId");
 $stmt->bindParam(':barcodeId', $barcodeId);
 $stmt->execute();
 return $stmt;
}
function getCustomersName(){
 $stmt=getCnx()->prepare("SELECT c.CustomerId,c.CustomerName FROM tbl_customers c  WHERE c.FinishDate is null");
 $stmt->execute();
 return $stmt;
}
function getServicesName(){
 $stmt=getCnx()->prepare("SELECT s.ServId,s.ServName FROM services s  WHERE s.FinishDate is null");
 $stmt->execute();
 return $stmt;
}
function addInvoice($client,$grandTotal,$createdDate,$createdBy)
{
  $stmt=getCnx()->prepare("INSERT INTO tbl_invoice(CustomerId,SubTotal,InvoiceDate,InvoiceCreateBy)
    VALUES(:client,:grandTotal,:createdDate,:createdBy)");
  $stmt->bindParam(':client', $client);
  $stmt->bindParam(':grandTotal', $grandTotal);
  $stmt->bindParam(':createdDate', $createdDate);
  $stmt->bindParam(':createdBy', $createdBy);
  $stmt->execute();
  return getCnx()->lastInsertId();
}
function addInvoiceDetails($InvoiceId,$serVId,$Qty,$unitPrice,$discount,$VAT,$Total)
{
  $stmt=getCnx()->prepare("INSERT INTO tbl_invoicedetails(InvoiceId,ServiceId,Qty,Amount,Discount,Tax,Total) 
    VALUES(:InvoiceId,:serVId,:Qty,:unitPrice,:discount,:VAT,:Total)");
  $stmt->bindParam(':InvoiceId', $InvoiceId);
  $stmt->bindParam(':serVId', $serVId);
  $stmt->bindParam(':Qty', $Qty);
  $stmt->bindParam(':unitPrice', $unitPrice);
  $stmt->bindParam(':discount', $discount);
  $stmt->bindParam(':VAT', $VAT);
  $stmt->bindParam(':Total', $Total);
  $stmt->execute();
}
function deleteInv($id)
{
	getCnx()->query("UPDATE tbl_invoice SET FinishDate=NOW() WHERE InvoiceId=$id");
}
function updateInvoice($client,$grandTotal,$createdDate,$createdBy,$qutationId)
{
  $stmt=getCnx()->prepare("UPDATE tbl_invoice SET CustomerId=:client,SubTotal=:grandTotal,InvoiceDate=:createdDate,InvoiceCreateBy=:createdBy
    WHERE InvoiceId=:qutationId");
  $stmt->bindParam(':client', $client);
  $stmt->bindParam(':grandTotal', $grandTotal);
  $stmt->bindParam(':createdDate', $createdDate);
  $stmt->bindParam(':createdBy', $createdBy);
  $stmt->bindParam(':qutationId', $qutationId);
  $stmt->execute();
  return getCnx()->lastInsertId();
}
function updateInvoiceDetails($InvoiceId,$serVId,$Qty,$unitPrice,$discount,$VAT,$Total)
{
  $stmt=getCnx()->prepare("INSERT INTO tbl_invoicedetails(InvoiceId,ServiceId,Qty,Amount,Discount,Tax,Total) 
    VALUES(:InvoiceId,:serVId,:Qty,:unitPrice,:discount,:VAT,:Total)");
  $stmt->bindParam(':InvoiceId', $InvoiceId);
  $stmt->bindParam(':serVId', $serVId);
  $stmt->bindParam(':Qty', $Qty);
  $stmt->bindParam(':unitPrice', $unitPrice);
  $stmt->bindParam(':discount', $discount);
  $stmt->bindParam(':VAT', $VAT);
  $stmt->bindParam(':Total', $Total);
  $stmt->execute();
}
  function getReceipts()
  {

      $stmt=getCnx()->prepare("SELECT c.CustomerName,c.CustomerId,ivd.InvoiceId,inv.SubTotal,inv.InvoiceDate,s.ServName FROM tbl_invoice inv
        INNER JOIN tbl_customers c ON c.CustomerId = inv.CustomerId
        INNER JOIN tbl_invoicedetails ivd on ivd.InvoiceId=inv.invoiceId
        INNER JOIN services s on s.ServId=ivd.ServiceId
        WHERE c.FinishDate IS NULL and inv.FinishDate is null group by inv.CustomerId");
     	$stmt->execute();
 	  	return $stmt;
 }
   function getReceiptsAll($cusId)
  {

      $stmt=getCnx()->prepare("SELECT c.CustomerName,ivd.InvoiceId,inv.SubTotal,inv.InvoiceDate,s.ServName FROM tbl_invoice inv
        INNER JOIN tbl_customers c ON c.CustomerId = inv.CustomerId
        INNER JOIN tbl_invoicedetails ivd on ivd.InvoiceId=inv.invoiceId
        INNER JOIN services s on s.ServId=ivd.ServiceId
        WHERE c.FinishDate IS NULL and inv.FinishDate is null and c.CustomerId=:cusId group by ivd.InvoiceId");
       $stmt->bindParam(':cusId', $cusId);
     	$stmt->execute();
 	  	return $stmt;
 }
 function getReceiptById($qutationId)
{
  $stmt=getCnx()->prepare("SELECT c.CustomerName ,c.CustomerAddress ,c.Customerphone ,inv.SubTotal,inv.InvoiceDate,inv.InvoiceId FROM tbl_invoice inv
        INNER JOIN tbl_customers c on c.CustomerId=inv.CustomerId
        WHERE inv.FinishDate is null and inv.InvoiceId=:qutationId OR inv.CustomerId=:cusId");
		  $stmt->bindParam(':qutationId', $qutationId);
		  $stmt->bindParam(':cusId', $cusId);
		  $stmt->execute();
		  return $stmt;
}
 function getReceiptByName($cusId)
{
  $stmt=getCnx()->prepare("SELECT c.CustomerName ,c.CustomerAddress ,c.Customerphone FROM tbl_customers c 
        WHERE c.FinishDate is null and c.CustomerId=:cusId");
		  $stmt->bindParam(':cusId', $cusId);
		  $stmt->execute();
		  return $stmt;
}
?>