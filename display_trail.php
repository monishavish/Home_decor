
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
        echo "<table style=\"display:inline-block;padding-right:35px;padding-bottom:50px;\">";
        echo "<tr>"; 
        echo "<td>";
        echo "<div style=\"box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);max-width: 300px;margin: auto;text-align: center;font-family: arial;\">";
        echo "<img src=\"http://localhost/Home decor/image/".$row['item_image']." \"style=\"width:100%\" >"; 
        echo "<h1>".$row['item_name']."</h1>";
        echo "<p style=\"color: grey;font-size: 22px;\">".$row['item_price']."</p>";
        echo "<p>".$row['discription']."<br>".$row['dimension']."<br>Discount - ".$row['discount']."% on price.</p>";
        echo "<p><button style=\" border: none;outline: 0;padding: 12px;color: white;background-color: #000;text-align: center;cursor: pointer;width: 100%;font-size: 18px;\">Add to Cart</button></p>";
        echo "</td>";
        echo "</tr>"; 
        echo "</table>";
   }   
}
?>  