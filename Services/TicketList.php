
	<?php 
  include("../session.php"); 
  include '../includes/side.php';
  include '../includes/script.js';
  include '../includes/nav.php';
  include 'ticketScript.js';
  include 'ticket_Class.php';
  ?>
    <style>
.nav-header {
    padding: 33px 25px;
    background: url(patterns/header-profilegg2gbn.png) no-repeat;
}
</style>
   <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Ticket Reservation Tables</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index">Home</a>
                        </li>
                        <li>
                            <a>Tables</a>
                        </li>
                        <li class="active">
                            <strong>Ticket Reservation Tables</strong>
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
                        <h5>All Ticket Reservation List</h5>
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
                        <th>NO</th>

                        <th>Customer Name</th>
                        
                        <th>Ticket No</th>
                        <th>AirLine</th>
                    
                        
                        <th>Destanation From</th>
                        
                        <th>Destanation To</th>
                       <th>Sell Price</th>
                        <th>Reservation Date</th>

                       

                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php 
					 $result = getTicketRecords();
					 $i=0;
					 while($row=$result->fetch()){
						 $i++;
						 echo '
						  <tr>
						    <td class="text-center">'.$i.'</td>
                            <td>'.$row["CustomerName"].'</td> 
                           
                                        
                            <td>'.$row["TicketNo"].'</td>
                            <td>'.$row["airLineName"].'</td>
                            
                           
                            <td>'.$row["DestanationFrom"].'</td>
                             
                            <td>'.$row["DestanationTo"].'</td>
                            <td><span class="label label-primary">'.$row["SellPrice"].'</td>
                             <td>'.$row["ReservaionDate"].'</td>

                            
							<td>
							<button class="btn btn-info btn-circle" type="button" onclick="GetUpdateDetails('.$row["ticketId"].')"><i class="fa fa-check"></i>
                            </button>
							<button class="btn btn-warning btn-circle delete" type="button" onclick="GetDelete('.$row["ticketId"].')"><i class="fa fa-times"></i>
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
 <div class="modal-dialog modal-lg">
   <form method="post" id="aform" enctype="multipart/form-data">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Add Tciket Reservation</h4>
    </div>
    <div class="modal-body">
       
  
     
    <div class="row">
      <div class="form-group col-xs-6">
        <label for="email">Customer:</label>
         <select name="custid" id="custid"  class="form-control" required='true'><option value=" ">Customers</option>
            <?php
            include("./connection/dbcon.php");
            //$dbcon = new PDO('mysql:host=localhost;dbname=traval_agency_db', 'root', '');
            $query = "select * from tbl_customers";
            $stm = $dbcon->prepare($query);
            $stm->execute();
            $result = $stm->fetchAll();
            $data = array();
            $filtered_rows = $stm->rowCount();
            // $res=mysqli_query($con,"select * from shifts" );
            foreach($result as $row)
            {
            ?> 
      <option value="<?php echo $row["CustomerId"];?>"><?php echo $row["CustomerName"];?></option>  
      <?php } ?> 
     </select>
      </div>
      <div class="form-group col-xs-6">
        <label for="fname">Reservaion Date:</label>
        <input type="date" class="form-control" placeholder="Enter Visa Date" name="rdate" id="rdate" required="true">

      </div>
      
      
    </div>
      <div class="row">
        
        <div class="form-group col-xs-6">
        <label for="phone">Ticket No:</label>
         <input type="text" class="form-control" placeholder="Enter Ticket No" name="ticket" id="ticket" required="true">
      </div>
        <div class="form-group col-xs-6">
        <label for="email">AirLine:</label>
         <select name="airline" id="airline"  class="form-control" required='true'><option value=" ">AirLine</option>
            <?php
            include("./connection/dbcon.php");
            //$dbcon = new PDO('mysql:host=localhost;dbname=traval_agency_db', 'root', '');
            $query = "select * from tbl_airline";
            $stm = $dbcon->prepare($query);
            $stm->execute();
            $result = $stm->fetchAll();
            $data = array();
            $filtered_rows = $stm->rowCount();
            // $res=mysqli_query($con,"select * from shifts" );
            foreach($result as $row)
            {
            ?> 
      <option value="<?php echo $row["airLineId"];?>"><?php echo $row["airLineName"];?></option>  
      <?php } ?> 
     </select>
      </div>
      
      
    </div>
      <div class="row">
        <div class="form-group col-xs-6">
        <label for="email">Destanation From:</label>
        <input type="text" class="form-control" placeholder="Enter Destanation From" name="dfrom" id="dfrom" required="true">
      </div>
        <div class="form-group col-xs-6">
        <label for="email">Destanation To:</label>
        <input type="text" class="form-control"placeholder="Enter Destanation To" name="dto" id="dto" required="true">
      </div>
      
    </div>
     <div class="row">
      <div class="form-group col-xs-6">
        <label for="email">Cost Price:</label>
        <input type="text" class="form-control" placeholder="Enter Cost Price" name="tcprice" id="tcprice" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">Sell Price:</label>
        <input type="text" class="form-control" onkeyup="profitCal();" name="sprice" id="sprice" required="true" placeholder="Enter Sell Price">
      </div>
      
      
    </div>
     
       <div class="row">
        <div class="form-group col-xs-6">
        <label for="email">Profit:</label>
        <input type="text" class="form-control" readonly placeholder="Enter Profit" name="tprofit" id="tprofit" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">Ticket Description:</label>
        <input type="text" class="form-control"placeholder="Enter Ticket Description" name="tdesc" id="tdesc" required="true">
      </div>
    </div>
    
    <div class="modal-footer">
     <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION["EmployeeId"];?>"/>
     <input type="hidden" class="form-control" name="custid" id="custid">
     <input type="submit" onclick="addTicket();" class="btn btn-success btn-lg btn-block" value="Add" />
    </div>
  
  </div> 
</div>
</form>
    
</div>
</div>
<!-- Update Modal -->
<div id="updateModal" class="modal fade">
 <div class="modal-dialog modal-lg">
  <form method="post" id="editform" enctype="multipart/form-data">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Update Ticket Reservation</h4>
    </div>
    <div class="modal-body">
      <div class="row">
      <div class="form-group col-xs-6">
        <label for="fname">Reservaion Date:</label>
        <input type="date" class="form-control" placeholder="Enter Visa Date" name="up_rdate" id="up_rdate" required="true">

      </div>
      <div class="form-group col-xs-6">
        <label for="phone">Ticket No:</label>
         <input type="text" class="form-control" placeholder="Enter Ticket No" name="up_ticket" id="up_ticket" required="true">
      </div>
      
    </div>
      <div class="row">
        <div class="form-group col-xs-6">
        <label for="email">AirLine:</label>
         <select name="up_airline" id="up_airline"  class="form-control" required='true'><option value=" ">AirLine</option>
            <?php
            include("./connection/dbcon.php");
            //$dbcon = new PDO('mysql:host=localhost;dbname=traval_agency_db', 'root', '');
            $query = "select * from tbl_airline";
            $stm = $dbcon->prepare($query);
            $stm->execute();
            $result = $stm->fetchAll();
            $data = array();
            $filtered_rows = $stm->rowCount();
            // $res=mysqli_query($con,"select * from shifts" );
            foreach($result as $row)
            {
            ?> 
      <option value="<?php echo $row["airLineId"];?>"><?php echo $row["airLineName"];?></option>  
      <?php } ?> 
     </select>
      </div>
      <div class="form-group col-xs-6">
        <label for="email">Destanation From:</label>
        <input type="text" class="form-control" placeholder="Enter Destanation From" name="up_dfrom" id="up_dfrom" required="true">
      </div>
      
    </div>
      <div class="row">
        <div class="form-group col-xs-6">
        <label for="email">Destanation To:</label>
        <input type="text" class="form-control"placeholder="Enter Destanation To" name="up_dto" id="up_dto" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">Cost Price:</label>
        <input type="text" class="form-control" placeholder="Enter Cost Price" name="up_tcprice" id="up_tcprice" required="true">
      </div>
    </div>
     <div class="row">
      <div class="form-group col-xs-6">
        <label for="email">Sell Price:</label>
        <input type="text" class="form-control" onkeyup="profitCalUp();" name="up_sprice" id="up_sprice" required="true" placeholder="Enter Sell Price">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">Profit:</label>
        <input type="text" class="form-control" readonly placeholder="Enter Profit" name="up_tprofit" id="up_tprofit" required="true">
      </div>
      
    </div>
     
       <div class="row">
      <div class="form-group col-xs-12">
        <label for="email">Ticket Description:</label>
        <input type="text" class="form-control"placeholder="Enter Ticket Description" name="up_tdesc" id="up_tdesc" required="true">
      </div>
    </div>
    
    </div>
    <div class="modal-footer">
     <input type="hidden" name="up_user_id" id="up_user_id" value="<?php echo $_SESSION["EmployeeId"];?>"/>
     <input type="hidden" name="up_id" id="up_id" />
     <input type="submit" name="action" id="action" onclick="updateRecord();" class="btn btn-warning btn-lg btn-block" value="Update" />
    
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
function profitCal()
{
    var tcprice = $("#tcprice").val();
    var sprice = $("#sprice").val();
     $("#tprofit").val(sprice-tcprice);
}
function profitCalUp()
{
    var cprice = $("#up_tcprice").val();
    var sellprice = $("#up_sprice").val();
     $("#up_tprofit").val(sellprice-cprice);
}
    </script>
