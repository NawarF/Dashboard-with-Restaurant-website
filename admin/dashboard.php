<?php
include '../components/config.php';

session_start();
$admin_id =  $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:admin-login.php');
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
    <title>dashboard</title>
</head>
<body>
    <?php
include '../components/admin-header.php';
?>

<section id='sec-dashboard'>
    <div class="title">
        <h1>Dashboard</h1>
    </div>
    <div class="dasch-container">
        <div class="dash-box">
            <h3>Welcome!</h3>
            <p><?=  $row['name']  ?></p>
            <a href="update-account.php">Update Profile</a>
        </div>
        <div class="dash-box">
            <h3>$10/</h3>
            <p>total pendings</p>
            <a href="admin-order.php">See rorder</a>
        </div>
        <div class="dash-box">
            <h3>$0/</h3>
            <p>total completes</p>
            <a href="admin-order.php">See rorder</a>
        </div>
        <div class="dash-box">
            <h3>$30/</h3>
            <p>total orders</p>
            <a href="admin-order.php">See rorder</a>
        </div>


        <div class="dash-box">
            <?php
            $sql="SELECT * FROM `products`";
            $stmt=$conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
             $row_count  =  $result->num_rows;
             if($row_count == 0){
                $msg ='there are no products!';
             }else{
                $msg ='products added';
             }
            ?>
            <h3><?=  $row_count ?></h3>
            <p><?= $msg ?></p>
            <a href="admin-products.php">See Products</a>
        </div>


        <div class="dash-box">
            <?php
             $sql="SELECT * FROM `users`";
             $stmt=$conn->prepare($sql);
             $stmt->execute();
             $result = $stmt->get_result();
              $row_count  =  $result->num_rows;
              if($row_count == 0){
                 $msg ='there is no account!';
              }else{
                 $msg ='user accounts';
              }
            ?>
            <h3><?=$row_count?></h3>
            <p><?=$msg?></p>
            <a href="users-account.php">See Users</a>
        </div>

        <?php
         $sql="SELECT * FROM `admin`";
         $stmt=$conn->prepare($sql);
         $stmt->execute();
         $result = $stmt->get_result();
          $row_count  =  $result->num_rows;
          if($row_count == 0){
             $msg ='there are no account!';
          }else{
             $msg ='Admins';
          }
        
        ?>
        <div class="dash-box">
            <h3><?= $row_count ?></h3>
            <p><?=$msg ?></p>
            <a href="admin-account.php">See Admins</a>
        </div>

        <div class="dash-box">
            <?php
        $sql="SELECT * FROM `message`";
         $stmt=$conn->prepare($sql);
         $stmt->execute();
         $result = $stmt->get_result();
          $row_count  =  $result->num_rows;
          if($row_count == 0){
             $msg ='there are no message!';
          }else{
             $msg ='new Message';
          }
?>
            <h3><?= $row_count ?></h3>
            <p><?= $msg ?></p>
            <a href="admin-message.php">See Messages</a>
        </div>
    </div>
</section>




</body>
</html>