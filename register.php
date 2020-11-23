<?php

    $host="localhost";
    $dbUsername="root";
    $dbpassword="";
    $dbname="homedecor";    
    $conn= new mysqli($host,$dbUsername,$dbpassword,$dbname);
    if (mysqli_connect_error()) {
        die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
    }


$name=$_POST['name'];
$email=$_POST['email'];
$phno=$_POST['phno'];
$address=$_POST['address'];
$password=$_POST['pass'];
$user=mysqli_query($conn,"SELECT email FROM user WHERE email='".$email."'");
$result = implode("",mysqli_fetch_array($user));
if(strcmp($result,$email)==0){
    echo "<script>window.alert('User already exists!!!');</script>";
}
else{
$sql= "INSERT INTO `user`(`name`, `email`, `ph`, `address`, `password`) VALUES ('$name','$email','$phno','$address','$password')";
mysqli_query($conn, $sql); 
}
header("Location:http://localhost/Home%20decor/index.html");
?>