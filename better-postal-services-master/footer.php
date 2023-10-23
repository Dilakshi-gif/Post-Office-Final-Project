<!--footer section strat -->

<!-- <footer class="bg-dark text-white pt-5 pb-4 fixed-bottom">
  <div class="container text-center text-md-left">
    <div class="row text-center text-md-left">
      <div class="col-md-6 col-lg-3 col-xl-3 mx-auto mt-3">
        <p>No. 310, D.R.Wijewardena Mawatha,Colombo 01000,Sri Lanka</p>
        <p>Telephone: +94-112328301-3</p>
        <p>Email: in@slpost.lk</p>
      </div>
      <div class="col-md-6 col-lg-2 col-xl-2 mx-auto mt-3">
        <p>Design Developed By: NIBM Students</p>
        <p>2023.01.05</p>
      </div>

      <hr class="mb-4">

      <div class="row align-items-center">
        <div class="col-md-7 col-lg-8">
          <p> Copyright @ rights reseved by:
            <a href="#" style="text-decoration: none;"> 
              <strong class="text-warning">NIBM STUDENTS</strong>
            </a>
          </p>
        </div>
      </div>



    </div>
  </div>
</footer> -->

<!-- Footer -->
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .open-button {
  

  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
    }

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
  </style>
</head>
<body>
  
</body>
</html>

<footer class="text-center text-lg-start bg-light text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
   <a href="#"><img src="Images\facebook.png" width="25" height="25" alt=""></a>&nbsp;
   <a href="#"><img src="Images\instagram.png" width="25" height="25" alt=""></a>&nbsp;
   <a href="#"><img src="Images\youtube.png" width="25" height="25" alt=""></a>&nbsp;
   <a href="#"><img src="Images\whatsapp.png" width="25" height="25" alt=""></a>



    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Company name
          </h6>
          <p>No. 310, D.R.Wijewardena Mawatha,Colombo 01000,Sri Lanka</p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
          Services
          </h6>
          <p>
            <a href="telemail.php" class="text-reset">Telemails</a>
          </p>
          <p>
            <a href="moneyOrder.php" class="text-reset">Money Order</a>
          </p>
          <p>
            <a href="bank.php" class="text-reset">Banking</a>
          </p>
          <p>
            <a href="MyProfile.php" class="text-reset">My Profile</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
           Links
          </h6>
          <p>
            <a href="index.php" class="text-reset">Home</a>
          </p>
          <p>
            <a href="about.php" class="text-reset">About</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Services</a>
          </p>
          <p>
            <a href="contact.php" class="text-reset">Contact</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p>Telephone: +94-112328301-3</p>
        <p>Email: in@slpost.lk</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2023 Copyright: NIBM STUDENTS
    <lable class="open-button" onclick="openForm()"><img src="Images\chat.png" width="35" height="35" alt=""></lable>

<div class="chat-popup" id="myForm">
  <form class="form-container">
    <h1>Chat</h1>

    <label for="msg"><b>Message</b></label>
    <textarea placeholder="Type message.." name="msg" required></textarea>

    <button type="desable" class="btn">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->


<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
  </body>
</html>