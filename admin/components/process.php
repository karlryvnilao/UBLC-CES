<?php
session_start();
include "../../connection/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming the form sends the event ID and updated data
    $eventTitle = $_POST['title'];
    $StartEvent = $_POST['start'];
    $EndEvent = $_POST['end'];

    // Perform the update query
    $insertQuery = "INSERT INTO events (title, start, end) VALUES ('$eventTitle', '$StartEvent', '$EndEvent')";


    if ($conn->query($insertQuery) === TRUE) {
        // Redirect to the events listing page after successful update
        header("Location: ../events.php");
        exit();
    } else {
        echo "Error updating event: " . $conn->error;
    }
}

$conn->close();
?>
