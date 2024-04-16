<?php
include './components/config.php';

session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
 }else{
    $user_id = '';
 };


 if(isset($_POST['update_qty'])){

        $update_qtn =$_POST['update-qtn'];
        $update_qtn = filter_var($update_qtn, FILTER_SANITIZE_STRING);
        $pro_id =$_POST['pro-id'];
     
        $stmt = $conn->prepare("UPDATE cart set qtn =? where proid =?");
        $stmt->execute([$update_qtn ,$pro_id]); 
        $message[] = 'cart quantity updated';
 }

if(isset($_POST['delete-icon'])){
    $pro_id =$_POST['pro-id'];
    $stmt =$conn->prepare("DELETE FROM `cart` where proid= ?");
    $stmt->execute([$pro_id]);
    $message[]='cart item has been deleted ';
}

if(isset($_POST['Delete_All'])){
    $stmt =$conn->prepare("DELETE FROM `cart` where userid =?");
    $stmt->execute([$user_id]);
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

<!-- End Header Section -->

<!-- start section 1 -->

<section class="about-us">
    <h2>shopping cart</h2>
    <p>
        <a href="home.php">home</a>
         <span>/</span>
         <a href="cart.php">cart</a></p>

 </section>


<!-- end section 1 -->


 <!-- start section total price 3 -->

<section class="cart">
    <h2 class="title">your cart</h2>



 <!-- start section 4 -->


<div class="dishes-container">
<?php
   $grand_total = 0;
   $stmt=$conn->prepare("SELECT * FROM `cart` where userid= ?");
   $stmt->execute([$user_id]);
   $result = $stmt->get_result();
   if($result->num_rows > 0 ){
    while($row =$result->fetch_assoc()){

?>

    <form method='post' class="dishes-box">
     <input type="hidden" name='pro-id' value='<?= $row['proid']?>'>
        <div class="dishes-icons">
           
            <a href="quick-view.php?id=<?= $row['proid'] ?>" class="fas fa-eye"></a>
            <button type ="submit" class="fas fa-times" name="delete-icon"
            onclick="return confirm('delete this item?')"></button>
        </div>
    
        <div class="dishes-img">
            <img src="./uploaded-image/<?= $row['image'] ?>" alt="">
        </div>
    
    <div class="dishes-content">
        <a class="dishes-option"></a>
        <h4><?= $row['name']?></h4>
    </div>
    
    <div class="count">
        <p><span>$ </span><?= $row['price']?></p>
        <div class="qtn">
        <input type="number" class="num" name='update-qtn'
         min="1" max="99" value=<?= $row['qtn']?>
         onkeypress="if(this.value.length == 2) return false;">
         <button type="submit" class="fas fa-edit" name="update_qty"></button></div>
    </div> 

<div class="sub-total">
    <p>sub total : <span>$<?= $sub_total = $row['price'] * $row['qtn'] ?>/-</span></p>
</div>
    </form>

<?php
    $grand_total += $sub_total ;
}
}
?>
</div>

<div class="total-price" >
<p>cart total: <span>$<?= $grand_total ?></span></p>
<a href="cheakout.php" class="cheak-btn">Cheakout Orders</a>
</div>


<form class ='deleteall-form' action="" method='post'>
    <button type='submit' class='btn' name='Delete_All' >Delete All</button>
    
</form>


<div class="shopping">
<a href="menu.php">continue shopping</a>
</div>


</section>





























<!-- start section loader -->

<div class="loader">
    <img src="images/loader.gif" alt="">
</div>

<!-- End section loader -->


<!-- start Footer section -->

<section class="footer">

<div class="container-footer">
    <div class="box">
        <img src="images/email-icon.png" alt="">
        <h3>Our Email</h3>
        <p>nawarfayyad@gmail.com</p>
        <p>noorrfd@gmail.com</p>
    </div>


    <div class="box">
        <img src="images/clock-icon.png" alt="">
        <h3>Opening Hours</h3>
        <p>00:07am to 00:10pm</p>
        
    </div>


    <div class="box">
        <img src="images/map-icon.png" alt="">
        <h3>Our Address</h3>
        <p>Syria Damascus</p>
       
    </div>


    <div class="box">
        <img src="images/phone-icon.png" alt="">
        <h3>Our Number</h3>
        <p>00 88 99 55</p>
        <p>66 55 44 33</p>
    </div>

</div>

<div class="end-footer">
    <p>created by .....</p>
</div>


</section>





<!-- End Footer section -->




















    <script src="js/main.js"></script>
</body>
</html>