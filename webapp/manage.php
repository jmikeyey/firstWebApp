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
        .danger-box{
            background-color: #ffe8d9;
            height:170px;
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
				<a href="payroll.php"><i class='fa fa-chart-line'></i> Payroll</a>
                <a href="manage.php" class="active" style="color:white"><i class="fa fa-users"></i> Manage Users</a>
                <a href="users.php"><i class='fa fa-gear'></i> Account Settings</a>
			</div>
<!-- NAVBARS -->			
	<div class="containers">
				<div class="box">
                    <h1>Manage Users</h1>
				</div>
                <?php
                    $mysqli = new mysqli('localhost', 'root', '', 'payrollsystem') or die (mysqli_error($mysqli)); 
                    $result = $mysqli -> query("SELECT * FROM users");
                ?>      
        <div class="box2" style="box-shadow: 0px 3px 4px 1px #d6d6d6;">

            <div class="row" style="margin-left: 10px; width:1155px; font-size:12px;">
                <table class="table">
                    <thead style="background-color: black;color:white; ">
                        <th >employeeID</th>
                        <th style="display:none;">userID</th>
                        <th >Username</th>
                        <th >Password</th>
                        <th >User Type</th>
                        <th colspan="3">Operations</th>
                    </thead>
                    <?php
                        while($row = $result-> fetch_assoc()):
                    ?> 
                        <tr>
                            <td><?php echo $row['employeeID']; ?></td>
                            <td style="display:none;"><?php echo $row['userID']; ?></td>
                            <td class="userClass"><?php echo $row['userName']; ?></td>
                            <td class="passClass"><?php echo $row['userPass']; ?></td>
                            <td class="passClass"><?php echo $row['userType']; ?></td>
                            <td>
                                <button type="button" class="btn btn-primary editbtnPos" style="font-size:11px;">EDIT</button>
                                <button type="button" class="btn btn-danger deletebtnPos" style="font-size:11px;">DELETE</button>
                            </td>
                                
                            </tr>
                        <?php endwhile; ?>
                </table>
            </div>

        </div>
	</div>
<!-- end container div -->

<!-- ===== (END)ADMIN WEB ===== -->


<!-- ===== STARTING MODAL DELETE===== -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="height: 390px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="margin-left:50px;"><i class="fa fa-trash" aria-hidden="true" style="color:red"></i>  You are about to delete a user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form action="process.php" method="POST">
                    <input id="id" type="hidden" name="id" >
                    <div class="modal-body" style="text-align: justify;">
                        <div class="danger-box">
                            <i class="fa fa-exclamation-triangle" style="position:absolute;color:red;left: 30px;font-size: 18px;top: 40px;"></i><h5 style="margin-left: 50px;padding-top: 20px">Warning</h5><br>
                            <p style="margin-left: 50px;color:#d36d55;margin-bottom:10px;padding-right: 25px;">This user will be permanently delete and you won't be able to see this again</p>
                        </div>
                        <div class="text-center" style="margin-top: 10px;">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="padding: 10px 30px 10px 30px">Cancel</button>
                            <button type="submit" name="deleteMng" class="btn btn-danger" id="delete" style="padding: 10px 30px 10px 30px">Confirm</button>
                        </div>
                    </div>
                </form>
           
            </div>
        </div>
    </div>
<!-- ===== END MODAL ===== -->



<!-- Modal EDIT-->  
    <div class="modal fade" id="editModalPos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="height: 450px;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                <form action="process.php" method="POST">
                    <div class="modal-body">
                        
                        <input type="hidden" id="id1" name="id" value="<?php echo $userID ?>">

                        <div class="form-group">
                            <label style="float: left;margin-bottom:5px">Employee ID</label>
                            <input type="text" name="employeeID" class="form-control" placeholder="Name of position" id="employID" autocomplete="off" readonly>
                        </div>
                        <div class="form-group">
                            <label style="float: left;margin-bottom:5px">Username</label>
                            <input type="text" name="user" class="form-control" placeholder="Name of position" id="user" autocomplete="off" REQUIRED>
                        </div>
                        <div class="form-group">
                            <label style="float: left;margin-bottom: 5px;">Password</label>
                            <input type="text" name="pass" class="form-control" placeholder="Fee of position" id="pass" autocomplete="off"  REQUIRED>
                        </div>
                        <div class="form-group">
                            <label style="float: left;margin-bottom: 5px;">User Type</label>
                            <select class="form-select" aria-label="Default select example" name="usertype">
                                    <option value="ADMIN">ADMIN</option>
                                    <option value="INCHARGE">INCHARGE</option>
                                    <option value="EMPLOYEE">EMPLOYEE</option>
                                    <option value="GUEST">GUEST</option>
                            </select>
                        </div>
                    </div>   
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="updateMng" class="btn btn-primary" id="updates">Update Data</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
<!-- END Modal -->

<!-- Modal INSERT-->  
<div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Position</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="process.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="<?php echo $positionID ?>">
                    <div class="form-group">
                        <label style="float: left;margin-bottom:5px">Position Name</label>
                        <input type="text" name="posname" class="form-control" placeholder="Name of position" id="posname" autocomplete="off" REQUIRED>
                    </div>
                    <div class="form-group">
                        <label style="float: left;margin-bottom: 5px;">Position Fee</label>
                        <input type="text" name="posfee" class="form-control" placeholder="Fee of position" id="posfee" autocomplete="off"  REQUIRED>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="insertPos" class="btn btn-primary" id="updates">Insert Data</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Modal INSERT -->






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('.deletebtnPos').on('click', function(){

            $('#deleteModal').modal('show');
                
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);
                $('#id').val(data[1]);

        });
      });


        $('.editbtnPos').on('click', function(){

            $('#editModalPos').modal('show');
                
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);
                $('#employID').val(data[0]);
                $('#id1').val(data[1]);
                $('#user').val(data[2]);
                $('#pass').val(data[3]);


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