<?php
include './components/config.php';

session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
 }else{
    $user_id = '';
 };

 include './components/add_to_cart.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
</head>
    <title>Category</title>
</head>
<body>

<?php
include './components/user-header.php';
?>

<section class="dishes">
<h2 class="title">Food Category</h2>
<div class="dishes-container">

<?php
if(isset($_GET['food-gategory'])){
    $gategroy =$_GET['food-gategory'];
    $sql ="SELECT * FROM `products` where catogry = ?";
    $stmt =$conn->prepare($sql);
    $stmt->execute([$gategroy]);
    $result =$stmt->get_result();
    if($result->num_rows > 0){
        while($row =$result->fetch_assoc()){
?>
<div class="dishes-box">


   <form action="" method ="POST">
    <input type="hidden" value=<?= $row['id']  ?> name="pro-id">
    <input type="hidden" value=<?= $row['name']  ?> name="name">
    <input type="hidden" value=<?= $row['price']  ?> name="price">
    <input type="hidden" value=<?= $row['image']  ?> name="image">
    <div class="dishes-icons">
        <a href="quick-view.php?id=<?= $row['id'] ?>"  class="fas fa-eye"></a>
       <button type="submit" class="fas fa-shopping-cart" name='cart-icon'></button>
    </div>

    <div class="dishes-img">
        <img src="./uploaded-image/<?= $row['image'] ?>" name='image' alt="">
    </div>

    <div class="dishes-content">
    <a href="catogery.php" class="dishes-option"><?= $row['catogry'] ?></a>
    <h4><?= $row['name'] ?></h4>
      </div>

<div class="count">
    <p><span>$ </span><?= $row['price']?></p>
    <input type="number" class="num"
     min="1" max="99" value="1" name='qtn'
     onkeypress="if(this.value.length == 2) return false;">
</div> 
   </form>
   </div>
<?php
    }
}}
?>

</section>
    
</body>
</html>