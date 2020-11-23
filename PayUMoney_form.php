<link rel="icon" href="favicon.ico" type="image/x-icon">
<?php
error_reporting(0);
$MERCHANT_KEY = "aGbX1DAk";
$SALT = "s8AXAXXDgR";
// Merchant Key and Salt as provided by Payu.

$PAYU_BASE_URL = "https://sandboxsecure.payu.in";		// For Sandbox Mode
//$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}
$price=$_GET['price'];
$user=$_GET['user'];
                    $host="localhost";
                    $dbUsername="root";
                    $dbpassword="";
                    $dbname="homedecor";    
                    $conn= new mysqli($host,$dbUsername,$dbpassword,$dbname);
                    if (mysqli_connect_error()) {
                        die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
                    }
                    $sql = "SELECT * FROM `user` WHERE email=\"$user\"";
                    $result= mysqli_query($conn,$sql);
                    $row=mysqli_fetch_array($result); 

                    $sql2 ="SELECT item_name FROM items WHERE product_id IN (SELECT product_id FROM add_to_cart WHERE user=\"$user\")";
                    $result2=mysqli_query($conn,$sql2);
              
$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  </head>
  <body onload="submitPayuForm()" style="background-image: url(b2.png); background-size: 60%; background-repeat: no-repeat; background-position:left;">
    <h2 style="text-align: center; padding-top: 5%;">Payment Form</h2>
    <br/>
    <?php if($formError) { ?>
	
      <span style="color:red">Please check your details.</span>
      <br/>
      <br/>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <center> <table style="border:dotted; border-style:dashed; border-spacing:10px; border-color: black; text-align: center;">
        <tr>
          <td><b style="text-align: center;">Please check all the details:</b></td>
        </tr>
        <tr>
          <td>Amount: </td>
          <td><input name="amount" value="<?php echo $price;?>" /></td>
          <td>Name: </td>
          <td><input name="firstname" id="firstname" value="<?php echo $row['name']; ?>" /></td>
        </tr>
        <tr>
          <td>Email: </td>
          <td><input name="email" id="email" value="<?php echo $user; ?>" /></td>
          <td>Phone: </td>
          <td><input name="phone" value="<?php echo $row['ph'];?>" /></td>
        </tr>
        <tr>
          <td>Delivery address: </td>
          <td colspan="3"><textarea name="deliveryaddress"><?php echo $row['address'];?></textarea></td>
        </tr>
        <tr>
        <tr>
          <td>Product Info: </td>
          <td colspan="3"><textarea name="productinfo" style="height:5em;width:20em;"><?php $c=0;while($row2=mysqli_fetch_array($result2)){$c=$c+1;echo $c .". ". $row2['item_name'] . "\n";} ?></textarea></td>
        </tr>
        <tr>
          <td colspan="3"><input name="surl" type="hidden" value="http://localhost/Home%20decor/success.php" size="64" /></td>
        </tr>
        <tr>
          
          <td colspan="3"><input name="furl" type="hidden" value="http://localhost/Home%20decor/success.php" /></td>
        </tr>

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
        </tr>

        <tr>
          <?php if(!$hash) { ?>
            <td colspan="4"><input type="submit" value="Submit" style="padding: 7px 6px;"/></td>
          <?php } ?>
        </tr>
      </table></center>
      <center><h3>OR</h3></center>
    </form>
    <form action="cod.php">
      <center><button style="  background-color: #90639b;border: none;color: white;padding: 10px 4px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;">Cash On Delivery</button></center>
    </form>
  </body>
</html>
