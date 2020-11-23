<!DOCTYPE html>
<html>
    <head>
        <title>CART</title>
        <link rel="stylesheet" type="text/css" href="sample.css">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
<div class="top-nav-bar">
<img src="http://localhost/Home%20decor/homedecor.jpg" class="logo">
<h1 style="position:absolute;top:0%;left:40%;color:black;">YOUR CART!</h1>
<a href="http://localhost/Home%20decor/logout.php" style="position:absolute;top:15%;left:87%;color:black"><i class="fa fa-sign-in"></i>Logout</a>
</div>
<?php
error_reporting(0);
$user=$_GET['user'];

echo "<section class=\"header\">";
    echo "<div class=\"side-menu\" id=\"side-menu\">";
        echo "<ul>";
        echo "<li><a href=\"http://localhost/Home%20decor/Newarraival.php?user=".$user."\">New Arrivals</a></li>";
		echo "<li><a href=\"http://localhost/Home%20decor/Discount.php?user=".$user."\">Discounts</a></li>";
		echo "<li><a href=\"http://localhost/Home%20decor/Lamp.php?user=".$user."\">Lamps</a></li>";
		echo "<li><a href=\"http://localhost/Home%20decor/Bed.php?user=".$user."\">Beds</a></li>";
		echo "<li><a href=\"http://localhost/Home%20decor/Wallpaper.php?user=".$user."\">Wallpapers</a></li>";
		echo "<li><a href=\"http://localhost/Home%20decor/Tables.php?user=".$user."\">Tables</a></li>";
		echo "<li><a href=\"http://localhost/Home%20decor/Antique.php?user=".$user."\">Antique Pieces</a></li>";
        echo "</ul>";
    echo "</div>";
    ?>


<?php  
error_reporting(0);
                    $host="localhost";
                    $dbUsername="root";
                    $dbpassword="";
                    $dbname="homedecor";    
                    $conn= new mysqli($host,$dbUsername,$dbpassword,$dbname);
                    if (mysqli_connect_error()) {
                        die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
                    }
                    $product_id=$_GET['product_id'];
                    $user=$_GET['user'];
                    $query1 = "INSERT INTO `add_to_cart`(`product_id`, `user`) VALUES ('$product_id','$user')";
                    mysqli_query($conn,$query1);
                    $query = "SELECT * FROM items where product_id IN (SELECT product_id FROM add_to_cart WHERE `user`=\"$user\")"; 
                    $result = mysqli_query($conn, $query); 
                    
                    while( $row = mysqli_fetch_array($result)) {
                        echo "<table style=\"display:inline-block;padding-right:25px;padding-bottom:50px;margin-left:125px;text-align:center;padding-top:15px;\">";
                        echo "<tr>";
                        echo "<td>";
                        echo "<img src=\"http://localhost/Home decor/image/".$row['item_image']." \"style=\"width:300px;height:300px;\" ><br>";
                        echo "<h3>".$row['item_name']."</h3>";
                        if($row['discount']>0){
                            $price=$row['item_price']-($row['item_price']/100);
                            echo "<p style=\"color:black;font-size:20px;background-color:lightgrey;\">Price : &#8377 ".$price."</p>";
                        }
                        else{
                            echo "<p style=\"color:black;font-size:20px;background-color:lightgrey;\">Price : &#8377 " .$row['item_price']." .</p>";
                        }
                        echo "<a href=\"http://localhost/Home decor/deleteitem.php?product_id=".$row['product_id']."&user=".$user."\"><button type=\"button\" class=\"btn btn-info btn-lg\" style=\"background-color:#63639b;border-color:#63639b\" >Remove</button></a>";
                        echo "</tr>";
                        echo "</td>";
                        echo "</table>";
                    }
                   echo "<p style=\"text-align:center;font-size:30px;\">Total price: &#8377 ";
                    $query2= "SELECT * FROM items where product_id IN (SELECT product_id FROM add_to_cart)";
                    $result2=mysqli_query($conn, $query); 
                    $sum =0;
                    while($roww = mysqli_fetch_array($result2)){
                        if($roww['discount']>0){
                        $sum=$sum + ($roww['item_price'] - ($roww['item_price']/100));
                        }
                        else{
                            $sum = $sum + $roww['item_price'];
                        }
                }
                echo $sum . "</br>";
                echo "<a href=\"http://localhost/Home decor/PayUMoney_form.php?price=".$sum."&user=".$user."\"><button type=\"button\" class=\"btn btn-info btn-lg\" style=\"background-color:#63639b;border-color:#63639b\" >Proceed to pay</button></a>";
                echo "<br>";
                echo "<a href=\"http://localhost/Home decor/Newarraival.php?user=".$user."\"<p style=\"font-size:20px;color:black;background-color:lightgrey;\">Back</p>";
                echo "</p>";  
                    ?>
