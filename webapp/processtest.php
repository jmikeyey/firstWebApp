<?php
 session_start();

$id = 0;
$origin =' ';
$destination =' ';
$fee =' ';
$update = false;

$mysqli = new mysqli('localhost', 'root', '', 'testcrud') or die (mysqli_error($mysqli));


if(isset($_POST['insert'])){
    $user =  $_POST['user'];
    $pass =  $_POST['pass'];

    $mysqli -> query("INSERT INTO user(user, pass) values('$user', '$pass')") or
    die ($mysqli -> error);

    
    echo "<script> alert('Record created succesfully');window.location.replace('index.php');</script>";
}


//UPDATE
if(isset($_POST['update'])){

    $id = $_POST['id'];

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $mysqli -> query("UPDATE user SET user= '$user', pass= '$pass' WHERE id= $id ") or die ($mysqli -> error);

    if($mysqli){

        $_SESSION['message'] = "Record updated succesfully";

        $_SESSION['msg_type'] = "success";
        //no need refresh, trial error
        header("location: bootstrapmodal.php");
        //auto refresh
        echo '<meta http-equiv="refresh" content="30">';

    }else{
        $_SESSION['message'] = "Record did not upadate";
        
        $_SESSION['msg_type'] = "danger";
        //no need refresh, trial error
        header("location: bootstrapmodal.php");
        echo '<meta http-equiv="refresh" content="30">';
    }
}
?>