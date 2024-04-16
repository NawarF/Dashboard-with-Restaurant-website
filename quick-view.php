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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <title>Quick View</title>
</head>
<body>

<?php
include "./components/user-header.php";
?>

<section class="quick-view">
<h2 class="title">Quick View</h2>
    <div class="view-container">
        <?php
        $id = $_GET['id'];
        $sql ="SELECT * FROM `products` WHERE id = ?";
        $stmt =$conn->prepare($sql);
        $stmt->execute([$id]);
        $reuslt =$stmt->get_result();
        if($reuslt->num_rows > 0){
            while($row = $reuslt->fetch_assoc()){
        ?>
        <FROM method="post"  class="box">
        <input type="hidden" name="pid" value="<?= $row['id']; ?>">
        <input type="hidden" name="name" value="<?= $row['name']; ?>">
      <input type="hidden" name="price" value="<?= $row['price']; ?>">
      <input type="hidden" name="image" value="<?= $row['image']; ?>">
         <div class="img">
            <img src="./uploaded-image/<?= $row['image'] ?>" alt="">
         </div>

         <p class="cat"><?= $row['catogry'] ?></p>
         <p class="name"><?= $row['name'] ?></p>

         <div class="view-content">
         <h5><span>$</span><?= $row['price'] ?></h5>
         <input type="number" min="1" name="qtn" value ="1" id="">
         </div>
         
         <button type="submit" name="add-to-cart" class="add-to-cart">Add To Cart</button>
            </form>
    </div>
<?php
   }
}
?>
</section>


<script src='./js/main.js' ></script>
</body>
</html>