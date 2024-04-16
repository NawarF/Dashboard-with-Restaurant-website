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
    <title>Orders</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/all.min.css">
</head>
<body>
    

    <!-- start Header section  -->
    <?php
include './components/user-header.php';
?>

<!-- End Header Section -->













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