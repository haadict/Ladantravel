<?php
include '../connection/dbcon.php';
function getRecords(){
  return getCnx()->query("SELECT * FROM tbl_employee em,tbl_company c, tbl_branch br where em.EmployeeCompanyID=c.companyId and em.EmployeeBranchID=br.BranchId and em.FinishDate is null");
 }
 
function addRecord($empname,$empgender,$emptell,$empadrr,$empemail,$emptitle,$empsalary,$comid,$branchid)
{
 $stmt= getCnx()->prepare("INSERT INTO tbl_employee(EmployeeName, EmployeeGender, EmployeePhone, EmployeeAddress, EmployeeEmail, EmployeeTitle,EmployeeSalary,EmployeeCompanyID,EmployeeBranchID,EmployeeCreateDate)
   VALUES (:empname,:empgender,:emptell,:empadrr,:empemail,:emptitle,:empsalary,:comid,:branchid,now())");

       $stmt->bindParam(':empname', $empname);
       $stmt->bindParam(':empgender', $empgender);
       $stmt->bindParam(':emptell', $emptell);
       $stmt->bindParam(':empadrr', $empadrr);
       $stmt->bindParam(':empemail', $empemail);
       $stmt->bindParam(':emptitle', $emptitle);
       $stmt->bindParam(':empsalary', $empsalary);
       $stmt->bindParam(':comid', $comid);
       $stmt->bindParam(':branchid', $branchid);
       
	   
       $stmt->execute();
}

function getRecordById($up_id){
   return getCnx()->query("SELECT * FROM tbl_employee WHERE EmployeeId=$up_id");
  }
  
function updateRecord($up_id,$up_empname,$up_empgender,$up_emptell,$up_empadrr,$up_empemail,$up_emptitle,$up_empsalary,$up_comid,$up_branchid)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_employee SET  EmployeeName=:up_empname,EmployeeGender=:up_empgender,EmployeePhone=:up_emptell,EmployeeAddress=:up_empadrr,EmployeeEmail=:up_empemail,EmployeeTitle=:up_emptitle,EmployeeSalary=:up_empsalary,EmployeeCompanyID=:up_comid,EmployeeBranchID=:up_branchid WHERE EmployeeId = :up_id");

          $stmt->bindParam(':up_id', $up_id);
          $stmt->bindParam(':up_empname', $up_empname);
          $stmt->bindParam(':up_empgender', $up_empgender);
          $stmt->bindParam(':up_emptell', $up_emptell);
          $stmt->bindParam(':up_empadrr', $up_empadrr);
          $stmt->bindParam(':up_empemail', $up_empemail);
          $stmt->bindParam(':up_emptitle', $up_emptitle);
          $stmt->bindParam(':up_empsalary', $up_empsalary);
          $stmt->bindParam(':up_comid', $up_comid);
          $stmt->bindParam(':up_branchid', $up_branchid);
          
          $stmt->execute();
      }
      function deleteRecord($del_id)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_employee SET  FinishDate=now() WHERE EmployeeId = :del_id");

          $stmt->bindParam(':del_id', $del_id);
          $stmt->execute();
      }
?>