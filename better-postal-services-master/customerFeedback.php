<?php
// Start a session to check for user authentication
session_start();

// Check if the user is not logged in; if so, redirect to the login page
if (!isset($_SESSION['id'])) {
    header('location: login.php'); 
    exit();
}

// Include the database connection file
include('db_con.php');


$submissionSuccess = false;

// Initialize form data variables
$name = '';
$email = '';
$comment = '';
$rating = '';


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    $rating = $_POST['rating'];

    // Get user ID from session
    $userId = $_SESSION['id'];

    // Insert money order data into the database
    $sqlInsertCustomerFeedback = 'INSERT INTO customer_feedback (user, rate, comment, name, email)
                            VALUES (?, ?, ?, ?, ?)';

    if ($stmt = $mysqli->prepare($sqlInsertCustomerFeedback)) {
        $stmt->bind_param('sssss', $userId, $rating, $comment, $name, $email);
        if ($stmt->execute()) {
            $submissionSuccess = true;
        } else {
            // Error while inserting money order data
            $errorMessage = 'Error while submitting feedback. Please try again later.';
        }

        $stmt->close();
    } else {
        // Error preparing the insert statement
        $errorMessage = 'Error while preparing feedback submission.';
    }
}

// Display error message if there was an issue with the form submission
if (isset($errorMessage)) {
    // You can redirect to an error page or display the error message on the same page
    echo $errorMessage;
}


// Retrieve post offices for the dropdown list
$postOfficeQuery = 'SELECT id, post_office, post_code FROM post_offices';
$postOfficeResult = $mysqli->query($postOfficeQuery);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body style="padding:100px">
<h2>Customer Feedback</h2>
<div class="mb-4 small">
Please provide your feedback in the form below
</div>
<?php if ($submissionSuccess):
    $message = " feedback submitted successfully!";

    // JavaScript code to display an alert
    echo "<script>";
    echo "alert('" . addslashes($message) . "');"; // Use addslashes to properly escape the message
    echo "window.location.href = 'index.php';"; // Redirect to the desired page after the alert
    echo "</script>";
    
    ?>
          
        <?php endif; ?>
        <?php if (isset($errorMessage)): ?>
            <div class="alert alert-danger">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<label>How do you rate your overall experience?</label>
<div class="mb-3 d-flex flex-row py-1">
  <div class="form-check mr-3">
  <input class="form-check-input" type="radio" name="rating" value="bad" >
  <label class="form-check-label" for="rating_bad">
    Bad
  </label>
  </div>
  
  <div class="form-check mx-3">
  <input class="form-check-input" type="radio" name="rating"  value="good" >
  <label class="form-check-label" for="rating_good">
    Good
  </label>
  </div>
  
  <div class="form-check mx-3">
  <input class="form-check-input"  type="radio" name="rating"  value="excellent" >
  <label class="form-check-label" for="rating_excellent">
    Excellent!
  </label>
  </div>
</div>
<div class="mb-4">
  <label class="form-label"  for="feedback_comments">Comments:</label>
  <textarea name="comment" class="form-control" rows="6" required placeholder="comment"><?php echo $comment; ?></textarea>
</div>
<div class="row">
  <div class="col">
    <label class="form-label" for="feedback_name">Your Name:</label>
    <input class="form-control" type="text" name="name"  required value="<?php echo $name; ?>" placeholder="Name">
  </div>
  
  <div class="col mb-4">
    <label class="form-label" for="feedback_email">Email:</label>
    <input class="form-control" type="email" name="email" required value="<?php echo $email; ?>" placeholder="Email"/>
  </div>
</div>
<button type="submit" class="btn btn-success btn-lg" >Post</button>&nbsp;<a href="index.php"><button type="button" class="btn btn-info btn-lg" >Skip</button></a>
</form>
</body>
</html>