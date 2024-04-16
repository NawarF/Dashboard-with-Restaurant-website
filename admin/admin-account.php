<?php
include '../components/config.php';

session_start();
$admin_id =  $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:admin-login.php');
}

if(isset($_GET['admin-id'])){
    $id =$_GET['admin-id'];
    $sql ="DELETE FROM `admin` where id =?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$id]);
    $message []='The account deleted succssfully';
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Account</title>
    <link rel="stylesheet" href="../style/admin-style.css">
</head>
<body>
    
<?php
include '../components/admin-header.php';
?>

<section id='admin-account'>

<div class="title">
    <h1>Admin Account</h1>
  </div>
      
<div class="account-container">

    <div class="account-info">
        <p>register new admin</p>
        <a href="admin-register.php" class='admin-register'>Register</a>
    </div>


    <?php
     
     $sql ="SELECT * FROM `admin`";
     $stmt=$conn->prepare($sql);
     $stmt->execute();
     $result = $stmt->get_result();
     if($result ){
        while($row = $result->fetch_assoc()){
            ?>
<div class="account-info">
    <div class="account-content">
        <p>admin id : <span><?= $row['id'] ?></span></p>
         <p>user name : <span><?= $row['name'] ?></span></p>
    </div>
    
    <div class="accouny-btn">
        <a href="admin-account.php?admin-id=<?= $row['id']; ?>" class='admin-delete' name='admin-delete' onclick='return confirm("Do you want to delete the account?")'>Delete</a>
      
      <?php
      if( $row['id'] == $admin_id){
        echo '<a href="update-account.php" class="admin-update">update</a>';
      } ?>
   
    </div>

</div>
 <?php
      }
    }else{
        echo '<p class="empty">no accounts available</p>';
      }
    
    ?>

</div>
</section>
















</body>
</html>