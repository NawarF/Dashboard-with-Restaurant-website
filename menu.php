<?php
include './components/config.php';

session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
 }else{
    $user_id = '';
 };

include './components/add_to_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/all.min.css">
</head>
<body>
    

    <!-- start Header section  -->
    <?php
include './components/user-header.php';
?>
<!-- End Header Section -->


<!-- start section 2 about us -->
<section class="about-us">
    <h2>our menu</h2>
    <p>
        <a href="home.php">home</a>
         <span>/</span>
         <a href="menu.php">menu</a></p>

 </section>

 <!-- End section 2 about us -->

 <!-- start section diches 3 -->
 <section class="dishes">
<h2 class="title">latest dishes</h2>
<div class="dishes-container">
<?php
$sql ="SELECT * FROM `products` ";
$stmt =$conn->prepare($sql);
$stmt->execute();
$result=$stmt->get_result();
if($result->num_rows > 0){
    while($row =$result->fetch_assoc()){
        ?>

<div class="dishes-box">


   <form action="" method ="POST">
    <input type="hidden" value=<?= $row['id']  ?> name="pro-id">
    <input type="hidden" value=<?= $row['name']  ?> name="name">
    <input type="hidden" value=<?= $row['price']  ?> name="price">
    <input type="hidden" value=<?= $row['image']  ?> name="image">
    <div class="dishes-icons">
        <a href="quick-view.php?id=<?= $row['id'] ?>"  class="fas fa-eye"></a>
       <button type="submit" class="fas fa-shopping-cart" name='cart-icon'></button>
    </div>

    <div class="dishes-img">
        <img src="./uploaded-image/<?= $row['image'] ?>" alt="">
    </div>

    <div class="dishes-content">
    <a href="category.php?food-gategory=<?= $row['catogry']  ?>" class="dishes-option"><?= $row['catogry'] ?></a>
    <h4><?= $row['name'] ?></h4>
      </div>

<div class="count">
    <p><span>$ </span><?= $row['price']?></p>
    <input type="number" class="num"
     min="1" max="99" value="1" name='qtn'
     onkeypress="if(this.value.length == 2) return false;">
</div> 
   </form>
   </div>
<?php
    }
}
?>


</section>
    <!-- End section 3 Dishes -->







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