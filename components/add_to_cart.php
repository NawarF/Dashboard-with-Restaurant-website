<?php

include 'config.php';

if(isset($_POST['cart-icon'])){

    if($user_id == ""){
        header("location: ./login.php");
    }else{
        $pro_id =$_POST['pro-id'];
        $pro_id = filter_var( $pro_id, FILTER_SANITIZE_STRING);
        $name =$_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $price =$_POST['price'];
        $price = filter_var($price, FILTER_SANITIZE_STRING);
        $image = $_POST['image'];
        $image = filter_var($image, FILTER_SANITIZE_STRING);
        $qty =$_POST['qtn'];
        $qty = filter_var($qty, FILTER_SANITIZE_STRING);

        $stmt=$conn->prepare("SELECT * FROM `cart` where name =? and userid=?");
        $stmt->execute([$name , $user_id]);
        $result = $stmt->get_result();
        if($result->num_rows > 0 ){
            $message []="item already added!";
        }else{
            $stmt= $conn->prepare("INSERT INTO `cart` (userid ,proid ,name ,price ,qtn ,image)
            values (?,?,?,?,?,?)");
            $stmt->execute([$user_id,$pro_id,$name,$price,$qty,$image]);
            $message []="Added successfully!";
        }


    }

}


?>