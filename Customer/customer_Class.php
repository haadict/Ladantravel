<?php
include '../connection/dbcon.php';
function getCustomers(){
  return getCnx()->query("SELECT * FROM tbl_customers");
 }
 
function addCustomer($fullname,$tell,$address,$email,$user_id){
 $stmt= getCnx()->prepare("INSERT INTO tbl_customers(CustomerName,Customerphone,CustomerAddress,CustomerEmail,CustomerCreateBy,CustomerCreateDate)
       VALUES (:fullname,:tell,:address,:email,:user_id,now())");

       $stmt->bindParam(':fullname', $fullname);
       $stmt->bindParam(':tell', $tell);
       $stmt->bindParam(':address', $address);
       $stmt->bindParam(':email', $email);
	   $stmt->bindParam(':user_id', $user_id);
       $stmt->execute();
}

function getCustomerById($cust_id){
   return getCnx()->query("SELECT * FROM tbl_customers WHERE CustomerId =$cust_id");
  }
  
  function updateCustomer($id,$fullname,$tell,$address,$email)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_customers SET  CustomerName=:fullname, Customerphone=:tell ,CustomerAddress=:address,CustomerEmail:email WHERE CustomerId = :id");

          $stmt->bindParam(':id', $id);
          $stmt->bindParam(':fullname', $fullname);
          $stmt->bindParam(':tell', $tell);
          $stmt->bindParam(':address', $address);
		  $stmt->bindParam(':email', $email);
          $stmt->execute();
      }
?>