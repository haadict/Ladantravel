<?php
include '../connection/dbcon.php';
function getCustomers(){
  return getCnx()->query("SELECT * FROM tbl_customers where FinishDate is null");
 }
 // customer Operations
 // Add Customer Operation
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
// Get By Id Customer
function getCustomerById($cust_id){
   return getCnx()->query("SELECT * FROM tbl_customers WHERE CustomerId =$cust_id");
  }
  
  // Update Cusomer Operation
  function updateCustomer($id,$fullname,$tell,$address,$email)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_customers SET  CustomerName=:fullname, Customerphone=:tell ,CustomerAddress=:address,CustomerEmail=:email WHERE CustomerId = :id");

          $stmt->bindParam(':id', $id);
          $stmt->bindParam(':fullname', $fullname);
          $stmt->bindParam(':tell', $tell);
          $stmt->bindParam(':address', $address);
		  $stmt->bindParam(':email', $email);
          $stmt->execute();
      }
      function deleteCustomer($del_id)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_customers SET  FinishDate=now() WHERE CustomerId = :id");

          $stmt->bindParam(':id', $del_id);
          $stmt->execute();
      }
// Report Operatiions
        function getTickets($id){
  return getCnx()->query("SELECT count(ticketId) as Tickets FROM tbl_ticketreservation where CustomerId='$id' and FinishDate is null");
 }
 function getVisas($id){
  return getCnx()->query("SELECT count(visaId) as Visas FROM tbl_visareservation where customerId='$id' and FinishDate is null");
 }
  function getCargos($id){
  return getCnx()->query("SELECT count(CargoId) as Cargos FROM tbl_cargo where CustomerId='$id' and FinishDate is null");
 }
// end of Report Operations
      // Visa Operations

      // Visa View
      function getVisaRecords($id){
  return getCnx()->query("SELECT * FROM tbl_visareservation v,tbl_customers c, tbl_employee em where v.customerId=c.CustomerId and v.visaCreateBy=em.EmployeeId and v.customerId and v.FinishDate is null");
 }
      // end of Visa View
      // Add Visa operation
      function addVisaRecord($cusid,$vdate,$duration,$country,$passno,$issby,$issdate,$passexdate,$cprice,$sellprice,$profit,$desc,$user_id)
{
 $stmt= getCnx()->prepare("INSERT INTO tbl_visareservation(customerId, visaDate, duration, country, passportNo, issuedBy,issuDate,passportExpireDate,costprice,sellPrice,profit,visaDescription,visaCreateBy,visaCreateDate)
   VALUES (:cusid,:vdate,:duration,:country,:passno,:issby,:issdate,:passexdate,:cprice,:sellprice,:profit,:desc,:user_id,now())");

       $stmt->bindParam(':cusid', $cusid);
       $stmt->bindParam(':vdate', $vdate);
       $stmt->bindParam(':duration', $duration);
       $stmt->bindParam(':country', $country);
       $stmt->bindParam(':passno', $passno);
       $stmt->bindParam(':issby', $issby);
       $stmt->bindParam(':issdate', $issdate);
       $stmt->bindParam(':passexdate', $passexdate);
       $stmt->bindParam(':cprice', $cprice);
       $stmt->bindParam(':sellprice', $sellprice);
       $stmt->bindParam(':profit', $profit);
       $stmt->bindParam(':desc', $desc);
       $stmt->bindParam(':user_id', $user_id);
       
     
       $stmt->execute();
}

// Get Visa By Id
function getVisaRecordById($up_id){
   return getCnx()->query("SELECT * FROM tbl_visareservation WHERE visaId=$up_id");
  }
  
  // Update Visa Operation
function updateVisaRecord($up_id,$up_cusid,$up_vdate,$up_duration,$up_country,$up_passno,$up_issby,$up_issdate,$up_passexdate,$up_cprice,$up_sellprice,$up_profit,$up_desc,$up_user_id)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_visareservation SET customerId=:up_cusid,visaDate=:up_vdate,duration=:up_duration,country=:up_country,passportNo=:up_passno,issuedBy=:up_issby,issuDate=:up_issdate,passportExpireDate=:up_passexdate,costprice=:up_cprice,sellPrice=:up_sellprice,profit=:up_profit,visaDescription=:up_desc,visaCreateBy=:up_user_id WHERE visaId = :up_id");

          $stmt->bindParam(':up_id', $up_id);
          $stmt->bindParam(':up_cusid', $up_cusid);
          $stmt->bindParam(':up_vdate', $up_vdate);
          $stmt->bindParam(':up_duration', $up_duration);
          $stmt->bindParam(':up_country', $up_country);
          $stmt->bindParam(':up_passno', $up_passno);
          $stmt->bindParam(':up_issby', $up_issby);
          $stmt->bindParam(':up_issdate', $up_issdate);
          $stmt->bindParam(':up_passexdate', $up_passexdate);
          $stmt->bindParam(':up_cprice', $up_cprice);
          $stmt->bindParam(':up_sellprice', $up_sellprice);
          $stmt->bindParam(':up_profit', $up_profit);
          $stmt->bindParam(':up_desc', $up_desc);
          $stmt->bindParam(':up_user_id', $up_user_id);
          
          
          $stmt->execute();
      }

      // Delete Visa Operation
      function deleteVisaRecord($del_id)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_visareservation SET  FinishDate=now() WHERE visaId = :del_id");

          $stmt->bindParam(':del_id', $del_id);
          $stmt->execute();
      }

      // Ticket Operations

      // Ticket View
      function getTicketRecords($id){
  return getCnx()->query("SELECT * FROM tbl_ticketreservation t,tbl_customers c, tbl_employee em where t.customerId=c.CustomerId and t.ticketCreateBy=em.EmployeeId and t.CustomerId='$id' and t.FinishDate is null");
 }
      // end of Ticket View
      // Add Ticket operation
      function addTicketRecord($custid,$rdate,$ticket,$airline,$dfrom,$dto,$tcprice,$sprice,$tprofit,$tdesc,$user_id)
{
 $stmt= getCnx()->prepare("INSERT INTO tbl_ticketreservation(CustomerId, ReservaionDate, TicketNo, airLineId, DestanationFrom, DestanationTo,CostPrice,SellPrice,Profit,ticketDescription,ticketCreateBy,ticketCreateDate)
   VALUES(:custid,:rdate,:ticket,:airline,:dfrom,:dto,:tcprice,:sprice,:tprofit,:tdesc,:user_id,now())");

       $stmt->bindParam(':custid', $custid);
       $stmt->bindParam(':rdate', $rdate);
       $stmt->bindParam(':ticket', $ticket);
       $stmt->bindParam(':airline', $airline);
       $stmt->bindParam(':dfrom', $dfrom);
       $stmt->bindParam(':dto', $dto);
       $stmt->bindParam(':tcprice', $tcprice);
       $stmt->bindParam(':sprice', $sprice);
       $stmt->bindParam(':tprofit', $tprofit);
       $stmt->bindParam(':tdesc', $tdesc);
       $stmt->bindParam(':user_id', $user_id);
       
       
       
     
       $stmt->execute();
}

// Get Visa By Id
function getTicketRecordById($up_id){
   return getCnx()->query("SELECT * FROM tbl_visareservation WHERE visaId=$up_id");
  }
  
  // Update Visa Operation
function updateTicketRecord($up_id,$up_cusid,$up_vdate,$up_duration,$up_country,$up_passno,$up_issby,$up_issdate,$up_passexdate,$up_cprice,$up_sellprice,$up_profit,$up_desc,$up_user_id)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_visareservation SET customerId=:up_cusid,visaDate=:up_vdate,duration=:up_duration,country=:up_country,passportNo=:up_passno,issuedBy=:up_issby,issuDate=:up_issdate,passportExpireDate=:up_passexdate,costprice=:up_cprice,sellPrice=:up_sellprice,profit=:up_profit,visaDescription=:up_desc,visaCreateBy=:up_user_id WHERE visaId = :up_id");

          $stmt->bindParam(':up_id', $up_id);
          $stmt->bindParam(':up_cusid', $up_cusid);
          $stmt->bindParam(':up_vdate', $up_vdate);
          $stmt->bindParam(':up_duration', $up_duration);
          $stmt->bindParam(':up_country', $up_country);
          $stmt->bindParam(':up_passno', $up_passno);
          $stmt->bindParam(':up_issby', $up_issby);
          $stmt->bindParam(':up_issdate', $up_issdate);
          $stmt->bindParam(':up_passexdate', $up_passexdate);
          $stmt->bindParam(':up_cprice', $up_cprice);
          $stmt->bindParam(':up_sellprice', $up_sellprice);
          $stmt->bindParam(':up_profit', $up_profit);
          $stmt->bindParam(':up_desc', $up_desc);
          $stmt->bindParam(':up_user_id', $up_user_id);
          
          
          $stmt->execute();
      }

      // Delete Visa Operation
      function deleteTicketRecord($del_id)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_visareservation SET  FinishDate=now() WHERE visaId = :del_id");

          $stmt->bindParam(':del_id', $del_id);
          $stmt->execute();
      }
      // end of Ticket Operation

      // Ticket Operations

      // Ticket View
      function getCargoRecords($id){
  return getCnx()->query("SELECT * FROM tbl_cargo cr,tbl_customers c, tbl_employee em,tbl_packagetype p where cr.customerId=c.CustomerId and cr.cargoCreateBy=em.EmployeeId and cr.packageTypeId=p.packageTypeId and cr.CustomerId='$id' and cr.FinishDate is null");
 }
      // end of Ticket View
      // Add Ticket operation
      function addCargoRecord($crcustid,$package,$pkg,$crcprice,$crsprice,$crprofit,$crdesfrom,$crdesto,$crairline,$tdate,$gdate,$rname,$rtell,$raddr,$crdesc,$user_id)
{
 $stmt= getCnx()->prepare("INSERT INTO tbl_cargo(CustomerId, packageTypeId, packageKg, costPrice, sellPrice, profit,destanationFrom,destanationTo,airLineId,takingDate,gettingDate,reciverName,reciverTell,reciverAddress,cargoDescription,cargoCreateBy,cargoCreateDate)
   VALUES(:crcustid,:package,:pkg,:crcprice,:crsprice,:crprofit,:crdesfrom,:crdesto,:crairline,:tdate,:gdate,:rname,:rtell,:raddr,:crdesc,:user_id,now())");

       $stmt->bindParam(':crcustid', $crcustid);
       $stmt->bindParam(':package', $package);
       $stmt->bindParam(':pkg', $pkg);
       $stmt->bindParam(':crcprice', $crcprice);
       $stmt->bindParam(':crsprice', $crsprice);
       $stmt->bindParam(':crprofit', $crprofit);
       $stmt->bindParam(':crdesfrom', $crdesfrom);
       $stmt->bindParam(':crdesto', $crdesto);
       $stmt->bindParam(':crairline', $crairline);
       $stmt->bindParam(':tdate', $tdate);
       $stmt->bindParam(':gdate', $gdate);
       $stmt->bindParam(':rname', $rname);
       $stmt->bindParam(':rtell', $rtell);
       $stmt->bindParam(':raddr', $raddr);
       $stmt->bindParam(':crdesc', $crdesc);
       $stmt->bindParam(':user_id', $user_id);
       
       
       
     
       $stmt->execute();
}

// Get Visa By Id
function getCargoRecordById($up_id){
   return getCnx()->query("SELECT * FROM tbl_visareservation WHERE visaId=$up_id");
  }
  
  // Update Visa Operation
function updateCargoRecord($up_id,$up_cusid,$up_vdate,$up_duration,$up_country,$up_passno,$up_issby,$up_issdate,$up_passexdate,$up_cprice,$up_sellprice,$up_profit,$up_desc,$up_user_id)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_visareservation SET customerId=:up_cusid,visaDate=:up_vdate,duration=:up_duration,country=:up_country,passportNo=:up_passno,issuedBy=:up_issby,issuDate=:up_issdate,passportExpireDate=:up_passexdate,costprice=:up_cprice,sellPrice=:up_sellprice,profit=:up_profit,visaDescription=:up_desc,visaCreateBy=:up_user_id WHERE visaId = :up_id");

          $stmt->bindParam(':up_id', $up_id);
          $stmt->bindParam(':up_cusid', $up_cusid);
          $stmt->bindParam(':up_vdate', $up_vdate);
          $stmt->bindParam(':up_duration', $up_duration);
          $stmt->bindParam(':up_country', $up_country);
          $stmt->bindParam(':up_passno', $up_passno);
          $stmt->bindParam(':up_issby', $up_issby);
          $stmt->bindParam(':up_issdate', $up_issdate);
          $stmt->bindParam(':up_passexdate', $up_passexdate);
          $stmt->bindParam(':up_cprice', $up_cprice);
          $stmt->bindParam(':up_sellprice', $up_sellprice);
          $stmt->bindParam(':up_profit', $up_profit);
          $stmt->bindParam(':up_desc', $up_desc);
          $stmt->bindParam(':up_user_id', $up_user_id);
          
          
          $stmt->execute();
      }

      // Delete Visa Operation
      function deleteCargoRecord($del_id)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_visareservation SET  FinishDate=now() WHERE visaId = :del_id");

          $stmt->bindParam(':del_id', $del_id);
          $stmt->execute();
      }
      // End of Cargo Operation
?>