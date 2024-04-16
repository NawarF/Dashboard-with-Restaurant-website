<?php

session_start();
$admin_id =  $_SESSION['admin_id'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/admin-style.css">
    <title>Order</title>
</head>
<body>
    
<?php
include '../components/admin-header.php';
?>


<section id='admin-order'>
<div class="title">
    <h1>Placed Orders</h1>
    </div>

     <div class="order-container">
        
     <div class="order-box">
            <p>uesr id : <span>1</span></p>
            <p>placed on : <span>1</span></p>
            <p>name : <span>1</span></p>
            <p>email : <span>1</span></p>
            <p>number : <span>1</span></p>
            <p>address : <span>1</span></p>
            <p>total products: <span>1</span></p>
            <p>total price : <span>1</span></p>
            <p>payment method :  <span>1</span></p>
            <select name="orderstatus" id="" class='orderstatus'>
                <option value="completed">completed</option>
                <option value="pending">pending</option>
            </select>
            <div class="order-btn">
                <input type="submit" value="Update" name='order-update' class='order-update'>
                <input type="submit" value="delete" name='order-delet' class='order-delet'>
            </div>
        </div>


        <div class="order-box">
            <p>uesr id : <span>1</span></p>
            <p>placed on : <span>1</span></p>
            <p>name : <span>1</span></p>
            <p>email : <span>1</span></p>
            <p>number : <span>1</span></p>
            <p>address : <span>1</span></p>
            <p>total products: <span>1</span></p>
            <p>total price : <span>1</span></p>
            <p>payment method :  <span>1</span></p>
            <select name="orderstatus" id="" class='orderstatus'>
                <option value="completed">completed</option>
                <option value="pending">pending</option>
            </select>
            <div class="order-btn">
                <input type="submit" value="Update" name='order-update' class='order-update'>
                <input type="submit" value="delete" name='order-delet' class='order-delet'>
            </div>
        </div>



        
      

        
       

     </div>

</section>

</body>
</html>