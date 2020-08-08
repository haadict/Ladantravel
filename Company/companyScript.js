<script>

// $(document).ready(function () {
//     // READ recods on page load
//     readRecords(); // calling function
// });
// // READ records
// function readRecords() {
//     $.get("readRecord.php", {}, function (data, status) {
//         $(".records_content").html(data);
//     });
// }

// Add Record
// function addRecord(){
	
//     // get values
//     var cname = $("#cname").val();
//     var tell = $("#tell").val();
//     var addr = $("#addr").val();
//     var email = $("#email").val();
//     var web = $("#web").val();
//     var user_id = $("#user_id").val();
//     var logo = $("#logo").val();

//     var ext=$('#logo').val().split('.').pop().toLowerCase();

//     if(ext != '')
//     {
//       if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
//       {
//         alert("Invalid Image File");
//         $('#logo').val('');
//         return false;
//       }
//     }
//    // alert(logo);
//     // Add record
//     $.post("addCompany.php", {
//         cname: cname,
//         tell: tell,
//         addr: addr,
//         email: email,
//         web: web,
//         user_id: user_id,
//         logo: logo
        
//     }, function (data, status) {
//         // close the popup
// 		alert(data);
//         $("#addModal").modal("hide");
//         // clear fields from the popup
//         $("#cname").val("");
//         $("#tell").val("");
//         $("#addr").val("");
//         $("#email").val("");
//         ("#web").val("");
//         $("#logo").val("");
//         //$("#user_id").val("");
//         location.reload();
       
        
//     });
// }
// When updating
function GetUpdateDetails(up_id) {

    
    $("#up_id").val(up_id);

    $.post("readCompanyDetails.php", {
           
            up_id: up_id
        },
        function (data, status) {
            // PARSE json data
            var result = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#up_cname").val(result.CompanyName);
            $("#up_tell").val(result.CompanyPhone);
            $("#up_addr").val(result.CompanyAddress);
            $("#up_email").val(result.CompanyEmail);
            $("#up_web").val(result.CompanyWebsite);

            $("#up_id").val(result.CompanyId);
            $("#himg").html('<img  src="../upload/'+result.CompanyLogo+'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="himg" value="'+result.CompanyLogo+'" />');


        }
    );
    // Open modal popup
      $("#updateModal").modal("show");

}
// When button update is clicked
function updateRecord() {
    // get values
    var up_cname = $("#up_cname").val();
    var up_tell = $("#up_tell").val();
    var up_addr = $("#up_addr").val();
    var up_email = $("#up_email").val();
    var up_web = $("#up_web").val();
    var up_user_id = $("#up_user_id").val();
    

    // get hidden field value
    var up_id = $("#up_id").val();
 
    // Update the details by requesting to the server using ajax
    $.post("updateCompany.php", {
             up_cname: up_cname,
            up_tell: up_tell,
            up_addr: up_addr,
            up_email: up_email,
            up_web:up_web,
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
    url:"deleteCompany.php",
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