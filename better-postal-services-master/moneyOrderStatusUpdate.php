<?php

include('db_con.php');

if($_GET['paymentid'] === null){

$id = $_GET['id'];

$status = "SELECT * FROM money_order WHERE id = $id";

$resultStatus = $mysqli->query($status);

$row = $resultStatus->fetch_assoc();
$value = $row["status"];



if ($value === pending) {
   
    $sql = "UPDATE money_order SET status = 'received' WHERE id = $id";

    if ($mysqli->query($sql) === TRUE) {
    $message = "Money received resiver and notify sender";
    // JavaScript code to display an alert
    echo "<script>";
    echo "alert('" . addslashes($message) . "');"; // Use addslashes to properly escape the message
    echo "window.location.href = 'adminMoneyOrder.php';"; // Redirect to the desired page after the alert
    echo "</script>"; 
    }

} else if ($value === received) {

    $sql = "UPDATE money_order SET status = 'received' WHERE id = $id";

    if ($mysqli->query($sql) === TRUE) {
    $message = "money allrady sended resiver and notify sender";
    // JavaScript code to display an alert
    echo "<script>";
    echo "alert('" . addslashes($message) . "');"; // Use addslashes to properly escape the message
    echo "window.location.href = 'adminMoneyOrder.php';"; // Redirect to the desired page after the alert
    echo "</script>"; 
    }
    
} else {
    $message = "erorr";
        // JavaScript code to display an alert
        echo "<script>";
        echo "alert('" . addslashes($message) . "');"; // Use addslashes to properly escape the message
        echo "window.location.href = 'adminDashboard.php';"; // Redirect to the desired page after the alert
        echo "</script>"; 

}
 {
    echo "Error deleting record(s): " . $mysqli->error;
}

}

if($_GET['id'] === null){

$paymentID = $_GET['paymentid'];


$status = "SELECT * FROM money_order WHERE id = $paymentID";

$resultStatus = $mysqli->query($status);

$row = $resultStatus->fetch_assoc();
$value = $row["payment_status"];



if ($value === pending) {
   
    $sql = "UPDATE money_order SET payment_status = 'paid' WHERE id = $paymentID";

    if ($mysqli->query($sql) === TRUE) {
    $message = "paid successful";
    // JavaScript code to display an alert
    echo "<script>";
    echo "alert('" . addslashes($message) . "');"; // Use addslashes to properly escape the message
    echo "window.location.href = 'adminMoneyOrder.php';"; // Redirect to the desired page after the alert
    echo "</script>"; 
    }

} else if ($value === paid) {

    $sql = "UPDATE money_order SET payment_status = 'pending' WHERE id = $paymentID";

    if ($mysqli->query($sql) === TRUE) {
    $message = "paid unsuccessful";
    // JavaScript code to display an alert
    echo "<script>";
    echo "alert('" . addslashes($message) . "');"; // Use addslashes to properly escape the message
    echo "window.location.href = 'adminMoneyOrder.php';"; // Redirect to the desired page after the alert
    echo "</script>"; 
    }
    
} else {
    $message = " erorr";
        // JavaScript code to display an alert
        echo "<script>";
        echo "alert('" . addslashes($message) . "');"; // Use addslashes to properly escape the message
        echo "window.location.href = 'adminMoneyOrder.php';"; // Redirect to the desired page after the alert
        echo "</script>"; 

}
 {
    echo "Error deleting record(s): " . $mysqli->error;
}

}

// Close the database connection
$mysqli->close();

?>