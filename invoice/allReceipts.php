
<?php 
include("../session.php"); 
include '../includes/side.php';
include '../includes/script.js';
include '../includes/nav.php';
require 'function.php';
if (isset($_GET['cusId'])) {          
    $cusId=$_GET['cusId'];   
  }

?>
<style>
  .nav-header {
    padding: 33px 25px;
    background: url(patterns/header-profilegg2gbn.png) no-repeat;
  }
</style>
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-10">
    <h2>Receipts Tables</h2>
    <ol class="breadcrumb">
      <li>
        <a href="index.html">Home</a>
      </li>
      <li>
        <a>Tables</a>
      </li>
      <li class="active">
        <strong>Receipts </strong>
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
                         <?php
                          require_once'function.php';
                          $result = getReceiptByName($cusId);
                          while ($row=$result->fetch()) {
                         ?>
                        <div class="text-center">
                          <div class="cls_002">
                            <span class="cls_002"><b><?php echo $row['CustomerName']; ?></b></span>
                          </div>
                          <div class="cls_003">
                            <span class="cls_003">Address: <?php echo $row['CustomerAddress']; ?></span>
                          </div>
                          <div class="cls_003">
                            <span class="cls_003">Telphone: <?php echo $row['Customerphone']; ?></span>
                          </div>
                        </div>
                      <?php } ?>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                      <a href="form.php" class="btn btn-primary pull-right" style="margin-top:20px;;" type="button"><i class="fa fa-plus"></i>&nbsp;Add</a>
                    <table class="table table-striped table-bordered table-hover dataTables-example" id="tbl" >
                    <thead>
                    <tr>
                        <th>Invoice No</th>
                        <th>Service Type</th>
                        <th>Amount</th>
                        <th>Receipt Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                         $result = getReceiptsAll($cusId);
                         $i=0;
                         while($row=$result->fetch()){
                           $i++;
                           echo '
                            <tr>
                            <td>'.$i.'</td>

                            <td>'.$row["ServName"].'</td>
                            <td>$'.$row["SubTotal"].'</td>
                            <td>'.$row["InvoiceDate"].'</td>
                            <td>
                            <a  href="printRec.php?invId='.$row["InvoiceId"].'" class="btn btn-info btn-circle"><i class="fa fa-print"></i></a>
                            <a  href="form.php?invId='.$row["InvoiceId"].'" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>
                            <button class="btn btn-warning btn-circle delete" type="button" onclick="deleteIn('.$row["InvoiceId"].');"><i class="fa fa-trash"></i></button>
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
<!-- Update Modal -->

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
      {
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

  });
   function deleteIn(id) {
  if(confirm("Are you sure you want to delete this?"))
  {
   $.ajax({
    url:"add.php",
    method:"POST",
    data:{id:id,status:"delete Invoice"},
    success:function(data)
    {
     // alert(data);
     location.reload();
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

}
</script>
