<?php

include('db_con.php');

$id = $_GET['deleteID'];


$sql = "DELETE FROM telemails WHERE id = $id";

if ($mysqli->query($sql) === TRUE) {
    $message = " Telimail deleted";
    // JavaScript code to display an alert
    echo "<script>";
    echo "alert('" . addslashes($message) . "');"; // Use addslashes to properly escape the message
    echo "window.location.href = 'adminTelimail.php';"; // Redirect to the desired page after the alert
    echo "</script>";    
} else {
    $message = " Error deleting record";

    echo "<script>";
    echo "alert('" . addslashes($message) . "');"; // Use addslashes to properly escape the message
    echo "window.location.href = 'adminTelimail.php';"; // Redirect to the desired page after the alert
    echo "</script>"; 
}

// Close the database connection
$mysqli->close();

?>