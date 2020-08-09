<script>

// Add Ticket Operation
function addCargo(){
  
    // get values
    var package = $("#package").val();
    var pkg = $("#pkg").val();
    var crcprice = $("#crcprice").val();
    var crsprice = $("#crsprice").val();
    var crprofit = $("#crprofit").val();
    var crdesfrom = $("#crdesfrom").val();
    var crdesto = $("#crdesto").val();
    var crairline = $("#crairline").val();
    var tdate = $("#tdate").val();
     var gdate = $("#gdate").val();
    var rname = $("#rname").val();
    var rtell = $("#rtell").val();
    var raddr = $("#crdesc").val();
    var crdesc = $("#raddr").val();
    var crcustid = $("#crcustid").val();
    var user_id = $("#user_id").val();

 // alert(vdate);
    // Add record
    $.post("addCargo.php", {
        package: package,
        pkg: pkg,
        crcprice: crcprice,
        crsprice: crsprice,
        crprofit: crprofit,
        crdesfrom: crdesfrom,
        crdesto: crdesto,
        crairline: crairline,
        tdate: tdate,
        gdate: gdate,
        rname: rname,
        rtell: rtell,
        raddr: raddr,
        crdesc: crdesc,
        crcustid: crcustid,
        user_id: user_id,
        
    }, function (data, status) {
        // close the popup
    alert(data);
        $("#addCargoModal").modal("hide");
        location.reload();
       
        
    });
}
// end of Ticket Operation
// When updating
function GetUpdateDetails(up_id) {

    
    $("#up_id").val(up_id);

    $.post("readCargoDetails.php", {
           
            up_id: up_id
        },
        function (data, status) {
            // PARSE json data
            var result = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#up_crcustid").val(result.CustomerId);
            $("#up_package").val(result.packageTypeId);
            $("#up_pkg").val(result.packageKg);
            $("#up_crcprice").val(result.costPrice);
            $("#up_crsprice").val(result.sellPrice);
            $("#up_crprofit").val(result.profit);
            $("#up_crdesfrom").val(result.destanationFrom);
            $("#up_crdesto").val(result.destanationTo);
            $("#up_crairline").val(result.airLineId);
            $("#up_tdate").val(result.takingDate);
            $("#up_gdate").val(result.gettingDate);
            $("#up_rname").val(result.reciverName);
            $("#up_rtell").val(result.reciverTell);
            $("#up_raddr").val(result.reciverAddress);
            $("#up_crdesc").val(result.cargoDescription);
            $("#up_user_id").val(result.cargoCreateBy);
            $("#up_id").val(result.CargoId);


        }
    );
    // Open modal popup
      $("#updateModal").modal("show");

}
// When button update is clicked
function updateRecord() {
    // get values
    var up_crcustid = $("#up_crcustid").val();
    var up_package = $("#up_package").val();
    var up_pkg = $("#up_pkg").val();
    var up_crcprice = $("#up_crcprice").val();
    var up_crsprice = $("#up_crsprice").val();
    var up_crprofit = $("#up_crprofit").val();
    var up_crdesfrom = $("#up_crdesfrom").val();
    var up_crdesto = $("#up_crdesto").val();
    var up_crairline = $("#up_crairline").val();
    var up_tdate = $("#up_tdate").val();
    var up_gdate = $("#up_gdate").val();
    var up_rname = $("#up_rname").val();
    var up_rtell = $("#up_rtell").val();
    var up_raddr = $("#up_raddr").val();
    var up_crdesc = $("#up_crdesc").val();
    var up_user_id = $("#up_user_id").val();

    // get hidden field value
    var up_id = $("#up_id").val();
 
    // Update the details by requesting to the server using ajax
    $.post("updateCargo.php", {
             up_crcustid: up_crcustid,
            up_package: up_package,
            up_pkg: up_pkg,
            up_crcprice: up_crcprice,
            up_crsprice:up_crsprice,
            up_crprofit: up_crprofit,
             up_crdesfrom: up_crdesfrom,
            up_crdesto:up_crdesto,
            up_crairline: up_crairline,
            up_tdate : up_tdate,
            up_gdate: up_gdate,
            up_rname:up_rname,
            up_rtell: up_rtell,
            up_raddr : up_raddr,
            up_crdesc: up_crdesc,
            // up_desc:up_desc,
            up_user_id: up_user_id,
            up_id : up_id
            //alert(up_cname,);
        },
        function (data, status) {
            // hide modal popup
			alert(data);
           $("#updateModal").modal("hide");
            //$("#up_inv_no").val("");
       
        }
    );
}

function GetDelete(cr_del_id) {

    $("#cr_del_id").val(cr_del_id);
  Swal.fire({
            title: 'Are you sure to delete this ?',
            text: "You won't be able to revert this!",
            warning: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.value) {
   $.ajax({
    url:"deleteVisa.php",
    method:"POST",
    data:{cr_del_id:cr_del_id,status:'deletecargo'},
    success:function(data)
    {
     //alert(data);
     
     swal.fire({
              title:'Msg! '+data,
              type:'success'
            })
      setTimeout(function() 
        {
          location.reload();  //Refresh page
        }, 2000);
    }
   });
 }
  });
  // else
  // {
  //  return false; 
  // }

}
</script>