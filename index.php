
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from html.designstream.co.in/boost-admin/layout/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Jul 2020 08:49:10 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Ladan Travel Agency</title>

        <link href="Assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="Assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="Assets/css/animate.css" rel="stylesheet">
    <link href="Assets/css/style.css" rel="stylesheet">
    </head>
       <body class="gray-bg">
     <?php include 'common/class.php';
      session_start(); 
	  $usern ="";
	  $passw ="";
	  $message = "";  
	  if(isset($_POST["login"]))  
      {  
		$usern =$_POST["username"];
		$passw = $_POST["password"];
           if(empty($usern) || empty($passw))  
           {  
                $message = '<label style="color:red;">UserName or Password is incorrect</label>';  
           }  
           else  
           {  
	           $result = getUser($usern,$passw);
			   while($row=$result->fetch()){
				 $_SESSION["Name"] = $row["EmployeeName"]; 
				$_SESSION["userType"] = $row["userType"]; 
				$_SESSION["EmployeeId"] = $row["EmployeeId"];					
                     header("location:Dashboard/Dashboard");  
			   }
			   
		   }
	  }
	  
	  ?>
       

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">IN+</h1>

            </div>
            <h3>LADAN TRAVEL AGENCY</h3>
           	<?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
				else{
					echo '<h3>Log into your account</h3>'; 
				}
                ?>
            <form method="post">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <input type="submit" name="login" class="btn btn-primary btn-block " value="Login" /> 

                <a href="#"><small>Forgot password?</small></a>
            </form>
            <p class="m-t"> <small>LADAN TRAVEL AGENCY &copy; 2020</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="Assets/js/jquery-2.1.1.js"></script>
    <script src="Assets/js/bootstrap.min.js"></script>
    </body>

<!-- Mirrored from html.designstream.co.in/boost-admin/layout/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Jul 2020 08:49:10 GMT -->
</html>
