<?php 
session_start(); 
$Name = "";
$usertype =""; 
 if(isset($_SESSION["Name"]) && isset($_SESSION["userType"]) && isset($_SESSION["EmployeeId"]))
 {  
	$Name = $_SESSION["Name"];
	$usertype = $_SESSION["userType"];
 }  
 else  
 {  
      header("location:../index");  
 }  
include '../includes/side.php';
include '../includes/script.js';
include '../includes/nav.php';
require 'function.php';
$empTotal=empTotal();
$custTotal=custTotal();
$visaTotal=visaTotal();
$ticketsTotal=ticketsTotal();
$cargoTotal=cargoTotal();
?>
<style>
.nav-header {
    padding: 33px 25px;
    background: url(patterns/header-profilegg2.png) no-repeat;
}
	</style>
  <div class="wrapper wrapper-content">
        <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <!-- <span class="label label-success pull-right">Monthly</span> -->
                                <h5>EMPLOYEES</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $empTotal; ?></h1>
                                <div class="stat-percent font-bold text-success"></div>
                                <small>Total Employee</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <a href="../Customer/customerList" style="color: #000;">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <!-- <span class="label label-info pull-right"></span> -->
                                <h5>CUSTOMERS</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $custTotal; ?></h1>
                                <div class="stat-percent font-bold text-info"></div>
                                <small>Total Customers</small>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a href="../reports/Reservation">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <!-- <span class="label label-primary pull-right">Today</span> -->
                                <h5>ALL SERVIES</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $visaTotal+$ticketsTotal+$cargoTotal; ?></h1>
                                <div class="stat-percent font-bold text-navy"></div>
                                <small>Total SERVIES</small>
                            </div>
                        </div>
                        </a>
                    </div>

        </div>

                </div>
                </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>
        </div>

        </div>
    </div>