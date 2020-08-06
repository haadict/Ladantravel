
	<?php 
  include("../session.php"); 
  include '../includes/side.php';
  include '../includes/script.js';
  include '../includes/nav.php';
  include 'visaScript.js';
  include 'customer_Class.php';
  ?>
    <style>
.nav-header {
    padding: 33px 25px;
    background: url(patterns/header-profilegg2gbn.png) no-repeat;
}
</style>
   <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Visa Reservation Tables</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index">Home</a>
                        </li>
                        <li>
                            <a>Tables</a>
                        </li>
                        <li class="active">
                            <strong>Visa Reservation Tables</strong>
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
                        <h5>All Visa Reservation List</h5>
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
                        <th>Visa Date</th>
                        <th>Duration</th>
                        <th>Country</th>
                        <th>PassportNo</th>
                        <th>Issued By</th>
                        <th>Issu Date</th>
                        <th>Passport Expire Date</th>
                        <th>Cost price</th>
                        <th>Sell Price</th>
                        <th>Profit</th>
                        <th>Visa Description</th>
                        <th>Visa CreateBy</th>
                        <th>Visa Create Date</th>

                       

                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php
          $id=$_GET['id']; 
					 $result = getVisaRecords($id);
					 $i=0;
					 while($row=$result->fetch()){
						 $i++;
						 echo '
						  <tr>
						    <td>'.$i.'</td>
                
							<td>'.$row["CustomerName"].'</td>
							<td>'.$row["visaDate"].'</td>
                            <td>'.$row["duration"].'</td>
                            <td>'.$row["country"].'</td>
                            <td>'.$row["passportNo"].'</td>
                            <td>'.$row["issuedBy"].'</td>
                            <td>'.$row["issuDate"].'</td>
                            <td>'.$row["passportExpireDate"].'</td>
                            <td>'.$row["costprice"].'</td>
                            <td>'.$row["sellPrice"].'</td>
                             <td>'.$row["profit"].'</td>
                            <td>'.$row["visaDescription"].'</td>
                            <td>'.$row["EmployeeName"].'</td>
                            <td>'.$row["visaCreateDate"].'</td>
                            
							<td>
							<button class="btn btn-info btn-circle" type="button" onclick="GetUpdateDetails('.$row["visaId"].')"><i class="fa fa-check"></i>
                            </button>
							<button class="btn btn-warning btn-circle delete" type="button" onclick="GetDelete('.$row["visaId"].')"><i class="fa fa-times"></i>
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
     <h4 class="modal-title">Add Visa Reservation</h4>
    </div>
    <div class="modal-body">
       
  
      <div class="row">
        <div class="form-group col-xs-6">
        <label for="sel1">Customer:</label>
        <select name="cusid" id="cusid"  class="form-control" required='true'><option value=" ">Customer Name</option>
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
        <label for="fname">Visa Date:</label>
        <input type="date" class="form-control" placeholder="Enter Visa Date" name="vdate" id="vdate" required="true">
      </div>
      
    </div>
    <div class="row">
      <div class="form-group col-xs-6">
        <label for="phone">Duration:</label>
        <input type="text" class="form-control" placeholder="Enter Duration" name="duration" id="duration" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">Country:</label>
        <input type="text" class="form-control" placeholder="Enter Country" name="country" id="country" required="true">
      </div>
    </div>
      <div class="row">
      <div class="form-group col-xs-6">
        <label for="email">PassportNo:</label>
        <input type="text" class="form-control" placeholder="Enter PassportNo" name="passno" id="passno" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">Issued By:</label>
        <input type="text" class="form-control"placeholder="Issued By" name="issby" id="issby" required="true">
      </div>
    </div>
      <div class="row">
      <div class="form-group col-xs-6">
        <label for="email">Issu Date:</label>
        <input type="date" class="form-control" placeholder="Enter Title" name="issdate" id="issdate" required="true">
      </div><div class="form-group col-xs-6">
        <label for="email">Passport Expire Date:</label>
        <input type="date" class="form-control" name="passexdate" id="passexdate" required="true">
      </div>
    </div>
     <div class="row">
      <div class="form-group col-xs-6">
        <label for="email">Cost Price:</label>
        <input type="text" class="form-control" placeholder="Enter Cost Price" name="cprice" id="cprice" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">Sell Price:</label>
        <input type="text" class="form-control"placeholder="Enter Sell Price" name="sellprice" id="sellprice" required="true">
      </div>
    </div>
     <div class="row">
      <div class="form-group col-xs-6">
        <label for="email">Profit:</label>
        <input type="text" class="form-control" placeholder="Enter Profit" name="profit" id="profit" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">Description:</label>
        <input type="text" class="form-control"placeholder="Enter Visa Description" name="desc" id="desc" required="true">
      </div>
    </div>
      
    
    <div class="modal-footer">
     <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION["EmployeeId"];?>"/>
     <input type="submit" onclick="addRecord();" class="btn btn-success btn-lg btn-block" value="Add" />
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
     <h4 class="modal-title">Update Visa Reservation</h4>
    </div>
    <div class="modal-body">
      <div class="row">
        <div class="form-group col-xs-6">
        <label for="sel1">Customer:</label>
        <select name="up_cusid" id="up_cusid"  class="form-control" required='true'><option value=" ">Customer Name</option>
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
        <label for="fname">Visa Date:</label>
        <input type="date" class="form-control" placeholder="Enter Visa Date" name="up_vdate" id="up_vdate" required="true">
      </div>
      
    </div>
    <div class="row">
      <div class="form-group col-xs-6">
        <label for="phone">Duration:</label>
        <input type="text" class="form-control" placeholder="Enter Duration" name="up_duration" id="up_duration" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">Country:</label>
        <input type="text" class="form-control" placeholder="Enter Country" name="up_country" id="up_country" required="true">
      </div>
    </div>
      <div class="row">
      <div class="form-group col-xs-6">
        <label for="email">PassportNo:</label>
        <input type="text" class="form-control" placeholder="Enter PassportNo" name="up_passno" id="up_passno" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">Issued By:</label>
        <input type="text" class="form-control"placeholder="Issued By" name="up_issby" id="up_issby" required="true">
      </div>
    </div>
      <div class="row">
      <div class="form-group col-xs-6">
        <label for="email">Issu Date:</label>
        <input type="date" class="form-control" placeholder="Enter Title" name="up_issdate" id="up_issdate" required="true">
      </div><div class="form-group col-xs-6">
        <label for="email">Passport Expire Date:</label>
        <input type="date" class="form-control" name="up_passexdate" id="up_passexdate" required="true">
      </div>
    </div>
     <div class="row">
      <div class="form-group col-xs-6">
        <label for="email">Cost Price:</label>
        <input type="text" class="form-control" placeholder="Enter Cost Price" name="up_cprice" id="up_cprice" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">Sell Price:</label>
        <input type="text" class="form-control"placeholder="Enter Sell Price" name="up_sellprice" id="up_sellprice" required="true">
      </div>
    </div>
     <div class="row">
      <div class="form-group col-xs-6">
        <label for="email">Profit:</label>
        <input type="text" class="form-control" placeholder="Enter Profit" name="up_profit" id="up_profit" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">Description:</label>
        <input type="text" class="form-control"placeholder="Enter Visa Description" name="up_desc" id="up_desc" required="true">
      </div>
    </div>
      
    <!--  <label>Company Logo</label>
     <input type="file" name="logo" id="logo" class="form-control" required="true"/>
     <span id="h_clogo"></span>
     <br /> -->
     
    
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
