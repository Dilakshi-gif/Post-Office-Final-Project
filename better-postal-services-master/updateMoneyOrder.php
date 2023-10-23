<?php

include('db_con.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $id = $_POST['id'];
    $senderName = $_POST['sender_name'];
    $senderAddress = $_POST['sender_address'];
    $receiverName = $_POST['receiver_name'];
    $receiverAddress = $_POST['receiver_address'];
    $amount = $_POST['amount'];


    $sql = "UPDATE money_order SET sender_name = '$senderName', sender_address = '$senderAddress' , receiver_name = '$receiverName',receiver_address = '$receiverAddress', amount = '$amount' WHERE id = $id";

    if ($mysqli->query($sql) === TRUE) {
            $message = " money order updated";
            // JavaScript code to display an alert
            echo "<script>";
            echo "alert('" . addslashes($message) . "');"; // Use addslashes to properly escape the message
            echo "window.location.href = 'adminMoneyOrder.php';"; // Redirect to the desired page after the alert
            echo "</script>";    
    } else {
        $message = " Error updating record";

            echo "<script>";
            echo "alert('" . addslashes($message) . "');"; // Use addslashes to properly escape the message
            echo "window.location.href = 'adminMoneyOrder.php';"; // Redirect to the desired page after the alert
            echo "</script>"; 
    }
}

// Close the database connection
$mysqli->close();

?>