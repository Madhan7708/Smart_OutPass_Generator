<?php
include("db.php");

if (isset($_POST['id']) && isset($_POST['action'])) {
    $id = $_POST['id'];
    $action = $_POST['action'];
    $status = 0;

    // Set the status based on the action
    if ($action == 'approve') {
        $status = 2; // Approved
    } elseif ($action == 'reject') {
        $status = 5; // Rejected
    }

    // Update the status of the leave application
    $query = "UPDATE leaveapply SET status = '$status' WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        echo "Success"; // Return success message
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
