<?php
include './components/config.php';

session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
 }else{
    $user_id = '';
 };

if(isset($_POST['btn'])){
    $address = $_POST['user-flat'] .', '.$_POST['user-bulding'].', '.$_POST['area-name'].', '.$_POST['town-name'] .', '. $_POST['city-name'] .', '. $_POST['state-name'] .', '. $_POST['country-name'] .' - '. $_POST['code'];
    $address = filter_var($address, FILTER_SANITIZE_STRING);
 
    $update_address = $conn->prepare("UPDATE `users` set address = ? WHERE id = ?");
    $update_address->execute([$address, $user_id]);
 
    $message[] = 'address saved!';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Address</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/all.min.css">
</head>
<body>
    

    <!-- start Header section  -->


    <?php
include './components/user-header.php';
?>

<!-- start profile form section  -->

<section class="sec-login">
    <form action="" method= "post" >
        <h2>your address</h2>
        <input type="text" name="user-flat" value='' class="user-log" placeholder="flat no.">
        <input type="text" name="user-bulding" value='' class="user-log" placeholder="bulding no.">
        <input type="text" name="area-name" value='' class="user-log" placeholder="area name.">
        <input type="text" name="town-name" value='' class="user-log" placeholder="town name.">
        <input type="text" name="city-name" value='' class="user-log" placeholder="city name.">
        <input type="text" name="state-name" value='' class="user-log" placeholder="state name.">
        <input type="text" name="country-name" value='' class="user-log" placeholder="country name.">
        <input type="text" name="code" value='' class="user-log" placeholder="pin code.">
       

        <input type="submit" value="save address" name="btn">
       
    </form>
</section>


<!-- start profilre form section  -->




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