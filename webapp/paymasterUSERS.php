<?php
	session_start();
	//echo $_SESSION["user_id"];
	if(!isset($_SESSION["userID"]) || !isset($_SESSION["userType"])){
		echo "<script type='text/javascript'>window.location.replace('login.php');</script>";
		exit();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Payroll System</title>
		<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="styles.css">
<style>
		.alert{
			position: absolute;
		}
		.danger , .success{
            position: absolute;
            top: 125px;
            left: 310px;
            width: 1180px;
            color: black;
            font-size: 20px;
        }
        .danger{
            background: white;
            transition-duration: 2s;
            box-shadow: 4px 2px 6px 4px #e5e5e5;
            border-radius: 9px;
            border-left: 8px solid #ff4b4b;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 20px;
            font-family: 'Open Sans', sans-serif;
        }
        .success{
            background: white;
            transition-duration: 2s;
            box-shadow: 4px 2px 6px 4px #e5e5e5;
            border-radius: 9px;
            border-left: 8px solid #28fa28;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 20px;
            font-family: 'Open Sans', sans-serif; 
        }

		.formpos{
			padding-left: 50px;
			padding-top: 100px;
			letter-spacing: 1px;
		}
		.inpt{
			border: none;
			border-bottom: 2px solid gray;
			margin-top: 10px;
			margin-bottom: 10px;
			height: 40px;
		}
		.inpt:focus{
			outline: none;
			border-bottom: 2px solid #0085ff;
			transition: 0.5s;
		}
		.infobox{
			position: absolute;
			border: 2px solid crimson;
			height: 365px;
			width: 500px;
			top: 155px;
			right: 80px;
			overflow: hidden;
		}
		.infobox input[type="text"]{
			margin-top: 40px;
			padding: 10px;
			border-radius: 9px;

		}
		.logs{
			position: absolute;
			right: 50px;
			padding: 2px;
			border-left: 2px solid #121212;
		}

</style>
	</head>
	<body>
		<?php 
							$mysqli = new mysqli('localhost', 'root', '', 'payrollsystem') or die (mysqli_error($mysqli)); 
							$id = $_SESSION["employeeID"];
							$result = $mysqli -> query("SELECT * FROM profiles WHERE employeeID = $id");
								
							while($row = $result -> fetch_assoc()){
								$_SESSION["fname"] = $row["firstname"];
								$_SESSION["lname"] = $row["lastname"];
								$_SESSION["add"] = $row["address"];
								$_SESSION["bday"] = $row["birthdate"];
								$_SESSION["contact"] = $row["contact"];
							}
		?>

		

			<div class="navbar">
				<center>
					<div class="marq" style="position:absolute;left:550px;top:8px;width:500px;font-size:18px;">
						<marquee direction="left">
							<p><span style="color: red;"><i class='fa fa-exclamation-circle'></i> ATTENTION! PLEASE DONT FORGET TO WEAR YOUR HELMETS ON THE SITE</span> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp CONTACT THE ADMIN IF YOU HAVE ISSUE IN YOUR ACCOUNT, THANK YOU! &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span style="color: #00bfeb;"><i class='fa fa-bell'></i>THANK YOU! FOR WORKING WITH US, WE WILL DOUBLE YOUR SALARY IF YOU'RE READING THIS</span> </p>	
						</marquee>
					</div>
				</center>
				<div class="logs" style="">
					<a href="logout.php" style="text-decoration: none;"> 
						<span>&nbsp<?php echo $_SESSION["userName"] ?></span> 
						<i class="fa fa-sign-out"></i>
						
					</a>
				</div>
			</div>

			<div class="sidebartop">
				<img src="logo.png" alt="">
				<H5 style="margin-top: 15px;text-align:center">HELLO <span><?php echo $_SESSION["userType"] ?> !</span></H5>
			</div>
			<div class="sidebar">
                <a href="paymasterINDEX.php"><i class="fa fa-tachometer"></i> Dashboard</a>
				<hr>
				<a href="paymasterEMPLOYEE.php"><i class="fa fa-users"></i> Employees</a>
				<a href="paymasterPAYROLL.php"><i class='fa fa-line-chart'></i> Payroll</a>
				<a href="paymasterUSERS.php"  class="active" style="color: white;"><i class='fa fa-gear'></i> Account Settings</a>
			</div>

			
    <!-- ALERT MESSAGE -->
	<div class="animate" id="hidanim">
            <?php
                if(isset($_SESSION['messages'])): ?>
                    <div class="alert-<?=$_SESSION['msg_type']?>">
                        <?php
                            if($_SESSION['msg_type'] == 'dngr'): ?>
                                <div class="danger">
                                    <?php
                                        echo $_SESSION['messages'];
                                        unset($_SESSION['messages']); 
                                    ?>
                                </div>
                            <?php elseif($_SESSION['msg_type'] == 'sccs'): ?>
                                <div class="success">
                                    <i class="fa fa-check" style="color:green;"></i>
                                    <?php
                                        echo $_SESSION['messages'];
                                        unset($_SESSION['messages']); 
                                    ?>
                                </div>
                            <?php endif ?>
                                    
                    </div>
                <?php endif ?>
        </div>
    <!-- (END)ALERT MESSAGE -->



			<div class="containers">
				<script>	
					function check_pass() {
						if (document.getElementById('password').value == document.getElementById('confirm_password').value) {
							document.getElementById('submit').disabled = false;
							document.getElementById('message').style.color = 'green';
							document.getElementById('message').innerHTML = "passsword match";
						} else {
							document.getElementById('submit').disabled = true;
							document.getElementById('message').style.color = 'red';
							document.getElementById('message').innerHTML = "passsword not match";
						}
					}
				</script>
				<div class="box">
				<h1>Change Account Login</h1> <br><br>
				</div>
				<div class="box2" style="box-shadow: 0px 3px 4px 1px #d6d6d6;">	
					<div class="formpos">
						<div class="style" style="border: 2px solid red;width: 260px;padding-left: 30px;padding-right: 30px;padding-top:10px;padding-bottom:10px;">
							<form action="userchange.php" method="POST">				
								<input type="hidden" name="id" value="<?php echo $_SESSION["userID"] ?>" />
								<h5>Username: </h5><input class="inpt" type="text" name="user" placeholder="Username"  required onkeyup="check_pass()" value="<?php echo $_SESSION["userName"] ?>" readonly/> <br/>
								<h5>Password: </h5> <input class="inpt" id="password" type="password" name="pass" placeholder="Password"  required  onkeyup="check_pass()" /> <br/> 
								<h5>Confirm Password:</h5> <input class="inpt" id="confirm_password" type="password" name="pass2" placeholder="Confirm Password"  required onkeyup='check_pass();' /> <br/> 
								<span id='message'></span> <br />
								<input class="btn btn-primary" id="submit" type="submit" value="Change" />
							</form>
						</div>
					</div>
				</div>

				<div class="infobox">
					<div class="forms">
						<center>
							<input type="text" placeholder="Firstname" value="<?php echo $_SESSION["fname"]; ?>"  readonly> <input type="text" placeholder="Lastname" value="<?php echo $_SESSION["lname"]; ?>" readonly>
							<input type="text" placeholder="Address" value="<?php echo $_SESSION["add"]; ?>" readonly>
							<input type="text" placeholder="Birthdate" value="<?php echo $_SESSION["bday"]; ?>" readonly>
							<input type="text" placeholder="Contact" value="<?php echo $_SESSION["contact"]; ?>" readonly>
						</center>
					</div>
				</div>
			</div>


<!-- ===== (END)ADMIN WEB ===== -->

<!-- ANIMATION ALERT -->
<script>
        console.log(".alert");
        window.setTimeout(function(){   
            $("#hidanim").fadeTo(500,0).slideUp(500, function(){
                $(this).remove();
            }); 
        }, 2000);
    </script>
<!-- END ANIMATION ALERT-->	

					
	</body>
</html> 