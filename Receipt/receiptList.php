
	<?php 
  include("../session.php"); 
  include '../includes/side.php';
  include '../includes/script.js';
  include '../includes/nav.php';
  include 'receiptScript.js';
  include 'receipt_Class.php';
  ?>
    <style>
.nav-header {
    padding: 33px 25px;
    background: url(patterns/header-profilegg2gbn.png) no-repeat;
}
</style>
   <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Receipt Tables</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index">Home</a>
                        </li>
                        <li>
                            <a>Tables</a>
                        </li>
                        <li class="active">
                            <strong>Receipt Tables</strong>
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
                        <h5>All Receipt List</h5>
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

						<button class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#addModal" style="margin-top:20px;;" type="button"><i class="fa fa-plus fa-lg"></i>&nbsp;Add</button>
                    <table class="table table-striped table-bordered table-hover dataTables-example" id="tbl" >
                    <thead>
                    <tr>
                        <th>No</th>
                       <th>Invoice</th>
                       <th>Amount</th>
                       <th>Paid</th>
                       <th>Balance</th>
                       <th>pymentMethod</th>
                       <th>ReciptDate</th>
                       <th>ReceiptCreateDate</th>
                        
						<th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php 
					 $result = getRecords();
					 $i=0;
					 while($row=$result->fetch()){
						 $i++;
						 echo '
						  <tr>
						    <td>'.$i.'</td>
							<td>'.$row["invoiceId"].'</td>
							<td>'.$row["Amount"].'</td>
             <td>'.$row["Paid"].'</td>
             <td>'.$row["Balance"].'</td>
             <td>'.$row["pymentMethod"].'</td>
             <td>'.$row["ReciptDate"].'</td>
             <td>'.$row["ReceiptCreateDate"].'</td>
                            
                            
							<td>
							<button class="btn btn-info btn-circle" type="button" onclick="GetUpdateDetails('.$row["receiptId"].')"><i class="fa fa-check"></i>
                            </button>
							<button class="btn btn-warning btn-circle delete" type="button" onclick="GetDelete('.$row["receiptId"].')"><i class="fa fa-times"></i>
                            </button>
							</td>
						  </tr>
						 ';
					 }
					
					?>
                    
                    </tbody>
                    
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
      
        </div>
		<div id="addModal" class="modal fade">
 <div class="modal-dialog">
  <form method="post" id="addform" enctype="multipart/form-data">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Add Reciept</h4>
    </div>
    <div class="modal-body">
     <label>Invoice</label>
        <select name="inv" id="inv"  class="form-control" required='true'><option value=" ">Invoice No</option>
                    <?php
                    include("./connection/dbcon.php");
                    $query = "select * from tbl_invoice";
                    $stm = $dbcon->prepare($query);
                    $stm->execute();
                    $result = $stm->fetchAll();
                    $data = array();
                    $filtered_rows = $stm->rowCount();
                    // $res=mysqli_query($con,"select * from shifts" );
                    foreach($result as $row)
                    {
                    ?> 
              <option value="<?php echo $row["invoiceId"];?>"><?php echo $row["invoiceId"];?></option>  
              <?php } ?> 
             </select>     <br />
     <label>Amount</label>
     <input type="text" name="amount" id="amount" class="form-control" required="true"/>
     <br />
     <label>Paid</label>
     <input type="text" name="paid" id="paid" class="form-control" required="true"/>
     <br />
     <label>Balance</label>
     <input type="text" name="blance" id="blance" class="form-control" required="true"/>
     <br />
     <label>pymentMethod</label>
     <input type="text" name="pm" id="pm" class="form-control" required="true"/>
     <br />
     <label>ReciptDate</label>
     <input type="date" name="recdate" id="recdate" class="form-control" required="true"/>
     <br />

     
    
    </div>
    <div class="modal-footer">
     <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION["EmployeeId"];?>"/>
     <input type="submit"   onclick="addRecord();" class="btn btn-success" value="Add" />
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </div>
  </form>
 </div>
</div>
<!-- Update Modal -->
<div id="updateModal" class="modal fade">
 <div class="modal-dialog">
  <form method="post" id="editform" enctype="multipart/form-data">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Update Receipt</h4>
    </div>
    <div class="modal-body">
    <label>Invoice</label>
        <select name="up_inv" id="up_inv"  class="form-control" required='true'><option value=" ">Invoice No</option>
                    <?php
                    include("./connection/dbcon.php");
                    $query = "select * from tbl_invoice";
                    $stm = $dbcon->prepare($query);
                    $stm->execute();
                    $result = $stm->fetchAll();
                    $data = array();
                    $filtered_rows = $stm->rowCount();
                    // $res=mysqli_query($con,"select * from shifts" );
                    foreach($result as $row)
                    {
                    ?> 
              <option value="<?php echo $row["invoiceId"];?>"><?php echo $row["invoiceId"];?></option>  
              <?php } ?> 
             </select>     <br />
     <label>Amount</label>
     <input type="text" name="up_amount" id="up_amount" class="form-control" required="true"/>
     <br />
     <label>Paid</label>
     <input type="text" name="up_paid" id="up_paid" class="form-control" required="true"/>
     <br />
     <label>Balance</label>
     <input type="text" name="up_blance" id="up_blance" class="form-control" required="true"/>
     <br />
     <label>pymentMethod</label>
     <input type="text" name="up_pm" id="up_pm" class="form-control" required="true"/>
     <br />
     <label>ReciptDate</label>
     <input type="date" name="up_recdate" id="up_recdate" class="form-control" required="true"/>
     <br />

    
    </div>
    <div class="modal-footer">
     <input type="hidden" name="up_user_id" id="up_user_id" value="<?php echo $_SESSION["EmployeeId"];?>"/>
     <input type="hidden" name="up_id" id="up_id" />
     <input type="submit" name="action" id="action" onclick="updateRecord();" class="btn btn-success" value="Update" />
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </div>
  </form>
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
    
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

            /* Init DataTables */
            var oTable = $('#editable').DataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );

	// READ recods on page load
   // readRecords(); // calling function

        });
// function readRecords() {
//     $.get("readRecord.php", {}, function (data, status) {
//         $(".records_content").html(data);
//     });
//}
        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>
