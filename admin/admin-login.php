<?php
include '../components/config.php';

session_start();

if(isset($_POST['submit'])){

  $name = $_POST['admin_name'];
  $name= filter_var($name ,FILTER_SANITIZE_STRING);
  $pass = $_POST['admin_password'];
  $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
  

 $sql ='SELECT * FROM `admin` WHERE name= ?';
 $stmt = $conn->prepare($sql);
 $stmt->bind_param("s", $name);
 $stmt->execute();
 $result = $stmt->get_result();
 $row = $result->fetch_assoc();
if($row and password_verify($pass,$row['password'])){
    $_SESSION['admin_id'] = $row['id'];
    header('location:dashboard.php');
    exit;
}else{
    $message[] ="incorrect username or password";
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
    <title>Login</title>
</head>
<body>

<?php
if(isset($message)){
    foreach($message as $msg){
    echo "<div class='message'>
    <p>'.$msg.'</p>
    <i class='fas fa-times' onclick='this.parentElement.remove();'></i>
    </div>";
}}
?>

<div class="container">
<section id='admin-form'>

    <form action="" method ='post'>
        
        <h1 id='admin-title'>Login now</h1>
        <p>default username= <span>admin </span>& password = <span>111</span></p>
        <input type="text" required name='admin_name' placeholder='enter your username ' class='name'>
        <input type="password" required name='admin_password' placeholder='enter your password ' class='name'>
        <input type="submit" value="login now" name='submit' class='submit'>
    </form>
  
</section>

</div> 
</body>
</html>