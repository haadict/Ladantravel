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
include 'invoiceScript.js';
include 'invoiceClass.php';
?>
<style>
.nav-header {
    padding: 33px 25px;
    background: url(patterns/header-profilegg2.png) no-repeat;
}
 .table {
   border-collapse: collapse !important;
 }
 .table td,
 .table th {
   background-color: #FFF !important;
 }
 .table-bordered th,
 .table-bordered td {
   border: 1px solid #dee2e6 !important;
 }
 .table-dark {
   color: inherit;
 }
 .table-dark th,
 .table-dark td,
 .table-dark thead th,
 .table-dark tbody + tbody {
   border-color: #dee2e6;
 }
 .table .thead-dark th {
   color: inherit;
   border-color: #dee2e6;
 }
}

table.dataTable {
 clear: both;
 margin-top: 6px !important;
 margin-bottom: 6px !important;
 max-width: none !important;
}

table.dataTable td,
table.dataTable th {
 -webkit-box-sizing: content-box;
 box-sizing: content-box;
}

table.dataTable td.dataTables_empty,
table.dataTable th.dataTables_empty {
 text-align: center;
}

table.dataTable.nowrap th,
table.dataTable.nowrap td {
 white-space: nowrap;
}

.tile div.dataTables_wrapper {
 padding: 0;
}

div.dataTables_wrapper div.dataTables_length label {
 font-weight: normal;
 text-align: left;
 white-space: nowrap;
}

div.dataTables_wrapper div.dataTables_length select {
 width: 75px;
 display: inline-block;
}

div.dataTables_wrapper div.dataTables_filter {
 text-align: right;
}

div.dataTables_wrapper div.dataTables_filter label {
 font-weight: normal;
 white-space: nowrap;
 text-align: left;
}

div.dataTables_wrapper div.dataTables_filter input {
 margin-left: 0.5em;
 display: inline-block;
 width: auto;
}

div.dataTables_wrapper div.dataTables_info {
 padding-top: 0.85em;
 white-space: nowrap;
}

div.dataTables_wrapper div.dataTables_paginate {
 margin: 0;
 white-space: nowrap;
 text-align: right;
}

div.dataTables_wrapper div.dataTables_paginate ul.pagination {
 margin: 2px 0;
 white-space: nowrap;
 -webkit-box-pack: end;
     -ms-flex-pack: end;
         justify-content: flex-end;
}

div.dataTables_wrapper div.dataTables_processing {
 position: absolute;
 top: 50%;
 left: 50%;
 width: 200px;
 margin-left: -100px;
 margin-top: -26px;
 text-align: center;
 padding: 1em 0;
}

table.dataTable thead > tr > th.sorting_asc, table.dataTable thead > tr > th.sorting_desc, table.dataTable thead > tr > th.sorting,
table.dataTable thead > tr > td.sorting_asc,
table.dataTable thead > tr > td.sorting_desc,
table.dataTable thead > tr > td.sorting {
 padding-right: 30px;
}

table.dataTable thead > tr > th:active,
table.dataTable thead > tr > td:active {
 outline: none;
}

table.dataTable thead .sorting,
table.dataTable thead .sorting_asc,
table.dataTable thead .sorting_desc,
table.dataTable thead .sorting_asc_disabled,
table.dataTable thead .sorting_desc_disabled {
 cursor: pointer;
 position: relative;
}

table.dataTable thead .sorting:before, table.dataTable thead .sorting:after,
table.dataTable thead .sorting_asc:before,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_desc:before,
table.dataTable thead .sorting_desc:after,
table.dataTable thead .sorting_asc_disabled:before,
table.dataTable thead .sorting_asc_disabled:after,
table.dataTable thead .sorting_desc_disabled:before,
table.dataTable thead .sorting_desc_disabled:after {
 position: absolute;
 bottom: 0.9em;
 display: block;
 opacity: 0.3;
}

table.dataTable thead .sorting:before,
table.dataTable thead .sorting_asc:before,
table.dataTable thead .sorting_desc:before,
table.dataTable thead .sorting_asc_disabled:before,
table.dataTable thead .sorting_desc_disabled:before {
 right: 1em;
 content: "\2191";
}

table.dataTable thead .sorting:after,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_desc:after,
table.dataTable thead .sorting_asc_disabled:after,
table.dataTable thead .sorting_desc_disabled:after {
 right: 0.5em;
 content: "\2193";
}

table.dataTable thead .sorting_asc:before,
table.dataTable thead .sorting_desc:after {
 opacity: 1;
}

table.dataTable thead .sorting_asc_disabled:before,
table.dataTable thead .sorting_desc_disabled:after {
 opacity: 0;
}

div.dataTables_scrollHead table.dataTable {
 margin-bottom: 0 !important;
}

div.dataTables_scrollBody table {
 border-top: none;
 margin-top: 0 !important;
 margin-bottom: 0 !important;
}

div.dataTables_scrollBody table thead .sorting:after,
div.dataTables_scrollBody table thead .sorting_asc:after,
div.dataTables_scrollBody table thead .sorting_desc:after {
 display: none;
}

div.dataTables_scrollBody table tbody tr:first-child th,
div.dataTables_scrollBody table tbody tr:first-child td {
 border-top: none;
}

div.dataTables_scrollFoot > .dataTables_scrollFootInner {
 -webkit-box-sizing: content-box;
         box-sizing: content-box;
}

div.dataTables_scrollFoot > .dataTables_scrollFootInner > table {
 margin-top: 0 !important;
 border-top: none;
}

@media screen and (max-width: 767px) {
 div.dataTables_wrapper div.dataTables_length,
 div.dataTables_wrapper div.dataTables_filter,
 div.dataTables_wrapper div.dataTables_info,
 div.dataTables_wrapper div.dataTables_paginate {
   text-align: center;
 }
}

table.dataTable.table-sm > thead > tr > th {
 padding-right: 20px;
}

table.dataTable.table-sm .sorting:before,
table.dataTable.table-sm .sorting_asc:before,
table.dataTable.table-sm .sorting_desc:before {
 top: 5px;
 right: 0.85em;
}

table.dataTable.table-sm .sorting:after,
table.dataTable.table-sm .sorting_asc:after,
table.dataTable.table-sm .sorting_desc:after {
 top: 5px;
}

table.table-bordered.dataTable th,
table.table-bordered.dataTable td {
 border-left-width: 0;
}

table.table-bordered.dataTable th:last-child, table.table-bordered.dataTable th:last-child,
table.table-bordered.dataTable td:last-child,
table.table-bordered.dataTable td:last-child {
 border-right-width: 0;
}

table.table-bordered.dataTable tbody th,
table.table-bordered.dataTable tbody td {
 border-bottom-width: 0;
}

div.dataTables_scrollHead table.table-bordered {
 border-bottom-width: 0;
}

div.table-responsive > div.dataTables_wrapper > div.row {
 margin: 0;
}

div.table-responsive > div.dataTables_wrapper > div.row > div[class^="col-"]:first-child {
 padding-left: 0;
}

div.table-responsive > div.dataTables_wrapper > div.row > div[class^="col-"]:last-child {
 padding-right: 0;
}


	</style>
   <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Invoices Form</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Tables</a>
                        </li>
                        <li class="active">
                            <strong>Invoices Form</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Adding Invoices</h5>
						<?php
						$startN0 = "";
						$prefix = "";
						$InvoiceNo =0;
			$response = getInvoiceNo();
			 if($response->rowcount()>0){
			while($row1=$response->fetch()){
				$invoiceNo = ((int)$row1["invoiceNo"])+1;
				echo'
				 <h5 style="margin-left:34%;">Invoice No : '.$row1["Prefix"].$invoiceNo.'</h5>
				';
			 }
			 }
			else{
				ECHO '<h5 style="margin-left:34%;">Invoice No : First One</h5>';
				$startN0 = "Start";
				$prefix = "Begin";
			}
			?>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                     <div class="table-responsive">
					 <div align="center">
					 <div style="width:30%;">
          <select class="form-control" id="custom_Id">
            <option value="">select Customer</option>
			<?php
			$result = getCustomers();
			while($row=$result->fetch()){
				echo'
				 <option value="'.$row["CustomerId"].'">'.$row["CustomerName"].'</option>
				';
			}
			?>
          </select>
                      </div></div>
                                       <div align="right">
                                        <abbre title="Add New Row"><button type="button" onclick="newRow();"  class="btn btn-success btn-xs">+</button></abbr>
                                      </div><br>
									  
   <table class="table table-bordered" id="crud_table">
    <tr>
    </tr>
    <tbody id="descriptionAnalysis" class="col-xl-12">
       
    <div class="row">
	<input type="hidden" id="InvoiceNoStart" value="<?php echo $startN0?>">
      <td>
          <label>Service Type</label>
          <select class="form-control" id="service_id">
			<option value="Ticket">Select Service</option>
            <option value="Ticket">Ticket</option>
			 <option value="Visa">Visa</option>
			  <option value="Cargo">Cargo</option>
          </select>
      <td>
          <label>Quantity</label>
          <input type="text" id="quantity" class="form-control" placeholder="Enter qauntity" required>
      </td>
      <td>
        <label>$ Amount</label>
         <input type="text" id="amount" class="form-control" placeholder="Enter Amount" required>
      </td>
	   <td>
        <label>Total</label>
         <input type="text" id="total" class="form-control" disabled>
      </td>
    </div>
    </tbody>
   </table>
   <div class="pull-right">Net Total : <input type="text" id="netTotal"  value="0" disabled></div>
   <div align="center">
    <button type="button" name="save" onclick="saveAnalysis('<?php echo $_SESSION["EmployeeId"];?>');" class="btn btn-info">Save</button>
   </div>
   <br />
   <div id="inserted_item_data"></div>
   
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
                <strong>Copyright</strong> Ladan Travel Agency &copy; 2020
            </div>
        </div>

        </div>
        </div>
		<!-- Mainly scripts -->
    <script src="../Assets/js/jquery-2.1.1.js"></script>
    <script src="../Assets/js/bootstrap.min.js"></script>
    <script src="../Assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../Assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../Assets/js/plugins/jeditable/jquery.jeditable.js"></script>

    <script src="../Assets/js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../Assets/js/inspinia.js"></script>
    <script src="../Assets/js/plugins/pace/pace.min.js"></script>
  
<script>

var i = 1;
function newRow() {
  $('#descriptionAnalysis').append('<tr>'+
  
  '<td><label>Service Type</label>'+
  '<select class="form-control" id="service_id'+i+'">'+
  '<option value="">Select Service</option>'+
    '<option value="">Ticket</option>'+
	'<option value="">Visa</option>'+
	'<option value="">Cargo</option>'+
  '<td><label>Quantity</label>'+
  '<input type="text" id="quantity'+i+'" class="form-control" placeholder="Enter qauntity" required></td>'+
  '<td><label>Amount</label>'+
  '<input type="text" id="amount'+i+'" onkeyup="myFunction()" class="form-control" placeholder="Enter Amount" required></td>'+
   '<td><label>Total</label>'+
  '<input type="text" id="total'+i+'" class="form-control" placeholder="" disabled></td>'+
    '</tr>');

  i++;
}
</script>
