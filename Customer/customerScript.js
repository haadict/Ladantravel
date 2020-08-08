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
function addCustomer(){
	
    // get values
    var fullname = $("#fullname").val();
    var tell = $("#tell").val();
    var address = $("#address").val();
	var email = $("#email").val();
	var user_id = $("#user_id").val();

    // Add record
    $.post("addCustomer.php", {
        fullname: fullname,
        tell: tell,
        address: address,
		email: email,
		user_id: user_id
    }, function (data, status) {
        // close the popup
		alert(data);
        $("#addModal").modal("hide");

        

        // clear fields from the popup
        $("#fullname").val("");
        $("#tell").val("");
        $("#address").val("");
		$("#email").val("");
        location.reload();
    });
}
// When updating
function GetCustomerDetails(id) {

    // Add User ID to the hidden field for furture usage
    $("#hidden_custId").val(id);
    $.post("readCustomerDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var Customer = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_fullname").val(Customer.CustomerName);
            $("#update_tell").val(Customer.Customerphone);
            $("#update_address").val(Customer.CustomerAddress);
			$("#update_email").val(Customer.CustomerEmail);


        }
    );
    // Open modal popup
      $("#updateModal").modal("show");

}
// When button update is clicked
function updateCustomer() {
    // get values
    var fullname = $("#update_fullname").val();
    var tell = $("#update_tell").val();
    var address = $("#update_address").val();
	var email = $("#update_email").val();

    // get hidden field value
    var id = $("#hidden_custId").val();
 //    alert(fullname);
	// alert(tell);
	// alert(address);
	// alert(email);
	// alert(id);
    // Update the details by requesting to the server using ajax
    $.post("updateCustomer.php", {
            id: id,
            fullname: fullname,
            tell: tell,
			address: address,
            email: email
        },
        function (data, status) {
            // hide modal popup
			
            $("#updateModal").modal("hide");
            // reload Users by using readRecords();
           location.reload();
        }
    );
}
// end of update fuction

// delete function
function GetDelete(del_id) {

    $("#del_id").val(del_id);
  if(confirm("Are you sure you want to delete this?"))
  {
   $.ajax({
    url:"deleteExpenseType.php",
    method:"POST",
    data:{del_id:del_id},
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
// end of Customer delete fuction

// Visa Operations 
// Add Visa Operation
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

 // alert(vdate);
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
        $("#addVisaModal").modal("hide");
        location.reload();
       
        
    });
}
// end of Visa Operation
// Ticket Operations 
// Add Ticket Operation
function addTicket(){
  
    // get values
    var custid = $("#custid").val();
    var rdate = $("#rdate").val();
    var ticket = $("#ticket").val();
    var airline = $("#airline").val();
    var dfrom = $("#dfrom").val();
    var dto = $("#dto").val();
    var tcprice = $("#tcprice").val();
    var sprice = $("#sprice").val();
    var tprofit = $("#tprofit").val();
     var tdesc = $("#tdesc").val();
    
    var user_id = $("#user_id").val();

 // alert(vdate);
    // Add record
    $.post("addTicket.php", {
        custid: custid,
        rdate: rdate,
        ticket: ticket,
        airline: airline,
        dfrom: dfrom,
        dto: dto,
        tcprice: tcprice,
        sprice: sprice,
        tprofit: tprofit,
        tdesc: tdesc,
       
        user_id: user_id,
        
    }, function (data, status) {
        // close the popup
    alert(data);
        $("#addTicketModal").modal("hide");
        location.reload();
       
        
    });
}
// end of Ticket Operation

// Cargo Operations 
// Add Cargo Operation
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
// end of Cargo Operation
</script>