<?php

include('db_con.php');

$firstName = $lastName = $email = $phone = $message = '';
$submissionSuccess = false;
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $firstName = $_POST['FirstName'];
  $lastName = $_POST['LastName'];
  $email = $_POST['Email'];
  $phone = $_POST['PhoneNumber'];
  $message = $_POST['Message'];

  $sql = "INSERT INTO contact_us (first_name, last_name, email, phone_number, message) VALUES (?, ?, ?, ?, ?)";

  if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param('sssss', $firstName, $lastName, $email, $phone, $message);

    if ($stmt->execute()) {
      $submissionSuccess = true;
    } else {
      $errorMessage = 'Error while submitting the contact form: ' . $stmt->error;
    }

    $stmt->close();
  } else {
    $errorMessage = 'Error while preparing the contact form submission: ' . $mysqli->error;
  }

  if ($submissionSuccess) {
    // Redirect to index.php after successful form submission
    header('location: index.php');
    exit();
  }

}

$mysqli->close();
?>


<?php
    include_once 'header.php'
?>


<!-- <div class="heading-topic">
    <h1>Contact Us</h1>
</div>
<hr class="t">
<br>

<div class="section">
  <div class="text">
      <p>
        If you have any queries or clarifications on Sri Lanka Post or the services offered by the Department, please feel free to contact us using any of the following methods.
      </p><br>
       <p>
        Contacts : +94 0112328301-3 (Tel) , + 94 011 2440555 (Fax)<br>

        Email : info@slpost.lk / pmg@slpost.lk<br>

        Address :<br>

        Post Master General ,<br>
        Postal Head Quarters ,<br>
        D.R Wijewardena Mawatha ,<br>
        Colombo 10 ,<br>
        001000 ,<br>
        Sri Lanka.<br>
      </p>
  </div>
</div> -->

<div class="contact_us_green">
  <div class="responsive-container-block big-container">
    <div class="responsive-container-block container">
      <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-7 wk-ipadp-10 line" id="i69b-2">
        <form class="form-box" method="POST">
          <div class="container-block form-wrapper">
            <div class="head-text-box">
              <p class="text-blk contactus-head">
                Contact us
              </p>
            </div>
            <div class="responsive-container-block">
              <div class="responsive-cell-block wk-ipadp-6 wk-tab-12 wk-mobile-12 wk-desk-6" id="i10mt-6">
                <p class="text-blk input-title">
                  FIRST NAME
                </p>
                <input class="input" id="ijowk-6" name="FirstName" Required>
              </div>
              <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                <p class="text-blk input-title">
                  LAST NAME
                </p>
                <input class="input" id="indfi-4" name="LastName" Required>
              </div>
              <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                <p class="text-blk input-title">
                  EMAIL
                </p>
                <input class="input" id="ipmgh-6" name="Email" Required>
              </div>
              <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                <p class="text-blk input-title">
                  PHONE NUMBER
                </p>
                <input class="input" id="imgis-5" name="PhoneNumber" Required>
              </div>
                  <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-12 wk-ipadp-12" id="i634i-6">
      <p class="text-blk input-title">
        WHAT DO YOU HAVE IN MIND
      </p>
      <textarea class="textinput" id="i5vyy-6" name="Message" placeholder="Please enter query..." Required></textarea>
    </div>

            </div>
            <div class="btn-wrapper">
              <button class="submit-btn">
                Submit
              </button>
            </div>
          </div>
        </form>

        <?php if ($submissionSuccess) : ?>
          <div class="success-message">
            Form submitted successfully! <!-- You can style this message with CSS -->
          </div>
        <?php endif; ?>

      </div>
      <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-5 wk-ipadp-10" id="ifgi">
        <div class="container-box">
          <div class="text-content">
            <p class="text-blk contactus-head">
              Contact us
            </p>
          </div>
          <div class="workik-contact-bigbox">
            <div class="workik-contact-box">
              <div class="phone text-box">
                <img class="contact-svg" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/ET21.jpg">
                <p class="contact-text">
                +94 0112328301-3 (Tel)<br>
                + 94 011 2440555 (Fax)
                </p>
              </div>
              <div class="address text-box">
                <img class="contact-svg" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/ET22.jpg">
                <p class="contact-text">
                info@slpost.lk <br>
                pmg@slpost.lk
                </p>
              </div>
              <div class="mail text-box">
                <img class="contact-svg" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/ET23.jpg">
                <p class="contact-text">
        Postal Head Quarters ,
        D.R Wijewardena MW ,
        Colombo 10.
                </p>
              </div>
            </div>
            <div class="social-media-links">
            <a href="">
                <img class="social-svg" id="ie9fx" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-fb.svg">
              </a>
              <a href="">
                <img class="social-svg" id="ib9ve" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-insta.svg">
              </a>
              <a href="">
                <img class="social-svg" id="i706n" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-twitter.svg">
              </a>  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
    include_once 'footer.php';

?>

