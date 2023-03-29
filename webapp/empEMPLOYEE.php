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
				<div class="logs">
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
				<a href="empEMPLOYEE.php" class="active" style="color: white;"><i class="fa fa-users"></i> Payroll</a>
                <a href="empABOUT.php"><i class="fa fa-info-circle"></i> About Us</a>
				<a href="empUSERS.php"><i class='fa fa-gear'></i> Account Settings</a>
			</div>
<!-- NAVBARS -->			
	<div class="containers">
				<div class="box" style="margin-bottom: 30px;">
                    <h1>Payroll</h1>
				</div>
                <?php 
                $mysqli = new mysqli('localhost', 'root', '', 'payrollsystem') or die (mysqli_error($mysqli)); 
                $empid = $_SESSION["employeeID"];
                $sql = "SELECT MAX(a.payslipID) AS payslip, b.earning, c.cashAdvance, c.sss
                    FROM payslip a
                    INNER JOIN salary b
                    ON b.payslipID=a.payslipID
                    INNER JOIN deduction c
                    ON c.payslipID=a.payslipID
                    WHERE a.employeeID=$empid";
            $row = mysqli_fetch_assoc(mysqli_query($mysqli, $sql));
                ?>
                <?php 
                    $mysqli = new mysqli('localhost', 'root', '', 'payrollsystem') or die (mysqli_error($mysqli)); 
                    $empID = $_SESSION["employeeID"];

                    $sql1 = "SELECT firstname, lastname, positionID FROM profiles WHERE employeeID =  $empID ";
                    $row1 = mysqli_fetch_assoc(mysqli_query($mysqli, $sql1));

                    if($row1['positionID'] == 1){
                        $rows = "Supervisor";
                    }else if($row1['positionID'] == 2){
                        $rows = "Worker";
                    }else if($row1['positionID'] == 3){
                        $rows = "Secretary";
                    }else if($row1['positionID'] == 4){
                        $rows = "Welder";
                    }
                ?>
                <!-- UPDATE QUERY BELOW THIS CODE -->
                <?php 
                    $mysqli = new mysqli('localhost', 'root', '', 'payrollsystem') or die (mysqli_error($mysqli)); 
                    $empID1 = $_SESSION["employeeID"];

                    $sql2 = "SELECT MAX(payslipID) as max, MAX(date) as curDate, MAX(endDate) as endDates FROM payslip WHERE employeeID = $empID1";
                    $row2 = mysqli_fetch_assoc(mysqli_query($mysqli, $sql2));

                ?>

                <div class="col" style="margin-left: 20px;">
                                    
                                    <h6>Coverage Dates of your payroll</h6>
                                            <p><b>Staring Date:</b> <span><?=$row2['curDate'] ?> </span> | <b>End Date:</b> <span><?=$row2['endDates'] ?> </span></p>
                                    <!-- NEW UPDATE ABOVE THIS -->
                                   <p><b>Payslip ID: </b>  <span id="posss"><?=$row['payslip']?></span></p> <!-- retrieve -->
                                   <p style="font-size: 30px;display:none;"> <span id="currDate" name="dateID"></span></p>
                                       <p style="display:;"><b>ID Number:</b>  <span id="empIDs" name="empIDn"><?=$_SESSION['employeeID']?></span></p>
                                   <p><b>Fullname:</b>  <span id="fName"><?=$row1['firstname']?></span> <span id="lName"><?=$row1['lastname']?></span></p>
                                   <p><b>Position:</b>  <span id="pos"><?=$rows?></span></p>
                               </div>
                               <hr>
                               <div class="row">
                                   <div class="col" style="margin-left: 20px;">
                                       <h5>Total Gross Pay</h5><br>
                                       <p><span id="grossPayyy"><?=$row['earning']?></span></p>
                                       <input type="hidden" id="grossPay"name="grossPay">
                                   </div>
                                   <div class="col">
                                   <h5>Total Deductions</h5>
                                       <div class="input-group" >
                                           <span class="input-group-text sm" id="basic-addon1">Adv</span>
                                           <input type="text" class="col-md-4 rounded" name="cashAddd" value="<?=$row['cashAdvance']?>" aria-describedby="basic-addon1" disabled>
                                       </div><br>
                                       <div class="input-group" >
                                           <span class="input-group-text sm" id="basic-addon1">SSS</span>
                                           <input type="text" class="col-md-4 rounded" name="penshionnn" value="20" value="<?=$row['sss']?>"  aria-describedby="basic-addon1" disabled>
                                       </div>
                                   </div>
                                   <div class="col" style="margin-left: 20px;">
                                       <h5>Total Net Pay</h5><br>
                                       <p><span id="grossPayyyyy"><?=$row['earning'] - ($row['sss'] + $row['cashAdvance'])?></span></p>
                                   </div>
                               </div>
            

	</div>
<!-- end container div -->

<!-- ===== (END)ADMIN WEB ===== -->


<script>



    $(document).ready(function() {
        $('.deletebtn').on('click', function(){

            $('#deleteModal').modal('show');
                
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);
                $('#id').val(data[0]);

        });
      });


        $('.editbtn').on('click', function(){

            $('#editModal').modal('show');
                
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);
                $('#id1').val(data[0]);
                $('#fname').val(data[1]);
                $('#lname').val(data[2]);
                $('#address').val(data[3]);
                $('#bdate').val(data[4]);
                $('#contact').val(data[5]);
                $('#gender').val(data[6]);

        });

        $('.createbtn').on('click', function(){

        $('#createAccount').modal('show');
            
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);
            $('#empID').val(data[0]);
            $('#user1').val(data[1]);
            $('#pass1').val(data[1]);

        });


     
        $('.promotebtn').on('click', function(){

            $('#promoteModal').modal('show');
                
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);
                $('#idP').val(data[0]);
                $('#fname1').text(data[1]+" "+data[2]);

        });
      



      

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

<script>  
 $(document).ready(function(){  
      $('#data').DataTable();  
 });  
 </script>  
 