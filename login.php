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
$password=$_POST['pass'];
$_SESSION['email']=$_POST['name'];
$result = mysqli_query($conn,"SELECT * FROM user WHERE email= '$name' AND password= '$password'");

	$row = mysqli_fetch_array($result);

	if($row['email'] == $name  && $row['password'] == $password && isset($_SESSION['email']))
	{
		header('location:http://localhost/Home decor/Newarraival.php?user=' . $name );
	}
	else
	{
		echo "email/password incorrect";
	}
