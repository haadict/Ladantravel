<?php
 if(isset($_POST))
    {
		$startDate = $_POST["startDate"];
		$endDate = $_POST["endDate"];
    // include Database connection files
    include("reportClass.php");
     $data ="";
	  $ticketsIncome=$visasIncome=$cargosIncome=$Bills=$Suppliers=$otherExpenses=0;
     $tickets = $visas = $cargos =$allActivity= 0;
		$result = getTicketsAmountByDate($startDate,$endDate);
		 while($row=$result->fetch()){
			 $ticketsIncome = $row["ticketAmount"];
			 $data .= '
			<div class="col-lg-3" id="prospects">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                               <!-- <span class="label label-success pull-right">Monthly</span>-->
							   <i class="fa fa-ticket pull-right" aria-hidden="true"></i>
                                <h5><a onclick="readallTickets(\''.$startDate.'\',\''.$endDate.'\')">Tickets Income</a></h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">'.$row["ticketAmount"].'</h1>
                                <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                                <small>Total Tickets</small>
                            </div>
                        </div>
                    </div>
			 ';
		 }
	$result1 = getVisasAmountByDate($startDate,$endDate);
		 while($row1=$result1->fetch()){
			 $visasIncome = $row1["VisasAmount"];
			 $data .= '
			<div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <i class="fa fa-cc-visa pull-right" aria-hidden="true"></i>
                                <h5><a onclick="readallVisas(\''.$startDate.'\',\''.$endDate.'\')">Visas Income</a></h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">'.$row1["VisasAmount"].'</h1>
                                <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                                <small>All Visas</small>
                            </div>
                        </div>
                    </div>
			 ';
		 }
		$result2 = getCargosAmountByDate($startDate,$endDate);
		 while($row2=$result2->fetch()){
			 $cargosIncome =$row2["CargosAmount"];
			$data .= '
			  <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <i class="fa fa-truck pull-right" aria-hidden="true"></i>
                                <h5><a onclick="readallCargos(\''.$startDate.'\',\''.$endDate.'\')">Cargos Income</a></h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">'.$row2["CargosAmount"].'</h1>
                                <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                                <small>All Cargos</small>
                            </div>
                        </div>
                    </div>
			 ';
		 }
		 $result3 = getBillsAmountByDate($startDate,$endDate);
		 while($row3=$result3->fetch()){
			 $Bills =$row3["billsAmount"];
			 $data .='
			 <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <i class="fa fa-truck pull-right" aria-hidden="true"></i>
                                <h5><a onclick="readallBills(\''.$startDate.'\',\''.$endDate.'\')">Bills Expenses</a></h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">'.$row3["billsAmount"].'</h1>
                                <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                                <small>All Cargos</small>
                            </div>
                        </div>
                    </div>
			 ';
		 }
	$result4 = getSupplierAmountByDate($startDate,$endDate);
		 while($row4=$result4->fetch()){
			 $Suppliers =$row4["supplierAmount"];
			 $data .='
			 <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <i class="fa fa-truck pull-right" aria-hidden="true"></i>
                                <h5><a onclick="readSupplier(\''.$startDate.'\',\''.$endDate.'\')">Supplier Paying Expenses</a></h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">'.$row4["supplierAmount"].'</h1>
                                <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                                <small>All Cargos</small>
                            </div>
                        </div>
                    </div>
			 ';
		 }
		 $result5 = getOtherExpenseByDate($startDate,$endDate);
		 while($row5=$result5->fetch()){
			 $otherExpenses =$row5["otherAmount"];
			$data .='
			 <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <i class="fa fa-truck pull-right" aria-hidden="true"></i>
                                <h5><a onclick="readOtherExpense(\''.$startDate.'\',\''.$endDate.'\')">Other Expenses</a></h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">'.$row5["otherAmount"].'</h1>
                                <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                                <small>All Cargos</small>
                            </div>
                        </div>
                    </div>
			 ';
		 }
		 $allIncome = $ticketsIncome+$visasIncome+$cargosIncome;
		 $allExpenses= $Bills+$Suppliers+$otherExpenses;
			 $data .='
			 <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <i class="fa fa-ticket pull-right" aria-hidden="true"></i><i class="fa fa-cc-visa pull-right" aria-hidden="true"></i>
								<i class="fa fa-truck pull-right" aria-hidden="true"></i>
                                <h5>ALL INCOME</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">'.$allIncome .'</h1>
                                <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                                <small>All activities</small>
                            </div>
                        </div>
            </div>
			 ';
			  $data .='
			 <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <i class="fa fa-ticket pull-right" aria-hidden="true"></i><i class="fa fa-cc-visa pull-right" aria-hidden="true"></i>
								<i class="fa fa-truck pull-right" aria-hidden="true"></i>
                                <h5>ALL EXPENSES</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">'.$allExpenses .'</h1>
                                <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                                <small>All activities</small>
                            </div>
                        </div>
            </div>
			 ';
   
    echo $data;
	}
?>
