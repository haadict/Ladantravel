
	<?php 
  include("../session.php"); 
  include '../includes/side.php';
  include '../includes/script.js';
  include '../includes/nav.php';
  ?>
    <style>
.nav-header {
    padding: 33px 25px;
    background: url(patterns/header-profilegg2gbn.png) no-repeat;
}
</style>
   <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Ticket Report Tables</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Tables</a>
                        </li>
                        <li class="active">
                            <strong>Ticket Report Tables</strong>
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
                        <h5>All Ticket Reports</h5>
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
<!-- Update Modal -->
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
    </script>
