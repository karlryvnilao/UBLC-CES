<?php
// Assuming you have already established a database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $projectTitle = $_POST['projectTitle'];
    $timeframe = $_POST['timeframe'];
    $departments = $_POST['departments'];
    $activity = $_POST['activity'];
    $incharged = $_POST['incharged'];
    $prepared = $_POST['prepared'];
    $expensed = $_POST['expensed'];
    $status = $_POST['status'];
    // Add more fields as needed

    // Assuming you have a unique identifier for the project, e.g., project ID
    $projectId = $_POST['projectId']; // Replace 'projectId' with the actual identifier name

    // Perform the update query
    $sql = "UPDATE project_plan SET 
            project_title = '$projectTitle',
            timeframe = '$timeframe',
            departments = '$departments' ,
            activity = '$activity',
            person_incharged = '$incharged',
            prepared_by = '$prepared',
            total_expensed = '$expensed',
            status = '$status'
            -- Add more fields as needed
            WHERE project_id = $projectId";

    if (mysqli_query($conn, $sql)) {
        // Update successful
        echo json_encode(['status' => 'success', 'message' => 'Project updated successfully']);
    } else {
        // Update failed
        echo json_encode(['status' => 'error', 'message' => 'Error updating project: ' . mysqli_error($conn)]);
    }
} else {
    // Invalid request method
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

// Close the database connection
mysqli_close($conn);
?>
