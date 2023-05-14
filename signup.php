<?php
if($_SERVER['REQUEST_METHOD']=='POST'){ 

$email = $_POST['email'];
$password =$_POST['password'];
$age = $_POST['age'];
$address = $_POST['address'];
$family_name=$_POST['family_name'];
$first_name=$_POST['first_name'];

require_once('db_config.php');

$sql = "INSERT INTO users (family_name,first_name,email, password, age, address) VALUES ('$family_name','$first_name','$email', '$password', '$age', '$address')";
if(mysqli_query($con, $sql)){
   
    echo json_encode(array('status' => 'success'));
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Failed to create
    user'));
}
mysqli_close($con);
}
?>