<?php
include './components/config.php';

session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
 }else{
    $user_id = '';
 };

if(isset($_POST['btn'])){
    $name =$_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $number =$_POST['number'];
    $number = filter_var($number, FILTER_SANITIZE_NUMBER_INT);

    $email =$_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $msg=$_POST['message'];
    $msg = filter_var($msg, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$stmt=$conn->prepare("SELECT * FROM `message` WHERE name =? and number = ? and email =? and message =?");
$stmt->execute([$name ,$number ,$email ,$msg]);
$result =$stmt->get_result();
$row =$result->fetch_assoc();
if($result->num_rows > 0)
{
    $message[] ="Message already sent!";
}else{
 $stmt =$conn->prepare("INSERT INTO `message`(name , number ,email ,message) VALUES(? ,?,?,?) ");
 $stmt->execute([$name ,$number ,$email ,$msg ]);
 $message[] ="added succesfully";
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
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
    <h2>Contact us</h2>
    <p>
        <a href="home.php">home</a>
         <span>/</span>
         <a href="contact.php">contact</a></p>

 </section>

 <!-- End section 2 about us -->

<!-- start section 3 Form -->
<section class="contact">
    <div class="contact-container">
        <div class="contact-img">
            <img src="images/contact-img.svg" alt="">
        </div>

        <form action="" method='POST' class="contact-form">

            <h3>Tell Us Something!</h3>

            <input type="text" placeholder="enter your name" name="name" class="form-inp" required>

            <input type="number" placeholder="enter your number" name="number" class="form-inp" min="0" required
               onkeypress="if(this.value.length == 10) return false">

            <input type="text" name="email" placeholder="enter your email " class="form-inp" required>
            <textarea name="message" id="" cols="30" rows="10" class="form-inp" required 
            placeholder="enter your massage"></textarea>

           <input type="submit" name ="btn"value="send massage" class="btn">       
   
        </form>



    </div>

</section>

<!-- End section 3 Form -->


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