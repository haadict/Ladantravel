<?php
 if(isset($_POST))
    {
		$startDate = $_POST["startDate"];
		$endDate = $_POST["endDate"];
    // include Database connection files
    include("reportClass.php");
     $data ="";
     $tickets = $visas = $cargos =$allActivity= 0;
		 $result = getCustomersByDate($startDate,$endDate);
		 while($row=$result->fetch()){
			 $tickets = $row["allCustomers"];
			 $data .= '
			 <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                               <!-- <span class="label label-success pull-right">Monthly</span>-->
							   <i class="fa fa-ticket pull-right" aria-hidden="true"></i>
                                <h5><a onclick="readallCustomers(\''.$startDate.'\',\''.$endDate.'\')">Customers</a></h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">'.$row["allCustomers"].'</h1>
                                <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                                <small>Total Customers</small>
                            </div>
                        </div>
                    </div>
			 ';
		 }
	$result1 = getTicketsPendingByDate($startDate,$endDate);
		 while($row1=$result1->fetch()){
			 $visas = $row1["ticketsPending"];
			 $data .='
			<div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <i class="fa fa-cc-visa pull-right" aria-hidden="true"></i>
                                <h5><a onclick="readTicketsPending(\''.$startDate.'\',\''.$endDate.'\')">Tickets Pending</a></h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">'.$row1["ticketsPending"].'</h1>
                                <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                                <small>All Visas</small>
                            </div>
                        </div>
                    </div>
			 ';
		 }
		$result2 = getVisasPendingByDate($startDate,$endDate);
		 while($row2=$result2->fetch()){
			 $cargos =$row2["visasPending"];
			 $data .='
			 <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <i class="fa fa-truck pull-right" aria-hidden="true"></i>
                                <h5><a onclick="readVisasPending(\''.$startDate.'\',\''.$endDate.'\')">Visas Pending</a></h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">'.$row2["visasPending"].'</h1>
                                <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                                <small>All Visas</small>
                            </div>
                        </div>
                    </div>
			 ';
		 }
		 $result3 = getCargosPendingByDate($startDate,$endDate);
		 while($row3=$result3->fetch()){
			 $cargos =$row3["cargosPending"];
			 $data .='
			 <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <i class="fa fa-truck pull-right" aria-hidden="true"></i>
                                <h5><a onclick="readCargosPending(\''.$startDate.'\',\''.$endDate.'\')">Cargos Pending</a></h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">'.$row3["cargosPending"].'</h1>
                                <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                                <small>All Cargos</small>
                            </div>
                        </div>
                    </div>
			 ';
		 }
   
	
    echo $data;
	}
?>
