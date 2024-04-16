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
    <title>About</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/all.min.css">
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
  />
</head>
<body>
    

    <!-- start Header section 1 -->
    <?php
include './components/user-header.php';
?>

<!-- End Header Section 1 -->


<!-- start section 2 about us -->
 <section class="about-us">
    <h2>About us</h2>
    <p>
        <a href="home.php">home</a>
         <span>/</span>
         <a href="about.php">about</a></p>

 </section>

 <!-- End section 2 about us -->


 <!-- start section heading 3 -->

<section class="heading">
    <div class="heading-container">
        <div class="heading-img">
            <img src="images/about-img.svg" alt="">
        </div>

        <div class="heading-content">
            <h3>why choose us ?</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam cum consectetur, hic beatae earum pariatur necessitatibus dolores ex cumque magnam?</p>
            
             <a href="menu.php" class="btn">our menu</a>
        
        </div>
    </div>
</section>




 <!-- End section heading 3 -->

 <!-- start section steps 4 -->
<section class="steps">
    <h2 class="title">simple steps</h2>

<div class="steps-container">
    <div class="steps-box">
        <img src="images/step-1.png" alt="">
        <h3>Choose Order</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. </p>
    </div>


    <div class="steps-box">
        <img src="images/step-2.png" alt="">
        <h3>Fast Delivery</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. </p>
    </div>

    <div class="steps-box">
        <img src="images/step-3.png" alt="">
        <h3>Enjoy Food</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
    </div>



</div>

</section>

 <!-- end section steps 4 -->

<!-- start section review 5 -->

<section class="about-review">
    <h2 class="title">customer's reviews</h2>

    <div class=" swiper review-swipe">
    
        <div class="swiper-wrapper w ">
              

            <div class="swiper-slide  review-slide">
               <div class="review-img">
                <img src="images/pic-1.png" alt="">
               </div>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque nihil temporibus nisi harum molestias beatae. Voluptates vel odio cum consectetur.</p>
               <div class="reniew-icons">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
               </div>
               <h3>Nawar Fayad</h3>
            </div>


 
            <div class="swiper-slide  review-slide">
               <div class="review-img">
                <img src="images/pic-2.png" alt="">
               </div>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque nihil temporibus nisi harum molestias beatae. Voluptates vel odio cum consectetur.</p>
               <div class="reniew-icons">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
               </div>
               <h3>Nawar Fayad</h3>
            </div>



             
            <div class="swiper-slide  review-slide">
                <div class="review-img">
                 <img src="images/pic-3.png" alt="">
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque nihil temporibus nisi harum molestias beatae. Voluptates vel odio cum consectetur.</p>
                <div class="reniew-icons">
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Nawar Fayad</h3>
             </div>




              
            <div class=" swiper-slide review-slide">
                <div class="review-img">
                 <img src="images/pic-4.png" alt="">
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque nihil temporibus nisi harum molestias beatae. Voluptates vel odio cum consectetur.</p>
                <div class="reniew-icons">
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Nawar Fayad</h3>
             </div>




              
            <div class=" swiper-slide review-slide">
                <div class="review-img">
                 <img src="images/pic-5.png" alt="">
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque nihil temporibus nisi harum molestias beatae. Voluptates vel odio cum consectetur.</p>
                <div class="reniew-icons">
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Nawar Fayad</h3>
             </div>




              
            <div class="swiper-slide review-slide">
                <div class="review-img">
                 <img src="images/pic-6.png" alt="">
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque nihil temporibus nisi harum molestias beatae. Voluptates vel odio cum consectetur.</p>
                <div class="reniew-icons">
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Nawar Fayad</h3>
             </div>






             <div class=" swiper-slide  review-slide">
                <div class="review-img">
                 <img src="images/pic-1.png" alt="">
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque nihil temporibus nisi harum molestias beatae. Voluptates vel odio cum consectetur.</p>
                <div class="reniew-icons">
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star"></i>
                 <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Nawar Fayad</h3>
             </div>

         

        </div>
        <div class="swiper-pagination"></div>
    </div>

   

</section>

<!-- end section review 5 -->






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



<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <script src="js/main.js"></script>
    <script>
        var swiper = new Swiper(".review-swipe", {
           spaceBetween:50,
         grabCursor: true,
         pagination: {
                 el: ".swiper-pagination",
                 clickable:true
               },

        breakpoints: {
          640: {
            slidesPerView: 1,
           
          },
          768: {
            slidesPerView: 2,
            
          },
          1024: {
            slidesPerView: 3,
            
          },
        },
             });
           </script>

</body>
</html>