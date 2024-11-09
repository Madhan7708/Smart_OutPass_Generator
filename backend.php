<?php
include("db.php");

if (isset($_POST['save_newuser'])) {
    try {
        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);

        $outPassType = mysqli_real_escape_string($conn, $_POST['outPass']);
        $dateTime = mysqli_real_escape_string($conn, $_POST['time']);
        $reason = mysqli_real_escape_string($conn, $_POST['reason']);

        $query = "INSERT INTO leaveapply (user_id, category, date, reason) VALUES ('$user_id', '$outPassType', '$dateTime', '$reason')";

        if (mysqli_query($conn, $query)) {
            $res = [
                'status' => 200,
                'message' => 'Details added successfully'
            ];
            echo json_encode($res);
        } else {
            throw new Exception('Query Failed: ' . mysqli_error($conn));
        }
    } catch (Exception $e) {
        $res = [
            'status' => 500,
            'message' => 'Error: ' . $e->getMessage()
        ];
        echo json_encode($res);
    }
}


?>
