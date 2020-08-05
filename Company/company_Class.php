<?php
include '../connection/dbcon.php';
function getRecords(){
  return getCnx()->query("SELECT * FROM tbl_company where FinishDate is null");
 }
 
function addRecord($cname,$tell,$addr,$email,$web,$image,$user_id)
{
 $stmt= getCnx()->prepare("INSERT INTO tbl_company(CompanyName, CompanyPhone, CompanyAddress, CompanyEmail, CompanyWebsite, CompanyLogo,CompanyCreateBy,CompanyCreateDate)
       VALUES (:cname,:tell,:addr,:email,:web,:image,:user_id,now())");

       $stmt->bindParam(':cname', $cname);
       $stmt->bindParam(':tell', $tell);
       $stmt->bindParam(':addr', $addr);
       $stmt->bindParam(':email', $email);
       $stmt->bindParam(':web', $web);
       $stmt->bindParam(':image', $image);
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
        $stmt =getCnx()->prepare("UPDATE tbl_company SET  FinishDate=now() WHERE CompanyId = :del_id");

          $stmt->bindParam(':del_id', $del_id);
          $stmt->execute();
      }
?>