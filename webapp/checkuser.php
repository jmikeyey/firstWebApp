<?php

session_start();

//create and check connection 
$mysqli = new mysqli('localhost', 'root', '', 'payrollsystem') or die (mysqli_error($mysqli)); 

$user = $_POST['user'];
$pass = $_POST['pass'];

$sql = "SELECT * FROM users WHERE BINARY userName='$user' AND BINARY userPass='$pass' ";
$result = $mysqli -> query($sql);





if($result-> num_rows > 0){
    if($row = $result->fetch_assoc()) {
        $_SESSION["employeeID"] = $row["employeeID"];
		$_SESSION["userID"] = $row["userID"];
		$_SESSION["userName"] = $row["userName"];
		$_SESSION["userPass"] = $row["userPass"];
		$_SESSION["userType"] = $row["userType"];
		
            if($_SESSION["userType"] == "ADMIN"){
            $_SESSION['message'] = "Welcome ADMIN";
            /*can be multiple message, then change text*/ 
            $_SESSION['msg_type'] = "sccs";
            header("location: index.php");
            } elseif ($_SESSION["userType"] == "EMPLOYEE"){
                $_SESSION['message'] = "Welcome EMPLOYEE";
                $_SESSION['msg_type'] = "sccs";
                header("location: empINDEX.php");
            } elseif ($_SESSION["userType"] == "INCHARGE"){
                $_SESSION['message'] = "Welcome INCHARGE";
                $_SESSION['msg_type'] = "sccs";
                header("location: paymasterINDEX.php");
            }
            
	  } 

       
    }else {
        $_SESSION['message'] = "Denied";
        $_SESSION['msg_type'] = "dngr";
        header("location: login.php");
        echo "<script type='text/javascript'>alert('Access denied!'); window.location.replace('login.php'); </script>";
    }





?>