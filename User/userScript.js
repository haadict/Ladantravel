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
function addRecord(){
	alert('Hello')
    // get values
    var userName = $("#userName").val();
    var userPassword = $("#userPassword").val();
    var userType = $("#userType").val();
    var userEmployeeId = $("#userEmployeeId").val();

console.log(userName)
    
    // Add record
    $.post("addUser.php", {
        userName: userName,
        userPassword: userPassword,
        userType: userType,
        userEmployeeId: userEmployeeId,
        
    }, function (data, status) {
        // close the popup
		alert(data);
        $("#addModal").modal("hide");
        // clear fields from the popup
        $("#comid").val("");
        $("#bname").val("");
        $("#btell").val("");
        $("#baddr").val("");
        //$("#user_id").val("");
        location.reload();
       
        
    });
}
// When updating
function GetUpdateDetails(up_id) {

    // Add User ID to the hidden field for furture usage
    // $("#up_sname").val(up_sname);
    // $("#up_tell").val(up_tell);
    // $("#up_addr").val(up_addr);
    // $("#up_email").val(up_email);
    // $("#up_user_id").val(up_user_id);
    $("#up_id").val(up_id);

    $.post("readBranchDetails.php", {
            
            up_id: up_id
        },
        function (data, status) {
            // PARSE json data
            var result = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#up_comid").val(result.CompanyId);
            $("#up_bname").val(result.BranchName);
            $("#up_btell").val(result.BranchPhone);
            $("#up_baddr").val(result.BranchAddress);
            $("#up_id").val(result.BranchId);


        }
    );
    // Open modal popup
      $("#updateModal").modal("show");

}
// When button update is clicked
function updateRecord() {
    // get values
    var up_comid = $("#up_comid").val();
    var up_bname = $("#up_bname").val();
    var up_btell = $("#up_btell").val();
    var up_baddr = $("#up_baddr").val();
    var up_user_id = $("#up_user_id").val();
    

    // get hidden field value
    var up_id = $("#up_id").val();
 
    // Update the details by requesting to the server using ajax
    $.post("updateBranch.php", {
             up_comid: up_comid,
            up_bname: up_bname,
            up_btell: up_btell,
            up_baddr: up_baddr,
            up_user_id: up_user_id,
            up_id : up_id
            
        },
        function (data, status) {
            // hide modal popup
			alert(data);
           $("#updateModal").modal("hide");
            $("#up_inv_no").val("");
       
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
    url:"deleteBranch.php",
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