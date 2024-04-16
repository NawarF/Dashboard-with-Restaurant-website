<?php
include '../components/config.php';

session_start();
$admin_id =  $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:admin-login.php');
}

if(isset($_POST['Update-btn'])){
   
    $user_name =$_POST['user-name'];
    $user_name= filter_var($user_name , FILTER_SANITIZE_STRING);
    if(!empty($user_name)){

    $sql= "SELECT * FROM `admin` where name =?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$user_name]);
    $result= $stmt->get_result();
    $row =$result->fetch_assoc();
    if($row > 0){
        $message[] ='username already taken!';
    }else{
        $sql ="UPDATE `admin` SET name =? where id =?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$user_name , $admin_id]);
       
    }}

    $old_password = $_POST['user-passwrod'];
    $old_password = filter_var( $old_password , FILTER_SANITIZE_STRING);

    $new_passwrod = $_POST['new-passwrod'];
    $new_passwrod= filter_var( $new_passwrod , FILTER_SANITIZE_STRING);
  
    $confirm =$_POST['confirm'];
    $confirm = filter_var( $confirm , FILTER_SANITIZE_STRING);
   

   $sql ="SELECT password from `admin` where id =? ";
   $stmt =$conn->prepare($sql);
   $stmt->execute([$admin_id]);
   $result=$stmt->get_result();
   $prev_password = $result->fetch_assoc();

   if(!password_verify($old_password ,$prev_password['password'])){
    $message[] ='old password not matched!';
   }elseif($new_passwrod != $confirm){
    $message[] ='confirm password not matched!';
   }else{
    $hashed_confirm = password_hash($confirm ,PASSWORD_DEFAULT);
    $sql ="UPDATE `admin` set password = ? where id =?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$hashed_confirm, $admin_id]);
    // $message[] ='the password updated';

   }
  



}
    






?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../style/admin-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Register Form</title>
</head>
<body>
    <?php
include '../components/admin-header.php';
?>


<section id='register-form'>
    <form action="" method='post'>
        <h2>Update Profile</h2>
        <?php
        $sql ="SELECT * FROM `admin` where id = ?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$admin_id]);
        $result = $stmt->get_result();
        $row =  $result->fetch_assoc();
        
        
        ?>
        <input type="text" oninput="this.value = this.value.replace(/\s/g, '')"  name="user-name"  value =<?= $row['name']?> id="" placeholder='enter your username'>
        <input type="password" oninput="this.value = this.value.replace(/\s/g, '')"  name="user-passwrod" id="" placeholder='enter your old password'>
        <input type="password" oninput="this.value = this.value.replace(/\s/g, '')"  name="new-passwrod" id="" placeholder='enter your new password'>
        <input type="password" oninput="this.value = this.value.replace(/\s/g, '')"  name="confirm" id="" placeholder='confirm your password'>

        <input type="submit" value="Update Now" name='Update-btn'>
    </form>
</section>

</head>
</body>