<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Document</title>
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
   
  </style>
</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<body>
  <?php include 'processtest.php' ?>

  <h1>welcome testing</h1>
  <a href="#" id="button">ADD</a><br><br>






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

<?php
  $mysqli = new mysqli('localhost', 'root', '', 'testcrud') or die (mysqli_error($mysqli)); 
  $result = $mysqli -> query("SELECT * FROM user");
?>      

    <div class="row">
        <table class="table">
            <thead>
                <th>user</th>
                <th>pass</th>
                <th colspan="1">Operations</th>
            </thead>
                <?php
                    while($row = $result-> fetch_assoc()):?>
                        <tr>
                            <td class="userClass"><?php echo $row['user']; ?></td>
                            <td class="passClass"><?php echo $row['pass']; ?></td>
                            <td>
                              <button type="button" id="buttons">EDIT</button>
                            </td>
                            
                        </tr>
                    <?php endwhile; ?>
        </table>
    </div>


<!-- ===== STARTING MODAL UPDATE===== -->
  <div class="modal-bgs">
    <div class="modal-contents">
      <div class="closes">
        +
      </div>
      <!-- CREATE ANOTHER DIV UG GUSTO KA MAG MARGIN: -->
      <form action="processtest.php" method="GET">
        <input type="hidden" id="id" name="hidden" placeholder="origin" value="<?php echo $id ?>">
        <label >USER</label><br>
        <input type="text" id="users" name="user" placeholder="Username"><br>
        <label >PASS</label><br>
        <input type="text" id="passs" name="pass" placeholder="Password">
        <input type="submit" value="Upload" name="insert">
      </form>
    </div>
  </div>
<!-- ===== END MODAL ===== -->

  <!-- ===== JS MODAL EDIT/UPDATE===== -->
    <script>
      src="jquery-3.6.0.min.js">
      document.getElementById('buttons').addEventListener("click",
      function(){
        document.querySelector('.modal-bgs').style.display = "flex";
          console.log($('#users'));
          var user= $('#users').text();
          var pass= $('#passs').text(); 
          $('#users').text(user);
          $('#passs').text(pass);

      });

      /* CLOSE BUTTON MODAL*/
      document.querySelector('.closes').addEventListener("click",
      function() {
        document.querySelector('.modal-bgs').style.display = "none";
      });
    
    </script>
  <!-- ===== JS END MODAL ===== -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>