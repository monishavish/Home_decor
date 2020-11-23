<!DOCTYPE html>
<html>
<head>
    <title>BEDS</title>
    <link rel="stylesheet" type="text/css" href="sample.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="top-nav-bar">
<img src="http://localhost/Home%20decor/homedecor.jpg" class="logo">
<div class="search">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for product type.." title="Type a product category">
<?php
error_reporting(0);
$user=$_GET['user'];
echo "<ul id=\"myUL\">";
		echo "<li style=\"display:none;\"><a href=\"http://localhost/Home%20decor/Lamp.php?user=".$user."\">Lamps</a></li>";
		echo "<li style=\"display:none;\"><a href=\"http://localhost/Home%20decor/Bed.php?user=".$user."\">Beds</a></li>";
		echo "<li style=\"display:none;\"><a href=\"http://localhost/Home%20decor/Wallpaper.php?user=".$user."\">Wallpapers</a></li>";
		echo "<li style=\"display:none;\"><a href=\"http://localhost/Home%20decor/Tables.php?user=".$user."\">Tables</a></li>";
        echo "<li style=\"display:none;\"><a href=\"http://localhost/Home%20decor/Antique.php?user=".$user."\">Antique Pieces</a></li>";
        echo "<li style=\"display:none;\"><a href=\"http://localhost/Home%20decor/Combo.php?user=".$user."\">Combo's</a></li>";
        echo "</ul>";
echo "</ul>";
?>
</div>
<?php
error_reporting(0);
$user=$_GET['user'];
echo "<a href=\"http://localhost/Home%20decor/cart.php?user=".$user."\"style=\"position:absolute;top:15%;left:80%;color:black;\"><i class=\"fa fa-shopping-basket\"></i>Cart</a>";
?>
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
        echo "<li><a href=\"http://localhost/Home%20decor/Combo.php?user=".$user."\">Combo's</a></li>";
        echo "</ul>";
    echo "</div>";
    ?>
    <div class="slider">
        <div id="slider" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="bedB1.jpg" class="d-block w-100" height="600" alt="...">
        </div>
        <div class="carousel-item">
          <img src="bedB2.jpg" class="d-block w-100" height="600" alt="...">
        </div>
        <div class="carousel-item">
          <img src="bedB3.jpg" class="d-block w-100" height="600" alt="...">
        </div>
      </div>
      <ol class="carousel-indicators">
        <li data-target="#slider" data-slide-to="0" class="active"></li>
        <li data-target="#slider" data-slide-to="1"></li>
        <li data-target="#slider" data-slide-to="2"></li>
      </ol>
    
    </div>
    </div>
    </section>
    <section class="on-sale">
    <div class="container">
        <div class="title-box"> 
            <h2>Beds</h2>
        </div>
</div>   
                <?php  
                    $host="localhost";
                    $dbUsername="root";
                    $dbpassword="";
                    $dbname="homedecor";    
                    $conn= new mysqli($host,$dbUsername,$dbpassword,$dbname);
                    if (mysqli_connect_error()) {
                        die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
                    }

                    $query = "SELECT * FROM items";  
                    $result = mysqli_query($conn, $query); 

                    while( $row = mysqli_fetch_array($result)) {
                        if($row['cat_id']==3 && $row['type']=="old"){
                            echo "<table style=\"display:inline-block;padding-right:25px;padding-bottom:50px;margin-left:125px;\">";
                            echo "<tr>"; 
                            echo "<td>";
                            echo "<div style=\"box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);max-width: 300px;margin: auto;text-align: center;font-family: arial;\">";
                            echo "<img src=\"http://localhost/Home decor/image/".$row['item_image']." \"style=\"width:100%\" >"; 
                            echo "<h1>".$row['item_name']."</h1>";
                            echo "<p style=\"color: grey;font-size: 22px;\">&#8377 ".$row['item_price']."</p>";
                            echo "<div style=\"text-align:center;\">";
                            echo"<i class=\"fa fa-star\"></i>";
                            echo"<i class=\"fa fa-star\"></i>";
                            echo"<i class=\"fa fa-star\"></i>";
                            echo"<i class=\"fa fa-star-o\"></i>";
                            echo"<i class=\"fa fa-star-o\"></i>";
                            echo "</div><br>";
                            echo "<u> About the item </u><br> ".$row['discription']."";
                            echo "<br><br>";
                            echo "<div style=\"background-color:lightgrey\">";
                            echo "<p style=\"color:black;font-size: 15px;\">Dimensions of the item</p>";
                            echo "<p>".$row['dimension']."<br></p>";
                            echo "</div>";
                            echo "Discount : ".$row['discount']."% on price.";
                            echo "<br><br>";
                            echo "<p><a href=\"http://localhost/Home%20decor/cart.php?product_id=".$row['product_id']."&user=".$user." \"<button style=\" border: none;outline: 0;padding: 12px;color: white;background-color: #000;text-align: center;cursor: pointer;width: 100%;font-size: 18px;\"><i class=\"fa fa-shopping-cart\"></i>  Add to Cart</button></a></p>";
                            echo "</td>";
                            echo "</tr>"; 
                            echo "</table>";
                    }   
                    else if($row['cat_id']==3 && $row['type']=="new"){
                        echo "<table style=\"display:inline-block;padding-right:25px;padding-bottom:50px;margin-left:125px;\">";
                        echo "<tr>"; 
                        echo "<td>";
                        echo "<div style=\"box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);max-width: 300px;margin: auto;text-align: center;font-family: arial;\">";
                        echo "<img src=\"http://localhost/Home decor/image/".$row['item_image']." \"style=\"width:100%\" >"; 
                        echo "<p style=\"color:black;background-color:lightgrey;font-size:17px;\">NEW!!</p>";
                        echo "<h1>".$row['item_name']."</h1>";
                        echo "<p style=\"color: grey;font-size: 22px;\">&#8377 ".$row['item_price']."</p>";
                        echo "<div style=\"text-align:center;\">";
                        echo"<i class=\"fa fa-star\"></i>";
                        echo"<i class=\"fa fa-star\"></i>";
                        echo"<i class=\"fa fa-star\"></i>";
                        echo"<i class=\"fa fa-star\"></i>";
                        echo"<i class=\"fa fa-star-o\"></i>";
                        echo "</div><br>";
                        echo "<u> About the item </u><br> ".$row['discription']."";
                        echo "<br><br>";
                        echo "<div style=\"background-color:lightgrey\">";
                        echo "<p style=\"color:black;font-size: 15px;\">Dimensions of the item</p>";
                        echo "<p>".$row['dimension']."<br></p>";
                        echo "</div>";
                        echo "Discount : ".$row['discount']."% on price.";
                        echo "<br><br>";
                        echo "<p><a href=\"http://localhost/Home%20decor/cart.php?product_id=".$row['product_id']."&user=".$user." \"<button style=\" border: none;outline: 0;padding: 12px;color: white;background-color: #000;text-align: center;cursor: pointer;width: 100%;font-size: 18px;\"><i class=\"fa fa-shopping-cart\"></i>  Add to Cart</button></a></p>";
                        echo "</td>";
                        echo "</tr>"; 
                        echo "</table>";
                }     
                    }
                ?>  
    <section class="footer">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2>Useful Links</h2>
				<p><a href="about.html">About</a></p>
				<p><a href="contact.html">Contact us</a></p>
			</div>
			<div class="col">
				<h2>Follow us on</h2>
				<p><i class="fa fa-youtube-play"></i><a href="https://www.youtube.com">Youtube</a></p>
				<p><i class="fa fa-instagram"></i><a href="https://www.instagram.com">Instagram</a></p>
				<p><i class="fa fa-facebook-official"></i><a href="https://www.facebook.com">Facebook</a></p>
				<p><i class="fa fa-linkedin"></i><a href="https://www.linkedin.com">LinkedIn</a></p>
			</div>
			<div class="col">
				<h2>Created By</h2>
				<p><i class="fa fa-heart-o"></i>Monisha V </p>
				<p><i class="fa fa-heart-o"></i>Neha H A</p>
			</div>
		</div>
	</div>
    </section>
<script>

function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

</script>

</body>
</html>