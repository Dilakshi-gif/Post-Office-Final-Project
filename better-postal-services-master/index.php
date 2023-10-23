<?php
// Start a session to check for user authentication
session_start();

// Check if the user is logged in (has an active session)
if (isset($_SESSION['id'])) {
    $user_name = $_SESSION['name'];
    $logout_button = '<a href="logout.php" class="btn btn-danger mx-1">Logout</a>';
} else {
    // User is not logged in
    $user_name = ''; // Set to empty if no user is logged in
    // Display sign-in and register buttons
    $login_register_buttons = '
        <button class="btn btn-primary mx-1">Sign in</button>
        <button class="btn btn-primary mx-1">Register</button>
    ';
}
?>

<?php
    include_once 'header.php'
?>

<!--slider images start-->

 <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active c-item">
      <img src="Images\thumb.png" class="d-block w-100 c-img" alt="">
      <!--<div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>-->
    </div>
    <div class="carousel-item c-item">
      <img src="Images\pic.png" class="d-block w-100 c-img" alt="">
      <!--<div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>-->
    </div>
    <div class="carousel-item c-item">
      <img src="Images\telemail.png" class="d-block w-100 c-img" alt="">
      <!--<div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>-->
    </div>
    <div class="carousel-item c-item">
      <img src="Images\thumb2.jpg" class="d-block w-100 c-img" alt="">
      <!--<div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>-->
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
  <br>
  <marquee><pre>Notice : Acceptance of surface articles to Canada has been suspended  | Regulation made under section 45 of the post office ordiance All types of money Orders issued with effect from 2023 | Acceptance of airmail articles to Belarus has been temporarily suspended</pre></marquee>

</div>
<!--about section end-->

<!-- services section start-->
<section>
  <h3>Our Services</h3>
  <p class="section-lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
  <div class="services-grid">
    <div class="service service1">
    <a href="telemail.php"><img src="images/icon-1.png" alt=""></a>
      <a href="telemail.php"><h4>Telemail Services</h4></a>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <a href="telemail.php" class="cta">Read More <span class="ti-angle-right"></a>
    </div>
 
    <div class="service service2">
    <a href="moneyOrder.php"><img src="images/icon-3.png" alt=""></a>
    <a href="moneyOrder.php"> <h4>Money Order</h4></a>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <a href="moneyOrder.php" class="cta">Read More <span class="ti-angle-right"></a>
    </div>

    <div class="service service3">
    <a href="bank.php"><img src="images/icon-4.png" alt=""></a>
    <a href="bank.php"><h4>Banking</h4></a>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <a href="bank.php" class="cta">Read more <span class="ti-angle-right"></span></a>
    </div>
  </div>
</section>
<!-- <section class="sevices">
    <h1 class="heading-title">Our services</h1>
    <div class="box-container">
        <div class="box">
          <div class="link">
            <a href="telemail.php"><img src="images/icon-1.png" alt=""></a>
            <a href="telemail.php"><h3>Telemail Services</h3></a>
          </div>
        </div>

        <div class="box">
          <div class="link">
            <a href="moneyOrder.php"><img src="images/icon-3.png" alt=""></a>
            <a href="moneyOrder.php"><h3>Money Order</h3></a>
          </div>
        </div>

        <div class="box">
          <div class="link">
            <a href="bank.php"><img src="images/icon-4.png" alt=""></a>
            <a href="bank.php"><h3>Banking</h3></a>
          </div>
        </div>
    </div>
</section> -->
<!--services section start -->

<?php
    include_once 'footer.php';

?>
