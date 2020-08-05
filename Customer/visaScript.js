<script>

function addVisa(){
	
    // get values
    var cusid = $("#cusid").val();
    var vdate = $("#vdate").val();
    var duration = $("#duration").val();
    var country = $("#country").val();
    var passno = $("#passno").val();
    var issby = $("#issby").val();
    var issdate = $("#issdate").val();
    var passexdate = $("#passexdate").val();
    var cprice = $("#cprice").val();
     var sellprice = $("#sellprice").val();
    var profit = $("#profit").val();
    var desc = $("#desc").val();
    var user_id = $("#user_id").val();

   //alert(vdate);
    // Add record
    $.post("addVisa.php", {
        cusid: cusid,
        vdate: vdate,
        duration: duration,
        country: country,
        passno: passno,
        issby: issby,
        issdate: issdate,
        passexdate: passexdate,
        cprice: cprice,
        sellprice: sellprice,
        profit: profit,
        desc: desc,
        user_id: user_id,
        
    }, function (data, status) {
        // close the popup
		alert(data);
        $("#addModal").modal("hide");
        location.reload();
       
        
    });
}
// When updating
function GetUpdateDetails(up_id) {

    
    $("#up_id").val(up_id);

    $.post("readVisaDetails.php", {
           
            up_id: up_id
        },
        function (data, status) {
            // PARSE json data
            var result = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#up_cusid").val(result.customerId);
            $("#up_vdate").val(result.visaDate);
            $("#up_duration").val(result.duration);
            $("#up_country").val(result.country);
            $("#up_passno").val(result.passportNo);
            $("#up_issby").val(result.issuedBy);
            $("#up_issdate").val(result.issuDate);
            $("#up_passexdate").val(result.passportExpireDate);
            $("#up_cprice").val(result.costprice);
            $("#up_sellprice").val(result.sellPrice);
            $("#up_profit").val(result.profit);
            $("#up_desc").val(result.visaDescription);
            //$("#up_user_id").val(result.EmployeeBranchID);
            
            

            $("#up_id").val(result.visaId);


        }
    );
    // Open modal popup
      $("#updateModal").modal("show");

}
// When button update is clicked
function updateRecord() {
    // get values
    var up_cusid = $("#up_cusid").val();
    var up_vdate = $("#up_vdate").val();
    var up_duration = $("#up_duration").val();
    var up_country = $("#up_country").val();
    var up_passno = $("#up_passno").val();
    var up_issby = $("#up_issby").val();
    var up_issdate = $("#up_issdate").val();
    var up_passexdate = $("#up_passexdate").val();
    var up_cprice = $("#up_cprice").val();
    var up_sellprice = $("#up_sellprice").val();
    var up_profit = $("#up_profit").val();
    var up_desc = $("#up_desc").val();
    var up_user_id = $("#up_user_id").val();
    

    // get hidden field value
    var up_id = $("#up_id").val();
 
    // Update the details by requesting to the server using ajax
    $.post("updateVisa.php", {
             up_cusid: up_cusid,
            up_vdate: up_vdate,
            up_duration: up_duration,
            up_country: up_country,
            up_passno:up_passno,
            up_issby: up_issby,
             up_issdate: up_issdate,
            up_passexdate:up_passexdate,
            up_cprice: up_cprice,
            up_sellprice : up_sellprice,
             up_profit: up_profit,
            up_desc:up_desc,
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

function GetDelete(del_id) {

    $("#del_id").val(del_id);
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
    data:{del_id:del_id},
    success:function(data)
    {
     //alert(data);
     
     swal.fire({
              title:'Msg! '+data,
              type:'success'
            }),
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