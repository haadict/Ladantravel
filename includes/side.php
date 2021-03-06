<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from html.designstream.co.in/boost-admin/layout/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Jul 2020 08:42:57 GMT -->
<head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Ladan Travel Agency</title>

       <link href="../Assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="../Assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="../Assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="../Assets/css/animate.css" rel="stylesheet">
    <link href="../Assets/css/style.css" rel="stylesheet">
	

    <link href="../Assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

	
	<style>
	body {
    font-family: "open sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
    background-color: #000;
    font-size: 13px;
    color: #676a6c;
    overflow-x: hidden;
}
}
.nav-header {
    padding: 33px 25px;
    background: url(patterns/header-profilegg2.png) no-repeat;
}
	</style>
    </head>
	<body class="fixed-navbar fixed-sidebar">
	   <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="../Assets/img/profile_small.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="profile.html">Profile</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="mailbox.html">Mailbox</a></li>
                                <li class="divider"></li>
                                <li><a href="login.html">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    <li class="active">
                        <a href="../Dashboard/Dashboard"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> </a>
                        
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Customers</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="../Customer/customerList">Customer list</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Employers</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="../Employee/employeeList">Employer list</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">Suppliers</span>  <span class="pull-right label label-primary">SPECIAL</span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="../Suplier/suplierList.php">Supplier list</a></li>
                        </ul>
                    </li><hr>
                    <li>
                        <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Receipt</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="../invoice/index">Receipt</a></li>
                        </ul>
                    </li>
                      <li>
                        <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Finance</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="../Expense/expenseList">Expenses</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-globe"></i> <span class="nav-label">Users</span><span class="label label-info pull-right">NEW</span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="../User/userList">user List</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-globe"></i> <span class="nav-label">Services</span><span class="label label-info pull-right">NEW</span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="../Services/visaList">Visa List</a></li>
                            <li><a href="../Services/TicketList">Ticket List</a></li>
                            <li><a href="../Services/cargoList">Cargo List</a></li>
                        </ul>
                    </li><hr>
                    <li>
                        <a href="#"><i class="fa fa-flask"></i> <span class="nav-label">Setups</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="../airline/airLineList">AirLines</a></li>
                            <li><a href="../Company/companyList">Company</a></li>
                            <li><a href="../Branch/branchList">Branch</a></li>
                            <!-- <li><a href="">Invoice No</a></li> -->
                            <li><a href="../ExpenseType/expenseTypeList">Expense Type</a></li>
                            <li><a href="../PackageType/packageTypeList">Package Type</a></li>
                        </ul>
                    </li><hr>

                    <li>
                        <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Reports</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <!-- <li><a href="../reports/Financial">Financial Report</a></li> -->
                            <li><a href="../reports/incomeAndExpense">Income & expenses</a></li>
                            <li><a href="../reports/Reservation">Services Report</a></li>

							<li><a href="../reports/customers">Customer Report</a></li>
                            <!-- <li><a href="../reports/Employers">Employee Report</a></li> -->
							<!-- <li><a href="../reports/Suppliers">Supplier(Airlines) Report</a></li> -->
                        </ul>
                    </li>
                </ul>

            </div>
        </nav>
		
		</body>
		</html>