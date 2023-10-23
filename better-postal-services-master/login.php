<?php
include('db_con.php');

// Initialize variables to store user input and error messages
$email = $password = $name = '';
$email_error = $password_error = '';

// Process the login form when it's submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate email
    if (empty(trim($_POST['email']))) {
        $email_error = 'Please enter your email.';
    } else {
        $email = trim($_POST['email']);
    }

    // Validate password
    if (empty(trim($_POST['password']))) {
        $password_error = 'Please enter your password.';
    } else {
        $password = trim($_POST['password']);
    }

    // If there are no validation errors, check the user's credentials
    if (empty($email_error) && empty($password_error)) {
        $sql = 'SELECT id, email, password, role, name FROM auth WHERE email = ?';

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param('s', $email);
            if ($stmt->execute()) {
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $stmt->bind_result($id, $email, $hashed_password, $role, $name);
                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION['id'] = $id;
                            $_SESSION['email'] = $email;
                            $_SESSION['role'] = $role;
                            $_SESSION['name'] = $name;

                            // Redirect based on the user's role
                            if ($role != 3) {
                                header('location: admin/dashboard.php');
                            } else {
                                header('location: ./');
                            }
                        } else {
                            // Password is not valid
                            $password_error = 'The password you entered is incorrect.';
                        }
                    }
                } else {
                    // No user found with the given email
                    $email_error = 'No account found with that email.';
                }
            } else {
                echo 'Something went wrong. Please try again later.';
            }
            $stmt->close();
        }
    }

    // Close the database connection
    $mysqli->close();
}
?>

<?php
    include_once 'header.php'

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

.btna{
    background:#27ae60;
   
    color:#fff;
    padding:20px 70px;
    font-size:24px;
    position:relative;
    outline:none;
    cursor:pointer;
    min-width:300px;
    -webkit-border-radius:3px;
    -moz-border-radius
    border-radius:3px;
    -webkit-transition:background 0.2s ease-in-out;
    -moz-transition:background 0.2s ease-in-out;
    transition:background 0.2s ease-in-out;
    -webkit-box-shadow:0 2px 2px rgba(0,0,0,0.1);
    -moz-box-shadow:0 2px 2px rgba(0,0,0,0.1);
    box-shadow:0 2px 2px rgba(0,0,0,0.1), inset 0 1px 0 rgba(255,255,255,0.5);
}
.btna:not([disabled]):hover{
     background:#2ecc71;
}
.btna[disabled]{
  background: #3c7d57;
  color: #ffffff3b;
  cursor: default;
}
.btna:after{
    content:'';
    display:block;
    position:absolute;
    opacity:0;
    width:30px;
    height:30px;
    border-right-color:#fff;
    -webkit-border-radius:50%;
    -moz-border-radius:50%;
    border-radius:50%;
    left:-30px;
    top:15px;
    
    -webkit-transition-property: -webkit-transform;
    -webkit-transition-duration: .5s;

    -moz-transition-property: -moz-transform;
    -moz-transition-duration: .5s;
    
    -webkit-animation-name: rotate; 
    -webkit-animation-duration: .5s; 
    -webkit-animation-iteration-count: infinite;
    -webkit-animation-timing-function: linear;
    
    -moz-animation-name: rotate; 
    -moz-animation-duration: .5s; 
    -moz-animation-iteration-count: infinite;
    -moz-animation-timing-function: linear;
    
    transition:all 0.2s linear;
    -webkit-transform:scale(2);
    transform:scale(2);
}

button.loading:after {
    opacity:1;
    left:15px;
}

@-webkit-keyframes rotate {
    from {-webkit-transform: rotate(0deg);}
    to {-webkit-transform: rotate(360deg);}
}

@-moz-keyframes rotate {
    from {-moz-transform: rotate(0deg);}
    to {-moz-transform: rotate(360deg);}
}

a{
  color:#7f8c8d;
}

.form-container{
  padding: 50px 40px;
  background:#fff;
  width:400px;
  text-align:center;
  -webkit-box-shadow:0 2px 3px rgba(0,0,0,0.2);
  -moz-box-shadow:0 2px 3px rgba(0,0,0,0.2);
  box-shadow:0 2px 3px rgba(0,0,0,0.2);
  margin:0 auto;
  -webkit-transition:all 1s linear;
  -moz-transition:all 1s linear;
  transition:all 1s linear;
  position:absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.form-container:after{
  content:"";
  display:block;
  position:absolute;
  top:0;
  left:0;
  width:100px;
  height:10px;
  background:#e74c3c;
  -webkit-box-shadow:100px 0 0 #e67e22, 200px 0 0 #f1c40f, 300px 0 0 #1abc9c;
  -moz-box-shadow:100px 0 0 #e67e22, 200px 0 0 #f1c40f, 300px 0 0 #1abc9c;
  box-shadow:100px 0 0 #e67e22, 200px 0 0 #f1c40f, 300px 0 0 #1abc9c;
}

.done .login-form{
  display:none;
}

.form-container .thank-msg{
  display:none;
}

.done .thank-msg{
  display:block;
}

.form-container h3{
  font-size:32px;
  text-align:center;
  color:#666;
  margin:0 0 30px;
}

.form-container .login-form > div{
  margin-bottom:20px;
}

.form-container .login-form > div > input{
  border:2px solid #dedede;
  padding:20px;
  font-size:20px;
  min-width:300px;
  color:#666;
  -webkit-border-radius:3px;
  -moz-border-radius:3px;
  border-radius:3px;
  outline:none;
  -webkit-transition:border-color 0.2s linear;
  -moz-transition:border-color 0.2s linear;
  transition:border-color 0.2s linear;
}

.form-container .login-form > div > input:focus{
  border-color:#A5A5A5;
}

.page-container{
  min-height: 500px;
}

.credits{
  text-align:center;
  color:#999;
  padding:10px;
}

.form-container .inputbox [type="submit"] {
  width: 20%;
  background: dodgerblue;
  color: #fff;
  border: #fff;
}
.form-container .inputbox:hover [type="submit"] {
  background: linear-gradient(45deg, greenyellow, dodgerblue);
}
    </style>
    <title>Document</title>
</head>
<body>
<div ng-app="App" class="page-container"> 
<div class="form-container" ng-class="done">
        <form class="login-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <h3>User Login</h3>
        <div>
          <input type="text" name="email" placeholder="email" class="form-control <?php echo (!empty($email_error)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_error; ?></span>
        </div>
        
        <div>
        <input type="password" name="password" placeholder="password" class="form-control <?php echo (!empty($password_error)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_error; ?></span>
        </div>
        
       
        <button type="submit" class="btn btn-success">Login</button>
        </form>
    
      <div class="credits">
      <p>New Here ? <a href="register.php">Register here</a></p>
      </div>
    </div>
</div>
</div>

</body>
</html>

<br><br>

<?php
    include_once 'footer.php'

?>

