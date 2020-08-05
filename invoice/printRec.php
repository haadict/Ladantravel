
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
      .secondary{
        background-color: #c0c0c0;
        width: 100%;
        margin-right: 50%;

      }

      div.cls_002{font-family:Arial,serif;font-size:13.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
      span.cls_002{font-family:Arial,serif;font-size:13.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
      span.cls_003{font-family:Arial,serif;font-size:13.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
      div.cls_003{font-family:Arial,serif;font-size:13.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}


      span.cls_005{font-family:Arial,serif;font-size:13.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
      div.cls_005{font-family:Arial,serif;font-size:13.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}


      span.cls_006{font-family:Arial,serif;font-size:13.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
      div.cls_006{font-family:Arial,serif;font-size:13.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}


      span.cls_007{font-family:Arial,serif;font-size:13.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
      div.cls_007{font-family:Arial,serif;font-size:13.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}

      span.cls_008{font-family:Arial,serif;font-size:13.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
      div.cls_008{font-family:Arial,serif;font-size:13.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
      span.cls_009{font-family:Arial,serif;font-size:13.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
      div.cls_009{font-family:Arial,serif;font-size:13.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none; text-align: center;}

      .QuoteInvoice{
        position: relative;
      }
      .stausImg{
        position:absolute; 
        right:-5px; 
        top:-20px;
      }

      .stausImg img{
        width: 400px; height: 350px;
      }
      .logo{
        position:absolute;left:15px;top:0px right:-5px; width: 500px;
      }
      .logo img{
        width: 300px; height: 100;
      }
      .invoiceNote{
        padding: 5px 5px; margin-top: 20px;
      }
      .invoiceDesign{
        background-color: #DCDCDC; padding: 5px 5px;
      }
      .compInfo{
        margin-top: 15px;
        padding-right: -20%;
      }

      .mainTables{
        padding: 5px 5px; margin-top: 20px;
      }
      .tableHeader{
        background-color: #DCDCDC; padding: 0px 0px; margin-top: 0px; width: 100%; height: 0px;
      }
      .displayedTable{
        width:100%; border:1px solid #DCDCDC;overflow:hidden;
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
            <!-- <button id="printInvoice" class="btn btn-primary btn-sm" style="margin-top: 2%; margin-left: 70%;"><i class="fa fa-print"></i> Print </button> -->
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
        <div id="QuoteInvoice" class="QuoteInvoice" >

            <div class="row pb-30">
              <div class="col-md-12">
                <div class="pull-right">
                  <div class="stausImg">
                    <img src="../Company/companyLogo/<?php //echo $img; ?>.png" alt="">
                  </div>
                </div>
                <br><br><br><br>
              </div>
              <div class="col-md-6 compInfo">

                <div class="logo">
                  <img src="../Logo.jpg" alt="" class="logo">
                </div>
              </div>
              <div class="col-md-6 compInfo">
                <div class="text-right">

                  <div class="cls_002">
                    <span class="cls_002"><b><?php echo "HAAD ICT"; ?></b></span>
                  </div>

                  <div class="cls_003">
                    <span class="cls_003">Address: <?php echo "tALEEX hODAN"; ?></span>
                  </div>

                  <div class="cls_003">
                    <span class="cls_003">Email: <?php echo "HAAD@GMAIL.COM"; ?></span>
                  </div>

                  <div class="cls_003">
                    <span class="cls_003">Web: <?php echo "HAAD.COM"; ?></span>
                  </div>

                  <div class="cls_003">
                    <span class="cls_003">Tel: <?php echo "203215"; ?></span>
                  </div>
                </div>
              </div>
            </div>  

            <div class="col-md-12 invoiceDesign">
              <?php

              require_once'function.php';
              $InvoiceDate="";
               $DueDate="";
              $result = getReceiptById($qutationId);
              while ($row=$result->fetch()) {
               $InvoiceDate= $row['InvoiceDate'];
             ?>
             <div class="cls_004" style="width: 100%;">
              <span class="cls_004"><b>Invoice #1000<?php echo $row['InvoiceId']; ?></b></span>
            </div>
            <div class="cls_005" style="width: 100%;">
              <span class="cls_005"><strong>Invoice Date:</strong> <?php echo $InvoiceDate; ?></span>
            </div>
          </div>
          <div class="col-md-12" style="padding: 5px 5px; margin: 15px;">
            <div class="cls_006" style="">
              <span class="cls_006"><strong>Invoiced To </strong></span>
            </div>
            <div class="cls_003" style="">
              <span class="cls_003"><?php echo $row['CustomerName'];?></span>
            </div>
            <div class="cls_003" style="">
              <span class="cls_003"><?php echo $row['CustomerAddress']; ?></span>
            </div>
            <div class="cls_003" style="">
              <span class="cls_003"><?php echo $row['Customerphone']; ?></span>
            </div>
          </div>
        <?php } ?>
          <div class="col-md-12 mainTables">
            <div class="table-responsive">
              <table class="table displayedTable table-bordered">
                <thead class="table-sm cls_007 tableHeader">
                  <tr>
                    <th scope="col" class="text-center cls_007">Service Type</th>
                    <th scope="col" class="text-right cls_007">Price</th>
                    <th scope="col" class="text-right cls_007">Qty</th>
                    <th scope="col" class="text-right cls_007">Discount %</th>
                    <th scope="col" class="text-right cls_007">Total</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  // require_once'Class.php';
                  $Total =$subtotal= $VAT=0;
                  $result = RedQuatationDetails($qutationId);
                  while ($row=$result->fetch()) {
                   $Total+= $row['Amount'];
                   $VAT = $row['Tax'];
                   $subtotal+=$row['Amount']+$VAT;
                   // ('.$row['percentage'].'% Balance from Deposit)
                   echo '<tr class="cls_003">
                   <td class="cls_003 ">'.$row['ServName'].'</td>
                   <td class="cls_003 text-right" >'.$row['Amount'].' %</td>
                   <td class="cls_003 text-right" >'.$row['Qty'].'</td>
                   <td class="cls_003 text-right" >'.$row['Discount'].'</td>
                   <td class="cls_003 text-right" >'.$row['Total'].'</td>
                   </tr>';
                 }
                 ?>

                <tr class="cls_007" style="background-color: #EFEFEF; border-bottom: 1px solid #DCDCDC;">
                  <th scope="col" colspan="4" class="text-right cls_007">Sub Total</th>
                  <th scope="col" class="text-right cls_007">$<?php echo $Total; ?></th>
                </tr>
                <tr class="cls_007" style="background-color: #EFEFEF; border-bottom: 1px solid #DCDCDC;">
                  <th scope="col" colspan="4" class="text-right cls_007">5.00% VAT</th>
                  <th scope="col" class="text-right cls_007">$<?php echo $VAT; ?></th>
                </tr>
                <!-- <tr class="cls_007" style="background-color: #EFEFEF; border-bottom: 1px solid #DCDCDC;">
                  <th scope="col" class="text-right cls_007">Discount</th>
                  <th scope="col" class="text-right cls_007">$<?php echo $discount; ?></th>
                </tr> -->
                <tr class="cls_007" style="background-color: #EFEFEF; border-bottom: 1px solid #DCDCDC;">
                  <th scope="col" colspan="4" class="text-right cls_007">Total</th>
                  <th scope="col" class="text-right cls_007">$<?php echo $subtotal; ?></th>
                </tr>

               </tbody>
               
            </table>
          </div>
        </div>
        <div class="col-md-12" class="invoiceNote">
          <div class="cls_003">
            <span class="cls_003">Notes: <?php //echo getQuoteCommentBanks(); ?></span>
          </div>

        </div>
      </div>
       </div>
  </div>

</div>
<!-- Update Modal -->
<div class="footer">
  <div class="pull-right">
    <!-- 10GB of <strong>250GB</strong> Free. -->
  </div>
  <div>
    <strong>Copyright</strong> HAAD Company &copy; 2019-2020
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
<script type="text/javascript" src="../printThis.js"></script>
<script>
  $(document).ready(function() {
      // alert("hhhh");
      $('#QuoteInvoice').printThis({
        importCSS: true,
        loadCSS: "http://localhost:/Ladantravel/desings/10designa",
        base: "printRec.php"
      });
  });
</script>
