<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}


require('DBconnection.php');



// fetch user data if needed
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>University Library System | Booking a Library Station</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- bootstrap cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="/css/style.css">

</head>
<body>
   
<!-- header section starts  -->

<header class="header fixed-top">

   <div class="container">

      <div class="row align-items-center justify-content-between">

         <a href="#home" class="logo">
            <img src="/images/UNIME LOGO.png" alt="University of Messina Logo" width="360" height="130">
        </a>
        



         <nav class="nav">
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#services">services</a>
            <a href="profile.php">profile</a>
            <a href=bookings.php>bookings</a>
            <a href="logout.php">logout</a>
            
            
            
         </nav>

         <a href="#reserve" class="link-btn">Reserve Your Seat</a>

         <div id="menu-btn" class="fas fa-bars-staggered"></div>

      </div>

   </div>

   </header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">
   <div class="container">
      <div class="row min-vh-100 align-items-center">
         <div class="content text-center text-md-left">
            <h3>Online Booking System for Libraries</h3>
            <p>Reserve a seat in the library for a quiet, focused space to enhance your study sessions and productivity.</p>
         </div>
      </div>
   </div>
</section>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">
   <div class="container">
      <div class="row align-items-center">
         
         <!-- Content Section -->
         <div class="col-md-6 content">
            <span>About the Unime</span>
            <h3>Tradition and change at the heart of the Mediterranean</h3>
      
            <p>
               The University of Messina has always been characterized by the quality of its research, teaching, and international vocation.
               Founded in 1548 by Pope Paul III, it has been a hub for cultural exchanges since its inception. 
               In 1678, it was temporarily closed due to the anti-Spanish revolt. Notable figures such as Giovanni Alfonso Borelli, Pietro Castelli, and Marcello Malpighi taught there.
               The University was refounded in 1838 by King Ferdinand II, and despite the anti-Bourbon revolt in 1847, it continued to flourish with intellectuals like Pietro Bonfante and Giovanni Pascoli.
               The 1908 earthquake devastated the University’s facilities, but it began to rebuild with the reopening of the Faculty of Law in 1909, followed by other faculties in subsequent years. 
               After the Second World War, under the guidance of Rectors like Gaetano Martino and Salvatore Pugliatti, the University regained its strength and vibrancy.
            </p>
         </div>
      </div>
   </div>
</section>

<!-- about section ends -->

<!-- services section starts  -->

<section class="services" id="services">

   <h1 class="heading">services</h1>

   <div class="box-container container">

      <div class="box">
         <img src="/images/books.png" alt="">
         <h3>Access to Resources</h3>
         <p>Our library offers access to a vast physical collection of academic books, journals, and periodicals, alongside an extensive digital library featuring e-books, research databases, and multimedia materials. Additionally, we provide access to special collections, including rare manuscripts, archives, and historical documents.</p>
      </div>

      <div class="box">
         <img src="/images/internet.png" alt="">
         <h3>Free Internet</h3>
         <p>Our library provides 24-hour free and reliable internet access, ensuring that students and staff can seamlessly connect to online resources, conduct research, and stay productive at any time of the day.</p>
      </div>

      <div class="box">
         <img src="/images/24-hours.png" alt="">
         <h3>Library Open 24/7</h3>
         <p>The library offers 24-hour access, ensuring that students and faculty can make use of its resources, study areas, and quiet spaces at any time. Whether it's for late-night research, group study sessions, or peaceful reading, our library is always open to meet your academic needs.</p>
      </div>

      <div class="box">
         <img src="/images/canteen.png" alt="">
         <h3>Campus Canteen</h3>
         <p>Our campus canteen is open throughout the day, offering a variety of meals and snacks for students to recharge between study sessions. Whether you're craving a quick bite or a relaxing coffee break, you can enjoy delicious food and drinks in a comfortable setting. It’s the perfect spot to unwind, socialize with friends, or take a well-deserved break.</p>
      </div>

      <div class="box">
         <img src="/images/policeman.png" alt="">
         <h3>Safety and Security</h3>
         <p>For the safety and security of all visitors and their belongings, our library and campus are equipped with professional security staff and surveillance cameras. This ensures a safe and protected environment for students, faculty, and all who visit, so you can focus on your work with peace of mind.</p>
      </div>

      <div class="box">
         <img src="/images/relaxation.png" alt="">
         <h3>Relaxation Zones</h3>
         <p>The library offers dedicated spaces for relaxation, designed to give you a peaceful break between study sessions. Equipped with comfortable sofas and a cozy vibe, these areas provide the perfect environment to unwind and recharge.</p>
      </div>

   </div>

</section>

<!-- services section ends -->

<!-- Information section starts -->

<section class="Information">

   <h1 class="heading">Information</h1>

   <div class="box-container container">

      <div class="box">
         <img src="/images/shh.png" alt="">
         <h3>Silence Policy</h3>
         <p>To maintain a productive environment, silence is expected in all study areas. Please use designated discussion rooms for group work or conversations.</p>
      </div>

      <div class="box">
         <img src="/images/borrow.png" alt="">
         <h3>Borrowing Rules</h3>
         <p>Borrow books and materials for a specified period. Ensure timely returns or renewals to avoid late fines.</p>
      </div>

      <div class="box">
         <img src="/images/food and drink.png" alt="">
         <h3>Food and Drink Policy</h3>
         <p>Only bottled water is permitted in study areas. All other food and drinks should be consumed in the designated canteen or relaxation zones.</p>
      </div>

   </div>

</section>



<!-- Information section starts  -->

<!-- section starts  -->

<section class="reserve" id="reserve">
   <div class="row">
      <form action="book_reservation.php" method="POST">
         <h3 class="heading">Make Reservation</h3>
         <input type="text" name="name" placeholder="Your Name" class="box" required>
         <input type="text" name="phone" placeholder="Your Number" class="box" required>
         <input type="email" name="email" placeholder="Your Email" class="box" required>
         <input type="date" name="reservation_date" class="box" required>
         <input type="time" name="reservation_time" class="box" required>
         <input type="submit" name="book_reservation" value="Reserve Now" class="btn">
      </form>
   </div>
</section>


<!-- section ends -->


<!-- footer section starts  -->

<section class="footer">

   <div class="box-container container">

      <div class="box">
         <i class="fas fa-phone"></i>
         <h3>phone number</h3>
         <p>+398158488</p>
   
      </div>
      
      <div class="box">
         <i class="fas fa-map-marker-alt"></i>
         <h3>address</h3>
         <p>Piazza Pugliatti, 1 - 98122 Messina  </p>
      </div>

      <div class="box">
         <i class="fas fa-clock"></i>
         <h3>opening hours</h3>
         <p>24 hours</p>
      </div>

      <div class="box">
         <i class="fas fa-envelope"></i>
         <h3>email address</h3>
         <p>welcomepoint@unime.it</p>
         
      </div>

   </div>

   <div class="social-logo">
      <img src="/images/UNIME final part.png" width="360" height="250" alt="University of Messina Logo">
      <div class="social-links">
         <!-- Instagram Link -->
         <a href="https://www.instagram.com/unime.it/?hl=it" title="Instagram" target="_blank" rel="noopener noreferrer">
            <img src="/images/instagram.png" alt="Instagram Icon" width="35" height="35"> Instagram
         </a>
   
         <!-- YouTube Link -->
         <a href="https://www.youtube.com/channel/UC0-ACMYaIsA4GX_uMEm1TmA" title="YouTube" target="_blank" rel="noopener noreferrer">
            <img src="/images/youtube.png" alt="YouTube Icon" width="35" height="35"> YouTube

         </a>
      </div>
   </div>
   
</section>

<!-- footer section ends -->








<!-- sweetalert cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>



</body>
</html>