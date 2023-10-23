<?php
include('db_con.php');

if (isset($_GET['paymentid'])) { // Check if paymentid exists in the GET array
    $paymentID = $_GET['paymentid'];

    $status = "SELECT * FROM telemails WHERE id = $paymentID";
    $resultStatus = $mysqli->query($status);
    $row = $resultStatus->fetch_assoc();
    $value = $row["payment_status"];

    if ($value === 'pending') { // Fix: Add single quotes around 'pending'
        $sql = "UPDATE telemails SET payment_status = 'paid' WHERE id = $paymentID";
        if ($mysqli->query($sql) === TRUE) {
            $message = "Paid successful";
        
            // JavaScript code to display an alert
            echo "<script>";
            echo "alert('" . addslashes($message) . "');";
            echo "window.location.href = 'adminTelimail.php';";
            echo "</script>";
        }
    } elseif ($value === 'paid') { // Fix: Add single quotes around 'paid'
        $sql = "UPDATE telemails SET payment_status = 'pending' WHERE id = $paymentID";
        if ($mysqli->query($sql) === TRUE) {
            $message = "Paid unsuccessful";

            // JavaScript code to display an alert
            echo "<script>";
            echo "alert('" . addslashes($message) . "');";
            echo "window.location.href = 'adminTelimail.php';";
            echo "</script>";
        }
    } else {
        $message = "Error";

        // JavaScript code to display an alert
        echo "<script>";
        echo "alert('" . addslashes($message) . "');";
        echo "window.location.href = 'adminTelimail.php'";
        echo "</script>";
    }
} elseif (isset($_GET['id'])) { // Check if id exists in the GET array
    $id = $_GET['id'];

    $status = "SELECT * FROM telemails WHERE id = $id";
    $resultStatus = $mysqli->query($status);
    $row = $resultStatus->fetch_assoc();
    $value = $row["status"];

    if ($value === 'pending') { // Fix: Add single quotes around 'pending'
        $sql = "UPDATE telemails SET status = 'received' WHERE id = $id";
        if ($mysqli->query($sql) === TRUE) {
            $message = "Message sent to receiver and sender notified";

            // JavaScript code to display an alert
            echo "<script>";
            echo "alert('" . addslashes($message) . "');";
            echo "window.location.href = 'adminTelimail.php';";
            echo "</script>";
        }
    } elseif ($value === 'received') { // Fix: Add single quotes around 'received'
        $sql = "UPDATE telemails SET status = 'pending' WHERE id = $id";
        if ($mysqli->query($sql) === TRUE) {
            $message = "Message sent to receiver and sender notified";

            // JavaScript code to display an alert
            echo "<script>";
            echo "alert('" . addslashes($message) . "');";
            echo "window.location.href = 'adminTelimail.php';";
            echo "</script>";
        }
    } else {
        $message = "Error";

        // JavaScript code to display an alert
        echo "<script>";
        echo "alert('" . addslashes($message) . "');";
        echo "window.location.href = 'adminTelimail.php'";
        echo "</script>";
    }
} else {
    $message = "Error: Missing parameter";

    // JavaScript code to display an alert
    echo "<script>";
    echo "alert('" . addslashes($message) . "');";
    echo "window.location.href = 'adminTelimail.php'";
    echo "</script>";
}

// Close the database connection
$mysqli->close();
?>
