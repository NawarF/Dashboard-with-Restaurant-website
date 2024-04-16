<?php
include './components/config.php';

session_start();

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
 }else{
    $user_id = '';
 };


if(isset($_POST['btn'])){
    $email =$_POST['user-email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $password =$_POST['user-password'];
    $password =filter_var($password, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 try{

  $sql="SELECT * FROM `users` where email =?";
  $stmt =$conn->prepare($sql);
  $stmt->execute([$email]);
  $result = $stmt->get_result();
  $row=$result->fetch_assoc();
  if($row and password_verify($password ,$row['password'])){
    $_SESSION['user_id'] = $row['id'];
    header("location:home.php");
  }else{
    $message[] ="email or password not matched";
  }
 }catch(Exception $e){
    echo "Error :". $e->getMessage();
 }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/all.min.css">
</head>
<body>

<?php
include "./components/user-header.php";
?>

<section class="sec-login">
    <form action="" method="POST" >
        <h2>login now</h2>
        <input type="text" name="user-email" required class="user-log" placeholder="enter your email">
        <input type="password" name="user-password" required class="user-log" placeholder="enter your password">
        <input type="submit" value="login now" name="btn">
        <p>don't have an account? <a href="register.php">register here</a></p>
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