<?php
session_start();
include "../../connection/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming the form sends the event ID and updated data
    $event_id = $_POST['event_id'];
    $editEventName = $_POST['editEventName'];
    $editEventDate = $_POST['editEventDate'];

    // Perform the update query
    $updateQuery = "UPDATE events SET title = '$editEventName', start = '$editEventDate' WHERE id = $event_id";

    if ($conn->query($updateQuery) === TRUE) {
        // Redirect to the events listing page after successful update
        header("Location: ../events.php");
        exit();
    } else {
        echo "Error updating event: " . $conn->error;
    }
}

$conn->close();
?>
