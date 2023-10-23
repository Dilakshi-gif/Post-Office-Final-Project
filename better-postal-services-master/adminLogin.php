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
    <title>Document</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@600&display=swap");
body {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background:#e8f5e1;
  font-family: sans-serif;
}

.center {
  position: relative;
  padding: 50px 50px;
  background: #fff;
  border-radius: 10px;
}
.center h1 {
  font-size: 2em;
  border-left: 5px solid dodgerblue;
  padding: 10px;
  color: #000;
  letter-spacing: 5px;
  margin-bottom: 60px;
  font-weight: bold;
  padding-left: 10px;
}
.center .inputbox {
  position: relative;
  width: 300px;
  height: 50px;
  margin-bottom: 50px;
}
.center .inputbox input {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  border: 2px solid #000;
  outline: none;
  background: none;
  padding: 10px;
  border-radius: 10px;
  font-size: 1.2em;
}
.center .inputbox:last-child {
  margin-bottom: 0;
}
.center .inputbox span {
  position: absolute;
  top: 14px;
  left: 20px;
  font-size: 1em;
  transition: 0.6s;
  font-family: sans-serif;
}
.center .inputbox input:focus ~ span,
.center .inputbox input:valid ~ span {
  transform: translateX(-13px) translateY(-35px);
  font-size: 1em;
}
.center .inputbox [type="submit"] {
  width: 50%;
  background: dodgerblue;
  color: #fff;
  border: #fff;
}
.center .inputbox:hover [type="submit"] {
  background: linear-gradient(45deg, greenyellow, dodgerblue);
}
#messageDiv {
  position: fixed;
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

    </style>
</head>
<body>
<div class="center">
  <h1>ADMIN LOGIN</h1>
  <form action="processLogin.php" method="post">
    <div class="inputbox">
      <input type="text" id="username" name="username">
      <span>Username</span>
    </div>
    <div class="inputbox">
      <input type="password" id="password" name="password">
      <span>Password</span>
    </div>
    <div class="inputbox btn">
      <input type="submit" value="LOGIN">
    </div>
  </form>
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