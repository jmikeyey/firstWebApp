<?php
	session_start();
	//echo $_SESSION["user_id"];
	//if(!isset($_SESSION["userID"]) || !isset($_SESSION["userType"])){
		//echo "<script type='text/javascript'>window.location.replace('login.php');</script>";
		//exit();
	//}
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

		<link rel="stylesheet" href="calendar-gc.css">
<style>
		.danger , .success{
            position: absolute;
            top: 50px;
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
	
			
    <!-- ALERT MESSAGE -->
	<div class="animate" id="hidanim">
            <?php
                if(isset($_SESSION['messages'])):?>
                    <div class="alert-<?=$_SESSION['msg_type']?>">
                        <?php
                            if($_SESSION['msg_type'] == 'dngr'): ?>
                                <div class="danger">
                                    <i class="fa fa-warning" style="color:red;"></i>
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
				<a href="index.php" class="active" style="color: white;"><i class="fa fa-tachometer"></i> Dashboard</a>
				<hr>
				<a href="employee.php" ><i class="fa fa-users"></i> Employees</a>
				<a href="position.php" ><i class="fa fa-briefcase"></i> Positions</a>
				<a href="payroll.php" ><i class='fa fa-line-chart'></i> Payroll</a>
				<a href="manage.php"><i class="fa fa-users"></i> Manage Users</a>
				<a href="users.php"><i class='fa fa-gear'></i> Account Settings</a>
			</div>

			<div class="containers">
				<div class="box3" style="font-family: arial;">
							<h1 style="margin-top: 20px;margin-left: 30px;">
								<?php 
									$mysqli = new mysqli('localhost', 'root', '', 'payrollsystem') or die (mysqli_error($mysqli)); 
									$result = $mysqli -> query("SELECT COUNT(positionID) as NUM FROM profiles");
									while($row = $result -> fetch_assoc()){
										echo $row['NUM'];
									}
									
								?> 
							</h1>
							<i class="fa fa-users" style="float: right;font-size: 80px;margin-right: 20px;"></i>
							<h3 style="margin-top: 50px;margin-left: 15px;">Total Employees</h3>
				</div>
				<div class="box1">
							<h1 style="margin-top: 20px;margin-left: 30px;">
								<?php 
									$mysqli = new mysqli('localhost', 'root', '', 'payrollsystem') or die (mysqli_error($mysqli)); 
									$result = $mysqli -> query("SELECT COUNT(userID) as NUM FROM users");
									while($row = $result -> fetch_assoc()){
										echo $row['NUM'];
									}
									
								?> 
							</h1>
							<i class="fa fa-user" style="float: right;font-size: 80px;margin-right: 20px;"></i>
							<h3 style="margin-top: 50px;margin-left: 15px;">Total Users</h3>
				</div>
				<div class="box4">
				<h1 style="margin-top: 20px;margin-left: 30px;">
								<?php 
									$mysqli = new mysqli('localhost', 'root', '', 'payrollsystem') or die (mysqli_error($mysqli)); 
									$result = $mysqli -> query("SELECT COUNT(positionID) as NUM FROM position");
									while($row = $result -> fetch_assoc()){
										echo $row['NUM'];
									}
									
								?> 
							</h1>
							<i class="fa fa-briefcase" style="float: right;font-size: 80px;margin-right: 20px;"></i>
							<h3 style="margin-top: 50px;margin-left: 15px;">Total Position</h3>
				</div>
				<div class="CALENDAR"><br>
				<br>
							<div id="calendar">
							</div>
				</div>
			</div>

<!-- ===== (END)ADMIN WEB ===== -->
<script src="calendar-gc.js"></script>
<script src="calendar-gc.min.js"></script>

<script>
$(function (e) {
    var calendar = $("#calendar").calendarGC({
      dayBegin: 0,
      prevIcon: '&#x3c;',
      nextIcon: '&#x3e;',
      onPrevMonth: function (e) {
        console.log("prev");
        console.log(e)
      },
      onNextMonth: function (e) {
        console.log("next");
        console.log(e)
      },
      events: [
        {
          date: new Date("2022-05-01"),
          eventName: "Labor Day",
          className: "badge bg-danger",
          onclick(e, data) {
            console.log(data);
          },
          dateColor: "red"
        },
        {
          date: new Date("2022-05-03"),
          eventName: "Eid al-Fitr",
          className: "badge bg-danger",
          onclick(e, data) {
            console.log(data);
          },
          dateColor: "red"
        },
        {
          date: new Date("2022-05-07"),
          eventName: "Paytime",
          className: "badge bg-success",
          onclick(e, data) {
            console.log(data);
          },
          dateColor: "green"
        },        
		{
          date: new Date("2022-05-14"),
          eventName: "Paytime",
          className: "badge bg-success",
          onclick(e, data) {
            console.log(data);
          },
          dateColor: "green"
        },        
		{
          date: new Date("2022-05-21"),
          eventName: "Paytime",
          className: "badge bg-success",
          onclick(e, data) {
            console.log(data);
          },
          dateColor: "green"
        },
		{
          date: new Date("2022-05-28"),
          eventName: "Paytime",
          className: "badge bg-success",
          onclick(e, data) {
            console.log(data);
          },
          dateColor: "green"
        },
      ],
      onclickDate: function (e, data) {
        console.log(e, data);
      }
    });
  })

</script>
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