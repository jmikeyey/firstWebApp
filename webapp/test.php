<?php  
 $connect = mysqli_connect("localhost", "root", "", "payrollsystem");  
 $query ="SELECT * FROM profiles";
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
        <!-- FONT AWESOME -->
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> 
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- BOOTSTRAP -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

            
           <title>Webslesson Tutorial | Datatables Jquery Plugin with Php MySql and Bootstrap</title>  
        <!-- JQUERY LIB -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <!-- JS LIB. DATA TABLE -->
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>  
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script> 
        <!-- CSS LIB. DATA TABLE -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" />  
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />    
          <!-- mao ni nakaguba pakyo -->

      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
                <h3 align="center">Datatables Jquery Plugin with Php MySql and Bootstrap</h3>  
                <br />  
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
                                            <td class="">
                                                <?php 
                                                    if($row['positionID'] == 1){
                                                        echo 'Supervisor';
                                                    } elseif($row['positionID'] == 2){
                                                        echo 'Worker';
                                                    }  elseif($row['positionID'] == 3){
                                                        echo 'Secretary';
                                                    } 
                                                ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary editbtn" style="font-size:11px;">EDIT</button>
                                                <button type="button" class="btn btn-danger deletebtn" style="font-size:11px;">DELETE</button>
                                                <button type="button" class="btn btn-primary promotebtn" style="font-size:11px;">PROMOTE</button>
                                            </td>
                                            
                                        </tr>
                                    <?php endwhile; ?>
                        </table>
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#data').DataTable();  
 });  
 </script>  
 