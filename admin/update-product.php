<?php

include '../components/config.php';
session_start();
$admin_id =  $_SESSION['admin_id'];

if(isset($_POST['pro_update'])){
    $id = $_POST['p_id'];
    $updat_name = $_POST['updat_name'];
    $updat_name = filter_var($updat_name ,FILTER_SANITIZE_STRING);
    $updat_price =$_POST['updat_price'];
    $updat_price = filter_var($updat_price ,FILTER_SANITIZE_STRING);
    $catogray =$_POST['catogray'];
    $catogray = filter_var($catogray ,FILTER_SANITIZE_STRING);

    $sql ='UPDATE `products` SET  name=? , price =? , catogry=? where id =?';
    $stmt =$conn->prepare($sql);
    $stmt->execute([$updat_name ,$updat_price ,$catogray , $id]);
   $message[] ='product updated!';

  $old_imge =$_POST['old_imge'];
  $new_image = $_FILES['pro_image']['name'];
  $new_image = filter_var($new_image ,FILTER_SANITIZE_STRING);
  $size =$_FILES['pro_image']['size'];
  $tmp =$_FILES['pro_image']['tmp_name'];
  $new_folder = '../uploaded-image/'. $new_image;

  if(!empty($new_image)){
    if($size > 2000000){
        $message [] ='images size is too large!';
    }else{
        $sql = 'UPDATE `products` set image =? where id=?';
        $stmt =$conn->prepare($sql);
        $stmt->execute([$new_image , $id]);
        move_uploaded_file($tmp ,$new_folder);
        unlink('../uploaded-image/'.$old_imge);
        $message[] = 'image updated!';
    }
  }


}




?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/admin-style.css">
    <title>Update Product</title>
</head>
<body>
    <?php
    include '../components/admin-header.php';
    ?>
    <section>
        <div class="upd_pro_container">
        <?php     
        $pro_id=$_GET['pro-id'];   
                  $sql ="SELECT * FROM `products` where id=? ";
                    $stmt=$conn->prepare($sql);
                    $stmt->execute([$pro_id]);
                    $result= $stmt->get_result();
                    if($result->num_rows > 0){
                      while($row = $result->fetch_assoc()){
                            ?>

            <form action="" method='post' enctype="multipart/form-data">
          <input type="hidden" name="p_id" value='<?= $row['id'] ?>'>
          <input type="hidden" name="old_imge" value='<?= $row['image'] ?>'>
            <div class="img-div">
            <img src="../uploaded-image/<?php  echo $row['image'];  ?>" alt="">
            </div>
             
             <span>Update Name</span>
             <input type="text" name="updat_name" class='up_value' value='<?= $row['name'] ?>' id="">
             <span>Update Price</span>
             <input type="text" name="updat_price" class='up_value' value='<?= $row['price'] ?>'  id="">
             <span>Update Catogary</span>
             <select name="catogray" id="" class='up_value'>
             <option selected value="<?= $row['catogry']; ?>"><?= $row['catogry']; ?></option>
             <option value="main dish">main dish</option>
            <option value="fast food">fast food</option>
            <option value="drinks">drinks</option>
            <option value="desserts">desserts</option>
             </select>
             <input type="file" name="pro_image" class='up_value' accept='image/jpg ,image/png , image/jpeg ,image/webp'   id="">
             <div class="prod-modify ">
                <input type="submit"  class='prod-update padding' name='pro_update' value='Update' >
                <a href="admin-products.php"  class='prod-delete padding' >Go Back</a>
       </div>
            </form>
            <?php
                      } 
                    }
                
                
                ?>
        </div>

    </section>
</body>
</html>