<?php
if(isset($message)){
    foreach($message as $msg){
    echo "<div class='message'>
    <p>'$msg'</p>
    <i class='fas fa-times' onclick='this.parentElement.remove();'></i>
    </div>";
}}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/all.min.css">
</head>
<body>
    
    <!-- start Header section  -->
<header class="main-head">
<div class="flex">
        <div class="logo">
            <a href="home.php">Yum-Yum 😋</a>
        </div>

        <ul class="user-menu">
            <li><a href="home.php">home</a></li>
            <li><a href="./about.php">about</a></li>
            <li><a href="./menu.php">menu</a></li>
            <li><a href="./orders.php">order</a></li>
            <li><a href="./contact.php">contact</a></li>
        </ul>

        <div class="user-icon">
            <a href="./search.php"><i class="fas fa-search"></i></a>
            <?php
            $sql = "SELECT * FROM `cart` where userid=?";
            $stmt =$conn->prepare($sql);
            $stmt->execute([$user_id]);
            $result=$stmt->get_result();
            $row_count = $result->num_rows;
            
            ?>
            <a href="./cart.php"><i class="fas fa-shopping-cart"></i> <span>(<?= $row_count ?>)</span></a>
            <div id="user-btn" class="fas fa-user"></div>
            <div id="menu-btn" class="fas fa-bars"></div>

        </div>

            <div class="user-profile">
                <?php
                 $sql ="SELECT * FROM `users` where id =?";
                 $stmt =$conn->prepare($sql);
                 $stmt->execute([$user_id]);
                 $result =$stmt->get_result();
                 $row = $result->fetch_assoc();
                 if($result->num_rows  > 0){
                    ?>
                    <p class='user-name'><?= $row['name']  ?></p>
                    <div class="user-link">
                        <a href="./profile.php">profile</a>
                        <a href="./user_logout.php">logout</a>
                    </div>
                   <p class='user-account'>
                    <a href="./login.php">login</a> or
                    <a href="./register.php">register</a>
                   </p>
                    <?php
                 }else{
                    echo '<p>please login first!</p>';
                    echo '<a href ="./login.php" class="user_login">login</a>';
                 } ?>
                
            </div>

</div>

</header>

<script src="../js/main.js"></script>
</body>
</html>
<!-- End Header Section -->
