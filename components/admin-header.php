<?PHP
include '../components/config.php';

?>
<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/admin-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  
    <title>Admin Header</title>
</head>
<body>
    
<header id= 'admin-header'>

   <div class="header-flex">


 <div class="admin-logo">
    <h1><a href="../admin/dashboard.php" class='test'>AdminPanel</a></h1>
</div>
    <ul class='admin-menu'>
        <li><a href="../admin/dashboard.php">home</a></li>
        <li><a href="../admin/admin-products.php">products</a></li>
        <li><a href="../admin/admin-order.php">orders</a></li>
        <li><a href="../admin/admin-account.php">admins</a></li>
        <li><a href="../admin/users-account.php">users</a></li>
        <li><a href="../admin/admin-message.php">messages</a></li>
    </ul>

    <div class="icons">
    <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
    </div>
    
   <div class="profile">
    <?php
    $sql ="SELECT * FROM `admin` where id=?";
    $stmt=$conn->prepare($sql);
    $stmt->execute([$admin_id]);
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    ?>
    <p><?= $row['name'] ?></p>
    <a href="../admin/update-account.php" class='update-btn'>Update Profile</a>
    <div class="box-btn">
        <a href="../admin/admin-login.php" class='option'>login</a>
        <a href="../admin/admin-register.php" class='option'>register</a>
    </div>
    <a href="../admin/admin-login.php" class='delete-btn' onclick='return confirm("logout from this website?")'>logout</a>
   </div>
 
   </div>
</header>

<script src='../js/admin-main.js'></script>
</body>
</html>