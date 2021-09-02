<?php

if(isset($_POST)){
    $conn=mysqli_connect('localhost','root','','training');
}
if(isset($_POST['firstName']) && 
isset($_POST['lastName']) &&
isset($_POST['email']) &&
isset($_POST['experience'])){
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $email=$_POST['email'];
    $experience=$_POST['experience'];

    $sql="INSERT INTO `application_form`(`firstName`,`lastName`,`email`,`experience`) VALUES ('$firstName','$lastName','$email','$experience')";
    $query=mysqli_query($conn,$sql);
}

?>