<?php
include '../components/config.php';
session_start();
$admin_id =  $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:admin-login.php');
}


if(isset($_POST['p_submit'])){
    $p_name =$_POST['p_name'];
    $p_name =filter_var($p_name , FILTER_SANITIZE_STRING);
    $p_price =$_POST['p_price'];
    $p_price =filter_var($p_price , FILTER_SANITIZE_STRING);
    $category =$_POST['category'];
    $category =filter_var($category , FILTER_SANITIZE_STRING);

    $image = $_FILES['p_image']['name'];
    $image = filter_var($image ,FILTER_SANITIZE_STRING);
    $image_size = $_FILES['p_image']['size'];
    $image_tmp = $_FILES['p_image']['tmp_name'];
    $img_folder = "../uploaded-image/" . $image;

    $sql ="SELECT * FROM `products` where name =? ";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param('s',$p_name);
    $stmt->execute();
    $result = $stmt->get_result();
     $row = $result->fetch_assoc();
     if($row > 0){
        $message []='product name is already exists!';
     }else{
        if($image_size > 2000000){
            $message []='image size is too large!';
        }else{
            move_uploaded_file($image_tmp ,$img_folder);
            $sql ="INSERT INTO `products` (name , price ,catogry ,image ) values(?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$p_name,$p_price,$category,$image]);
            $message []='new product added ';
        }
     }

   
}




if(isset($_GET['pro_id'])){
$pro_id = $_GET['pro_id'];

$sql ='SELECT * FROM `products` where id=?';
$stmt=$conn->prepare($sql);
$stmt->bind_param('i', $pro_id);
$stmt->execute();
$result= $stmt->get_result();
if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    unlink('../uploaded-image/' . $row['image']);
    $stmt->close();


    $delete_product = $conn->prepare("DELETE FROM `products` WHERE id = ?");
    $delete_product->bind_param('i', $pro_id);
    $delete_product->execute();
    $delete_product->close();
   header('location:admin-products.php');

}

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../style/admin-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Products</title>
</head>
<body>


    <?php
    include '../components/admin-header.php'?>

    <section id='products-form'>
       <div class="form-container">
        <form action="" method='post' enctype="multipart/form-data">
            <h1>Add Product</h1>
            <input type="text" required placeholder='enter product name ' name='p_name' class='p_input'>
            <input type="number" required placeholder='enter product price ' name='p_price' onkeypress ='if(this.value.length == 10)return false;'  class='p_input'>
         <select name="category"required id="" class='p_input'>
         <option value="" disabled selected>select category --</option>
            <option value="main dish">main dish</option>
            <option value="fast food">fast food</option>
            <option value="drinks">drinks</option>
            <option value="desserts">desserts</option>
         </select>

         <input type="file" required name="p_image" accept='image/jpg ,image/png , image/jpeg ,image/webp'   id="p_image" class='p_input'>
         <input type="submit" value="Add Product" name='p_submit' class='p_submit '>
        </form>
       </div>
    </section>


 <section class="show-section">

   <div class="box-container">
     <form class="product-conatiner" method="POST">
      <?php
       $sql ="SELECT * FROM `products` ";
       $stmt=$conn->prepare($sql);
       $stmt->execute();
       $result = $stmt->get_result();
       if($result->num_rows > 0 ){
        while($row = $result->fetch_assoc()){
            ?>
      
       <div class="box-product">
        <div class="pro-image">
            <img src="../uploaded-image/<?=  $row['image'] ?>" alt="food-foto">
        </div>
        <div class="prod-details">
            <p>$<?= $row['price']?>/-</p>
            <p><?= $row['catogry']?></p>
        </div>
        <span><?= $row['name']?></span>
       <div class="prod-modify">
       <a href="update-product.php?pro-id=<?= $row['id'] ?>" class='prod-update'>Update</a>
        <a href="admin-products.php?pro_id=<?= $row['id'] ?>"  class='prod-delete' onclick='return confirm("Do you want to delete the product?");'>Delete</a>
       </div>
      </div>
      
     
      <?php
        }
    }else{
        '<p>There is no product  </p>';
    }
?>
      

      
    </form>

   </div>
 


</section>


</body>
</html>