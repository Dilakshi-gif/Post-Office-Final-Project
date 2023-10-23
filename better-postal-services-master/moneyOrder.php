<?php
// S<tart a session to check for user authentication
session_start();

// Check if the user is not logged in; if so, redirect to the login page
if (!isset($_SESSION['id'])) {
    header('location: login.php'); 
    exit();
}

// Include the database connection file
include('db_con.php');


$submissionSuccess = false;

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $senderName = $_POST['sender_name'];
    $senderAddress = $_POST['sender_address'];
    $receiverName = $_POST['receiver_name'];
    $receiverAddress = $_POST['receiver_address'];
    $postOfficeId = $_POST['post_offices'];
    $amount = $_POST['amount'];
    $paymentStatus = $_POST['payment_status'];

    // Get user ID from session
    $userId = $_SESSION['id'];

    // Insert money order data into the database
    $sqlInsertMoneyOrder = 'INSERT INTO money_order (user, sender_name, sender_address, receiver_name, receiver_address, receiver_post_office, amount)
                            VALUES (?, ?, ?, ?, ?, ?, ?)';

    if ($stmt = $mysqli->prepare($sqlInsertMoneyOrder)) {
        $stmt->bind_param('sssssss', $userId, $senderName, $senderAddress, $receiverName, $receiverAddress, $postOfficeId, $amount);
        if ($stmt->execute()) {
            $submissionSuccess = true;
        } else {
            // Error while inserting money order data
            $errorMessage = 'Error while submitting money order. Please try again later.';
        }

        $stmt->close();
    } else {
        // Error preparing the insert statement
        $errorMessage = 'Error while preparing money order submission.';
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

<?php
    include_once 'header.php'
?>

<div class="heading-topic">
    <h1>Money Order</h1>
</div>
<br>

<div class="section">
  <div class="text">
      <p>The e-Money Order Service allows Sri Lanka Post’s customers to transfer their money, electronically. Moving the money transfer from paper to electronic form makes the transfer faster. A person sending a Money Order goes into the post office and pays the money in the post office for an electronic transfer. The money is immediately sent to the receiving branch and then the recipient receives his money.<br><br><br>
      Minimum amount which the sender can send : Rs. 1.00<br>
        Maximum amount which the sender can send at a post office: Rs.100,000.00 (Per transaction)<br>
        Maximum amount which the sender can send at a post office: Rs.25,000.00 (Per transaction)<br>
    </p>

  </div>
</div>

<div class="login">
<h1>Money Order Submission Form</h1>
<?php if ($submissionSuccess):
    $message = " Money order submitted successfully! plz send your feedback";

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
  <p><input type="text" name="sender_name"  required value="" placeholder="Sender Name"></p>
    <p><input type="text" name="sender_address" required value="" placeholder="Sender Address"></p>
    <p><input type="text" name="receiver_name" required value="" placeholder="Receiver Name"></p>
    <p><input type="text" name="receiver_address" required value="" placeholder="Receiver Address"></p>
    <p><select name="post_office" required>
                    <option value="" selected disabled>Select a Post Office</option>
                    <?php while ($row = $postOfficeResult->fetch_assoc()) : ?> <option value="" data-post-code="<?php echo $row['post_code']; ?>"><?php echo $row['post_office']; ?></option>
                    <?php endwhile; ?>
                </select></p>
                <p><select name="payment_status" required>
          <option selected disabled>payment options</option>
          <option value="paid">online</option>
          <option value="pending">manual</option>
                </select></p>           
    <p><input type="text" name="amount" required value="" placeholder="amount"></p>
    <p class="submit"><input type="submit" name="commit" value="Submit"></p>
  </form>
</div>
    <!-- Include Bootstrap JS -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->
    <script>
        // JavaScript to update the Post Code field when a Post Office is selected
        document.querySelector('select[name="post_office"]').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const postCodeField = document.querySelector('input[name="post_code"]');
            postCodeField.value = selectedOption.getAttribute('data-post-code');
        });
    </script>
<!--</body>
</html>-->


<?php
    include_once 'footer.php';

?>