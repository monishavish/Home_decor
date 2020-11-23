<?php
	$host="localhost";
    $dbUsername="root";
    $dbpassword="";
    $dbname="homedecor";    
    $conn= new mysqli($host,$dbUsername,$dbpassword,$dbname);
    if (mysqli_connect_error()) {
        die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
    }

    $prod_id=$_GET['product_id'];
    $user=$_GET['user'];
    $sql="DELETE FROM `add_to_cart` WHERE product_id=\"$prod_id\"";
    mysqli_query($conn,$sql);
    header("Location:http://localhost/Home%20decor/cart.php?user=".$user);
    ?>