<?php


if (isset($_GET['message'])) {
    // Retrieve and display the message
    $message = urldecode($_GET['message']);
   // $this->session->flashdata($message);
    echo '<div id="messageDiv">' . htmlspecialchars($message) . '</div>';
} else {
    // Handle the case when the message parameter is not present
   // echo "<p>No message to display.</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
       #messageDiv {
  /* position: fixed; */
  top: 0;
  left: 0;
  height: 40px;
  line-height: 40px;
  width: 100%;
  background: #1ABC9C;
  text-align: center;
  color: #FFFFFF;
  font-family: sans-serif;
  font-weight: lighter;
  font-size: 17px;
  padding: 0;
  margin: 0;
}

.row.content{
    height: 500px; 

}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
 
    </style>
</head>
<body>
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <ul class="nav nav-pills nav-stacked">
     
        <br>
        <li class="active" style="magin-top:10px"><a href="adminDashboard.php">Dashboard</a></li>
        <li><a href="adminTelimail.php">Telemails</a></li>
        <li><a href="adminMoneyOrder.php">Money Orders</a></li>
        <li><a href="">Banking</a></li>
        <li><a href="adminFeedback.php">Customer Feedbacks</a></li>
      </ul><br>
      <a href="adminLogout.php"> <img src="Images\logout.png" width="30" height="25" alt="" style=" position: absolute;
    bottom:0 ; margin:20px;  float:right"></a>
    </div>
    <br>
    
    <div class="col-sm-9">
      <div class="well">
        <h4>Admin Dashboard</h4>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h4>Telemail Users</h4>
            <h5>23456</h5> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Money Order Users</h4>
            <h5>11258</h5> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Total Telemail</h4>
            <h5>43742</h5> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Total Money Order</h4>
            <h5>23456</h5> 
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="well">
          <a href="#"><img src="Images\g1.png" width="210" height="210" alt=""></a>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
          <a href="#"><img src="Images\g3.png" width="210" height="210" alt=""></a>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
          <a href="#"><img src="Images\g2.png" width="210" height="210" alt=""></a>
          </div>
        </div>
      </div>
      <div class="row">
       
    
      </div>
    </div>
  </div>
</div>
<script>
        // Automatically remove the message after 2 seconds
        setTimeout(function() {
            var messageDiv = document.getElementById('messageDiv');
            if (messageDiv) {
                messageDiv.style.display = 'none';
            }
        }, 3000); // 2000 milliseconds (2 seconds)
    </script>  
</body>
</html>