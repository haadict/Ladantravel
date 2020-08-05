<?php
 if(isset($_POST))
    {
		$startDate = $_POST["startDate"];
		$endDate = $_POST["endDate"];
    // include Database connection files
    include("reportClass.php");
     $data ="";
		 $result = getTicketsListByDate($startDate,$endDate);
		 while($row=$result->fetch()){
			
			 $data .= '
			 <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                               <!-- <span class="label label-success pull-right">Monthly</span>-->
							   <i class="fa fa-ticket pull-right" aria-hidden="true"></i>
                                <h5>Tickets</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">'.$row["Tickets"].'</h1>
                                <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                                <small>Total Tickets</small>
                            </div>
                        </div>
                    </div>
			 ';
		 }
	$result1 = getVisasByDate($startDate,$endDate);
		 while($row1=$result1->fetch()){
			 $visas = $row1["Visas"];
			 $data .= '
			<div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <i class="fa fa-cc-visa pull-right" aria-hidden="true"></i>
                                <h5>Visas</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">'.$row1["Visas"].'</h1>
                                <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                                <small>All Visas</small>
                            </div>
                        </div>
                    </div>
			 ';
		 }
		$result2 = getCargosByDate($startDate,$endDate);
		 while($row2=$result2->fetch()){
			 $cargos =$row2["Cargos"];
			$data .= '
			 <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <i class="fa fa-truck pull-right" aria-hidden="true"></i>
                                <h5>Cargos</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">'.$row2["Cargos"].'</h1>
                                <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                                <small>All Cargos</small>
                            </div>
                        </div>
                    </div>
			 ';
		 }
		 $allActivity = $tickets + $visas + $cargos;
			 $data .= '
			 <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <i class="fa fa-ticket pull-right" aria-hidden="true"></i><i class="fa fa-cc-visa pull-right" aria-hidden="true"></i>
								<i class="fa fa-truck pull-right" aria-hidden="true"></i>
                                <h5>All activities</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">'.$allActivity .'</h1>
                                <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                                <small>All activities</small>
                            </div>
                        </div>
            </div>
			 ';
   
    $data .= '</table>';
	
    echo $data;
	}
?>
