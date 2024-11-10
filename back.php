<?php
include("db.php");
if (isset($_POST['approve_user'])) {
    $apid = mysqli_real_escape_string($conn, $_POST['ids']);
    $sql = "UPDATE leaveapply SET status ='2' WHERE id='$apid'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        mysqli_commit($conn);
        echo json_encode(['status' => 200]);
    }
    else {
        $res = [
            'status' => 500,
            'message' => 'Details Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['reject_user'])) {
    $apid = mysqli_real_escape_string($conn, $_POST['ids']);
    $sql = "UPDATE leaveapply SET status ='5' WHERE id='$apid'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        mysqli_commit($conn);
        echo json_encode(['status' => 200]);
    }
    else {
        $res = [
            'status' => 500,
            'message' => 'Details Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}
?>