<?php
include('conn.php');
if(isset($_POST['startup'])){
    $startup=$_POST['startup'];
    $amount=$_POST['amt'];
    $user_email = $_SESSION['user_email'];
    $amount=$_POST['amt'];
     $sql = mysqli_query($conn,"INSERT INTO `user_investment`(`user_email`, `startup`, `amount`) VALUES ('$user_email','$startup','$amount')");
     if($sql){
        return true;
     }
}
?>