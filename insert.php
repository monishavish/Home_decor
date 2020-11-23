
<?php 
error_reporting(0); 
?> 
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
    $cat_id=$_POST['id'];
    $price=$_POST['price'];
    $prod_id=$_POST['prod_id'];
    $dis=$_POST['dis'];
    $dimen=$_POST['dimen'];
    $discount=$_POST['discount'];
    $type =$_POST['type'];
    $msg = ""; 
  
      if (isset($_POST['insert'])) { 
      
        $filename = $_FILES["image"]["name"]; 
        $tempname = $_FILES["image"]["tmp_name"];     
        $folder = "image/".$filename;  
        $sql = "INSERT INTO `items`(`item_name`, `cat_id`, `product_id`, `item_price`, `item_image`, `discription`, `dimension`, `discount`, `type`) VALUES ('$name','$cat_id','$prod_id','$price','$filename','$dis','$dimen','$discount','$type')"; 
        mysqli_query($conn, $sql); 
        if (move_uploaded_file($tempname, $folder))  { 
            $msg = "Image uploaded successfully"; 
        }else{ 
            $msg = "Failed to upload image"; 
          } 
      } 
      header("Location:http://localhost/Home%20decor/admin.html");

?> 