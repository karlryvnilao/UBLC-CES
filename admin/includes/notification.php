<?php
if (isset($_POST['submit_announcement'])) {
    $subject = $_POST['announcement_subject'];
    $text = $_POST['announcement_text'];
  
    $sql = "INSERT INTO announcements (announcement_subject, announcement_text) VALUES ('$subject', '$text')";
  
    if (mysqli_query($conn, $sql)) {
        echo "Announcement added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
  $announcement_query = "SELECT * FROM announcements ORDER BY created_at DESC"; // Adjust the query as needed
  $announcement_result = mysqli_query($conn, $announcement_query);
  
  $totalAnnouncementCount = mysqli_num_rows($announcement_result);
  
  // Reset the result set pointer
  mysqli_data_seek($announcement_result, 0);
  
?>