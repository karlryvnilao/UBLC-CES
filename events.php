<?php
// Replace the following with your actual database connection details
$host = 'localhost';
$dbname = 'ublc_ces';
$user = 'root';
$password = '';

try {
    // Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Execute a query to fetch events (adjust the query as per your database schema)
    $stmt = $pdo->prepare("SELECT id, title, start, end FROM events");
    $stmt->execute();

    // Fetch the results as an associative array
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Close the database connection
    $pdo = null;

    // Output the events as JSON
    echo json_encode($events);
} catch (PDOException $e) {
    // Handle database connection errors
    echo "Error: " . $e->getMessage();
}
?>
