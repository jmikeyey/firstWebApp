<?php 

                        
if(isset($_POST['payslipID'])) {
  $mysqli = new mysqli('localhost', 'root', '', 'payrollsystem') or die (mysqli_error($mysqli)); 

    $employee = $_POST['payslipID'];
    $sql = "SELECT * FROM payslip WHERE employeeID = $employee";
    $result = mysqli_query($mysqli,$sql);
    $row = mysqli_fetch_assoc($result);

    $payslipID = $row['payslipID'];
    echo $payslipID;
}
?>