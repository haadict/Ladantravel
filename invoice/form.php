
<?php 
include("../session.php"); 
include '../includes/side.php';
include '../includes/script.js';
include '../includes/nav.php';
require 'function.php';
$tax=5;
$qutationId=0;
$sDate=Date('Y-m-d');
if (isset($_GET['invId'])) {          
    $qutationId=$_GET['invId'];   
  }
  else
  {
    $qutationId=0;
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
    <h2>Receipt Tables</h2>
    <ol class="breadcrumb">
      <li>
        <a href="index.html">Home</a>
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
        <div class="ibox-title">
          <h5>Receipt</h5>
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
          <div class="row">
            <div class="col-md-12">
              <span id="savedSuccess2">

              </span>
            </div>
          </div>
        <div class="ibox-content">
        <div class="row">
                    <div class="col-lg-8" style="padding-left:4%;">
                      <div class="card">
                        <div class="card">
                          <div class="card-header">
                            <div class="row form-group">
                              <div class="col-md-6">
                                 <div class="form-group">
                                  <label>Select Customer</label>
                                  <select class="custom-select2 form-control" name="cusId" id="cusId">
                                    <option value="">Please Select...</option>
                                    <?php
                                      $result = getCustomersName();
                                      while ($row = $result->fetch()) {
                                        echo '<option value="'.$row['CustomerId'].'">'.$row['CustomerName'].'</option>';
                                      }
                                    ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Receipt Date</label>
                                  <input type="date" class="form-control" name="" placeholder="created Date" id="createdDate" value="<?php echo $sDate; ?>">
                                  <input type="hidden" name="" id="vat" value="<?php echo $tax; ?>">
                                  <input type="hidden" name="" id="invId" value="<?php echo $qutationId; ?>">
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label>Services</label>
                                  <select class="custom-select2 form-control" name="state" id="servId" style="width: 100%; height: 38px;" >
                                    <option value="">Please Select...</option>
                                    <?php
                                      $result = getServicesName();
                                      while ($row = $result->fetch()) {
                                        echo '<option value="'.$row['ServId'].'">'.$row['ServName'].'</option>';
                                      }
                                    ?>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card-block">
                            <div class="table-responsive" id="cart">
                              <table class="table table-striped table-bordered" id="tblquatation">
                                <thead>
                                  <tr>
                                    <th>Service Type</th>
                                    <th>QTY</th>
                                    <th>Price</th>
                                    <th>Discount %</th>
                                    <th>Tax</th>
                                    <th>Total</th>
                                    <th><i class="fa fa-trash-o"></i>Action</th>
                                  </tr>
                                </thead>
                                <tbody id="tbody">
                                  
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="user-card-block card">
                        <div class="card-block" style="padding:8%;">
                          <div class="price-form" style="margin-right:5%;">
                            <div class="form-group">
                              <div class="row">
                                <div class="col-sm-6">
                                  <label class="control-label" for="amount_amirol">Sup Total</label>
                                </div>
                                <div class="col-sm-6">
                                  <label>$ </label> <span id="SubTotal" style="font-weight: bold;">00.00</span>
                                  
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-sm-6">
                                  <label class="control-label" for="amount_amirol"><?php echo $tax; ?> % VAT </label>
                                </div>
                                <div class="col-sm-6">
                                  <label>$ </label> <span id="vatT" style="font-weight: bold;">00.00</span>
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="row">
                                <div class="col-sm-6">
                                  <label class="control-label" for="amount_amirol">Total</label>
                                </div>
                                <div class="col-sm-6">
                                  <input class="form-control" id="clientId" type="hidden" value="<?php// echo $clientId; ?>"> <!-- <p class="price lead" id="total12"></p> -->
                                  <label>$ </label> <span id="finalTotal" style="font-weight: bold;">00.00</span>
                                </div>
                              </div>
                            </div>
                            <div style="margin-top:30px"></div>
                            <hr class="style">
                          </div>
                        </div>
                      </div>
                          <input type="hidden" name="quoteId" id="LastInsertedId">
                          <input type="hidden" name="Qd_ID" id="Qd_ID">
                          <button type="button" class="btn btn-info pull-right" id="save" onclick="saveReceipt();" style="display: none;">SAVE</button>
                          <button type="button" class="btn btn-info pull-right" id="update" onclick="updateReceipt();" style="display: none;">UPDATE</button>
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
<script src="script.js"></script>

<script>

</script>
