
	<?php 
  include("../session.php"); 
  include '../includes/side.php';
  include '../includes/script.js';
  include '../includes/nav.php';
  include 'customerScript.js';
  include 'customer_Class.php';
 // include 'visaScript.js';

  ?>
    <style>
.nav-header {
    padding: 33px 25px;
    background: url(patterns/header-profilegg2gbn.png) no-repeat;
    
}
.dropdown-item {
display: block;
width: 100%;
padding: 0.25rem 1.5rem;
clear: both;
font-weight: 400;
color: #212529;
text-align: inherit;
white-space: nowrap;
background-color: transparent;
border: 0; }

.dropdown-item:hover, .dropdown-item:focus {
color: #16181b;
text-decoration: none;
background-color: #f8f9fa; }

.dropdown-item.active, .dropdown-item:active {
color: #fff;
text-decoration: none;
background-color: #007bff; }

.dropdown-item.disabled, .dropdown-item:disabled {
color: #6c757d;
background-color: transparent; }
.dropdown-item {
font-size: 15px;
font-weight: 400;
padding: 0.55rem 1rem;
color: #667f87;
font-family: 'Work Sans', sans-serif;
-webkit-transition: all 0.3s ease-in-out;
transition: all 0.3s ease-in-out; }

.dropdown-item:hover, .dropdown-item:focus {
background: #eff5f7;
color: #667f87; }
.dropdown-menu.show {
display: block; }
.dropdown {
position: relative; }
.dropdown-toggle::after {
display: inline-block;
width: 0;
height: 0;
margin-left: 0.255em;
vertical-align: 0.255em;
content: "";
border-top: 0.3em solid;
border-right: 0.3em solid transparent;
border-bottom: 0;
border-left: 0.3em solid transparent; }

.dropdown-toggle:empty::after {
margin-left: 0; }

.dropdown-menu {
position: absolute;
top: 100%;
left: 0;
z-index: 1000;
display: none;
float: left;
min-width: 10rem;
padding: 0.5rem 0;
margin: 0.125rem 0 0;
font-size: 1rem;
color: #212529;
text-align: left;
list-style: none;
background-color: #fff;
background-clip: padding-box;
border: 1px solid rgba(0, 0, 0, 0.15);
border-radius: 0.25rem; }
.btn-outline-primary {
color: #007bff;
background-color: transparent;
background-image: none;
border-color: #007bff; }

.btn-outline-primary:hover {
color: #fff;
background-color: #007bff;
border-color: #007bff; }

.btn-outline-primary:focus, .btn-outline-primary.focus {
-webkit-box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5); }
</style>
   <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Customers Tables</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Tables</a>
                        </li>
                        <li class="active">
                            <strong>Customers Tables</strong>
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
                        <h5>All Customers List</h5>
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
						<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#addModal" style="margin-top:20px;;" type="button"><i class="fa fa-plus"></i>&nbsp;Add</button>
                    <table class="table table-striped table-bordered table-hover dataTables-example" id="tbl" >
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Full Name</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Email</th>
						<th>Action</th>
            <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php 
					 $result = getCustomers();
					 $i=0;
					 while($row=$result->fetch()){
						 $i++;
						 echo '
						  <tr>
						    <td>'.$i.'</td>
							<td>'.$row["CustomerName"].'</td>
							<td>'.$row["Customerphone"].'</td>
							<td>'.$row["CustomerAddress"].'</td>
							<td>'.$row["CustomerEmail"].'</td>

							<td>
							<button class="btn btn-info btn-circle" type="button" onclick="GetCustomerDetails('.$row["CustomerId"].')"><i class="fa fa-check"></i>
                            </button>
							<button class="btn btn-warning btn-circle delete" type="button" id='.$row["CustomerId"].'><i class="fa fa-times"></i>
                            </button>
							</td>

              <td>
              <div class="dropdown ">
<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
<i class="icon-copy fa fa-bars" aria-hidden="true"></i>
</a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="#" data-toggle="modal" onclick="visaModal('.$row["CustomerId"].')" name="visa" data-target="#addVisa"><i class="fa fa-eye"></i> Visa</a>

<a class="dropdown-item" href="#" data-toggle="modal" onclick="ticketModal('.$row["CustomerId"].')" name="ticket" data-target="#addTicket"><i class="fa fa-eye"></i> Ticket</a>

<a class="dropdown-item" href="#" data-toggle="modal" onclick="cargoModal('.$row["CustomerId"].')" name="ticket" data-target="#addCargo"><i class="fa fa-eye"></i> Cargo</a>
<a class="dropdown-item" href="Reservation.php?id='.$row["CustomerId"].'"  id="" name="ticket" ><i class="fa fa-eye"></i> View</a>

</div>
</div>
              </td >
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
        <!-- Customer Registration -->
		<div id="addModal" class="modal fade">
 <div class="modal-dialog">
  <form method="post" id="user_form" enctype="multipart/form-data">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Add Customer</h4>
    </div>
    <div class="modal-body">
     <label>Full Name</label>
     <input type="text" name="fullname" id="fullname" class="form-control" />
     <br />
     <label>Telephone</label>
     <input type="text" name="tell" id="tell" class="form-control" />
	 <br />
     <label>Address</label>
     <input type="text" name="address" id="address" class="form-control" />
	 <br />
     <label>Email</label>
     <input type="text" name="email" id="email" class="form-control" />
    
    </div>
    <div class="modal-footer">
     <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION["EmployeeId"];?>"/>
     <input type="hidden" name="operation" id="operation" />
     <input type="submit" name="action" id="action" onclick="addCustomer();" class="btn btn-success" value="Add" />
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </div>
  </form>
 </div>
</div>
<!-- end of Customer Registration -->
<!-- Update Customer Modal -->
<div id="updateModal" class="modal fade">
 <div class="modal-dialog">
  <form method="post" id="user_form" enctype="multipart/form-data">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Update Customer</h4>
    </div>
    <div class="modal-body">
     <label>Full Name</label>
     <input type="text" id="update_fullname" class="form-control" />
     <br />
     <label>Telephone</label>
     <input type="text" id="update_tell" class="form-control" />
	 <br />
     <label>Address</label>
     <input type="text" id="update_address" class="form-control" />
	 <br />
     <label>Email</label>
     <input type="text" id="update_email" class="form-control" />
    
    </div>
    <div class="modal-footer">
     
     <input type="text" name="hidden_custId" id="hidden_custId" />
     <input type="submit" name="action" id="action" onclick="updateCustomer();" class="btn btn-success" value="Add" />
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </div>
  </form>
 </div>
</div>
<!-- end of Update Customer Modal -->

<!-- Add Visa Reservation Modal -->
<div id="addVisa" class="modal fade">
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
        <label for="fname">Visa Date:</label>
        <input type="date" class="form-control" placeholder="Enter Visa Date" name="vdate" id="vdate" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="phone">Duration:</label>
        <input type="text" class="form-control" placeholder="Enter Duration" name="duration" id="duration" required="true">
      </div>
      
    </div>
      <div class="row">
        <div class="form-group col-xs-6">
        <label for="email">Country:</label>
        <input type="text" class="form-control" placeholder="Enter Country" name="country" id="country" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">PassportNo:</label>
        <input type="text" class="form-control" placeholder="Enter PassportNo" name="passno" id="passno" required="true">
      </div>
      
    </div>
      <div class="row">
        <div class="form-group col-xs-6">
        <label for="email">Issued By:</label>
        <input type="text" class="form-control"placeholder="Issued By" name="issby" id="issby" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">Issu Date:</label>
        <input type="date" class="form-control" placeholder="Enter Title" name="issdate" id="issdate" required="true">
      </div>
    </div>
     <div class="row">
      <div class="form-group col-xs-6">
        <label for="email">Passport Expire Date:</label>
        <input type="date" class="form-control" name="passexdate" id="passexdate" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">Cost Price:</label>
        <input type="text" class="form-control" placeholder="Enter Cost Price" name="cprice" id="cprice" required="true">
      </div>
      
    </div>
     <div class="row">
      <div class="form-group col-xs-6">
        <label for="email">Sell Price:</label>
        <input type="text" class="form-control"placeholder="Enter Sell Price" name="sellprice" id="sellprice" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">Profit:</label>
        <input type="text" class="form-control" placeholder="Enter Profit" name="profit" id="profit" required="true">
      </div>
    
    </div>
       <div class="row">
      <div class="form-group col-xs-12">
        <label for="email">Description:</label>
        <input type="text" class="form-control"placeholder="Enter Visa Description" name="desc" id="desc" required="true">
      </div>
    </div>
    
    <div class="modal-footer">
     <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION["EmployeeId"];?>"/>
       <input type="text" class="form-control" name="cusid" id="cusid">

     <input type="submit" onclick="addVisa();" class="btn btn-success btn-lg btn-block" value="Add" />
    </div>
  
  </div> 
</div>
</form>
    
</div>
</div>
<!-- end of Add Visa Reservation Modal -->

<!-- Add Ticket Reservation Modal -->
<div id="addTicket" class="modal fade">
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
        <label for="fname">Reservaion Date:</label>
        <input type="date" class="form-control" placeholder="Enter Visa Date" name="rdate" id="rdate" required="true">

      </div>
      <div class="form-group col-xs-6">
        <label for="phone">Ticket No:</label>
         <input type="text" class="form-control" placeholder="Enter Ticket No" name="ticket" id="ticket" required="true">
      </div>
      
    </div>
      <div class="row">
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
      <div class="form-group col-xs-6">
        <label for="email">Destanation From:</label>
        <input type="text" class="form-control" placeholder="Enter Destanation From" name="dfrom" id="dfrom" required="true">
      </div>
      
    </div>
      <div class="row">
        <div class="form-group col-xs-6">
        <label for="email">Destanation To:</label>
        <input type="text" class="form-control"placeholder="Enter Destanation To" name="dto" id="dto" required="true">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">Cost Price:</label>
        <input type="text" class="form-control" placeholder="Enter Cost Price" name="tcprice" id="tcprice" required="true">
      </div>
    </div>
     <div class="row">
      <div class="form-group col-xs-6">
        <label for="email">Sell Price:</label>
        <input type="text" class="form-control" name="sprice" id="sprice" required="true" placeholder="Enter Sell Price">
      </div>
      <div class="form-group col-xs-6">
        <label for="email">Profit:</label>
        <input type="text" class="form-control" placeholder="Enter Profit" name="tprofit" id="tprofit" required="true">
      </div>
      
    </div>
     
       <div class="row">
      <div class="form-group col-xs-12">
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
<!-- end of Add Tickit Reservation Modal -->

<!-- Add Visa Reservation Modal -->
<div id="addCargo" class="modal fade">
 <div class="modal-dialog modal-lg">
   <form method="post" id="aform" enctype="multipart/form-data">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Add Cargo Reservation</h4>
    </div>
    <div class="modal-body">
       
  
      
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
<!-- end of Add Visa Reservation Modal -->


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


	 <script>
    $(document).on('click', '.delete', function(){
  var del = $(this).attr("id");
  if(confirm("Are you sure you want to delete this?"))
  {
   $.ajax({
    url:"deleteCustom.php",
    method:"POST",
    data:{del:del},
    success:function(data)
    {
     alert(data);
     // swal.fire({
     //          title:'Msg! '+data,
     //          type:'success'
     //        })
    }
   });
  }
  else
  {
   return false; 
  }
 });
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
    readRecords(); // calling function

        });
function readRecords() {
    $.get("readRecord.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}
        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
          function visaModal(id){
          $("#cusid").val(id);

        }
        function ticketModal(id){
          $("#custid").val(id);
          
        }
        function cargoModal(id){
          $("#crcustid").val(id);
          
        }
    </script>
