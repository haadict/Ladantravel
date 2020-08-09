
	<?php 
  include("../session.php"); 
  include '../includes/side.php';
  include '../includes/script.js';
  include '../includes/nav.php';
  include 'cargoScript.js';
  include 'cargo_Class.php';
  ?>
    <style>
.nav-header {
    padding: 33px 25px;
    background: url(patterns/header-profilegg2gbn.png) no-repeat;
}
</style>
   <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Cargo Reservation Tables</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index">Home</a>
                        </li>
                        <li>
                            <a>Tables</a>
                        </li>
                        <li class="active">
                            <strong>Cargo Reservation Tables</strong>
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
                        <h5>All Cargo Reservation List</h5>
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
                        
                        <th>package Type</th>
                        <th>package Kg</th>
                  
                        <th>Destanation From</th>
                       <th>Destanation To</th>
                        <th>Reciver Name</th>
                        <th>Reciver Tell</th>
                         <th>Sell Price</th>
                        <th>Taking Date</th>

                       

                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php 
					 $result = getCargoRecords();
					 $i=0;
					 while($row=$result->fetch()){
						 $i++;
						 echo '
						  <tr>
						    <td class="text-center">'.$i.'</td>
                           <td>'.$row["CustomerName"].'</td>
                                        
                            <td>'.$row["packageType"].'</td>
                            <td>'.$row["packageKg"].'</td>
                            
                            <td>'.$row["destanationFrom"].'</td>
                           
                            <td>'.$row["destanationTo"].'</td>
                             
                           
                            <td>'.$row["reciverName"].'</td>
                            <td>'.$row["reciverTell"].'</td>
                            <td><span class="label label-primary">'.$row["sellPrice"].'</span></td>
                             <td>'.$row["takingDate"].'</td>

                            
							<td>
							<button class="btn btn-info btn-circle" type="button" onclick="GetUpdateDetails('.$row["CargoId"].')"><i class="fa fa-check"></i>
                            </button>
							<button class="btn btn-warning btn-circle delete" type="button" onclick="GetDelete('.$row["CargoId"].')"><i class="fa fa-times"></i>
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
     <h4 class="modal-title">Add Cargo Reservation</h4>
    </div>
    <div class="modal-body">
       <div class="row">
      <div class="form-group col-xs-12">
        <label for="email">Customer:</label>
         <select name="crcustid" id="crcustid"  class="form-control" required='true'><option value=" ">Customers</option>
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
    </div>
  
     
    <div class="row">
      <div class="form-group col-xs-6">
        <label for="fname">Package TypeId:</label>
         <select name="package" id="package"  class="form-control" required='true'><option value=" ">AirLine</option>
            <?php
            include("./connection/dbcon.php");
            //$dbcon = new PDO('mysql:host=localhost;dbname=traval_agency_db', 'root', '');
            $query = "select * from tbl_packagetype";
            $stm = $dbcon->prepare($query);
            $stm->execute();
            $result = $stm->fetchAll();
            $data = array();
            $filtered_rows = $stm->rowCount();
            // $res=mysqli_query($con,"select * from shifts" );
            foreach($result as $row)
            {
            ?> 
      <option value="<?php echo $row["packageTypeId"];?>"><?php echo $row["packageType"];?></option>  
      <?php } ?> 
     </select>
      </div>
      <div class="form-group col-xs-6">
        <label for="phone">Package Kg:</label>
        <input type="text" class="form-control" placeholder="Enter Duration" name="pkg" id="pkg" required="true">
      </div>
      
    </div>
      <div class="row">
        <div class="form-group col-xs-6">
        <label for="email">Cost Price:</label>
        <input type="text" class="form-control" placeholder="Enter Country" name="crcprice" id="crcprice" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">Sell Price:</label>
        <input type="text" class="form-control" placeholder="Enter PassportNo" name="crsprice" id="crsprice" required="true">
      </div>
      
    </div>
    <div class="row">
        <div class="form-group col-xs-6">
        <label for="email">Profit:</label>
        <input type="text" class="form-control" placeholder="Enter Country" name="crprofit" id="crprofit" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">Destanation From:</label>
        <input type="text" class="form-control" placeholder="Enter PassportNo" name="crdesfrom" id="crdesfrom" required="true">
      </div>
      
    </div>
      <div class="row">
        <div class="form-group col-xs-6">
        <label for="email">Destanation To:</label>
        <input type="text" class="form-control"placeholder="Issued By" name="crdesto" id="crdesto" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">AirLine:</label>
         <select name="crairline" id="crairline"  class="form-control" required='true'><option value=" ">AirLine</option>
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
        <label for="email">Taking Date:</label>
        <input type="date" class="form-control" name="tdate" id="tdate" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">Getting Date:</label>
        <input type="date" class="form-control" placeholder="Enter Cost Price" name="gdate" id="gdate" required="true">
      </div>
      
    </div>
     <div class="row">
      <div class="form-group col-xs-6">
        <label for="email">Reciver Name:</label>
        <input type="text" class="form-control"placeholder="Enter Sell Price" name="rname" id="rname" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">Reciver Tell:</label>
        <input type="text" class="form-control" placeholder="Enter Profit" name="rtell" id="rtell" required="true">
      </div>
    
    </div>
       <div class="row">
      <div class="form-group col-xs-6">
        <label for="email">Reciver Address:</label>
        <input type="text" class="form-control"placeholder="Enter Visa Description" name="raddr" id="raddr" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">Cargo Description:</label>
        <input type="text" class="form-control"placeholder="Enter Visa Description" name="crdesc" id="crdesc" required="true">
      </div>
    </div>
    
    <div class="modal-footer">
     <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION["EmployeeId"];?>"/>
       <input type="hidden" class="form-control" name="crcustid" id="crcustid">

     <input type="submit" onclick="addCargo();" class="btn btn-success btn-lg btn-block" value="Add" />
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
     <h4 class="modal-title">Update Cargo Reservation</h4>
    </div>
    <div class="modal-body">
      <div class="row">
      <div class="form-group col-xs-12">
        <label for="email">Customer:</label>
         <select name="up_crcustid" id="up_crcustid"  class="form-control" required='true'><option value=" ">Customers</option>
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
    </div>
  
     
    <div class="row">
      <div class="form-group col-xs-6">
        <label for="fname">Package TypeId:</label>
         <select name="up_package" id="up_package"  class="form-control" required='true'><option value=" ">AirLine</option>
            <?php
            include("./connection/dbcon.php");
            //$dbcon = new PDO('mysql:host=localhost;dbname=traval_agency_db', 'root', '');
            $query = "select * from tbl_packagetype";
            $stm = $dbcon->prepare($query);
            $stm->execute();
            $result = $stm->fetchAll();
            $data = array();
            $filtered_rows = $stm->rowCount();
            // $res=mysqli_query($con,"select * from shifts" );
            foreach($result as $row)
            {
            ?> 
      <option value="<?php echo $row["packageTypeId"];?>"><?php echo $row["packageType"];?></option>  
      <?php } ?> 
     </select>
      </div>
      <div class="form-group col-xs-6">
        <label for="phone">Package Kg:</label>
        <input type="text" class="form-control" placeholder="Enter Duration" name="up_pkg" id="up_pkg" required="true">
      </div>
      
    </div>
      <div class="row">
        <div class="form-group col-xs-6">
        <label for="email">Cost Price:</label>
        <input type="text" class="form-control" placeholder="Enter Country" name="up_crcprice" id="up_crcprice" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">Sell Price:</label>
        <input type="text" class="form-control" placeholder="Enter PassportNo" name="up_crsprice" id="up_crsprice" required="true">
      </div>
      
    </div>
    <div class="row">
        <div class="form-group col-xs-6">
        <label for="email">Profit:</label>
        <input type="text" class="form-control" placeholder="Enter Country" name="up_crprofit" id="up_crprofit" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">Destanation From:</label>
        <input type="text" class="form-control" placeholder="Enter PassportNo" name="up_crdesfrom" id="up_crdesfrom" required="true">
      </div>
      
    </div>
      <div class="row">
        <div class="form-group col-xs-6">
        <label for="email">Destanation To:</label>
        <input type="text" class="form-control"placeholder="Issued By" name="up_crdesto" id="up_crdesto" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">AirLine:</label>
         <select name="up_crairline" id="up_crairline"  class="form-control" required='true'><option value=" ">AirLine</option>
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
        <label for="email">Taking Date:</label>
        <input type="date" class="form-control" name="up_tdate" id="up_tdate" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">Getting Date:</label>
        <input type="date" class="form-control" placeholder="Enter Cost Price" name="up_gdate" id="up_gdate" required="true">
      </div>
      
    </div>
     <div class="row">
      <div class="form-group col-xs-6">
        <label for="email">Reciver Name:</label>
        <input type="text" class="form-control"placeholder="Enter Sell Price" name="up_rname" id="up_rname" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">Reciver Tell:</label>
        <input type="text" class="form-control" placeholder="Enter Profit" name="up_rtell" id="up_rtell" required="true">
      </div>
    
    </div>
       <div class="row">
      <div class="form-group col-xs-6">
        <label for="email">Reciver Address:</label>
        <input type="text" class="form-control"placeholder="Enter Visa Description" name="up_raddr" id="up_raddr" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">Cargo Description:</label>
        <input type="text" class="form-control"placeholder="Enter Visa Description" name="up_crdesc" id="up_crdesc" required="true">
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
    </script>
