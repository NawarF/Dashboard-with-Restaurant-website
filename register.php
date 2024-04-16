<?php

include './components/config.php';

session_start();

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
 }else{
    $user_id = '';
 };

if(isset($_POST['btn'])){
   $name =$_POST['user-name'] ;
   $name = filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

   $email =$_POST['user-email'];
   $email = filter_var($email, FILTER_SANITIZE_EMAIL);

   $number =$_POST['user-number'];
   $number = filter_var($number, FILTER_SANITIZE_NUMBER_INT);

   $password =$_POST['user-password'];
   $password = filter_var($password, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $hash_password = password_hash($password ,PASSWORD_DEFAULT);

   $confirm =$_POST['user-cofirm'];
   $confirm = filter_var($confirm, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $hash_confirm = password_hash($confirm ,PASSWORD_DEFAULT);


   if($password != $confirm){
    $message[]='password not matched!';
}else{
    try{
        $sql ="SELECT * FROM `users` WHERE email =? and number =?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email ,$number]);
        $result =$stmt->get_result();
        if($result->num_rows > 0){
            $message []='email and number already exsits! ';
        }else{
                $sql="INSERT INTO `users` (name , password ,email ,number) values(?,?,?,?)";
                $stmt =$conn->prepare($sql);
                $stmt->execute([$name ,$hash_password ,$email,$number]);
             
                $sql ="SELECT * FROM `users` WHERE email =? and password =?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$email ,$password]);
                $result =$stmt->get_result();
                $row =$result->fetch_assoc();
                if($result->num_rows > 0){
                    $_SESSION['user_id'] = $row['id'];
                    header('location:home.php');
                    exit;
                }
            }}
    
    catch(Exception $e) {
        echo "Error: " . $e->getMessage();
     }
    }}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/all.min.css">
</head>
<body>
   

<?php
include "./components/user-header.php";

?>

<section class="sec-login">
    <form action="" method= "post" >
        <h2>register now</h2>
        <input type="text" name="user-name" required class="user-log" placeholder="enter your name">
        <input type="text" name="user-email" required class="user-log" placeholder="enter your email">
        <input type="text" name="user-number" required class="user-log" placeholder="enter your number">
        <input type="password" name="user-password"  required class="user-log" placeholder="enter your password">
        <input type="password" name="user-cofirm" required class="user-log" placeholder="confirm your password">

        <input type="submit" value="register now" name="btn">
        <p>Already have an account? <a href="login.php">login here</a></p>
    </form>
</section>

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