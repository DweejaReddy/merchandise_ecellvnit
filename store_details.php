<?php
session_start();
if(isset($_POST['submit_form']))
{
//  $servername = "localhost";
//  $username = "ias2020";
//  $password = "ecell123";
//  $dbname = "eco21";
 

// $conn = new mysqli($servername, $username, $password, $dbname);
$con = mysqli_connect("localhost","root","","merch");
if ($con->connect_error){
    die("Connection failed: " . $con->connect_error);
}	 

$name=mysqli_real_escape_string($con, $_POST['name']);
$email=mysqli_real_escape_string($con, $_POST['email']);
$phone=mysqli_real_escape_string($con, $_POST['phone']);
$address = mysqli_real_escape_string($con, $_POST['address']);
$pin = mysqli_real_escape_string($con, $_POST['pin']);
$size = mysqli_real_escape_string($con, $_POST['size']);
$type = mysqli_real_escape_string($con, $_POST['type']);
$printName = mysqli_real_escape_string($con, $_POST['printName']);
$_SESSION['name'] = $name;

$_SESSION['email'] = $email;
  $sql = "INSERT INTO merchentries (name, email, phone, address, pin, size, type, printName) VALUES ('$name', '$email', '$phone','$address', '$pin', '$size', '$type', '$printName')";
   if ($con->query($sql) === TRUE) {
    if($printName === "yes"){
        header('LOCATION:redirect.php');
        
    }
    else{
        header('LOCATION:https://pmny.in/JIrTKaD591vw');
    }
    
  }
  else {
    echo "Error: " . $sql . "<br>" . $con->error;
  } 
}
?>