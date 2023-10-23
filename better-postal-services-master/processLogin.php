<?php
//this is admin admin login form
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted username and password
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Perform authentication (you should replace this with your own authentication logic)
    if ($username === "Admin123" && $password === "Post123") {
        // Authentication successful
        $message = "Login Successful";

        // Redirect to the target page with the message as a query parameter
        header("Location: adminDashboard.php?message=" . urlencode($message));
        exit();

    } else {
        // Authentication failed
        $message = "Login Failed. Try Again!";

        header("Location: adminLogin.php?message=" . urlencode($message));
        exit();

    }
} else {
    // Redirect back to the login form if accessed directly
    header("Location: login_form.php");
    exit();
}
?>