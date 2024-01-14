<?php
session_start();
include "../../connection/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming the form sends the event ID to be deleted
    $event_id = $_POST['event_id'];

    // Perform the delete query
    $deleteQuery = "DELETE FROM events WHERE id = $event_id";

    if ($conn->query($deleteQuery) === TRUE) {
        // Redirect to the events listing page after successful deletion
        header("Location: ../events.php");
        exit();
    } else {
        echo "Error deleting event: " . $conn->error;
    }
}

$conn->close();
?>
