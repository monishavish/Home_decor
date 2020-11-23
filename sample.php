<!DOCTYPE html>
<html>
<head>
    <title>LAMP</title>
	<link rel="stylesheet" type="text/css" href="sample.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="top-nav-bar">
<img src="http://localhost/Home%20decor/Logo.png" class="logo">
<div class="search">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for product type.." title="Type a product category">
<ul id="myUL">
  <li style="display:none;"><a href="http://localhost/Home%20decor/Lamp.html">Lamps</a></li>
  <li style="display:none;"><a href="http://localhost/Home%20decor/Wallpaper.html">Wallpaper</a></li>
  <li style="display:none;"><a href="http://localhost/Home%20decor/Table.html">Tables</a></li>
  <li style="display:none;"><a href="http://localhost/Home%20decor/Bed.html">Beds</a></li>
  <li style="display:none;"><a href="http://localhost/Home%20decor/Antique.html">Antiques</a></li>
</ul>
</div>
<div class="menu-bar">
	<ul>
		<li><a href="#"><i class="fa fa-shopping-basket"></i>Cart</a></li>
		<li><a href="#"><i class="fa fa-sign-in"></i>Login</a></li>
	</ul>
</div>
</div>
	

<section class="header">
    <div class="side-menu" id="side-menu">
        <ul>
            <li><a href="#">New Arrivals</a></li>
            <li><a href="#">Discounts</a></li>
            <li><a href="Lamp.html">Lamps</a></li>
            <li><a href="Bed.html">Beds</a></li>
            <li><a href="Wallpaper.html">Wallpapers</a></li>
            <li><a href="Table.html">Tables</a></li>
            <li><a href="Antique.html">Antique Pieces</a></li>
        </ul>
    </div>
    <div class="slider">
        <div id="slider" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="lamp13.jpg" class="d-block w-100" height="500" alt="...">
        </div>
        <div class="carousel-item">
          <img src="lamp17.jpg" class="d-block w-100" height="500" alt="...">
        </div>
        <div class="carousel-item">
          <img src="lamp19.jpg" class="d-block w-100" height="500" alt="...">
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
            <h2>Lamps</h2>
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
                        if($row['cat_id']==1){
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
                        echo "<p><a href=\"http://localhost/Home%20decor/product_id=".$row['product_id']." \"<button style=\" border: none;outline: 0;padding: 12px;color: white;background-color: #000;text-align: center;cursor: pointer;width: 100%;font-size: 18px;\"><i class=\"fa fa-shopping-cart\"></i>  Add to Cart</button></a></p>";
                        echo "</td>";
                        echo "</tr>"; 
                        echo "</table>";
                }   
                }
                ?>  
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