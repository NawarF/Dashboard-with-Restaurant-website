<?php
include './components/config.php';

session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
 }else{
    $user_id = '';
 };


 if(isset($_POST['submit'])){
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $method = $_POST['method'];
   $method = filter_var($method, FILTER_SANITIZE_STRING);
   $address = $_POST['address'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);
   $total_products = $_POST['total_products'];
   $total_price = $_POST['total_price'];

   $check_cart = $conn->prepare("SELECT * FROM `cart` WHERE userid = ?");
   $check_cart->execute([$user_id]);
   if($check_cart->num_rows > 0){

      if($address == ' '){
         $message[] = 'please add your address!';
      }else{
         
      $insert_order = $conn->prepare("INSERT INTO `orders`(name,email, number, address,total_products, total_price, payment_method,user_id ) VALUES(?,?,?,?,?,?,?,?)");
         $insert_order->execute([ $name, $email,$number, $address, $total_products, $total_price, $method, $user_id,]);

         $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
         $delete_cart->execute([$user_id]);

         $message[] = 'order placed successfully!';
      }
      
   }else{
      $message[] = 'your cart is empty';
   }
  
 }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/all.min.css">
</head>
<body>
    

    <!-- start Header section  -->
<?php
include './components/user-header.php';
?>

<section class="cheakout">
<h2 class="title">order Summary</h2>


  <form method='post' class="cheakout-container">
  <div class="all-info">
    <div class="order-info">
        <h4>cart items</h4>
        <?php
        $grand_total =0;
        $cart_items[] = '';
         $stmt=$conn->prepare("SELECT * FROM `cart` where userid=? ");
         $stmt->execute([$user_id]);
         $result=$stmt->get_result();
         if($result->num_rows > 0){
            while($row_cart =$result->fetch_assoc()){
                $cart_items[] = $row_cart['name'].' ('.$row_cart['price'].' x '. $row_cart['qtn'].') - ';
                $total_products = implode($cart_items);
                $grand_total += $row_cart['price'] * $row_cart['qtn'];
?>
         
        <div class="order-detail">
            <p><?= $row_cart['name'] ?></p>
            <span>$<?= $row_cart['price'] ?> x <?= $row_cart['qtn'] ?></span>
        </div>

<?php 
  }
   }else{
            echo "<p>There is no items </p>";
         } 
        ?>

        <div class="cheakout-grand">
            <p>grand total:</p>
            <span>$ <?= $grand_total?> /-</span>
        </div>
        <a href="cart.php" class='link'>View Cart</a>
    </div>

<h4 class='cheakout-into'>Your info</h4>


<?php
 $stmt =$conn->prepare("SELECT * FROM `users` where id=?");
 $stmt->execute([$user_id]);
 $result =$stmt->get_result();
 $row =$result->fetch_assoc();

?>

<input type="hidden" name="total_products" value="<?= $total_products; ?>">
   <input type="hidden" name="total_price" value="<?=  $grand_total; ?>" value="">
   <input type="hidden" name="name" value="<?= $row['name'] ?>">
   <input type="hidden" name="number" value="<?= $row['number'] ?>">
   <input type="hidden" name="email" value="<?= $row['email'] ?>">
   <input type="hidden" name="address" value="<?= $row['address'] ?>">

<p class='user-det'><i class="fa-solid fa-user"></i>
      <span> <?= $row['name']?></span></p>

 <p class='user-det'> <i class="fa-solid fa-phone"></i>
    <span><?= $row['number']?></span></p>

    <p class='user-det'><i class="fa-solid fa-envelope"></i>
 <span><?= $row['email']?></span></p>  

 <a href="update-profile.php" class='link'>update info</a>


 <h4 class='cheakout-into'>Delivery Address</h4>

 <p>
     <i class="fa-solid fa-location-dot"></i>
        <span><?php if( $row['address'] == '' ){
                echo 'please enter your address!';
             }else{
                echo $row['address'];
             } ?></span>
   </p>
 <a href="update-address.php" class='link'>update address</a> 

 <select name="method" class="cheakout-select" required>
         <option value="" disabled selected>select payment method --</option>
         <option value="cash on delivery">cash on delivery</option>
         <option value="credit card">credit card</option>
         <option value="paytm">paytm</option>
         <option value="paypal">paypal</option>
      </select>
      <input type="submit" value="place order" class="link <?php if($row['address'] == ''){echo 'disabled';} ?>" style="width:100%; background:var(--red); color:var(--white); border:none ;font-size:18px" name="submit">
 </div>
      </form>

</section>


















</body>
<script src='./js/main.js'></script>
</html>