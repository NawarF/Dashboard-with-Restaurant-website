<?php
include './components/config.php';

session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
 }else{
    $user_id = '';
 };



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/all.min.css">
</head>
<body>
    

    <!-- start Header section  -->
    <?php
include './components/user-header.php';
?>

<!-- End Header Section -->



<!-- start section 2 search form -->
<section class="search">
    <div class="search-container">
         
        <form action="" method="post" class="search-form">
        <input type="text" name="search-item" id="" class="form-inp" placeholder="search here ....">
        <button type="submit" name ="btn" class="search-btn" ><i class="fas fa-search"></i></button>

    </form>
    </div>
</section>

<!-- End section 2 search form -->

<!-- start section 3 Product section -->

<section class="dishes">

<div class="dishes-container">
<?php
if(isset($_POST['search-item']) && isset($_POST['btn'] )){
 $item = $_POST['search-item'];
 $sql ="SELECT * FROM `products` where name like '%{$item}%' ";
 $stmt =$conn->prepare($sql);
 $stmt->execute();
 $result=$stmt->get_result();
 if($result->num_rows > 0){
    while($row =$result->fetch_assoc()){

?>

<div class="dishes-box">


   <form action="" method ="POST">
    <input type="hidden" value=<?= $row['id']  ?> name="pro-id">
    <div class="dishes-icons">
        <a href="quick-view.php?id=<?= $row['id'] ?>"  class="fas fa-eye"></a>
       <button type="submit" class="fas fa-shopping-cart" name='cart-icon'></button>
    </div>

    <div class="dishes-img">
        <img src="./uploaded-image/<?= $row['image'] ?>" alt="">
    </div>

    <div class="dishes-content">
    <a href="category.php?food-gategory=<?= $row['catogry']  ?>" class="dishes-option"><?= $row['catogry'] ?></a>
    <h4><?= $row['name'] ?></h4>
      </div>

<div class="count">
    <p><span>$ </span><?= $row['price']?></p>
    <input type="number" class="num"
     min="1" max="99" value="1"
     onkeypress="if(this.value.length == 2) return false;">
</div> 
   </form>
   </div>
<?php
    }}else{
        echo "<p> there is no items </p>";
    }
}
?>


</section>










<!-- End section 3 Product section  -->













<!-- start section loader -->

<div class="loader">
    <img src="images/loader.gif" alt="">
</div>

<!-- End section loader -->










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