<?php
include './components/config.php';

session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
 }else{
    $user_id = '';
 };


 if(isset($_POST['btn'])){
  
    $name =$_POST['user-name'];
    $name = filter_var($name , FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $email = $_POST['user-email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $number =$_POST['user-number'];
    $number = filter_var($number , FILTER_SANITIZE_FULL_SPECIAL_CHARS);

   if(!empty($name)){
    $sql ="UPDATE `users` SET name =? where id =?";
    $stmt=$conn->prepare($sql);
    $stmt->execute([$name ,$user_id]);
   }

   if(!empty($email)){
    $stmt = $conn->prepare("SELECT * from `users` where email =? ");
    $stmt->execute([$email]);
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $message[] = 'email already taken!';
    }else{
        $sql ="UPDATE `users` SET email =? where id =?";
        $stmt=$conn->prepare($sql);
        $stmt->execute([$email ,$user_id]);
   }
   }
   
   if(!empty($number)){
    $stmt = $conn->prepare("SELECT * from `users` where number =? ");
    $stmt->execute([$number]);
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $message[] = 'number already taken!';
    }else{
        $sql ="UPDATE `users` SET number =? where id =?";
        $stmt=$conn->prepare($sql);
        $stmt->execute([$number ,$user_id]);
   }
   }
  
    $stmt= $conn->prepare("SELECT password from `users` where id=?");
    $stmt->execute([$user_id]);
    $result=$stmt->get_result();
    $row = $result->fetch_assoc();
    $prev_pass= $row['password'];
    

    $old = $_POST['old-password'];
    $old =filter_var($old, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $new = $_POST['new-password'];
    $new =filter_var($new, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $confirm = $_POST['user-cofirm'];
    $confirm =filter_var($confirm, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

     try{
    if(!password_verify($old, $prev_pass)){
        $message[] ='old password not matched!';
    }elseif($new != $confirm){
        $message[] ='confirm not matched!';
    }else{
        $hashed_confirm = password_hash($confirm ,PASSWORD_DEFAULT);
        $sql ="UPDATE `users` SET password =? where id =?";
        $stmt=$conn->prepare($sql);
        $stmt->execute([ $hashed_confirm ,$user_id]);
    }

     }catch(Exception $e){
        echo 'Error'. $e->getMessage();
     }



 }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update profile</title>
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
        <h2>update profile</h2>
        <input type="text" name="user-name" value='<?= $row['name'] ?>' class="user-log" placeholder="enter your name">
        <input type="text" name="user-email" value='<?= $row['email'] ?>' class="user-log" placeholder="enter your email">
        <input type="text" name="user-number" value='<?= $row['number'] ?>' class="user-log" placeholder="enter your number">
        <input type="password" name="old-password"   class="user-log" placeholder="enter your old password">
        <input type="password" name="new-password"   class="user-log" placeholder="enter your new password">
        <input type="password" name="user-cofirm"  class="user-log" placeholder="confirm your password">

        <input type="submit" value="update now" name="btn">
       
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