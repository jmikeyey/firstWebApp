<?php include 'processtest.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <title>Document</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  

      </head>  
<style>
    *{
      margin: 0;
      padding: 0;
    }

  /* ===== STARTING MODAL CSS ===== */ 
      .modal-bg{
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        position: absolute;
        top: 0;
        /* 3 IMPORTANT */ 
        display: flex;
        justify-content: center;
        align-items: center;
        display: none;
      }
      .modal-content{
        width: 500px;
        height: 600px;
        background-color: white;
        opacity: 1;
        border-radius: 4px;
        text-align: center;
        padding: 20px;
        position: relative;
      }
      .close{
        position: absolute;
        top: 0;
        right: 14px;
        font-size: 42px;
        transform: rotate(45deg);
        cursor: pointer;
      }
      .close:hover{
        color: red;
        transition: 0.3s
      }
  /* ===== ENDING MODAL CSS ===== */ 

    /* ===== STARTING MODAL CSS ===== */ 
      .modal-bgs{
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        position: absolute;
        top: 0;
        /* 3 IMPORTANT */ 
        display: flex;
        justify-content: center;
        align-items: center;
        display: none;
      }
      .modal-contents{
        width: 500px;
        height: 600px;
        background-color: white;
        opacity: 1;
        border-radius: 4px;
        text-align: center;
        padding: 20px;
        position: relative;
      }
      .closes{
        position: absolute;
        top: 0;
        right: 14px;
        font-size: 42px;
        transform: rotate(45deg);
        cursor: pointer;
      }
      .closes:hover{
        color: red;
        transition: 0.3s
      }
  /* ===== ENDING MODAL CSS ===== */ 
    

  /* ==== ALERT MSG ==== */
      .danger , .success{
              position: absolute;
              top: 70px;
              width: 200px;
              left: 370px;
              padding-top: 3px;
              padding-bottom: 3px;
              font-size: 16px;
          }
          .danger{
              color: black;
              background: white;
              transition-duration: 2s;
              box-shadow: 4px 2px 6px 4px #e5e5e5;
              border-radius: 9px;
              border-left: 8px solid #ff4b4b;
              padding-left: 20px;
              font-family: 'Open Sans', sans-serif;
          }
          .success{
              color: black;
              background: white;
              transition-duration: 2s;
              box-shadow: 4px 2px 6px 4px #e5e5e5;
              border-radius: 9px;
              border-left: 8px solid #28fa28;
              padding-left: 20px;
              font-family: 'Open Sans', sans-serif;
              
          }
  /* ==== END ALERT MSG ==== */

</style>
</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<body>




  <h1>welcome testing</h1>
  <a href="#" id="button">ADD</a><br><br>


        <!-- ALERT MESSAGE -->
        <div class="animate" id="hidanim">
            <?php
            if(isset($_SESSION['message'])):?>
                <div class="alert-<?=$_SESSION['msg_type']?>">
                    <?php
                        if($_SESSION['msg_type'] == 'danger'): ?>
                            <div class="danger">
                                <?php
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']); 
                                ?>
                            </div>
                        <?php elseif($_SESSION['msg_type'] == 'success'): ?>
                            <div class="success">
                                <?php
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']); 
                                ?>
                            </div>
                    <?php endif ?>
                    
                </div>
            <?php endif ?>
        </div>
    <!-- (END)ALERT MESSAGE -->




<!-- ===== STARTING MODAL INSERT===== -->
  <div class="modal-bg">
    <div class="modal-content">
      <div class="close">
        +
      </div>
      <!-- CREATE ANOTHER DIV UG GUSTO KA MAG MARGIN: -->
      <form action="processtest.php" method="POST">
        <input type="hidden" name="hidden" placeholder="origin" value="<?php echo $id ?>">
        <label for="fname">USER</label><br>
        <input type="text" id="fname" name="user" placeholder="Username"><br>
        <label for="lname">PASS</label><br>
        <input type="text" id="lname" name="pass" placeholder="Lastname">
        <input type="submit" value="Upload" name="insert">
      </form>
    </div>
  </div>
<!-- ===== END MODAL ===== -->

<!-- ===== JS MODAL INSERT ===== -->
    <script>
      document.getElementById('button').addEventListener("click",
      function(){
        document.querySelector('.modal-bg').style.display = "flex";
      });

      /* CLOSE BUTTON MODAL*/
      document.querySelector('.close').addEventListener("click",
      function() {
        document.querySelector('.modal-bg').style.display = "none";
      });
    
    </script>
<!-- ===== JS END MODAL ===== -->


  <input type="text" name="num1" class="form-control"  id="num1" style="width:300px;" REQUIRED>
  <input type="text" name="num2" class="form-control"  id="num2" style="width:300px;" REQUIRED>
  <input type="text" name="num2" class="form-control"  id="result" style="width:300px;" readonly>
  <input type="submit" name="add" onclick="add_number()">

  <script>
    function add_number(){
      var num1 = parseInt(document.getElementById("num1").value);
      var num2 = parseInt(document.getElementById("num2").value);
      var result = num1 + num2;
      document.getElementById("result").value = result;
    }
  </script>

  
<?php
  $mysqli = new mysqli('localhost', 'root', '', 'payrollsystem') or die (mysqli_error($mysqli)); 
  $result = $mysqli -> query("SELECT * FROM profiles");
?>      

    <div class="row" style="margin-left: 500px; width:800px;">
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
                                            <td style="display:none;"><?php echo $row['userID']; ?></td>
                                            <td class="userClass"><?php echo $row['firstname']; ?></td>
                                            <td class="passClass"><?php echo $row['lastname']; ?></td>
                                            <td class=""><?php echo $row['address']; ?></td>
                                            <td class=""><?php echo $row['birthdate']; ?></td>
                                            <td class=""><?php echo $row['contact']; ?></td>
                                            <td class=""><?php echo $row['gender']; ?></td>
                                            <td class="">                            <?php 
                            if($row['positionID'] == 1){
                                echo 'Supervisor';
                            } elseif($row['positionID'] == 2){
                                echo 'Worker';
                            }  elseif($row['positionID'] == 3){
                                echo 'Secretary';
                            } 
                            
                            ?></td>
                                            <td>
                                            <button type="button" class="btn btn-primary editbtn">EDIT</button>
                                            </td>
                                            
                                        </tr>
                                    <?php endwhile; ?>
                        </table>
                        </div>
    </div>
    <script>  
 $(document).ready(function(){  
      $('#data').DataTables();  
 });  
 </script>  
<!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
    Launch demo modal
    </button>

<!-- Modal -->  
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="processtest.php" method="POST">
                <div class="modal-body">
                            <input type="hidden" id="id" name="id" value="<?php echo $id ?>">
                            <div class="form-group">
                                <label style="float: left;margin-bottom:5px">Username</label>
                                <input type="text" name="user" class="form-control" placeholder="Username" id="user" REQUIRED>
                            </div>
                            <div class="form-group">
                                <label style="float: left;margin-bottom: 5px;">Password</label>
                                <input type="text" name="pass" class="form-control" placeholder="Password" id="pass" REQUIRED>
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
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Promote Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form action="process.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id" value="<?php echo $employeeID ?>">
                        <h1>DO YOU WANT TO PROMOTE WAWA?</h1>
                        <div class="form-group">
                                    <label style="float: left;margin-bottom:5px">Firstname</label>
                                    <input type="text" name="fname" class="form-control" placeholder="Username" id="fname" REQUIRED>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="insert" class="btn btn-success" id="updates">Promote</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- END Modal PROMOTE -->


<script>
      $(document).ready(function() {
        $('.editbtn').on('click', function(){

            $('#editModal').modal('show');
                
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);

                $('#id').val(data[0]);
                $('#user').val(data[1]);
                $('#pass').val(data[2]);

        });
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
