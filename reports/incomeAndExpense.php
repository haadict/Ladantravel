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
include 'reportClass.php';
?>
<style>
.nav-header {
    padding: 33px 25px;
    background: url(patterns/header-profilegg2.png) no-repeat;
}
	</style>
	
  <div class="wrapper wrapper-content">
  <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-card margin-b-30">
                                <!-- Start .panel -->
                                <div class="panel-heading">
                                    <h4 class="panel-title" align="center"> All reports</h4>
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form class="form-inline" align="center" id="prospects_form">
                                        <div class="form-group">
                                            <input type="date" id="startDate" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="date" id="endDate" class="form-control">
                                        </div>
                                   <button class="btn btn-primary" type="submit" onclick="searchReport();">Search in</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                      
                    </div>
        <div class="row">
		<div class="reportBox">
		<form id="prospects_form">
		<?php 
		$ticketsIncome=$visasIncome=$cargosIncome=$Bills=$Suppliers=$otherExpenses=0;
		$startDate = $endDate ="1";
		
		 $result = getTicketsIncomes();
		 while($row=$result->fetch()){
			 $ticketsIncome = $row["ticketAmount"];
			 $type="1";
			 echo '
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
		  $result1 = getVisasIncomes();
		 while($row1=$result1->fetch()){
			 $visasIncome = $row1["VisasAmount"];
			 echo '
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
		 $result2 = getCargosIncomes();
		 while($row2=$result2->fetch()){
			 $cargosIncome =$row2["CargosAmount"];
			 echo '
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
		  $result3 = getBills();
		 while($row3=$result3->fetch()){
			 $Bills =$row3["billsAmount"];
			 echo '
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
		  $result4 = getSupplier();
		 while($row4=$result4->fetch()){
			 $Suppliers =$row4["supplierAmount"];
			 echo '
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
		  $result5 = getOtherExpense();
		 while($row5=$result5->fetch()){
			 $otherExpenses =$row5["otherAmount"];
			 echo '
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
			 echo '
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
			  echo '
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
			 
			 
		?>
                    
                   
            </form>        
        </div>
		</div>
        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Reports</h5>
                                        <div class="ibox-tools">
                                            <a class="collapse-link">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>
                                            <a class="close-link">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ibox-content">

                                        <div class="row">
                                            <div class="col-lg-12">
                                               <div class="reports"></div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div id="world-map" style="height: 300px;"></div>
                                            </div>
                                    </div>
                                    </div>
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
        <div id="right-sidebar">
            <div class="sidebar-container">

                <ul class="nav nav-tabs navs-3">

                    <li class="active"><a data-toggle="tab" href="#tab-1">
                        Notes
                    </a></li>
                    <li><a data-toggle="tab" href="#tab-2">
                        Projects
                    </a></li>
                    <li class=""><a data-toggle="tab" href="#tab-3">
                        <i class="fa fa-gear"></i>
                    </a></li>
                </ul>

                <div class="tab-content">


                    <div id="tab-1" class="tab-pane active">

                        <div class="sidebar-title">
                            <h3> <i class="fa fa-comments-o"></i> Latest Notes</h3>
                            <small><i class="fa fa-tim"></i> You have 10 new message.</small>
                        </div>

                        <div>

                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a1.jpg">

                                        <div class="m-t-xs">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">

                                        There are many variations of passages of Lorem Ipsum available.
                                        <br>
                                        <small class="text-muted">Today 4:21 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a2.jpg">
                                    </div>
                                    <div class="media-body">
                                        The point of using Lorem Ipsum is that it has a more-or-less normal.
                                        <br>
                                        <small class="text-muted">Yesterday 2:45 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a3.jpg">

                                        <div class="m-t-xs">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        Mevolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                        <br>
                                        <small class="text-muted">Yesterday 1:10 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a4.jpg">
                                    </div>

                                    <div class="media-body">
                                        Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the
                                        <br>
                                        <small class="text-muted">Monday 8:37 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a8.jpg">
                                    </div>
                                    <div class="media-body">

                                        All the Lorem Ipsum generators on the Internet tend to repeat.
                                        <br>
                                        <small class="text-muted">Today 4:21 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a7.jpg">
                                    </div>
                                    <div class="media-body">
                                        Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                                        <br>
                                        <small class="text-muted">Yesterday 2:45 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a3.jpg">

                                        <div class="m-t-xs">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        The standard chunk of Lorem Ipsum used since the 1500s is reproduced below.
                                        <br>
                                        <small class="text-muted">Yesterday 1:10 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a4.jpg">
                                    </div>
                                    <div class="media-body">
                                        Uncover many web sites still in their infancy. Various versions have.
                                        <br>
                                        <small class="text-muted">Monday 8:37 pm</small>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>

                    <div id="tab-2" class="tab-pane">

                        <div class="sidebar-title">
                            <h3> <i class="fa fa-cube"></i> Latest projects</h3>
                            <small><i class="fa fa-tim"></i> You have 14 projects. 10 not completed.</small>
                        </div>

                        <ul class="sidebar-list">
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9 hours ago</div>
                                    <h4>Business valuation</h4>
                                    It is a long established fact that a reader will be distracted.

                                    <div class="small">Completion with: 22%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 22%;" class="progress-bar progress-bar-warning"></div>
                                    </div>
                                    <div class="small text-muted m-t-xs">Project end: 4:00 pm - 12.06.2014</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9 hours ago</div>
                                    <h4>Contract with Company </h4>
                                    Many desktop publishing packages and web page editors.

                                    <div class="small">Completion with: 48%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 48%;" class="progress-bar"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9 hours ago</div>
                                    <h4>Meeting</h4>
                                    By the readable content of a page when looking at its layout.

                                    <div class="small">Completion with: 14%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 14%;" class="progress-bar progress-bar-info"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-primary pull-right">NEW</span>
                                    <h4>The generated</h4>
                                    <!--<div class="small pull-right m-t-xs">9 hours ago</div>-->
                                    There are many variations of passages of Lorem Ipsum available.
                                    <div class="small">Completion with: 22%</div>
                                    <div class="small text-muted m-t-xs">Project end: 4:00 pm - 12.06.2014</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9 hours ago</div>
                                    <h4>Business valuation</h4>
                                    It is a long established fact that a reader will be distracted.

                                    <div class="small">Completion with: 22%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 22%;" class="progress-bar progress-bar-warning"></div>
                                    </div>
                                    <div class="small text-muted m-t-xs">Project end: 4:00 pm - 12.06.2014</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9 hours ago</div>
                                    <h4>Contract with Company </h4>
                                    Many desktop publishing packages and web page editors.

                                    <div class="small">Completion with: 48%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 48%;" class="progress-bar"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9 hours ago</div>
                                    <h4>Meeting</h4>
                                    By the readable content of a page when looking at its layout.

                                    <div class="small">Completion with: 14%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 14%;" class="progress-bar progress-bar-info"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-primary pull-right">NEW</span>
                                    <h4>The generated</h4>
                                    <!--<div class="small pull-right m-t-xs">9 hours ago</div>-->
                                    There are many variations of passages of Lorem Ipsum available.
                                    <div class="small">Completion with: 22%</div>
                                    <div class="small text-muted m-t-xs">Project end: 4:00 pm - 12.06.2014</div>
                                </a>
                            </li>

                        </ul>

                    </div>

                    <div id="tab-3" class="tab-pane">

                        <div class="sidebar-title">
                            <h3><i class="fa fa-gears"></i> Settings</h3>
                            <small><i class="fa fa-tim"></i> You have 14 projects. 10 not completed.</small>
                        </div>

                        <div class="setings-item">
                    <span>
                        Show notifications
                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example">
                                    <label class="onoffswitch-label" for="example">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                    <span>
                        Disable Chat
                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" checked class="onoffswitch-checkbox" id="example2">
                                    <label class="onoffswitch-label" for="example2">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                    <span>
                        Enable history
                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example3">
                                    <label class="onoffswitch-label" for="example3">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                    <span>
                        Show charts
                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example4">
                                    <label class="onoffswitch-label" for="example4">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                    <span>
                        Offline users
                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" checked name="collapsemenu" class="onoffswitch-checkbox" id="example5">
                                    <label class="onoffswitch-label" for="example5">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                    <span>
                        Global search
                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" checked name="collapsemenu" class="onoffswitch-checkbox" id="example6">
                                    <label class="onoffswitch-label" for="example6">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                    <span>
                        Update everyday
                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example7">
                                    <label class="onoffswitch-label" for="example7">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-content">
                            <h4>Settings</h4>
                            <div class="small">
                                I belive that. Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                And typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                            </div>
                        </div>

                    </div>
                </div>

            </div>



        </div>
    </div>
	
<script>
function searchReport(){
	var startDate = $("#startDate").val();
	var endDate = $("#endDate").val();
	 // Search records
    $.post("searchFinanceReport.php", {
        startDate: startDate,
        endDate: endDate
    }, function (data, status) {
        // close the popup
         $(".reportBox").html(data);

    });
	
}
function readallTickets(startDate,endDate){

	if(startDate==1 && endDate==1){
	$.get("readAllTickets.php", {}, function (data, status) {
      $(".reports").html(data);
    });
	}
	else{
		$.post("readAllTickets.php", {
        startDate: startDate,
        endDate: endDate
    }, function (data, status) {
        // close the popup
         $(".reports").html(data);

    });
	}
}
function readallVisas(startDate,endDate){
	if(startDate==1 && endDate==1){
	$.get("readallVisas.php", {}, function (data, status) {
      $(".reports").html(data);
    });
	}
	else{
		$.post("readallVisas.php", {
        startDate: startDate,
        endDate: endDate
    }, function (data, status) {
        // close the popup
         $(".reports").html(data);

    });
	}
}
function readallCargos(startDate,endDate){
	if(startDate==1 && endDate==1){
	$.get("readallCargos.php", {}, function (data, status) {
      $(".reports").html(data);
    });
	}
	else{
		$.post("readallCargos.php", {
        startDate: startDate,
        endDate: endDate
    }, function (data, status) {
        // close the popup
         $(".reports").html(data);

    });
	}
}
function readallBills(startDate,endDate){

	if(startDate==1 && endDate==1){
	$.get("readallBills.php", {}, function (data, status) {
      $(".reports").html(data);
    });
	}
	else{
		$.post("readallBills.php", {
        startDate: startDate,
        endDate: endDate
    }, function (data, status) {
        // close the popup
         $(".reports").html(data);

    });
	}
}
function readSupplier(startDate,endDate){

	if(startDate==1 && endDate==1){
	$.get("readSupplierPay.php", {}, function (data, status) {
      $(".reports").html(data);
    });
	}
	else{
		$.post("readSupplierPay.php", {
        startDate: startDate,
        endDate: endDate
    }, function (data, status) {
        // close the popup
         $(".reports").html(data);

    });
	}
}
function readOtherExpense(startDate,endDate){

	if(startDate==1 && endDate==1){
	$.get("readOtherExpense.php", {}, function (data, status) {
      $(".reports").html(data);
    });
	}
	else{
		$.post("readOtherExpense.php", {
        startDate: startDate,
        endDate: endDate
    }, function (data, status) {
        // close the popup
         $(".reports").html(data);

    });
	}
}
$("#prospects_form").submit(function(e) {
    e.preventDefault();
});

</script>