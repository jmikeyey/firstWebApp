<?php
	session_start();	
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "payrollsystem";
		
    $userID = $_POST["id"];
	$user = $_POST["user"];
	$pass = $_POST["pass"];

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "UPDATE users SET userName='$user', userPass='$pass' WHERE userID='$userID'";

    //ON PROCESS, HIMOAN UG INPUT PASS, DISIR I RESET // userPass[input] == userPass [dtabase]

	if (mysqli_query($conn, $sql)) {
	  echo "Profile updated successfully";
	  $_SESSION["username"] = $user;
	  $_SESSION["password"] = $pass;

        $_SESSION['messages'] = "Password changed";
        $_SESSION['msg_type'] = "sccs";
        header("location: users.php");
		echo '<meta http-quivev="refresh" content="30">';
	} else {
	  echo "Error updating record: " . mysqli_error($conn);
	}

	

	mysqli_close($conn);
?>
