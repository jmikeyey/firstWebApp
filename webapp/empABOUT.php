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
        <!-- FONT AWESOME -->
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> 
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- BOOTSTRAP -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- DATA TABLES -->       
        <!-- JS LIB. DATA TABLE -->
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>  
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script> 
        <!-- CSS LIB. DATA TABLE -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" />  
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />     
<style>
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


/* ===== SIDEBAR ===== */
        .navbar{
            position: fixed;
            overflow: hidden;
            width: 100%;
            height: 50px;
            box-shadow: 0px 3px 4px 1px #d6d6d6;
        }
    .sidebartop{
        float: left;
        position: fixed;
        display: block;
        margin-top: 55px;
        padding: 30px;
        width: 300px;
        height: 240px;
        overflow: auto;
        box-shadow: 0px 3px 4px 1px #d6d6d6;
        border-bottom: 1px solid black;
    }
    .sidebar{
        float: left;
        position: fixed;
        display: block;
        margin-top: 300px;
        padding: 5px;
        width: 300px;
        height: 1000px;
        overflow: auto;
        box-shadow: 0px 3px 4px 1px #d6d6d6;
    }
    img{
        border-radius: 69px;
        height: 130px;
        width: 130px;
        margin-left: 50px;
    }
    .sidebar a{
        color: black;
        display: block;
        padding: 15px 30px 15px 30px;
        margin-top: 2px;
        text-decoration: none;
        font-size: 18px;
        text-transform: uppercase;
        border-radius: 10px;
    }
    .sidebar a:hover{
        background-color:  #1872e9;
        transition: 0.3s;
        color: white;
    }
    .active{
        background-color: #1872e9;
    }
    .containers{
        position: absolute;
        margin-top: 65px;
        margin-left: 310px;
        overflow: scroll;
    }
    .box{
        width: 1180px;
        height: 50px;
        box-shadow: 0px 3px 4px 1px #d6d6d6;
    }
    .box h1{
        display: flex;
        padding-top: 8px;
        padding-left: 5px;
        font-size: 24px;
    }
    .box2{
        margin-top: 5px;
        width: 100%;
        height: 550px;
        box-shadow: 0px 3px 4px 1px #d6d6d6
    }
    .btn1{
        position: absolute;
        top: 120px; 
    }
    .row{
        margin-top: 115px;
        overflow: hidden;
    }
    .danger-box{
        background-color: #ffe8d9;
        height:150px;
    }
/* ===== SIDEBAR END ===== */
        .logs{
			position: absolute;
			right: 50px;
			padding: 2px;
			border-left: 2px solid #121212;
		}
        .container2{
            position: absolute;
            margin-top: 65px;
            margin-left: 310px;
        }
        .info-box{
            margin-top: 50px;
            width: 800px;
            text-transform: justify;
        }
</style>
	</head>
	<body>


			
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

<!-- NAVBARS -->
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
                <a href="empINDEX.php" class="active" style="color: white;"><i class="fa fa-tachometer"></i> Dashboard</a>
				<hr>
				<a href="empEMPLOYEE.php"><i class="fa fa-users"></i> Employees</a>
                <a href="empABOUT.php" class="active" style="color: white;"><i class="fa fa-info-circle"></i> About Us</a>
				<a href="empUSERS.php"><i class='fa fa-gear'></i> Account Settings</a>
			</div>
<!-- NAVBARS -->			
	<div class="container2">
				<div class="box">
                    <h1>ABOUT US</h1>
				</div>
                <div class="info-box">
                <h3>Working to create a cleaner, greener, safer world</h3><br>
               <p> STACEY helps our customers deliver projects of purpose that create a lasting positive legacy. These are projects that create jobs and grow economies; improve the resiliency of the <span style="color: crimson; text-decoration:underline"> world's infrastructure; connect communities to resources and opportunity; get us closer to net zero; protect U.S. and allied interests; tackle critical environmental challenges </span>to protect people and the planet; and accelerate progress to make the world a cleaner, greener, safer place. <br><br>

                While expertise enables delivery, partnerships ensure long-term success, which is why we align everything we do to our customers’ goals. <br><br>

               <span style="color: crimson; text-decoration:underline"> Since 2001</span>, we have helped customers complete more than 25,000 projects in 160 countries on all seven continents. </p>
                    <p>© 2022 000webhost.com. All Rights Reserved.</p>
                    <p><a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a></p>
                </div>
	</div>
<!-- end container div -->

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


 