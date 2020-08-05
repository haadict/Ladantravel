<?php
<<<<<<< HEAD
    if(isset($_POST))
    {
        // include Database connection file
        include 'user_Class.php';

        // get values
        $userName = $_POST['userName'];
        $userPassword = $_POST['userPassword'];
        $userType = $_POST['userType'];
        $userEmployeeId = $_POST['userEmployeeId'];

        

		addRecord($userName,$userPassword,$userType,$userEmployeeId);

        echo "New Record Added!";
    }
?>
=======
if (isset($_POST)) {
    // include Database connection file
    include 'user_Class.php';

    // get values
    $EmployeeId = $_POST['EmployeeId'];
    $userName = $_POST['userName'];
    $userPassword = $_POST['userPassword'];
    $userType = $_POST['userType'];
    $createBy = $_POST['createBy'];



    addRecord($EmployeeId, $userName, $userPassword, $userType, $createBy);

    echo "New Record Added!";
}
>>>>>>> 334e8ac9642ed2d13b3a2007ddffbf77b5782684
