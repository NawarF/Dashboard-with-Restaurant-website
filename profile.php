<?php
include './components/config.php';

session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
 }else{
    $user_id = '';
 };

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/all.min.css">
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
  />
</head>
<body>
    

    <!-- start Header section 1 -->
    <?php
include './components/user-header.php';
?>


<section class="profile-data">
    <div class="profile-container">
        <div class="img">
            <img src="./images/user-icon.png" alt="">
        </div>
        <p><i class="fa-solid fa-user"></i>
           <span> <?= $row['name']?></span></p>

        <p> <i class="fa-solid fa-phone"></i>
            <span> <?= $row['number']?></span></p>

        <p><i class="fa-solid fa-envelope"></i>
             <span> <?= $row['email']?></span></p>
        
      <a href="update-profile.php" class='prof-btn'>update info</a>

      <p>
        <i class="fa-solid fa-location-dot"></i>
             <span><?php if( $row['address'] == '' ){
                echo 'please enter your address!';
             }else{
                echo $row['address'];
             } ?></span>
             </p>

             <a href="update-address.php" class='prof-btn'>update address</a>    


    </div>
</section>
















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
<script src="js/main.js"></script>
</body>