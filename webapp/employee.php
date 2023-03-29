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
				<a href="employee.php"  class="active" style="color:white"><i class="fa fa-users"></i> Employees</a>
				<a href="position.php"><i class="fa fa-briefcase"></i> Positions</a>
				<a href="payroll.php"><i class='fa fa-line-chart'></i> Payroll</a>
                <!-- ADD MANAGE USERS -->
                <a href="manage.php"><i class="fa fa-users"></i> Manage Users</a>
                <a href="users.php"><i class='fa fa-gear'></i> Account Settings</a>
			</div>
<!-- NAVBARS -->			
	<div class="containers">
				<div class="box">
                    <h1>Employees</h1>
				</div>

                <?php
                    $mysqli = new mysqli('localhost', 'root', '', 'payrollsystem') or die (mysqli_error($mysqli)); 
                    $result = $mysqli -> query("SELECT * FROM profiles");
                ?>      
        <div class="box2">
            <button type="button" id="butt" class="btn btn-primary btn1" data-bs-toggle="modal" data-bs-target="#insertModal">Add Employee</button>
            <div class="row" style="margin-left: 10px; width:1155px; font-size:12px;">
                <div class="table-responsive">  
                        <table id="data" class="table">  
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
                                            <td class="">
                                                <?php 
                                                    if($row['positionID'] == 1){
                                                        echo 'Supervisor';
                                                    } elseif($row['positionID'] == 2){
                                                        echo 'Worker';
                                                    }  elseif($row['positionID'] == 3){
                                                        echo 'Secretary';
                                                    }   elseif($row['positionID'] == 6){
                                                        echo 'Welder';
                                                    }  
                                                ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary editbtn" style="font-size:11px;">EDIT</button>
                                                <button type="button" class="btn btn-danger deletebtn" style="font-size:11px;">DELETE</button>
                                                <button type="button" class="btn btn-primary promotebtn" style="font-size:11px;">PROMOTE</button>
                                                    <!-- IF EMPLOYID == COUNT(1) == NOT SHOW BUTTON // IF EMPLOYID == COUNT(0) SHOW BUTTON -->
                                                <!--  -->
                                                <?php 
                                                    $empID = $row['employeeID'];
                                                    $result1 = $mysqli -> query("SELECT COUNT(employeeID) AS count FROM users WHERE employeeID = $empID");
                                                    while($row = $result1 -> fetch_assoc()){
                                                        if($row['count'] > 0){
                                                        
                                                        }elseif($row['count'] == 0){
                                                            echo '<button type="button" class="btn btn-primary createbtn" style="font-size:11px;">CREATE ACCOUNT</button>';
                                                        }
                                                    }
                                                ?>


                                            </td>
                                            
                                        </tr>
                                    <?php endwhile; ?>
                            </table>
                </div>  
            </div>
        </div>
	</div>
<!-- end container div -->

<!-- ===== (END)ADMIN WEB ===== -->


<!-- ===== STARTING MODAL DELETE===== -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="height: 300px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="margin-left:50px;"><i class="fa fa-trash" aria-hidden="true" style="color:red"></i>  You are about to delete an employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form action="process.php" method="post">
                    <input id="id" type="hidden" name="id" >
                    <div class="modal-body">
                        <div class="danger-box">
                            <i class="fa fa-exclamation-triangle" style="position:absolute;color:red;left: 30px;font-size: 18px;top: 40px;"></i><h5 style="margin-left: 50px;padding-top: 20px">Warning</h5><br>
                            <p style="margin-left: 50px;color:#d36d55;margin-bottom:10px;">All the information of the employee will be permanently removed and you won't be able to see them again.</p>
                        </div>
                        <div class="text-center" style="margin-top: 10px;">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="padding: 10px 30px 10px 30px">Cancel</button>
                            <button type="submit" name="delete" class="btn btn-danger" id="delete" style="padding: 10px 30px 10px 30px">Confirm</button>
                        </div>
                    </div>
                </form>
           
            </div>
        </div>
    </div>
<!-- ===== END MODAL ===== -->


<!-- Modal EDIT-->  
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form action="process.php" method="POST">
                    <div class="modal-body">
                        
                                <div class="form-group">
                                    <input type="hidden" name="id" class="form-control" placeholder="Firstname" id="id1" REQUIRED>
                                </div>
                                <div class="form-group">
                                    <label style="float: left;margin-bottom:5px">Profile Picture </label>
                                    <input type="file" name="profilepic" accept="image/*" REQUIRED />
                                </div>
                                <div class="form-group">
                                    <label style="float: left;margin-bottom:5px">Firstname</label>
                                    <input type="text" name="fname" class="form-control" placeholder="Firstname" id="fname" REQUIRED>
                                </div>
                                <div class="form-group">
                                    <label style="float: left;margin-bottom: 5px;">Lastname</label>
                                    <input type="text" name="lname" class="form-control" placeholder="Lastname" id="lname" REQUIRED>
                                </div>  
                                <div class="form-group">
                                    <label style="float: left;margin-bottom: 5px;">Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Address" id="address" REQUIRED>
                                </div>
                                <div class="form-group">
                                    <label style="float: left;margin-bottom: 5px;">Birthdate</label>
                                    <input type="date" name="bdate" class="form-control" placeholder="Birthdate" id="bdate" REQUIRED>
                                </div>
                                <div class="form-group">
                                    <label style="float: left;margin-bottom: 5px;">Contact</label>
                                    <input type="text" name="contact" class="form-control" placeholder="Contact" id="contact" REQUIRED>
                                </div>
                                <div class="form-group">
                                    <label style="float: left;margin-bottom: 5px;" for="gender">Gender</label>
                                    <select class="form-select" aria-label="Default select example" name="gender" id="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="update" class="btn btn-primary" id="updates">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- END Modal -->


<!-- Modal PROMOTE-->  
<div class="modal fade" id="promoteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="height: 300px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Promote Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form action="process.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" id="idP" name="id" value="<?php echo $employeeID ?>">
                        <h5>DO YOU WANT TO PROMOTE <br><span id="fname1"></span></h5>
                        <div class="form-group">
                            <?php 
                                $mysqli = new mysqli('localhost', 'root', '', 'payrollsystem') or die (mysqli_error($mysqli)); 
                                $result = $mysqli -> query("SELECT positionID, positionName FROM position");
                            ?>
                            <select class="form-select" aria-label="Default select example" name="promotes">
                                <?php
                                    while($row = $result-> fetch_assoc()):
                                ?> 
                                    <option value="<?php echo $row['positionID']; ?>"><?php echo $row['positionName']; ?></option>
                                <?php endwhile ?>
                            </select>
                        </div>
            <div class="modal-footer">
                <button type="button1" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="promote" class="btn btn-success" id="updates">Promote</button>
            </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END Modal PROMOTE -->

<!-- Modal INSERT-->  
<div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="process.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="<?php echo $employeeID ?>">
                    <div class="form-group">
                        <label style="float: left;margin-bottom:5px">Profile Picture</label>
                        <input type="file" name="profilepic" accept="image/*" REQUIRED />
                    </div>
                    <div class="form-group">
                        <label style="float: left;margin-bottom:5px">Firstname</label>
                        <input type="text" name="fname" class="form-control" placeholder="Firstname" id="fname" autocomplete="off" REQUIRED>
                    </div>
                    <div class="form-group">
                        <label style="float: left;margin-bottom: 5px;">Lastname</label>
                        <input type="text" name="lname" class="form-control" placeholder="Lastname" id="lname" autocomplete="off"  REQUIRED>
                    </div>
                    <div class="form-group">
                        <label style="float: left;margin-bottom: 5px;">Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Address" id="address" autocomplete="off"REQUIRED>
                    </div>
                    <div class="form-group">
                        <label style="float: left;margin-bottom: 5px;">Birthdate</label>
                        <input type="date" name="bday" class="form-control" placeholder="Birthdate" id="bday" autocomplete="off" REQUIRED>
                    </div>
                    <div class="form-group">
                        <label style="float: left;margin-bottom: 5px;">Contact Info</label>
                        <input type="text" name="contact" class="form-control" placeholder="Contact number" id="contact" autocomplete="off" REQUIRED>
                    </div>
                    <div class="form-group">
                        <label style="float: left;margin-bottom: 5px;" for="gender">Gender</label>
                        <select class="form-select" aria-label="Default select example" name="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    
                        <?php 
                            $mysqli = new mysqli('localhost', 'root', '', 'payrollsystem') or die (mysqli_error($mysqli)); 
                            $result = $mysqli -> query("SELECT positionID, positionName FROM position");
                        ?>
                    <div class="form-group">
                        <label style="float: left;margin-bottom: 5px;" for="position">Position</label>
                        <select class="form-select" aria-label="Default select example" name="position">
                            <?php
                                while($row = $result-> fetch_assoc()):
                            ?> 
                                <option value="<?php echo $row['positionID']; ?>"><?php echo $row['positionName']; ?></option>
                            <?php endwhile ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="insert" class="btn btn-primary" id="updates">Insert Data</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Modal INSERT -->

<!-- Modal INSERT ACCOUNT -->  
<div class="modal fade" id="createAccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="process.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id" class="form-control" placeholder="Username" id="empID" autocomplete="off" style="text-transform: lowercase;" readonly>
                    <div class="form-group">
                            <label style="float: left;margin-bottom:5px">Username</label>
                            <input type="text" name="user" class="form-control" placeholder="Username" id="user1" autocomplete="off" onkeyup="this.value = this.value.toUpperCase();" readonly>
                    </div>
                    <div class="form-group">
                            <label style="float: left;margin-bottom:5px">Password</label>
                            <input type="text" name="pass" class="form-control" placeholder="Password" id="pass1" autocomplete="off" onkeyup="this.value = this.value.toUpperCase();" readonly>
                    </div>
                    <div class="form-group">
                        <label for="gender">SELECT USER TYPE</label>
                        <select class="form-select" aria-label="Default select example" name="usertype">
                            <option value="ADMIN">ADMIN</option>
                            <option value="INCHARGE">INCHARGE</option>
                            <option value="EMPLOYEE">EMPLOYEE</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="insertAcc" class="btn btn-primary" id="updates">Create Account</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Modal INSERT -->

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
 