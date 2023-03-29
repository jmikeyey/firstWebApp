<?php
 session_start();



$update = false;

$mysqli = new mysqli('localhost', 'root', '', 'payrollsystem') or die (mysqli_error($mysqli));


//ADD
if(isset($_POST['insert'])){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $bday = $_POST['bday'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $position = $_POST['position'];
    



    $mysqli -> query("INSERT INTO profiles(positionID, firstname, lastname, address, birthdate, contact, gender) values($position,'$fname', '$lname', '$address', '$bday', '$contact', '$gender')") 
    or die($mysqli -> error);

    

    $_SESSION['messages'] = "Employee added succesfully";
    /*can be multiple message, then change text*/ 
    $_SESSION['msg_type'] = "sccs";
    //no need refresh, trial error
    header("location: employee.php");
    //auto refresh
    echo '<meta http-equiv="refresh" content="30">';

}
//DELETE DATA
if(isset($_POST['delete'])){
    $id = $_POST['id'];
    if($id == 1){
        $_SESSION['messages'] = "You can't delete an admin";
        $_SESSION['msg_type'] = "dngr";
        header("location: employee.php");
        echo '<meta http-quivev="refresh" content="30">';
    }else{
        $mysqli -> query("DELETE FROM profiles WHERE employeeID = $id") or die($mysqli->error());
             //MILYPLE DELETE, SALARY, DEDUCTION, AND USERS
        $_SESSION['messages'] = "Employee deleted successfully";
        $_SESSION['msg_type'] = "sccs";
        header("location: employee.php");
        echo '<meta http-quivev="refresh" content="30">';
    }

}




//UPDATE
if(isset($_POST['updatePos'])){

    $id = $_POST['id'];
    $posname = $_POST['posname'];
    $posfee = $_POST['posfee'];

    $mysqli -> query("UPDATE `position` SET `positionName` = '$posname', `positionFee` = '$posfee' WHERE positionID = '$id' ") or die ($mysqli -> error);

    if($mysqli){
        $_SESSION['messages'] = "Position updated succesfully";
        /*can be multiple message, then change text*/ 
        $_SESSION['msg_type'] = "sccs";
        //no need refresh, trial error
        header("location: position.php");
        //auto refresh
        echo '<meta http-equiv="refresh" content="30">';

    }else{
        $_SESSION['messages'] = "Position did not upadate";
        /*can be multiple message, then change text*/ 
        $_SESSION['msg_type'] = "dngr";
        //no need refresh, trial error
        header("location: position.php");
        echo '<meta http-equiv="refresh" content="30">';
    }
}

//promote
if(isset($_POST['promote'])){
    $id = $_POST['id'];
    $promote = $_POST['promotes'];

    $mysqli -> query("UPDATE profiles SET positionID = '$promote' WHERE employeeID = '$id' ");

    $_SESSION['messages'] = "Employee promoted succesfully";
    $_SESSION['msg_type'] = "sccs";
    header("location: employee.php");
    echo '<meta http-equiv="refresh" content="30">';
}


/* POSITION PHP QUERRY */

//ADD
if(isset($_POST['insertPos'])){

    $posname = $_POST['posname'];
    $posfee = $_POST['posfee'];

    



    $mysqli -> query("INSERT INTO `position` (`positionID`, `positionName`, `positionFee`) VALUES (NULL, '$posname', '$posfee')") 
    or die($mysqli -> error);

    $_SESSION['messages'] = "Position added succesfully";
    /*can be multiple message, then change text*/ 
    $_SESSION['msg_type'] = "sccs";
    //no need refresh, trial error
    header("location: position.php");
    //auto refresh
    echo '<meta http-equiv="refresh" content="30">';

}
//DELETE DATA // (ADD) DELETE IF POSITION NAME COUNT != 0, CANT DELETE
if(isset($_POST['deletePos'])){
    $id = $_POST['id'];

    $result = $mysqli -> query("SELECT COUNT(positionID) AS poscount FROM profiles") or die($mysqli->error());
    while($row = $result -> fetch_assoc()){
        $poscount = $row['poscount'];
            if($poscount == 0){       
                $mysqli -> query("DELETE FROM position WHERE positionID=$id") or die($mysqli->error());
                $_SESSION['messages'] = "Position deleted successfully";
                $_SESSION['msg_type'] = "sccs";
                header("location: position.php");
                echo '<meta http-quivev="refresh" content="30">';
                //MILYPLE DELETE, SALARY, DEDUCTION, AND USERS
            }elseif($poscount > 0){
                $_SESSION['messages'] = "Position can't be deleted, there are employee(s) that are in this position";
                $_SESSION['msg_type'] = "dngr";
                header("location: position.php");
                echo '<meta http-quivev="refresh" content="30">';
                //MILYPLE DELETE, SALARY, DEDUCTION, AND USERS
            }
    }

/*
    $mysqli -> query("DELETE FROM position WHERE positionID=$id") or die($mysqli->error());
    $_SESSION['messages'] = "Position deleted successfully";
    $_SESSION['msg_type'] = "sccs";
    header("location: position.php");
    echo '<meta http-quivev="refresh" content="30">';
    //MILYPLE DELETE, SALARY, DEDUCTION, AND USERS
*/
}

//UPDATE
if(isset($_POST['update'])){

    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $bdate = $_POST['bdate'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];

    $mysqli -> query("UPDATE `profiles` SET `firstname` = '$fname', `lastname` = '$lname', `address` = '$address', birthdate = '$bdate', contact = '$contact', gender = '$gender'  WHERE employeeID = '$id' ") or die ($mysqli -> error);

    if($mysqli){
        $_SESSION['messages'] = "Record updated succesfully";
        /*can be multiple message, then change text*/ 
        $_SESSION['msg_type'] = "sccs";
        //no need refresh, trial error
        header("location: employee.php");
        //auto refresh
        echo '<meta http-equiv="refresh" content="30">';

    }else{
        $_SESSION['messages'] = "Record did not upadate";
        /*can be multiple message, then change text*/ 
        $_SESSION['msg_type'] = "dngr";
        //no need refresh, trial error
        header("location: employee.php");
        echo '<meta http-equiv="refresh" content="30">';
    }
}

if(isset($_GET['employee']))
{
    $employee = $_GET['employee'];

    //CREATE PAYSLIP ID, CREATE DEDUCTION, CREATE SALARY

    $sql = "SELECT a.employeeID, b.payslipID, (c.earning - (d.cashAdvance + d.sss)) AS totalsalary\n"

    . "FROM profiles a\n"

    . "INNER JOIN payslip b\n"

    . "ON a.employeeID=b.employeeID\n"

    . "INNER JOIN salary c\n"

    . "ON c.payslipID=b.payslipID\n"

    . "INNER JOIN deduction d\n"

    . "ON d.payslipID=b.payslipID\n"

    . "WHERE a.employeeID = $employee;";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();  
    if($row['totalsalary'] > 0){
        echo $row['totalsalary'];
    }elseif($row['totalsalary'] == 0){
        echo '0';
    }


        
    
} 
if(isset($_POST['payNow'])){
    $_SESSION['messages'] = "Salary paid! ";
    /*can be multiple message, then change text*/ 
    $_SESSION['msg_type'] = "sccs";
    //no need refresh, trial error
    header("location: payroll.php");
    //auto refresh
    echo '<meta http-equiv="refresh" content="30">';
}


/* PAYROLL */
if(isset($_POST['genID'])){
    $employeeID = $_POST['employeeID'];
    $date = $_POST['dateGen'];
    $mysqli -> query("INSERT INTO `payslip` (`payslipID`, `employeeID`, `date`) VALUES (NULL, '$employeeID', '$date');") 
        or die($mysqli -> error);

        $_SESSION['messages'] = "ID generated succesfully, you can now get his/her salary!";
        /*can be multiple message, then change text*/ 
        $_SESSION['msg_type'] = "sccs";
        //no need refresh, trial error
        header("location: payroll.php");
        //auto refresh
        echo '<meta http-equiv="refresh" content="30">';

}

if(isset($_POST['uploadData'])){

    $payslipID = $_POST['payslipID']; //how to get

    // DEDUCTION
    $cashAd = $_POST['cashAd'];
    $sss = $_POST['sss'];
    $mysqli -> query("INSERT INTO `deduction` (`payslipID`, `cashAdvance`, `sss`) VALUES ($payslipID, '$cashAd', '$sss');") 
    or die($mysqli -> error);

    //TOTAL SALARY
    $earn = $_POST['earning'];
    $mysqli -> query("INSERT INTO `salary` (`earnID`, `payslipID`, `earning`) VALUES (NULL, '$payslipID', '$earn');") 
    or die($mysqli -> error);

    $_SESSION['messages'] = "Salary computations done";
    /*can be multiple message, then change text*/ 
    $_SESSION['msg_type'] = "sccs";
    //no need refresh, trial error
    header("location: payroll.php");
    //auto refresh
    echo '<meta http-equiv="refresh" content="30">';
}
if(isset($_POST['pay'])){
    $employeeID = ['employeeID'];
    $result = $mysqli -> query("SELECT * FROM payslip WHERE employeeID = $employeeID");

}


//MANAGEUSER

//DELETE DATA
if(isset($_POST['deleteMng'])){
    $id = $_POST['id'];
    $result = $mysqli -> query("SELECT * FROM users WHERE userID = $id") or die($mysqli->error());
    //MILYPLE DELETE, SALARY, DEDUCTION, AND USERS
    
    while($row = $result->fetch_assoc()){
        if($row["userType"] == "ADMIN"){
            $_SESSION['messages'] = "You can't delete an ADMIN account";
            $_SESSION['msg_type'] = "dngr";
            header("location: manage.php");
            echo '<meta http-quivev="refresh" content="30">';
        }elseif($row["userType"] != "ADMIN"){
            $mysqli -> query("DELETE FROM users WHERE userID = $id") or die($mysqli -> error());

            $_SESSION['messages'] = "User deleted successfully";
            $_SESSION['msg_type'] = "sccs";
            header("location: manage.php");
            echo '<meta http-quivev="refresh" content="30">';
        }
    }


}

//UPDATE
if(isset($_POST['updateMng'])){

    $id = $_POST['id'];
    $employeeID = $_POST['employeeID'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $usertype = $_POST['usertype'];

    $mysqli -> query(" UPDATE `users` SET `userName` = '$user', `userPass` = '$pass', `userType` = '$usertype'   WHERE `userID` = $id; ") or die ($mysqli -> error);

    if($mysqli){
        $_SESSION['messages'] = "User updated succesfully";
        /*can be multiple message, then change text*/ 
        $_SESSION['msg_type'] = "sccs";
        //no need refresh, trial error
        header("location: manage.php");
        //auto refresh
        echo '<meta http-equiv="refresh" content="30">';

    }else{
        $_SESSION['messages'] = "User did not upadate";
        /*can be multiple message, then change text*/ 
        $_SESSION['msg_type'] = "dngr";
        //no need refresh, trial error
        header("location: manage.php");
        echo '<meta http-equiv="refresh" content="30">';
    }
}

//ACCOUNT INSERT
if(isset($_POST['insertAcc'])){
    $empID = $_POST['id'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $type = $_POST['usertype'];
    
    $mysqli -> query("INSERT INTO users(employeeID, userName, userPass, userType) VALUES('$empID','$user','$pass','$type'); ");
    $_SESSION['messages'] = "Account created succesfully";
    /*can be multiple message, then change text*/ 
    $_SESSION['msg_type'] = "sccs";
    //no need refresh, trial error
    header("location: employee.php");
    //auto refresh
    echo '<meta http-equiv="refresh" content="30">';
}


//PAYSLIP ID
if(isset($_POST['submit2'])){

    $grossPay = $_POST['grossPay']; //earning
    $cashAdv = $_POST['cashAd']; // deduc
    $sssP = $_POST['penshion']; //dedudc


    $empyID = $_POST['empIDn'];
    $dateID = $_POST['curDate']; //payslip ID date
    $lastDate = $_POST['lastDate'];
    $mysqli -> query("INSERT INTO `payslip`(`employeeID`, `date`,`endDate`) VALUES ('$empyID', '$dateID', '$lastDate'); ") or die($mysqli -> error);   

    //$result2 = $mysqli -> query("SELECT payslipID FROM payslip WHERE `employeeID` = $empyID;");
    $result2 = $mysqli -> query("SELECT MAX(payslipID) AS totalPay FROM payslip WHERE `employeeID` = $empyID;");
    
    while($row = $result2->fetch_assoc()){
        $payID = $row['totalPay'];
    
    $mysqli -> query("INSERT INTO deduction(payslipID, cashAdvance, sss) VALUES('$payID','$cashAdv','$sssP'); ") or die ($mysqli -> error);
    $mysqli -> query("INSERT INTO salary(payslipID, earning) VALUES('$payID', '$grossPay'); ") or die ($mysqli -> error);
    }
    $_SESSION['messages'] = "Data is submitted successfully";
    /*can be multiple message, then change text*/ 
    $_SESSION['msg_type'] = "sccs";
    //no need refresh, trial error
    header("location: paymasterPAYROLL.php");
    //auto refresh
    echo '<meta http-equiv="refresh" content="30">';
}

if(isset($_POST['payslipp'])) {
$empID = $_POST['payslipp'];
$sql = "SELECT MAX(a.payslipID) AS payslip, b.earning, c.cashAdvance, c.sss
        FROM payslip a
        INNER JOIN salary b
        ON b.payslipID=a.payslipID
        INNER JOIN deduction c
        ON c.payslipID=a.payslipID
        WHERE a.employeeID=$empID";
$row = mysqli_fetch_assoc(mysqli_query($mysqli, $sql));

$output = array('payID'=>$row['payslip'], 'grosspay'=>$row['earning'],'deduction'=>$row['cashAdvance'],'sss'=>$row['sss']);
echo json_encode($output);
}

?>