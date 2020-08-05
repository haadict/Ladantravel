
	<?php 
  include("../session.php"); 
  include '../includes/side.php';
  include '../includes/script.js';
  include '../includes/nav.php';
  include 'companyScript.js';
  include 'company_Class.php';
  ?>
    <style>
.nav-header {
    padding: 33px 25px;
    background: url(patterns/header-profilegg2gbn.png) no-repeat;
}
</style>
   <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Companies Tables</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index">Home</a>
                        </li>
                        <li>
                            <a>Tables</a>
                        </li>
                        <li class="active">
                            <strong>Companies Tables</strong>
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
                        <h5>All Companies List</h5>
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
                        <th>Company Name</th>
                        <th>Company Phone</th>
                       <th>Company Address</th>
                       <th>Company Email</th>
                       <th>Company Website</th>
                       <th>Company Logo</th>
                       <th>Company Registered Date</th>

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
							<td>'.$row["CompanyName"].'</td>
							<td>'.$row["CompanyPhone"].'</td>
                            <td>'.$row["CompanyAddress"].'</td>
                            <td>'.$row["CompanyEmail"].'</td>
                            <td>'.$row["CompanyWebsite"].'</td>
                            <td><img src="../upload/'.$row["CompanyLogo"].'" class="img-thumbnail" width="50" height="35" /></td>
                            <td>'.$row["CompanyCreateDate"].'</td>
                            
							<td>
							<button class="btn btn-info btn-circle update" type="button" onclick="GetUpdateDetails('.$row["CompanyId"].')"><i class="fa fa-check"></i>
                            </button>
							<button class="btn btn-warning btn-circle delete" type="button" onclick="GetDelete('.$row["CompanyId"].')"><i class="fa fa-times"></i>
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
     <h4 class="modal-title">Add Company</h4>
    </div>
    <div class="modal-body">
     <label>Company Name</label>
     <input type="text" name="cname" id="cname" class="form-control" required="true" />
     <br />
     <label>Company Phone</label>
     <input type="text" name="tell" id="tell" class="form-control" required="true"/>
     <br />
     <label>Company Address</label>
     <input type="text" name="addr" id="addr" class="form-control" required="true"/>
     <br />
     <label>Company Email</label>
     <input type="email" name="email" id="email" class="form-control" required="true"/>
     <br />
     <label>Company Website</label>
     <input type="text" name="web" id="web" class="form-control" required="true"/>
     <br />

     <label>Select User Image</label>
     <input type="file" name="user_image" id="user_image" />
     <span id="user_uploaded_image"></span>
     <br />
     
     

     
    
    </div>
    <div class="modal-footer">
     <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION["EmployeeId"];?>"/>
     <input type="submit"   class="btn btn-success" value="Add" />
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </div>
  </form>
 </div>
</div>
<!-- Update Modal -->
<div id="updateModal" class="modal fade">
 <div class="modal-dialog">
  <form method="post" id="eform" enctype="multipart/form-data">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Update Company</h4>
    </div>
    <div class="modal-body">
     <label>Company Name</label>
     <input type="text" name="up_cname" id="up_cname" class="form-control" required="true" />
     <br />
     <label>Company Phone</label>
     <input type="text" name="up_tell" id="up_tell" class="form-control" required="true"/>
     <br />
     <label>Company Address</label>
     <input type="text" name="up_addr" id="up_addr" class="form-control" required="true"/>
     <br />
     <label>Company Email</label>
     <input type="email" name="up_email" id="up_email" class="form-control" required="true"/>
     <br />
     <label>Company Website</label>
     <input type="text" name="up_web" id="up_web" class="form-control" required="true"/>
     <br />
     <label>Company Logo</label>
     <input type="file" name="up_logo" id="up_logo" class="form-control"/>
     <span id="himg"></span>
     <br />
     
    
    </div>
    <div class="modal-footer">
     <input type="hidden" name="up_user_id" id="up_user_id" value="<?php echo $_SESSION["EmployeeId"];?>"/>
     <input type="hidden" name="up_id" id="up_id" />
     <input type="submit" name="action" id="action" class="btn btn-success" value="Update" />
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
<script>
$(document).on('submit', '#addform', function(event){
  event.preventDefault();
   var cname = $("#cname").val();
    var tell = $("#tell").val();
    var addr = $("#addr").val();
    var email = $("#email").val();
    var web = $("#web").val();
    var user_id = $("#user_id").val();
  var extension = $('#user_image').val().split('.').pop().toLowerCase();
  if(extension != '')
  {
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    alert("Invalid Image File");
    $('#user_image').val('');
    return false;
   }
  } 
  if(cname != '' && tell != '' && addr != '' && email != '' && web != '' && user_id != '')
  {
   $.ajax({
    url:"addCompany.php",
    method:'POST',
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
     alert(data);
     $('#addform')[0].reset();
     $('#addModal').modal('hide');
     //dataTable.ajax.reload();
	 location.reload();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });

 $(document).on('submit','#eform',function(event){
    event.preventDefault();
    var up_cname = $('#up_cname').val();
    var up_tell = $('#up_tell').val();
    var up_addr = $('#up_addr').val();
    var up_email = $('#up_email').val();
    var up_web = $('#up_web').val();
    

    var ext=$('#up_logo').val().split('.').pop().toLowerCase();

    if(ext != '')
    {
      if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
      {
        alert("Invalid Image File");
        $('#up_logo').val('');
        return false;
      }
    }
    if(up_cname && up_tell && up_addr && up_email && up_web != '')
    {
        //alert(e_name+e_tell+e_add+e_email+e_dob+e_gen+e_title+e_ecdate);
        $.ajax({
      url:"updateCompany.php",
      method:'POST',
      data:new FormData(this),
      contentType:false,
      processData:false,
      success:function(data)
      {
       // alert(data);
     alert(data);
       $('#eform')[0].reset();
        $("#updateModal").modal("hide");
       location.reload();
      }
     });
    }
    else
    {
      alert("Both Fields Are Required")
    }
  });
</script>