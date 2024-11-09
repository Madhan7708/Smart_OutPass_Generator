<?php
session_start();
include('db.php'); // Include the database connection file

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reg_no = mysqli_real_escape_string($conn, $_POST['reg_no']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to check if faculty ID and password match
    $query = "SELECT * FROM login WHERE user_id = '$reg_no' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    // If user exists
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['reg_no'] = $reg_no; // Store faculty ID in session
        header("Location: index.php"); // Redirect to the completedtable page
        exit();
    } else {
        // Invalid credentials
        echo "<script>alert('Invalid Student ID or Password. Please try again.'); window.location.href='login.php';</script>";
    }
} else {
    header("Location: login.php"); // Redirect back to login page if accessed without form submission
    exit();
}
