<?php
include '../components/config.php';

session_start();
$admin_id =  $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:admin-login.php');
}

if(isset($_POST['register-btn'])){
    $username =$_POST['user-name'];
    $username = filter_var($username ,FILTER_SANITIZE_STRING);
    $password = $_POST['user-passwrod'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql ='SELECT * FROM `admin` where name =?';
    $stmt= $conn->prepare($sql);
    $stmt->execute([$username]);
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if($row > 0){
        $message[] ='username already exsits';
    }else{
        if(password_verify( $password,$hashed_password)){
          
     $sql="INSERT INTO `admin` (name , password) VALUES(? ,? )";
     $stmt =$conn->prepare($sql);
     $stmt->execute([$username , $hashed_password]);
     $message []='new admin registered!';
        }else{
            $message[] ='confirm password not matched!';
        }   
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
        <h2>Register New</h2>
        <input type="text" required name="user-name" id="" placeholder='enter your username'>
        <input type="password" required name="user-passwrod" id="" placeholder='enter your password'>
        <input type="password" required name="confirm" id="" placeholder='confirm your password'>
        <input type="submit" value="Register Now" name='register-btn'>
    </form>
</section>

</head>
</body>