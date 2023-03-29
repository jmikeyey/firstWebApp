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
        
        
        .navbar{
              position: fixed;
              overflow: hidden;
            width: 100%;
            height: 50px;
            box-shadow: 0px 3px 4px 1px #d6d6d6;
        }
        .logs{
			position: absolute;
			right: 50px;
			padding: 2px;
			border-left: 2px solid #121212;
		}
/* ===== SIDEBAR ===== */
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
        width: 1180px;
        height: 485px;
    }
    .btn1{
        position: absolute;
        top: 120px; 
    }
    .row{
        margin-top: 50px;
        overflow: hidden;
    }
    .danger-box{
        background-color: #ffe8d9;
        height:150px;
    }
/* ===== SIDEBAR END ===== */
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
				<a href="index.php" class="active" style="color: white;"><i class="fa fa-tachometer"></i> Dashboard</a>
				<hr>
				<a href="employee.php" ><i class="fa fa-users"></i> Employees</a>
				<a href="position.php"><i class="fa fa-briefcase"></i> Positions</a>
				<a href="payroll.php" class="active" style="color:white" ><i class='fa fa-line-chart'></i> Payroll</a>
                <a href="manage.php"><i class="fa fa-users"></i> Manage Users</a>
                <a href="users.php"><i class='fa fa-gear'></i> Account Settings</a>
			</div>
<!-- NAVBARS -->			
	<div class="containers">
				<div class="box">
                    <h1>Employee Payslip</h1>
				</div>
                <?php
                    $mysqli = new mysqli('localhost', 'root', '', 'payrollsystem') or die (mysqli_error($mysqli)); 
                    $result = $mysqli -> query("SELECT * FROM profiles");
                ?>      
        <div class="box2" style="box-shadow: 0px 3px 4px 1px #d6d6d6;">

            <div class="row" style="margin-left: 10px; width:1155px; font-size:12px;">
            <table id="data" class="table table-striped">  
                            <thead>
                                <th style="display:none;">id</th>
                                <th>firstname</th>
                                <th>lastname</th>
                                <th >Address</th>
                                <th >Birthdate</th>
                                <th >Contact</th>
                                <th >Gender</th>
                                <th >Position</th>
                                <th colspan="1">Operations</th>
                            </thead>
                                <?php
                                    while($row = $result-> fetch_assoc()):
                                    ?>
                                    
                                        <tr>
                                            <td style="display:none;"><?php echo $row['employeeID']; ?></td>
                                            <td class="userClass"><?php echo $row['firstname']; ?></td>
                                            <td class="passClass"><?php echo $row['lastname']; ?></td>
                                            <td class=""><?php echo $row['address']; ?></td>
                                            <td class=""><?php echo $row['birthdate']; ?></td>
                                            <td class=""><?php echo $row['contact']; ?></td>
                                            <td class=""><?php echo $row['gender']; ?></td>
                                            <td class=""><?php 
                                                    if($row['positionID'] == 1){
                                                        echo 'Supervisor';
                                                    } elseif($row['positionID'] == 2){
                                                        echo 'Worker';
                                                    }  elseif($row['positionID'] == 3){
                                                        echo 'Secretary';
                                                    }   elseif($row['positionID'] == 4){
                                                        echo 'Welder';
                                                    }  
                                                ?>
                                            </td>
                                            <td>
                                                    <button type="button"  class="btn btn-primary payslip" style="font-size:11px;">Manage Payslip</button>
                                                    <button type="button"  class="btn btn-primary payslip2" style="font-size:11px;" onchange="togglebutton()" id="disable">Show Payslip</button>
               
                                            </td>
                                            
                                        </tr>
                                    <?php endwhile; ?>
                            </table>
            </div>

        </div>
	</div>
<!-- end container div -->

<!-- ===== (END)ADMIN WEB ===== -->

<!-- Modal GENERATE ID-->  
<div class="modal fade" id="generateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="height: 350px;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Generate payslip ID for <span id="name2"></span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                <form action="process.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" id="id1" name="employeeID">
                        <div class="form-group">
                            <label style="float: left;margin-bottom:5px">Date of pay</label>
                            <input type="date" name="dateGen" class="form-control" id="salary" autocomplete="off" REQUIRED>
                        </div>
                    </div>   
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="genID" class="btn btn-primary" id="updates">Generate now</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
<!-- END Modal  GENEERTAE-->

<!-- Modal payslip-->  
<div class="modal fade" id="payslipModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="height: 600px;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Generate payslip for <span id="name3"></span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                <form action="process.php" method="POST">
                    <div class="modal-body">
                            <!-- PAYSLIP // GET PAYSLIPID WHERE EMPLOYEEID -->

                            <input type="hidden" name="employeeID" id="employeeID">

                        <input id="payslipID" type="hidden" name="payslipID">
                        
                        <h4 style="float: left;margin-top: 10px;">TOTAL DEDUCTIONS</h4><br><br>
                        <div class="form-group">
                            <label style="float: left;margin-bottom: 5px;">Cash Advance</label>
                            <input type="text" name="cashAd" class="form-control" placeholder="Cash Advance" id="" autocomplete="off"  REQUIRED>
                        </div>
                        <div class="form-group">
                            <label style="float: left;margin-bottom: 5px;">SSS</label>
                            <input type="text" name="sss" class="form-control" id="" autocomplete="off" value="20" readonly>
                        </div><br><br>
                        <h4 style="float: left">TOTAL SALARY</h4><br><br>
                        <div class="form-group">
                            <label style="float: left;margin-bottom: 5px;">Earnings</label>
                            <input type="text" name="earning" class="form-control" placeholder="Total Earning this week" id="" autocomplete="off"  REQUIRED>
                        </div>

                    </div>   
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="uploadData" class="btn btn-primary">UPLOAD DATA</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
<!-- END Modal -->

<!-- manage payslip DONE-->  
<div class="modal fade" id="showPayslip" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-xl" >
            <div class="modal-content" >
                    <div class="modal-header">
                        <h3 style="margin-left: 20px;">Manage Employee Payroll</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
           
                    <div class="modal-body">
                        <form action="process.php" method="POST" >
                            <div class="col" style="margin-left: 20px;">
                                    <input type="date" name="curDate"><br>   
                                    <p style="font-size: 30px;display:none;"> <span id="currDate" name="dateID"></span></p>
                                        <!-- <p style="display:;"><b>ID Number:</b>  <span id="empIDs"></span></p> -->
                                        <input type="hidden" name="empIDn" id="empID2">
                                    <p><b>Fullname:</b>  <span id="fName"></span> <span id="lName"></span></p>
                                    <p><b>Position:</b>  <span id="pos"></span> | <b>Total Attendance:</b> <span id="demo"></span></p>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input week" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">Weekly</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input 15day" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">15th Day</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input month" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                        <label class="form-check-label" for="inlineRadio3">Monthly</label>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                <div class="col" style="margin-left: 20px;">
                                    <h5>Total Gross Pay</h5><br>
                                    <p><span id="grossPay"></span></p>
                                    <input type="text" id="grossPay"name="grossPay">
                                </div>
                                <div class="col">
                                    <h5>Total Deductions</h5>
                                    <div class="input-group" >
                                        <span class="input-group-text sm" id="basic-addon1">Adv</span>
                                        <input type="text" class="col-md-4 rounded" name="cashAd" aria-describedby="basic-addon1">
                                    </div><br>
                                    <div class="input-group" >
                                        <span class="input-group-text sm" id="basic-addon1">SSS</span>
                                        <input type="text" class="col-md-4 rounded" name="penshion" value="20" aria-describedby="basic-addon1" readonly>
                                    </div>

                                </div>
                            </div>
                        
                    </div>   
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submit2" class="btn btn-primary" id="updatess">Submit</button>
                        </div>
                        </form>
            </div>
        </div>
    </div>
<!-- END Modal -->

<!-- Modal payslip last-->  
<div class="modal fade" id="showPayslip2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-xl" >
            <div class="modal-content" >
                    <div class="modal-header">
                        <h3 style="margin-left: 20px;">Show Employee Payroll</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="process.php" method="POST" >
                            <div class="col" style="margin-left: 20px;">
                                   
                                    <p><b>Payslip ID: </b>  <span id="posss"></span></p> <!-- retrieve -->
                                    <p style="font-size: 30px;display:none;"> <span id="currDate" name="dateID"></span></p>
                                        <p style="display:;"><b>ID Number:</b>  <span id="empIDs" name="empIDn"></span></p>
                                    <p><b>Fullname:</b>  <span id="first"></span> <span id="last"></span></p>
                                    <p><b>Position:</b>  <span id="posti"></span></p>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col" style="margin-left: 20px;">
                                        <h5>Total Gross Pay</h5><br>
                                        <p><span id="grossPayyy"></span></p>
                                        <input type="hidden" id="grossPay"name="grossPay">
                                    </div>
                                    <div class="col">
                                    <h5>Total Deductions</h5>
                                        <div class="input-group" >
                                            <span class="input-group-text sm" id="basic-addon1">Adv</span>
                                            <input type="text" class="col-md-4 rounded" name="cashAddd" aria-describedby="basic-addon1" disabled>
                                        </div><br>
                                        <div class="input-group" >
                                            <span class="input-group-text sm" id="basic-addon1">SSS</span>
                                            <input type="text" class="col-md-4 rounded" name="penshionnn" value="20" aria-describedby="basic-addon1" disabled>
                                        </div>
                                    </div>
                                    <div class="col" style="margin-left: 20px;">
                                        <h5>Total Net Pay</h5><br>
                                        <p><span id="grossPayyyyy"></span></p>
                                    </div>
                                </div>
                        
                    </div>   
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </form>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- UPDATE STARTS HERE!!  -->
<script>
    function togglebutton(){
        var butt = $('#updatess').val();

        if(butt){
            $('#disable').attr('disabled', false);
        }else{
            $('#disable').attr('disabled', true); 
        }
    }
</script>
<script>

    //PAYSLIPSHOW
    $('.payslip2').click(function(){
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        var empID = data[0];

        $('#first').text(data[1]);
        $('#last').text(data[2]);
        $('#posti').text(data[8]);
        $.ajax({
            type: "POST",
            url: "process.php",
            data: {payslipp: empID},
            success: function(response){
                let payslipppp = JSON.parse(response)
                
                $('#posss').text(payslipppp.payID)
                $('#grossPayyy').text(payslipppp.grosspay)
                $('input[name=cashAddd]').val(payslipppp.deduction)
                $('input[name=penshionnn]').val(payslipppp.sss)
                let totalnet = parseInt(payslipppp.grosspay) - (parseInt(payslipppp.sss) + parseInt(payslipppp.deduction))
                $('#grossPayyyyy').text(totalnet)
            }
        })
    })
    //END

    var today = new Date();

    var date =  today.getMonth()+1 + "-"+today.getDate()+ '-'+ today.getFullYear();
    document.getElementById("currDate").innerHTML = date;
/* USELESS TRIAL */
    $('.payslip').on('click', function(){

    $('#showPayslip').modal('show');
        
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);

        const comp = data[7];
            console.log(comp);
        var job1 = "Secretary                                            ";
        var job2 = "Supervisor                                            ";
        var job3 = "Worker                                            ";
        var job4 = "Welder                                            ";
            console.log(job1);
                console.log(job1 === comp);
        
            
            if(job1 === comp){ //secretary 
                let result = document.querySelector('#demo'); //show random attendance
                document.body.addEventListener('change', function (e) {
                    let target = e.target;
                    let message;
                    switch (target.id) {
                        case 'inlineRadio1':
                            let x = Math.floor((Math.random() *3) + 5);
                            message = x;
                                var inputString = $("#pos").val();
                                    let prd = 600 * x;
                                        console.log(prd);
                                        $('input[name=grossPay] ').val(prd);
                                        document.getElementById("grossPay").innerHTML = prd;
                                console.log(inputString);
                            break;
                        case 'inlineRadio2':
                            let y = Math.floor((Math.random() * 5) + 10);
                            message = y;
                            let prd1 = 600 * y;
                                        console.log(prd1);
                                        $('input[name=grossPay]').val(prd1);
                                        document.getElementById("grossPay").innerHTML = prd1;
                            break;
                        case 'inlineRadio3':
                            let z = Math.floor((Math.random() * 5) + 26);
                            message = z;
                            let prd2 = 600 * z;
                                        console.log(prd2);
                                        $('input[name=grossPay]').val(prd2);
                                        document.getElementById("grossPay").innerHTML = prd2;
                            break;
                    }
                    result.textContent = message;
                });
            }else if(job2 === comp){ //supervisor
                let result = document.querySelector('#demo'); //show random attendance
                document.body.addEventListener('change', function (e) {
                    let target = e.target;
                    let message;
                    switch (target.id) {
                        case 'inlineRadio1':
                            let x = Math.floor((Math.random() *3) + 5);
                            message = x;
                                var inputString = $("#pos").val();
                                    //working but need args
                                    let prd = 1000 * x;
                                        console.log(prd);
                                        $('input[name=grossPay]').val(prd);
                                        document.getElementById("grossPay").innerHTML = prd;
                                console.log(inputString);
                            break;
                        case 'inlineRadio2':
                            let y = Math.floor((Math.random() * 5) + 10);
                            message = y;
                            let prd1 = 1000 * y;
                                        console.log(prd1);
                                        $('input[name=grossPay]').val(prd1);
                                        document.getElementById("grossPay").innerHTML = prd1;
                            break;
                        case 'inlineRadio3':
                            let z = Math.floor((Math.random() * 5) + 26);
                            message = z;
                            let prd2 = 1000 * z;
                                        console.log(prd2);
                                        $('input[name=grossPay]').val(prd2);
                                        document.getElementById("grossPay").innerHTML = prd2;
                            break;
                    }
                    result.textContent = message;
                });
            }else if(job2 === comp){ //supervisor
                let result = document.querySelector('#demo'); //show random attendance
                document.body.addEventListener('change', function (e) {
                    let target = e.target;
                    let message;
                    switch (target.id) {
                        case 'inlineRadio1':
                            let x = Math.floor((Math.random() *3) + 5);
                            message = x;
                                var inputString = $("#pos").val();
                                    //working but need args
                                    let prd = 1000 * x;
                                        console.log(prd);
                                        $('input[name=grossPay]').val(prd);
                                        document.getElementById("grossPay").innerHTML = prd;
                                console.log(inputString);
                            break;
                        case 'inlineRadio2':
                            let y = Math.floor((Math.random() * 5) + 10);
                            message = y;
                            let prd1 = 1000 * y;
                                        console.log(prd1);
                                        $('input[name=grossPay]').val(prd1);
                                        document.getElementById("grossPay").innerHTML = prd1;
                            break;
                        case 'inlineRadio3':
                            let z = Math.floor((Math.random() * 5) + 26);
                            message = z;
                            let prd2 = 1000 * z;
                                        console.log(prd2);
                                        $('input[name=grossPay]').val(prd2);
                                        document.getElementById("grossPay").innerHTML = prd2;
                            break;
                    }
                    result.textContent = message;
                });
            }else if(job3 === comp){ //worker
                let result = document.querySelector('#demo'); //show random attendance
                document.body.addEventListener('change', function (e) {
                    let target = e.target;
                    let message;
                    switch (target.id) {
                        case 'inlineRadio1':
                            let x = Math.floor((Math.random() *3) + 5);
                            message = x;
                                var inputString = $("#pos").val();
                                    //working but need args
                                    let prd = 300 * x;
                                        console.log(prd);
                                        $('input[name=grossPay]').val(prd);
                                        document.getElementById("grossPay").innerHTML = prd;
                                console.log(inputString);
                            break;
                        case 'inlineRadio2':
                            let y = Math.floor((Math.random() * 5) + 10);
                            message = y;
                            let prd1 = 300 * y;
                                        console.log(prd1);
                                        $('input[name=grossPay]').val(prd1);
                                        document.getElementById("grossPay").innerHTML = prd1;
                            break;
                        case 'inlineRadio3':
                            let z = Math.floor((Math.random() * 5) + 26);
                            message = z;
                            let prd2 = 300 * z;
                                        console.log(prd2);
                                        $('input[name=grossPay]').val(prd2);
                                        document.getElementById("grossPay").innerHTML = prd2;
                            break;
                    }
                    result.textContent = message;
                });
            }else if(job4 === comp){ //welder
                let result = document.querySelector('#demo'); //show random attendance
                document.body.addEventListener('change', function (e) {
                    let target = e.target;
                    let message;
                    switch (target.id) {
                        case 'inlineRadio1':
                            let x = Math.floor((Math.random() *3) + 5);
                            message = x;
                                var inputString = $("#pos").val();
                                    //working but need args
                                    let prd = 600 * x;
                                        console.log(prd);
                                        $('input[name=grossPay]').val(prd);
                                        document.getElementById("grossPay").innerHTML = prd;
                                console.log(inputString);
                            break;
                        case 'inlineRadio2':
                            let y = Math.floor((Math.random() * 5) + 10);
                            message = y;
                            let prd1 = 600 * y;
                                        console.log(prd1);
                                        $('input[name=grossPay]').val(prd1);
                                        document.getElementById("grossPay").innerHTML = prd1;
                            break;
                        case 'inlineRadio3':
                            let z = Math.floor((Math.random() * 5) + 26);
                            message = z;
                            let prd2 = 600 * z;
                                        console.log(prd2);
                                        $('input[name=grossPay]').val(prd2);
                                        document.getElementById("grossPay").innerHTML = prd2;
                            break;
                    }
                    result.textContent = message;
                });
            }
    });
/*
    let result = document.querySelector('#demo'); //show random attendance
        document.body.addEventListener('change', function (e) {
            let target = e.target;
            let message;
            switch (target.id) {
                case 'inlineRadio1':
                    let x = Math.floor((Math.random() *3) + 5);
                    message = x;
                        var inputString = $("#pos").val();
                            // if is !working
                            if(inputString === "Secretary"){
                                let prd = 600 * 5;
                                console.log(prd);
                                $('#grossPay').val(prd);
                            }
                            //working but need args
                            let prd = 600 * x;
                                console.log(prd);
                                document.getElementById("grossPay").innerHTML = prd;
                        console.log(inputString);
                    break;
                case 'inlineRadio2':
                    let y = Math.floor((Math.random() * 5) + 10);
                    message = y;
                    let prd1 = 600 * y;
                                console.log(prd1);
                                document.getElementById("grossPay").innerHTML = prd1;
                    break;
                case 'inlineRadio3':
                    let z = Math.floor((Math.random() * 5) + 26);
                    message = z;
                    let prd2 = 600 * z;
                                console.log(prd2);
                                document.getElementById("grossPay").innerHTML = prd2;
                    break;
            }
            result.textContent = message;
        });
*/
</script>


<script>

    $('.payslip2').on('click', function(){

        
            
    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function(){
        return $(this).text();
    }).get();

    console.log(data);
    $.get("process.php",
    {employee: data[0]
    }, function(response)
    {
    $('input[name=salary]').val(response);
        $('fName').text(data[1]);
        $('lName').text(data[2]);
        $('#pos').text(data[7]);
        $('#pos').val(data[7]);
        $('#empIDs').text(data[0]);
        $('#empID2').val(data[0]);
        $('#showPayslip2').modal('show');
    });

    });
/*  ================== */ 
$('.payslip').on('click', function(){
$tr = $(this).closest('tr');

var data = $tr.children("td").map(function(){
    return $(this).text();
}).get();

console.log(data);
$.get("process.php",
{employee: data[0]
}, function(response)
{
$('input[name=salary]').val(response);
    $('fName').text(data[1]);
    $('lName').text(data[2]);
    $('#pos').text(data[7]);
    $('#pos').val(data[7]);
    $('#empIDs').text(data[0]);
    $('#empID2').val(data[0]);
    $('#showPayslip').modal('show');
});

});
/*  ================== */ 
    $('.payslip').on('click', function(){

$('#showPayslip').modal('show');
    
    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function(){
        return $(this).text();
    }).get();

    console.log(data);
    $('#fName').text(data[1]);
    $('#lName').text(data[2]);



});

</script>	

<!-- ANIMATION ALERT -->
<script>
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