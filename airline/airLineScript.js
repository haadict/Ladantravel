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
function addAirLine(){
	
    // get values
    var aname = $("#aname").val();
    
    // Add record
    $.post("addAirline.php", {
        aname: aname,
        
    }, function (data, status) {
        // close the popup
		alert(data);
        $("#addModal").modal("hide");

        

        // clear fields from the popup
        $("#aname").val("");
        location.reload();
       
        
    });
}
// When updating
function GetAirLineDetails(aid) {

    // Add User ID to the hidden field for furture usage
    $("#aid").val(aid);
    $.post("readAirLineDetails.php", {
            aid: aid
        },
        function (data, status) {
            // PARSE json data
            var air = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#u_aname").val(air.airLineName);
            


        }
    );
    // Open modal popup
      $("#updateModal").modal("show");

}
// When button update is clicked
function updateAirLine() {
    // get values
    var u_aname = $("#u_aname").val();
    

    // get hidden field value
    var aid = $("#aid").val();
 //    alert(fullname);
	// alert(tell);
	// alert(address);
	// alert(email);
	// alert(id);
    // Update the details by requesting to the server using ajax
    $.post("updateAirLine.php", {
            aid: aid,
            u_aname: u_aname,
            
        },
        function (data, status) {
            alert(data);
            // hide modal popup
			
            $("#updateModal").modal("hide");
            // reload Users by using readRecords();
            location.reload();
        }
    );
}

function GetAirLineDelete(aid) {

    $("#aid").val(aid);
  if(confirm("Are you sure you want to delete this?"))
  {
   $.ajax({
    url:"deleteAirLine.php",
    method:"POST",
    data:{aid:aid},
    success:function(data)
    {
     alert(data);
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