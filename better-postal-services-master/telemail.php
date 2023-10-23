<?php
// Start a session to check for user authentication
session_start();

// Check if the user is not logged in; if so, redirect to the login page
if (!isset($_SESSION['id'])) {
    header('location: login.php'); // Replace 'login.php' with the appropriate URL
    exit();
}

include('db_con.php');

// Initialize variables for form fields
$senderName = $senderAddress = $receiverName = $receiverAddress = $postOffice = $message= '';
$status = '1'; // Default status when submitting

$submissionSuccess = false;

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $senderName = $_POST['sender_name'];
    $senderAddress = $_POST['sender_address'];
    $receiverName = $_POST['receiver_name'];
    $receiverAddress = $_POST['receiver_address'];
    $postOffice = $_POST['post_office'];
    $message = $_POST['message'];
    $paymentStatus = $_POST['payment_status'];
 
    // Insert the Telemail into the database
    $sql = 'INSERT INTO telemails (user, sender_name, sender_address, receiver_name, receiver_address, receiver_post_office, message,payment_status)
            VALUES (?, ?, ?, ?, ?, ?,?,?)';

    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param('ssssssss', $_SESSION['id'], $senderName, $senderAddress, $receiverName, $receiverAddress, $postOffice, $message,$paymentStatus);

        if ($stmt->execute()) {
            // Telemail submitted successfully, you can redirect to a success page if needed
            //header('location: success.php');
            //display a success message
            $submissionSuccess = true;
        } else {
            $errorMessage = 'Error while submitting Telemail. Please try again later.';
        }

        $stmt->close();
    } else {
        //$errorMessage = 'Error while preparing the Telemail submission.';
        $errorMessage = 'Error while preparing the Telemail submission: ' . $mysqli->error;
    }
}


// Retrieve post offices for the dropdown list
$postOfficeQuery = 'SELECT id, post_office, post_code FROM post_offices';
$postOfficeResult = $mysqli->query($postOfficeQuery);
?>

<?php
    include_once 'header.php'
?>

<!--<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telemail Submission</title>-->
    <!-- Include Bootstrap CSS for styling -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>-->
<div class="heading-topic">
    <h1>Telemail</h1>
</div>
<div class="section">
  <div class="text">
      <p>e-Telemail is a newly introduced service to transfer massages online. You can send your urgent messages within minimum hours using this service. This service helps you, your company to send urgent messages to your recipient or customers during minimum hours.<br><br>
        eTelemail Chargers:-<br>

        For first 10 words- Rs. 50.00<br>
        For additional one word:- Rs. 5.00<br>
        Fixed Fee:- Rs. 20.00<br>
        Certificate of delivery:- Rs. 30.00<br>
        Certified copy of the delivered message (As per the request of sender/receiver):-  Rs.100.00<br>
        </p>
  </div>
</div>



<div class="login">
  <h1>Telemail Submission Form</h1>
  <?php if ($submissionSuccess):
    $message = " Telimail submitted successfully! plz send your feedback";

    // JavaScript code to display an alert
    echo "<script>";
    echo "alert('" . addslashes($message) . "');"; // Use addslashes to properly escape the message
    echo "window.location.href = 'customerFeedback.php';"; // Redirect to the desired page after the alert
    echo "</script>";
    
    ?>
        <?php endif; ?>
        <?php if (isset($errorMessage)): ?>
            <div class="alert alert-danger">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <p><input type="text" name="sender_name"  required value="<?php echo $senderName; ?>" placeholder="Sender Name"></p>
    <p><input type="text" name="sender_address" required value="<?php echo $senderAddress; ?>" placeholder="Sender Address"></p>
    <p><input type="text" name="receiver_name" required value="<?php echo $receiverName; ?>" placeholder="Receiver Name"></p>
    <p><input type="text" name="receiver_address" required value="<?php echo $receiverAddress; ?>" placeholder="Receiver Address"></p>
    <p><select name="post_office" required>
                    <option value="" selected disabled>Select a Post Office</option>
                    <<?php while ($row = $postOfficeResult->fetch_assoc()) : ?> <option value="<?php echo $row['id']; ?>" data-post-code="<?php echo $row['post_code']; ?>"><?php echo $row['post_office']; ?></option>
                    <?php endwhile; ?>
                </select></p>
      <p><select name="payment_status" required>
          <option selected disabled>payment options</option>
          <option value="paid">online</option>
          <option value="pending">manual</option>
                </select></p>
    <!-- <p><input type="text" name="postalCode" value="" placeholder="Postal Code" disabled></p> -->
    
    <p> <textarea name="message" rows="5" class="form-control" required><?php echo $message; ?></textarea></p>
    <!-- Add this script just before the closing </form> tag -->
<script>
    // JavaScript function to validate the form before submission
    function validateForm() {
        var message = document.querySelector('textarea[name="message"]').value;
        var amountDisplay = document.getElementById('amount-display').innerHTML;

        if (message.trim() === '' || amountDisplay === '' ) {
            alert('Please calculate the amount and make sure the message is not empty.');
            return false; // Prevent form submission
        }

        return true; // Allow form submission
    }
    // JavaScript function to calculate the amount and display it
    function calculateAmount() {
        // Get the message from the textarea
        var message = document.querySelector('textarea[name="message"]').value;

        if (message.trim() === '') {
            alert('Message is required. Please enter a message.');
            return;
        }

        // Split the message into words
        var words = message.trim().split(/\s+/);

        // Calculate the total amount
        var wordCount = words.length;
        var amount = 0;

        if (wordCount <= 10 & message.length > 0) {
            amount = 50.00;
        } else if(message.length > 0) {
            amount = 50.00 + (wordCount - 10) * 5.00;
        }

        //amount += 20.00; // Add the Fixed Fee

        // Display the calculated amount
        var amountDisplay = document.getElementById('amount-display');
        amountDisplay.innerHTML = 'Amount: Rs. ' + amount.toFixed(2);

        // Check if the message field is empty and prevent submission
        if (message.trim() === '') {
            alert('Message is required. Please enter a message.');
            return false; // Prevent form submission
        }

        return true; // Allow form submission
    }
</script>
<!-- Add a button to trigger the calculation -->
<p class="submit">
    <input type="button" value="Calculate Amount" onclick="calculateAmount()">
</p>

<!-- Display the calculated amount -->
<p id="amount-display" style="font-weight: bold;"></p>

    <p class="submit"><input type="submit" name="commit" value="Submit"onclick="return validateForm()" ></p>
  </form>
</div>
    <br>


    <!-- Include Bootstrap JS -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // JavaScript to update the Post Code field when a Post Office is selected
        document.querySelector('select[name="post_office"]').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const postCodeField = document.querySelector('input[name="post_code"]');
            postCodeField.value = selectedOption.getAttribute('data-post-code');
        });
    </script>
</body>

</html>-->
<?php
    include_once 'footer.php';

?>