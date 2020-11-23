<?php
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="s8AXAXXDgR";

// Salt should be same Post Request 

If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  } else {
        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
         }
		 $hash = hash("sha512", $retHashSeq);
       if ($hash != $posted_hash) {
	       echo "Invalid Transaction. Please try again";
		   } else {
          echo "<h3 style=\"text-align:center;\">Thank You for shopping with us. ". $status.".</h3>";
          echo "<h4 style=\"text-align:center;\">Your Transaction ID for this transaction is ".$txnid.".</h4>";
          echo "<h4 style=\"text-align:center;\">We have received a payment of Rs. " . $amount . ". Thanks for your placing an order.</h4>";
          echo "<script>alert(\"Thank you for shopping with us!! Login again to shop more!!\");</script>";
               }
               
               header('refresh:10;url=http://localhost/Home%20decor/index.html');
?>	